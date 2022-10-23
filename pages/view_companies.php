<?php
/**
 * @var CompanyService $companyService
 */
?>
<ul>
	<?php foreach($companyService->getAllCompanies() as $company): ?>
		<li>
			<a href="../index.php?page=view_company&company_id=<?=$company->id ?>">
				<?= htmlspecialchars($company->name) ?> - Employees: <?= $company->employee_count ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>