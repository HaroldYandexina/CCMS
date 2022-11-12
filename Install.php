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
 + - File Location: root->Installation->Install.php
 + - File Version:  0.6 - Wednesday, March 1st of 2023.
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
 + Cerberus Content Management System Installation
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Document Error Handling
 +
 ================================================================
*/

error_reporting("E_WARNING ^ E_NOTICE");

/*
 ================================================================
 +
 + Global Time, Date & Referrer Variables
 +
 ================================================================
*/

$_GLOBAL_DATE									= date("l, F j, Y g:i:s A");
$_GLOBAL_DATE_RFC								= date("r");
$_GLOBAL_DATE_MINUTES								= date("i");
$_GLOBAL_DATE_SECONDS								= date("s");
$_GLOBAL_HTTP_REFERRER								= $_SERVER['HTTP_REFERER'];

/*
 ================================================================
 +
 + Server Protocol Variables
 +
 ================================================================
*/

/*
 ================================================================
 + User Connection Protocol Variables
 ================================================================
*/

$_GLOBAL_REMOTE_SERVER_ADDRESS							= $_SERVER['REMOTE_ADDR'];
$_GLOBAL_REMOTE_SERVER_HOSTNAME							= $_SERVER['REMOTE_HOST'];
$_GLOBAL_REMOTE_SERVER_PORT							= $_SERVER['REMOTE_PORT'];
$_GLOBAL_REMOTE_USER								= $_SERVER['REMOTE_USER'];

/*
 ================================================================
 + Server Information Protocol Variables
 ================================================================
*/

$_GLOBAL_SERVER_GATEWAY_INTERFACE						= $_SERVER['GATEWAY_INTERFACE'];
$_GLOBAL_SERVER_ADDRESS								= $_SERVER['SERVER_ADDR'];
$_GLOBAL_SERVER_NAME								= $_SERVER['SERVER_NAME'];
$_GLOBAL_SERVER_SOFTWARE							= $_SERVER['SERVER_SOFTWARE'];
$_GLOBAL_SERVER_PROTOCOL							= $_SERVER['SERVER_PROTOCOL'];

/*
 ================================================================
 + Server Request Protocol Variables
 ================================================================
*/

$_GLOBAL_SERVER_REQUEST_METHOD							= $_SERVER['REQUEST_METHOD'];
$_GLOBAL_SERVER_REQUEST_TIME							= $_SERVER['REQUEST_TIME'];
$_GLOBAL_SERVER_REQUEST_TIME_FLOAT						= $_SERVER['REQUEST_TIME_FLOAT'];
$_GLOBAL_SERVER_QUERY_STRING							= $_SERVER['QUERY_STRING'];
$_GLOBAL_SERVER_DOCUMENT_ROOT							= $_SERVER['DOCUMENT_ROOT'];

/*
 ================================================================
 + Server HTTP Protocol Variables
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
 + Hyper-Text-Markup-Language Document: Start
 +
 ================================================================
*/

