<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Messages ORDER BY Viewed ASC, Id DESC";
	$params = array();
	$messages = runQuery($query, $params);

	$query = "SELECT Email, UniqueId FROM Customers";
	$params = array();
	$customersTemp = runQuery($query, $params);
	$customers = array();
	foreach ($customersTemp as $customer)
	{
		$customers[$customer["UniqueId"]] = $customer["Email"];
	}
?>