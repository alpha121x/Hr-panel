<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Perfect Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php include("include/linked-files.php") ?>

  </head>

  <body class="">
	 <!-- ======= Header ======= -->
     <?php require_once('include/header-nav.php'); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php require_once('include/side-nav.php'); ?>
    <!-- End Sidebar-->
	
	
	<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manaement Employes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">View Employee Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <?php
        require_once 'include/classes/meekrodb.2.3.class.php';
        require_once 'db_config.php';
        $id = $_GET['id'];

        $query = DB::query("SELECT * FROM employes WHERE id=%i;", $id);
        foreach($query as $row) {
    ?>

    <section class="section">
        <div class="padding-md">
            <div class="container-fluid">
                <div class="row bg-white">
                    <div class="col-md-4">
                        <div class='mt-3 mx-3'>
                                <h2 class='text-primary'>Personal Information</h2> <br>
                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Full Name</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['first_name'].' '.$row['last_name']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Date of Birth</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['date_of_birth']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Gender</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['gender']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>CNIC</b></h4>
                                        </div>
                                        <div class='text-end mx-5 '>
                                            <h4 class="m-0 justify-content-end">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['cnic']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>City</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['city']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Phone1</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['phone1']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Phone2</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['phone2']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Address</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['address']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Nationality</b></h4>
                                        </div>
                                        <div class='text-end mx-5 justify-content-end'>
                                            <h4 class="m-0 text-end ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nationality']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Employe Id</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['id']; ?></h4>
                                        </div>
                                </div>
                                <hr>
                        </div>
                    </div>

                    <div class="col-md-4 mt-5">
                                     <div class='m-0 d-flex mt-4'>
                                                    <div class='text-start m-0 mt-3'>
                                                        <h4 class='m-0'><b>Full Name</b></h4>
                                                    </div>
                                                    <div class='text-end mx-5 mt-3'>
                                                        <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['first_name'].' '.$row['last_name']; ?></h4>
                                                    </div> 
                                    </div>
                                    <hr>
                                                    <div class='text-start m-0 mt-5 mx-5'>
                                                        <img src="./assets/img/amir.jpg " alt="" class='rounded rounded-pill' width='300px' height="300px">
                                                    </div>

                                                    <div class='m-0 d-flex mt-5'>
                                                        <div class='text-start m-0 mt-5'>
                                                            <h4 class='m-0'><b>Marital Status</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5 mt-5'>
                                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['marital_status']; ?></h4>
                                                    </div>
                                </div>
                                <hr>

                                                    



                     </div>

                    <div class="col-md-4">
                                    <div class='mt-3 mx-3'>
                                                <h2 class='text-primary'>Company Detail </h2> <br>
                                                <div class='m-0 d-flex'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Department</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5'>
                                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['department']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>

                                                <div class='m-0 d-flex'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Designation</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5'>
                                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['designation']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>

                                                <div class='m-0 d-flex'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Date of Join</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5'>
                                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['date_of_join']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>

                                                <div class='m-0 d-flex mb-5'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Shift</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5 '>
                                                            <h4 class="m-0 justify-content-end">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['shift']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>
                                        </div>

                                        <div class='mt-5 mx-3'>
                                                <h2 class='text-primary'> Bank Account Detail </h2> <br>
                                                <div class='m-0 d-flex'>
                                                        <div class='text-start m-0 mt-3'>
                                                            <h4 class='m-0'><b>Account Holder Name</b></h4>
                                                        </div>
                                                        <div class='text-end mx-4 mt-3'>
                                                            <h4 class="m-0">&nbsp;&nbsp;<?php echo $row['account_name']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>

                                                <div class='m-0 d-flex'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Account Number</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5'>
                                                            <h4 class="m-0"><?php echo $row['account_number']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>

                                                <div class='m-0 d-flex'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Bank Name</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5'>
                                                            <h4 class="m-0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['bank_name']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>
                                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div><!-- /.padding20 -->
    </section>

</main><!-- End #main -->

<?php include("include/footer.php") ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php include("include/script-files.php") ?>

	
	
	
  </body>
</html>
