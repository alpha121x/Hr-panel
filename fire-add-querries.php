<?php
require_once "include/classes/meekrodb.2.3.class.php";
require('db_config.php');

if (isset($_POST['add-user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $user_image = $_POST['user_image'];

    // Insert query using MeekroDB
    $inserted = DB::insert('admin_users', [
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'user_type' => $user_type,
        'user_image' => $user_image
    ]);

    if ($inserted) {
        header("Location: add-user-profile.php");
    }
}
?>

<?php
require_once "include/classes/meekrodb.2.3.class.php";
require('db_config.php');

if (isset($_POST['add-leave'])) {
    $employe_name = $_POST['employe_name'];
    $leave_type = $_POST['leave_type'];
    $leave_from = $_POST['date_from'];
    $leave_to = $_POST['date_to'];
    $status = $_POST['status'];
    $comments = $_POST['comments'];

    // Insert query using MeekroDB
    $inserted = DB::insert('leaves', [
        'employe_name' => $employe_name,
        'leave_type' => $leave_type,
        'date_from' => $leave_from,
        'date_to' => $leave_to,
        'status' => $status,
        'comments' => $comments
    ]);

    if ($inserted) {
        header("Location: add-leave.php");
    }
}
?>

<?php
require_once "include/classes/meekrodb.2.3.class.php";
require('db_config.php');

if (isset($_POST['submit'])) {
    $employe_name = $_POST['employee'];
    $date_curent = $_POST['date'];
    $shift = $_POST['shift'];
    $in_time = $_POST['time'];
   $attendance_current = $_POST['attendance'];
   $currentMonthName = date('F');
   $currentYear = date('Y');


    // Insert query using MeekroDB
    $inserted = DB::insert('attendance_daily', [
        'employe_name' => $employe_name,
        'date_current' => $date_curent,
        'current_month' => $currentMonthName,
        'current_year' => $currentYear,
        'shift' => $shift,
        'in_time' => $in_time,
        'attendance_status' => $attendance_current
    ]);

    if ($inserted) {
        header("Location: attendance-daily.php");
    }
}
?>




