<?php

final class EmployeeService {
	private PDO $pdo;

	public function __construct(Database $database) {
		$this->pdo = $database->getPdo();
	}

	public function getAllEmployees() {
		$result = $this->pdo->query("SELECT employees.*, companies.name as company_name, companies.id as company_id
       		FROM employees
			LEFT JOIN companies ON companies.id = employees.company_id 
		");
		return $result->fetchAll(PDO::FETCH_OBJ);
	}
}