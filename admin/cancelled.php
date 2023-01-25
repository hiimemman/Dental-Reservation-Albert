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
        <h1>Cancelled Report</h1>
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
                    <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr  >
                                <th>Appointment ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th style="text-align:center;">Reason</th> 
                                <th>Appointment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE status = 'CANCELLED'");
                            while ($row = mysqli_fetch_array($query)){
                            ?>

                    <tr>
                        <td><?php echo $row['appointment_id'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td style="text-align:center;"><?php echo $row['reason2'] ?><br>  
                        <?php echo $row['reason'] ?>  
                    
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
    fetch_data('no');
            var start = document.getElementById('start_date').value;
            var end = document.getElementById('end_date').value;
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
    function fetch_data(is_date_search, start_date = '', end_date = '') {
        var dataTable = $('#tableData').DataTable({
            "paging": true,
            "pagingType": "simple",
            "scrollX": true,
            "sScrollXInner": "100%",
            drawCallback: function(settings) {
                $('#total_order').html(settings.json.total);
            },
            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            dom: 'Blfrtip',
            buttons: [{
                extend: 'collection',
                text: 'Export',
                footer: true,
                buttons: [
                    {extend: 'excel', 
                     message:function () {
                                    return 'Sales from ' + start_date + ' to ' + end_date;
                }, title: ' ', footer: true},                                       
                    {extend: 'pdf',  title: ' ', messageBottom: '\n\n\n\n\n\nGenerated by: <?=  $firstname . '' . $lastname ?>', footer: true,
                    
                
                customize: function (doc) {
                                var start = document.getElementById('start_date').value;
                                var end = document.getElementById('end_date').value;
                                doc['header']=(function() {
							return {
								columns: [
									{
										alignment: 'left',
										italics: true,
										text: 'dataTables',
										fontSize: 18,
										margin: [10,0]
									},
									{
										alignment: 'right',
										fontSize: 8,
										text: 'Date: ' + start + ' - ' + end
										}
								],
								margin: 20
                             
							}
						});
                    
						doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'center',
                        width: 200,
                        image: 'data:image/png;base64,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'
                        });
                        
						}},
                    
                    
                    
                    {extend: 'print', 
                    
                            customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '12pt')
                        .css( 'font-weight', 'bold')
                        .prepend(
                            '<center><img src="https://cdn.discordapp.com/attachments/1063354792304455690/1063354812407742464/325182532_931184714725661_1675671237146904474_n.png" width="300";></center>'
                           
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' )
                        'eh'
                        
                }, 
                
                 message:function() {
                                    return 'Income from ' + start_date + ' to ' + end_date;
                }, title: 'Cancelled Report', messageBottom: '<p style=" margin-top: 40px; text-decoration:overline;">\n\n\n\n\n\n\n\nGenerated by: <?= $firstname . ' ' . $lastname ?></p>', footer: true}
                ],
            }, ],
        });
    }

    $('.date_submit').click(function() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        if (start_date != '' && end_date != '') {
            if (start_date > end_date) {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Invalid date!'
                });
            } else {
                $('#tableData').DataTable().destroy();
                fetch_data('yes', start_date, end_date);
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'Both date is required!'
            });
        }
    })

    setInterval(function() {
        dataTable.ajax.reload(null, false);
    }, 1000);

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