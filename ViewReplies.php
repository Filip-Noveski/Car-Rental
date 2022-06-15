<?php
	$pageName = "Messages";
	$body = "main/ViewReplies.php";

	require_once "operations/auth.php";

	require "operations/get_data.php";
	require "operations/SQL_Fetch/fetch_replies.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>