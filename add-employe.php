<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php require_once('include/header-nav.php'); ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php require_once('include/side-nav.php'); ?>
  <!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Employes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Employes</li>
          <li class="breadcrumb-item active">Add Employes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
    <form method="post" class='needs-validation' novalidate action="fir-employe-query.php">
      <div class="row">
        <div class="col-lg-6">
         

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Personal Details</h5>

              <!-- Horizontal Form -->
              
                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label"><b>First Name</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" placeholder="Enter Your First Name" required name="first_name">
                    <div class="invalid-feedback">
                      Please Enter Your First Name
                    </div>
                  </div>
                </div>

                <div class="row mb-4 justify-content-center">
                  <label for="" class="col-sm-3 col-form-label"><b>Last Name</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" placeholder="Enter Your Second Name" required name="last_name">
                    <div class="invalid-feedback">
                     please Enter your Second Name
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label"><b>Date of Birth</b></label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputText" required name="date_of_birth">
                    <div class="invalid-feedback">
                     please Enter your Second Name
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label"><b>Gender</b></label>
                  <div class="col-sm-9">
                  <select class="form-control form-select" required name="gender">
                    <option selected>Your Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <div class="valid-feedback">
                      Please Select Your Gender
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label"><b>CNIC *</b></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="inputText" required name="cnic">
                    <div class="invalid-feedback">
                     Please Enter Your CNIC Number
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label"><b>City</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" required name="city">
                    <div class="invalid-feedback">
                    Please Enter your City
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label"><b>Phone No:1</b></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="inputText" placeholder="Enter Your Number" required name="phone1">
                    <div class="invalid-feedback">
                    Please Enter Your Phone Number
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label"><b>Phone No:2</b></label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="inputText" placeholder="Optional" name="phone2">
                    <div class="valid-feedback">
                    Please Enter Your Phone Number ( Optional )
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label"><b>Address*</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" placeholder="Enter Your Address" required name="address">
                    <div class="invalid-feedback">
                    Please Your Address
                    </div>
                  </div>
                </div>

                

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label form-label"><b>Nationality</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" required name="nationality">
                    <div class="invalid-feedback">
                    Please  Enter Your Nationality Information
                    </div>
                  </div>
                </div>

                

                <div class="row mb-4">
                  <label  class="col-sm-3 col-form-label"><b>Marital Status</b></label>
                  <div class="col-sm-9">
                  <select  class="form-control form-select" required name="marital_status">
                    <option selected>Choose...</option>
                    <option value="Married">Yes</option>
                    <option value="Not Married">No</option>
                  </select>
                  <div class="valid-feedback">
                  Please Enter You Married or Not!
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="photo" class="col-sm-3 col-form-label"><b>Photo</b></label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control"  required name="photo">
                    <div class="invalid-feedback">
                    Please Enter Your Photo
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>


        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company Details</h5>

              <!-- Vertical Form -->
              
                  <div class="row mb-4">
                      <label for="" class="col-sm-3 col-form-label "><b>Department*</b></label>
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

                  

                  <div class="row mb-4">
                      <label for="" class="col-sm-3 col-form-label"><b>Designation</b></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Enter Your Designation" required name="designation">
                        <div class="invalid-feedback">
                        Please Enter Your Designation
                        </div>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <label for="" class="col-sm-3 col-form-label"><b>Date of Joining</b></label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="inputText" required name="date_of_join">
                        <div class="invalid-feedback">
                        Please Enter Date of Joining
                        </div>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <label for="inputState" class="col-sm-3 col-form-label"><b>Shift</b></label>
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
              </div>


                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Bank Account Detail</h5>

                    <!-- No Labels Form -->

                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label"><b>Account Holder Name</b></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="inputText" placeholder="Your Account Name" required name="account_name">
                          <div class="invalid-feedback">
                          Please Enter Your Bank Account Name
                          </div>
                        </div>
                      </div>

                      <div class="row mb-4">
                        <label for="" class="col-sm-3 col-form-label"><b>Account Number</b></label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="inputText" placeholder="Your Account Number" required name="account_number">
                          <div class="invalid-feedback">
                          Please Enter Your Account Number
                          </div>
                        </div>
                      </div>

                      <div class="row mb-4">
                        <label for="" class="col-sm-3 col-form-label"><b>Bank Name</b></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="inputText" placeholder="Enter Bank Name" required name="bank_name">
                          <div class="invalid-feedback">
                          Please Enter Your Bank name ( You have a account ) 
                          </div>
                        </div>
                      </div>
                  </div>
                </div>

            </div>
          </div>

        </div>
      </div>
              <div class="text-center text-end mb-5 mt-3">
                  <button type="submit" class="btn btn-primary btn-lg" name="employe_save">Submit</button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
      </form><!-- End Horizontal Form -->
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Human Resource Management System</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>