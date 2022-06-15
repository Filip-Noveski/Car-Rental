<?php
	$pageName = "Manage Car Engines";
	$body = "admin/ManageCarEngines.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_car_engines.php";
	require "views/_Layout.php";
?>