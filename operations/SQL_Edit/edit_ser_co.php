<?php
	session_start();

	require "../auth_admin.php";
	
	$id = $_POST["id"] ?? "";
	$name = $_POST["name"] ?? "";
	$location = $_POST["location"] ?? "";
	$group = $_POST["group"] ?? "";
	$phone = $_POST["phone"] ?? "";
	$email = $_POST["email"] ?? "";
	
	if ($id = "" || $name = "" || $location == "" || $group == "" || $phone == "" || $email == "")
	{
		header("Location: ../../ManageServiceCompanies.php?error=Please+provide+all+company+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE ServiceCompanies SET Name = :name, Location = :location, `Group` = :group, Phone = :phone, Email = :email WHERE Id = :id";
	$params = array(":name" => $name, ":location" => $location, ":group" => $group, ":phone" => $phone, ":email" => $email, ":id" => $id);
	$rows = runQuery($query, $params);

	header("Location: ../../ManageServiceCompanies.php?success=Service+company+information+successfully+updated");
?>