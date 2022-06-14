# MediaWiki

MediaWiki is a free and open-source wiki software package written in PHP. It
serves as the platform for Wikipedia and the other Wikimedia projects.

MediaWiki is:

* feature-rich and extensible, both on-wiki and with hundreds of extensions;
 
The CREDITS file lists technical contributors to the project. The COPYING file explains
MediaWiki's copyright and license (GNU General Public License, version 2 or
later).

## Extensions in use for OE

* Cargo 3.1
* PageForms
* AJAXPoll - Forked version customised for OE.
* BreadCrumbs2
* CirrusSearch
* PollResults - Submodule to display the poll results.


## Current Deployment

Current deployment is defined by docker-compose.yml. The database (Mysql) is managed through GCP.

## Skin in use

Vector is the default skin in use. The legacy feature is currently commented out.