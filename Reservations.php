<?php
	$pageName = "Vehicle Reservations";
	$body = "main/Reservations.php";
	session_start();

	require_once("operations/SQL_Fetch/fetch_reservations.php");
	require "operations/get_data.php";
	require "root.php";
	require "pdo.php";
	require "views/_Layout.php";
?>