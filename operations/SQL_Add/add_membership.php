<?php
	session_start();
	require_once("../../functions/fileManagement.php");

	$type = $_POST["type"] ?? "";
	$price = $_POST["price"] ?? "";
	$duration = $_POST["duration"] ?? "";
	$disc = $_POST["disc"] ?? "";

	if ($type == "" || $price == "" || $duration == "" || $disc == "")
	{
		header("Location: ../../ManageMemberships.php?error=Please+provide+all+membership+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "INSERT INTO Memberships (Type, Price, Discount, Duration) VALUES (:type, :price, :disc, :duration)";
	$params = array(":type" => $type, ":price" => $price, ":disc" => $disc / 100, ":duration" => $duration);
	$rows = runQuery($query, $params);
	
	uploadFile($_FILES["logo"], $type, "memberships");
	
	header("Location: ../../ManageMemberships.php?success=Membership+successfully+added");
?>