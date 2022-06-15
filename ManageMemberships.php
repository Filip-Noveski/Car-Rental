<?php
	$pageName = "Manage Memberships";
	$body = "admin/ManageMemberships.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_memberships.php";
	require "views/_Layout.php";
?>