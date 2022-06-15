<?php
	$pageName = "Manage Branches";
	$body = "admin/ManageBranches.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "operations/SQL_Fetch/fetch_branches.php";
	require "views/_Layout.php";
?>