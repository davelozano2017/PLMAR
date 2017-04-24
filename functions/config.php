<?php
$host 	= 'localhost';
$user 	= 'root';
$pass 	= '';
$dbase 	= 'plmar';
$db = new mysqli($host,$user,$pass,$dbase);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

