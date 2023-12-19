<?php
require("auth.php");
require("db_config.php");
require_once("include/classes/meekrodb.2.3.class.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Attendence Report</title>

    <?php include("include/linked-files.php") ?>

</head>

<body>

    <?php include("include/header-nav.php") ?>

    <?php include("include/side-nav.php") ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1 class='text-primary'>Attendance</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item text-primary">Attendance Report</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Attendance Report</h5>


                            <form method="post" action="attendance-report.php">
                                <div class="row m-0">
                                    <div class="col-md-3">
                                        <?php
                                        $query = DB::query("SELECT * FROM employes");
                                        //print_r($query);
                                        ?>
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-primary">Employees</label>
                                            <div class="col-sm-9">
                                                <select id="" class="form-control form-select" name="employe_name">
                                                    <option selected>SELECT EMPLOYEE</option>
                                                    <?php
                                                    foreach ($query as $data) {
                                                    ?>
                                                        <option value="<?php echo $data['first_name'] ?>"><?php echo $data['first_name'] . "&nbsp" . $data['last_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email" class="form-label text-primary">Year</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-select" name="year">
                                                <option selected>Choose...</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email" class="form-label text-primary">Month</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-select" name="month">
                                                <option selected>Choose...</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="Octuber">Octuber</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                        <button class="btn btn-primary mb-4" id='btn' type="submit" name="submit">Get Data</button>
                                    </div>
                            </form>
                            <br><br>
                            <div class="row m-0">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>

                                <div class="container mt-3">
                                    <!-- Table with stripped rows -->
                                    <table class="table table-striped table-hover" id='datatable'>
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Month</th>
                                                <th scope="col">Attendance Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once 'include/classes/meekrodb.2.3.class.php';
                                            require_once 'db_config.php';

                                            // Check if the submit button is clicked
                                            if (isset($_POST['submit'])) {
                                                $employe_name = $_POST['employe_name'];
                                                $year = $_POST['year'];
                                                $month = $_POST['month'];

                                                date_default_timezone_set("Asia/Karachi");
                                                $date = date('d-M-y');

                                                // Initialize an array to store conditions
                                                $conditions = [];

                                                // Add conditions based on user input
                                                if ($year) {
                                                    $conditions[] = "current_year = %i";
                                                }

                                                if ($month) {
                                                    $conditions[] = "current_month = %s";
                                                }

                                                if ($employe_name) {
                                                    $conditions[] = "employe_name LIKE %s";
                                                }

                                                // Construct the WHERE clause based on conditions
                                                if (!empty($conditions)) {
                                                    $whereClause = "WHERE " . implode(" AND ", $conditions);

                                                    // Execute the query with the constructed WHERE clause
                                                    $query = DB::query("SELECT * FROM attendance_daily $whereClause", $year, $month, "%" . $employe_name . "%");
                                                } else {
                                                    // No conditions set, display all data
                                                    $query = DB::query("SELECT * FROM attendance_daily LIMIT 30");
                                                }

                                                foreach ($query as $row) {
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $row['id']; ?></th>
                                                        <td><a href="" class='text-black'><?php echo $row['employe_name']; ?></a></td>
                                                        <td><?php echo $row['date_current']; ?></td>
                                                        <td><?php echo $row['current_month']; ?></td>
                                                        <td><?php echo $row['attendance_status']; ?></td>
                                                        <td>
                                                            <a href="edit-employe-attendance.php?id=<?php echo $row['id']; ?>" class='text-black'><i class="bi bi-pencil-square text-primary"></i>&nbsp;</a>
                                                            |
                                                            <a href="delete.php?deleteId=<?php echo $row['id']; ?>" class='text-black'><i class="bi bi-trash text-primary"></i>&nbsp;</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            }

                                            // Move the "else" block outside the main "if (isset($_POST['submit']))" block
                                            else {
                                                // No conditions set, display all data
                                                $query = DB::query("SELECT * FROM attendance_daily LIMIT 30");

                                                foreach ($query as $row) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $row['id']; ?></th>
                                                        <td><a href="" class='text-black'><?php echo $row['employe_name']; ?></a></td>
                                                        <td><?php echo $row['date_current']; ?></td>
                                                        <td><?php echo $row['current_month']; ?></td>
                                                        <td><?php echo $row['attendance_status']; ?></td>
                                                        <td>
                                                            <a href="edit-employe-attendance.php?id=<?php echo $row['id']; ?>" class='text-black'><i class="bi bi-pencil-square text-primary"></i>&nbsp;</a>
                                                            |
                                                            <a href="delete.php?deleteId=<?php echo $row['id']; ?>" class='text-black'><i class="bi bi-trash text-primary"></i>&nbsp;</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
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