<?php
	$pageName = "Manage Car Models";
	$body = "admin/ManageCarModels.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_car_models.php";
	require "views/_Layout.php";
?>