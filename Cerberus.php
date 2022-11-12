<?php
/*
 ===========================================================================================
 + Cerberus Content Management System.
 + ---
 + - Author : Gary Christopher Johnson
 + - E-Mail : TinkeSoftware@Protonmail.com
 + - Company: Tinke Software
 + - Notes  : View this file in a non-formatting text editor for correct indentation display
 + ---
 +
 +
 +
 +
 +
 +
 +
 +
 +
 +
 +
 + ---
 + - File Location: root->Cerberus->Cerberus.php
 + - File Version:  0.6 - Wednesday, March 1st of 2023.
 + ---
 + -------------------------------------------------------------------------------
 + --()()--()()()--()()()--()()()---()()()--()()()--()--()------()()()------------
 + -()-----()------()--()--()---()--()------()--()--()--()------()----------------
 + -()-----()------()--()--()---()--()------()--()--()--()------()----------------
 + -()-----()------()--()--()---()--()------()--()--()--()------()----------------
 + -()-----()()()--()()()--()()()---()()()--()()()--()--()------()----------------
 + -()-----()------()--()--()---()--()------()--()--()--()------()----------------
 + -()-----()------()--()--()---()--()------()--()--()--()------()------------/-\-
 + -()-----()------()--()--()---()--()------()--()--()--()------()------------|4|-  ~ Wynn ~
 + --()()--()()()--()--()--()()()---()()()--()--()--()()()--()()()------------\-/- Build: 0.8
 ===========================================================================================
*/

/*
 ================================================================
 +
 +
 +
 + Cerberus Content Management System :: Kernel
 +
 +
 +
 ================================================================
*/

/*
 ================================================================
 * This Kernel File Has Complete Control of Everything System-Wide
 * Refer to the programming documentation videos and portable-documents
 * for this project to get a good understanding of how the entire system works
 * and how to write programming code for CerberusCMS. This includes
 * Application Modules, Application Panels, Custom Themes and more.
 *
 *
 *
 *
 * Architecture Programming Keys
 * @, Header of Programming Systems
 * =>, Ever-Changing Information Within Never-Changing Variable Name
 * ::, Index Section of Header
 ===============================================================
 */

/*
 ================================================================
 +
 +
 + @ Error Handling Systems
 +
 +
 ================================================================
*/

error_reporting("E_WARNING ^ E_NOTICE");

/*
 ================================================================
 +
 +
 + @ Internal File Redirection Systems
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Installation Files
 +
 ================================================================
*/

/*
 ================================================================
 + Global Installation File Variables
 ================================================================
*/

$_GLOBAL_INSTALLATION_FILE							= "Install.php";

/*
 ================================================================
 + IF: Installation File Exists, Redirect To It
 ================================================================
*/

if (file_exists($_GLOBAL_INSTALLATION_FILE)) {

	header("location: Install.php");

} // [ + ] IF_FILE_EXISTS: INSTALL.PHP

/*
 ================================================================
 +
 +
 + @ Inclusion of All Configuration Files
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Global System Configuration Modules
 +
 ================================================================
*/

/*
 ================================================================
 + IF: Global System Configuration File Exists, Include It
 ================================================================
*/

$_GLOBAL_CONFIGURATION_FILE							= "./System/Configuration/Global_Configuration.php";

