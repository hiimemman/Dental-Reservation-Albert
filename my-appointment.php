<?php 
include './database/config.php';
include './components/header.php';

if(!isset($_GET['appointment_id'])) {
    ?>
<script>
location.href = 'appointment-list.php';
</script>
<?php
} else {
    $user_id = $_SESSION['user_id'];
    $appointment_id = $_GET['appointment_id'];

    $check_if_valid = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id AND user_id = $user_id");
    
    if(mysqli_num_rows($check_if_valid) == 0) {
        ?>
<script>
location.href = 'appointment-list.php';
</script>
<?php
    }
}
 ?>

<style>
body {
    background-image: url('assets/img/dental.jpg');
    background-attachment: fixed;
    background-size: cover;
}

.appointment:hover {
    background: #328a82 !important;
    color: white !important;
}
</style>

<section class="mt-5 mx-4">

    <!--APPOINTMENT FORM-->
    <?php
    $user_id = $_SESSION['user_id'];

    $get_email = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id = $user_id");

    $fetch = mysqli_fetch_array($get_email);

    $get_appointment = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id AND user_id = $user_id");

    foreach($get_appointment as $row) {
    ?>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-md-7">
            <div class="bg-white p-5 border-0">
                <h1 class="sm-text-lg all-font-roboto"
                    style="font-weight: 700; line-height: 100%; margin: 0; margin-bottom: 4px; font-size: 30px;">
                    <?php
                    if($row['status'] == 'COMPLETED') {
                        ?>
                        COMPLETED TRANSACTION DETAILS
                        <?php
                    } else {
                        ?>
                        APPOINTMENT DETAILS
                        <?php
                    }
                    ?>
                </h1>
                <div style="line-height: 32px;">&zwnj;</div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Appointment ID</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold">#<?= $row['appointment_id'] ?></p>
                    </div>
                </div>
                <?php
                if($row['status'] != 'COMPLETED') {
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Status</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p style="color: #277c75;" class="fw-bold"><?= $row['status'] ?></p>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Name</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= $row['firstname'] . ' ' . $row['lastname'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Age</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= $row['age'] . ' year(s) old' ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Gender</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= $row['gender'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Contact</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= '+63'.$row['contact'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Email Address</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= $fetch['email'] ?></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div style="background-color: #edf2f7; height: 2px; line-height: 2px;">&zwnj;</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p style="font-size: 12px; text-transform: uppercase; letter-spacing: 1px;" class="text-secondary">Appointment Date & Time</p>
                        <p class="fw-bold"><?php if($row['appointment_time'] != '00:00:00') { echo date('g:i A', strtotime($row['appointment_time'])); } else { echo 'N/A'; } ?></p>
                        <p class="fw-bold"><?= date('M d, Y', strtotime($row['appointment_date'])) ?></p>
                    </div>
                    <?php
                    if($row['status'] == 'COMPLETED') {
                    ?>
                    <div class="col-md-6 text-md-end">
                        <p style="font-size: 12px; text-transform: uppercase; letter-spacing: 1px;" class="text-secondary">Date & Time Completed</p>
                        <p class="fw-bold"><?php if($row['time_completed'] != '00:00:00') { echo date('g:i A', strtotime($row['time_completed'])); } else { echo 'N/A'; } ?></p>
                        <p class="fw-bold"><?= date('M d, Y', strtotime($row['date_completed'])) ?></p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="row mb-3">
                    <div style="background-color: #edf2f7; height: 2px; line-height: 2px;">&zwnj;</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Services</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= $row['service'] ?></p>
                    </div>
                </div>
                <?php
                if($row['status'] == 'COMPLETED') {
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Dentist</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= $row['dentist'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Description</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= $row['description'] ?></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div style="background-color: #edf2f7; height: 2px; line-height: 2px;">&zwnj;</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-secondary">Payment</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="fw-bold"><?= $row['payment'] ?></p>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

</section>

<?php include './components/bottom.php'; ?>