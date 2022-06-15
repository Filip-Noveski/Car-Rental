<?php
	session_start();

	$reg = $_POST["reg"] ?? "";
	$sc = $_POST["sc"] ?? "";
	$date = $_POST["date"] ?? "";
	$price = $_POST["price"] ?? "";

	if ($reg == "" || $sc == "" || $date == "" || $price == "")
	{
		header("Location: ../../CarsDueService.php?error=Please+provide+all+service+information");
		return;
	}
	require_once("../../functions/server.php");
	$query = "INSERT INTO ServiceData (VehiclePlate, ServiceId, `Date`, Price) VALUES (:reg, :sid, :date, :price)";
	$params = array(":reg" => $reg, ":sid" => $sc, ":date" => $date, ":price" => $price);
	runQuery($query, $params);
	
	header("Location: ../../CarsDueService.php?reg=$reg&success=Service+successfully+reported");
?>