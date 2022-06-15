<h2 class="heading"><?= $pageName ?></h2>
<script type="text/javascript" src="js/swapImg.js"></script>


<?php
	require("views/partial/BranchMap.php");
?>

<?php
	require_once("functions/pages.php");
	$page = $_GET["page"] ?? 1;
	$itemsPerPage = 10;
	printPages("Branches.php", ceil(count($branches) / $itemsPerPage), $page);
	$divLandscape = '<div class="card card-landscape" ';
	$divClose = '</div>';
	for ($i = ($page - 1) * $itemsPerPage; $i <= min(($page) * $itemsPerPage - 1, count($branches) - 1); $i++)
	{
		$branch = $branches[$i];
		//$vehicleFullName = "{$vehicle["ModelYear"]} {$vehicle["Make"]} {$vehicle["Model"]} {$vehicle["Generation"]} {$vehicle["Submodel"]}";
		$jsParams = "{'id': '" . $branch["Id"] . "'}";
		echo $divLandscape . 'style="padding-top: 0">';	// 1
		
		echo '<h3 class="heading small-margin card-upper-heading" style="margin-top: 8px;">' . $branch["Name"] . '</h3>';

		/*echo '<div class="card-tabs-container">'; //2
		echo '<p class="card-tab-btn" onclick="changeTab(\'vehicle\', \'' . str_replace(' ', '-', $vehicle["RegPlate"]) . '\')">Vehicle</p>';
		echo '<p class="card-tab-btn" onclick="changeTab(\'engine\', \'' . str_replace(' ', '-', $vehicle["RegPlate"]) . '\')">Engine</p>';
		echo '<p class="card-tab-btn" onclick="changeTab(\'model\', \'' . str_replace(' ', '-', $vehicle["RegPlate"]) . '\')">Model</p>';
		echo $divClose;	// _2*/

		echo '<div class="card-landscape-split-upper">'; // 2
		echo "\n";
		echo '<div class="card-landscape-fullimg" id="img-' . $branch["Id"] . '-full"></div>'; // </>

		echo '<div class="card-landscape-upper-infoarea" id="info-vehicle-' . $branch["Id"] . '">'; // 3 branch
		
		echo '<p class="small-margin"><span class="message-info-head">Adress</span><span class="message-info-text">' . "{$branch["Location"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Work Hours</span><span class="message-info-text">' . "{$branch["OpensAt"]} - {$branch["ClosesAt"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Vehicles Count</span><span class="message-info-text">' . count($branch["Vehicles"]) . '</span></p>';

		echo $divClose;	// _3
		/*
		echo '<div class="card-landscape-upper-infoarea" id="info-engine-' . $branch["Id"] . '" style="display: none">'; // 3 engine
		
		echo '<p class="small-margin"><span class="message-info-head">Engine Name</span><span class="message-info-text">' . "{$vehicle["Engine"]["Name"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Manufacturer</span><span class="message-info-text">' . "{$vehicle["Engine"]["BuiltBy"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Displacement</span><span class="message-info-text">' . "{$vehicle["Engine"]["Displacement"]}" . ' l</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Power</span><span class="message-info-text">' . "{$vehicle["Engine"]["Power"]}" . ' kW</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Torque</span><span class="message-info-text">' . "{$vehicle["Engine"]["Torque"]}" . ' N&#xb7;m</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Fuel Type</span><span class="message-info-text">' . "{$vehicle["Engine"]["FuelType"]}" . '</span></p>';

		echo $divClose;	// _3

		echo '<div class="card-landscape-upper-infoarea" id="info-model-' . $branch["Id"] . '" style="display: none">'; // 3 model
		
		echo '<p class="small-margin"><span class="message-info-head">Manufacturer</span><span class="message-info-text">' . "{$vehicle["Manufacturer"]["Name"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Group</span><span class="message-info-text">' . "{$vehicle["Group"]["Name"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Engine</span><span class="message-info-text">' . "{$vehicle["Engine"]["Name"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Body</span><span class="message-info-text">' . "{$vehicle["Body"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Doors Count</span><span class="message-info-text">' . "{$vehicle["DoorsCount"]}" . '</span></p>';
		echo '<p class="small-margin"><span class="message-info-head">Seats Count</span><span class="message-info-text">' . "{$vehicle["SeatsCount"]}" . '</span></p>';

		echo $divClose;	// _3*/
		echo $divClose;	// _2

		echo '<div class="card-landscape-split-lower">'; // 2

		require("views/partial/GenerateBranchMapImg.php");

		foreach ($branch["Vehicles"] as $vehicle)
		{
			$images = glob("images/images/vehicles/{$vehicle["RegPlate"]}/*");
			$image = $images[0];
			echo '<div class="card-landscape-smallimg" id="smallimg-' . str_replace(' ', '-', $vehicle["RegPlate"]) . '" onclick="swapImg(\'img-' . $branch["Id"] . '-full\', \'' . $image . '\')" style="background-image: url(\'' . $image . '\')"></div>';
		}
		echo "\n";

		echo $divClose;	// _2
		
		echo '<div class="card-transparent-btn"onclick="location.href = \'Branch.php?id=' . $branch["Id"] . '\'"></div>';

		echo $divClose;	// _1
		echo "\n";
		echo '<script type="text/javascript"> document.getElementById("smallimg-map-' . $branch["Id"] . '").click(); </script>';
		echo "\n";
	}
	printPages("Branches.php", ceil(count($branches) / $itemsPerPage), $page);
?>