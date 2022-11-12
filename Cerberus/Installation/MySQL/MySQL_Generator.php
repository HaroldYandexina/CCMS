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
 + MyS.Q.L. Generator
 +
 +
 ================================================================
*/

error_reporting("E_WARNING ^ E_NOTICE");

/*
 ================================================================
 +
 +
 + Global Variables
 +
 +
 ================================================================
*/

$_GLOBAL_DATE								= date("l, F j, Y g:i:s A");
$_GLOBAL_DATE_MD5							= md5($_GLOBAL_DATE);

/*
 ================================================================
 +
 +
 + Hyper-Text-Markup-Language Header Output
 +
 +
 ================================================================
*/

echo ("
<HTML>
	<HEAD>
		<TITLE>Cerberus S.Q.L. Tables Generator</TITLE>
		<LINK REL=\"stylesheet\" HREF=\"../../Theme/Cerberus/Style_Sheet/Style.css\" TYPE=\"text/css\">
		<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\">
	</HEAD>

	<BODY>
		<HR><CENTER>[ <A HREF=\"?\" TITLE=\":: Reload The S.Q.L. Generation Form ::\">Cerberus Content Management System S.Q.L. Database Structure Generator</A> ]</CENTER><HR><BR>
");

/*
 ================================================================
 +
 +
 + Post Variables
 +
 +
 ================================================================
*/

$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX 				= $_POST['post_database_prefix'];
$_MySQL_Generator_POST_ADMINISTRATION_USERNAME				= $_POST['post_administration_username'];
$_MySQL_Generator_POST_ADMINISTRATION_PASSWORD				= $_POST['post_administration_password'];

/*
 ================================================================
 +
 +
 + Password Hashing System
 +
 +
 ================================================================
*/

$_MySQL_Generator_POST_ADMINISTRATION_PASSWORD_HASH			= password_hash($_MySQL_Generator_POST_ADMINISTRATION_PASSWORD, PASSWORD_BCRYPT);
$_MySQL_Generator_ADMINISTRATION_PASSWORD_HASH_MD5			= md5($_MySQL_Generator_POST_ADMINISTRATION_PASSWORD);

/*
 ================================================================
 +
 +
 + S.Q.L. Tables Generation Form
 +
 +
 ================================================================
*/

echo ("
		S.Q.L. Tables Generation Form<BR><BR>
		<FORM ACTION=\"?\" METHOD=\"POST\">
			<I>Name This Database Prefix</I>:<BR>
			[ **DO NOT** Place Any Underscores Or Symbols ]<BR>
				<INPUT TYPE=\"TEXT\" NAME=\"post_database_prefix\" VALUE=\"Cerberus\"><BR><BR>
			<I>Administration Account UserName</I>:<BR>
				<INPUT TYPE=\"TEXT\" NAME=\"post_administration_username\"><BR><BR>
			<I>Administration Account Password</I>:<BR>
			[ It Is Recommended To Use a Password Generation and Password Storage Application Such As KeePass ]<BR>
			[ When Using a Password Generator: Set Options To 50 Random Characters ]<BR>
				<INPUT TYPE=\"PASSWORD\" NAME=\"post_administration_password\"><BR>
			<INPUT TYPE=\"SUBMIT\" VALUE=\"Generate S.Q.L. Database Structure\"><BR>
		</FORM>
");

if ($_MySQL_Generator_POST_ADMINISTRATION_USERNAME) {

/*
 ================================================================
 +
 +
 + MySQL Tables Generator
 +
 +
 ================================================================
*/

$_MySQL_Generator_PRINT_MySQL_TABLES	= "

/* $_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX */

/* Application Modules */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
application_file_name VARCHAR(100),
application_file_permission CHAR(1),
application_file_status CHAR(1),
PRIMARY KEY (id)
);

/* Custom Application Modules */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications_custom (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
custom_application_data TEXT,
custom_application_name VARCHAR(250),
custom_application_time VARCHAR(50),
PRIMARY KEY (id)
);

/* Application Module Links */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
application_link_name VARCHAR(250),
application_link_row CHAR(3),
application_link_url VARCHAR(250),
PRIMARY KEY (id)
);

/* Articles */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_articles (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
article_author VARCHAR(50),
article_data TEXT,
article_time VARCHAR(50),
article_title VARCHAR(50),
PRIMARY KEY (id)
);

/* Internet Protocol Address Management */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_banned_networks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
string_dns_address VARCHAR(128),
string_ip_address VARCHAR(128),
text_dns_address TEXT,
text_ip_address TEXT,
PRIMARY KEY (id)
);

/* Blocks */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
block_file_name VARCHAR(250),
block_alignment CHAR(1),
block_row CHAR(2),
block_file_status CHAR(1),
block_title VARCHAR(250),
PRIMARY KEY (id)
);

