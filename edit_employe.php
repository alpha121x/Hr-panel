<?php
require_once 'include/classes/meekrodb.2.3.class.php';
require_once 'db_config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //echo "<script>alert($id)</script>";
    $query = DB::queryFirstRow("SELECT * FROM employes WHERE id=$id");
    // print_r($query);
    // Array
    // (
    //     [id] => 3
    //     [first_name] => Maggie
    //     [last_name] => Hyde
    //     [date_of_birth] => 2020-05-11
    //     [gender] => Male
    //     [cnic] => 25
    //     [city] => Recusandae Aliquip 
    //     [phone1] => 87
    //     [phone2] => 83
    //     [address] => Consequatur quia vol
    //     [nationality] => Ea magnam aperiam no
    //     [marital_status] => Choose...
    //     [photo] => form2.jpeg
    //     [department] => Departments
    //     [designation] => Kristen
    //     [date_of_join] => 1986-05-15
    //     [shift] => 12:00 pm - 09:00 pm
    //     [account_name] => Gavin Coffey
    //     [account_number] => 153
    //     [bank_name] => Vaughan Peterson
    // )
};

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Edit Employee</title>

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
            <h1>Edit Employes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Employes</li>
                    <li class="breadcrumb-item active">Edit Employes</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <form method="post" class='needs-validation' novalidate action="edit_employe_query.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6">


                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Personal Details</h5>

                                <!-- Horizontal Form -->

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>First Name</b></label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" id="inputText" value="<?php echo $query['id'] ?>" placeholder="Enter Your First Name" required name="id">
                                        <input type="text" class="form-control" id="inputText" value="<?php echo $query['first_name'] ?>" placeholder="Enter Your First Name" required name="first_name">
                                        <div class="invalid-feedback">
                                            Please Enter Your First Name
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4 justify-content-center">
                                    <label for="" class="col-sm-3 col-form-label"><b>Last Name</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputText" value="<?php echo $query['last_name'] ?>" placeholder="Enter Your Second Name" required name="last_name">
                                        <div class="invalid-feedback">
                                            please Enter your Second Name
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Date of Birth</b></label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="inputText" value="<?php echo $query['date_of_birth'] ?>" required name="date_of_birth" disabled>
                                        <div class="invalid-feedback">
                                            please Enter your Second Name
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Gender</b></label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-select" required name="gender">
                                            <option disabled>Gender</option>
                                            <option value="Male" <?php echo ($query['gender'] === 'Male') ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo ($query['gender'] === 'Female') ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Please Select Your Gender
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>CNIC *</b></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="<?php echo $query['cnic'] ?>" id="inputText" required name="cnic">
                                        <div class="invalid-feedback">
                                            Please Enter Your CNIC Number
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>City</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputText" value="<?php echo $query['city'] ?>" required name="city">
                                        <div class="invalid-feedback">
                                            Please Enter your City
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Phone No:1</b></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="inputText" value="<?php echo $query['phone1'] ?>" placeholder="Enter Your Number" required name="phone1">
                                        <div class="invalid-feedback">
                                            Please Enter Your Phone Number
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Phone No:2</b></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="inputText" value="<?php echo $query['phone2'] ?>" placeholder="Optional" name="phone2">
                                        <div class="valid-feedback">
                                            Please Enter Your Phone Number ( Optional )
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Address*</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputText" value="<?php echo $query['address'] ?>" placeholder="Enter Your Address" required name="address">
                                        <div class="invalid-feedback">
                                            Please Your Address
                                        </div>
                                    </div>
                                </div>



                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label form-label"><b>Nationality</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputText" value="<?php echo $query['nationality'] ?>" nationality required name="nationality">
                                        <div class="invalid-feedback">
                                            Please Enter Your Nationality Information
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label"><b>Marital Status</b></label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-select" required name="marital_status">
                                            <option disabled>Choose...</option>
                                            <option value="Married" <?php echo ($query['marital_status'] === 'Married') ? 'selected' : ''; ?>>Married</option>
                                            <option value="Single" <?php echo ($query['marital_status'] === 'Single') ? 'selected' : ''; ?>>Single</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Please Enter Your Marital Status
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="photo" class="col-sm-3 col-form-label"><b>Photo</b></label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" name="old_photo" value="<?php echo $query['photo'] ?>">
                                        <input type="file" class="form-control" accept=".jpg, .jpeg" name="photo">
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
                                    <label for="" class="col-sm-3 col-form-label"><b>Department*</b></label>
                                    <div class="col-sm-9">
                                        <select id="inputState" class="form-control form-select" required name="department">
                                            <option disabled>Departments</option>
                                            <option value="Call Center" <?php echo ($query['department'] === 'Call Center') ? 'selected' : ''; ?>>Call Center</option>
                                            <option value="WordPress" <?php echo ($query['department'] === 'WordPress') ? 'selected' : ''; ?>>WordPress</option>
                                            <option value="PHP Developer" <?php echo ($query['department'] === 'PHP Developer') ? 'selected' : ''; ?>>PHP Developer</option>
                                            <option value="Designing" <?php echo ($query['department'] === 'Designing') ? 'selected' : ''; ?>>Designing</option>
                                            <option value="Marketing" <?php echo ($query['department'] === 'Marketing') ? 'selected' : ''; ?>>Marketing</option>
                                        </select>
                                        <div class="valid-feedback">
                                            Please Enter Your Department
                                        </div>
                                    </div>
                                </div>




                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Designation</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $query['designation'] ?>" placeholder="Enter Your Designation" required name="designation">
                                        <div class="invalid-feedback">
                                            Please Enter Your Designation
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Date of Joining</b></label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" value="<?php echo $query['date_of_join'] ?>" id="inputText" required name="date_of_join" disabled>
                                        <div class="invalid-feedback">
                                            Please Enter Date of Joining
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="inputState" class="col-sm-3 col-form-label"><b>Shift</b></label>
                                    <div class="col-sm-9">
                                        <select id="inputState" class="form-control form-select" required name="shift">
                                            <option disabled>Select Your Shift</option>
                                            <option value="09:00 am - 06:00 pm" <?php echo ($query['shift'] === '09:00 am - 06:00 pm') ? 'selected' : ''; ?>>09:00 am - 06:00 pm</option>
                                            <option value="12:00 pm - 09:00 pm" <?php echo ($query['shift'] === '12:00 pm - 09:00 pm') ? 'selected' : ''; ?>>12:00 pm - 09:00 pm</option>
                                            <option value="09:00 pm - 06:00 am" <?php echo ($query['shift'] === '09:00 pm - 06:00 am') ? 'selected' : ''; ?>>09:00 pm - 06:00 am</option>
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
                                        <input type="text" class="form-control" id="inputText" value="<?php echo $query['account_name'] ?>" placeholder="Your Account Name" required name="account_name">
                                        <div class="invalid-feedback">
                                            Please Enter Your Bank Account Name
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Account Number</b></label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="inputText" value="<?php echo $query['account_number'] ?>" placeholder="Your Account Number" required name="account_number" disabled>
                                        <div class="invalid-feedback">
                                            Please Enter Your Account Number
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="" class="col-sm-3 col-form-label"><b>Bank Name</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputText" value="<?php echo $query['bank_name'] ?>" placeholder="Enter Bank Name" required name="bank_name">
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
                    <button type="submit" class="btn btn-primary btn-lg" name="employe_update">Update</button>
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

</html>