<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Applicants</title>

    <?php include("include/linked-files.php") ?>




</head>

<body>
    <!-- ======= Header ======= -->
    <?php require_once('include/header-nav.php'); ?>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require_once('include/side-nav.php'); ?>
    <!-- End Sidebar-->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage Employes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Appplicants</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <?php
        require "db_config.php";

        // Function to fetch districts
        function getDistricts($pdo)
        {
            $stmt = $pdo->query("SELECT * FROM district ORDER BY district_name");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Function to fetch tehsils based on district_id
        function getTehsils($pdo, $district_id)
        {
            $stmt = $pdo->prepare("SELECT * FROM tehsil WHERE district_id = :district_id ORDER BY tehsil_name");
            $stmt->execute(['district_id' => $district_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Function to fetch circles based on tehsil_id
        function getCircles($pdo, $tehsil_id)
        {
            $stmt = $pdo->prepare("SELECT * FROM circle WHERE tehsil_id = :tehsil_id ORDER BY circle_name");
            $stmt->execute(['tehsil_id' => $tehsil_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Function to fetch mozahs based on circle_id
        function getMozahs($pdo, $circle_id)
        {
            $stmt = $pdo->prepare("SELECT * FROM mozah WHERE circle_id = :circle_id ORDER BY mozah_name");
            $stmt->execute(['circle_id' => $circle_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Function to fetch applicants
        function getApplicants($pdo)
        {
            $stmt = $pdo->query("SELECT * FROM applicants ORDER BY applicant_name");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Fetch districts
        $districts = getDistricts($pdo);

        // Fetch tehsils if a district is selected
        $tehsils = [];
        if (isset($_POST['district_id']) && !empty($_POST['district_id'])) {
            $district_id = (int)$_POST['district_id'];
            $tehsils = getTehsils($pdo, $district_id);
        }

        // Fetch circles if a tehsil is selected
        $circles = [];
        if (isset($_POST['tehsil_id']) && !empty($_POST['tehsil_id'])) {
            $tehsil_id = (int)$_POST['tehsil_id'];
            $circles = getCircles($pdo, $tehsil_id);
        }

        // Fetch mozahs if a circle is selected
        $mozahs = [];
        if (isset($_POST['circle_id']) && !empty($_POST['circle_id'])) {
            $circle_id = (int)$_POST['circle_id'];
            $mozahs = getMozahs($pdo, $circle_id);
        }

        // Fetch applicants
        $applicants = getApplicants($pdo);

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Extract selected values
            $district_id = isset($_POST['district_id']) ? (int)$_POST['district_id'] : null;
            $tehsil_id = isset($_POST['tehsil_id']) ? (int)$_POST['tehsil_id'] : null;
            $circle_id = isset($_POST['circle_id']) ? (int)$_POST['circle_id'] : null;
            $mozah_id = isset($_POST['mozah_id']) ? (int)$_POST['mozah_id'] : null;
            $applicant_ids = isset($_POST['applicant_ids']) ? $_POST['applicant_ids'] : [];

            if (!empty($applicant_ids)) {
                $sql = "INSERT INTO assigned_applicants (district_id, tehsil_id, circle_id, mozah_id, applicant_id) VALUES ";
                $values = [];
                foreach ($applicant_ids as $applicant_id) {
                    $values[] = "($district_id, $tehsil_id, $circle_id, $mozah_id, $applicant_id)";
                }
                $sql .= implode(', ', $values);

                $stmt = $pdo->prepare($sql);
                if ($stmt->execute()) {
                    // On success, output JavaScript to show SweetAlert
                    echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'Applicants assigned successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect or perform any additional actions here if needed
                                window.location.href = 'assigned_applicants.php'; // Replace with your actual redirect page
                            }
                        });
                    </script>";
                } else {
                    // On failure, output JavaScript to show SweetAlert
                    echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to assign applicants.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect or perform any additional actions here if needed
                                window.location.href = 'add_applicants.php'; // Replace with your actual redirect page
                            }
                        });
                    </script>";
                }
            }
        }
        ?>

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
                                    <select name="district_id" id="district" class="form-select" onchange="this.form.submit()">
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
                            <?php if (!empty($tehsils)): ?>
                                <div class="row mb-3">
                                    <label for="tehsil" class="col-sm-2 col-form-label">Tehsil</label>
                                    <div class="col-sm-10">
                                        <select name="tehsil_id" id="tehsil" class="form-select" onchange="this.form.submit()">
                                            <option value="">Select Tehsil</option>
                                            <?php foreach ($tehsils as $row): ?>
                                                <option value="<?php echo htmlspecialchars($row['tehsil_id']); ?>" <?php if (isset($_POST['tehsil_id']) && $_POST['tehsil_id'] == $row['tehsil_id']) echo 'selected'; ?>>
                                                    <?php echo htmlspecialchars($row['tehsil_name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Circle Dropdown -->
                            <?php if (!empty($circles)): ?>
                                <div class="row mb-3">
                                    <label for="circle" class="col-sm-2 col-form-label">Circle</label>
                                    <div class="col-sm-10">
                                        <select name="circle_id" id="circle" class="form-select" onchange="this.form.submit()">
                                            <option value="">Select Circle</option>
                                            <?php foreach ($circles as $row): ?>
                                                <option value="<?php echo htmlspecialchars($row['circle_id']); ?>" <?php if (isset($_POST['circle_id']) && $_POST['circle_id'] == $row['circle_id']) echo 'selected'; ?>>
                                                    <?php echo htmlspecialchars($row['circle_name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Mozah Dropdown -->
                            <?php if (!empty($mozahs)): ?>
                                <div class="row mb-3">
                                    <label for="mozah" class="col-sm-2 col-form-label">Mozah</label>
                                    <div class="col-sm-10">
                                        <select name="mozah_id" id="mozah" class="form-select">
                                            <option value="">Select Mozah</option>
                                            <?php foreach ($mozahs as $row): ?>
                                                <option value="<?php echo htmlspecialchars($row['mozah_id']); ?>" <?php if (isset($_POST['mozah_id']) && $_POST['mozah_id'] == $row['mozah_id']) echo 'selected'; ?>>
                                                    <?php echo htmlspecialchars($row['mozah_name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Applicant Name Checkboxes -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Applicant Name</label>
                                <div class="col-sm-10">
                                    <?php foreach ($applicants as $row): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="applicant_ids[]" value="<?php echo htmlspecialchars($row['applicant_id']); ?>" id="applicant_<?php echo htmlspecialchars($row['applicant_id']); ?>" <?php if (isset($_POST['applicant_ids']) && in_array($row['applicant_id'], $_POST['applicant_ids'])) echo 'checked'; ?>>
                                            <label class="form-check-label" for="applicant_<?php echo htmlspecialchars($row['applicant_id']); ?>">
                                                <?php echo htmlspecialchars($row['applicant_name']); ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>



                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Assign</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
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