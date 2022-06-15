<script type="text/javascript" src="js/rentVehicle.js"></script>

<p class="small-margin" style="display: inline-block; vertical-align: bottom; position: absolute; bottom: 0;">
	<?php
		if (!isset($_SESSION["membertype"]) || $_SESSION["membertype"] == "None")
		{
			echo '<span class="message-info-head standard-price">';
			echo "&euro;{$vehicle["Price"]} / week";
			echo '</span>';
		}
		else
		{
			$disc = round($vehicle["Price"] * (1 - $memberDisc) * 100) / 100;
			echo '<span class="message-info-head standard-price" style="text-decoration: line-through">';
			echo "&euro;{$vehicle["Price"]} / week";
			echo '<span class="message-info-head discounted-price" style="color: ' . $membershipColour . '">';
			echo "&euro;{$disc} / week";
			echo '</span>';
			echo '</span>';
		}
	?>
	<span class="message-info-text">
		<a class="btn" href="#" style="width: 120px; text-align: center" onclick="promptRent()">Rent Vehicle</a>
	</span>
</p>