<?php
	session_start();
	require_once("../../functions/fileManagement.php");

	$name = $_POST["name"] ?? "";
	$country = $_POST["country"] ?? "";
	$group = $_POST["group"] ?? "";

	if ($name == "" || $country == "" || $group == "")
	{
		header("Location: ../../ManageCarBrands.php?error=Please+provide+all+brand+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "INSERT INTO CarMake (Name, Country, `Group`) VALUES (:name, :country, :group)";
	$params = array(":name" => $name, ":country" => $country, ":group" => $group);
	$rows = runQuery($query, $params);
	
	uploadFile($_FILES["logo"], $name, "car_makes");
	
	header("Location: ../../ManageCarBrands.php?success=Brand+successfully+added");
?>