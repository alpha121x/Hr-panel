<?php
require "db_config.php";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve POST data
    $district_id = isset($_POST['district_id']) ? (int)$_POST['district_id'] : null;
    $tehsil_id = isset($_POST['tehsil_id']) ? (int)$_POST['tehsil_id'] : null;
    $circle_id = isset($_POST['circle_id']) ? (int)$_POST['circle_id'] : null;
    $mozah_id = isset($_POST['mozah_id']) ? (int)$_POST['mozah_id'] : null;
    $applicant_ids = isset($_POST['applicant_ids']) ? $_POST['applicant_ids'] : [];

    // Prepare SQL statement for inserting data
    $sql = "INSERT INTO assigned_applicants (applicant_id, district_id, tehsil_id, circle_id, mozah_id) VALUES (:applicant_id, :district_id, :tehsil_id, :circle_id, :mozah_id)";

    // Use a transaction to ensure all inserts succeed
    try {
        $pdo->beginTransaction();

        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute the statement for each applicant
        foreach ($applicant_ids as $applicant_id) {
            $stmt->execute([
                'applicant_id' => $applicant_id,
                'district_id' => $district_id,
                'tehsil_id' => $tehsil_id,
                'circle_id' => $circle_id,
                'mozah_id' => $mozah_id
            ]);
        }

        // Commit the transaction
        $pdo->commit();
        echo "<div class='alert alert-success'>Data successfully inserted.</div>";
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $pdo->rollBack();
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
}
?>
