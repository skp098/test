import xml.etree.ElementTree as ET
tree = ET.parse('./cargo-and-mw-templates.xml')

root = tree.getroot()

# print(root.tag)

templates = []

for child in root.findall('page'):	
	page = child.find('title').text
	page_type = page.split(':')[0]
	page_name = page.split(':')[1]
	if(page_type=='Template'):
		templates.append(page_name)
	
print(templates)