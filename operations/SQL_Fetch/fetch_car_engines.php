<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM CarEngine";
	$params = array();
	$engines = runQuery($query, $params);
	require_once("operations/SQL_Fetch/fetch_car_makes.php");
?>