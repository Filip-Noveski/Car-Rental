<?php
	$pageName = "Cars Due to be Serviced";
	$body = "admin/CarsDueService.php";

	require_once("operations/auth_employee.php");

	require_once("operations/SQL_Fetch/fetch_vehicles_due_service.php");
	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>