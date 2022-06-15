<?php
	$fullName = "{$vehicle["ModelYear"]} {$vehicle["Make"]} {$vehicle["Model"]} {$vehicle["Generation"]} {$vehicle["Submodel"]}";
	if (isset($vehicleMessage))
	{
		$fullName .= ' <span class="small-info">' . $vehicleMessage . '</span>';
		unset($vehicleMessage);
	}
	$jsParams = "{'reg': '" . $vehicle["RegPlate"] . "'}";
	echo $divLandscape . 'style="padding-top: 0">';	// 1
		
	$logoPath = glob("images/images/car_makes/" . $vehicle["Make"] . ".*")[0];
	$logo = '<img class="card-logo" src="' . $logoPath . '" />';
	echo '<h3 class="heading small-margin card-upper-heading" style="margin-top: 8px;">' . $logo . $fullName . '</h3>';

	echo '<div class="card-tabs-container">'; //2
	echo '<p class="card-tab-btn" onclick="changeTab(\'vehicle\', \'' . $i . '\')">Vehicle</p>';
	echo '<p class="card-tab-btn" onclick="changeTab(\'engine\', \'' . $i . '\')">Engine</p>';
	echo '<p class="card-tab-btn" onclick="changeTab(\'model\', \'' . $i . '\')">Model</p>';
	echo $divClose;	// _2

	echo '<div class="card-landscape-split-upper">'; // 2

	echo '<div class="card-landscape-fullimg" id="img-' . $i . '-full"></div>'; // </>
	echo '<div class="card-landscape-upper-infoarea" id="info-vehicle-' . $i . '">'; // 3 vehicle

	echo '<p class="small-margin"><span class="message-info-head">Registration</span><span class="message-info-text">' . "{$vehicle["RegPlate"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Colour</span><span class="message-info-text">' . "{$vehicle["Colour"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Engine</span><span class="message-info-text">' . "{$vehicle["Engine"]["Name"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Transmission</span><span class="message-info-text">' . "{$vehicle["Transmission"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Location</span><span class="message-info-text">' . "{$vehicle["Name"]}; {$vehicle["Location"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Price</span><span class="message-info-text">&euro; ' . "{$vehicle["Price"]}" . ' / week</span></p>';

	echo $divClose;	// _3

	echo '<div class="card-landscape-upper-infoarea" id="info-engine-' . $i . '" style="display: none">'; // 3 engine

	$displacement = $vehicle["Engine"]["Displacement"] > 0 ? $vehicle["Engine"]["Displacement"] . " l" : "/";
	echo '<p class="small-margin"><span class="message-info-head">Engine Name</span><span class="message-info-text">' . "{$vehicle["Engine"]["Name"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Manufacturer</span><span class="message-info-text">' . "{$vehicle["Engine"]["BuiltBy"]}" . '<img class="flag" src="images/flags/' . $vehicle["Engine"]["Country"] . '.jpg" /></span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Displacement</span><span class="message-info-text">' . "{$displacement}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Power</span><span class="message-info-text">' . "{$vehicle["Engine"]["Power"]}" . ' kW</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Torque</span><span class="message-info-text">' . "{$vehicle["Engine"]["Torque"]}" . ' N&#xb7;m</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Fuel Type</span><span class="message-info-text">' . "{$vehicle["Engine"]["FuelType"]}" . '</span></p>';

	echo $divClose;	// _3

	echo '<div class="card-landscape-upper-infoarea" id="info-model-' . $i . '" style="display: none">'; // 3 model
		
	echo '<p class="small-margin"><span class="message-info-head">Manufacturer</span><span class="message-info-text">' . "{$vehicle["Manufacturer"]["Name"]}" . '<img class="flag" src="images/flags/' . $vehicle["Manufacturer"]["Country"] . '.jpg" /></span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Group</span><span class="message-info-text">' . "{$vehicle["Group"]["Name"]}" . '<img class="flag" src="images/flags/' . $vehicle["Group"]["Country"] . '.jpg" /></span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Engine</span><span class="message-info-text">' . "{$vehicle["Engine"]["Name"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Body</span><span class="message-info-text">' . "{$vehicle["Body"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Doors Count</span><span class="message-info-text">' . "{$vehicle["DoorsCount"]}" . '</span></p>';
	echo '<p class="small-margin"><span class="message-info-head">Seats Count</span><span class="message-info-text">' . "{$vehicle["SeatsCount"]}" . '</span></p>';

	echo $divClose;	// _3
	echo $divClose;	// _2

	echo '<div class="card-landscape-split-lower">'; // 2

	$images = glob("images/images/vehicles/{$vehicle["RegPlate"]}/*");
	for ($j = 0; $j <= count($images) - 1; $j++)
	{
		$image = $images[$j];
		echo '<div class="card-landscape-smallimg" ' . ($j == 0 ? ('id="smallimg-' . $i . '"') : '') . ' onclick="swapImg(\'img-' . $i . '-full\', \'' . $image . '\')" style="background-image: url(\'' . $image . '\')"></div>';
	}

	echo $divClose;	// _2
		
	echo '<div class="card-transparent-btn"onclick="location.href = \'Vehicle.php?reg=' . str_replace(' ', '+', $vehicle["RegPlate"]) . '\'"></div>';

	echo $divClose;	// _1
	echo '<script type="text/javascript"> document.getElementById("smallimg-' . $i . '").click(); </script>';
?>