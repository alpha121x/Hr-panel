<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assigned Applicants</title>

    <?php include("include/linked-files.php") ?>

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
            <h1>Manage Employees</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Applicants List</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Applicants</h5>

                            <?php
                            require("db_config.php");

                            // Fetch data from assigned_applicants table and join with applicants table
                            $query = "
                                SELECT a.id, a.applicant_id, ap.applicant_name, m.mozah_name, c.circle_name, t.tehsil_name, d.district_name
                                FROM assigned_applicants a
                                JOIN mozah m ON a.mozah_id = m.mozah_id
                                JOIN circle c ON m.circle_id = c.circle_id
                                JOIN tehsil t ON c.tehsil_id = t.tehsil_id
                                JOIN district d ON t.district_id = d.district_id
                                JOIN applicants ap ON a.applicant_id = ap.applicant_id
                            ";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $assigned_applicants = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            ?>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-hover" id='datatable'>
                                <caption>
                                    BixiSoft HR Management
                                </caption>
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Applicant Name</th>
                                        <th>District</th>
                                        <th>Tehsil</th>
                                        <th>Circle</th>
                                        <th>Mozah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $index = 1; // Initialize index
                                    foreach ($assigned_applicants as $row): ?>
                                        <tr>
                                            <th scope="row"><?php echo $index++; ?></th> <!-- Use index for row number -->
                                            <td><?php echo htmlspecialchars($row['applicant_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['district_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['tehsil_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['circle_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['mozah_name']); ?></td>
                                            <td>
                                                <a href="edit_assigned_applicant.php?id=<?php echo htmlspecialchars($row['id']); ?>" class='text-black'>
                                                    <i class="bi bi-pencil-square text-primary"></i>&nbsp;
                                                </a>
                                                |
                                                <a href="delete_assigned_applicant.php?id=<?php echo htmlspecialchars($row['id']); ?>" class='text-black'>
                                                    <i class="bi bi-trash text-primary"></i>&nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            <!-- Download PDF Button -->
                            <form method="post" action="download_pdf.php">
                                <button type="submit" class="btn btn-primary">Download PDF</button>
                            </form>

                        </div>
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
