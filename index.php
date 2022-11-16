<?php
/*
 ============================================================================================================
 + Cerberus Content Management System
 + ---
 + - Author 		     : Gary Christopher Johnson - Rosedale, California
 + - Electronic Mail Address : TinkeSoftware@Protonmail.com
 + - Company		     : Tinke Software
 + - Company Address	     : Rosedale, California, U.S.A.
 + - Document Notes	     : View this file in a non-formatting text editor without word-wrap for the correct
 +			       display of this programming code and its indentation.
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
 + - File Location: root->index.php
 + - File Version : 0.6 - Wednesday, March 1st of 2023
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
 ============================================================================================================
*/

/*
 ================================================================
 +
 +
 +
 + Cerberus Content Management System :: Master Index File
 +
 +
 +
 ================================================================
*/

/*
 ================================================================
 +
 + Master Index File Variables
 +
 ================================================================
*/

/*
 ================================================================
 + Installation Application File Variables
 ================================================================
*/

$_CerberusCMS_Installation_File		= "./Cerberus/Install.php";

/*
 ================================================================
 + Check For Installation File: If It Exists, Redirect To It
 ================================================================
*/

if (file_exists($_CerberusCMS_Installation_File)) {

	header("location: ./Cerberus/Install.php");

/*
 ================================================================
 + Check For Installation File: If It Does Not Exists, Redirect To Cerberus
 ================================================================
*/

} else {

	header("location: ./Cerberus/Cerberus.php?Application_Member=News");

} // [ + ] IF: File Exists: Cerberus Installation Application
?>