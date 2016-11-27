<?php 
/**
 * Build connection
 *  if check session_login is empty
 *  	Run login.php
 * 	else
 *      Run content.php
 */
session_start();
error_reporting(0);
include "koneksi.php";
	if ($_SESSION[login]==''){
		include "login.php";
	}else{
		include "content.php";
	}
?>