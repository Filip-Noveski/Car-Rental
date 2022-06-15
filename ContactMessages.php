<?php
	$pageName = "Contact Messages";
	$body = "admin/contact.php";

	require "operations/auth_employee.php";

	require "operations/get_data.php";
	require "operations/SQL_Fetch/fetch_messages.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>