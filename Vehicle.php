<?php
	$pageName = "Vehicle";
	$body = "main/Vehicle.php";
	session_start();

	require_once("operations/SQL_Fetch/fetch_vehicle_merged.php");
	require_once("operations/SQL_Fetch/fetch_vehicles_merged.php");
	require_once("operations/SQL_Fetch/fetch_member_discount.php");
	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>