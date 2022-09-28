<?php
# This file was automatically generated by the MediaWiki 1.38.2
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See docs/Configuration.md for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

function loadenv($envName, $default = "") {
    return getenv($envName) ? getenv($envName) : $default;
}


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Objective Earth";
$wgMetaNamespace = "Objective_Earth";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";

## The protocol and server name to use in fully-qualified URLs
$wgServer = loadenv('WG_SERVER', "https://oetestgitlab.smarter.codes");

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [
	// '1x' => "$wgResourceBasePath/resources/assets/change-your-logo.svg",		
	// 'icon' => "$wgResourceBasePath/resources/assets/change-your-logo-icon.svg",
];


## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@🌻.invalid";
$wgPasswordSender = "apache@🌻.invalid";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = loadenv('MEDIAWIKI_DB_TYPE', "mysql");
$wgDBserver = loadenv('MEDIAWIKI_DB_HOST', "mysqltest");
$wgDBname = loadenv('MEDIAWIKI_DB_NAME', "my_wiki");
$wgDBuser = loadenv('MEDIAWIKI_DB_USER', "root");
$wgDBpassword = loadenv('MEDIAWIKI_DB_PASSWORD', "sakila");

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = false;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

# Time zone
$wgLocaltimezone = "UTC";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

$wgSecretKey = "db7dcc20f84cd654cd8f46891c718610fea7ca5a31ab375332622422e6f44498";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "d2f5e9926519f164";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, e.g. 'vector' or 'monobook':
$wgDefaultSkin = "vector-2022";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'Vector' );


# End of automatically generated settings.
# Add more configuration options below.

#adding extensions
wfLoadExtension( 'Cargo' );
wfLoadExtension( 'mediawiki-extensions-PageForms' );
wfLoadExtension( 'Upvote' );
wfLoadExtension( 'comment-extension' );

$wgGroupPermissions['*']['lookupuser'] = true;
$wgGroupPermissions['lookupuser']['lookupuser'] = true;

	 
$wgScribuntoDefaultEngine = 'luastandalone';

$wgGroupPermissions['user']['editinterface'] = true;				
$wgGroupPermissions['user']['editsitecss'] = true;

// Define constants for my additional namespaces.
define("NS_WELCOME", 5000); // This MUST be even.
define("NS_WELCOME_TALK", 5001); // This MUST be the following odd integer.

define("NS_OE", 5002); // This MUST be even.
define("NS_OE_TALK", 5003); // This MUST be the following odd integer.

// Add namespaces.
$wgExtraNamespaces[NS_WELCOME] = "Welcome";
$wgExtraNamespaces[NS_WELCOME_TALK] = "Welcome_talk"; // Note underscores in the namespace name.

$wgExtraNamespaces[NS_OE] = "ObjectiveEarth";
$wgExtraNamespaces[NS_OE_TALK] = "ObjectiveEarth_talk"; // Note underscores in the namespace name.

// enabling sql functions 
$wgCargoAllowedSQLFunctions[] = 'LEFT';
$wgCargoAllowedSQLFunctions[] = 'LENGTH';


// Google Place API Key
$gPlaceApiKey = "AIzaSyDuzoNq49SnDQhfY5QTtBzT9QZvZLSXzmQ";
