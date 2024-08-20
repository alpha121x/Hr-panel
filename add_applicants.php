<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


<?php
require "db_config.php";

// Initialize variables
$districts = [];
$tehsils = [];
$circles = [];
$mozahs = [];
$applicants = [];

// Fetch districts
function getDistricts($pdo)
{
    $stmt = $pdo->query("SELECT * FROM district ORDER BY district_name");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch tehsils based on district_id
function getTehsils($pdo, $district_id)
{
    $stmt = $pdo->prepare("SELECT * FROM tehsil WHERE district_id = :district_id ORDER BY tehsil_name");
    $stmt->execute(['district_id' => $district_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch circles based on tehsil_id
function getCircles($pdo, $tehsil_id)
{
    $stmt = $pdo->prepare("SELECT * FROM circle WHERE tehsil_id = :tehsil_id ORDER BY circle_name");
    $stmt->execute(['tehsil_id' => $tehsil_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch mozahs based on circle_id
function getMozahs($pdo, $circle_id)
{
    $stmt = $pdo->prepare("SELECT * FROM mozah WHERE circle_id = :circle_id ORDER BY mozah_name");
    $stmt->execute(['circle_id' => $circle_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch applicants
function getApplicants($pdo)
{
    $stmt = $pdo->query("SELECT * FROM applicants ORDER BY applicant_name");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Handle AJAX requests
if (isset($_POST['action'])) {
    $response = '';

    switch ($_POST['action']) {
        case 'get_tehsils':
            $district_id = isset($_POST['district_id']) ? (int)$_POST['district_id'] : 0;
            if ($district_id > 0) {
                $tehsils = getTehsils($pdo, $district_id);
                $response .= '<option value="">Select Tehsil</option>';
                foreach ($tehsils as $row) {
                    $response .= '<option value="' . htmlspecialchars($row['tehsil_id']) . '">' . htmlspecialchars($row['tehsil_name']) . '</option>';
                }
            }
            break;

        case 'get_circles':
            $tehsil_id = isset($_POST['tehsil_id']) ? (int)$_POST['tehsil_id'] : 0;
            if ($tehsil_id > 0) {
                $circles = getCircles($pdo, $tehsil_id);
                $response .= '<option value="">Select Circle</option>';
                foreach ($circles as $row) {
                    $response .= '<option value="' . htmlspecialchars($row['circle_id']) . '">' . htmlspecialchars($row['circle_name']) . '</option>';
                }
            }
            break;

        case 'get_mozahs':
            $circle_id = isset($_POST['circle_id']) ? (int)$_POST['circle_id'] : 0;
            if ($circle_id > 0) {
                $mozahs = getMozahs($pdo, $circle_id);
                $response .= '<option value="">Select Mozah</option>';
                foreach ($mozahs as $row) {
                    $response .= '<option value="' . htmlspecialchars($row['mozah_id']) . '">' . htmlspecialchars($row['mozah_name']) . '</option>';
                }
            }
            break;

        case 'get_applicants':
            $applicants = getApplicants($pdo);
            $response .= '<option value="">Select Applicant</option>';
            foreach ($applicants as $row) {
                $response .= '<option value="' . htmlspecialchars($row['applicant_id']) . '">' . htmlspecialchars($row['applicant_name']) . '</option>';
            }
            break;
    }

    echo $response;
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $district_id = isset($_POST['district_id']) && is_numeric($_POST['district_id']) ? (int)$_POST['district_id'] : null;
    $tehsil_id = isset($_POST['tehsil_id']) && is_numeric($_POST['tehsil_id']) ? (int)$_POST['tehsil_id'] : null;
    $circle_id = isset($_POST['circle_id']) && is_numeric($_POST['circle_id']) ? (int)$_POST['circle_id'] : null;
    $mozah_id = isset($_POST['mozah_id']) && is_numeric($_POST['mozah_id']) ? (int)$_POST['mozah_id'] : null;
    $applicant_id = isset($_POST['applicant_id']) && is_numeric($_POST['applicant_id']) ? (int)$_POST['applicant_id'] : null;

    if (!empty($applicant_id)) {
        $sql = "INSERT INTO assigned_applicants (district_id, tehsil_id, circle_id, mozah_id, applicant_id) VALUES (:district_id, :tehsil_id, :circle_id, :mozah_id, :applicant_id)";
        $params = [
            'district_id' => $district_id,
            'tehsil_id' => $tehsil_id,
            'circle_id' => $circle_id,
            'mozah_id' => $mozah_id,
            'applicant_id' => $applicant_id
        ];

        $stmt = $pdo->prepare($sql);
        if ($stmt->execute($params)) {
            echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Applicant assigned successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'assigned_applicants.php';
                    }
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to assign applicant.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'add_applicants.php';
                    }
                });
            </script>";
        }
    }
}

// Fetch initial data
$districts = getDistricts($pdo);
$applicants = getApplicants($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Applicants</title>

    <?php include("include/linked-files.php") ?>

    

    <script>
        $(document).ready(function() {
            // Handle district change
            $('#district').change(function() {
                var district_id = $(this).val();
                $.ajax({
                    url: 'add_applicants.php',
                    method: 'POST',
                    data: {
                        action: 'get_tehsils',
                        district_id: district_id
                    },
                    success: function(response) {
                        $('#tehsil').html(response);
                        $('#circle').html('<option value="">Select Circle</option>'); // Reset circles and mozahs
                        $('#mozah').html('<option value="">Select Mozah</option>');
                        $('#applicant').html('<option value="">Select Applicant</option>');
                    }
                });
            });

            // Handle tehsil change
            $('#tehsil').change(function() {
                var tehsil_id = $(this).val();
                $.ajax({
                    url: 'add_applicants.php',
                    method: 'POST',
                    data: {
                        action: 'get_circles',
                        tehsil_id: tehsil_id
                    },
                    success: function(response) {
                        $('#circle').html(response);
                        $('#mozah').html('<option value="">Select Mozah</option>'); // Reset mozahs
                        $('#applicant').html('<option value="">Select Applicant</option>');
                    }
                });
            });

            // Handle circle change
            $('#circle').change(function() {
                var circle_id = $(this).val();
                $.ajax({
                    url: 'add_applicants.php',
                    method: 'POST',
                    data: {
                        action: 'get_mozahs',
                        circle_id: circle_id
                    },
                    success: function(response) {
                        $('#mozah').html(response);
                        $('#applicant').html('<option value="">Select Applicant</option>');
                    }
                });
            });

            // Handle mozah change
            $('#mozah').change(function() {
                $.ajax({
                    url: 'add_applicants.php',
                    method: 'POST',
                    data: {
                        action: 'get_applicants'
                    },
                    success: function(response) {
                        $('#applicant').html(response);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <!-- ======= Header ======= -->
    <?php require_once('include/header-nav.php'); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require_once('include/side-nav.php'); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Applicants</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Form</h5>

                        <!-- Location Form -->
                        <form method="POST">
                            <!-- District Dropdown -->
                            <div class="row mb-3">
                                <label for="district" class="col-sm-2 col-form-label">District</label>
                                <div class="col-sm-10">
                                    <select name="district_id" id="district" class="form-select">
                                        <option value="">Select District</option>
                                        <?php foreach ($districts as $row): ?>
                                            <option value="<?php echo htmlspecialchars($row['district_id']); ?>" <?php if (isset($_POST['district_id']) && $_POST['district_id'] == $row['district_id']) echo 'selected'; ?>>
                                                <?php echo htmlspecialchars($row['district_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Tehsil Dropdown -->
                            <div class="row mb-3">
                                <label for="tehsil" class="col-sm-2 col-form-label">Tehsil</label>
                                <div class="col-sm-10">
                                    <select name="tehsil_id" id="tehsil" class="form-select">
                                        <option value="">Select Tehsil</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Circle Dropdown -->
                            <div class="row mb-3">
                                <label for="circle" class="col-sm-2 col-form-label">Circle</label>
                                <div class="col-sm-10">
                                    <select name="circle_id" id="circle" class="form-select">
                                        <option value="">Select Circle</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Mozah Dropdown -->
                            <div class="row mb-3">
                                <label for="mozah" class="col-sm-2 col-form-label">Mozah</label>
                                <div class="col-sm-10">
                                    <select name="mozah_id" id="mozah" class="form-select">
                                        <option value="">Select Mozah</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Applicant Dropdown -->
                            <div class="row mb-3">
                                <label for="applicant" class="col-sm-2 col-form-label">Applicant Name</label>
                                <div class="col-sm-10">
                                    <select name="applicant_id" id="applicant" class="form-select">
                                        <option value="">Select Applicant</option>
                                        <?php foreach ($applicants as $row): ?>
                                            <option value="<?php echo htmlspecialchars($row['applicant_id']); ?>" <?php if (isset($_POST['applicant_id']) && $_POST['applicant_id'] == $row['applicant_id']) echo 'selected'; ?>>
                                                <?php echo htmlspecialchars($row['applicant_name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Assign</button>
                            </div>
                        </form><!-- End Location Form -->
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <?php include("include/footer.php") ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include("include/script-files.php") ?>
</body>

</html>