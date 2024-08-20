<?php
require('db_config.php');
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <?php
        require('db_config.php'); // Ensure this file includes the PDO connection setup

        // Query to get the count of districts
        $queryDistricts = "SELECT COUNT(*) AS count FROM district";
        $stmtDistricts = $pdo->prepare($queryDistricts);
        $stmtDistricts->execute();
        $districtsRow = $stmtDistricts->fetch(PDO::FETCH_ASSOC);
        $totalDistricts = $districtsRow['count'];

        // Query to get the count of tehsils
        $queryTehsils = "SELECT COUNT(*) AS count FROM tehsil";
        $stmtTehsils = $pdo->prepare($queryTehsils);
        $stmtTehsils->execute();
        $tehsilsRow = $stmtTehsils->fetch(PDO::FETCH_ASSOC);
        $totalTehsils = $tehsilsRow['count'];

        // Query to get the count of circles
        $queryCircles = "SELECT COUNT(*) AS count FROM circle";
        $stmtCircles = $pdo->prepare($queryCircles);
        $stmtCircles->execute();
        $circlesRow = $stmtCircles->fetch(PDO::FETCH_ASSOC);
        $totalCircles = $circlesRow['count'];

        // Query to get the count of mozahs
        $queryMozahs = "SELECT COUNT(*) AS count FROM mozah";
        $stmtMozahs = $pdo->prepare($queryMozahs);
        $stmtMozahs->execute();
        $mozahsRow = $stmtMozahs->fetch(PDO::FETCH_ASSOC);
        $totalMozahs = $mozahsRow['count'];
        ?>



        <div class="col-lg-8">
        <div class="row">

          <!-- Districts Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card districts-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body">
                <h5 class="card-title">Districts</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-geo-alt"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo number_format($totalDistricts); ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Districts Card -->

          <!-- Tehsils Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card tehsils-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body">
                <h5 class="card-title">Tehsils</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-map"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo number_format($totalTehsils); ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Tehsils Card -->

          <!-- Circles Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card circles-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body">
                <h5 class="card-title">Circles</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-circle"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo number_format($totalCircles); ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Circles Card -->

          <!-- Mozahs Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card mozahs-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body">
                <h5 class="card-title">Mozahs</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-house-door"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo number_format($totalMozahs); ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Mozahs Card -->

        </div>
    </div><!-- End Left side columns -->

    <!-- Left side columns -->

    </div>
  </section>
</main><!-- End #main -->