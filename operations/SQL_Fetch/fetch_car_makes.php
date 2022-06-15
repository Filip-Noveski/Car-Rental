<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM CarMake";
	$params = array();
	$makes = runQuery($query, $params);
	require_once("operations/SQL_Fetch/fetch_car_groups.php");
?>