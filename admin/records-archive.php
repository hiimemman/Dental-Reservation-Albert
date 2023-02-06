<?php 
include './components/head_css.php'; 
include './components/component-top.php';
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Archived Records</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active"><a href="records.php">Records</a></li>
                <li class="breadcrumb-item active">Archive</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- VIEW MODAL -->
    <div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">VIEW</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="insert">
                        <div class="mb-3">
                            <label for="view_appointment_id" class="col-form-label">Appointment ID</label>
                            <input type="text" class="form-control" id="view_appointment_id" name="view_appointment_id"
                                required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_firstname" class="col-form-label">Firstname</label>
                            <input type="text" class="form-control" id="view_firstname" name="view_firstname" required
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_lastname" class="col-form-label">Lastname</label>
                            <input type="text" class="form-control" id="view_lastname" name="view_lastname" required
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_gender" class="col-form-label">Gender</label>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" required
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_age" class="col-form-label">Age</label>
                            <input type="text" class="form-control" id="view_age" name="view_age" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_contact" class="col-form-label">Contact</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">+63</span>
                                <input type="tel" id="view_contact" name="view_contact" class="form-control" required
                                    readonly />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="view_appointment_date" class="col-form-label">Appointment Date</label>
                            <input type="date" class="form-control" id="view_appointment_date"
                                name="view_appointment_date" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_appointment_time" class="col-form-label">Appointment Time</label>
                            <input type="text" class="form-control" id="view_appointment_time"
                                name="view_appointment_time" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_service" class="col-form-label">Service</label>
                            <input type="text" class="form-control" id="view_service" name="view_service" required
                                readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> <!-- INSERT MODAL END -->

    <!-- UPDATE MODAL -->
    <div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="update">
                        <div class="mb-3">
                            <label for="update_appointment_id" class="col-form-label">Appointment ID</label>
                            <input type="text" class="form-control" id="update_appointment_id"
                                name="update_appointment_id" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="update_status" class="col-form-label">Status</label>
                            <select class="form-select" id="update_status" name="update_status"
                                aria-label="Default select example">
                                <option selected>Select Status</option>
                                <option value="COMPLETED">COMPLETED</option>
                                <option value="CANCELLED">CANCELLED</option>
                            </select>
                        </div>
                        <div class="mb-3 d-none cancelled_cont">
                            <label for="update_reason" class="col-form-label">Reason</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="update_reason"
                                    name="update_reason" style="height: 100px; resize: none;"></textarea>
                                <label for="floatingTextarea2">Reason</label>
                            </div>
                        </div>
                        <div class="mb-3 d-none completed_cont">
                            <label for="update_status" class="col-form-label">Diagnosis</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="update_description" name="update_description"
                                    style="height: 100px; resize: none;"></textarea>
                                <label for="floatingTextarea2">Diagnosis</label>
                            </div>
                        </div>
                        <div class="mb-3 d-none completed_cont">
                            <label for="update_status" class="col-form-label">Price</label>
                            <input type="text" class="form-control" id="update_price" name="update_price"
                                placeholder="Enter price" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update_btn" form="update" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div> <!-- UPDATE MODAL END -->
    <a href="records.php"><button class="archive">View Records</button></a>
    <section>
        <div class="row">
            <div class="card p-3">
                <div class="table-responsive">
                    <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Dentist</th>
                                <th>Service</th>
                                <th>Diagnosis</th>
                                <th>Payment</th>
                                <th>Date Completed</th>
                                <th>Action</th>
                                <!-- <th>Profile Image</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM tbl_appointment WHERE status = 'COMPLETED' AND isStatus = 0";
                                $res = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($res)){

                                
                            ?>
                            <tr>
                                <td><?php echo $row['appointment_id'] ?></td>
                                <td><?php echo ucwords($row['firstname']) ?></td>
                                <td><?php echo ucwords($row['lastname']) ?></td>
                                <td><?php echo ucwords($row['dentist']) ?></td>
                                <td><?php echo $row['service'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td>₱ <?php echo $row['payment'] ?></td>
                                <td><?php echo date('F d, Y', strtotime($row['date_completed'])) . ' ' . date('h:i A', strtotime($row['time_completed'])); ?></td>
                                <td><div class="d-flex flex-row gap-1">
                                    <a href="view-records.php?id=<?php echo $row['appointment_id'] ?>" type="button" id="get_view" data-id="'.$row['appointment_id'].'" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                    
                                    <?php 
                                    if($row['isStatus'] == 1){
                                        echo '<a class="btn btn-danger" href="records-status.php?appointment_id='.$row['appointment_id'].'&isStatus=0">Restore</a>';
                                    }
                                    else{
                                        echo '<a class="btn btn-danger" href="records-status.php?appointment_id='.$row['appointment_id'].'&isStatus=1"><i class="fas fa-archive"></i></a>';
                                    }
                                    ?>
                                    <!-- <p class="archive"></p> -->
                                    <style>
                                        .archive{
                                            color: white;
                                            border-color: teal;
                                            background-color: teal;
                                            padding: auto;
                                            margin-bottom: 10px;
                                        }
                                    </style>
                                    </div>
                                </td>

                            </tr>   
<?php } ?>

                    </tbody>
                    </table>
                </div>
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
    // ADMIN DATATABLES
    var dataTable = $('#tableData').DataTable({
       
        "paging": true,
        "pagingType": "simple",
        "scrollX": true,
       
        
      
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
    });

   
    // GET VIEW
    $(document).on('click', '#get_view', function(e) {
        var appointment_id = $(this).data('id');

        $.ajax({
            url: './functions/confirmed-appointment.php',
            type: 'POST',
            data: 'appointment_id=' + appointment_id,
            success: function(res) {
                var obj = JSON.parse(res);
                $('#view_modal').modal('show');
                $("#view_appointment_id").val(obj.appointment_id);
                $("#view_firstname").val(obj.firstname);
                $("#view_lastname").val(obj.lastname);
                $("#view_gender").val(obj.gender);
                $("#view_age").val(obj.age);
                $("#view_contact").val(obj.contact);
                $("#view_appointment_date").val(obj.appointment_date);
                $("#view_appointment_time").val(obj.appointment_time);
                $("#view_service").val(obj.service);
                // console.log(res);
            }
        })
    })

    // GET UPDATE
    $(document).on('click', '#get_update', function(e) {
        var appointment_id = $(this).data('id');
        $('#update_appointment_id').val(appointment_id);
        $('#update_modal').modal('show');
    })

    // UPDATE STATUS ONCHANGE
    $(document).on('change', '#update_status', function(e) {
        e.preventDefault();
        if ($('#update_status').val() == 'CANCELLED') {
            $('.cancelled_cont').removeClass('d-none');
            $('#update_reason').prop('required', true);
            $('.completed_cont').addClass('d-none');
            $('#update_description').prop('required', false);
            $('#update_price').prop('required', false);
        } else {
            $('.cancelled_cont').addClass('d-none');
            $('#update_reason').prop('required', false);
            $('.completed_cont').removeClass('d-none');
            $('#update_description').prop('required', true);
            $('#update_price').prop('required', true);
        }
    })

    // SUBMIT UPDATE
    $(document).on('submit', '#update', function(e) {
        e.preventDefault();

        var form = new FormData(this);
        form.append('update_appointment', true);

        $.ajax({
            type: "POST",
            url: "./functions/confirmed-appointment.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#update_btn').prop('disabled', true);
                $('#update_btn').text('Processing...');
            },
            complete: function() {
                $('#update_btn').prop('disabled', false);
                $('#update_btn').text('Update');
            },
            success: function(response) {
                if (response.includes('success')) {
                    localStorage.setItem('status', 'updated');
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Something went wrong!'
                    });
                }
                console.log(response);
            }
        })
    })
});
</script>
<?php include './components/component-bottom.php'; ?>