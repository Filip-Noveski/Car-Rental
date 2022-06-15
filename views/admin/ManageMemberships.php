<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Type</th>
			<th class="db-table-cell">Price</th>
			<th class="db-table-cell">Duration</th>
			<th class="db-table-cell">Discount</th>
		</tr>
		<?php
			foreach ($memberships as $row)
			{
				$jsParams = "{'type': '" . $row["Type"] . "', 'price': '" . $row["Price"] . "', 'duration': '" . $row["Duration"] . "', 'disc': '" . $row["Discount"] * 100 . "'}";
				echo '<tr class="db-table-row" onclick="showEditBox(' . $jsParams . ')">';

				echo '<td class="db-table-cell">' . $row["Type"] . '</td>';
				echo '<td class="db-table-cell">&euro; ' . $row["Price"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Duration"] . ' months</td>';
				echo '<td class="db-table-cell">' . ($row["Discount"] * 100) . ' %</td>';

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

<a class="btn" href="#" onclick="showAddBox(); return false;">Add Membership</a>

<div class="popup-background" id="add-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Add/add_membership.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="add_type">Type:</label><br />
				<input class="form-input" type="text" name="type" id="add_type" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_price">Price [&euro;]:</label><br />
				<input class="form-input" type="text" name="price" id="add_price" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_duration">Duration [months]:</label><br />
				<input class="form-input" type="text" name="duration" id="add_duration" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_disc">Discount [%]:</label><br />
				<input class="form-input" type="text" name="disc" id="add_disc" />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="add_logo">Membership symbol:</label><br />
				<input class="form-input" type="file" name="logo" id="add_logo_file" readonly style="display: none" onchange="document.getElementById('add_logo').value = document.getElementById('add_logo_file').value" />
				<input class="form-input" type="text" id="add_logo" onclick="document.getElementById('add_logo_file').click()" readonly style="cursor: pointer" value="Click to choose file" />
			</p>
			<input type="submit" id="submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('submit').click(); return false;">Add Membership</a>
			<a class="btn" href="#" onclick="hideAddBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="edit-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Edit/edit_membership.php" enctype="multipart/form-data">
			<p class="form-input-field">
				<label class="form-input-label" for="edit_type">Type:</label><br />
				<input class="form-input" type="text" name="type" id="edit_type" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_price">Price [&euro;]:</label><br />
				<input class="form-input" type="text" name="price" id="edit_price" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_duration">Duration [months]:</label><br />
				<input class="form-input" type="text" name="duration" id="edit_duration" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_disc">Discount [%]:</label><br />
				<input class="form-input" type="text" name="disc" id="edit_disc" readonly />
			</p>
			<p class="form-input-field">
				<label class="form-input-label" for="edit_logo">Membership symbol:</label><br />
				<input class="form-input" type="file" name="logo" id="edit_logo_file" readonly style="display: none" onchange="document.getElementById('edit_logo').value = document.getElementById('edit_logo_file').value" />
				<input class="form-input" type="text" id="edit_logo" onclick="document.getElementById('edit_logo_file').click()" readonly style="cursor: pointer" value="Click to choose file" />
			</p>
			<input type="submit" id="edit-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('edit-submit').click(); return false;">Submit Changes</a>
			<a class="btn" href="#" onclick="promptDelete(['type']); return false;">Delete this Membership</a>
			<a class="btn" href="#" onclick="hideEditBox(); return false;">Cancel</a>
		</form>
	</div>
</div>

<div class="popup-background" id="prompt-box">
	<div class="popup-box">
		<form method="post" action="operations/SQL_Remove/remove_membership.php">
			<input type="hidden" name="type" id="delete_type" />
			<p>Are you sure you want to delete this service company?</p>
			<input type="submit" id="delete-submit" style="display: none" />
			<a class="btn" href="#" onclick="document.getElementById('delete-submit').click(); return false;">Delete Membership</a>
			<a class="btn" href="#" onclick="hidePromptBox(); return false;">Cancel</a>
		</form>
	</div>
</div>