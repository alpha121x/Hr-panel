<?php
// Check if the user is an admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
    echo '<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
   
   <ul class="sidebar-nav" id="sidebar-nav">
   
     <li class="nav-item">
       <a class="nav-link " href="index.php">
       <i class="bi bi-journal-text"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav --> 
         <li class="nav-item">
           <a class="nav-link collapsed"  href="add-user-profile.php">
           <i class="bi bi-person-fill-add"></i>
             <span></span>
           </a>
         </li>
        
   </aside><!-- End Sidebar-->';
}
?>

