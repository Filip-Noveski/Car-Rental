<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM ServiceCompanies WHERE Valid = 1";
	$params = array();
	$serviceCos = runQuery($query, $params);
	require_once("operations/SQL_Fetch/fetch_car_groups.php");
?>