/* Comments */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_comments (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
comment_author VARCHAR(50),
comment_data TEXT,
comment_application_id CHAR(20),
comment_application_name VARCHAR(100),
comment_time VARCHAR(50),
PRIMARY KEY (id)
);

/* File Categories */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_file_categories (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
file_category_description VARCHAR(250),
file_category_time VARCHAR(50),
file_category_title VARCHAR(50),
PRIMARY KEY (id)
);

/* Files */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_files (
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
);

/* Forum */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_forum (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
forum_access_level CHAR(1),
forum_date VARCHAR(50),
forum_description TEXT,
forum_title VARCHAR(200),
PRIMARY KEY (id)
);

/* Forum Posts */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_post (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
post_access_level CHAR(1),
post_author VARCHAR(50),
post_data TEXT,
post_date VARCHAR(50),
post_last_edit VARCHAR(50),
post_topic_id CHAR(20),
PRIMARY KEY (id)
);

/* Forum Topics */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_topic (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
topic_access_level CHAR(1),
topic_date VARCHAR(50),
topic_description TEXT,
topic_forum_id CHAR(20),
topic_last_post VARCHAR(50),
topic_last_poster CHAR(20),
topic_title VARCHAR(200),
PRIMARY KEY (id)
);

/* External Links */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_links (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
link_author VARCHAR(50),
link_description TEXT,
link_time VARCHAR(50),
link_title VARCHAR(50),
link_url VARCHAR(250),
PRIMARY KEY (id)
);

/* Members */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_members (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
member_access_level CHAR(1),
member_avatar VARCHAR(50),
member_banned_status CHAR(1),
member_location VARCHAR(250),
member_electronic_mail_address CHAR(250),
member_experience_amount CHAR(10),
member_first_name CHAR(100),
member_homepage CHAR(250),
member_join_date VARCHAR(50),
member_language VARCHAR(20),
member_last_name CHAR(50),
member_last_post VARCHAR(100),
member_mood VARCHAR(250),
member_music VARCHAR(250),
member_username VARCHAR(50),
member_newsletter CHAR(1),
member_number_of_posts CHAR(10),
member_online_status VARCHAR(14),
member_password VARCHAR(250),
member_picture VARCHAR(45),
member_profile_about TEXT,
member_rank CHAR(1),
member_signature VARCHAR(250),
member_sound CHAR(1),
member_t_logged CHAR(1),
member_t_random VARCHAR(32),
member_theme VARCHAR(50),
member_icq VARCHAR(250),
member_facebook VARCHAR(250),
member_twitter VARCHAR(250),
member_instagram VARCHAR(250),
member_skype VARCHAR(250),
member_spotify VARCHAR(250),
member_linkedin VARCHAR(250),
member_snapchat VARCHAR(250),
member_youtube VARCHAR(250),
member_discord VARCHAR(250),
member_pgp_key_block TEXT,
member_bitcoin_address VARCHAR(250),
member_keybase VARCHAR(250),
member_ip_address VARCHAR(250),
member_authorized_ip_address VARCHAR(250),
PRIMARY KEY (id)
);