if (file_exists($_GLOBAL_CONFIGURATION_FILE)) {

	include_once "$_GLOBAL_CONFIGURATION_FILE";

/*
 ================================================================
 +
 +
 + @ Inclusion of All Security Modules
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Global System Security :: Master Variable Sanitization
 +
 ================================================================
*/

/*
 ================================================================
 + IF: Global System Security File: Master Sanitization Exists, Include It
 ================================================================
*/

$_GLOBAL_SECURITY_MASTER_SANITIZATION_FILE			= "./System/Security/Modules/Master_Sanitization";

if (file_exists($_GLOBAL_SECURITY_MASTER_SANITIZATION_FILE)) {

	include_once "$_GLOBAL_SECURITY_MASTER_SANITIZATION_FILE";

/*
 ================================================================
 +
 +
 + @ Initializations
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Global Database Management System Objects, Functions and Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Database Management Server System :: Initialize Database Class
 ================================================================
*/

$DB										= new DB();

/*
 ================================================================
 +
 + Connect To Defined and Assigned Database Management Server
 +
 ================================================================
*/

/*
 ================================================================
 + Database Management Server System Connection Variables
 ================================================================
*/

$_CERBERUS_DATABASE_SERVER_CONNECT 						= mysql_connect($_ACCESS_DATABASE_SERVER_HOSTNAME, $_ACCESS_DATABASE_SERVER_USERNAME, $_ACCESS_DATABASE_SERVER_PASSWORD);
$_CERBERUS_DATABASE_SERVER_DATABASE_NAME_SELECT 				= mysql_select_db($_ACCESS_DATABASE_SERVER_DATABASE_NAME);

/*
 ================================================================
 + IF: Specified Database Server Name Exists, Connect To It
 ================================================================
*/

if ($_CERBERUS_DATABASE_SERVER_CONNECT) {

/*
 ================================================================
 + IF: Specified Database Server Database Name Exists, Select It
 ================================================================
*/

if ($_CERBERUS_DATABASE_SERVER_DATABASE_NAME_SELECT) {

/*
 ================================================================
 +
 +
 + @ Global System Variables
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Global S.Q.L. Settings :: System-Wide
 +
 ================================================================
*/

/*
 ================================================================
 + Database Server Query: Retrieve Settings :: System-Wide
 ================================================================
*/

$_DB_Query_Select_Main_Settings							= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_settings WHERE id='1'");
$_DB_Query_Main_Settings_Fetch_Array						= $DB->fetch_array($_DB_Query_Select_Main_Settings);

/*
 ================================================================
 + Global System S.Q.L. Settings: Plug-Ins
 ================================================================
*/

/*
 =========================================================
 + Global System S.Q.L. Settings: Plug-Ins :: Safe-HTML
 =========================================================
*/

$_GLOBAL_SYSTEM_SAFEHTML_DIRECTORY						= $_DB_Query_Main_Settings_Fetch_Array['settings_safeHTML_directory'];
$_GLOBAL_SYSTEM_SAFEHTML_STATUS							= $_DB_Query_Main_Settings_Fetch_Array['settings_safeHTML_status'];

/*
 =========================Credentials================================
 + Global System S.Q.L. Settings: Plug-Ins :: Text-Editor
 =========================================================
*/

$_GLOBAL_SYSTEM_TEXT_EDITOR_DIRECTORY						= $_DB_Query_Main_Settings_Fetch_Array['settings_text_editor_directory'];

/*
 ================================================================
 + Global System S.Q.L. Settings: Cookies
 ================================================================
*/

$_GLOBAL_SYSTEM_COOKIE_TIME							= $_DB_Query_Main_Settings_Fetch_Array['settings_cookie_time'];

/*
 ================================================================
 + Global System S.Q.L. Settings: Page Data Compression
 ================================================================
*/

$_GLOBAL_SYSTEM_GZIP_STATUS							= $_DB_Query_Main_Settings_Fetch_Array['settings_gzip_status'];

/*
 ================================================================
 + Global System S.Q.L. Settings: Image Extensions
 ================================================================
*/

$_GLOBAL_SYSTEM_IMAGE_EXTENSION							= $_DB_Query_Main_Settings_Fetch_Array['settings_image_extension'];

/*
 ================================================================
 + Global System S.Q.L. Settings: Languages
 ================================================================
*/

$_GLOBAL_SYSTEM_LANGUAGE_DIRECTORY						= $_DB_Query_Main_Settings_Fetch_Array['settings_language_directory'];

/*
 ================================================================
 + Global System S.Q.L. Settings: Smileys
 ================================================================
*/

$_GLOBAL_SYSTEM_SMILEYS_DIRECTORY						= $_DB_Query_Main_Settings_Fetch_Array['settings_smileys_directory'];

/*
 ================================================================
 + Global System S.Q.L. Settings: Offline Mode Status
 ================================================================
*/

$_GLOBAL_SYSTEM_OFFLINE_STATUS							= $_DB_Query_Main_Settings_Fetch_Array['settings_offline_status'];

/*
 ================================================================
 + Global System S.Q.L. Settings: Theme and Web Site Specific
 ================================================================
*/

$_GLOBAL_SYSTEM_SITE_TITLE							= $_DB_Query_Main_Settings_Fetch_Array['settings_site_title'];
$_GLOBAL_SYSTEM_SOUND_EXTENSION							= $_DB_Query_Main_Settings_Fetch_Array['settings_sound_extension'];
$_GLOBAL_SYSTEM_THEME_DIRECTORY							= $_DB_Query_Main_Settings_Fetch_Array['settings_theme_directory'];

/*
 ================================================================
 + Global System S.Q.L. Settings: File Upload Size
 ================================================================
*/

$_GLOBAL_SYSTEM_UPLOAD_SIZE_PRIVATE						= $_DB_Query_Main_Settings_Fetch_Array['settings_upload_size_private'];
$_GLOBAL_SYSTEM_UPLOAD_SIZE_PUBLIC						= $_DB_Query_Main_Settings_Fetch_Array['settings_upload_size_public'];

/*
 ================================================================
 +
 +
 + @ Global Cookie Variables
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Global Member Cookie Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Global Member Cookie Variables :: Member Electronic Mail Address
 ================================================================
*/

$_GLOBAL_COOKIE_MEMBER_ELECTRONIC_MAIL_ADDRESS					= $_COOKIE['cerberus_member_electronic_mail_address'];

/*
 ================================================================
 + Global Member Cookie Variables :: Member Password
 ================================================================
*/

$_GLOBAL_COOKIE_MEMBER_PASSWORD							= $_COOKIE['cerberus_member_password'];

/*
 ================================================================
 + Global Member Cookie Variables :: Member UserName
 ================================================================
*/

$_GLOBAL_COOKIE_MEMBER_USERNAME							= $_COOKIE['cerberus_member_username'];

/*
 ================================================================
 + Global Member Cookie Variables :: Member Language
 ================================================================
*/

$_GLOBAL_COOKIE_MEMBER_LANGUAGE							= $_COOKIE['cerberus_member_language'];

/*
 ================================================================
 +
 + Global Member Settings Variables
 +
 ================================================================
*/

/*
 ================================================================
 + IF: Member UserName Cookie and Member Password Cookie Are Not Null, Retrieve Details
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

/*
 ================================================================
 + Database Server Query: Fetch Database Stored Member Credentials
 ================================================================
*/

$_DB_Query_Select_Member_Credentials 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members WHERE member_username='$_GLOBAL_COOKIE_MEMBER_USERNAME'");
$_DB_Query_Member_Credentials_Fetch_Array 					= $DB->fetch_array($_DB_Query_Select_Member_Credentials);

/*
 ================================================================
 + Global Member Settings Variables :: Priviledge Level
 ================================================================
*/

$_GLOBAL_MEMBER_ACCESS_LEVEL							= $_DB_Query_Member_Credentials_Fetch_Array['member_access_level'];

/*
 ================================================================
 + Global Member Settings Variables :: Active Status
 ================================================================
*/

$_GLOBAL_MEMBER_STATUS_ACTIVE							= $_DB_Query_Member_Credentials_Fetch_Array['member_status_active'];

/*
 ================================================================
 + Global Member Settings Variables :: Avatar Image
 ================================================================
*/

$_GLOBAL_MEMBER_IMAGE_AVATAR								= $_DB_Query_Member_Credentials_Fetch_Array['member_image_avatar'];

/*
 ================================================================
 + Global Member Settings Variables :: Banned Status
 ================================================================
*/

$_GLOBAL_MEMBER_STATUS_BANNED							= $_DB_Query_Member_Credentials_Fetch_Array['member_status_banned'];

/*
 ================================================================
 + Global Member Settings Variables :: Electronic Mail Address
 ================================================================
*/

$_GLOBAL_MEMBER_ELECTRONIC_MAIL_ADDRESS						= $_DB_Query_Member_Credentials_Fetch_Array['member_electronic_mail_address'];

/*
 ================================================================
 + Global Member Settings Variables :: Experience Amount
 ================================================================
*/

$_GLOBAL_MEMBER_EXPERIENCE_AMOUNT						= $_DB_Query_Member_Credentials_Fetch_Array['member_experience_amount'];

/*
 ================================================================
 + Global Member Settings Variables :: Language
 ================================================================
*/

$_GLOBAL_MEMBER_LANGUAGE							= $_DB_Query_Member_Credentials_Fetch_Array['member_language'];

/*
 ================================================================
 + Global Member Settings Variables :: Last Login :: Location
 ================================================================
*/

$_GLOBAL_MEMBER_LAST_LOGIN							= $_DB_Query_Member_Credentials_Fetch_Array['member_last_login'];

/*
 ================================================================
 + Global Member Settings Variables :: Last Login :: Number of Posts
 ================================================================
*/

$_GLOBAL_MEMBER_NUMBER_OF_POSTS							= $_DB_Query_Member_Credentials_Fetch_Array['member_number_of_posts'];

/*
 ================================================================
 + Global Member Settings Variables :: Personal Profile Image
 ================================================================
*/

$_GLOBAL_MEMBER_IMAGE_PROFILE								= $_DB_Query_Member_Credentials_Fetch_Array['member_image_profile'];

/*
 ================================================================
 + Global Member Settings Variables :: Rank Level
 ================================================================
*/

$_GLOBAL_MEMBER_LEVEL_RANK								= $_DB_Query_Member_Credentials_Fetch_Array['member_level_rank'];

/*
 ================================================================
 + Global Member Settings Variables :: Theme Directory
 ================================================================
*/

$_GLOBAL_MEMBER_THEME_DIRECTORY_DIRECTORY								= $_DB_Query_Member_Credentials_Fetch_Array['member_theme_directory'];

/*
 ================================================================
 + Global Member Settings Variables :: Last Known I.P. Address
 ================================================================
*/

$_GLOBAL_MEMBER_IP_ADDRESS_LAST_KNOWN								= $_DB_Query_Member_Credentials_Fetch_Array['member_ip_address_last_known'];

/*
 ================================================================
 + Global Member Settings Variables :: Authorized I.P. Address
 ================================================================
*/

$_GLOBAL_MEMBER_IP_ADDRESS_AUTHORIZED								= $_DB_Query_Member_Credentials_Fetch_Array['member_ip_address_authorized'];

/*
 ================================================================
 + Global Member Settings Variables :: I.P. Address Log
 ================================================================
*/

$_GLOBAL_MEMBER_IP_ADDRESS_LOG								= $_DB_Query_Member_Credentials_Fetch_Array['member_ip_address_log'];

/*
 ================================================================
 +
 + Check For Banned Member Status
 +
 ================================================================
*/

/*
 ================================================================
 + IF: Member Banned Status Is Active, Redirect To The Banned Message ( 1 )
 ================================================================
*/

if ($_GLOBAL_MEMBER_STATUS_BANNED >= 1) {

	header("location: ./Theme/$_GLOBAL_SYSTEM_THEME_DIRECTORY/HTML/Banned.html");

} // [ + ] MEMBER_BANNED_STATUS

} // [ + ] MEMBER_ACCESS_LEVEL

/*
 ================================================================
 +
 + Global Date, Time and Referrer Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Global Local Server Variables :: Date
 ================================================================
*/

$_GLOBAL_DATE									= date("l, F j, Y g:i:s A");
$_GLOBAL_DATE_RFC								= date("r");

/*
 ================================================================
 + Global Local Server Variables :: Time
 ================================================================
*/

$_GLOBAL_DATE_MINUTES								= date("i");
$_GLOBAL_DATE_SECONDS								= date("s");

/*
 ================================================================
 + Global Local Server Variables :: Hyper-Text-Transfer-Protocol :: Referrer
 ================================================================
*/

$_GLOBAL_HTTP_REFERRER								= $_SERVER['HTTP_REFERER'];

/*
 ================================================================
 +
 + Global Remote Server Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Global Remote Server Variables :: Machine Information
 ================================================================
*/

$_GLOBAL_REMOTE_SERVER_ADDRESS							= $_SERVER['REMOTE_ADDR'];
$_GLOBAL_REMOTE_SERVER_HOSTNAME							= $_SERVER['REMOTE_HOST'];
$_GLOBAL_REMOTE_SERVER_PORT							= $_SERVER['REMOTE_PORT'];
$_GLOBAL_REMOTE_USER								= $_SERVER['REMOTE_USER'];

/*
 ================================================================
 +
 + Global Local Server Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Global Local Server Variables :: Machine Information
 ================================================================
*/

$_GLOBAL_SERVER_GATEWAY_INTERFACE						= $_SERVER['GATEWAY_INTERFACE'];
$_GLOBAL_SERVER_ADDRESS								= $_SERVER['SERVER_ADDR'];
$_GLOBAL_SERVER_NAME								= $_SERVER['SERVER_NAME'];
$_GLOBAL_SERVER_SOFTWARE							= $_SERVER['SERVER_SOFTWARE'];
$_GLOBAL_SERVER_PROTOCOL							= $_SERVER['SERVER_PROTOCOL'];

/*
 ================================================================
 + Global Remote Server Variables :: Connection Request Information
 ================================================================
*/

$_GLOBAL_SERVER_REQUEST_METHOD							= $_SERVER['REQUEST_METHOD'];
$_GLOBAL_SERVER_REQUEST_TIME							= $_SERVER['REQUEST_TIME'];
$_GLOBAL_SERVER_REQUEST_TIME_FLOAT						= $_SERVER['REQUEST_TIME_FLOAT'];
$_GLOBAL_SERVER_QUERY_STRING							= $_SERVER['QUERY_STRING'];
$_GLOBAL_SERVER_DOCUMENT_ROOT							= $_SERVER['DOCUMENT_ROOT'];

/*
 ================================================================
 + Global Remote Server Variables :: Hyper-Text-Transfer-Protocol Information
 ================================================================
*/

$_GLOBAL_SERVER_HTTP_ACCEPT							= $_SERVER['HTTP_ACCEPT'];
$_GLOBAL_SERVER_HTTP_ACCEPT_CHARACTER_SET					= $_SERVER['HTTP_ACCEPT_CHARSET'];
$_GLOBAL_SERVER_HTTP_ACCEPT_ENCODING						= $_SERVER['HTTP_ACCEPT_ENCODING'];
$_GLOBAL_SERVER_HTTP_ACCEPT_LOADING						= $_SERVER['HTTP_ACCEPT_LOADING'];
$_GLOBAL_SERVER_HTTP_ACCEPT_LANGUAGE						= $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$_GLOBAL_SERVER_HTTP_CONNECTION_TYPE						= $_SERVER['HTTP_CONNECTION'];
$_GLOBAL_SERVER_HTTP_HOST							= $_SERVER['HTTP_HOST'];
$_GLOBAL_SERVER_HTTP_REFERRER							= $_SERVER['HTTP_REFERER'];
$_GLOBAL_SERVER_HTTP_USER_AGENT							= $_SERVER['HTTP_USER_AGENT'];

/*
 ================================================================
 +
 +
 + @ Internal Applications
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 +
 + Internal Application :: Login
 +
 +
 ================================================================
*/

/*
 ================================================================
 + IF: Internal Application :: Login Is Activated
 ================================================================
*/

if ($_GET["InternalApplication"] == "Login") {

/*
 ================================================================
 +
 + Internal Application :: Login Form Post Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Internal Security=>Strip Electronic Mail Address Post Data
 ================================================================
*/

$_POST_LOGIN_ELECTRONIC_MAIL_ADDRESS_CLEAR					= $_POST['post_login_electronic_mail_address'];
$_POST_LOGIN_ELECTRONIC_MAIL_ADDRESS_CLEAR					= preg_replace("/'/","`", $_POST_LOGIN_ELECTRONIC_MAIL_ADDRESS_CLEAR);
$_POST_LOGIN_ELECTRONIC_MAIL_ADDRESS_CLEAR					= stripslashes($_POST_LOGIN_ELECTRONIC_MAIL_ADDRESS_CLEAR);

/*
 ================================================================
 + Internal Security=>Strip Password Post Data
 ================================================================
*/

$_POST_LOGIN_PASSWORD_CLEAR							= $_POST['post_login_password'];
$_POST_LOGIN_PASSWORD_CLEAR							= preg_replace("/'/","`", $_POST_LOGIN_PASSWORD_CLEAR);
$_POST_LOGIN_PASSWORD_CLEAR							= stripslashes($_POST_LOGIN_PASSWORD_CLEAR);

/*
 ================================================================
 + Internal Security=>Strip UserName Post Data
 ================================================================
*/

$_POST_LOGIN_USERNAME_CLEAR							= $_POST['post_login_username'];
$_POST_LOGIN_USERNAME_CLEAR							= preg_replace("/'/","`", $_POST_LOGIN_USERNAME_CLEAR);
$_POST_LOGIN_USERNAME_CLEAR							= stripslashes($_POST_LOGIN_USERNAME_CLEAR);

/*
 ================================================================
 +
 + Internal Security :: Check Post Data Versus Stored Server Data
 +
 ================================================================
*/

/*
 ================================================================
 + Database Server Query: Check Database Entries For Posted UserName
 ================================================================
*/

//$DB_Query_Check_Login 							= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members WHERE member_username='$_POST_LOGIN_USERNAME_CLEAR' AND member_electronic_mail_address='$_POST_LOGIN_ELECTRONIC_MAIL_ADDRESS_CLEAR'");
$DB_Query_Check_Login 								= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members WHERE member_username='$_POST_LOGIN_USERNAME_CLEAR'");

/*
 ================================================================
 + Fetch Real Member Data From Database Server Entries
 ================================================================
*/

$DB_Query_Check_Login_Fetch_Array						= $DB->fetch_array($DB_Query_Check_Login);
$DB_Query_Check_Login_Member_Username						= $DB_Query_Check_Login_Fetch_Array['member_username'];
$DB_Query_Check_Login_Member_Electronic_Mail_Address				= $DB_Query_Check_Login_Fetch_Array['member_electronic_mail_address'];
$DB_Query_Check_Login_Member_Password						= $DB_Query_Check_Login_Fetch_Array['member_password'];

/*
 ================================================================
 + IF: Posted Data Is Exactly The Stored Database Data, Verify The Password
 ================================================================
*/

if (password_verify($_POST_LOGIN_PASSWORD_CLEAR, $DB_Query_Check_Login_Member_Password)) {

/*
 ================================================================
 + Password Has Been Verified Exactly, Set All Credential Cookies
 ================================================================
*/

	setcookie("cerberus_member_electronic_mail_address","$_POST_LOGIN_ELECTRONIC_MAIL_ADDRESS_CLEAR", time()+$_GLOBAL_SYSTEM_COOKIE_TIME);
	setcookie("cerberus_member_username","$_POST_LOGIN_USERNAME_CLEAR", time()+$_GLOBAL_SYSTEM_COOKIE_TIME);
	setcookie("cerberus_member_password","$DB_Query_Check_Login_Member_Password", time()+$_GLOBAL_SYSTEM_COOKIE_TIME);

/*
 ================================================================
 + Header Redirect :: Control Panel
 ================================================================
*/
	
	header("location: ?$_INTERNAL_APPLICATION_MODULE_MEMBER=Control_Panel");
	
} else {

/*
 ================================================================
 + IF: Posted Data Is Incorrect Information, Redirect To No Known Member
 ================================================================
*/

	header("location: ?$_INTERNAL_APPLICATION_MODULE_MEMBER=Login&Message=No_Member");
	
} // [ + ] DB_Query_Number_Rows

/*
 ================================================================
 + Kill Database Server Query: Check Login Data
 ================================================================
*/

$DB->free($DB_Query_Check_Login);

/*
 ================================================================
 + Kill Database Server Query: Check Login Data Array
 ================================================================
*/

$DB->free($DB_Query_Check_Login_Array);

} // [ + ] InternalApplication_Login

/*
 ================================================================
 +
 + Internal Application :: Logout
 +
 ================================================================
*/

if ($_GET["InternalApplication"] == "Logout") {

/*
 ================================================================
 + Reduce Time On All Stored Browser Cookies
 ================================================================
*/

	setcookie("cerberus_member_electronic_mail_address","", time()-42000);
	setcookie("cerberus_member_username","", time()-42000);
	setcookie("cerberus_member_password","", time()-42000);
	setcookie("cerberus_member_language","", time()-42000);

/*
 ================================================================
 + Secure-Destroy All Stored Browser Cookies
 ================================================================
*/

/*
 + Nothing Here Yet
*/

/*
 ================================================================
 + Header Redirect :: News
 ================================================================
*/
	
	header("location: ?$_INTERNAL_APPLICATION_MODULE_MEMBER=News");

} // [ + ] InternalApplication_Logout

/*
 ================================================================
 +
 + Internal Application :: Set Language
 +
 ================================================================
*/

if ($_GET["InternalApplication"] == "Language") {

$_POST_LANGUAGE	 								= $_POST['post_language'];
	
	setcookie("cerberus_member_language","$_POST_LANGUAGE", time()+$_GLOBAL_SYSTEM_COOKIE_TIME);
	
	header("location: ?$_INTERNAL_APPLICATION_MODULE_MEMBER=System_Message&Message=Language");

} // [ + ] InternalApplication_Language

/*
 ================================================================
 +
 +
 + @ Internal Security Protocols
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Internal Security :: Fake Cookies Versus Real Data
 +
 ================================================================
*/

/*
 ================================================================
 + Check For Credential Data In Browser Cookies
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

/*
 ================================================================
 + Database Server Query: Check For Valid Credentials
 ================================================================
*/

$_DB_Query_Main_Cookie_Security_Check 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members WHERE member_username='$_GLOBAL_COOKIE_MEMBER_USERNAME' AND member_password='$_GLOBAL_COOKIE_MEMBER_PASSWORD'");

/*
 ================================================================
 + IF: Cookie Data Stored In Browser Match Database Server Table Entry Exactly
 ================================================================
*/

if ($DB->num_rows($_DB_Query_Main_Cookie_Security_Check)) {
/**
 * Do Nothing
**/
} else {

	header("location: ?InternalApplication=Logout"); // Fake Data Found - Redirect To Logout Section, Destroy All Cookies

} // [ + ] Fake Cookie Check

/*
 ================================================================
 + Kill Database Server Query: Compare To Stored Cookies
 ================================================================
*/

$DB->free($_DB_Query_Main_Cookie_Security_Check);

} // [ + ] Member Credentials Check

/*
 ================================================================
 +
 + Internal Security :: Stored Browser Cookies Versus Physical Directories and Files
 +
 ================================================================
*/

/*
 ================================================================
 + Check For Credentials In Browser Cookies
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

/*
 ================================================================
 + Use Existing UserName Cookie To Search For Physical Directory
 ================================================================
*/

$_MEMBER_DIRECTORY_INDEX_FILE						= "./Member/$_GLOBAL_COOKIE_MEMBER_USERNAME/index.html";

/*
 ================================================================
 + IF: UserName Directory and File Actually Exists
 ================================================================
*/

if (file_exists($_MEMBER_DIRECTORY_INDEX_FILE)) {
/**
 * Do Nothing
**/
} else {

	header("location: ?InternalApplication=Logout"); // Fake Data Found - Redirect To Logout Section

} // [ + ] File Exists: Member Directory Index

} // [ + ] Member UserName and Member Password Cookie Check

/*
 ================================================================
 +
 + Internal Security :: Check For Banned and Filtered Internet Protocol Addresses
 +
 ================================================================
*/

/*
 ================================================================
 + Check Database Entries For Banished Internet Protocol Addresses
 ================================================================
*/

$_DB_Query_Main_Banned_Status_Security_Check 					= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_banned_ip_addresses WHERE ip_address='$_GLOBAL_REMOTE_SERVER_ADDRESS'");

/*
 ================================================================
 + IF: Current I.P. Address Matches Banned I.P. Addresses In List
 ================================================================
*/

if ($DB->num_rows($_DB_Query_Main_Banned_Status_Security_Check)) {

	header("location: ./Theme/$_GLOBAL_SYSTEM_THEME_DIRECTORY/HTML/Banned.html"); // Banished Internet Protocol Address Found - Redirect To IP Banishment Notification

} // [ + ] Banned Internal Protocol Address Check

/*
 ================================================================
 + Null Language Security Patch
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_LANGUAGE == "") {

$_GLOBAL_SYSTEM_LANGUAGE_DIRECTORY							= $_GLOBAL_COOKIE_MEMBER_LANGUAGE;

} // [ + ] IF: Language Cookie Is Null, Set System Configured Language

/*
 ================================================================
 + Check Cookies Against Real Directories
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_LANGUAGE == ".." || $_GLOBAL_COOKIE_MEMBER_LANGUAGE == "." || $_GLOBAL_COOKIE_MEMBER_LANGUAGE == "@") {

	header("location: ?InternalApplication=Logout");

} // [ + ] If Language Cookie Was Modified, Logout

/*
 ================================================================
 + Check Language Cookie Against String Length
 ================================================================
*/

if (strlen($_GLOBAL_COOKIE_MEMBER_LANGUAGE) > "15") {

	header("location: ?InternalApplication=Logout");

} // [ + ] IF: Language Cookie Data Is Greater Than 15 Characters, Logout

/*
 ================================================================
 +
 + Safe Hyper-Text-Markup-Language Directives
 +
 ================================================================
*/

if ($_GLOBAL_SYSTEM_SAFEHTML_STATUS >= 1) {

	include_once "System/Plug-Ins/Safe-HTML/$_GLOBAL_SYSTEM_SAFEHTML_DIRECTORY/Safe-HTML.cerb";

} else {

	$_LIST_SAFEHTML_COMMANDS = "<CENTER>The Safe-HTML Application Module Is: Deactivated</CENTER>";

} // [ + ] If Safe-HTML Code Setting Is On || Off

/*
 ================================================================
 +
 +
 + @ Internal Loops
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + File Permissions Loop :: Change Mode ( CHMOD ) Permissions Loop
 +
 ================================================================
*/

/*
 ================================================================
 + Change Mode ( CHMOD ) Permissions Loop, Upload Directory
 ================================================================
*/

$_CHMOD_UPLOAD_DIRECTORY							= "Upload";
$_CHMOD_UPLOAD_DIRECTORY_VALUE							= "0777";
$_OPEN_UPLOAD_DIRECTORY								= opendir($_CHMOD_UPLOAD_DIRECTORY);

while (($_CHMOD_UPLOAD_DIRECTORY_FILES = readdir($_OPEN_UPLOAD_DIRECTORY))) {

if ($_CHMOD_UPLOAD_DIRECTORY_FILES == ".." || $_CHMOD_UPLOAD_DIRECTORY_FILES == "." || $_CHMOD_UPLOAD_DIRECTORY_FILES == "index.php") {
/**
 * Skip These Files
**/
} else {

	chmod("$_CHMOD_UPLOAD_DIRECTORY", octdec($_CHMOD_UPLOAD_DIRECTORY_VALUE));
	chmod("$_CHMOD_UPLOAD_DIRECTORY/$_CHMOD_UPLOAD_DIRECTORY_FILES", octdec($_CHMOD_UPLOAD_DIRECTORY_VALUE));

} // [ + ] Read Upload Directory

} // [ + ] WHILE_READ_DIRECTORY_UPLOAD
/*

/*
 ================================================================
 +
 + IF: Member Theme Is Null, Set System Theme
 +
 ================================================================
*/

/*
 ================================================================
 + Check For Credentials In Browser Cookies
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

/*
 ================================================================
 + IF: Logged-In Member Theme Is Null, Set System Theme
 ================================================================
*/

if ($_GLOBAL_MEMBER_THEME_DIRECTORY == "") {

$_GLOBAL_MEMBER_THEME_DIRECTORY								= $_GLOBAL_SYSTEM_THEME_DIRECTORY;

} // [ + ] Global_Member_Theme_Null

} // [ + ] Credentials_Check

