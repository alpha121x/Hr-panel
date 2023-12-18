<?php require("auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard - NiceAdmin</title>

    <?php include("include/linked-files.php") ?>

</head>

<body>

    <?php include("include/header-nav.php") ?>

    <?php include("include/side-nav.php") ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Leaves</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Manage Leaves</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Leaves</h5>
                            <p>Leaves Record</p>

                            <!-- Table with stripped rows -->
                            <table class="table table-striped table-hover" id='datatable'>
    <thead>
        <tr>
            <th scope="col">Employee Name</th>
            <th scope="col">Leave Type</th>
            <th scope="col">Duration</th>
            <th scope="col">Dates</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("db_config.php");
        require_once("include/classes/meekrodb.2.3.class.php");

        // Select all leaves from the 'leaves' table
        $data_leaves = DB::query("SELECT * FROM leaves");

        if ($data_leaves) {
            foreach ($data_leaves as $leave) {
                // Assign variables from the fetched row
                $employee_name = $leave['employe_name'];
                $leave_type = $leave['leave_type'];
                $date_from = $leave['date_from'];
                $date_to = $leave['date_to'];
                $status = $leave['status'];

                // Calculate duration in days
                $duration = (strtotime($date_to) - strtotime($date_from)) / (60 * 60 * 24);
        ?>
                <!-- Display data in the rows -->
                <tr>
                    <td><?php echo $employee_name ?></td>
                    <td><?php echo $leave_type ?></td>
                    <td><?php echo $duration ?> Days</td>
                    <td><?php echo $date_from . " to " . $date_to; ?></td>
                    <td><?php echo $status ?></td>
                    <td>
                        <a href="edit-leave.php?id=<?php echo $leave['id']; ?>" class='text-black'><i class="bi bi-pencil-square"></i>&nbsp;Edit</a>
                        |
                        <a href="#" class='text-black'><i class="bi bi-trash"></i>&nbsp;Delete</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>



                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

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