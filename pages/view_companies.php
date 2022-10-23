<?php
/**
 * @var CompanyService $companyService
 */
?>
<h2>All Companies</h2>
<table>
	<thead>
	<tr>
		<th>ID</th>
		<th>Company Name</th>
		<th>Employee Count</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($companyService->getAllCompanies() as $company): ?>
		<tr>
			<td>
				<?= $company->id ?>
			</td>
			<td>
				<a href="../index.php?page=view_company&company_id=<?= $company->id ?>">
					<?= htmlspecialchars($company->name) ?>
				</a>
			</td>
			<td>
				<?= $company->employee_count ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
