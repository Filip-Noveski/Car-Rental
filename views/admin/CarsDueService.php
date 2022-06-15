<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Registration</th>
			<th class="db-table-cell">Branch</th>
			<th class="db-table-cell">Model</th>
			<th class="db-table-cell">Transmission</th>
			<th class="db-table-cell">Colour</th>
			<th class="db-table-cell">Last Service</th>
			<th class="db-table-cell">Preferred Service</th>
			<th class="db-table-cell">Location</th>
		</tr>
		<?php
			foreach ($vehicles as $row)
			{
				$model = $row["Model"] . ' ' . $row["Generation"] . ' ' . $row["Submodel"] . ' ' . $row["Engine"];
				$jsParams = "{'reg': '" . $row["RegPlate"] . "', 'sc': '" . $row["PreferredService"]["Id"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["RegPlate"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Branch"]["Location"] . '</td>';
				echo '<td class="db-table-cell">' . $model . '</td>';
				echo '<td class="db-table-cell">' . $row["Transmission"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Colour"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Date"] . '</td>';
				echo '<td class="db-table-cell">' . $row["PreferredService"]["Name"] . '</td>';
				echo '<td class="db-table-cell">' . $row["PreferredService"]["Location"] . '</td>';

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

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/report_service.php">
			<p class="form-input-field">
				<label class="form-input-label" for="edit_reg">Registration Plate:</label><br />
				<input class="form-input" type="text" name="reg" id="edit_reg" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_sc">Service Company:</label><br />
				<select class="form-input" name="sc" id="edit_sc">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($serviceCos as $serCo)
						{
							echo '<option class="form-input-option" value="' . $serCo["Id"] . '">' . $serCo["Name"] . "; " . $serCo["Location"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_date">Date:</label><br />
				<input class="form-input" type="date" name="date" id="add_date" max="<?= date("Y-m-d") ?>" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_price">Price [&euro;]:</label><br />
				<input class="form-input" type="number" name="price" id="add_price" />
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Report Service</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>