<?php
	session_start();

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
	$query = "INSERT INTO CarEngine (Name, Displacement, Power, Torque, FuelType, BuiltBy) VALUES (:name, :disp, :power, :torque, :fuel, :build)";
	$params = array(":name" => $name, ":disp" => $disp, ":power" => $power, ":torque" => $torque, ":fuel" => $fuel, ":build" => $builder);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageCarEngines.php?success=Engine+successfully+added");
?>