echo ("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">

<HTML>
	<HEAD>
		<TITLE>Cerberus Content Management System - Installation Process</TITLE>
		<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\">
		<LINK REL=\"stylesheet\" HREF=\"./Theme/Cerberus/Style_Sheet/Style.css\" TYPE=\"text/css\">
	</HEAD>

	<BODY>
		<TABLE WIDTH=\"100%\"><TR><TD VALIGN=\"top\">
");

/*
 ================================================================
 +
 + System Configuration Files Inclusion
 +
 ================================================================
*/

/*
 ================================================================
 + System Configuration File
 ================================================================
*/

include_once("./System/Configuration/Global_Configuration.php");

/*
 ================================================================
 +
 + Installation Form
 +
 ================================================================
*/

/*
 ================================================================
 + Installation Form Post Variables
 ================================================================
*/

$_INSTALL_FORM_POST_DATABASE_SERVER_HOSTNAME			= $_POST['post_sql_database_server_hostname'];
$_INSTALL_FORM_POST_DATABASE_SERVER_USERNAME			= $_POST['post_sql_database_server_username'];
$_INSTALL_FORM_POST_DATABASE_SERVER_PASSWORD			= $_POST['post_sql_database_server_password'];
$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_NAME		= $_POST['post_sql_database_server_database_name'];
$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX	= $_POST['post_sql_database_server_database_table_prefix'];
$_INSTALL_FORM_POST_CREATE_DATABASE_SERVER_DATABASE_NAME	= $_POST['post_sql_create_database_server_database_name'];
$_INSTALL_FORM_POST_SYSTEM_ELECTRONIC_MAIL_ADDRESS		= $_POST['post_system_electronic_mail_address'];
$_INSTALL_FORM_POST_URL_SECURE					= $_POST['post_url_secure'];
$_INSTALL_FORM_POST_URL_CLEARTEXT				= $_POST['post_url_cleartext'];

/*
 ================================================================
 + If Installation Form Has Not Posted, Show Installation Form
 ================================================================
*/

if (!$_INSTALL_FORM_POST_DATABASE_SERVER_HOSTNAME) {

echo ("
		<HR><CENTER><BIG><B>[ <A HREF=\"https://www.SourceForge.net/projects/cerberuscms/files/Documentation/\" TARGET=\"_NEW\" TITLE=\"Read Installation Walkthrough Documentation\">Installation Walkthrough</A> ]</B></BIG></CENTER><HR>
		<BR>
		<FORM ACTION=\"?\" METHOD=\"post\">
		* <I>S.Q.L. Database Server Hostname</I>:<BR>
		[ Usually: 'localhost' ]<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_sql_database_server_hostname\" VALUE=\"localhost\"><BR>
		* <I>S.Q.L. Database Server Access Username</I>:<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_sql_database_server_username\"><BR>
		* <I>S.Q.L. Database Server Access Password</I>:<BR>
			<INPUT TYPE=\"password\" NAME=\"post_sql_database_server_password\"><BR>
		* <I>S.Q.L. Database Server Database Name</I>:<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_sql_database_server_database_name\"><BR>
		* <I>S.Q.L. Database Server Table Prefix</I>:<BR>
		[ Example: 'MySQLDatabaseTables' ]<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_sql_database_server_database_table_prefix\"><BR>
		* <I>Server Notifications Electronic Mail Address</I>:<BR>
		[ For System / Activity Notifications ]<BR>
			<INPUT TYPE=\"text\" NAME=\"post_system_electronic_mail_address\"><BR>
		* <I>Secure Uniform Resource Locator With Path-To-Cerberus Directory</I>:<BR>
		[ SWU, Secure Sockets Layer ( SSL ), Transport Layer Security ( TLS ), etcetera. Example: https://TinkeSoftware.com/Cerberus ]<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_url_secure\"><BR>
		* <I>Clear-Text Uniform Resource Locator With Path-To-Cerberus Directory</I>:<BR>
		[ Example: http://TinkeSoftware.com/Cerberus ]<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_url_cleartext\"><BR>
				<INPUT TYPE=\"checkbox\" NAME=\"post_create_database\"> Mark This To Create This Database<BR>
			<INPUT TYPE=\"submit\" VALUE=\"Start Installation\">
		</FORM><BR><BR>
		<B>[&nbsp;!&nbsp;]&nbsp;*Nix Server Users ( Linux, Unix, B.S.D., G.N.U., etcetera. ): Please <A HREF=\"https://en.wikipedia.org/wiki/Chmod\" TITLE=\"Access Control List // Change-Mode ( CHMOD ) Wikipedia Article\">Change-Mode ( CHMOD )</A> the following<BR>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;directories, subdirectories and each file within these directories to the correct read and write permissions before proceeding with this installation:</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Applications</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Maintenance</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Member</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;System</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Temporary</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Theme</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Upload</B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;*Nix Server Users ( Linux, Unix, B.S.D., G.N.U., etc. ): Please refer to the Installation Manual for a complete list of permissions that should be applied to each individual file.</B><BR><BR>
		<B>[&nbsp;!&nbsp;]&nbsp;This Installation Script is capable of setting the correct permissions to each directory and file. Click [ <A HREF=\"?InternalApplication&#61;File_Permissions\" TITLE=\"Run Permissions Settings Loop\">here</A> ] to run the File Permissions Loop.</B><BR>
		<B>[&nbsp;!&nbsp;]&nbsp;Microsoft Windows Server Users: All of Cerberus' Files are set to the 'Read Only' flag by default. In order to install Cerberus correctly you must remove the 'Read Only' flag on each file listed in the Installation Walkthrough.<BR>
		<B>[&nbsp;!&nbsp;]&nbsp;If you would like additional security for the Administration Control Panel please configure an <I>.htaccess</I> file and then install that configured <I>.htaccess</I> file into the <I>./Module/Administration/</I> directory before proceeding with this installation.</B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;Cerberus Content Management Systems' programming code has been tested manually as well as by vulnerability and exploit scanning software<BR>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and the entire system has passed checks against all rudimentary vulnerabilities and exploit techniques, such as:<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;S.Q.L. Injection Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Cookie Injection Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;MD-5 / SHA-128 / SHA-256 Hash Decryption Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Cross Site Scripting Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Large File Upload Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Local and Remote File Inclusion Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Local and Remote Code Execution Attacks<BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;Please keep this server software, this server operating system kernels and its applications up-to-date as well as set server security policies that comply with security standards to prevent any exploitation of the data on this server.<BR>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It is up to the Administrator of this Web Server that is running Cerberus Content Management System to install Cerberus correctly by following each of the important steps stated above,<BR>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;as well as all of the steps outlined in the documentation file for this project - not doing so may leave the Internal System open to attacks. Double check the steps before proceeding.</B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;This Installation Application has not been secured from vulnerabilities. Do not leave this Installation Script on a live server for longer than is needed to install Cerberus Content Management System.<BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;If you are unable to install the S.Q.L. Tables automatically by this application, please click [ <A HREF=\"./Installation/MySQL/MySQL_Generator.php\" TITLE=\":: Open & Display The S.Q.L. Data Generator Application ::\" TARGET=\"_NEW\">here</A> ] to manually generate the S.Q.L. Structure and S.Q.L. Data.<BR>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Once the S.Q.L. Structure and its data is generated correctly, copy the S.Q.L. Tables with generated Prefix Name and then manually paste the generated S.Q.L. Data Structure into your server S.Q.L. Manager / Editor.</B><BR><BR>

		<B>[&nbsp;+&nbsp;]&nbsp;Post-Installation Tools:</B><BR>
		<B>=>&nbsp;<A HREF=\"./Installation/MySQL/MySQL_Generator.php\" TARGET=\"_NEW\" TITLE=\":: Open & Display The S.Q.L. Data Structure Generator Application ::\">S.Q.L. Data Structure Generator</A><BR>
		<B>=>&nbsp;<A HREF=\"./Installation/ToolKit/Installation_ToolKit.php\" TARGET=\"_NEW\" TITLE=\":: Open & Display The Post-Installation ToolKit ::\">Post-Installation Toolkit</A><BR>
		<B>=>&nbsp;<A HREF=\"?InternalApplication&#61;File_Permissions\" TITLE=\":: Open & Display The Change-Mode ( CHMOD ) File Permissions Loop ::\">File Permissions Loop</A><BR>
		<B>=>&nbsp;<A HREF=\"./Maintenance/Diagnostics/Diagnostics.php\" TARGET=\"_NEW\" TITLE=\":: Open & Display The System Diagnostics Application ::\">System Diagnostics Application</A><BR><BR>

		<B>[&nbsp;+&nbsp;]&nbsp;Server Software, Server Software Engine Versions and Extended Information:</B><BR><BR>

		<B>Detailed Server Software and User-Interface Information:</B><BR>
		<B>=></B>&nbsp;<A HREF=\"?InternalApplication&#61;ServerSoftware_Information\" TITLE=\":: View Detailed Information About What Server Software Versions Are Currently Running On This Web Server ::\">Information About What Server Software Versions Are Currently Running On This Web Server</A><BR><BR>

		<B>Cerberus Content Management System Information:</B><BR>
		<B>=></B>&nbsp;<A HREF=\"?InternalApplication&#61;Cerberus_Information\" TITLE=\":: View Detailed Information About What Cerberus Content Management System Version Is Currently Running On This Web Server ::\">Information About What CerberusCMS Version Is Currently Running On This Web Server</A><BR><BR>
		
		<B>Post Hypertext Preprocessor ( PHP ) Interpreter & Zend Engine Information:</B><BR>
		<B>=></B>&nbsp;<A HREF=\"?InternalApplication&#61;PHP_Information\" TITLE=\":: View Detailed Information About What PHP Version Is Currently Running On This Web Server ::\">Information About What PHP Server Engine Is Currently Running On This Web Server</A></B><BR>
		<B>=></B>&nbsp;<A HREF=\"?InternalApplication&#61;PHP_Extensions\" TITLE=\":: View Detailed Information About What PHP Server Extensions Are Currently Loaded On The PHP Engine Running On This Web Server ::\">Information About What PHP Extensions Are Currently Loaded On The Executed PHP Engine</A></B><BR><BR>

		<B>[&nbsp;+&nbsp;]&nbsp;Internal Documents:</B><BR>
		<B>=></B>&nbsp;<A HREF=\"About.txt\" TITLE=\"View The About File\">About</A><BR>
		<B>=></B>&nbsp;<A HREF=\"Bug_Tracker.txt\" TITLE=\"View The Bug Tracker File\">Bug Tracker</A><BR>
		<B>=></B>&nbsp;<A HREF=\"Change-Log.txt\" TITLE=\"View The Change Log File\">Change Log</A><BR>
		<B>=></B>&nbsp;<A HREF=\"File-List.txt\" TITLE=\"View The File List Document - This Document Was Generated By The Programmers of Cerberus, It Shows Detailed File and Directory Listings, Progress Reports On Files Within The Default Cerberus Releases\">File List</A><BR>
		<B>=></B>&nbsp;<A HREF=\"License.txt\" TITLE=\"View The License File\">License</A><BR>
		<B>=></B>&nbsp;<A HREF=\"Read_Me.txt\" TITLE=\"View The Read Me File\">Read Me</A><BR>
		<B>=></B>&nbsp;<A HREF=\"To-Do.txt\" TITLE=\"View The To Do Notes File\">To Do Notes</A><BR>
		<B>=></B>&nbsp;<A HREF=\"Version.txt\" TITLE=\"View The Version Notes File\">Version Notes</A><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;Hand Modify and Configure These Specific Documents Before Proceeeding With This Installation:</B><BR>
		<B>=>&nbsp;</B><A HREF=\"robots.txt\" TITLE=\"View The Robots File\">Robots</A><BR>
		<B>=>&nbsp;</B><A HREF=\"TOS-PP.txt\" TITLE=\"View The Terms of Service & Privacy Policy File\">Terms of Service & Privacy Policy</A><BR><BR>
");

} else {

/*
 ================================================================
 + If Installation Form Has Posted Without Database Server Database 
 + Name Create Option, Execute Installation Details
 ================================================================
*/

if (!$_INSTALL_FORM_POST_CREATE_DATABASE_SERVER_DATABASE_NAME) {

/*
 ================================================================
 + Delete Original System Database Server Configuration File
 ================================================================
*/

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Secure-Deleting Original System Configuration File...<BR>");

		unlink("./System/Configuration/Global_SQL_Server_Configuration.php");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Creating New System Configuration File With Installer Specifications...<BR>");

/*
 ================================================================
 + Create New System Database Server Configuration File
 ================================================================
*/

/*
 ================================================================
 + Define New System Database Server Configuration File Variables
 ================================================================
*/

$_ACCESS_FILE_FILENAME				= "./System/Configuration/Global_SQL_Server_Configuration.php";
$_ACCESS_FILE_DATA				= "<?PHP
\$_ACCESS_SYSTEM_ELECTRONIC_MAIL_ADDRESS	= \"$_INSTALL_FORM_POST_SYSTEM_ELECTRONIC_MAIL_ADDRESS\";
\$_ACCESS_DATABASE_SERVER_HOSTNAME 		= \"$_INSTALL_FORM_POST_DATABASE_SERVER_HOSTNAME\";
\$_ACCESS_DATABASE_SERVER_USERNAME 		= \"$_INSTALL_FORM_POST_DATABASE_SERVER_USERNAME\";
\$_ACCESS_DATABASE_SERVER_PASSWORD 		= \"$_INSTALL_FORM_POST_DATABASE_SERVER_PASSWORD\";
\$_ACCESS_DATABASE_SERVER_DATABASE_NAME 	= \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_NAME\";
\$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX = \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\";
\$_ACCESS_URL_CLEARTEXT 			= \"$_INSTALL_FORM_POST_URL_CLEARTEXT\";
\$_ACCESS_URL_SECURE 				= \"$_INSTALL_FORM_POST_URL_SECURE\";
?>
";

/*
 ================================================================
 + Write Data To New System Configuration File
 ================================================================
*/

$_OPEN_ACCESS_FILE_FILENAME 						= fopen($_ACCESS_FILE_FILENAME, "w");

fwrite($_OPEN_ACCESS_FILE_FILENAME, "$_ACCESS_FILE_DATA");
fclose($_OPEN_ACCESS_FILE_FILENAME);

echo ("
								<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT>&nbsp;Configuration Files Created !<BR><BR>
								&nbsp;*&nbsp;<A HREF=\"?InternalApplication&#61;Install_Defaults\" TITLE=\":: Install Administration Account ::\">Install Administration Account</A><BR>
								&nbsp;*&nbsp;<A HREF=\"?InternalApplication&#61;Unlink_Installation\" TITLE=\":: Unlink and Secure-Delete All Installation Files ::\">Skip To Removing The Installation Files Without Installing The Administration Account</A>");

} else {

/*
 ================================================================
 + Attempt To Use Installation Form Post Data
 ================================================================
*/

/*
 ================================================================
 + Connect To Specified Database Server
 ================================================================
*/

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Attempting Connection To Specified Database Server Host Name... Please Wait.<BR>");

$_MAIN_INSTALLATION_DATABASE_CONNECTION	= mysql_connect($_INSTALL_FORM_POST_DATABASE_SERVER_HOSTNAME, $_INSTALL_FORM_POST_DATABASE_SERVER_USERNAME, $_INSTALL_FORM_POST_DATABASE_SERVER_PASSWORD);

if ($_MAIN_INSTALLATION_DATABASE_CONNECTION) {

	echo ("[ Connected ]<BR>");

/*
 ================================================================
 + Create Specified Database Name
 ================================================================
*/

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Creating Specified Database Name... Please Wait.<BR>");

$_MAIN_INSTALLATION_DATABASE_CREATE					= mysql_query("CREATE DATABASE $_INSTALL_FORM_POST_CREATE_DATABASE_SERVER_DATABASE_NAME") or die(mysql_error());

/*
 ================================================================
 + Connect To Created Database Server
 ================================================================
*/

if ($_MAIN_INSTALLATION_DATABASE_CREATE) {

	echo ("[ Done ]<BR>");
	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Attempting Connection To Created Database Name: <I>$_INSTALL_FORM_POST_CREATE_DATABASE_SERVER_DATABASE_NAME</I>... Please Wait.<BR>");

$_MAIN_INSTALLATION_SELECT_DATABASE					= mysql_select_db($_INSTALL_FORM_POST_CREATE_DATABASE_SERVER_DATABASE_NAME);

/*
 ================================================================
 + Install Default S.Q.L. Structure
 ================================================================
*/

if ($_MAIN_INSTALLATION_SELECT_DATABASE) {

	echo ("[ Done ]<BR>");
	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing S.Q.L. Server Database Structure... Please Wait.<BR>");

/*
 ================================================================
 + Install Default S.Q.L. Server Database Tables
 ================================================================
*/

mysql_query("CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_applications (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
application_file_name VARCHAR(100),
application_file_permission CHAR(1),
application_file_status CHAR(1),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_applications_custom (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
custom_application_data TEXT,
custom_application_name VARCHAR(250),
custom_application_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_application_links (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
application_link_name VARCHAR(250),
application_link_row CHAR(3),
application_link_url VARCHAR(250),
PRIMARY KEY (id)
");


mysql_query("CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_articles (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
article_author VARCHAR(50),
article_data TEXT,
article_time VARCHAR(50),
article_title VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_banned_networks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
string_dns_address VARCHAR(128),
string_ip_address VARCHAR(128),
text_dns_address TEXT,
text_ip_address TEXT,
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_blocks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
block_file_name VARCHAR(250),
block_alignment CHAR(1),
block_row CHAR(2),
block_file_status CHAR(1),
block_title VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_comments (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
comment_author VARCHAR(50),
comment_data TEXT,
comment_application_id CHAR(20),
comment_application_name VARCHAR(100),
comment_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_file_categories (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
file_category_description VARCHAR(250),
file_category_time VARCHAR(50),
file_category_title VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_files (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
file_author VARCHAR(50),
file_category VARCHAR(250),
file_description TEXT,
file_image VARCHAR(50),
file_location VARCHAR(50),
file_number_of_downloads CHAR(15),
file_time VARCHAR(50),
file_title VARCHAR(50),
file_uploader VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_forum_forum (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
forum_access_level CHAR(1),
forum_date VARCHAR(50),
forum_description TEXT,
forum_title VARCHAR(200),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_forum_post (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
post_access_level CHAR(1),
post_author VARCHAR(50),
post_data TEXT,
post_date VARCHAR(50),
post_last_edit VARCHAR(50),
post_topic_id CHAR(20),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_forum_topic (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
topic_access_level CHAR(1),
topic_date VARCHAR(50),
topic_description TEXT,
topic_forum_id CHAR(20),
topic_last_post VARCHAR(50),
topic_last_poster CHAR(20),
topic_title VARCHAR(200),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_links (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
link_author VARCHAR(50),
link_description TEXT,
link_time VARCHAR(50),
link_title VARCHAR(50),
link_url VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_members (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
member_access_level CHAR(1),
member_active_status VARCHAR(14),
member_authorized_ip_address VARCHAR(250),
member_avatar VARCHAR(50),
member_banned_status CHAR(1),
member_bitcoin_address VARCHAR(250),
member_discord VARCHAR(250),
member_electronic_mail_address CHAR(250),
member_experience_amount CHAR(10),
member_facebook VARCHAR(250),
member_first_name CHAR(100),
member_homepage CHAR(250),
member_icq VARCHAR(250),
member_instagram VARCHAR(250),
member_ip_address_authorized VARCHAR(250),
member_ip_address_last_known VARCHAR(250),
member_ip_address_log TEXT,
member_join_date VARCHAR(50),
member_keybase VARCHAR(250),
member_language VARCHAR(20),
member_last_login VARCHAR(100),
member_last_name CHAR(50),
member_last_post VARCHAR(100),
member_linkedin VARCHAR(250),
member_location VARCHAR(250),
member_middle_name CHAR(50),
member_mood VARCHAR(250),
member_music VARCHAR(250),
member_newsletter CHAR(1),
member_number_of_posts CHAR(10),
member_password VARCHAR(250),
member_pgp_key_block TEXT,
member_picture VARCHAR(45),
member_profile_about TEXT,
member_rank CHAR(1),
member_signature VARCHAR(250),
member_skype VARCHAR(250),
member_snapchat VARCHAR(250),
member_sound CHAR(1),
member_spotify VARCHAR(250),
member_t_logged CHAR(1),
member_t_random VARCHAR(32),
member_theme VARCHAR(50),
member_twitter VARCHAR(250),
member_username VARCHAR(50),
member_youtube VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_messenger_plain_text_file_chat_room (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
chat_room_name VARCHAR(100),
chat_room_entry_password VARCHAR(100),
chat_room_deletion_password VARCHAR(100),
chat_room_creation_author VARCHAR(100),
chat_room_creation_author_device_ip_address VARCHAR(100),
chat_room_creation_author_system_access_level VARCHAR(100),
chat_room_creation_date VARCHAR(100),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_messenger_plain_text_chat_room_messages (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
chat_room_name VARCHAR(100),
chat_room_message TEXT,
chat_room_message_author VARCHAR(100),
chat_room_message_author_system_access_level CHAR(1),
chat_room_message_author_device_fingerprint VARCHAR(300),
chat_room_message_author_device_ip_address VARCHAR(300),
chat_room_message_author_device_remote_hostname VARCHAR(300),
chat_room_message_author_device_remote_request_method VARCHAR(300),
chat_room_message_author_device_remote_user_agent VARCHAR(300),
chat_room_message_date VARCHAR(100),
chat_room_creation_date VARCHAR(100),
chat_room_message_id TEXT,
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_messenger_encrypted_text_file_chat_room (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
messenger_plain_text_file_chat_room_name VARCHAR(100),
messenger_plain_text_file_chat_room_creation_date VARCHAR(100),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_news (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
news_author VARCHAR(50),
news_avatar VARCHAR(50),
news_data TEXT,
news_mood VARCHAR(250),
news_music VARCHAR(250),
news_rss_rfc TEXT,
news_time VARCHAR(50),
news_title VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_news_submissions (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
news_submission_author VARCHAR(50),
news_submission_data TEXT,
news_submission_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_private_messages (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
private_message_from VARCHAR(50),
private_message_recipient VARCHAR(50),
private_message_subject VARCHAR(250),
private_message_data TEXT,
private_message_sent_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_ranks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
rank_1 VARCHAR(100),
rank_2 VARCHAR(100),
rank_3 VARCHAR(100),
rank_4 VARCHAR(100),
rank_5 VARCHAR(100),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_settings (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
settings_safeHTML_directory VARCHAR(50),
settings_safeHTML_status CHAR(1),
settings_cookie_time VARCHAR(10),
settings_gzip_status CHAR(1),
settings_image_extension CHAR(3),
settings_language_directory VARCHAR(50),
settings_offline_status CHAR(1),
settings_site_title VARCHAR(250),
settings_smileys_directory VARCHAR(50),
settings_sound_extension VARCHAR(4),
settings_theme_directory VARCHAR(50),
settings_upload_size_private CHAR(15),
settings_upload_size_public CHAR(15),
settings_text_editor_directory VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_shouts (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
shout_author VARCHAR(50),
shout_data VARCHAR(250),
shout_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_statistics (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
statistics_total_number_of_page_views CHAR(15),
statistics_installation_date VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\"_system_message (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
system_message_author VARCHAR(50),
system_message_data TEXT,
system_message_member VARCHAR(50),
PRIMARY KEY (id)
");

		echo ("[ Done ]<BR>");

		echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Attempting Creation of Database Access System Configuration File...<BR>");

/*
 ================================================================
 + Create New System Database Server Configuration File
 ================================================================
*/

/*
 ================================================================
 + Define New System Database Server Configuration File S.Q.L. Connection and Security Variables
 ================================================================
*/

$_ACCESS_FILE_FILENAME				= "./System/Configuration/Global_SQL_Server_Configuration.php";
$_ACCESS_FILE_DATA				= "<?PHP
\$_ACCESS_SYSTEM_ELECTRONIC_MAIL_ADDRESS		= \"$_INSTALL_FORM_POST_SYSTEM_ELECTRONIC_MAIL_ADDRESS\";
\$_ACCESS_DATABASE_SERVER_HOSTNAME 			= \"$_INSTALL_FORM_POST_DATABASE_SERVER_HOSTNAME\";
\$_ACCESS_DATABASE_SERVER_USERNAME 			= \"$_INSTALL_FORM_POST_DATABASE_SERVER_USERNAME\";
\$_ACCESS_DATABASE_SERVER_PASSWORD 			= \"$_INSTALL_FORM_POST_DATABASE_SERVER_PASSWORD\";
\$_ACCESS_DATABASE_SERVER_DATABASE_NAME 		= \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_NAME\";
\$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX 	= \"$_INSTALL_FORM_POST_DATABASE_SERVER_DATABASE_TABLE_PREFIX\";
\$_ACCESS_URL_CLEARTEXT					= \"$_INSTALL_FORM_POST_URL_CLEARTEXT\";
\$_ACCESS_URL_SECURE 					= \"$_INSTALL_FORM_POST_URL_SECURE\";
?>
";

/*
 ================================================================
 + Write Data To New System Configuration File
 ================================================================
*/

$_OPEN_ACCESS_FILE_FILENAME 						= fopen($_ACCESS_FILE_FILENAME, "w");

fwrite($_OPEN_ACCESS_FILE_FILENAME, "$_ACCESS_FILE_DATA");
fclose($_OPEN_ACCESS_FILE_FILENAME);

echo ("[ Done ]<BR><BR>[ <A HREF=\"?InternalApplication&#61;Install_Defaults\" TITLE=\"Install Administrator\">Install Administrator =></A> ]<BR>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I am not able to Connect to the Database Server.<BR>");

} // [ + ] IF_DATABASE_CONNECTION

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Create the Database Server.<BR>");

} // [ + ] IF_CREATE_DATABASE

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I am not able to Connect to the Database Server.<BR>");

} // [ + ] IF_CONNECT

} // [ + ] IF_NULL_CREATE

} // [ + ] IF_NULL_HOST

/*
 ================================================================
 +
 + Internal Application: Install Default Data
 +
 ================================================================
*/

if ( $_GET["InternalApplication"] == "Install_Defaults" ) {

/*
 ================================================================
 + Install Default Data Form Post Variables
 ================================================================
*/

$_POST_ADMINISTRATOR_ELECTRONIC_MAIL_ADDRESS				= $_POST['post_administrator_electronic_mail_address'];
$_POST_ADMINISTRATOR_USERNAME						= $_POST['post_administrator_username'];
$_POST_ADMINISTRATOR_PASSWORD_1						= $_POST['post_administrator_password_1'];
$_POST_ADMINISTRATOR_PASSWORD_2						= $_POST['post_administrator_password_2'];

$_POST_ADMINISTRATOR_ELECTRONIC_MAIL_ADDRESS				= strtolower($_POST_ADMINISTRATOR_ELECTRONIC_MAIL_ADDRESS);

/*
 ================================================================
 + Administration Accounts Password Hashing System
 ================================================================
*/

$_POST_ADMINISTRATOR_PASSWORD_3						= password_hash($_POST_ADMINISTRATOR_PASSWORD_1, PASSWORD_BCRYPT);

/*
 ================================================================
 + If Administrator Form Has Not Posted, Display Create New Administrator Form
 ================================================================
*/

if ((!$_POST_ADMINISTRATOR_USERNAME) || (!$_POST_ADMINISTRATOR_PASSWORD_1) || (!$_POST_ADMINISTRATOR_PASSWORD_2)) {

echo ("
	<HR><CENTER>Create Administration Account</CENTER><HR><BR>
	<FORM ACTION=\"?InternalApplication&#61;Install_Defaults\" METHOD=\"post\">
	Please Create Your Administration Account:<BR>
	It Is Recommended That You Use a Random Password Generator and Password Storage Application Such as KeePass Password Safe<BR>
	Please Click [&nbsp;<A HREF=\"https://KeePass.info/\" TITLE=\"KeePass Password Safe Official Website\" TARGET=\"_NEW\">Here</A>&nbsp;] To Download and Install The KeePass Software Package ]<BR>
	* Administrator Electronic Mail Address:<BR>
	<INPUT TYPE=\"text\" NAME=\"post_administrator_electronic_mail_address\" MAXLENGTH=\"100\"><BR>	
	* Administrator Username:<BR>
	<INPUT TYPE=\"text\" NAME=\"post_administrator_username\" MAXLENGTH=\"50\"><BR><BR>
	* Administrator Password:<BR>
	[ Maximum Password Length: 32 Characters, Alpha-Numeric ]<BR>
	<INPUT TYPE=\"password\" NAME=\"post_administrator_password_1\" MAXLENGTH=\"32\"><BR>
	* Administrator Password:<BR>
	[ Again ]<BR>
	<INPUT TYPE=\"password\" NAME=\"post_administrator_password_2\" MAXLENGTH=\"32\"><BR>
	<INPUT TYPE=\"submit\" VALUE=\"Install Administrator\">
	</FORM><BR>
");

} else {

/*
 ================================================================
 + Check Passwords For Differences: If Passwords Match Exactly, Execute Installation
 ================================================================
*/

if ($_POST_ADMINISTRATOR_PASSWORD_1 == "$_POST_ADMINISTRATOR_PASSWORD_2") {

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Default S.Q.L. Data to Database Server Tables:<BR>");

include_once "./System/Configuration/Global_Configuration.php";

/*
 ================================================================
 + Database Server Connection Variables
 ================================================================
*/

$_MAIN_INSTALLATION_DATA_CONNECT_DATABASE				= mysql_connect($_ACCESS_DATABASE_SERVER_HOSTNAME, $_ACCESS_DATABASE_SERVER_USERNAME, $_ACCESS_DATABASE_SERVER_PASSWORD);
$_MAIN_INSTALLATION_DATA_SELECT_DATABASE				= mysql_select_db($_ACCESS_DATABASE_SERVER_DATABASE_NAME);

/*
 ================================================================
 + Connect To Database Server
 ================================================================
*/

if ($_MAIN_INSTALLATION_DATA_CONNECT_DATABASE) {

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Connected To Database Server Host Name: </I>$_ACCESS_DATABASE_SERVER_HOSTNAME</I> Successfully.<BR>");

/*
 ================================================================
 + Connect To Database Server Database Name
 ================================================================
*/

if ($_MAIN_INSTALLATION_DATA_SELECT_DATABASE) {

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Connected To Database Server Database Name: <I>$_ACCESS_DATABASE_SERVER_DATABASE_NAME</I> Successfully.<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Default Application Module Links... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Application Links
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Active Members','001','?Application_Member&#61;Active_Members')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Applications','002','?Application_Member&#61;Application_List')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Articles','003','?Application_Member&#61;Articles&amp;DisplayID&#61;All')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Audio Player','004','?Application_Member&#61;Audio_Player')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Contact','005','?Application_Member&#61;Contact_Administrator')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Documentation','006','?Application_Member&#61;Documentation')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Files','007','?Application_Member&#61;Files&amp;CategoryID&#61;All')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Forum','008','?Application_Member&#61;Forum&amp;ForumID&#61;All')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Language','009','?Application_Member&#61;Language')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Legal','010','?Application_Member&#61;Legal')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Links','011','?Application_Member&#61;Links&amp;DisplayID&#61;All')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Login','012','?Application_Member&#61;Login')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Member List','013','?Application_Member&#61;Members')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Messenger','014','?Application_Member&#61;Messenger&amp;Display&#61;MessengerOptions')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('News','015','?Application_Member&#61;News')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Referrers','016','?Application_Member&#61;Referrers')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('RSS Feed','017','RSS.php')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Register','018','?Application_Member&#61;Register')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Search','019','?Application_Member&#61;Search')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Statistics','020','?Application_Member&#61;Statistics')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Submit Link','021','?Application_Member&#61;Links&amp;SubmitLink&#61;Yes')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Submit News','022','?Application_Member&#61;Submit_News')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Upload File','023','?Application_Member&#61;Upload')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Video Player','024','?Application_Member&#61;Video_Player')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Welcome!','025','?Application_Custom&#61;1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Applications... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Applications
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Active_Members','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('All_News','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('All_Shouts','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Application_List','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Articles','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Audio_Player','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Change_Password','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Comment','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Contact_Administrator','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Control_Panel','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Documentation','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Update_Profile','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Electronic_Mail','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Files','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Forum','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Friend','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Forward_Friend','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Language','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Legal','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Links','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('List','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Login','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Members','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Messenger','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('News','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Private_Files','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Private_Message','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Profile','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Referrers','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Register','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Reset_Password','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Search','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Statistics','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Submit_News','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('System_Message','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Upload','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Video_Player','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Webspace','1','1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Blocks... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Blocks
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Applications_Panel','0','1','1','<CENTER><B>Applications Panel</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Banned_Networks','0','4','1','<CENTER><B>Banned Networks</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Cerberus_Badges','1','1','1','<CENTER><B>Cerberus Badges</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Language','1','6','1','<CENTER><B>Set Language</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Latest_Articles','0','3','1','<CENTER><B>Latest Articles</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Latest_Files','1','3','1','<CENTER><B>Latest Files</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Latest_Shouts','1','5','1','<CENTER><B>Latest Shouts</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Member_Panel','0','2','1','<CENTER><B>Member Panel</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Newest_Members','1','4','1','<CENTER><B>Newest Members</B></CENTER><HR>')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Specified Administrator Account Details... Please Wait.<BR>");

/*
 ================================================================
 + Install Specified Administrator Account Details
 ================================================================
*/

$_GLOBAL_DATE								= date("l, F j, Y g:i:s A");
$_GLOBAL_DATE_MD5							= md5($_GLOBAL_DATE);

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members(member_access_level,member_avatar,member_banned_status,member_electronic_mail_address,member_experience_amount,member_join_date,member_username,member_newsletter,member_number_of_posts,member_password,member_t_logged,member_t_random,member_sound)VALUES('2','Default.png','0','$_POST_ADMINISTRATOR_ELECTRONIC_MAIL_ADDRESS','0','$_GLOBAL_DATE','$_POST_ADMINISTRATOR_USERNAME','1','1','$_POST_ADMINISTRATOR_PASSWORD_3','1','$_GLOBAL_DATE_MD5','0')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_members(member_access_level,member_avatar,member_banned_status,member_electronic_mail_address,member_first_name,member_last_name,member_experience_amount,member_join_date,member_username,member_newsletter,member_number_of_posts,member_password,member_t_logged,member_t_random,member_sound)VALUES('2','Default.png','0','Cerberus@Localhost.com','Cerberus','Cerberus','0','$_GLOBAL_DATE','Cerberus','1','1','$_POST_ADMINISTRATOR_PASSWORD_3','1','$_GLOBAL_DATE_MD5','0')");

/*
 ================================================================
 + Make and Create Administrator Directory and Files
 ================================================================
*/

mkdir("Member/$_POST_ADMINISTRATOR_USERNAME");
mkdir("Member/$_POST_ADMINISTRATOR_USERNAME/Friend");
mkdir("Member/$_POST_ADMINISTRATOR_USERNAME/Electronic_Mail");
copy("System/Default/Register/Register.html","Member/$_POST_ADMINISTRATOR_USERNAME/index.html");
copy("System/Default/Friend/Friend.cerb","Member/$_POST_ADMINISTRATOR_USERNAME/Electronic_Mail/$_POST_ADMINISTRATOR_ELECTRONIC_MAIL_ADDRESS");
copy("System/Default/Friend/Friend.cerb","Member/Electronic_Mail_Addresses/$_POST_ADMINISTRATOR_ELECTRONIC_MAIL_ADDRESS");
copy("System/Configuration/index.php","Member/$_POST_ADMINISTRATOR_USERNAME/Electronic_Mail/index.php");

/*
 ================================================================
 + Make and Create Backup Administrator Directory ( Cerberus ) and Files
 ================================================================
*/

mkdir("Member/Cerberus");
mkdir("Member/Cerberus/Friend");
mkdir("Member/Cerberus/Electronic_Mail");
copy("System/Default/Register/Register.html","Member/Cerberus/index.html");
copy("System/Default/Friend/Friend.cerb","Member/Cerberus/Electronic_Mail/Cerberus@Localhost");
copy("System/Default/Friend/Friend.cerb","Member/Electronic_Mail_Addresses/Cerberus@Localhost");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Custom Web Applications... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Custom Applications
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_applications_custom(custom_application_data,custom_application_name,custom_application_time)VALUES('Hello and welcome to Cerberus! If you\'re reading this then Cerberus was successfully installed!','Welcome To Cerberus','$_GLOBAL_DATE')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Default Ranking System... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Ranks
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_ranks(rank_1,rank_2,rank_3,rank_4,rank_5)VALUES('Boann','Brigit','Cliodna','Lugh','Danu')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Pre-Configured Settings... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Settings
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_settings(settings_safeHTML_directory,settings_safeHTML_status,settings_cookie_time,settings_gzip_status,settings_image_extension,settings_language_directory,settings_offline_status,settings_site_title,settings_smileys_directory,settings_sound_extension,settings_theme_directory,settings_upload_size_private,settings_upload_size_public,settings_text_editor_directory)VALUES('Default','1','86400','1','png','English','0','Cerberus Content Management System','Default','mp3','Cerberus','256000','10240000','Default')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Statistics... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Statistics
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_statistics(statistics_total_number_of_page_views,statistics_installation_date)VALUES('1','$_GLOBAL_DATE')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example Forum... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Forum
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_forum_forum(forum_access_level,forum_date,forum_description,forum_title)VALUES('1','$_GLOBAL_DATE','This is an Example Forum.','Example Forum #1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example Topic... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Forum Topic
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_forum_topic(topic_access_level,topic_date,topic_description,topic_forum_id,topic_last_post,topic_last_poster,topic_title)VALUES('1','$_GLOBAL_DATE','This is an Example Topic.','1','$_GLOBAL_DATE','Cerberus','Example Topic #1 Within Example Forum #1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example Post... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Topic Post
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_forum_post(post_access_level,post_author,post_data,post_date,post_last_edit,post_topic_id)VALUES('1','Cerberus','This is an Example Post -- you can Administer the Forum via the Administration Control Panel.','$_GLOBAL_DATE','$_GLOBAL_DATE','1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example File Category ( For File Module )... Please Wait.<BR>");

/*
 ================================================================
 + Install Default File Category
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_file_categories(file_category_description,file_category_time,file_category_title)VALUES('This is an Example File Category Entry -- You can Delete this File Category Entry from the Administration Control Panel.','$_GLOBAL_DATE','Example File Category Entry')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example File ( For File Module )... Please Wait.<BR>");

/*
 ================================================================
 + Install Default File
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_files(file_author,file_category,file_description,file_image,file_location,file_number_of_downloads,file_time,file_title,file_uploader)VALUES('None','1','This is an Example File Entry -- You can Delete this Example File Entry from the Administration Control Panel.','0987654321-0987654321.png','0987654321-0987654321.png','1','$_GLOBAL_DATE','Example File','Cerberus')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example Article... Please Wait.<BR>");

/*
 ================================================================
 + Install Default Article
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_articles(article_author,article_data,article_time,article_title)VALUES('Cerberus','This is an Example Article Entry -- You can Delete this Article Entry from the Administration Control Panel.','$_GLOBAL_DATE','Example Article')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example News Item... Please Wait.<BR>");

/*
 ================================================================
 + Install Default News
 ================================================================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_SERVER_DATABASE_TABLE_PREFIX}_news(news_author,news_avatar,news_data,news_mood,news_music,news_rss_rfc,news_time,news_title)VALUES('Cerberus','Default.png','This is an Example News Article Entry -- You can Delete this News Article Entry from the Administration Control Panel.','None','None','Wed, 05 Aug 2009 15:04:18 -0700','$_GLOBAL_DATE','Example News')");

	echo ("[ Done ]<BR>");

	echo ("&nbsp;*&nbsp;<A HREF=\"?InternalApplication&#61;Unlink_Installation\" TITLE=\":: Remove Installation Files ::\">Remove Installation Files</A>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I am not able to Connect.<BR>");

} // [ + ] IF: S.Q.L. Query Install Default S.Q.L. Data

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I am not able to Connect to the Database.<BR>");

} // [ + ] IF: S.Q.L. Server Connect

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, the Password(s) that you have provided me do not match each-other.<BR>");

} // [ + ] IF: Administrator Passwords Are Equal

} // [ + ] IF: Null

} // [ + ] If: Install Default S.Q.L. Data

/*
 ================================================================
 +
 + Internal Application: Unlink and Secure-Delete Installation System
 +
 ================================================================
*/

if ( $_GET["InternalApplication"] == "Unlink_Installation" ) {

	echo ("<HR><CENTER>Unlinking Installation Files</CENTER><HR><BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing Default S.Q.L. Database Server Structure Generator File and Index Files... Please Wait.<BR>");

if (unlink("./Installation/MySQL/MySQL_Generator.php") && unlink("./Installation/MySQL/index.php") && unlink("./Installation/index.php") && unlink("./Installation/ToolKit/index.php") && unlink("./Installation/ToolKit/Installation_ToolKit.php")) {

	echo ("[ Done ]<BR>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Secure-Delete the Files: <I>'./Installation/MySQL/MySQL_Generator.php', './Installation/MySQL/index.php', './Installation/ToolKit/index.php', './Installation/ToolKit/Installation_ToolKit.php'</I> Please manually Secure-Delete this File before proceeding.<BR>");

} // [ + ] IF_UNLINK

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing=>Installation=>MySQL Directory... Please Wait.<BR>");
	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing=>Installation=>ToolKit Directory... Please Wait.<BR>");

if (rmdir("./Installation/MySQL/") && rmdir("./Installation/ToolKit/")) {

	echo ("[ Done ]<BR>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Remove the Directory: './Installation/MySQL/' or './Installation/ToolKit/' Please manually Remove this Directory before proceeding.<BR>");

} // [ + ] IF_RMDIR

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing=>Installation Directory... Please Wait.<BR>");

if (rmdir("./Installation/")) {

	echo ("[ Done ]<BR>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Remove the Directory: './Installation/' Please manually Remove this Directory before proceeding.<BR>");

} // [ + ] IF_RMDIR

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing Installation Files... Please Wait.<BR>");

if (unlink("./Install.php")) {

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Redirecting To This <B>Cerberus Installation</B> Login Page... Please Wait 15 Seconds.<BR><BR>");

	echo ("<META HTTP-EQUIV=Refresh CONTENT=\"15; URL=Cerberus.php?Application_Member=Login\">");

} else {

	echo ("<BIG><FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Secure-Delete the File: 'Install.php' Please manually Secure-Delete this File before proceeding.</BIG><BR>");

} // [ + ] IF_UNLINK

	echo ("<BIG><FONT COLOR=\"#CD0000\">***</FONT> Cerberus: I am Testing the PHP mail() Function. Please wait...</BIG><BR>");

if (mail($_ACCESS_SYSTEM_ELECTRONIC_MAIL_ADDRESS,"Cerberus - Testing mail() Function.","-------This is a test to see if the Web Server PHP mail() Function is working. If you have receieved this electronic mail message Cerberus was installed successfully to your web server-------")) {

	echo ("<BIG><FONT COLOR=\"#CD0000\">***</FONT> Cerberus: I have Tested the PHP mail() Function and it seems to be working.</BIG><BR>");

} else {

	echo ("<BIG><FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, the PHP mail() Function is not working; please fix this before using Cerberus Content Management System.</BIG>");

} // [ + ] IF_SEND_ELECTRONIC_MAIL_MESSAGE

} // [ + ] IF_DELETE

/*
 ================================================================
 +
 + Internal Applications: Information Applications
 +
 ================================================================
*/

 /*
 ================================================================
 + Internal Application: Cerberus System Information
 ================================================================
*/

if ( $_GET["InternalApplication"] == "Cerberus_Information" ) {

echo ("
		<HR><CENTER>Cerberus Content Management System Information</CENTER><HR>
		<B>Cerberus Software Project Version Information</B><BR>
		*&nbsp;Extended Version: <I>$_CERBERUS_VERSION_EXTENDED</I><BR>
		*&nbsp;Short Version: <I>$_CERBERUS_VERSION_SHORT</I><BR><BR>

		<B>Official Cerberus Software Project Web Servers</B><BR><BR>

		Software Project GIT Hosting<BR>
		*&nbsp;BITBucket Secure Server <I>$_TINKESOFTWARE_SERVER_URL_BITBUCKET_SECURE</I><BR>
		*&nbsp;BITBucket Clear-Text Server <I>$_TINKESOFTWARE_SERVER_URL_BITBUCKET_CLEARTEXT</I><BR><BR>

		*&nbsp;GITHub Secure Server <I>$_TINKESOFTWARE_SERVER_URL_GITHUB_SECURE</I><BR>
		*&nbsp;GITHub Clear-Text Server <I>$_TINKESOFTWARE_SERVER_URL_GITHUB_CLEARTEXT</I><BR><BR>

		*&nbsp;GITLab Secure Server <I>$_TINKESOFTWARE_SERVER_URL_GITLAB_SECURE</I><BR>
		*&nbsp;GITLab Clear-Text Server <I>$_TINKESOFTWARE_SERVER_URL_GITLAB_CLEARTEXT</I><BR><BR>

		External Software Project Hosting<BR>
		*&nbsp;Source Forge Secure Server: <I>$_TINKESOFTWARE_SERVER_URL_SOURCEFORGE_SECURE</I><BR>
		*&nbsp;Source Forge Clear-Text Server: <I>$_TINKESOFTWARE_SERVER_URL_SOURCEFORGE_CLEARTEXT</I><BR><BR>

		Tinke Software Internal Project Hosting<BR>
		*&nbsp;Data Validation Secure Server: <I>$_TINKESOFTWARE_SERVER_URL_SECURE/CerberusCMS</I><BR>
		*&nbsp;Data Validation Clear-Text Server: <I>$_TINKESOFTWARE_SERVER_URL_CLEARTEXT/CerberusCMS</I><BR><BR>

		Tinke Software Official Servers<BR>
		*&nbsp;Data Validation Secure Server: <I>$_TINKESOFTWARE_SERVER_URL_SECURE</I><BR>
		*&nbsp;Data Validation Clear-Text Server: <I>$_TINKESOFTWARE_SERVER_URL_CLEARTEXT</I>
");

} // [ + ] IF_GET: InternalApplication->Cerberus_Information

/*
 ================================================================
 + Internal Application: PHP Server Engine Information
 ================================================================
*/

if ( $_GET["InternalApplication"] == "PHP_Information" ) {

	echo ("<HR>Currenty Running PHP Server Engine Information<HR><BR>");
	phpinfo();
	echo ("<BR>");

} // [ + ] IF_GET: InternalApplication->PHP_Information

/*
 ================================================================
 + Internal Application: PHP Extensions
 ================================================================
*/

if ( $_GET["InternalApplication"] == "PHP_Extensions" ) {

	echo ("<HR>Currently Loaded PHP Extensions<HR><BR>");
	print_r(get_loaded_extensions());
	echo ("<BR>");

} // [ + ] IF_GET: InternalApplication->PHP_Extensions

/*
 ================================================================
 + Internal Application: File Permissions
 ================================================================
*/

if ( $_GET["InternalApplication"] == "File_Permissions" ) {

echo ("
		<HR>
			Directories, Files and Permissions List
		<HR>
			Nothing here yet.
");

} // [ + ] IF_GET: InternalApplication->File_Permissions

/*
 ================================================================
 + Internal Application: Cerberus System Information
 ================================================================
*/

if ( $_GET["InternalApplication"] == "ServerSoftware_Information" ) {

echo ("
		<HR>
			<B>Detailed Server Software Information</B>
		<HR>

<B>Server Date and Time Information</B><BR>
*&nbsp;Server Date: $_GLOBAL_DATE<BR>
*&nbsp;Server Date ( RFC ): $_GLOBAL_DATE_RFC<BR>
*&nbsp;Server Time ( Minutes ):$_GLOBAL_DATE_MINUTES<BR>
*&nbsp;Server Time ( Seconds ):$_GLOBAL_DATE_SECONDS<BR><BR>

<B>Remote Server Software Information</B><BR>
*&nbsp;Server Remote Address: $_GLOBAL_REMOTE_SERVER_ADDRESS<BR>
*&nbsp;Server Remote HostName: $_GLOBAL_REMOTE_SERVER_HOSTNAME<BR>
*&nbsp;Server Remote Port: $_GLOBAL_REMOTE_SERVER_PORT<BR>
*&nbsp;Server Remote User: $_GLOBAL_REMOTE_USER<BR><BR>

<B>Local Server Software Information</B><BR>
*&nbsp;Server Gateway Interface: $_GLOBAL_SERVER_GATEWAY_INTERFACE<BR>
*&nbsp;Server Address: $_GLOBAL_SERVER_ADDRESS<BR>
*&nbsp;Server Name: $_GLOBAL_SERVER_NAME<BR>
*&nbsp;Server Software: $_GLOBAL_SERVER_SOFTWARE<BR>
*&nbsp;Server Protocol: $_GLOBAL_SERVER_PROTOCOL<BR>
");

} // [ + ] IF_GET: InternalApplication->ServerSoftware_Information

/*
 ================================================================
 +
 + Hyper-Text-Markup-Language Document: End
 +
 ================================================================
*/

	echo ("<HR><CENTER>Copyright <BIG><B>&copy;</B></BIG> <A HREF=\"https://www.GitHub.com/TinkeSoftware\" TARGET=\"_NEW\" TITLE=\"Tinke Software On :: GitHub\">Tinke Software</A>, <A HREF=\"https://www.SourceForge.net/projects/cerberuscms\" TITLE=\"Cerberus Content Management System Project On :: SourceForge\">Cerberus Content Management System</A>, <A HREF=\"mailto:GCJohnsonChevalier@Protonmail.com\" TITLE=\"Send Electronic Mail Message To :: GCJohnsonChevalier@Protonmail.com\">Gary Christopher Johnson</A>, 2005 - 2023.</CENTER><HR></TD></TR></TABLE>
	</BODY>
</HTML>
");
?>
