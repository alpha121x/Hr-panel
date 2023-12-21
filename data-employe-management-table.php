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


      <nav>
        <a style="float: left;">
          <h1>Manaement Employes</h1>
        </a>
        <ul class="breadcrumb nav   justify-content-end p-4">
          <li class="breadcrumb-item "><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">View Employee Detail</li>

        </ul>

      </nav>

    </div><!-- End Page Title -->

    <?php
    require_once 'include/classes/meekrodb.2.3.class.php';
    require_once 'db_config.php';
    $id = $_GET['id'];

    $query = DB::query("SELECT * FROM employes WHERE id=%i;", $id);
    foreach ($query as $row) {
    ?>
      <div class="container-fluid">
        <div class="container">
          <section>


            <div class="row">
              <div class="col-lg-4">
                <div class="card mb-4  ">
                  <div class="card-body text-center mt-4 shadow">
                    <img src="./assets/img/amir.jpg " alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3">ABC</h5>
                    <p class="text-dark mb-1">Full Stack Developer</p>
                    <div class="d-flex justify-content-center mb-2">
                      <a href="https://wa.me/15551234567" type="button" class="btn btn-outline-primary ms-1">Contact</a>
                    </div>
                  </div>
                </div>

                <div class="card mb-4 mb-lg-0 mt-4 ">
                  <div class="card-body p-0 mt-4 shadow">
                    <ul class="list-group list-group-flush rounded-3">
                      <li class="list-group-item  text-center p-4">
                        <h2 class='text-primary fs-4'>Company Detail </h2>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <p class="mb-0"> Department</p>
                        <p class="mb-0"><?php echo $row['department']; ?></p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <p>Designation</p>
                        <p class="mb-0"><?php echo $row['designation']; ?></p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <p>Date of join</p>
                        <p class="mb-0"><?php echo $row['date_of_join']; ?></p>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <p>Shift</p>
                        <p class="mb-0"><?php echo $row['shift']; ?></p>
                      </li>
                    </ul>
                  </div>
                </div>



              </div>

              <div class="col-lg-8 ">
                <div class="card mb-4 ">
                  <div class="card-body justify-content-center shadow">
                    <div class="row">
                      <div class="col-sm-12">
                        <h2 class="mb-0 d-flex justify-content-center mb-2 mt-4 text-primary">Personal Information</h2>
                      </div>
                    </div>
                    <hr>

                    <div class="row">

                      <div class="col-sm-6">
                        <p class="mb-0">Full Name</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></p>
                      </div>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-sm-6 ">
                        <p class="mb-0">Date of Birth</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['date_of_birth']; ?></p>
                      </div>
                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">Employe Id</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['id']; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">Gender</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['gender']; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">Marital Status</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['marital_status']; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">Nationality</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['nationality']; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">CNIC</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"> <?php echo $row['cnic']; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">City</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['city']; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">Phone1</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['phone1']; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">Phone2</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['phone2']; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="mb-0">Address</p>
                      </div>
                      <div class="col-sm-6">
                        <p class="text-dark mb-0"><?php echo $row['address']; ?></p>
                      </div>
                    </div>
                    <hr>


                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      </div>
      </div>
        <div >
                  <div class="card mb-6 mb-lg-0 mt-4 ">
                    <div class="card-body p-0  shadow ">
                      <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item  text-center p-3">
                          <h2 class='text-primary fs-4'>Bank Account Detail</h2>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <p class="mb-0"> Bank Name</p>
                          <p class="mb-0"><?php echo $row['bank_name']; ?></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <p>Account Holder Name</p>
                          <p class="mb-0"><?php echo $row['account_name']; ?></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                          <p>Account Number</p>
                          <p class="mb-0"><?php echo $row['account_number']; ?></p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
      </section>
      </div>
      <!-- main container.close -->
      </div>


    <?php } ?>
    </div>




  </main><!-- End #main -->

  <?php include("include/footer.php") ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include("include/script-files.php") ?>




</body>

</html>