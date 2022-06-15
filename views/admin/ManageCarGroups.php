<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell" style="width: 312px">Name</th>
			<th class="db-table-cell" style="Width: 256px">Country</th>
		</tr>
		<?php
			foreach ($groups as $row)
			{
				$jsParams = "{'name': '" . $row["Name"] . "', 'country': '" . $row["Country"] . "', 'old-name': '" . $row["Name"] . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["Name"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Country"] . '</td>';

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

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Car Group</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_car_group.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="add_name">Name:</label><br />
				<input class="form-input" type="text" name="name" id="add_name" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_country">Country:</label><br />
				<input class="form-input" type="text" name="country" id="add_country" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_logo">Group logo:</label><br />
				<input class="form-input" type="file" name="logo" id="add_logo_file" readonly style="display: none" onchange="document.getElementById('add_logo').value = document.getElementById('add_logo_file').value" />
				<input class="form-input" type="text" id="add_logo" onclick="document.getElementById('add_logo_file').click()" readonly style="cursor: pointer" value="Click to choose file" />
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Add Car Group</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_car_group.php" enctype="multipart/form-data">
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
				<label class="form-input-label" for="edit_logo">Group logo:</label><br />
				<input class="form-input" type="file" name="logo" id="edit_logo_file" readonly style="display: none" onchange="document.getElementById('edit_logo').value = document.getElementById('edit_logo_file').value" />
				<input class="form-input" type="text" id="edit_logo" onclick="document.getElementById('edit_logo_file').click()" readonly style="cursor: pointer" value="Click to choose file" />
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('edit-submit').click(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['name']); return false;">Delete this Group</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_car_group.php">
			<input type="hidden" name="name" id="delete_name" />
			<p>Are you sure you want to delete this car group?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Car Group</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>