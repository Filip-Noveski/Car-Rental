<?php
	session_start();

	$name = $_POST["name"] ?? "";
	$from = $_POST["from"] ?? "";
	$until = $_POST["until"] ?? "";
	$coordsX = $_POST["coords-x"] ?? "";
	$coordsY = $_POST["coords-y"] ?? "";
	$location = $_POST["location"] ?? "";

	if ($location == "" || $name == "" || $from == "" || $until == "" || $coordsX == "" || $coordsY == "")
	{
		header("Location: ../../ManageBranches.php?error=Please+provide+all+branch+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "INSERT INTO Branch (Name, Location, OpensAt, ClosesAt, CoordsX, CoordsY) VALUES (:name, :location, :from, :until, :x, :y)";
	$params = array(":name" => $name, ":location" => $location, ":from" => $from, ":until" => $until, ":x" => $coordsX, ":y" => $coordsY);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageBranches.php?success=Branch+successfully+added");
?>