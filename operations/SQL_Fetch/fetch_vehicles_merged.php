<?php
	require_once("functions/server.php");

	$branch = $_GET["branch"] ?? "";
	$brand = $_GET["brand"] ?? "";
	$model = $_GET["model"] ?? "";
	$trans = $_GET["trans"] ?? "";
	$fuel = $_GET["fuel"] ?? "";
	$cbody = $_GET["body"] ?? "";

	$query = "SELECT * FROM Vehicles v, CarModel cm, CarEngine ce, Branch b WHERE b.Valid = 1 AND v.Valid = 1 AND (v.Model = cm.Name AND v.Submodel = cm.Submodel AND v.Engine = cm.Engine AND cm.Engine = ce.Name AND v.Generation = cm.Generation AND v.BranchId = b.Id) AND (b.Location LIKE :bname AND cm.Make LIKE :brand AND cm.Name LIKE :cmname AND v.Transmission LIKE :trans AND ce.FuelType LIKE :fuel AND cm.Body LIKE :body)";
	$params = array(":bname" => '%' . $branch . '%', ":brand" => '%' . $brand . '%', ":cmname" => '%' . $model . '%', ":trans" => '%' . $trans . '%', ":fuel" => '%' . $fuel . '%', ":body" => '%' . $cbody . '%');
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