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
                        <label for="email" class="form-label">Employees</label>
                        <div class="col-sm-9">
                            <select id="" class="form-control form-select" required name="employee">
                                <option value=""></option>
                            </select>
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
                    <?php  
                      date_default_timezone_set("Asia/Karachi");
                      $date1 =  date('h:i:s:a');
                    ?>
                        <label for="date" class="form-label">In Time</label>
                        <input type="text" class="form-control" id="date" name="date" value="<?php echo $date1; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="date" class="form-label">Out Time</label>
                        <input type="time" class="form-control" id="date" name="date">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                    <?php  
                      date_default_timezone_set("Asia/Karachi");
                      $date =  date('d-M-y');
                    ?>
                        <label for="date" class="form-label">Date</label>
                        <input type="text" class="form-control" value="<?php echo $date; ?>" name="date">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="date" class="form-label">Mark Attendance</label>
                        <div class="col-mb-3 p-2">
                            <input type="radio" id="present" name="attendance" value="present">
                            <label for="present">Present</label>
                            &nbsp;
                            <input type="radio" id="absent" name="attendance" value="absent">
                            <label for="absent">Absent</label>

                        </div>
                    </div>
                    


                </div>

                <!-- <div class="col-md-4">
                    <label for="searchInput">Search:</label>
                    <input type="text" id="searchInput" placeholder="Type your search term...">
                </div> -->

            </div>




        </div>


    </main><!-- End #main -->

    <?php include "include/footer.php" ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include "include/script-files.php" ?>

</body>





</html>