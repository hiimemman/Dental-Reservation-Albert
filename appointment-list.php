<?php 
include './database/config.php';
include './components/header.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION["link_user"] = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
<script>
location.href = 'login.php';
</script>
<?php
} else {
    $user_id = $_SESSION['user_id'];
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
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-md-7">
            <div class="card p-4">
                <h3 class="fw-bold">Appointment List</h3>
                <div class="table-responsive">
                    <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Appointment Date</th>
                                <th>Status</th>
                                <th>Action</th>
                                <!-- <th>Profile Image</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
// ALERTS
$(window).on('load', function() {
    if(localStorage.getItem('status') == 'deleted') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Appointment cancelled successfully!',
        })
        localStorage.removeItem('status');
    }
})

$(document).ready(function() {
    var dataTable = $('#tableData').DataTable({
        "serverSide": true,
        "paging": true,
        "pagingType": "simple",
        "scrollX": true,
        "sScrollXInner": "100%",
        "ajax": {
            url: "./table/appointment-list.php",
            type: "post"
        },
        "order": [
            [3, 'asc']
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
    });

    setInterval(function() {
        dataTable.ajax.reload(null, false);
    }, 10000);

    // CANCEL APPOINTMENT
    $(document).on('click', '#get_cancel', function(e) {
        e.preventDefault();

        var appointment_id = $(this).data('id');

         
        Swal.fire({
            title: 'Are you sure you want to cancel this appointment?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: './functions/appointment-list.php',
                    type: 'POST',
                    data: 'appointment_id=' + appointment_id,
                    success: function(res) {
                        if(res.includes('success')) {
                            localStorage.setItem('status', 'deleted');
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: 'Something went wrong!',
                            })
                        }
                        console.log(res);
                    }
                })
            } 
        })
    })
})
</script>

<?php include './components/bottom.php'; ?>