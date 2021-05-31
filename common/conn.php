<?php
$servername = "localhost";
$username = "root";
$password = "pawelb2020";
$dbname = "kids_gaming";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
