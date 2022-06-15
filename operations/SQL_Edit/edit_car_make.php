<?php
	session_start();

	require "../auth_admin.php";
	require_once("../../functions/fileManagement.php");

	$name = $_POST["name"] ?? "";
	$group = $_POST["group"] ?? "";

	if ($group == "")
	{
		header("Location: ../../ManageCarBrands.php?error=Please+provide+all+brand+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE CarMake SET `Group` = :group WHERE Name = :name";
	$params = array(":name" => $name, ":group" => $group);
	$rows = runQuery($query, $params);
	
	if (!empty($_FILES["logo"])) {
		deleteFile($name, "car_makes");
		uploadFile($_FILES["logo"], $name, "car_makes");
	}

	header("Location: ../../ManageCarBrands.php?success=Brand+successfully+updated");
?>