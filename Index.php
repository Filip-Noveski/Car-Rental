<?php
	$pageName = "Home";
	$body = "main/Index.php";
	session_start();
	
	require_once("operations/SQL_Fetch/fetch_vehicles_merged.php");
	shuffle($vehicles);
	require_once("operations/SQL_Fetch/fetch_branches.php");
	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>