<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tables / Data - NiceAdmin Bootstrap Template</title>
    <?php include("include/linked-files.php") ?>

    <!-- data table css  -->
    <link rel="stylesheet" href="assets/jquery/jquery.datatable.css">
    

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

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Employes</h5>

                            <!-- Table with stripped rows -->
                            <table class="table  table-striped table-hover" id='datatable'>
                                  <caption>
                                    BixiSoft HR Management
                                   </caption>
                                <thead class="table-primary">
                                    <tr>
                                        <th  >Id</th>
                                        <th  >Name</th>
                                        <th >City</th>
                                        <th>Phone</th>
                                        <th >Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once 'include/classes/meekrodb.2.3.class.php';
                                    require_once 'db_config.php';

                                    $query = DB::query('SELECT * FROM employes');
                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['id']; ?></th>
                                            <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                            <td><?php echo $row['city']; ?></td>
                                            <td><?php echo $row['phone1']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td>
                                             <a href="" class='text-black'><i class="bi bi-pencil-square"></i>&nbsp;Edit</a> | <a href="delete-employe.php?id=<?php echo $row['id']; ?>" class='text-black'><i class="bi bi-trash"></i>&nbsp;Delete</a> | <a href="data-employe-management-table.php?id=<?php echo $row['id']; ?>" class='text-black'><i class='bi bi-eye-fill'> View Detail</i></a>
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

