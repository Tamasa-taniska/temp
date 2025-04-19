
<?php
$host = "localhost";
$user = "root";
$password = "Tr0ub4dor&3l3phant";
$db = "runiverse";

// Create database connection
$data = new mysqli($host, $user, $password, $db);

// Check connection
if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}
?>
