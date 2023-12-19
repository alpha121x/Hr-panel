<?php
// Check if the user is an admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
    echo '<!-- ======= Sidebar ======= -->
   ';
}
?>
 <aside id="sidebar" class="sidebar">
   
   <ul class="sidebar-nav" id="sidebar-nav">
   
     <li class="nav-item">
       <a class="nav-link " href="index.php">
       <i class="bi bi-journal-text"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav --> 

      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people-fill"></i><span>Employes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-employe.php">
            <i class="bi bi-circle-fill text-primary"></i></i><span>Add Employes</span>
            </a>
          </li>
          <li>
            <a href="manage-employes.php">
              <i class="bi bi-circle-fill text-primary"></i><span>Manage Employes</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#interviews-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-fill-up"></i><span>Inteviews</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="interviews-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-interviews.php">
            <i class="bi bi-circle-fill text-primary"></i></i><span>Add Interviews</span>
            </a>
          </li>
          <li>
            <a href="manage-interviews.php">
              <i class="bi bi-circle-fill text-primary"></i><span>Manage Interviews</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#attendance-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bell-fill"></i><span>Attendance</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="attendance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="attendance-daily.php">
              <i class="bi bi-circle-fill text-primary"></i><span>Attendance Daily</span>
            </a>
          </li>
          <li>
            <a href="attendance-report.php">
              <i class="bi bi-circle-fill text-primary"></i><span>Attendance Report</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#leaves-nav" data-bs-toggle="collapse" href="#">
        <i class='bx bxs-plane-alt fs-5'></i><span>Leaves</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="leaves-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-leave.php">
              <i class="bi bi-circle-fill text-primary"></i><span>Add Leaves</span>
            </a>
          </li>
          <li>
            <a href="manage-leaves.php">
              <i class="bi bi-circle-fill text-primary"></i><span>Manage Leaves</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#payrolls-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-credit-card-fill"></i><span>Payrolls</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="payrolls-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle-fill text-primary"></i><span>Monthly</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle-fill text-primary"></i><span>Weekly</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle-fill text-primary"></i><span>Hourly</span>
            </a>
          </li> <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle-fill text-primary"></i><span>Per Unit</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#holidays-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-calendar-check-fill"></i><span>Holidays</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="holidays-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-holiday.php">
              <i class="bi bi-circle-fill text-primary"></i><span>Add Holiday</span>
            </a>
          </li>
          <li>
            <a href="manage-holiday.php">
              <i class="bi bi-circle-fill text-primary"></i><span>Manage Holiday</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#daily-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-archive-fill"></i></i><span>Daily</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="daily-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle-fill text-primary"></i><span>Notice</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle-fill text-primary"></i><span>Quote</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#performances-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-trophy-fill"></i><span>Performances</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="performances-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle-fill text-primary"></i><span>Monthly Performance</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle-fill text-primary"></i><span>Performance Report</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Components Nav -->








    </ul>
    
        
   </aside><!-- End Sidebar-->
