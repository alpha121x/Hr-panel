<?php 
require("auth.php");
require("db_config.php");
require_once("include/classes/meekrodb.2.3.class.php");

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Inter View</title>

    <?php include("include/linked-files.php") ?>

</head>

<body>

    <?php include("include/header-nav.php") ?>

    <?php include("include/side-nav.php") ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1 class='text-primary'>Inter View</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"> Inter View</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Inter View</h5>
                            
                            <div class="justify-content-center" style="width: 800px; height:auto;margin:auto">
                            <form class="row g-3 needs-validation" novalidate>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label text-primary"><b>Application Name</b></label>
                                                    <input type="text" class="form-control" id="" value="" required placeholder="First Name">
                                                    <div class="invalid-feedback">
                                                        Please enter your first name
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label"> <br> </label>
                                                    <input type="text" class="form-control" id="" value="" required placeholder="Last Name">
                                                    <div class="invalid-feedback">
                                                        Please enter your last name
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="" class="form-label text-primary"><b>Position Requested</b></label>
                                                    <input type="text" class="form-control" id="" value="" required placeholder="Position">
                                                    <div class="invalid-feedback">
                                                        Please enter Position Requested
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label text-primary"> <b>Date Available</b> </label>
                                                    <input type="date" class="form-control" id="" value="" required placeholder="Last Name">
                                                    <div class="invalid-feedback">
                                                        Please enter Date
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Salary Requested</b></label>

                                                    <div class="input-group has-validation">
                                                     
                                                     <input type="text" class="form-control" id=""  required>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Working Experience</b></label>
                                                    <select class="form-select" id="" required>
                                                         <option selected disabled value="">Experience</option>
                                                            <option value='Fresher'>Fresher</option>
                                                            <option value='3 Month'>3 Month</option>
                                                            <option value='6 Month'>6 Month</option>
                                                            <option value='1 Year'>1 Year</option>
                                                            <option value='2 Year'>2 Year</option>
                                                            <option value='3 Year'>3 Year</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Experience.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label text-primary"><b>Applicable Skills</b></label>
                                                    <select class="form-select" id="validationCustom04" required>
                                                         <option selected disabled value="">Applicable Skills</option>
                                                            <option value='Excellent'>Excellent</option>
                                                            <option value='Good'>Good</option>
                                                            <option value='Fair'>Fair</option>
                                                            <option value='Poor'>Poor</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Experience.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label text-primary"><b>Appearance</b></label>
                                                    <select class="form-select" id="validationCustom04" required>
                                                         <option selected disabled value="">Appearance</option>
                                                            <option value='Excellent'>Excellent</option>
                                                            <option value='Good'>Good</option>
                                                            <option value='Fair'>Fair</option>
                                                            <option value='Poor'>Poor</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Experience.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label text-primary"><b>Attitude</b></label>
                                                    <select class="form-select" id="validationCustom04" required>
                                                         <option selected disabled value="">Attitude</option>
                                                            <option value='Excellent'>Excellent</option>
                                                            <option value='Good'>Good</option>
                                                            <option value='Fair'>Fair</option>
                                                            <option value='Poor'>Poor</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Experience.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label text-primary"><b>Education</b></label>
                                                    <select class="form-select" id="validationCustom04" required>
                                                         <option selected disabled value="">Education</option>
                                                            <option value='Intermediate'>Intermediate</option>
                                                            <option value='Graduate'>Graduate</option>
                                                            <option value='Master'>Master</option>
                                                            >
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Experience.
                                                    </div> <br>
                                                </div> 

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Why are you considering leaving your current position?</b></label>
                                                    <input type="text" class="form-control" id="" value="" required >
                                                    <div class="invalid-feedback">
                                                        Answer a Question
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>What aspects of your past / present jobs have been most challenging?</b></label>
                                                    <input type="text" class="form-control" id="" value="" required >
                                                    <div class="invalid-feedback">
                                                        Answer a Question
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Tell me about a professional challenge you've faced and how it was resolved</b></label>
                                                    <input type="text" class="form-control" id="" value="" required >
                                                    <div class="invalid-feedback">
                                                        Answer a Question
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>What do you feel were your most significant accomplishments on the job?</b></label>
                                                    <input type="text" class="form-control" id="" value="" required >
                                                    <div class="invalid-feedback">
                                                        Answer a Question
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>What do you consider to be a strenght of yours?</b></label>
                                                    <input type="text" class="form-control" id="" value="" required >
                                                    <div class="invalid-feedback">
                                                        Answer a Question
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>What do you consider to be your weaknesses?</b></label>
                                                    <input type="text" class="form-control" id="" value="" required >
                                                    <div class="invalid-feedback">
                                                        Answer a Question
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Tell me why you thing you would be a good fit for this position</b></label>
                                                    <input type="text" class="form-control" id="" value="" required >
                                                    <div class="invalid-feedback">
                                                        Answer a Question
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>What are your professional goals for the next 5 years?</b></label>
                                                    <input type="text" class="form-control" id="" value="" required >
                                                    <div class="invalid-feedback">
                                                        Answer a Question
                                                    </div>
                                                </div>






                                                <!-- <div class="col-md-6">
                                                    <label for="validationCustom03" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="validationCustom03" required>
                                                    <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="validationCustom04" class="form-label">State</label>
                                                    <select class="form-select" id="validationCustom04" required>
                                                    <option selected disabled value="">Choose...</option>
                                                    <option>...</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid state.
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="validationCustom05" class="form-label">Zip</label>
                                                    <input type="text" class="form-control" id="validationCustom05" required>
                                                    <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck">
                                                        Agree to terms and conditions
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        You must agree before submitting.
                                                    </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-12 text-center mt-4">
                                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                                </div>
                                                </form>
                            </div>
                            


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