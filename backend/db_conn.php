<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'easycoach';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "Connection failed!";
}
