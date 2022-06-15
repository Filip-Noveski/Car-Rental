<script type="text/javascript" src="js/manage.js"></script>

<h2 class="heading"><?= $pageName ?></h2>

<div class="db-table-container">
	<table class="db-table">
		<tr class="db-table-row">
			<th class="db-table-cell">Name</th>
			<th class="db-table-cell">Email</th>
			<th class="db-table-cell">Phone</th>
			<th class="db-table-cell">Unique Id</th>
		</tr>
		<?php
			foreach ($customers as $row)
			{
				echo '<tr class="db-table-row">';

				echo '<td class="db-table-cell">' . $row["FirstName"] . ' ' . $row["LastName"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Email"] . '</td>';
				echo '<td class="db-table-cell">' . $row["Phone"] . '</td>';
				echo '<td class="db-table-cell">' . $row["UniqueId"]  . '</td>';

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