<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM CarGroup";
	$params = array();
	$groups = runQuery($query, $params);
?>