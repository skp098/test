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
if (!defined('MEDIAWIKI')) {
	exit;
}

function loadenv($envName, $default = "")
{
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
$wgServer = loadenv('WG_SERVER', "http://localhost");

$wgAppEnv = loadenv('WG_APP_ENV');

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

$wgEmergencyContact = "";
$wgPasswordSender = loadenv('P_SENDER');

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = loadenv('MEDIAWIKI_DB_TYPE', "mysql");
$wgDBserver = loadenv('MEDIAWIKI_DB_HOST', "mysqldb");
$wgDBname = loadenv('MEDIAWIKI_DB_NAME', "oearth");
$wgDBuser = loadenv('MEDIAWIKI_DB_USER', "root");
$wgDBpassword = loadenv('MEDIAWIKI_DB_PASSWORD', "changeme");

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_DB;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = true;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

# Time zone
$wgLocaltimezone = "Asia/Kolkata";

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
wfLoadSkin('Vector');


# End of automatically generated settings.
# Add more configuration options below.

$wgShowExceptionDetails = true;
$wgShowDBErrorBacktrace = true; 
$wgShowSQLErrors = true;
$wgDebugDumpSql = true;

$wgDeprecationReleaseLimit = '1.x'; //to hide Deprecated warnings

#adding extensions
wfLoadExtension('Cargo');
wfLoadExtension('mediawiki-extensions-PageForms');
wfLoadExtension('Upvote');
wfLoadExtension('comment-extension');
wfLoadExtension( 'ParserFunctions' );
wfLoadExtension( 'YouTube' );

wfLoadExtension( 'WikiEditor' );
$wgWikiEditorRealtimePreview = true;
$wgHiddenPrefs[] = 'usebetatoolbar';

$wgGroupPermissions['*']['lookupuser'] = true;
$wgGroupPermissions['lookupuser']['lookupuser'] = true;


$wgScribuntoDefaultEngine = 'luastandalone';

$wgGroupPermissions['user']['editinterface'] = true;
$wgGroupPermissions['user']['editsitecss'] = true;

$wgGroupPermissions['user']['delete'] = true;

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
$gPlaceApiKey = loadenv('GPLACE_API_KEY'); 


// Adding google captcha system

// wfLoadExtensions([ 'ConfirmEdit', 'ConfirmEdit/ReCaptchaNoCaptcha' ]);
// $wgCaptchaClass = 'ReCaptchaNoCaptcha';

// $wgReCaptchaSiteKey = loadenv('GCAPTCHA_KEY');
// $wgReCaptchaSecretKey = loadenv('GCAPTCHA_SECRET');

// wfLoadExtensions([ 'ConfirmEdit', 'ConfirmEdit/FancyCaptcha' ]);
// $wgCaptchaClass = 'FancyCaptcha';
// $wgCaptchaDirectory = "./captcha-images";
// $wgCaptchaSecret = "M3l1czZxZ3Vy";

//enabling and disabling captcha on following actions

// $wgCaptchaTriggers['createaccount'] = true;
// $wgCaptchaTriggers['edit']          = true;
// $wgCaptchaTriggers['create']        = true;
// $wgCaptchaTriggers['createtalk']    = true;
// $wgCaptchaTriggers['addurl']        = true;
// $wgCaptchaTriggers['badlogin']      = true;

// set cache none

$wgParserCacheType = CACHE_NONE;
$wgCachePages = false;

// giveing users permisstion to move/rename pages
$wgGroupPermissions['user']['suppressredirect'] = true;

//stopping registration on oe
// $wgGroupPermissions['*']['createaccount'] = false;
// $wgAPIModules['createaccount'] = 'ApiDisabled';

$wgMaxUploadSize = 10000000;

// email settings

$wgSMTP = [
    'host'=> "email-smtp.ap-south-1.amazonaws.com",
    'port'     => 587,
    'auth'     => true,
    'username' => loadenv('SMTP_UN'),
    'password' => loadenv('SMTP_PW')
];

# Disable anonymous editing and deleting

$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['user']['edit'] = false;
$wgGroupPermissions['bureaucrat']['edit'] = true;

$wgGroupPermissions['*']['delete'] = false;
$wgGroupPermissions['user']['delete'] = false;
$wgGroupPermissions['bureaucrat']['delete'] = true;

$wgGroupPermissions['*']['move'] = false;
$wgGroupPermissions['user']['move'] = false;
$wgGroupPermissions['bureaucrat']['move'] = true;

wfLoadExtension( 'capiunto' );
wfLoadExtension( 'templatestyles' );
wfLoadExtension( 'categorytree' );
wfLoadExtension( 'scribunto' );

$wgTOCWidth = 500;
$wgAllowCopyUploads = true;
$wgCopyUploadsFromSpecialUpload = true;
$wgGroupPermissions['user']['upload_by_url'] = true;
$wgScribuntoDefaultEngine = 'luastandalone';
$wgScribuntoEngineConf['luastandalone']['luaPath'] = '/usr/bin/lua5.1';
$wgScribuntoEngineConf['luastandalone']['errorFile'] = '/var/www/html/error.txt';

//settings to allow cors

if(isset($_SERVER['HTTP_ORIGIN'])){

  $allowedOrigins = array(    
    "https://home.oe-staging.smarter.codes",
    "https://home.objective.earth"
  ); 
  
  $origin = $_SERVER['HTTP_ORIGIN'];
  
  if (in_array($origin, $allowedOrigins)) {
    header("Access-Control-Allow-Origin: $origin");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");  
  }
  
  $pattern = "/^https:\/\/[^.]+\.oe-test\.smarter\.codes$/";
  
  if (preg_match($pattern, $origin)) {
    header("Access-Control-Allow-Origin: $origin");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");  
  }
  
}

//setting up oauth on staging 

if($wgAppEnv=='staging'){

wfLoadExtension( 'MW-OAuth2Client' );

$client_id = loadenv('OAUTH_CLIENT_ID');
$client_secret = loadenv('OAUTH_CLIENT_SECRET');

$donation_web_url = loadenv('DONATION_WEB');

$wgOAuth2Client['client']['id']     = $client_id; // The client ID assigned to you by the provider
$wgOAuth2Client['client']['secret'] = $client_secret; // The client secret assigned to you by the provider

$wgOAuth2Client['configuration']['authorize_endpoint']     = "$donation_web_url/wp-json/moserver/authorize"; // Authorization URL
$wgOAuth2Client['configuration']['access_token_endpoint']  = "$donation_web_url/wp-json/moserver/token"; // Token URL
$wgOAuth2Client['configuration']['api_endpoint']           = "$donation_web_url/wp-json/moserver/resource"; // URL to fetch user JSON
$wgOAuth2Client['configuration']['redirect_uri']           = "$wgServer/index.php/Special:OAuth2Client/callback"; // URL for OAuth2 server to redirect to

$wgOAuth2Client['configuration']['username'] = 'username'; // JSON path to username
$wgOAuth2Client['configuration']['email'] = 'email'; // JSON path to email

// $wgOAuth2Client['configuration']['scopes'] = 'email'; //Permissions
// $wgOAuth2Client['configuration']['scopes'] = 'username'; //Permissions

}

//making oe mobile friendly
wfLoadExtension( 'MobileFrontend' );
$wgDefaultMobileSkin = 'vector-2022';

// Define a function to append the HTML code to the <head> tag
function add_og_image(&$out, &$skin) {

  $out->addHeadItem('my_html_code', "
<!-- Adding OG Image -->
<meta property='og:image' content='$wgServer/media/logo.png'>
  ");
}
	// Register the function to the BeforePageDisplay hook
$wgHooks['BeforePageDisplay'][] = 'add_og_image';

$wgGroupPermissions['OE-Contributor']['edit'] = true;

// Define a function to append the HTML code to the <head> tag
function add_html_to_head(&$out, &$skin) {

  global $wgServer,$wgAppEnv; 
  $out->addHeadItem('my_html_code_1', "
    <!-- Adding OG Image -->
    <meta property='og:image' content='$wgServer/media/logo.png'>
  ");

  // Adding google analytic script in head tag of oe production
  if($wgAppEnv=='production'){
    $out->addHeadItem('my_html_code', "
      <!-- Google tag (gtag.js) -->
      <script async src='https://www.googletagmanager.com/gtag/js?id=G-WWT6MZSN23'></script>
      <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-WWT6MZSN23');</script>
    ");
  }
}
// Register the function to the BeforePageDisplay hook
$wgHooks['BeforePageDisplay'][] = 'add_html_to_head';