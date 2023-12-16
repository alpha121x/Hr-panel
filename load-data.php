<?php
require_once("db_config.php");
require_once("include/classes/meekrodb.2.3.class.php"); // Include the MeekroDB library file



    // print_r($_POST);
    // die();

    // Fetch data using MeekroDB
    $employee = DB::query("SELECT * FROM attendance_daily");
    
    // Check if the query returned any results
    foreach ($employee as $row) {
        // Display the data in a table row
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['employe_name']}</td>
            <td>{$row['date']}</td>
            <td>{$row['attendance_status']}</td>
            <td><a href='#' class='text-decoration-none btn btn-primary'>Edit</a> | <a href='#' id='delete-btn' class='text-decoration-none btn btn-danger'>Delete</a></td>
        </tr>";
    }
}
    ?>
    
