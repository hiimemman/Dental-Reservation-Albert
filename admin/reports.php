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

    .custom_btn:hover, div.dt-button:hover {
        background: #2a6861 !important;
        border-color: #2a6861 !important;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Income Report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Income Report</li>
            <li class="breadcrumb-item"><a href="cancelled.php">Cancelled Report</a></li>
                  <!--  <li class="breadcrumb-item "><a href="services.php">Services Report</a></li>-->
                <li class="breadcrumb-item "><a href="patient.php">Patient Record</a></li>
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
                            <tr>
                                <th>Appointment ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Service</th>
                                <th>Date Completed</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th id="total_order"></th>
                            </tr>
                        </tfoot>
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
            "processing": true,
            "serverSide": true,
            "paging": true,
            "pagingType": "simple",
            "scrollX": true,
            "sScrollXInner": "100%",
            "ajax": {
                url: "./tables/reports.php",
                type: "post",
                data: {
                    is_date_search: is_date_search,
                    start_date: start_date,
                    end_date: end_date
                },
            },
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
                    {extend: 'pdf',  title: ' ', messageBottom: '\n\n\n\n\nGenerated by: <?= $firstname . ' ' . $lastname ?>', footer: true,
                    
                
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
                        image: 'data:image/png;base64,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MgTru0DrWmIXnUTh54wLL7xQHOwBRbqyslL41QfFQBuMeMcdd5CXaY7v1auX2PGwbds2FEix84c/oKpIS0sTO16c6/sjjzwiPDyceuqp6FOTV25urhZP46ehGk6E48CBA8Lby5133klextiiY462m4o6X4LV1T3wwANi34Nx6GfD9b26ulqrpeRNBDNmzBCuXrQPOwPWd+MXbeiyCD/HNJ2+Hzx4UJuqwZj4Tp6/N7w8MoD1XWD8usd0SoCdO3d+VZ9ffvmFvB566CFxpJepU6eSl8a3334rQngZ7B2sbZrjtee57du3F1se0Io0jqlwqO+QcvX5PjjrrLNwIRLtOQN8S0tLxcFmOBGOL7/8Unh7sb988jLFKnx2drbpWHtJw/Ud2UME8oJrF6n20EMdO3YUrl46dOggjvQQsL4bh+HSQ38jqFFEHvUip4prOn2Hu8/vkpzoe8PLIwNY3wXaAHBwzTXXaEXuyJEjaKMJby9y5oAxY8YIJy9o0cuR3ZJNmzYZP3dctmwZ+Zrm+LKyMpsvJDdu3Biwvv/+++/C1TFWlRbhUzhWr15tHLMsv55vLH0HNtMtgIbr++OPPy4COQPN2L1794qDG6DvFRUVxs+XjE346dOnCz+FLVu2kG+T6juwmrCBcKLvDS+PDGB9F6DsGUehXHHFFePHj09LS0MzYfLkyddff73wUJAfrKNha5zJ77zzzkObIikpCeePi4v74IMPzjjjDOHn5YYbbpDvLa1yvPGzIAIxhG/A+t62bVvh6pguXbqIg83QhONf//oXffaJkrl27dqXXnrJmMgotz4v3wr78J07dxauBhqo71AW4330CXKCOL4B+g6MT7RReTzzzDPr16/PysrasGHDyy+/rI0/Af/5z3/E8U2v70VFRTbT4zjR94aXRwawvtfx4osvijzimFtuuUV9LGjfZrRC7Xha5fj58+eL/fq888478A1M33fv3m18NuqTk08+2XTKWUITDifIj26AMbYPPfQQrkXj559/tgqv6js0wuopTQP13fi7TkBtJ443E8dff/0VwqeSmpoqQtdnz549AdQuqvBpt+myyy4TP6lA0ywHpu8APydcDeDkFMb+9jW8PDKs73UUFxdrxdselLGUlBRxsBerhrYVb775pjjSg1WORxPYVKoSExPhG5i+G0dSt2/fHvHXuOeee4S3lx9++IHO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WYate/fuGzZsEH4N4yllcf3KysrrrrvuMe/ydQzTDLC+M43DfzyLkX7g4Y033qCl2tS5loITmnT33HPPHThw4Icffti3b9/TTjvtlFNO0ZYnC4xqZXH98vJy/JBxajCGaTpY35nGQZt3ELp20kknXXPNNWLfs0gANPTOO+/s3LnzpEmTYmJievToMWPGDPI9duzY6NGju3TpggCPPPKItgxClvVi9sDGd6xneftNmza99957/fr1E65eaCWH//73v+pEb/Hx8bSOszxPVVXVTz/9dN999yFuL7zwQmZm5uuvv07L482fPx8b2mS8gwcP7tOnDwSdfj01NbW0tPThhx+migQucu23oqKiTz75pH379ojDs88+a1wylGEaAus70zho+l5WVnbqqafe7l0nfenSpTRf9I033kirTNDEubTEKMQd6oldtPo7deoEEcT2Z599RsfaL2Zv70vTt1JnAj9NjhLoNWJCk7mrwAUqv9+zpjniRqsd4FfatGlzwQUXIHoXXnghXOCblpaGDVojlICaw4VW5pOTx5aUlNDyxYgbmvDQevju3buXZqBFgrRr1w41CrCZ2pdh/IX1nWkcoO9osE/x8Pvvv6NNesoppyxYsABelZWVF110EXZlO3f9+vW0qgnp+4gRI7A9YMAAmpG4oKAAiozaAgoIF2yfbrGYvb0vdklh//Wvf0GvaWlTyZEjR+B1h2e5ZxtGjhyJYJD44uJi7FZUVPTt2xcugAJA9HHhcmZzWmeHVsNQJwc3Pp/p2bMnXORqSqgYzjvvvPPPPx8hyYVhGgjrO9M4QN+hVirPPvssGr/wWrZsGXaffPJJCknQ+m2k7/fccw+2c3JyyAtAiw8dOlRVVQW9hpfVYvb2vtgmhdUWrSdoCWxqSttw9913I5i6QgsiRi9jaZcW4Jdzc15zzTVyJSYbfS8tLUWFd+211+5RQBIhjM81WBjGIazvTONAz2eyPUA60SRHq5ZW9aTF77UF6WfOnAlH0vdLL70UzXly15hgu5i9vS+2SWHXrFlDXioO2++I21lnnSV2vFx//fU4lrZLSkrOPPPM//73v9hGLwHutMQosNF3ql1MsV+4imGcw/rONA7a83fQpUuXP/7xj2jtzps3D7IlVY8YPnw4HEnfb7zxRoQsKysjLxV6BWq1mL29L7ZVhTVy5513ohLKyMgQ+17QWk9K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'
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
                                    
                }, title: 'Income Report', messageBottom: '<p style=" margin-top: 40px; text-decoration:overline;">\n\n\nGenerated by: <?= $firstname . ' ' . $lastname ?></p>', footer: true}
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