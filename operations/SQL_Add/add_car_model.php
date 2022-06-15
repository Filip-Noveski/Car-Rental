<?php
	session_start();

	$name = $_POST["name"] ?? "";
	$subm = $_POST["subm"] ?? "";
	$gen = $_POST["gen"] ?? "";
	$engine = $_POST["engine"] ?? "";
	$make = $_POST["make"] ?? "";
	$doors = $_POST["doors"] ?? "";
	$seats = $_POST["seats"] ?? "";
	$body = $_POST["body"] ?? "";

	if ($name == "" || $engine == "" || $make == "" || $doors == "" || $seats == "" || $body == "")
	{
		header("Location: ../../ManageCarModels.php?error=Please+provide+all+model+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "INSERT INTO CarModel (Make, Name, Submodel, Generation, Engine, DoorsCount, SeatsCount, Body) VALUES (:make, :name, :subm, :gen, :engine, :doors, :seats, :body)";
	$params = array(":make" => $make, ":name" => $name, ":subm" => $subm, ":gen" => $gen, ":engine" => $engine, ":doors" => $doors, ":seats" => $seats, ":body" => $body);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageCarModels.php?success=Model+successfully+added");
?>