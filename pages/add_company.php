<?php
$added = null;
if (isset($_POST['company_name'])) {
	$service = new CompanyService($database);
	$added = $service->addCompany($_POST['company_name']);
}
?>
<h2>Add Company</h2>
<form method="POST">
	<label>
		<span>Company Name</span>
		<input type="text" name="company_name" value="" autocomplete="off">
	</label>
	<div>
		<button type="submit">Add Company</button>
	</div>
	<?php if ($added === true): ?>
		<span class="success">
			Successfully added the company <?= htmlspecialchars($_POST['company_name']) ?>
		</span>
	<?php elseif ($added === false): ?>
		<span class="error">
			Invalid company name, company name should not be blank.
		</span>
	<?php endif; ?>
</form>

