Init your kubectl
```
gcloud container clusters get-credentials objective-earth-cluster --zone us-central1-c --project objective-earth

kubectl create namespace dev
kubectl apply -f mediawiki-pvc.yml --namespace=dev

```

Prepare for Ingress:

Create a Static Public IP address with the name oe-dev-ingress that we can use with the ingress. 
gcloud config set project objective-earth
gcloud compute addresses create oe-dev-ingress --global

kubectl create secret generic mediawiki-mysql-secret \
  --from-literal=username=wikiuser \
  --from-literal=password=MtIvuTrk7dN \
  --from-literal=database=oearth \
  --namespace=dev


gcloud iam service-accounts keys create ./key.json \
--iam-account=sql-service-account@objective-earth.iam.gserviceaccount.com 

kubectl create secret generic sql-access-secret \
--from-file=service_account.json=./key.json --namespace=dev

kubectl apply -f mediawiki-deployment.yml --namespace=dev

kubectl exec -it --namespace=dev  mediawiki-5458f4766c-nr7zw  -- bash

kubectl cp  LocalSettings.php   mediawiki-68f64b9dd5-jn5mv:/var/www/html/mnt  -c mediawiki --namespace=dev 
kubectl cp  uploads.ini mediawiki-5458f4766c-nr7zw:/var/www/html/mnt  -c mediawiki --namespace=dev 
kubectl cp  ./extensions/mediawiki-extensions-PageForms  mediawiki-68f64b9dd5-zqqcp:/var/www/html/extensions  -c mediawiki --namespace=dev 
kubectl cp  ./images mediawiki-5458f4766c-nr7zw:/var/www/html  -c mediawiki --namespace=dev 
kubectl cp  ./skins mediawiki-5458f4766c-nr7zw:/var/www/html  -c mediawiki --namespace=dev 
kubectl cp  ./logo mediawiki-5458f4766c-nr7zw:/var/www/html  -c mediawiki --namespace=dev 

kubectl apply -f nginx-ingress.yaml
kubectl apply -f ingress-dev.yaml

sudo certbot certonly --manual --preferred-challenges dns
sudo chown -R  $USER:$USER /etc/letsencrypt/
kubectl create secret tls oe-domain-secret \
  --cert /etc/letsencrypt/live/oe-dev.smarter.codes/fullchain.pem --key /etc/letsencrypt/live/oe-dev.smarter.codes/privkey.pem --namespace dev


mysqldump -h 0.0.0.0 -u wikiuser -p oearth > oearth_dump.sql


./cloud_sql_proxy -instances=objective-earth:us-central1:mediawiki=tcp:0.0.0.0:3306

 mysql  -h 0.0.0.0 -u wikiuser -p

mysql> use oearth;
mysql> source oearth_dump.sql;