/*
 ================================================================
 + IF: Non-Logged In Member Theme Is Null, Set System Theme
 ================================================================
*/

if ($_GLOBAL_MEMBER_THEME_DIRECTORY == "") {

$_GLOBAL_MEMBER_THEME_DIRECTORY								= $_GLOBAL_SYSTEM_THEME_DIRECTORY;

} // [ + ] Global_Non_Logged_In_Member_Theme_Null

/*
 ================================================================
 +
 + Member Loop :: Update Member Active Status
 +
 ================================================================
*/

/*
 ================================================================
 + Check For Credentials In Browser Cookies
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

/*
 ================================================================
 + IF: Member Is Logged-In, Set Active Status
 ================================================================
*/

$_DB_Query_Set_Member_Active_Status 						= $DB->query("UPDATE {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members SET member_status_active='1' WHERE member_username='$_GLOBAL_COOKIE_MEMBER_USERNAME'");

} // [ + ] Credentials_Check

/*
 ================================================================
 +
 + Member Loop :: Referrer Activity Logging
 +
 ================================================================
*/

/*
 ================================================================
 + Check For Credentials
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

/*
 ================================================================
 + IF: Member Credentials Exist And Are Valid, Set Last Referrer
 ================================================================
*/

$_DB_Query_Set_Member_Last_Post 						= $DB->query("UPDATE {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members SET member_last_post='$_GLOBAL_HTTP_REFERRER' WHERE member_username='$_GLOBAL_COOKIE_MEMBER_USERNAME'");

