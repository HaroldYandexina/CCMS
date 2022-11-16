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
 + - File Location: root->Cerberus->Upload->Executable->GNU->index.php
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
 + @ Directory Master Index
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Directory Master Index Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Directory Listing Denial
 ================================================================
*/

$_DIRECTORY_DENIAL_FILE					= "../../../System/Default/Messages/Directory_Denial.php";

/*
 ================================================================
 + Directory Listing Denial: IF Directory Denial File Exists, Include It
 ================================================================
*/

if (file_exists("$_DIRECTORY_DENIAL_FILE")) {

	include_once "$_DIRECTORY_DENIAL_FILE";

} else {

	echo ("Missing Path: $_DIRECTORY_DENIAL_FILE");

} // [ + ] IF_FILE_EXISTS: Directory Denial Index->Redirect To Denial Message
?>