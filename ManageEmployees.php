<?php
	$pageName = "Manage Employees";
	$body = "admin/ManageEmployees.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_employees.php";
	require "views/_Layout.php";
?>