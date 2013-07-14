<?php

if ('localhost' == $_SERVER['HTTP_HOST'] or 'project' == $_SERVER['HTTP_HOST']) {
	// LOCAL
	$dsn  = 'mysql:dbname=memberboat_dev;host=127.0.0.1';
	$user = 'root';
	$pass = '';
} else {
	// DEV SERVER
	$dsn  = 'mysql:dbname=DEV_DB;host=127.0.0.1';
	$user = 'DEV_USER';
	$pass = 'DEV_PASS';
}

try {
	$pdo_db = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
