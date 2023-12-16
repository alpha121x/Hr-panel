<?php include("db_config.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Attendance Daily</title>
    <?php include "include/linked-files.php" ?>
</head>

<body>


    <?php include "include/header-nav.php" ?>

    <?php include "include/side-nav.php" ?>

    <main id="main" class="main">

        <div class="container mt-4">
            <h1 class='text-center'>Attendance Report</h1>
            <p id='output'></p>
            <hr>
            <form  method="post">
                <div class="row m-0">
                    <div class="col-md-3">
                        <?php
                        $query = DB::query("SELECT * FROM employes");
                        //print_r($query);
                        ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Employees</label>
                            <div class="col-sm-9">
                                <select id="" class="form-control form-select"  name="employee">
                                    <option value="" selected>SELECT EMPLOYEE</option>
                                    <?php
                                    foreach ($query as $data) {
                                    ?>
                                        <option value="<?php echo $data['first_name'] . "&nbsp" . $data['last_name']; ?>"><?php echo $data['first_name'] . "&nbsp" . $data['last_name']; ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="email" class="form-label">Year</label>
                        <div class="col-sm-9">
                            <select class="form-control form-select"  name="year">
                                <option selected>Choose...</option>
                                <option value="1">2023</option>
                                <option value="2">2024</option>
                            </select>
                            <div class="valid-feedback">
                                Please Enter You Married or Not!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="email" class="form-label">Month</label>
                        <div class="col-sm-9">
                            <select class="form-control form-select"  name="month">
                                <option selected>Choose...</option>
                                <option value="1">Jan</option>
                                <option value="2">Fab</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            <div class="valid-feedback">
                                Please Enter You Married or Not!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button class="btn btn-primary mb-4" id='btn' type="submit" name="submit">Get Data</button>
                    </div>
            </form>
        </div>
        <br>
        <div class="row m-0">
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>

            <div class="container mt-3">
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                                <thead>
                                    <tr >
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
                                    
                            
                                    date_default_timezone_set("Asia/Karachi");
                                    $date =  date('d-M-y');

                                    if (isset($_POST['submit'])) {
                                        $employee_name = $_POST['employee'];
                                        $year = $_POST['year'];
                                        $month = $_POST['month'];
                                
                                        $currentMonthName = date('F');
                                        $currentYear = date('Y');

                                        $query = DB::query("SELECT * FROM attendance_daily WHERE date_current = %s", $date);





                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id']; ?></th>
                                            <td><a href="" class='text-black'><?php echo $row['employe_name']; ?></a></td>
                                            <td><?php echo $row['date_current']; ?></td>
                                            <td><?php echo $row['current_month']; ?></td>
                                            <td><?php echo $row['attendance_status']; ?></td>
                                            <td>
                                             <a href="edit-employe-attendance.php?id=<?php echo $row['id']; ?>" class='text-black'><i class="bi bi-pencil-square"></i>&nbsp;Edit</a>
                                              | 
                                              <a href="" class='text-black'><i class="bi bi-trash"></i>&nbsp;Delete</a>
                                            </td>

                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
            </div>
        </div>




        </div>



    </main><!-- End #main -->

    <?php include "include/footer.php" ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Script for load data into table -->
    <!-- <script>
        $(document).ready(function() {
            // Define the click event for the button
            $('#btn').click(function() {
                // Make an AJAX request when the button is clicked
                $.ajax({
                    url: "load-data.php",
                    type: 'POST',
                    success: function(data) {
                        // Update the content or perform any action here
                        $('#load-data-into-tbody').html(data);
                        console.log("Data loaded successfully!");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script> -->


    <?php include "include/script-files.php" ?>

</body>







</html>