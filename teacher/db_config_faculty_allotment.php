<?php
$servername = "localhost";
$username = "root";
$password = "Tr0ub4dor&3l3phant";
$database = "runiverse";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

// Optional but recommended
$conn->set_charset("utf8mb4");
?>
