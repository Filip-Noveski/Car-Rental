<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Branch WHERE Id = :id";
	$params = array(":id" => $_GET["id"]);
	$branch = runQuery($query, $params)[0];

	$query = "SELECT * FROM Vehicles WHERE BranchId = :id AND Valid = 1";
	$params = array(":id" => $branch["Id"]);
	$branch["Vehicles"] = runQuery($query, $params);
?>