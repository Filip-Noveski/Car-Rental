<?php
	session_start();

	$name = $_POST["name"] ?? "";
	$location = $_POST["location"] ?? "";
	$group = $_POST["group"] ?? "";
	$phone = $_POST["phone"] ?? "";
	$email = $_POST["email"] ?? "";

	if ($name == "" || $location == "" || $group == "" || $phone == "" || $email == "")
	{
		header("Location: ../../ManageServiceCompanies.php?error=Please+provide+all+company+details");
		return;
	}

	require_once("../../functions/server.php");
	$query = "INSERT INTO ServiceCompanies (Name, Location, `Group`, Phone, Email) VALUES (:name, :location, :group, :phone, :email)";
	$params = array(":name" => $name, ":location" => $location, ":group" => $group, ":phone" => $phone, ":email" => $email);
	$rows = runQuery($query, $params);

	header("Location: ../../ManageServiceCompanies.php?success=Company+successfully+added");
?>