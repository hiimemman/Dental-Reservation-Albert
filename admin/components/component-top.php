<body>
  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/comia-new.png" alt=""> -->
        <span class="d-none d-lg-block" style="color: #2a6861;">COMIA DENTAL</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile_image/<?= $profile_image; ?>" alt="Profile" class="border border-secondary rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $username ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $username; ?></h6>
              <span><?= $_SESSION['role']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <?php
      if($_SESSION['role'] == 'ADMIN') {
      ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#accounts" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-users"></i><span>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="accounts" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="user-account.php">
              <i class="bi bi-circle"></i><span>User Accounts</span>
            </a>
          </li>
          <li>
            <a href="admin-account.php">
              <i class="bi bi-circle"></i>
              <span>Admin/Dentist Accounts</span>
            </a>
          </li>
        </ul>
      </li>
      <?php
      }
      ?>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#appointments" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-calendar-check"></i><span>Appointment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="appointments" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="pending-appointment.php">
              <i class="bi bi-circle"></i><span>Pending</span>
            </a>
          </li>
          <li>
            <a href="confirmed-appointment.php">
              <i class="bi bi-circle"></i><span>Confirmed</span>
            </a>
          </li>
          <li>
            <a href="cancelled-appointment.php">
              <i class="bi bi-circle"></i>
              <span>Cancelled</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="records.php">
        <i class="fa-solid fa-book-medical"></i>
          <span>Records</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="fa-solid fa-rotate"></i>
          <span>Transaction</span>
        </a>
      </li>End F.A.Q Page Nav -->

      <?php
      if($_SESSION['role'] == 'ADMIN') {
      ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="reports.php">
          <i class="fa-solid fa-chart-line"></i>
          <span>Reports</span>
        </a>
      </li>
      
      
      <!--<li class="nav-item">
        <a class="nav-link collapsed" href="feedback.php">
          <i class="fa-solid fa-chart-line"></i>
          <span>Feedback/Inquiries</span>
        </a>
      </li>-->
      

      <li class="nav-item">
        <a class="nav-link collapsed" href="settings.php">
          <i class="fa-solid fa-list"></i>
          <span>Settings</span>
        </a>
      </li>
      



      <!-- End Login Page Nav -->
      <?php
      }
      ?>

    </ul>

  </aside><!-- End Sidebar-->