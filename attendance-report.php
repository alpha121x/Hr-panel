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


                            <!-- <form method="post" action="attendance-report.php">
                                <div class="row m-0">
                                    <div class="col-md-3">
                                        <?php
                                        // $query = DB::query("SELECT * FROM employes");
                                        //print_r($query);
                                        ?>
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-primary">Employees</label>
                                            <div class="col-sm-9">
                                                <select id="" class="form-control form-select" name="employe_name">
                                                    <option selected>SELECT EMPLOYEE</option>
                                                    <?php
                                                    // foreach ($query as $data) {
                                                    ?>
                                                        <option value="<?php echo $data['first_name'] ?>"><?php echo $data['first_name'] . "&nbsp" . $data['last_name']; ?></option>
                                                    <?php
                                                    // }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div> -->
                            <!-- <div class="col-md-3">
                                        <label for="email" class="form-label text-primary">Year</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-select" name="year">
                                                <option selected>Choose...</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                    </div> -->
                            <!-- <div class="col-md-3">
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
                            </form> -->
                            <div class="row m-0">
                                <div class="container mt-3">
                                    <!-- Table with stripped rows -->
                                    <!-- Table with stripped rows -->
                                    <table class="table table-striped table-hover" id='datatable'>
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col">Names</th>
                                                <?php
                                                // Get the current year and month
                                                $currentYear = date('Y');
                                                $currentMonth = date('m');

                                                // Get the number of days in the current month
                                                $totalDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

                                                // Loop through days of the current month and create table headers
                                                for ($day = 1; $day <= $totalDays; $day++) {
                                                    echo "<th>{$day}</th>";
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch unique employee names for display
                                            $employeesQuery = DB::query("SELECT * FROM employes");

                                            // Loop through employees
                                            foreach ($employeesQuery as $employee) {
                                                echo "<tr>";
                                                echo "<th scope='row'>" . $employee['first_name'] . " " . $employee['last_name'] . "</th>";

                                                // Loop through days of the current month for each employee
                                                for ($day = 1; $day <= $totalDays; $day++) {
                                                    // Format the date for comparison
                                                    $formattedDate = date('d-M-y', strtotime("{$currentYear}-{$currentMonth}-" . sprintf("%02d", $day)));

                                                    // Fetch attendance for the current employee and date
                                                    $attendanceQuery = DB::query("SELECT * FROM attendance_daily WHERE employe_name = %s AND date_current = %s", $employee['first_name'] . " " . $employee['last_name'], $formattedDate);

                                                    // Display attendance details or "-"
                                                    if (!empty($attendanceQuery)) {
                                                        $attendanceStatus = $attendanceQuery[0]['attendance_status'];
                                                        $inTime = date('h:i:a', strtotime($attendanceQuery[0]['in_time']));
                                                        $outTime = date('h:i:a', strtotime($attendanceQuery[0]['out_time']));
                                                        $shift = $attendanceQuery[0]['shift'];

                                                        // Create a formatted cell with line breaks
                                                        echo "<td>";
                                                        echo "Status: {$attendanceStatus}<br>";
                                                        echo "Shift: {$shift}<br>";
                                                        echo "In Time: {$inTime}<br>";
                                                        echo "Out Time: {$outTime}";
                                                        echo "</td>";
                                                    } else {
                                                        echo "<td>-</td>";
                                                    }
                                                }

                                                echo "</tr>";
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