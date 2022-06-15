<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Vehicles WHERE Valid = 1";
	$params = array();
	$vehicles = runQuery($query, $params);
	require_once("operations/SQL_Fetch/fetch_car_models.php");
	require_once("operations/SQL_Fetch/fetch_branches.php");
	require_once("operations/SQL_Fetch/fetch_ser_co.php");
?>