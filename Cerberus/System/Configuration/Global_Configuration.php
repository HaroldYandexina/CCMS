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
 + - File Location: root->Cerberus->System>Configuration->Global_Configuration.php
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
 + Global Configuration
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + @ Global Configuration, Files
 +
 ================================================================
*/

/*
 ================================================================
 + Configuration Files and Their Variables
 ================================================================
*/

$_GLOBAL_SQL_SERVER_CONFIGURATION_FILE			= "./System/Configuration/Global_SQL_Server_Configuration.php";
$_GLOBAL_SQL_SERVER_DATABASE_CLASS_FILE			= "./System/Configuration/Global_SQL_Server_Database_Class.php";

/*
 ================================================================
 + If Global S.Q.L. Configuration Files Exist, Include Them
 ================================================================
*/

if (file_exists($_GLOBAL_SQL_SERVER_CONFIGURATION_FILE)) {

	include_once "$_GLOBAL_SQL_SERVER_CONFIGURATION_FILE";

} else {

	echo ("Cerberus: Error, Missing File: $_GLOBAL_SQL_SERVER_CONFIGURATION_FILE");

} // [ + ] IF_FILE_EXISTS_GLOBAL_SQL_SERVER_CONFIGURATION_FILE

/*
 ================================================================
 +
 + @ Configuration, Database Class Files
 +
 ================================================================
*/

/*
 ================================================================
 + If Global S.Q.L. Server Database Class File Exists, Include It
 ================================================================
*/

if (file_exists($_GLOBAL_SQL_SERVER_DATABASE_CLASS_FILE)) {

	include_once "$_GLOBAL_SQL_SERVER_DATABASE_CLASS_FILE";

} else {

	echo ("Missing: $_GLOBAL_SQL_SERVER_DATABASE_CLASS_FILE");

} // [ + ] IF_FILE_EXISTS_GLOBAL_SQL_SERVER_DATABASE_CLASS_FILE

/*
 ================================================================
 +
 + @ Kernel File Parameters
 +
 ================================================================
*/

/*
 ================================================================
 + Kernel File Variables: Kernal File Name
 ================================================================
*/

$_INTERNAL_FILE_KERNAL							= "Cerberus.php";

/*
 ================================================================
 +
 + @ Application Module Parameters
 +
 ================================================================
*/

/*
 ================================================================
 + Application Module Variables: Administration, Custom, Member and Public
 ================================================================
*/

$_INTERNAL_APPLICATION_MODULE_ADMINISTRATOR		= "Application_Administrator";
$_INTERNAL_APPLICATION_MODULE_CUSTOM			= "Application_Custom";
$_INTERNAL_APPLICATION_MODULE_MEMBER			= "Application_Member";
$_INTERNAL_APPLICATION_MODULE_PUBLIC			= "Application_Public";

/*
 ================================================================
 +
 + @ Internal Cerberus Software Project Versioning Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Cerberus Versioning: Globally Invokable Variables
 ================================================================
*/

$_CERBERUS_VERSION_SHORT				= "4.0.8";
$_CERBERUS_VERSION_EXTENDED				= "Cerberus Content Management System - Version: 4, Build: 0.8 ~ Wynn-Ghost - Wednesday, March 1st of 2023";

/*
 ================================================================
 +
 + @ Internal Cerberus Software Project Server Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Cerberus Parent Organization Official Servers: Globally Invokable Variables
 ================================================================
*/

$_TINKESOFTWARE_SERVER_URL_CLEARTEXT			= "http://www.TinkeSoftware.com";
$_TINKESOFTWARE_SERVER_URL_SECURE			= "https://www.TinkeSoftware.com";

/*
 ================================================================
 + Cerberus Parent Organization Official GIT: Globally Invokable Variables
 ================================================================
*/

/*
 ======================
 + BITBucket
 ======================
*/

$_TINKESOFTWARE_SERVER_URL_BITBUCKET_CLEARTEXT		= "http://www.BITBucket.com/TinkeSoftware/CerberusCMS";
$_TINKESOFTWARE_SERVER_URL_BITBUCKET_SECURE		= "https://www.BITBucket.com/TinkeSoftware/CerberusCMS";

/*
 ======================
 + GITHub
 ======================
*/

$_TINKESOFTWARE_SERVER_URL_GITHUB_CLEARTEXT		= "http://www.GITHub.com/TinkeSoftware/CerberusCMS";
$_TINKESOFTWARE_SERVER_URL_GITHUB_SECURE		= "https://www.GITHub.com/TinkeSoftware/CerberusCMS";

/*
 ======================
 + GITLab
 ======================
*/

$_TINKESOFTWARE_SERVER_URL_GITLAB_CLEARTEXT		= "http://www.GITLab.com/TinkeSoftware/CerberusCMS";
$_TINKESOFTWARE_SERVER_URL_GITLAB_SECURE		= "https://www.GITLab.com/TinkeSoftware/CerberusCMS";

/*
 ================================================================
 + Cerberus Parent Organization Official Software Project Hosting: Globally Invokable Variables
 ================================================================
*/

$_TINKESOFTWARE_SERVER_URL_SOURCEFORGE_CLEARTEXT	= "http://www.SourceForge.net/projects/CerberusCMS";
$_TINKESOFTWARE_SERVER_URL_SOURCEFORGE_SECURE		= "https://www.SourceForge.net/projects/CerberusCMS";
?>
