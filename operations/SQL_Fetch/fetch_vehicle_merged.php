<?php
	require_once("functions/server.php");

	$query = "SELECT * FROM Vehicles v, CarModel cm, Branch b WHERE v.Valid = 1 AND v.RegPlate = :reg AND v.Model = cm.Name AND v.Submodel = cm.Submodel AND v.Engine = cm.Engine AND v.Generation = cm.Generation AND v.BranchId = b.Id";
	$params = array(":reg" => $_GET["reg"]);
	$vehicle = runQuery($query, $params)[0];

	$query = "SELECT * FROM CarMake WHERE Name = :name";
	$params = array(":name" => $vehicle["Make"]);
	$vehicle["Manufacturer"] = runQuery($query, $params)[0];

	$query = "SELECT * FROM CarGroup WHERE Name = :name";
	$params = array(":name" => $vehicle["Manufacturer"]["Group"]);
	$vehicle["Group"] = runQuery($query, $params)[0];

	$query = "SELECT * FROM CarEngine WHERE Name = :name";
	$params = array(":name" => $vehicle["Engine"]);
	$vehicle["Engine"] = runQuery($query, $params)[0];

	$query = "SELECT Country FROM CarMake WHERE Name = :name";
	$params = array(":name" => $vehicle["Engine"]["BuiltBy"]);
	$vehicle["Engine"]["Country"] = runQuery($query, $params)[0]["Country"];

	$query = "SELECT * FROM RentData WHERE VehiclePlate = :reg AND ToDate > CURDATE() ORDER BY FromDate";
	$params = array(":reg" => $vehicle["RegPlate"]);
	$vehicle["RentData"] = runQuery($query, $params);
?>