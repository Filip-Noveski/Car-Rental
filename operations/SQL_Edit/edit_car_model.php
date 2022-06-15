<?php
	session_start();

	require "../auth_admin.php";
	
	$name = $_POST["name"] ?? "";
	$subm = $_POST["subm"] ?? "";
	$gen = $_POST["gen"] ?? "";
	$engine = $_POST["engine"] ?? "";
	$doors = $_POST["doors"] ?? "";
	$seats = $_POST["seats"] ?? "";
	$body = $_POST["body"] ?? "";

	if ($name == "" || $engine == "" || $doors == "" || $seats == "" || $body == "")
	{
		header("Location: ../../ManageCarModels.php?error=Please+provide+all+model+details");
		return;
	}

	require_once("../../functions/server.php");
	$query = "UPDATE CarModel SET DoorsCount = :doors, SeatsCount = :seats, Body = :body WHERE Name = :name AND  Submodel = :subm AND Generation = :gen AND Engine = :engine";
	$params = array(":name" => $name, ":subm" => $subm, ":gen" => $gen, ":engine" => $engine, ":doors" => $doors, ":seats" => $seats, ":body" => $body);
	$rows = runQuery($query, $params);

	header("Location: ../../ManageCarModels.php?success=Model+successfully+updated");
?>