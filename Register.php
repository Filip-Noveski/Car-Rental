<?php
	$pageName = "Register";
	$body = "account/Register.php";
	
	session_start();

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>