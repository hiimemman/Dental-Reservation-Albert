<?php 
include './components/head_css.php'; 
include './components/component-top.php';

$admin_id = $_SESSION['admin_id'];
$get_admin_info = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE admin_id = $admin_id");

$fetch = mysqli_fetch_array($get_admin_info);
$firstname = $fetch['firstname'];
$lastname = $fetch['lastname'];
?>

<style>
    button.dt-button, div.dt-button, a.dt-button, input.dt-button {
        background: #6eada7 !important;
        color: white !important;
        border-color: #6eada7;
    }

    button.dt-button:hover, div.dt-button:hover, a.dt-button:hover, input.dt-button:hover {
        background: #2a6861 !important;
        color: white !important;
        border-color: #2a6861;
    }

    button.dt-button:first-child, div.dt-button:first-child, a.dt-button:first-child, input.dt-button:first-child {
        margin-right: 10px;
    }

    .custom_btn {
        background-color: #6eada7 !important;
        border-color: #6eada7 !important;
    }

    .custom_btn:hover {
        background: #2a6861 !important;
        border-color: #2a6861 !important;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Services Report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="reports.php">Income Report</a></li>
                <li class="breadcrumb-item active"><a href="cancelled.php">Cancelled Report</a></li>
             
                <li class="breadcrumb-item "><a href="patient.php">Patient Report</a></li>
                
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section>
        <div class="row">
            <div class="card p-3">
                <div class="col-md-8 col-lg-6 d-flex gap-2 align-items-center pb-3">
                    <span>FROM</span>
                    <input type="date" class="form-control" name="start_date" id="start_date">
                    <span>TO</span>
                    <input type="date" class="form-control"  name="end_date" id="end_date">
                    <input class="btn btn-success custom_btn date_submit" type="button" value="FILTER">
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="example" style="width:100%">
                        <thead>
                            <tr  >
                                <th>Appointment ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th style="text-align:center;">Services</th> 
                                <th>Appointment Date</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr  >
                                <th>Appointment ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th style="text-align:center;">Services</th> 
                                <th>Appointment Date</th>
                            </tr>
</foot>



                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE status = 'COMPLETED'");
                            while ($row = mysqli_fetch_array($query)){
                            ?>

                    <tr>
                        <td><?php echo $row['appointment_id'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td style="text-align:center;"><?php echo $row['service'] ?><br>  
                    
                    
                    </td>
                        <td><?php echo $row['appointment_date'] ?>  </td>
                    </tr>
                    <?php }  ?>
                        </tbody>
                     
                    </table>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search by '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );
</script>
<?php include './components/component-bottom.php'; ?>