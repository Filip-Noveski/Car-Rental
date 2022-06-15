<script type="text/javascript" src="js/vehicle.js"></script>
<script type="text/javascript" src="js/swapImg.js"></script>

<?php
	require_once("functions/pages.php");
	$page = $_GET["page"] ?? 1;
	$itemsPerPage = 10;
	printPages("vehicles.php", ceil(count($vehicles) / $itemsPerPage), $page);
	require("views/partial/VehicleSearch.php");
	$divLandscape = '<div class="card card-landscape" ';
	$divClose = '</div>';
	for ($i = ($page - 1) * $itemsPerPage; $i <= min(($page) * $itemsPerPage - 1, count($vehicles) - 1); $i++)
	{
		$vehicle = $vehicles[$i];
		if ($vehicle["Taken"])
		{
			$vehicleMessage = "Currently Rented";
		}
		require("views/partial/VehicleCardHorizontal.php");
	}
	printPages("Vehicles.php", ceil(count($vehicles) / $itemsPerPage), $page);
?>