<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Customers c, Accounts a WHERE c.Email = a.Email";
	$params = array();
	$customers = runQuery($query, $params);
?>