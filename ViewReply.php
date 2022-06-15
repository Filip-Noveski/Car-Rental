<?php
	$pageName = "View Message";
	$body = "main/ViewReply.php";

	require "operations/auth.php";

	require "operations/get_data.php";
	require "operations/SQL_Fetch/fetch_reply.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>