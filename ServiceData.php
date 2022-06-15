<?php
	$pageName = "Service Data";
	$body = "admin/ServiceData.php";

	require_once("operations/auth_employee.php");

	require_once("operations/SQL_Fetch/fetch_service_data.php");
	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>