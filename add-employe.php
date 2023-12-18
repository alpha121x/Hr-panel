<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>Forms / Layouts - NiceAdmin Bootstrap Template</title>

  <?php include("include/linked-files.php"); ?>

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include("include/header-nav.php") ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("include/side-nav.php") ?>
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
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>First Name</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" placeholder="Enter Your First Name" required name="first_name">
                    <div class="invalid-feedback">
                      Please Enter Your First Name
                    </div>
                  </div>
                </div>

                <div class="row mb-4 justify-content-center">
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>Last Name</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" placeholder="Enter Your Second Name" required name="last_name">
                    <div class="invalid-feedback">
                     please Enter your Second Name
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>Date of Birth</b></label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputText" required name="date_of_birth">
                    <div class="invalid-feedback">
                     please Enter your Second Name
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>Gender</b></label>
                  <div class="col-sm-9">
                  <select class="form-control form-select" required name="gender">
                    <option selected>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <div class="valid-feedback">
                      Please Select Your Gender
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>CNIC *</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" required name="cnic" data-inputmask="'mask':'99999-9999999-9'" placeholder="xxxxx-xxxxxxx-x">
                    <div class="invalid-feedback">
                     Please Enter Your CNIC Number
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>City</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" required name="city">
                    <div class="invalid-feedback">
                    Please Enter your City
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>Phone No 1</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText"  required name="phone1" data-inputmask="'mask':'9999-9999999'" placeholder="0300-1234567">
                    <div class="invalid-feedback">
                    Please Enter Your Phone Number
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>Phone No 2</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText"  name="phone2" data-inputmask="'mask':'9999-9999999'" placeholder="0300-1234567">
                    <div class="valid-feedback">
                    Please Enter Your Phone Number ( Optional )
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label text-primary"><b>Address*</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" placeholder="Enter Your Address" required name="address">
                    <div class="invalid-feedback">
                    Please Your Address
                    </div>
                  </div>
                </div>

                

                <div class="row mb-4">
                  <label for="" class="col-sm-3 col-form-label form-label text-primary"><b>Nationality</b></label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText" required name="nationality">
                    <div class="invalid-feedback">
                    Please  Enter Your Nationality Information
                    </div>
                  </div>
                </div>

                

                <div class="row mb-4">
                  <label  class="col-sm-3 col-form-label text-primary"><b>Marital Status</b></label>
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
                  <label for="photo" class="col-sm-3 col-form-label text-primary"><b>Photo</b></label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" accept=".jpg, .jpeg" required name="photo">
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
                      <label for="" class="col-sm-3 col-form-label text-primary"><b>Department*</b></label>
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
                      <label for="" class="col-sm-3 col-form-label text-primary"><b>Designation</b></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="Enter Your Designation" required name="designation">
                        <div class="invalid-feedback">
                        Please Enter Your Designation
                        </div>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <label for="" class="col-sm-3 col-form-label text-primary"><b>Date of Joining</b></label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="inputText" required name="date_of_join">
                        <div class="invalid-feedback">
                        Please Enter Date of Joining
                        </div>
                      </div>
                    </div>

                    <div class="row mb-4">
                      <label for="inputState" class="col-sm-3 col-form-label text-primary"><b>Shift</b></label>
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
                        <label for="" class="col-sm-3 col-form-label text-primary"><b>Account Holder Name</b></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="inputText" placeholder="Your Account Name" required name="account_name">
                          <div class="invalid-feedback">
                          Please Enter Your Bank Account Name
                          </div>
                        </div>
                      </div>

                      <div class="row mb-4">
                        <label for="" class="col-sm-3 col-form-label text-primary"><b>Account Number</b></label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="inputText" placeholder="Your Account Number" required name="account_number">
                          <div class="invalid-feedback">
                          Please Enter Your Account Number
                          </div>
                        </div>
                      </div>

                      <div class="row mb-4">
                        <label for="" class="col-sm-3 col-form-label text-primary"><b>Bank Name</b></label>
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
  <?php include("include/footer.php") ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include("include/script-files.php") ?>

</body>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
};
</script>
<!-- input masking  -->
<script src="assets/masking/jquery.min.js"></script>
<script src="assets/masking/jquery.inputmask.bundle.js"></script>
<script>
    $(":input").inputmask();
</script>


</html>