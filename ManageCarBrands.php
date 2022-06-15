<?php
	$pageName = "Manage Car Brands";
	$body = "admin/ManageCarBrands.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_car_makes.php";
	require "views/_Layout.php";
?>