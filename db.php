<?php
// Database connection settings
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'lab4_db';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>