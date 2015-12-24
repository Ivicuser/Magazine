<?php
	require_once('constants.php');
	
	$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	if(!$conn){//if connection failed
		die('Connection to database failed.');
	//die function - exits from php script	
	}
	
	/* Set internal character encoding to UTF-8 */
	mb_internal_encoding("UTF-8");
	mysqli_query($conn,"SET CHARACTER SET utf8");
	mysqli_query($conn,"SET NAMES utf8");
	
?>