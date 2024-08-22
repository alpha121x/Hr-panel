<?php
// Include database configuration
include("db_config.php");

if (isset($_POST['login'])) {
    // Retrieve and sanitize user input
    $username = $_POST['username'];
    $log_password = $_POST['password'];

    // Connect to the PostgreSQL database
    $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");

    if (!$conn) {
        die("Connection failed: " . pg_last_error());
    }

    // Prepare the SQL query to prevent SQL injection
    $query = "SELECT * FROM login_users WHERE username = $1 AND password = $2";
    $result = pg_query_params($conn, $query, array($username, $log_password));
    // print_r($result);
    // die();

    if ($result && pg_num_rows($result) > 0) {
        session_start(); // Start session

        // Fetch the result row
        $row = pg_fetch_assoc($result);



        // Store user information in session variables
        $_SESSION['user'] = $row['username'];
        $_SESSION['user_type'] = $row['user_type']; // Assuming 'user_type' is the column name

        pg_close($conn); // Close the database connection
        header("Location: index.php");
        exit(); // Ensure no further code is executed after the redirect
    } else {
        pg_close($conn); // Close the database connection
        // Redirect back to login with an error message
        header("Location: login.php?error=invalid_credentials");
        exit(); // Ensure no further code is executed after the redirect
    }
} else {
    echo "Invalid access method.";
}
?>