/* Messenger->Plain-Text-File Chat Room System */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_messenger_plain_text_file_chat_room (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
chat_room_name VARCHAR(100),
chat_room_creation_author VARCHAR(100),
chat_room_creation_author_device_ip_address VARCHAR(100),
chat_room_creation_author_system_access_level VARCHAR(100),
chat_room_creation_date VARCHAR(100),
PRIMARY KEY (id)
);

/* Messenger->Plain-Text Chat Room System */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_messenger_plain_text_chat_room_messages (
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
);

/* Messenger->Encrypted-Text-File Chat Room System */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_messenger_encrypted_text_file_chat_room (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
messenger_plain_text_file_chat_room_name VARCHAR(100),
messenger_plain_text_file_chat_room_creation_date VARCHAR(100),
PRIMARY KEY (id)
);

/* News */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_news (
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
);

/* News Submissions */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_news_submissions (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
news_submission_author VARCHAR(50),
news_submission_data TEXT,
news_submission_time VARCHAR(50),
PRIMARY KEY (id)
);

/* Private Messages */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_private_messages (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
private_message_from VARCHAR(50),
private_message_recipient VARCHAR(50),
private_message_subject VARCHAR(250),
private_message_data TEXT,
private_message_sent_time VARCHAR(50),
PRIMARY KEY (id)
);

/* Ranking System */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ranks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
rank_1 VARCHAR(100),
rank_2 VARCHAR(100),
rank_3 VARCHAR(100),
rank_4 VARCHAR(100),
rank_5 VARCHAR(100),
PRIMARY KEY (id)
);

/* System Settings */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_settings (
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
);

/* Shout Messages */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_shouts (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
shout_author VARCHAR(50),
shout_data VARCHAR(250),
shout_time VARCHAR(50),
PRIMARY KEY (id)
);

/* Statistics */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_statistics (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
statistics_total_number_of_page_views CHAR(15),
statistics_installation_date VARCHAR(50),
PRIMARY KEY (id)
);

/* System Messages */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_system_message (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
system_message_data TEXT,
system_message_member VARCHAR(50),
PRIMARY KEY (id)
);
";

/*
 ================================================================
 +
 +
 + Data Strings From Installation File
 +
 +
 ================================================================
*/

$_MySQL_Generator_PRINT_MySQL_TABLE_STRINGS	= "

/* Application Links */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Active Members','013','?Application&#61;Active_Members');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Applications','001','?Application_List');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Articles','002','?Application&#61;Articles&amp;DisplayID&#61;All');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Audio Player','003','?Application&#61;Audio_Player');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Contact','004','?Application&#61;Contact_Admin');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Documentation','005','?Application&#61;Documentation');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Files','006','?Application&#61;Files&amp;CategoryID&#61;All');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Forum','007','?Application&#61;Forum&amp;ForumID&#61;All');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Language','008','?Application&#61;Language');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Legal','009','?Application&#61;Legal');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Links','010','?Application&#61;Links&amp;DisplayID&#61;All');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Login','011','?Application&#61;Login');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Member List','012','?Application&#61;Members');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Messenger','014','?Application&#61;Messenger&amp;Display&#61;MessengerOptions');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('News','015','?Application&#61;News');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Referrers','016','?Application&#61;Referrers');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('RSS Feed','017','RSS.php');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Register','018','?Application&#61;Register');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Search','019','?Application&#61;Search');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Statistics','020','?Application&#61;Statistics');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Submit Link','021','?Application&#61;Links&amp;SubmitLink&#61;Yes');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Submit News','022','?Application&#61;Submit_News');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Upload File','023','?Application&#61;Upload');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Video Player','024','?Application&#61;Video_Player');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_application_links(application_link_name,application_link_row,application_link_url)VALUES('Welcome!','025','?customApplication&#61;1');

