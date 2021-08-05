<?php

$db_username = 'root';
$db_password = '';
$db_name = 'charity';
$db_host = 'localhost';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}



?>