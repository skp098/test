import requests
import json
import xml.etree.ElementTree as ET

USERNAME = "Admin"
PASSWORD = "Hello@3212#"
URL = "http://localhost:8080/api.php"
FILE_PATH = './cargo-and-mw-templates.xml'

S = requests.Session()

# Retrieve login token first
PARAMS_1 = {
    'action':"query",
    'meta':"tokens",
    'type':"login",
    'format':"json"
}

R = S.get(url=URL, params=PARAMS_1)
DATA = R.json()

LOGIN_TOKEN = DATA['query']['tokens']['logintoken']

# Post req to login
PARAMS_2 = {
    'action': "login",
    'lgname': USERNAME,
    'lgpassword': PASSWORD,
    'lgtoken': LOGIN_TOKEN,
    'format': "json"
}

R = S.post(URL, data=PARAMS_2)
DATA = R.json()

# get a CSRF token

PARAMS_3 = {
    "action": "query",
    "meta": "tokens",
    "format": "json"
}

R = S.get(url=URL, params=PARAMS_3)
DATA = R.json()

CSRF_TOKEN = DATA['query']['tokens']['csrftoken']

# Post request to upload xml dump.
PARAMS_4 = {
    "action": "import",
    "format": "json",
    "token": CSRF_TOKEN,
    "interwikiprefix": "en"
}

FILE = {'xml':('file.xml', open(FILE_PATH))}

R = S.post(url=URL, files=FILE, data=PARAMS_4)
DATA = R.json()

if "error" in DATA.keys():   
   recreate_data_flag = False;
else:      
   recreate_data_flag = True;



# Creating Datatables from the imported templates

if(recreate_data_flag):
    
    tree = ET.parse('./cargo-and-mw-templates.xml')

    root = tree.getroot()

    templates = []

    for child in root.findall('page'):  
        page = child.find('title').text
        page_type = page.split(':')[0]
        page_name = page.split(':')[1]
        if(page_type=='Template'):
            templates.append(page_name)    

    # templates = ['Problem','Problem_Type','Solution','Solution_Type','Project','Measurement'];

    for template in templates:

        PARAMS_5 = {
            "action": "cargorecreatetables",
            "template": template,
            "format": "json",
            "token": CSRF_TOKEN,
        }
        R = S.post(URL, data=PARAMS_5)
        DATA = R.json()

        print(DATA)