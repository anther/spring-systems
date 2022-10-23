<?php
/**
 * Assuming php version 7.4
 */

spl_autoload_register(function ($className) {
	include __DIR__ . '/classes/' . $className . '.php';
});

// List of available pages so nothing weird with accessing other files in the file system can happen
$availablePages = [
	'add_company',
	'view_companies',
	'view_company',
	'welcome',
];
$availablePages = array_flip($availablePages);

$page = $_GET['page'] ?? 'welcome'; // If no page is provided, we should just display the welcome page
if (!isset($availablePages[$page])) {
	http_response_code(404); // 404 header so that the browser doesn't cache the invalid page
	$page = "not_found";
}

$database = Database::connect();
if ($database) {
	$companyService = new CompanyService($database);
} else {
	$errorMessage = "Database has not been created, please run the script in install.sql";
}

ob_start();
// fetch contents and set into $content variable so that layout.php can render it
require(__DIR__ . "/pages/$page.php");
$content = ob_get_clean();


require("layout.php");