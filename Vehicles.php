<?php
	$pageName = "Vehicles";
	$body = "main/Vehicles.php";
	session_start();

	require_once("operations/SQL_Fetch/fetch_vehicles_merged.php");
	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>