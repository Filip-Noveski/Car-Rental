<?php
	$pageName = "Contact";
	$body = "main/Contact.php";
	session_start();

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>