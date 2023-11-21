<?php

define('host', 'localhost');
define('username', 'root');
define('password', '');
define('database', 'dbonewmc');

// Created connection string
$mysqli = new mysqli(host, username, password, database);

// Check connection
if( $mysqli->connect_error ) {
    die('Connection failed: ' . $mysqli->connect_error);
}
mysqli_report( MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT );
$mysqli->set_charset('utf8mb4');