/*
 ================================================================
 + IF: Database Server Query: Update Was Successful
 ================================================================
*/

if ($_DB_Query_Set_Member_Last_Post) {
/**
 * Do Nothing
**/
} else {

	echo ($_Message_Cerberus_ERROR_SQL_MEMBER_LAST_POST);

} // [ + ] IF: Update Member Entry

/*
 ================================================================
 + Kill Database Server Query: Set Member Last Referrer
 ================================================================
*/

$DB->free($_DB_Query_Set_Member_Last_Post);

} // [ + ] Member Credentials Check

/*
 ================================================================
 +
 + Member Loop :: Rank Logging Loop
 +
 ================================================================
*/

/*
 ================================================================
 + IF: Credentials Exist And Are Valid
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

/*
 ================================================================
 + Rank Based On Experience Amount
 ================================================================
*/

/*
 ================================================================
 + IF: Number of Posts Are Less Than 50
 ================================================================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS <= 50) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "1";

} // [ + ] If Member Number Of Posts Is Less Than Or Equal To 50

/*
 ================================================================
 + IF: Number of Posts Are Greater Than 100
 ================================================================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS >= 100) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "2";

} // [ + ] If Member Number Of Posts Is Greater Than Or Equal To 100

/*
 ================================================================
 + IF: Number of Posts Are Greater Than 500
 ================================================================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS >= 500) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "3";

} // [ + ] If Member Number Of Posts Is Greater Than Or Equal To 500

/*
 ================================================================
 + IF: Number of Posts Are Greater Than 1000
 ================================================================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS >= 1000) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "4";

} // [ + ] If Member Number Of Posts Is Greater Than Or Equal To 1000

/*
 ================================================================
 + IF: Number of Posts Are Greater Than 1500
 ================================================================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS >= 1500) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "5";

} // [ + ] If Member Number Of Posts Is Greater Than Or Equal To 1500

/*
 ================================================================
 +
 + Member Loop :: Update Member Rank
 +
 ================================================================
*/

