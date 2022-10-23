<?php

final class CompanyService {
	private PDO $pdo;

	public function __construct(Database $database) {
		$this->pdo = $database->getPdo();
	}

	public function addCompany(string $name = ''): bool {
		$name = trim($name);
		if ($name === '') {
			return false;
		}
		$statement = $this->pdo->prepare("INSERT INTO companies (name) VALUES (:name)");
		$statement->execute(['name' => $name]);
		return true;
	}

	public function getAllCompanies(): array {
		$result = $this->pdo->query("SELECT companies.*, count(employees.id) as employee_count FROM companies
			LEFT JOIN employees ON companies.id = employees.company_id 
		GROUP BY companies.id
		");
		return $result->fetchAll(PDO::FETCH_OBJ);
	}

	public function getCompanyById(int $id): ?Company {
		// Fetch company
		$statement = $this->pdo->prepare("SELECT *
			FROM companies
          WHERE companies.id = :company_id
		");
		$result = $statement->execute(['company_id' => $id]);
		if (!$result) {
			return null;
		}
		$companyData = $statement->fetch(PDO::FETCH_OBJ);
		$company = new Company($companyData);

		// Add employees to the company
		$statement = $this->pdo->prepare("SELECT employees.* 
			FROM employees
          WHERE employees.company_id = :company_id
		");
		$statement->execute(['company_id' => $id]);
		$employees = $statement->fetchAll(PDO::FETCH_OBJ);
		$company->setEmployees($employees);
		return $company;
	}

	public function addEmployeeToCompany(Company $company, string $employeeName = ''): bool {
		$employeeName = trim($employeeName);
		if ($employeeName === '') {
			return false;
		}
		$statement = $this->pdo->prepare("INSERT INTO employees (company_id, name)
			VALUES (:company_id, :name)");
		$statement->execute(['company_id' => $company->id, 'name' => $employeeName]);
		return true;
	}
}