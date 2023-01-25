<?php include './components/head_css.php'; 
include './components/component-top.php'; 

if(!isset($_GET['id'])) {
    ?>
    <script>
        location.href = 'records.php';
    </script>
    <?php
} else {
    $appointment_id = $_GET['id'];
    $check_if_valid = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id");

    if(mysqli_num_rows($check_if_valid) < 1) {
        ?>
        <script>
            location.href = 'records.php';
        </script>
        <?php
    }
}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>View Records</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">View Records</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section>
        <div class="row">
            <div class="card p-3">
                <?php
                $get_record = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id");

                foreach($get_record as $row) {
                    $age = $row['age'];
                    
                ?>
                <form>
                    <div class="mb-3 col-sm-5 col-md-3 col-lg-2">
                        <label for="view_appointment_id" class="col-form-label">Appointment ID</label>
                        <input type="text" class="form-control" id="view_appointment_id" name="view_appointment_id" value="<?= $row['appointment_id'] ?>"
                            required readonly>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-md-4">
                            <label for="view_firstname" class="col-form-label">Firstname</label>
                            <input type="text" class="form-control" id="view_firstname" name="view_firstname" value="<?= $row['firstname'] ?>" required
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="view_lastname" class="col-form-label">Lastname</label>
                            <input type="text" class="form-control" id="view_lastname" name="view_lastname" value="<?= $row['lastname'] ?>" required
                                readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="view_gender" class="col-form-label">Gender</label>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" value="<?= $row['gender'] ?>" required
                                readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="view_age" class="col-form-label">Age</label>
                            <input type="text" class="form-control" id="view_age" name="view_age" value="<?= $row['age'] ?>" required readonly>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-md-4">
                            <label for="view_firstname" class="col-form-label">Contact</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">+63</span>
                                <input type="tel" id="view_contact" name="view_contact" class="form-control" value="<?= $row['contact'] ?>" required
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="view_lastname" class="col-form-label">Appointment Date & Time</label>
                            <input type="text" class="form-control" id="view_lastname" name="view_lastname" value="<?= date('F d, Y', strtotime($row['appointment_date'])) . ' - ' . date('h:i A', strtotime($row['appointment_time'])) ?>" required
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="view_gender" class="col-form-label">Dentist</label>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" value="<?= $row['dentist'] ?>" required
                                readonly>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-md-6">
                            <label for="view_gender" class="col-form-label">Service</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="view_reason"
                                    name="view_reason" style="height: 100px; resize: none;"><?= $row['service'] ?></textarea>
                                <label for="floatingTextarea2">Service</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="view_gender" class="col-form-label">Diagnosis</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="view_reason"
                                    name="view_reason" style="height: 100px; resize: none;"><?= $row['description'] ?></textarea>
                                <label for="floatingTextarea2">Diagnosis</label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-md-4">
                            <label for="view_gender" class="col-form-label">Date & Time Completed</label>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" value="<?= date('F d, Y', strtotime($row['date_completed'])) . ' - ' . date('h:i A', strtotime($row['time_completed'])) ?>" required
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="view_gender" class="col-form-label">Payment</label>
                             <div class="input-group input-group-merge">
                                <span class="input-group-text">&#8369;</span>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" value="<?= $row['payment'] ?>" required
                                readonly>
                                </div>
                        </div>
                    </div>
                    <br>
            <h3>PATIENT'S CHART</h3>
            <br></br>


<?php
          //  $sqlrecent  = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id");
?>


                    <b>Teeth:</b> <?php echo  $row['diagram'];
                 
                    
                    
                    ?>

<br></br>


                                    <div class="container">
                <div class="row">
                
                <?php
                $sql1 = mysqli_query($conn, "SELECT * FROM tbl_tooth WHERE title = 'Adult Tooth'");
                $row = mysqli_fetch_array($sql1);
                $adult = $row['image'];

                $sql1 = mysqli_query($conn, "SELECT * FROM tbl_tooth WHERE title = 'Baby Tooth'");
                $row = mysqli_fetch_array($sql1);
                $baby = $row['image'];
                if($age == 7 || $age < 7){
                
                    $image = $baby;
                }
                else{
                

                $image = $adult;
                }
                ?>



    <div class="col-sm">
    <p>Top</p><img src="<?php echo $image ?>"style="margin-left: 0.9em;" height="300" width="250"><p>Bottom</p>
    </div>
    <div class="col-sm">
    <b>Legend:</b><br>
    <ul class="legend">
    <li><span class="leg">C -</span> Dental Caries</li>
    <li><span class="leg">C1 -</span> Dental Caries With Vital Pulp Expose</li>
    <li><span class="leg">C2 -</span> Dental Caries With Non-Vital Pulp Exposee</li>
    <li><span class="leg">R.F -</span> Indicated for Extraction</li>
    <li><span class="leg">AM -</span> Amalgam Filling</li>
    <li><span class="leg">Col -</span> Composite Inlay</li>
    <li><span class="leg">GIC -</span> Glass Ionomer Cerment</li>
    <li><span class="leg">Co -</span> Composite Resin</li>
    <li><span class="leg">GC -</span> Gold Crown</li>
    <li><span class="leg">A Bt -</span> Bridge Abutment</li>
    <li><span class="leg">P -</span> Pontic</li>
    <li><span class="leg">PorJC -</span>Porcelein Jacket Crowa</li>
    <li><span class="leg">PJC -</span> Plastic Jacket Crown</li>
    <li><span class="leg">MI -</span> Mental Inlays</li>
    <li><span class="leg">M -</span> Missing due to Extraction</li>
    <li><span class="leg">Un -</span> Unerupted</li>
</ul>
    </div>
  </div>
</div>



                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
$(window).on('load', function(e) {
    if (localStorage.getItem('status') == 'updated') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Status updated successfully!',
            confirmButtonColor: '#6eada7',
        })
        localStorage.removeItem('status');
    } else if (localStorage.getItem('status') == 'insert') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Account added successfully',
            confirmButtonColor: '#6eada7',
        })
        localStorage.removeItem('status');
    }
})
$(document).ready(function() {

})
</script>
<?php include './components/component-bottom.php'; ?>
<style>
/* basic positioning */
.legend { list-style: none; }
.leg {font-weight: bold;}
    </style>