/*
 ================================================================
 + Database Server Query: Update Rank
 ================================================================
*/

$_DB_Query_Main_Member_Update_Rank 						= $DB->query("UPDATE {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members SET member_rank_level='$_MEMBER_RANK_UPDATE_DIGIT' WHERE member_username='$_GLOBAL_COOKIE_MEMBER_USERNAME'");

/*
 ================================================================
 + IF: Database Server Query Is Successful
 ================================================================
*/

if ($_DB_Query_Main_Member_Update_Rank) {
/**
 * Do Nothing
**/
} else {

	echo ($_Message_Cerberus_ERROR_SQL_RANK);

} // [ + ] DB_Query_UPDATE_MEMBERS

/*
 ================================================================
 + Kill Database Server Query: Update Member Rank
 ================================================================
*/

$DB->free($_DB_Query_Main_Member_Update_Rank);

/*
 ================================================================
 +
 + Global Member Rank Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Database Server Query: Fetch Member Ranks
 ================================================================
*/

$_DB_Query_Main_Member_Rank							= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_ranks ORDER BY id ASC");
$_DB_Query_Main_Member_Rank_Fetch_Array						= $DB->fetch_array($_DB_Query_Main_Member_Rank);

/*
 ================================================================
 + Set Member Rank Variables
 ================================================================
*/

$_MAIN_MEMBER_RANK_1								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_1'];
$_MAIN_MEMBER_RANK_2								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_2'];
$_MAIN_MEMBER_RANK_3								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_3'];
$_MAIN_MEMBER_RANK_4								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_4'];
$_MAIN_MEMBER_RANK_5								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_5'];

/*
 ================================================================
 + Set Member Rank For Display
 ================================================================
*/

if ($_GLOBAL_MEMBER_RANK == 1) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_1;

} // [ + ] IF: Member Rank Is 1

if ($_GLOBAL_MEMBER_RANK == 2) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_2;

} // [ + ] IF: Member Rank Is 2

if ($_GLOBAL_MEMBER_RANK == 3) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_3;

} // [ + ] IF: Member Rank Is 3

if ($_GLOBAL_MEMBER_RANK == 4) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_4;

} // [ + ] IF: Member Rank Is 4

if ($_GLOBAL_MEMBER_RANK == 5) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_5;

} // [ + ] IF: Member Rank Is 5

/*
 ================================================================
 + Kill Database Server Query: Fetch Member Ranks
 ================================================================
*/

