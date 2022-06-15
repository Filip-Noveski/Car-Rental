<?php
	session_start();

	require "../auth_admin.php";

	$id = $_POST["id"] ?? "";

	if ($id == "")
	{
		header("Location: ../../ManageServiceCompanies.php?error=Server+error.+Please+try+again.");
		return;
	}
	
	require_once("../../functions/server.php");
	$query = "UPDATE ServiceCompanies SET Valid = 0 WHERE Id = :id";
	$params = array(":id" => $id);
	$rows = runQuery($query, $params);
	
	header("Location: ../../ManageServiceCompanies.php?success=Company+successfully+deleted");
?>