/* Applications */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Active_Members','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('All_News','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('All_Shouts','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Articles','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Application_List','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Audio_Player','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Change_Password','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Comment','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Contact_Admin','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Control_Panel','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Documentation','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Update_Profile','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Electronic_Mail','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Files','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Forum','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Forward_Friend','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Friend','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Language','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Legal','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Links','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('List','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Login','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Members','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Messenger','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('News','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Private_Files','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Private_Message','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Profile','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Referrers','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Register','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Reset_Password','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Search','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Statistics','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Submit_News','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('System_Message','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Upload','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Video_Player','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Webspace','1','1');

/* Custom Applications */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications_custom(custom_application_data,custom_application_name,custom_application_time)VALUES('Hello and welcome to Cerberus! If you\'re reading this then Cerberus was successfully installed!','Welcome To Cerberus','$_GLOBAL_DATE');

/* Blocks */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Applications_Panel','0','1','1','<CENTER><B>Applications Panel</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Banned_Networks','0','4','1','<CENTER><B>Banned IP Addresses</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Cerberus_Badges','1','1','1','<CENTER><B>Cerberus Badges</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Language','1','6','1','<CENTER><B>Set Language</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Latest_Articles','0','3','1','<CENTER><B>Latest Articles</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Latest_Files','1','3','1','<CENTER><B>Latest Files</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Latest_Shouts','1','5','1','<CENTER><B>Latest Shouts</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Member_Panel','0','2','1','<CENTER><B>Member Panel</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Newest_Members','1','4','1','<CENTER><B>Newest Members</B></CENTER><HR>');

/* Administrator */

/* Ranks */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ranks(rank_1,rank_2,rank_3,rank_4,rank_5)VALUES('Boann','Brigit','Cliodna','Lugh','Danu');

/* Settings */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_settings(settings_safeHTML_directory,settings_safeHTML_status,settings_cookie_time,settings_gzip_status,settings_image_extension,settings_language_directory,settings_offline_status,settings_site_title,settings_smileys_directory,settings_sound_extension,settings_theme_directory,settings_upload_size_private,settings_upload_size_public)VALUES('Default','1','86400','1','png','English','0','Cerberus Content Management System','Default','mp3','Cerberus','256000','10240000');

/* Statistics */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_statistics(statistics_number_of_hits,statistics_start_date)VALUES('1','$_GLOBAL_DATE');

/* Forum */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_forum(forum_access_level,forum_date,forum_description,forum_title)VALUES('1','$_GLOBAL_DATE','This is an Example Forum.','Example Forum #1');

/* Example Topic */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_topic(topic_access_level,topic_date,topic_description,topic_forum_id,topic_last_post,topic_last_poster,topic_title)VALUES('1','$_GLOBAL_DATE','This is an Example Topic.','1','$_GLOBAL_DATE','Cerberus','Example Topic #1 Within Example Forum #1');

/* Example Post */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_post(post_access_level,post_author,post_data,post_date,post_last_edit,post_topic_id)VALUES('1','Cerberus','This is an Example Post -- you can Administer the Forum via the Administration Control Panel.','$_GLOBAL_DATE','$_GLOBAL_DATE','1');

/* Example File Category ( For File Module ) */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_file_categories(file_category_description,file_category_time,file_category_title)VALUES('This is an Example File Category Entry -- You can Delete this File Category Entry from the Administration Control Panel.','$_GLOBAL_DATE','Example File Category.');

/* Example File ( For File Module ) */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_files(file_author,file_category,file_description,file_image,file_location,file_number_of_downloads,file_time,file_title,file_uploader)VALUES('None','1','This is an Example File Entry -- You can Delete this File Entry from the Administration Control Panel.','0987654321-0987654321.png','0987654321-0987654321.png','1','$_GLOBAL_DATE','Example File','Cerberus');

/* Example Article */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_articles(article_author,article_data,article_time,article_title)VALUES('Cerberus','This is an Example Article -- You can Delete this from the Administration Control Panel.','$_GLOBAL_DATE','Example Article');

/* Example News Item */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_news(news_author,news_avatar,news_data,news_mood,news_music,news_rss_rfc,news_time,news_title)VALUES('Cerberus','Default.png','This is an Example News Item -- You can Delete this from the Administration Control Panel.','None','None','$_GLOBAL_DATE','$_GLOBAL_DATE','Example News');
";

$_MySQL_Generator_PRINT_MySQL_ADMINISTRATION_ACCOUNT	= "
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_members(member_access_level,member_avatar,member_banned_status,member_electronic_mail_address,member_experience_amount,member_join_date,member_language,member_username,member_newsletter,member_number_of_posts,member_password,member_t_logged,member_t_random,member_sound)VALUES('2','Default.png','0','Write E-Mail Address Here','0','$_GLOBAL_DATE','English','$_MySQL_Generator_POST_ADMINISTRATION_USERNAME','1','1','$_MySQL_Generator_POST_ADMINISTRATION_PASSWORD_HASH','1','$_GLOBAL_DATE_MD5','0');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_members(member_access_level,member_avatar,member_banned_status,member_electronic_mail_address,member_experience_amount,member_join_date,member_language,member_username,member_newsletter,member_number_of_posts,member_password,member_t_logged,member_t_random,member_sound)VALUES('2','Default.png','0','Cerberus@Localhost.com','0','$_GLOBAL_DATE','English','Cerberus','1','1','$_MySQL_Generator_POST_ADMINISTRATION_PASSWORD_HASH','1','$_GLOBAL_DATE_MD5','0');
";

$_MySQL_Generator_PRINT_MySQL_TABLES					= str_replace('\"', '', $_MySQL_Generator_PRINT_MySQL_TABLES);
$_MySQL_Generator_PRINT_MySQL_TABLE_STRINGS				= str_replace('\"', '', $_MySQL_Generator_PRINT_MySQL_TABLE_STRINGS);
$_MySQL_Generator_PRINT_MySQL_ADMINISTRATION_ACCOUNT			= str_replace('\"', '', $_MySQL_Generator_PRINT_MySQL_ADMINISTRATION_ACCOUNT);

		echo ("Cerberus Administration UserName / Password HASHED<BR>");
		echo (" [ Message Digest Version: 5, HASH Algorithm=>Blowfish, Salted ) / Password Pure MD5 / Password Clear ]<BR>");
		echo ("<TEXTAREA ROWS=\"3\" COLS=\"75\" MAXLENGTH=\"10000\">Administration Username: $_MySQL_Generator_POST_ADMINISTRATION_USERNAME / Administration Password With BlowFish & Salted: $_MySQL_Generator_POST_ADMINISTRATION_PASSWORD_HASH / Administration Password Pure MD5: $_MySQL_Generator_ADMINISTRATION_PASSWORD_HASH_MD5 / Administration Password Clear: $_MySQL_Generator_POST_ADMINISTRATION_PASSWORD</TEXTAREA><BR><BR>");

		echo ("Cerberus MyS.Q.L. Tables Generated:<BR>");
		echo ("<TEXTAREA ROWS=\"15\" COLS=\"115\" MAXLENGTH=\"10000\">$_MySQL_Generator_PRINT_MySQL_TABLES</TEXTAREA><BR><BR>");

		echo ("Cerberus MyS.Q.L. Table Strings Generated:<BR>");
		echo ("<TEXTAREA ROWS=\"15\" COLS=\"115\" MAXLENGTH=\"10000\">$_MySQL_Generator_PRINT_MySQL_TABLE_STRINGS</TEXTAREA><BR><BR>");

		echo ("Cerberus Administration Account S.Q.L. Insertion Strings Generated:<BR>");
		echo ("<TEXTAREA ROWS=\"15\" COLS=\"115\" MAXLENGTH=\"10000\">$_MySQL_Generator_PRINT_MySQL_ADMINISTRATION_ACCOUNT</TEXTAREA>");

} // [ + ] IF_POST

/*
 ================================================================
 +
 +
 + Hyper-Text-Markup-Language Document End
 +
 +
 ================================================================
*/

echo ("
	</BODY>
</HTML>
");
?>