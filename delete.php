<?php
include("db_config.php");

// Check if user ID is provided in the URL
if (isset($_GET['deleteid'])) {
    $user_id = $_GET['deleteid'];

    // Delete query using MeekroDB
    $deleted = DB::delete('admin_users', 'user_id=%i', $user_id);

    if ($deleted) {
        header("Location: admin_users.php");
    } else {
        header("Location: admin_users.php");
    }
} else {
    // Handle the case where no user ID is provided in the URL
    header("Location: admin_users.php");
}
?>

<?php
include("db_config.php");

// Check if user ID is provided in the URL
if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];

    // Delete query using MeekroDB
    $deleted = DB::delete('attendance_daily', 'id=%i', $id);

    if ($deleted) {
        header("Location: attendance-report.php");
    } else {
        header("Location: attendance-report.php");
    }
} else {
    // Handle the case where no user ID is provided in the URL
    header("Location: attendance-report.php");
}
?>
