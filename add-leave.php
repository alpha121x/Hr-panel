<?php 
require("auth.php");
require("db_config.php");
require_once("include/classes/meekrodb.2.3.class.php");

 ?>

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

                            <form action="fire-add-querries.php" method="post">
                                <div class="container mt-4">
                                    <div class="row m-0">
                                        <div class="col-md-3">
                                            <?php
                                            $query = DB::query("SELECT * FROM employes");
                                            //print_r($query);
                                            ?>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Employees</label>
                                                <div class="col-sm-9">
                                                    <select id="" class="form-control form-select" required name="employe_name">
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
                                                <label for="email" class="form-label">Leave Type*</label>
                                                <div class="col-sm-9">
                                                    <select id="inputState" class="form-control form-select" name="leave_type">
                                                        <option selected>Select Leave Type</option>
                                                        <option value="Sick Leave">Sick Leave</option>
                                                        <option value="Casual Leave">Casual Leave</option>
                                                        <option value="Annual Leave">Annual Leave</option>

                                                    </select>
                                                    <div class="valid-feedback">
                                                        Please Select Leave Type
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="date" class="form-label">From*</label>
                                                <input type="date" class="form-control" id="date" name="date_from">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="date" class="form-label">To*</label>
                                                <input type="date" class="form-control" id="date" name="date_to">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="comments" class="form-label">Comments</label>
                                                <textarea name="comments" id="comments" class="form-control" cols="40" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select id="inputState" class="form-control form-select" name="leave_type">
                                                        <option selected>Select</option>
                                                        <option value="Approved">Approved</option>
                                                        <option value="Pending">Pending</option>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Please Select Status
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center text-end mb-5 mt-3">
                                            <button type="submit" class="btn btn-primary btn-lg" name="add-leave">Submit</button>
                                            <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                        </div>

                                    </div>
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