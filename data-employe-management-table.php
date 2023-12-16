<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Perfect Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="assets/vendor/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Pace -->
	<link href="assets/vendor/css/pace.css" rel="stylesheet">
	
	<!-- Perfect -->
	<link href="assets/vendor/css/app.min.css" rel="stylesheet">
	<link href="assets/vendor/css/app-skin.css" rel="stylesheet">




       <!-- Favicons -->
    
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

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
        <h1>Data Tables</h1>
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
                                            <h4 class="m-0"><?php echo $row['first_name'].' '.$row['last_name']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Date of Birth</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0"><?php echo $row['date_of_birth']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Gender</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0"><?php echo $row['gender']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>CNIC</b></h4>
                                        </div>
                                        <div class='text-end mx-5 '>
                                            <h4 class="m-0 justify-content-end"><?php echo $row['cnic']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>City</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0"><?php echo $row['city']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Phone1</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0"><?php echo $row['phone1']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Phone2</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0"><?php echo $row['phone2']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Address</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0"><?php echo $row['address']; ?></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Nationality</b></h4>
                                        </div>
                                        <div class='text-end mx-5 justify-content-end'>
                                            <h4 class="m-0 text-end "><?php echo $row['nationality']; ?>></h4>
                                        </div>
                                </div>
                                <hr>

                                <div class='m-0 d-flex'>
                                        <div class='text-start m-0'>
                                            <h4 class='m-0'><b>Employe Id</b></h4>
                                        </div>
                                        <div class='text-end mx-5'>
                                            <h4 class="m-0"><?php echo $row['id']; ?></h4>
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
                                                        <h4 class="m-0"><?php echo $row['first_name'].' '.$row['last_name']; ?></h4>
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
                                                            <h4 class="m-0"><?php echo $row['marital_status']; ?></h4>
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
                                                            <h4 class="m-0"><?php echo $row['department']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>

                                                <div class='m-0 d-flex'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Designation</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5'>
                                                            <h4 class="m-0"><?php echo $row['designation']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>

                                                <div class='m-0 d-flex'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Date of Join</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5'>
                                                            <h4 class="m-0"><?php echo $row['date_of_join']; ?></h4>
                                                        </div>
                                                </div>
                                                <hr>

                                                <div class='m-0 d-flex mb-5'>
                                                        <div class='text-start m-0'>
                                                            <h4 class='m-0'><b>Shift</b></h4>
                                                        </div>
                                                        <div class='text-end mx-5 '>
                                                            <h4 class="m-0 justify-content-end"><?php echo $row['shift']; ?></h4>
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
                                                        <div class='text-end mx-5 mt-3'>
                                                            <h4 class="m-0"><?php echo $row['account_name']; ?></h4>
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
                                                            <h4 class="m-0"><?php echo $row['bank_name']; ?></h4>
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

	<a href="invoice.html" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	
     <!-- Vendor JS Files -->
     <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

	
	<script>
		$(function()	{
			$('#invoicePrint').click(function()	{
				window.print();
			});
		});
	</script>
	
  </body>
</html>