$DB->free($_DB_Query_Main_Member_Rank);

} // [ + ] Check Cookie Data

/*
 ================================================================
 +
 + Member Loop :: Specified Language Cookie Loop
 +
 ================================================================
*/

/*
 ================================================================
 + Null Language Security Patch
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_LANGUAGE != null) {

$_GLOBAL_SYSTEM_LANGUAGE_DIRECTORY							= $_GLOBAL_COOKIE_MEMBER_LANGUAGE;

} // [ + ] IF: Language Cookie Is Null, Set System Configured Language

/*
 ================================================================
 +
 +
 + @ Background Application Module Includes
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Language File
 +
 ================================================================
*/

include_once "./System/Language/$_GLOBAL_SYSTEM_LANGUAGE_DIRECTORY/Language.cerb";

/*
 ================================================================
 +
 + Activity Logging Background Application Modules
 +
 ================================================================
*/

/*
 ================================================================
 + Administrator-Level Activity Logging Application Module
 ================================================================
*/

include_once "./Applications/Background/Log_Administration";

/*
 ================================================================
 + Background-Level Activity Logging Application Module
 ================================================================
*/

include_once "./Applications/Background/Log_Background";

/*
 ================================================================
 + Member-Level Activity Logging Application Module
 ================================================================
*/

include_once "./Applications/Background/Log_Member";

/*
 ================================================================
 +
 + Theme File Includes
 +
 ================================================================
*/

/*
 ================================================================
 + System Settings Defined Theme
 ================================================================
*/

include_once "./Theme/$_GLOBAL_SYSTEM_THEME_DIRECTORY/Theme.php";

/*
 ================================================================
 +
 +
 + @ Plug-In and Extension File Includes
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Text-Editor Plug-In
 +
 ================================================================
*/

/*
 ================================================================
 + Plug-In :: Text-Editor Application Plug-In
 ================================================================
*/

include_once "./System/Plug-Ins/Text-Editor/$_GLOBAL_SYSTEM_TEXT_EDITOR_DIRECTORY/Text-Editor.cerb";

/*
 ================================================================
 +
 +
 + @ System Protocols
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + System Protocol :: Offline Mode
 +
 ================================================================
*/

/*
 ================================================================
 + IF: Offline-Mode Is On, ( 1 ) Redirect To Offline-Mode Status Message
 ================================================================
*/

if ($_GLOBAL_SYSTEM_OFFLINE_STATUS >= 1) {

if ($_GLOBAL_MEMBER_ACCESS_LEVEL >= 2) {

	echo ($_Message_Cerberus_OFFLINE_MODE_ENABLED);

} else {

	header("location: ./Theme/$_GLOBAL_SYSTEM_THEME_DIRECTORY/HTML/Offline.html");

} // [ + ] IF: Offline Status Is On, Redirect Non-Administrator To Offline Status Web Page

} // [ + ] OFFLINE MODE IS OFF

/*
 ================================================================
 +
 +
 + @ Hyper-Text-Markup-Language Page Data Compression Protocols
 +
 +
 ================================================================
*/

/*
 ================================================================
 + IF: Page Data Compression Is Set To On, Initialize Page Compression
 ================================================================
*/

if ($_GLOBAL_SYSTEM_GZIP_STATUS >= 1) {

	ob_start("ob_gzhandler");

	$_GZIP_STATUS	= "GZIP_Compression: ON";

} else {

	$_GZIP_STATUS	= "GZIP_Compression: OFF";

} // [ + ] If GZIP Compression Is On, Specify Status

/*
 ================================================================
 +
 +
 + @ Pre-Hyper-Text-Markup-Language Output Data Control
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Page Generation Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Hyper-Text-Markup-Language Page Data Generation Variables :: Initialize Microtime
 ================================================================
*/

$_MAIN_PAGE_GENERATION_START_TIME						= microtime();

/*
 ================================================================
 + Hyper-Text-Markup-Language Page Data Generation Variables :: Time Explosion
 ================================================================
*/

$_MAIN_PAGE_GENERATION_START_ARRAY						= explode(" ", $_MAIN_PAGE_GENERATION_START_TIME);

/*
 ================================================================
 + Hyper-Text-Markup-Language Page Data Generation Variables :: Explode Microtime=>Data
 ================================================================
*/

$_MAIN_PAGE_GENERATION_START_TIME						= $_MAIN_PAGE_GENERATION_START_ARRAY[1] + $_MAIN_PAGE_GENERATION_START_ARRAY[0];

/*
 ================================================================
 +
 +
 + @ Hyper-Text-Markup-Language Page Generation: Start
 +
 +
 ================================================================
*/

