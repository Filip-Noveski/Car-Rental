<?php
	$pageName = "Memberships";
	$body = "main/Memberships.php";
	session_start();

	require_once("operations/SQL_Fetch/fetch_memberships.php");
	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>