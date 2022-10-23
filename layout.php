<?php
/**
 * @var string $content      The page content
 * @var string $errorMessage If the database hasn't been created, a message about the database state.
 */
?>
<html>
<head>
	<title>Spring Code Challenge</title>
	<style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }
	</style>
</head>
<body>
<ul>
	<li><a href='index.php?page=add_company'>Add Company</a></li>
	<li><a href='index.php?page=view_companies'>View Companies</a></li>
</ul>
<?php if (isset($errorMessage) && $errorMessage): ?>
	<p class="error"><?= $errorMessage ?></p>
<?php endif; ?>
<?= $content ?>
</body>
</html>