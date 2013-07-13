<?php

if ('localhost' == $_SERVER['HTTP_HOST'] or 'project' == $_SERVER['HTTP_HOST']) {
	// LOCAL
	$mysqli_db = new mysqli('localhost', 'LOCAL_USER', 'LOCAL_PASS', 'LOCAL_DB');
} else {
	// DEV SERVER
	$mysqli_db = new mysqli('localhost', 'DEV_USER', 'DEV_PASS', 'DEV_DB');
}

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($mysqli_db->connect_error) {
    die('Connect Error (' . $mysqli_db->connect_errno . ') '
            . $mysqli_db->connect_error);
}

