<?php
	session_start();

	require "../auth_admin.php";

	$id = $_POST["id"] ?? "";
	$name = $_POST["name"] ?? "";
	$from = $_POST["from"] ?? "";
	$until = $_POST["until"] ?? "";
	$coordsX = $_POST["coords-x"] ?? "";
	$coordsY = $_POST["coords-y"] ?? "";
	$location = $_POST["location"] ?? "";

	if ($id == "" || $location == "" || $name == "" || $from == "" || $until == "" || $coordsX == "" || $coordsY == "")
	{
		header("Location: ../../ManageBranches.php?error=Please+provide+all+branch+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE Branch SET Name = :name, Location = :location, OpensAt = :from, ClosesAt = :to, CoordsX = :x, CoordsY = :y WHERE Id = :id";
	$params = array(":name" => $name, ":location" => $location, ":from" => $from, ":to" => $until, ":id" => $id, ":x" => $coordsX, ":y" => $coordsY);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageBranches.php?success=Branch+successfully+updated");
?>