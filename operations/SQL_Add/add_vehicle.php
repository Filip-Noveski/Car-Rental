<?php
	session_start();
	require_once("../../functions/fileManagement.php");

	$reg = $_POST["reg"] ?? "";
	$year = $_POST["year"] ?? "";
	$model = $_POST["model"] ?? "";
	$trans = $_POST["trans"] ?? "";
	$colour = $_POST["colour"] ?? "";
	$price = $_POST["price"] ?? "";
	$branchId = $_POST["branch"] ?? "";
	$serCoId = $_POST["ser_co"] ?? "";

	if ($reg == "" || $year == "" || $model == "" || $trans == "" || $colour == "" || $price == "" || $branchId == "" || $serCoId == "")
	{
		header("Location: ../../ManageVehicles.php?error=Please+provide+all+vehicle+details");
		return;
	}

	$modelExploded = explode(";;;", $model); // 0 => model; 1 => generation; 2 => submodel; 3 => engine
	
	require_once("../../functions/server.php");
	$query = "INSERT INTO Vehicles (RegPlate, Model, Generation, Submodel, Transmission, Price, PreferredService, ModelYear, Engine, Colour, BranchId) VALUES (:reg, :model, :gen, :subm, :trans, :price, :ser, :year, :engine, :colour, :branch)";
	$params = array(":reg" => $reg, ":model" => $modelExploded[0], ":gen" => $modelExploded[1], ":subm" => $modelExploded[2], ":trans" => $trans, ":price" => $price, ":ser" => $serCoId, ":year" => $year, ":engine" => $modelExploded[3], ":colour" => $colour, ":branch" => $branchId);
	$rows = runQuery($query, $params);
	
	createDirectory($reg, "vehicles");

	for ($i = 0; $i <= count($_FILES["imgs"]["name"]) - 1; $i++)
	{
		$file = array(
			"name" => $_FILES["imgs"]["name"][$i],
			"full_path" => $_FILES["imgs"]["full_path"][$i],
			"type" => $_FILES["imgs"]["type"][$i],
			"tmp_name" => $_FILES["imgs"]["tmp_name"][$i],
			"error" => $_FILES["imgs"]["error"][$i],
			"size" => $_FILES["imgs"]["size"][$i]
		);
		uploadFile($file, $i, "vehicles/$reg");
	}
	
	header("Location: ../../ManageVehicles.php?success=Vehicle+successfully+added");
?>