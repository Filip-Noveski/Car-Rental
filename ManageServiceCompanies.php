<?php
	$pageName = "Manage Service Companies";
	$body = "admin/ManageServiceCompanies.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_ser_co.php";
	require "views/_Layout.php";
?>