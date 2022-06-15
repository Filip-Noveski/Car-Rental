<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM CarModel";
	$params = array();
	$models = runQuery($query, $params);
	require_once("operations/SQL_Fetch/fetch_car_engines.php");
	require_once("operations/SQL_Fetch/fetch_car_makes.php");
?>