echo ("
<!--================================================================================================-->
<!--				    Cerberus Content Management System				    -->
<!--================================================================================================-->

<!--================================================================================================-->
<!--			    (C) Tinke Software, Gary Christopher Johnson's Works		    -->
<!--================================================================================================-->

<!--=============================-->
<!--        DOCUMENT TYPE        -->
<!--=============================-->

<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">

<!--==============================-->
<!--        START DOCUMENT        -->
<!--==============================-->

<HTML>

<!--==============================-->
<!--	     HEAD CONTENTS        -->
<!--==============================-->

	<HEAD>
		<TITLE>$_GLOBAL_SYSTEM_SITE_TITLE</TITLE>
		<LINK REL=\"stylesheet\" HREF=\"Theme/$_GLOBAL_SYSTEM_THEME_DIRECTORY/Style_Sheet/Style.css\" TYPE=\"text/css\">
		<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\">
		<META HTTP-EQUIV=Refresh CONTENT=\"216000; URL=javascript:window.close();\">
	</HEAD>

<!--==============================-->
<!-- 	     BODY CONTENTS	  -->
<!--==============================-->

	<BODY>
");

/*
 ================================================================
 +
 +
 + Theme Template Layout [ 1 ]
 +
 +
 ================================================================
*/

echo ($_GLOBAL_THEME_LAYOUT_1);

/*
 ================================================================
 +
 +
 + Administration :: Administration Panel
 +
 +
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null && $_GLOBAL_MEMBER_ACCESS_LEVEL >= 2) {

	echo ($_THIS_THEMES_APPLICATION_PANELS_1);

		include_once "./Applications/Panel/Administration.panel";

	echo ($_THIS_THEMES_APPLICATION_PANELS_2);

} // [ + ] IF: Administrator Credentials Exist, Show Administration Application Panel

/*
 ================================================================
 +
 +
 + @ Panel Application Modules, Aligned :: Left
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + List Panel Application Modules, Aligned :: Left
 +
 ================================================================
*/

$_DB_Query_Main_Panels_Aligned_Left 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_panels WHERE panel_alignment='0' AND panel_file_status='1' ORDER BY panel_row ASC");

while ($_DB_Query_Main_Panels_Aligned_Left_Fetch_Array = $DB->fetch_array($_DB_Query_Main_Panels_Aligned_Left)) {

$_MAIN_PANEL_ALIGNED_LEFT_FILE_NAME						= $_DB_Query_Main_Panels_Aligned_Left_Fetch_Array['panel_file_name'];
$_MAIN_PANEL_ALIGNED_LEFT_TITLE							= $_DB_Query_Main_Panels_Aligned_Left_Fetch_Array['panel_title'];

echo ($_THIS_THEMES_APPLICATION_PANELS_1);
echo ($_MAIN_PANEL_ALIGNED_LEFT_TITLE);

include_once "./Applications/Panel/$_MAIN_PANEL_ALIGNED_LEFT_FILE_NAME.panel";

echo ($_THIS_THEMES_APPLICATION_PANELS_2);

} // [ + ] WHILE LISTING PANEL ALIGNED LEFT

/*
 ================================================================
 + Kill Database Server Query: Fetch Panel Application Modules, Aligned=>Left
 ================================================================
*/

$DB->free($_DB_Query_Main_Panels_Aligned_Left);

/*
 ================================================================
 +
 +
 + Theme Template Layout [ 2 ]
 +
 +
 ================================================================
*/

echo ($_GLOBAL_THEME_LAYOUT_2);

/*
 ================================================================
 +
 +
 + @ Administration-Level Application Modules
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Read Administrator Application Module Directory
 +
 ================================================================
*/

$_FIND_APPLICATIONS_ADMINISTRATION_DIRECTORY					= "./Applications/Administration/";
$_OPEN_APPLICATIONS_ADMINISTRATION_DIRECTORY					= opendir($_FIND_APPLICATIONS_ADMINISTRATION_DIRECTORY);

while (($_READ_APPLICATIONS_ADMINISTRATION_DIRECTORY = readdir($_OPEN_APPLICATIONS_ADMINISTRATION_DIRECTORY))) {

/*
 ================================================================
 +
 + Internal Security :: Stop Remote-File-Inclusion and Local-File-Inclusion Exploits
 +
 ================================================================
*/

if ($_READ_APPLICATIONS_ADMINISTRATION_DIRECTORY == "." || $_READ_APPLICATIONS_ADMINISTRATION_DIRECTORY == ".." || $_READ_APPLICATIONS_ADMINISTRATION_DIRECTORY == "index.php") {
/**
 * Do Nothing
**/
} else {

/*
 ================================================================
 +
 + Include Administrator Application Module
 +
 ================================================================
*/

if ($_GET[$_INTERNAL_APPLICATION_MODULE_ADMINISTRATOR] == "$_READ_APPLICATIONS_ADMINISTRATION_DIRECTORY") {

/*
 ================================================================
 + Check For Valid Administrator-Level Credentials
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null && $_GLOBAL_MEMBER_ACCESS_LEVEL >= 2) {


	include_once "./Applications/Administration/$_READ_APPLICATIONS_ADMINISTRATION_DIRECTORY";

} else {

	echo ($_Message_Cerberus_APPLICATION_ACCESS_RESTRICTED_ADMINISTRATOR);

} // [ + ] IF: ACCESS_LEVEL IS >= 2

} // [ + ] IF: INCLUDE Administration Application

} // [ + ] IF_NOT_ADMINISTRATION_DIRECTORY

} // [ + ] WHILE_READING_ADMINISTRATION_DIRECTORY

/*
 ================================================================
 + Close Administration Directory
 ================================================================
*/

closedir($_OPEN_APPLICATIONS_ADMINISTRATION_DIRECTORY);

/*
 ================================================================
 +
 +
 + @ Member-Level Application Modules
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Fetch Application Module Access Permissions
 +
 ================================================================
*/

$_DB_Query_Main_Select_Applications 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications ORDER BY id ASC");

while ($_DB_Query_Main_Select_Applications_Fetch_Array = $DB->fetch_array($_DB_Query_Main_Select_Applications)) {

$_MAIN_APPLICATION_FILE_NAME							= $_DB_Query_Main_Select_Applications_Fetch_Array['application_file_name'];
$_MAIN_APPLICATION_FILE_PERMISSION						= $_DB_Query_Main_Select_Applications_Fetch_Array['application_file_permission'];
$_MAIN_APPLICATION_FILE_STATUS							= $_DB_Query_Main_Select_Applications_Fetch_Array['application_file_status'];

/*
 ================================================================
 + IF: Application Module Permission Is Open
 ================================================================
*/

if ($_GET[$_INTERNAL_APPLICATION_MODULE_MEMBER] == "$_MAIN_APPLICATION_FILE_NAME") {

if (file_exists("./Applications/Member/$_MAIN_APPLICATION_FILE_NAME")) {

if ($_MAIN_APPLICATION_FILE_STATUS >= "1") {

if ($_MAIN_APPLICATION_FILE_PERMISSION <= "0") {

	include_once "./Applications/Member/$_MAIN_APPLICATION_FILE_NAME";

} // [ + ] IF: APPLICATION_PERMISSION IS OPEN

/*
 ================================================================
 + IF: Application Module Permission Is Member-Level
 ================================================================
*/

if ($_MAIN_APPLICATION_FILE_PERMISSION == "1") {

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

	include_once "./Applications/Member/$_MAIN_APPLICATION_FILE_NAME";

} else {

	echo ($_Message_Cerberus_APPLICATION_ACCESS_RESTRICTED_MEMBER);

} // [ + ] APPLICATION_PERMISSION_MEMBER

} // [ + ] IF: APPLICATION_PERMISSION IS Registered Member-Level

/*
 ================================================================
 + IF: Application Module Permission Is Administrator-Level
 ================================================================
*/

if ($_MAIN_APPLICATION_FILE_PERMISSION == "2") {

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null && $_GLOBAL_MEMBER_ACCESS_LEVEL >= 2) {

	include_once "./Applications/Member/$_MAIN_APPLICATION_FILE_NAME";

} else {

	echo ($_Message_Cerberus_APPLICATION_ACCESS_RESTRICTED_ADMINISTRATOR);

} // [ + ] Include Administration Application Module

} // [ + ] IF: Application Permission Is 2, Administrator

} else {

	echo ($_Message_Cerberus_APPLICATION_DEACTIVATED);

} // [ + ] IF: Application Module Status Is: Deactivated

} else {

	echo ($_Message_Cerberus_APPLICATION_NOT_FOUND);

} // [ + ] IF: File Exists

} // [ + ] Application Module Include

} // [ + ] WHILE Reading Application Modules Directory

/*
 ================================================================
 + Kill Database Server Query: Select From Applications
 ================================================================
*/

$DB->free($_DB_Query_Main_Select_Applications);

/*
 ================================================================
 +
 +
 + @ Custom-Level Application Modules
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Fetch Custom Application Module Entries
 +
 ================================================================
*/

$_DB_Query_Main_Select_Custom_Applications 					= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications_custom ORDER BY id ASC");

while ($_DB_Query_Main_Select_Custom_Applications_Fetch_Array = $DB->fetch_array($_DB_Query_Main_Select_Custom_Applications)) {

$_CUSTOM_APPLICATION_ID								= $_DB_Query_Main_Select_Custom_Applications_Fetch_Array['id'];
$_CUSTOM_APPLICATION_DATA							= $_DB_Query_Main_Select_Custom_Applications_Fetch_Array['custom_application_data'];
$_CUSTOM_APPLICATION_NAME							= $_DB_Query_Main_Select_Custom_Applications_Fetch_Array['custom_application_name'];
$_CUSTOM_APPLICATION_TIME							= $_DB_Query_Main_Select_Custom_Applications_Fetch_Array['custom_application_time'];

/*
 ================================================================
 +
 + Include and Display Custom Applications
 +
 ================================================================
*/

if ($_GET[$_INTERNAL_APPLICATION_MODULE_CUSTOM] == "$_CUSTOM_APPLICATION_ID") {

		echo ("<CENTER><BIG><B>$_CUSTOM_APPLICATION_NAME</B></BIG></CENTER><HR>$_CUSTOM_APPLICATION_DATA<HR>Created: $_CUSTOM_APPLICATION_TIME");

} // [ + ] CUSTOM APPLICATION

} // [ + ] WHILE Fetching Custom Applications

/*
 ================================================================
 + Kill Database Server Query: Select Custom Applications
 ================================================================
*/

$DB->free($_DB_Query_Main_Select_Custom_Applications);

/*
 ================================================================
 +
 +
 + Theme Template Layout [ 3 ]
 +
 +
 ================================================================
*/

echo ($_GLOBAL_THEME_LAYOUT_3);

/*
 ================================================================
 +
 +
 + @ Panel Application Modules, Aligned :: Right
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + List Panel Application Modules, Aligned :: Right
 +
 ================================================================
*/

$_DB_Query_Main_Panels_Aligned_Right 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_panels WHERE panel_alignment='1' AND panel_file_status='1' ORDER BY panel_row ASC");

while ($_DB_Query_Main_Panels_Aligned_Right_Fetch_Array = $DB->fetch_array($_DB_Query_Main_Panels_Aligned_Right)) {

$_MAIN_PANEL_ALIGNED_RIGHT_FILE_NAME						= $_DB_Query_Main_Panels_Aligned_Right_Fetch_Array['panel_file_name'];
$_MAIN_PANEL_ALIGNED_RIGHT_TITLE						= $_DB_Query_Main_Panels_Aligned_Right_Fetch_Array['panel_title'];

echo ($_THIS_THEMES_APPLICATION_PANELS_1);

echo ($_MAIN_PANEL_ALIGNED_RIGHT_TITLE);

include_once "./Applications/Panel/$_MAIN_PANEL_ALIGNED_RIGHT_FILE_NAME.panel";

echo ($_THIS_THEMES_APPLICATION_PANELS_2);

} // [ + ] WHILE Listing Panels Aligned Right

/*
 ================================================================
 + Kill Database Server Query: Fetch Panel Application Modules, Aligned :: Right
 ================================================================
*/

$DB->free($_DB_Query_Main_Panels_Aligned_Right);

/*
 ================================================================
 +
 +
 + Theme Template Layout [ 4 ]
 +
 +
 ================================================================
*/

echo ($_GLOBAL_THEME_LAYOUT_4);

/*
 ================================================================
 +
 +
 + Hyper-Text-Markup-Language Page Generation: End
 +
 +
 ================================================================
*/

/*
 ================================================================
 + Hyper-Text-Markup-Language Page Data Generation Variables, Data Implosion
 ================================================================
*/

$_MAIN_PAGE_GENERATION_END_TIME							= microtime();
$_MAIN_PAGE_GENERATION_END_ARRAY						= explode(" ", $_MAIN_PAGE_GENERATION_END_TIME);
$_MAIN_PAGE_GENERATION_END_TIME							= $_MAIN_PAGE_GENERATION_END_ARRAY[1] + $_MAIN_PAGE_GENERATION_END_ARRAY[0];
$_MAIN_PAGE_GENERATION_TOTAL_TIME						= $_MAIN_PAGE_GENERATION_END_TIME - $_MAIN_PAGE_GENERATION_START_TIME; 
$_MAIN_PAGE_GENERATION_TOTAL_TIME						= round($_MAIN_PAGE_GENERATION_TOTAL_TIME,5);

/*
 ================================================================
 +
 +
 + Hyper-Text-Markup-Language Document=>End, Output
 +
 +
 ================================================================
*/

echo ("
		<CENTER>
			This Web Site Is Powered By:&nbsp;<A HREF=\"https://www.SourceForge.net/projects/cerberuscms\" TARGET=\"_NEW\" TITLE=\"Cerberus Content Management System :: SourceForge Project Page\">Cerberus Content Management System</A>&nbsp;|&nbsp;Page Generation Time: " . $_MAIN_PAGE_GENERATION_TOTAL_TIME . " Seconds&nbsp;|&nbsp;");

/*
 ================================================================
 +
 +
 + Internal Resources :: Close User and Registered Member Connections
 +
 +
 ================================================================
*/

/*
 ================================================================
 + Kill Database Server Query: Select System Settings
 ================================================================
*/

$DB->free($_DB_Query_Select_Main_Settings);

/*
 ================================================================
 + Kill Database Server Query: Select Member Credentials
 ================================================================
*/

if ($_GLOBAL_COOKIE_MEMBER_USERNAME && $_GLOBAL_COOKIE_MEMBER_PASSWORD != null) {

$DB->free($_DB_Query_Select_Member_Credentials);

} // [ + ] Check Member Credentials

/*
 ================================================================
 + Kill Database Server Query: Member Banned Status
 ================================================================
*/

$DB->free($_DB_Query_Main_Banned_Status_Security_Check);

/*
 ================================================================
 +
 +
 + @ Internal Resources :: Force Close All Database Server Connections
 +
 +
 ================================================================
*/

} else {

		echo ("Cerberus: Error, I Cannot Connect To The S.Q.L. Database Server Name: $_ACCESS_DATABASE_SERVER_DATABASE_NAME. Please Check The Database Server Access Credentials File.");

} // [ + ] IF: Connection To Database Server Name

} else {

		echo ("Cerberus: Error, I Cannot Connect To The S.Q.L. Database Server Host-Name: $_ACCESS_DATABASE_SERVER_HOSTNAME.  Please Check The Database Server Access Credentials File.");

} // [ + ] IF: Connection To Database Server Hostname

