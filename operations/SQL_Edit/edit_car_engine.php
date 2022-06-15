<?php
	session_start();

	require "../auth_admin.php";
	
	$name = $_POST["name"] ?? "";
	$disp = $_POST["displacement"] ?? "";
	$power = $_POST["power"] ?? "";
	$torque = $_POST["torque"] ?? "";
	$fuel = $_POST["fuel"] ?? "";
	$builder = $_POST["builder"] ?? "";

	if ($name == "" || $disp == "" || $power == "" || $torque == "" || $fuel == "" || $builder == "")
	{
		header("Location: ../../ManageCarEngines.php?error=Please+provide+all+engine+details");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE CarEngine SET Displacement = :disp, Power = :power, Torque = :torque, FuelType = :fuel, BuiltBy = :build WHERE Name = :name";
	$params = array(":name" => $name, ":disp" => $disp, ":power" => $power, ":torque" => $torque, ":fuel" => $fuel, ":build" => $builder);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageCarEngines.php?success=Engine+successfully+updated");
?>