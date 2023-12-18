<?php 
require("auth.php");
require("db_config.php");
require_once("include/classes/meekrodb.2.3.class.php");

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Holiday</title>

    <?php include("include/linked-files.php") ?>

</head>

<body>

    <?php include("include/header-nav.php") ?>

    <?php include("include/side-nav.php") ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1 class='text-primary'>Holiday</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"> Holiday</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Add Holiday</h5>
                            
                            <div class="justify-content-center" style="width: 600px; height:auto;margin:auto">
                                <form class='needs-validation' novalidate method="post" action="fir-add-holiday.php" >

                                        <div class="row mb-4">
                                             <label for="" class="col-sm-3 col-form-label text-primary"><b>Date *</b></label>
                                              <div class="col-sm-9">
                                                <input type="date" class="form-control"  required name="date">
                                                <div class="invalid-feedback">
                                                 Please Enter Your Designation
                                                </div>
                                             </div>
                                        </div>

                                        <div class="row mb-4">
                                             <label for="" class="col-sm-3 col-form-label text-primary"><b>Description *</b></label>
                                              <div class="col-sm-9">
                                                <textarea id="" cols="30" rows="5" class='form-control' require name='description'></textarea>
                                                
                                             </div>
                                        </div>

                                           <div style="width: 50px; height:auto;margin:auto">
                                           <button type='submit' class='btn btn-primary mx-5 mt-4' name='holiday'>Holiday</button>
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