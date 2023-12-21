<?php
require("auth.php");
require("db_config.php");
require_once("include/classes/meekrodb.2.3.class.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Attendence daily</title>

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
                    <li class="breadcrumb-item text-primary">Attendance Daily</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Attendance Daily</h5>


                            <form action="fire-add-querries.php" method="post">
                                <div class="row m-0">
                                    <div class="col-md-3">
                                        <?php
                                        $query = DB::query("SELECT * FROM employes");
                                        //print_r($query);
                                        ?>
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-primary">Employees</label>
                                            <div class="col-sm-9">
                                                <select id="" class="form-control form-select" required name="employee">
                                                    <option value="" selected>SELECT EMPLOYEE</option>
                                                    <?php
                                                    foreach ($query as $data) {
                                                    ?>
                                                        <option value="<?php echo $data['first_name'] . " " . $data['last_name']; ?>"><?php echo $data['first_name'] . " " . $data['last_name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-primary">Shift</label>
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
                                            <label for="date" class="form-label text-primary">In Time</label>
                                            <input type="text" class="form-control" id="date" name="time" value="<?php echo $date1; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-primary">Out Time</label>
                                            <input type="time" class="form-control" id="date" name="out-time">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <?php
                                            date_default_timezone_set("Asia/Karachi");
                                            $date =  date('d-M-y');
                                            ?>
                                            <label for="date" class="form-label text-primary">Date</label>
                                            <input type="text" class="form-control" value="<?php echo $date; ?>" name="date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="date" class="form-label text-primary">Mark Attendance</label>
                                            <div class="col-mb-3 p-2">
                                                <input type="radio" id="present" name="attendance" value="P">
                                                <label for="present">Present</label>
                                                &nbsp;
                                                <input type="radio" id="absent" name="attendance" value="A">
                                                <label for="absent">Absent</label>

                                            </div>
                                        </div>

                                        <div class="text-center text-end mb-5 mt-3">
                                            <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
                                            <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                        </div>

                                    </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-0">
                        <div class="container mt-3">
                           
                        </div>
                    </div>
        </section>

    </main><!-- End #main -->

    <?php include("include/footer.php") ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include("include/script-files.php") ?>

</body>

</html>