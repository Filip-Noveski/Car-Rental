<?php
	$pageName = "Manage Assets";
	$body = "admin/Manage.php";

	require "operations/auth_admin.php";

	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>