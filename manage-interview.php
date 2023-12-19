<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home - Manage Employes</title>

    <?php include("include/linked-files.php") ?>

   
    

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
        <h1>Manage Employes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage Employes</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card col-lg-12">
                        <div class="card-body col-lg-12">
                            <h5 class="card-title">Manage Employes</h5>

                            <!-- Table with stripped rows -->
                            <table class="table  table-striped table-hover" id='datatable' width='100%'>
                                  <caption>
                                    BixiSoft HR Management
                                   </caption>
                                <thead class="table-primary">
                                    <tr>
                                        <th  >Id</th>
                                        <th  >Full Name</th>
                                        <th >Position</th>
                                        <th>Asking Salary</th>
                                        <th >Salary Offer</th>
                                        <th >Working Experience</th>
                                        <th >Applicable Skills</th>
                                        <th >Appearance</th>
                                        <th >Attitude</th>
                                        <th >Education</th>
                                        <th >Outcome Interview</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'include/classes/meekrodb.2.3.class.php';
                                    require_once 'db_config.php';

                                    $query = DB::query('SELECT * FROM interview');
                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id']; ?></th>
                                            <td><?php echo $row['first_name'] . ' ' . $row['Last_name']; ?></td>
                                            <td><?php echo $row['position']; ?></td>
                                            <td><?php echo $row['asking_salary']; ?></td>
                                            <td><?php echo $row['salary_offer']; ?></td>
                                            <td><?php echo $row['working_experience']; ?></td>
                                            <td><?php echo $row['applicable_skills']; ?></td>
                                            <td><?php echo $row['appearance']; ?></td>
                                            <td><?php echo $row['attitude']; ?></td>
                                            <td><?php echo $row['education']; ?></td>
                                            <td><?php echo $row['outcome_interview']; ?></td>
                                            <td>
                                                   
                                                <a href="" class='text-black'><i class="bi bi-pencil-square text-primary"></i>&nbsp;</a> | <a href=".php?id=<?php echo $row['id']; ?>" class='text-black'><i class="bi bi-trash text-primary"></i>&nbsp;</a> 
                                                
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

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

