<script type="text/javascript" src="js/vehicle.js"></script>
<script type="text/javascript" src="js/swapImg.js"></script>

<?php
	$divLandscape = '<div class="card card-landscape" ';
	$divClose = '</div>';
	for ($i = 0; $i <= min(4, count($vehicles) - 1); $i++)
	{
		$vehicle = $vehicles[$i];
		require("views/partial/VehicleCardHorizontal.php");
	}
?>