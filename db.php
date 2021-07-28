<?php
	define('MYSQL_SERVER', 'localhost');
	define('MYSQL_USER', 'softspri_dev');
	define('MYSQL_PASSWORD', 'JGdw.3KO9-o?');
	define('MYSQL_DB', 'softspri_dev');

	function db_connect() {
		$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
		or die("Error: ".mysqli_error($link));
		if(!mysqli_set_charset($link, "utf8")) {
			printf("Error: ".mysqli_error($link));
		}

		return $link;
	}

	$user = 'softspri_dev';
	$password = 'JGdw.3KO9-o?';
	$db = 'softspri_dev';
	$host = 'localhost';

	$dsn = 'mysql:host='.$host.';dbname='.$db;
	$pdo = new PDO($dsn, $user, $password);
?>