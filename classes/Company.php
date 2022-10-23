<?php

/**
 * @property int $id
 */
class Company extends stdClass {
	private array $employees = [];

	public function __construct($data) {
		foreach ($data as $key => $value) {
			$this->$key = $value;
		}
	}

	public function setEmployees($employees) {
		$this->employees = $employees;
	}

	public function getEmployees(): array {
		return $this->employees;
	}
}