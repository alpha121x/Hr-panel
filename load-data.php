<?php
require_once("db_config.php");
require_once("include/classes/meekrodb.2.3.class.php"); // Include the MeekroDB library file

// Fetch data using MeekroDB
$employees = DB::query("SELECT * FROM employes");

// Loop through the results and display them
foreach ($employees as $row) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['phone1']}</td>
    <td><a href='#' class='text-decoration-none btn btn-primary'>Edit</a> | <a href='#' id='delete-btn' class='text-decoration-none btn btn-danger'>Delete</a></td>";
}
?>
