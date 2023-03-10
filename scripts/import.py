import xml.etree.ElementTree as ET
from os import getenv
from time import sleep

import requests

USERNAME = "InternalAdmin"
PASSWORD = getenv('MEDIAWIKI_ADMIN_PASSWORD', "changeme")

URL = "http://localhost/api.php"
FILE_PATH = './templates.xml'

S = requests.Session()

# Retrieve login token first
PARAMS_1 = {
    'action': "query",
    'meta': "tokens",
    'type': "login",
    'format': "json"
}

LOGIN_TOKEN = None

while not LOGIN_TOKEN:
    try:
        R = S.get(url=URL, params=PARAMS_1)
        DATA = R.json()
        LOGIN_TOKEN = DATA['query']['tokens']['logintoken']
    except Exception as e:
        print(e)
        LOGIN_TOKEN = None
        sleep(5)

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

FILE = {'xml': ('file.xml', open(FILE_PATH))}
R = S.post(url=URL, files=FILE, data=PARAMS_4)
DATA = R.json()

if "error" in DATA.keys():
    recreate_data_flag = False
else:
    recreate_data_flag = True

# Creating Datatables from the imported templates
if(recreate_data_flag):
    tree = ET.parse(FILE_PATH)
    root = tree.getroot()
    templates = []

    for child in root.findall('page'):
        page = child.find('title').text
        page_split = page.split(':')
        if len(page_split) > 1:
            page_type = page.split(':')[0]
            page_name = page.split(':')[1]
            if (page_type == 'Template'):
                templates.append(page_name)

    # templates = ['Problem','Problem_Type','Solution','Solution_Type','Project','Measurement'];

    cargotables_params = {
        "action": "cargotables",
        "format": "json",
    }

    cargotables_params_res = S.post(URL, cargotables_params)
    cargotables = cargotables_params_res.json()

    for template in templates:

        if(template not in cargotables['cargotables']):

            PARAMS_5 = {
                "action": "cargorecreatetables",
                "template": template,
                "createReplacement":0,
                "format": "json",
                "token": CSRF_TOKEN,
            }
            R = S.post(URL, data=PARAMS_5)
            DATA = R.json()
            print(DATA)

FILE_PATH = 'media/up-vote.png'

PARAMS_6 = {
    "action": "upload",
    "filename": "up-vote.png",
    "format": "json",
    "token": CSRF_TOKEN,
    "ignorewarnings": 1
}

FILE = {'file':('up-vote.png', open(FILE_PATH, 'rb'), 'multipart/form-data')}

R = S.post(URL, files=FILE, data=PARAMS_6)
DATA = R.json()
print(DATA)

# uploading downvote png

FILE_PATH = 'media/down-vote.png'

PARAMS_7 = {
    "action": "upload",
    "filename": "down-vote.png",
    "format": "json",
    "token": CSRF_TOKEN,
    "ignorewarnings": 1
}

FILE = {'file':('down-vote.png', open(FILE_PATH, 'rb'), 'multipart/form-data')}

R = S.post(URL, files=FILE, data=PARAMS_7)
DATA = R.json()
print(DATA)

# uploading no-preview png

FILE_PATH = 'media/No-preview.png'

PARAMS_8 = {
    "action": "upload",
    "filename": "No-preview.png",
    "format": "json",
    "token": CSRF_TOKEN,
    "ignorewarnings": 1
}

FILE = {'file':('No-preview.png', open(FILE_PATH, 'rb'), 'multipart/form-data')}

R = S.post(URL, files=FILE, data=PARAMS_8)
DATA = R.json()
print(DATA)