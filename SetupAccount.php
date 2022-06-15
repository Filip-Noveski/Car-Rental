<?php
	$pageName = "Setup Account";
	$body = "account/Setup.php";

	session_start();

	$email = $_SESSION["useremail"];
	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>