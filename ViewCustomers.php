<?php
	$pageName = "View Customers";
	$body = "admin/ViewCustomers.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_customers.php";
	require "views/_Layout.php";
?>