/*
 ================================================================
 + Kill Database Server Connection: S.Q.L. Configured Database Server Strings
 ================================================================
*/

if ($DB->close($_CERBERUS_DATABASE_SERVER_CONNECT)) {

			echo ("Database Server Connection Closed For Internet Protocol Address: <A HREF=\"http://WhoIs.sc/$_GLOBAL_REMOTE_SERVER_ADDRESS\" TITLE=\":: View Detailed Who-Is Information For Internet Protocol Address: $_GLOBAL_REMOTE_SERVER_ADDRESS ::\" TARGET=\"_NEW\">$_GLOBAL_REMOTE_SERVER_ADDRESS</A>&nbsp;|&nbsp;");

} else {

			echo ("Cerberus: Error: I Cannot Close The Database Server Connection For Internet Protocol Address: <A HREF=\"http://WhoIs.sc/$_GLOBAL_REMOTE_SERVER_ADDRESS\" TITLE=\":: View Detailed Who-Is Information For Internet Protocol Address: $_GLOBAL_REMOTE_SERVER_ADDRESS ::\" TARGET=\"_NEW\">$_GLOBAL_REMOTE_SERVER_ADDRESS</A>&nbsp;|&nbsp;");

} // [ + ] IF: Close Database Connection

} else {

			echo ("Cerberus: Error: System Configuration File Missing: $_GLOBAL_CONFIGURATION_FILE | <A HREF=\"./Maintenance/Diagnostics/Diagnose.php\" TITLE=\":: Cerberus Content Management System :: Diagnostics Application ::\" TARGET=\"_NEW\">Please Click Here For Extensive Diagnostics</A>.");

} else {

			echo ("Cerberus: Error: System Security File Missing: $_GLOBAL_SECURITY_MASTER_SANITIZATION_FILE | <A HREF=\"./Maintenance/Diagnostics/Diagnose.php\" TITLE=\":: Cerberus Content Management System :: Diagnostics Application ::\" TARGET=\"_NEW\">Please Click Here For Extensive Diagnostics</A>.");

} // [ + ] IF: File Exists: System Configuration File :: Master System Configuration

} // [ + ] IF: File Exists: System Security Module :: Master Sanitization

echo ("
			This Web Page Will Close After One Hour Of Inactivity.
		</CENTER>
	</BODY>

<!--===============================-->
<!--	     DOCUMENT END	   -->
<!--===============================-->

</HTML>
");

/*
 ================================================================
 +
 +
 + @ Internal Resources :: Flushing and Destroying Initializations
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 +
 + Flushing and Destroying All Object Initializations
 +
 +
 ================================================================
*/

/*
 ================================================================
 + Flush All Objects
 ================================================================
*/

ob_end_flush();

/*
 ================================================================
 + Clean All Objects
 ================================================================
*/

ob_end_clean();
?>
