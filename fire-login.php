<?php
// Include database configuration
include("db_config.php");

if (isset($_POST['login'])) {
    // Retrieve and sanitize user input
    $username = $_POST['username'];
    $log_password = $_POST['password'];

    try {
        // Connect to the PostgreSQL database using PDO
        $dsn = "pgsql:host=$host;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password);
        
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL query to prevent SQL injection
        $query = "SELECT * FROM login_users WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($query);

        // Bind parameters to prevent SQL injection
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $log_password);

        // Execute the query
        $stmt->execute();

        // Fetch the result row
        if ($stmt->rowCount() > 0) {
            session_start(); // Start session

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Store user information in session variables
            $_SESSION['user'] = $row['username'];
            $_SESSION['user_type'] = $row['user_type']; // Assuming 'user_type' is the column name

            // Redirect to the main page
            header("Location: index.php");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            // Redirect back to login with an error message
            header("Location: login.php?error=invalid_credentials");
            exit(); // Ensure no further code is executed after the redirect
        }
    } catch (PDOException $e) {
        // Handle connection or query errors
        echo "Error: " . $e->getMessage();
    } finally {
        // Close the database connection (not strictly necessary with PDO)
        $pdo = null;
    }
} else {
    echo "Invalid access method.";
}
?>
