<?php
	$pageName = "View Message";
	$body = "admin/ViewMessage.php";

	require "operations/auth_employee.php";

	require "operations/get_data.php";
	require "operations/SQL_Fetch/fetch_message.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>