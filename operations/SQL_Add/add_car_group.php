<?php
	session_start();
	require_once("../../functions/fileManagement.php");

	$name = $_POST["name"] ?? "";
	$country = $_POST["country"] ?? "";

	if ($name == "" || $country == "")
	{
		header("Location: ../../ManageCarGroups.php?error=Please+provide+all+group+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "INSERT INTO CarGroup (Name, Country) VALUES (:name, :country)";
	$params = array(":name" => $name, ":country" => $country);
	$rows = runQuery($query, $params);
	
	uploadFile($_FILES["logo"], $name, "car_groups");
	
	header("Location: ../../ManageCarGroups.php?success=Group+successfully+added");
?>