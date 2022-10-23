<?php
/**
 * @var EmployeeService $employeeService
 */
?>
<h2>All Employees</h2>
<table>
	<thead>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Company</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($employeeService->getAllEmployees() as $employee): ?>
		<tr>
			<td><?= $employee->id ?></td>
			<td><?= htmlspecialchars($employee->name) ?></td>
			<td>
				<a href="../index.php?page=view_company&company_id=<?= $employee->company_id ?>">
					<?= htmlspecialchars($employee->company_name); ?>
				</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
