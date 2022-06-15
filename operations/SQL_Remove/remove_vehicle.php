<?php
	session_start();

	require "../auth_admin.php";

	$reg = $_POST["reg"] ?? "";

	if ($reg == "")
	{
		header("Location: ../../ManageVehicles.php?error=Server+error.+Please+try+again.");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE Vehicles SET Valid = 0 WHERE RegPlate = :reg";
	$params = array(":reg" => $reg);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageVehicles.php?success=Vehicle+successfully+deleted");
?>