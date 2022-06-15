<?php
	$pageName = "Manage Vehicles";
	$body = "admin/ManageVehicles.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_vehicles.php";
	require "views/_Layout.php";
?>