<div class="map">
	<img class="map-img" src="<?= $root ?>/images/images/map.png" />

	<?php 
		$imgPath = "$root/images/icons/map_pin.svg";

		foreach ($branches as $branch)
		{
			$x = $branch["CoordsX"] + 2;
			$y = $branch["CoordsY"] - 2.5;
			echo "<div class=\"map-pin-container\" style=\"left: {$y}%; bottom: {$x}%\" onclick=\"location.href = 'Branch.php?id={$branch["Id"]}';\">";
			echo "<img class=\"map-pin\" src=\"$imgPath\" />";
			echo '<div class="map-pin-info-container">';
			echo '<p class="map-pin-info-text">' . $branch["Name"] . '</p>';
			echo "</div>";
			echo "</div>";
		}
	?>
</div>