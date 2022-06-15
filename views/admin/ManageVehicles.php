<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Registration</th>
			<th class="db-table-cell">Model Year</th>
			<th class="db-table-cell" style="width: 312px">Model</th>
			<th class="db-table-cell">Transmission</th>
			<th class="db-table-cell">Colour</th>
			<th class="db-table-cell">Price</th>
		</tr>
		<?php
			foreach ($vehicles as $row)
			{
				$model = $row["Model"] . ' ' . $row["Generation"] . ' ' . $row["Submodel"] . ' ' . $row["Engine"];
				$model2 = $row["Model"] . ';;;' . $row["Generation"] . ';;;' . $row["Submodel"] . ';;;' . $row["Engine"];
				$jsParams = "{'reg': '" . $row["RegPlate"] . "', 'year': '" . $row["ModelYear"] . "', 'model': '" . $model2 . "', 'trans': '" . $row["Transmission"] . "', 'colour': '" . $row["Colour"] . "', 'price': '" . $row["Price"] . "', 'branch': '" . $row["BranchId"] . "', 'ser_co': '" . $row["PreferredService"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["RegPlate"] . '</td>';
				echo '<td class="db-table-cell">' . $row["ModelYear"] . '</td>';
				echo '<td class="db-table-cell">' . $model . '</td>';
				echo '<td class="db-table-cell">' . $row["Transmission"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Colour"] . '</td>';
				echo '<td class="db-table-cell">&euro;' . $row["Price"] . ' / week</td>';

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

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Vehicle</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_vehicle.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="add_reg">Registration Plate:</label><br />
				<input class="form-input" type="text" name="reg" id="add_reg" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_year">Model Year:</label><br />
				<input class="form-input" type="number" name="year" id="add_year" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_model">Model:</label><br />
				<select class="form-input" name="model" id="add_model">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($models as $vehicle)
						{
							$value = $vehicle["Name"] . ";;;" . $vehicle["Generation"] . ";;;" . $vehicle["Submodel"] . ";;;" . $vehicle["Engine"];
							$text = $vehicle["Name"] . ' ' . $vehicle["Generation"] . ' ' . $vehicle["Submodel"] . ' ' . $vehicle["Engine"];
							echo '<option class="form-input-option" value="' . $value . '">' . $text . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_trans">Transmission type:</label><br />
				<input class="form-input" type="text" name="trans" id="add_trans" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_colour">Colour:</label><br />
				<input class="form-input" type="text" name="colour" id="add_colour" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_price">Price [&euro; / week]:</label><br />
				<input class="form-input" type="text" name="price" id="add_price" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_imgs">Images:</label><br />
				<input class="form-input" type="file" name="imgs[]" multiple id="add_imgs_file" readonly style="display: none" onchange="document.getElementById('add_imgs').value = document.getElementById('add_imgs_file').files.length + ' files selected'" />
				<input class="form-input" type="text" id="add_imgs" onclick="document.getElementById('add_imgs_file').click()" readonly style="cursor: pointer" value="Click to choose file" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_branch">Branch:</label><br />
				<select class="form-input" name="branch" id="add_branch">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($branches as $branch)
						{
							echo '<option class="form-input-option" value="' . $branch["Id"] . '">' . $branch["Name"] . "; " . $branch["Location"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_ser_co">Preferred Service:</label><br />
				<select class="form-input" name="ser_co" id="add_ser_co">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($serviceCos as $serCo)
						{
							echo '<option class="form-input-option" value="' . $serCo["Id"] . '">' . $serCo["Name"] . "; " . $serCo["Location"] . '</option>';
						}
					?>
				</select>
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Add Vehicle</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_vehicle.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="edit_reg">Registration Plate:</label><br />
				<input class="form-input" type="text" name="reg" id="edit_reg" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_year">Model Year:</label><br />
				<input class="form-input" type="number" name="year" id="edit_year" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_model">Model:</label><br />
				<select class="form-input" name="model" id="edit_model" disabled>
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($models as $vehicle)
						{
							$value = $vehicle["Name"] . ";;;" . $vehicle["Generation"] . ";;;" . $vehicle["Submodel"] . ";;;" . $vehicle["Engine"];
							$text = $vehicle["Name"] . ' ' . $vehicle["Generation"] . ' ' . $vehicle["Submodel"] . ' ' . $vehicle["Engine"];
							echo '<option class="form-input-option" value="' . $value . '">' . $text . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_trans">Transmission type:</label><br />
				<input class="form-input" type="text" name="trans" id="edit_trans" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_colour">Colour:</label><br />
				<input class="form-input" type="text" name="colour" id="edit_colour" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_price">Price [&euro; / week]:</label><br />
				<input class="form-input" type="text" name="price" id="edit_price" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_branch">Branch:</label><br />
				<select class="form-input" name="branch" id="edit_branch" disabled>
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($branches as $branch)
						{
							echo '<option class="form-input-option" value="' . $branch["Id"] . '">' . $branch["Name"] . "; " . $branch["Location"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_ser_co">Preferred Service:</label><br />
				<select class="form-input" name="ser_co" id="edit_ser_co">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($serviceCos as $serCo)
						{
							echo '<option class="form-input-option" value="' . $serCo["Id"] . '">' . $serCo["Name"] . "; " . $serCo["Location"] . '</option>';
						}
					?>
				</select>
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('edit-submit').click(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['reg']); return false;">Delete this Vehicle</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_vehicle.php">
			<input type="hidden" name="reg" id="delete_reg" />
			<p>Are you sure you want to delete this car make?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Vehicle</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>