<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Registration</th>
			<th class="db-table-cell" style="width: 284px">Branch</th>
			<th class="db-table-cell" style="width: 284px">Model</th>
			<th class="db-table-cell">Transmission</th>
			<th class="db-table-cell">Colour</th>
		</tr>
		<?php
			foreach ($vehicles as $row)
			{
				$model = $row["Model"] . ' ' . $row["Generation"] . ' ' . $row["Submodel"] . ' ' . $row["Engine"]["Name"];
				$jsVehicleData = "{$row["RegPlate"]}, {$row["ModelYear"]} {$row["Make"]} {$row["Model"]} {$row["Generation"]} {$row["Submodel"]} {$row["Engine"]["Name"]}";
				
				$jsServiceParams = "{";
				for ($k = 0; $k <= count($row["ServiceData"]) - 1; $k++)
				{
					$sd = $row["ServiceData"][$k];
					$jsServiceParams .= "'$k': { 'scn': '{$sd["ServiceCompany"]["Name"]}', 'scl': '{$sd["ServiceCompany"]["Location"]}', 'date': '{$sd["Date"]}', 'price': '{$sd["Price"]}' }";
					if ($k != count($row["ServiceData"]) - 1)
					{
						$jsServiceParams .= ", ";
					}
				}

				$jsServiceParams .= " }";

				echo '<tr class="db-table-row" onclick="fillServiceTable(\'' . $jsVehicleData . '\', ' . $jsServiceParams . ')">';

				echo '<td class="db-table-cell">' . $row["RegPlate"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Location"] . '</td>';
				echo '<td class="db-table-cell">' . $model . '</td>';
				echo '<td class="db-table-cell">' . $row["Transmission"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Colour"] . '</td>';

				echo '</tr>';
			}
		?>
	</table>
</div>

<?php
	if ($error != "")
		echo "<p class=\"error\">$error</p>";
	if ($success != "")
		echo "<p class=\"success\">$success</p>";
?>

<div class="db-table-container" id="service-table">
</div>