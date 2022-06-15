<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Vehicles v, CarModel cm, Branch b WHERE v.Valid = 1 AND (v.Model = cm.Name AND v.Submodel = cm.Submodel AND v.Engine = cm.Engine AND v.Generation = cm.Generation AND v.BranchId = :id AND b.Id = v.BranchId)";
	$params = array(":id" => $_GET["id"]);
	$vehicles = runQuery($query, $params);

	for ($i = 0; $i <= count($vehicles) - 1; $i++)
	{
		$query = "SELECT * FROM CarMake WHERE Name = :name";
		$params = array(":name" => $vehicles[$i]["Make"]);
		$vehicles[$i]["Manufacturer"] = runQuery($query, $params)[0];

		$query = "SELECT * FROM CarGroup WHERE Name = :name";
		$params = array(":name" => $vehicles[$i]["Manufacturer"]["Group"]);
		$vehicles[$i]["Group"] = runQuery($query, $params)[0];

		$query = "SELECT * FROM CarEngine WHERE Name = :name";
		$params = array(":name" => $vehicles[$i]["Engine"]);
		$vehicles[$i]["Engine"] = runQuery($query, $params)[0];

		$query = "SELECT Country FROM CarMake WHERE Name = :name";
		$params = array(":name" => $vehicles[$i]["Engine"]["BuiltBy"]);
		$vehicles[$i]["Engine"]["Country"] = runQuery($query, $params)[0]["Country"];

		$query = "SELECT 1 AS Taken FROM RentData WHERE FromDate < CURDATE() AND ToDate > CURDATE() AND VehiclePlate = :reg";
		$params = array(":reg" => $vehicles[$i]["RegPlate"]);
		$vehicles[$i]["Taken"] = count(runQuery($query, $params)) > 0;
	}
?>