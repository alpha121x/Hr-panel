<?php
// Database connection settings
$host = 'localhost';
$dbname = 'new_db'; // Your database name
$user = 'postgres'; // Your PostgreSQL username
$password = '12345'; // Your PostgreSQL password

// DSN (Data Source Name) for PostgreSQL
$dsn = "pgsql:host=$host;dbname=$dbname";

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $user, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connection successful!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
