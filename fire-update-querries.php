<?php
require_once "include/classes/meekrodb.2.3.class.php";
include('db_config.php');

// Update user details
if (isset($_POST['update-user'])) {
    $user_edit_page_id = $_POST['user-edit-page-id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $user_image = $_POST['user_image'];

    // Update query using MeekroDB
    $updated = DB::update('admin_users', [
        'username' => $username,
        'email' => $email,
        'user_type' => $user_type,
        'user_image' => $user_image
    ], 'id=%i', $user_edit_page_id);

    if ($updated) {
        header("Location: admin_users.php");
    }
}
?>
<?php
// Update user password
if (isset($_POST['update-password'])) {
    $password = $_POST['renewpassword'];

    // Update query using MeekroDB
    $updated_password = DB::update('admin_users', ['password' => $password], 'LIMIT 1');

    if ($updated_password) {
        header("Location: admin-profile.php");
    }
}
?>

<?php 
// Update user-address details
if (isset($_POST['update'])) {
    $edit_employe_attendance_id = $_POST['edit-employe-attendance-id'];
    $employe_name = $_POST['employe_name'];
    $attendance = $_POST['attendance'];
    $month = $_POST['month'];
    $date = $_POST['date'];

    // Update query using MeekroDB
    $updated = DB::update('attendance_daily', [
        'employe_name' => $employe_name,
        'attendance_status' => $attendance,
        'current_month' => $month,
        'date_current' => $date
    ], 'id=%i', $edit_employe_attendance_id);

    if ($updated) {
        header("Location: attendance-report.php");
    }
}

?>

<?php 
// Update user-address details
if (isset($_POST['update-leave'])) {
    $edit_leave_id = $_POST['edit-leave-id'];
    $employe_name = $_POST['employe_name'];
    $leave_type = $_POST['leave_type'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $status = $_POST['status'];

    // Update query using MeekroDB
    $updated_leave = DB::update('leaves', [
        'employe_name' => $employe_name,
        'leave_type' => $leave_type,
        'date_from' => $date_from,
        'date_to' => $date_to,
        'status' => $status
    ], 'id=%i', $edit_leave_id);

    if ($updated_leave) {
        header("Location: manage-leaves.php");
    }
}

?>
