<?php
	$pageName = "Manage Car Groups";
	$body = "admin/ManageCarGroups.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_car_groups.php";
	require "views/_Layout.php";
?>