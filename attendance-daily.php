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
            <h1 class='text-center'>Attendance Daily</h1>
            <p id='output'></p>
            <hr>
            <div class="row m-0">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">Departments</label>
                        <div class="col-sm-9">
                            <select id="inputState" class="form-control form-select" required name="department">
                                <option selected>Departments</option>
                                <option value="Call Center">Call Center</option>
                                <option value="WordPress">WordPress</option>
                                <option value="PHP Developer">PHP Developer</option>
                                <option value="Designing">Designing</option>
                                <option value="Marketing">Marketing</option>
                            </select>
                            <div class="valid-feedback">
                                Please Enter Your Department
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">Shift</label>
                        <div class="col-sm-9">
                      <select id="inputState" class="form-control form-select" required name="shift">
                        <option selected>Select Your Shift</option>
                        <option value="09:00 am - 06:00 pm">09:00 am - 06:00 pm</option>
                        <option value="12:00 pm - 09:00 pm">12:00 pm - 09:00 pm</option>
                        <option value="09:00 pm - 06:00 am">09:00 pm - 06:00 am</option>
                        
                      </select>
                      <div class="valid-feedback">
                      Please Enter Your Shift
                    </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="date" class="form-label">In Time</label>
                        <input type="time" class="form-control" id="date"  name="date">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="date" class="form-label">Out Time</label>
                        <input type="time" class="form-control" id="date"  name="date">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3 mt-2">
                        <button class="btn btn-primary mt-4" id='btn'>Get Employees</button>
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <label for="searchInput">Search:</label>
                    <input type="text" id="searchInput" placeholder="Type your search term...">
                </div> -->

            </div>
            <br>
            <div class="row m-0">
                <div class="container mt-3">
                    <!-- <h2 class="text-center">Display Test Db Data</h2> -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Employe name</td>
                                <td>Phone Number</td>
                                <td>Attendance</td>
                            </tr>
                        </thead>
                        <tbody id="load-data-into-tbody">
                            <tr>
                                <td class="text-center text-warning" colspan="4">
                                    Click on get employyes button....
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>




        </div>


    </main><!-- End #main -->

    <?php include "include/footer.php" ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Script for load data into table -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
    $(document).ready(function () {
        // Define the click event for the button
        $('#btn').click(function () {
            // Make an AJAX request when the button is clicked
            $.ajax({
                url: "load-employees-data.php",
                type: 'POST',
                success: function (data) {
                    // Update the content or perform any action here
                    $('#load-data-into-tbody').html(data);
                    console.log("Data loaded successfully!");
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

    <?php include "include/script-files.php" ?>

</body>






</html>