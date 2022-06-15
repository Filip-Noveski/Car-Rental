<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell" style="width: 256px">Name</th>
			<th class="db-table-cell">Country</th>
			<th class="db-table-cell" style="width: 256px">Group</th>
		</tr>
		<?php
			foreach ($makes as $row)
			{
				$jsParams = "{'name': '" . $row["Name"] . "', 'country': '" . $row["Country"] . "', 'group': '" . $row["Group"] . "', 'old-name': '" . $row["Name"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["Name"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Country"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Group"] . '</td>';

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

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Car Make</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_car_make.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="add_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="add_name" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_country">Country:</label><br />
				<input class="form-input" type="text" name="country" id="add_country" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_logo">Make logo:</label><br />
				<input class="form-input" type="file" name="logo" id="add_logo_file" readonly style="display: none" onchange="document.getElementById('add_logo').value = document.getElementById('add_logo_file').value" />
				<input class="form-input" type="text" id="add_logo" onclick="document.getElementById('add_logo_file').click()" readonly style="cursor: pointer" value="Click to choose file" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_group">Group:</label><br />
				<select class="form-input" name="group" id="add_group">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($groups as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Add Car Make</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_car_make.php" enctype="multipart/form-data">
			<input type="hidden" name="old-name" id="edit_old-name" />
			<p class="form-input-field">
				<label class="form-input-label" for="edit_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="edit_name" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_country">Country:</label><br />
				<input class="form-input" type="text" name="country" id="edit_country" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_group">Group:</label><br />
				<select class="form-input" name="group" id="edit_group">
					<option class="form-input-option" value="">--Select--</option>
					<?php
						foreach ($groups as $group)
						{
							echo '<option class="form-input-option" value="' . $group["Name"] . '">' . $group["Name"] . '</option>';
						}
					?>
				</select>
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_logo">Make logo:</label><br />
				<input class="form-input" type="file" name="logo" id="edit_logo_file" readonly style="display: none" onchange="document.getElementById('edit_logo').value = document.getElementById('edit_logo_file').value" />
				<input class="form-input" type="text" id="edit_logo" onclick="document.getElementById('edit_logo_file').click()" readonly style="cursor: pointer" value="Click to choose file" />
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('edit-submit').click(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['name']); return false;">Delete this Make</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_car_make.php">
			<input type="hidden" name="name" id="delete_name" />
			<p>Are you sure you want to delete this car make?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Car Make</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>