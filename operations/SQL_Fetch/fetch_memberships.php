<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Memberships WHERE Valid = 1 ORDER BY Price DESC";
	$params = array();
	$memberships = runQuery($query, $params);
?>