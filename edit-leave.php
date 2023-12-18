<?php
include("db_config.php");

// Check if user ID is provided in the URL
if (isset($_GET['id'])) {
    $employe_id = $_GET['id'];

    // SQL query to fetch user data based on user ID using MeekroDB
    $employe_data = DB::queryFirstRow("SELECT * FROM leaves WHERE id = %i", $employe_id);

    if ($employe_data) {
        // Access user data using the fetched associative array
        $id = $employe_data['id'];
        $employe_name = $employe_data['employe_name'];
        $leave_type = $employe_data['leave_type'];
        $date_from = $employe_data['date_from'];
        $date_to = $employe_data['date_to'];
        $status + $employe_data['status'];
    } else {
        echo "User not found";
        // Handle the case where the user ID doesn't exist in the database
    }
} else {
    echo "User ID not provided";
    // Handle the case where no user ID is provided in the URL
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Attendance- Form</title>
  <?php include"include/linked-files.php" ?>
</head>

<body>

  
  <?php include"include/header-nav.php" ?>  
 
  <?php include"include/side-nav.php" ?> 

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Attendance</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Edit Leaves</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Form</h5>
            
              <!-- Horizontal Form -->
              <form method="post" action="fire-update-querries.php" enctype="form-data">
                <div class="row mb-3">
                  <label for="inputemployename" class="col-sm-2 col-form-label"><input type="hidden" name="edit-employe-attendance-id" value='<?php echo $id; ?>'>Employee Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value='<?php echo $employe_name; ?>' name="employe_name">
                  </div>
                </div> 
                <div class="row mb-3">
                  <label for="inputemail" class="col-sm-2 col-form-label">Leave Type</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value='<?php echo $attendance; ?>' name="leave_type">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputuser" class="col-sm-2 col-form-label">Duration</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value='<?php echo $month; ?>' name="duration">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputimage" class="col-sm-2 col-form-label">Dates</label>
                  <div class="col-sm-6">
                  <input type="text" class="form-control" value='<?php echo $date; ?>' name="date">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputimage" class="col-sm-2 col-form-label">Reason</label>
                  <div class="col-sm-6">
                  <input type="text" class="form-control" value='<?php echo $date; ?>' name="date">
                  </div>
                </div>
                   
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="update"><i class='bx bx-upload'></i> Save</button>
                </div>
                <br>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

      

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php include"include/footer.php" ?> 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include"include/script-files.php" ?>

</body>


</html>






























