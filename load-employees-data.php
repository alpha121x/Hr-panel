<?php
require_once("db_config.php");
require_once("include/classes/meekrodb.2.3.class.php"); // Make sure to include the MeekroDB library file

// Fetch data
$results = DB::query("SELECT * FROM employes");

foreach ($results as $row) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['phone1']}</td>
    <td><select class='form-control form-select' required name='gender'>
    <option selected>Choose</option>
    <option value='Present'>Present</option>
    <option value='Absent'>Absent</option>
  </select>
  </td>";
}
?>
