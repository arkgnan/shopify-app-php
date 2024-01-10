<?php

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'shopify_app';

$mysql = mysqli_connect($server, $username, $password, $database);

if(!$mysql) {
    die("Error: " . mysqli_connect_error());
}
