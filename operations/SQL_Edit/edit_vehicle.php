<?php
	session_start();

	require "../auth_admin.php";
	
	$reg = $_POST["reg"] ?? "";
	$colour = $_POST["colour"] ?? "";
	$price = $_POST["price"] ?? "";
	$sc = $_POST["ser_co"] ?? "";

	if ($reg == "" || $colour == "" || $price == "" || $sc == "")
	{
		header("Location: ../../ManageVehicles.php?error=Please+provide+all+vehicle+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE Vehicles SET Colour = :colour, Price = :price, PreferredService = :sc WHERE RegPlate = :reg";
	$params = array(":reg" => $reg, ":colour" => $colour, ":sc" => $sc, ":price" => $price);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageVehicles.php?success=Vehicle+information+successfully+updated");
?>