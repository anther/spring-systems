<?php
/**
 * @var CompanyService $companyService
 */
$company = $companyService->getCompanyById($_GET['company_id']);
$added = null;
if (isset($_POST['employee_name'])) {
	$added = $companyService->addEmployeeToCompany($company, $_POST['employee_name']);
	// Inefficient way to update employee information after adding the employee.
	$company = $companyService->getCompanyById($_GET['company_id']);
}


?>

<h2>Company <?= htmlspecialchars($company->name) ?></h2>

<h4><?= htmlspecialchars($company->name) ?>'s Employees - </h4>


<?php $employees = $company->getEmployees() ?>
<?php if ($employees): ?>
	<table>
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($employees as $employee): ?>
			<tr>
				<td><?= $employee->id ?></td>
				<td><?= htmlspecialchars($employee->name) ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<p>There are no employees for this company yet</p>
<?php endif; ?>

<h2>Add Employee</h2>
<form method="POST">
	<label>
		<span>Employee Name</span>
		<input type="text" name="employee_name" value="" autocomplete="off">
	</label>
	<div>
		<button type="submit">Add Employee</button>
	</div>
	<?php if ($added === true): ?>
		<span class="success">
			Successfully added the employee <?= htmlspecialchars($_POST['employee_name']) ?>
		</span>
	<?php elseif ($added === false): ?>
		<span class="error">
			Invalid employee name, employee name should not be blank.
		</span>
	<?php endif; ?>
</form>


