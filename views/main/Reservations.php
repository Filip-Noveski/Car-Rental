<script type="text/javascript" src="js/swapImg.js"></script>
<script type="text/javascript" src="js/vehicle.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<?php
	require_once("functions/pages.php");
	$page = $_GET["page"] ?? 1;
	$itemsPerPage = 10;
	printPages("reservations.php", ceil(count($vehicles) / $itemsPerPage), $page);
	$divLandscape = '<div class="card card-landscape" ';
	$divClose = '</div>';
	for ($i = ($page - 1) * $itemsPerPage; $i <= min(($page) * $itemsPerPage - 1, count($vehicles) - 1); $i++)
	{
		$vehicle = $vehicles[$i];
		if ($vehicle["ToDate"] < date("Y-m-d"))
		{
			$vehicleMessage = "Past";
		}
		else if ($vehicle["FromDate"] < date("Y-m-d") && $vehicle["ToDate"] > date("Y-m-d"))
		{
			$vehicleMessage = "Current";
		}
		else
		{
			$vehicleMessage = "Future";
		}
		$fromDate = date_format(date_create($vehicle["FromDate"]), "d.m.Y");
		$toDate = date_format(date_create($vehicle["ToDate"]), "d.m.Y");
		$vehicleMessage .= ": {$fromDate} - {$toDate}";
		require("views/partial/VehicleCardHorizontal.php");
	}
	printPages("Vehicles.php", ceil(count($vehicles) / $itemsPerPage), $page);
?>