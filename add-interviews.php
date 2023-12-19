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
            <h1 class='text-primary'>Interview</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"> Interview</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Interview</h5>
                            
                            <div class="justify-content-center" style="width: 800px; height:auto;margin:auto">
                            <form class="row g-3 needs-validation" method="post" action="fir-add-interview.php" novalidate>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label text-primary"><b>Applicant Name</b></label>
                                                    <input type="text" class="form-control"  value="" required placeholder="First Name" name='first_name'>
                                                    <div class="invalid-feedback">
                                                        Please enter your first name
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label"> <br> </label>
                                                    <input type="text" class="form-control" id="" value="" required placeholder="Last Name" name='last_name'>
                                                    <div class="invalid-feedback">
                                                        Please enter your last name
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="" class="form-label text-primary"><b>Position Requested</b></label>
                                                    <input type="text" class="form-control" id="" value="" required placeholder="Position" name='position'>
                                                    <div class="invalid-feedback">
                                                        Please enter Position Requested
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="form-label text-primary"> <b>Date Available</b> </label>
                                                    <input type="date" class="form-control" id="" value="" required placeholder="Last Name" name='date'>
                                                    <div class="invalid-feedback">
                                                        Please enter Date of InterView
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Asking Salary</b></label>

                                                    <div class="input-group has-validation">
                                                     
                                                     <input type="number" class="form-control" id=""  required name='asking_salary'>
                                                        <div class="invalid-feedback">
                                                            Please fill asking salary
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Salary Offer</b></label>

                                                    <div class="input-group has-validation">
                                                     
                                                     <input type="number" class="form-control" id=""  required name='salary_offer'>
                                                        <div class="invalid-feedback">
                                                            Please fill salary offer.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Working Experience</b></label>
                                                    <input type="text" class="form-control" id=""  required name='working_experience'>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Experience.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Applicable Skills</b></label>
                                                    <select class="form-select" id="" required name='applicable_skills'>
                                                         <option selected disabled value="">Applicable Skills</option>
                                                            <option value='Excellent'>Excellent</option>
                                                            <option value='Good'>Good</option>
                                                            <option value='Fair'>Fair</option>
                                                            <option value='Poor'>Poor</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Applicable Skills.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Appearance</b></label>
                                                    <select class="form-select"  required name='appearance'>
                                                         <option selected disabled value="">Appearance</option>
                                                            <option value='Excellent'>Excellent</option>
                                                            <option value='Good'>Good</option>
                                                            <option value='Fair'>Fair</option>
                                                            <option value='Poor'>Poor</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Appearance.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label text-primary"><b>Attitude</b></label>
                                                    <select class="form-select" id="validationCustom04" required name='attitude'>
                                                         <option selected disabled value="">Attitude</option>
                                                            <option value='Excellent'>Excellent</option>
                                                            <option value='Good'>Good</option>
                                                            <option value='Fair'>Fair</option>
                                                            <option value='Poor'>Poor</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Attitude.
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="validationCustom04" class="form-label text-primary"><b>Education</b></label>
                                                    <select class="form-select" id="validationCustom04" required name='education'>
                                                         <option selected disabled value="">Education</option>
                                                            <option value='Intermediate'>Intermediate</option>
                                                            <option value='Graduate'>Graduate</option>
                                                            <option value='Master'>Master</option>
                                                            >
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    Please select a valid Education.
                                                    </div> <br>
                                                </div> 

                                                <div class="col-md-12">
                                                    <label for="" class="form-label text-primary"><b>Outcome of Interview</b></label>
                                                    <textarea  cols="30" rows="4" class="form-control" placeholder='Outcome of Interview' name='outcome_interview'></textarea>
                                                    
                                                </div>


                                                
                                                <div class="col-12 text-center mt-4">
                                                    <button class="btn btn-primary" type="submit" name='btn-interview'>Save Info</button>
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