<?php include './components/head_css.php'; ?>

<?php include './components/component-top.php'; 
?>

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

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-xxl-4 col-md-4 col-sm-6" onclick="location.href='pending-appointment.php';">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Pending Appointment</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-regular fa-folder-open"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $get_pending = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE status = 'PENDING'");
                      ?>
                      <h6><?= mysqli_num_rows($get_pending) ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-4 col-sm-6" onclick="location.href='appointment-today.php';">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Appointments for Today</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-regular fa-calendar-check"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $current_date = date('Y-m-d');
                      $get_appointment_today = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE status = 'CONFIRMED' AND appointment_date = '$current_date'");
                      ?>
                      <h6><?= mysqli_num_rows($get_appointment_today) ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-4 col-sm-6" onclick="location.href='confirmed-appointment.php';">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Confirmed Appointment</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $get_confirmed = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE status = 'CONFIRMED'");
                      ?>
                      <h6><?= mysqli_num_rows($get_confirmed) ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-4 col-sm-6" onclick="location.href='completed-today.php';">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Completed Appointment</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-clipboard-list"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $get_completed = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE status = 'COMPLETED' AND date_completed = '$current_date'");
                      ?>
                      <h6><?= mysqli_num_rows($get_completed) ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-4 col-sm-6" onclick="location.href='completed-today.php';">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total Income</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $get_income = mysqli_query($conn, "SELECT SUM(payment) FROM tbl_appointment WHERE status = 'COMPLETED'");

                      $total_income = mysqli_fetch_array($get_income);
                      ?>
                      <h6>&#8369;<?= number_format((float)$total_income['SUM(payment)'], 2, '.', ''); ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-4 col-sm-6" onclick="location.href='completed-today.php';">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Income Today</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $get_income_today = mysqli_query($conn, "SELECT SUM(payment) FROM tbl_appointment WHERE status = 'COMPLETED' AND date_completed = '$current_date'");

                      $income_today = mysqli_fetch_array($get_income_today);
                      $today_income = 0.00;
                      if($income_today['SUM(payment)'] != '' || $income_today['SUM(payment)'] != NULL) {
                        $today_income = $income_today;
                      }
                      ?>
                      <h6>&#8369;<?= number_format((float)$today_income, 2, '.', ''); ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="col-md-6">
            <div class="card p-3">
              <canvas class="w-100 h-100" id="myChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

<script>
  <?php
  $date = date('Y-m-d');
  $last_seven_days = date('Y-m-d', strtotime('-7 days'));
  $get_income = mysqli_query($conn, "SELECT date_completed, SUM(payment) as Total FROM tbl_appointment WHERE status = 'COMPLETED' AND date_completed BETWEEN '$last_seven_days' AND '$date' GROUP BY date_completed");

  $date = array();
  $label = array();
  foreach($get_income as $row) {
    $date[] = date('F d, Y', strtotime($row['date_completed']));
    $label[] = $row['Total'];
  }
  ?>

const dateArrayJS = <?php echo json_encode($date)?>;

  // setup 
  const data = {
        labels: dateArrayJS,
        datasets: [{
            label: 'Daily Income',
            data: <?php echo json_encode($label)?>,
            backgroundColor: [
                '#328a82'
            ],
            borderColor: [
                '#328a82'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'line',
        data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // render init block
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

<?php include './components/component-bottom.php'; ?>