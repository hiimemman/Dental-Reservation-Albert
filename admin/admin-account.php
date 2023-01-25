<?php include './components/head_css.php'; ?>

<?php include './components/component-top.php'; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Admin/Dentist Account</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Admin/Dentist Account</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- INSERT MODAL -->
    <div class="modal fade" id="insert_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD ADMIN/DENTIST</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="insert">
                        <div class="mb-3">
                            <label for="add_firstname" class="col-form-label">Firstname</label>
                            <input type="text" class="form-control" id="add_firstname" name="add_firstname" required>
                            <span class="text-danger error error_add_firstname"
                                style="font-size: 14px; font-weight: 500;"></span>
                        </div>
                        <div class="mb-3">
                            <label for="add_lastname" class="col-form-label">Lastname</label>
                            <input type="text" class="form-control" id="add_lastname" name="add_lastname" required>
                            <span class="text-danger error error_add_lastname"
                                style="font-size: 14px; font-weight: 500;"></span>
                        </div>
                        <div class="mb-3">
                            <label for="add_username" class="col-form-label">Username</label>
                            <input type="text" class="form-control" id="add_username" name="add_username" required>
                        </div>
                        <div class="mb-3">
                            <label for="add_password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="add_password" name="add_password" required>
                            <span class="text-danger error error_add_password"
                                style="font-size: 14px; font-weight: 500;"></span>
                        </div>
                        <div class="mb-3">
                            <label for="">Role</label>
                            <select class="form-select" aria-label="Default select example" id="add_role"
                                name="add_role">
                                <option selected value="">Select role</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="DENTIST">DENTIST</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="insert" class="btn btn-success" id="insert_btn">ADD</button>
                </div>
            </div>
        </div>
    </div> <!-- INSERT MODAL END -->

    <!-- DELETE MODAL -->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE ADMIN/DENTIST</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="delete">
                        <div class="mb-3 d-none">
                            <label for="delete_admin_id" class="col-form-label">Admin ID</label>
                            <input type="text" class="form-control" id="delete_admin_id" name="delete_admin_id"
                                required>
                        </div>
                    </form>
                    <span>Are you sure you want to delete this account?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div> <!-- DELETE MODAL END -->

    <section>

        <div class="row">
            <div class="col-md-12 d-flex p-0">
                <?php 
                if($_SESSION['role'] == 'ADMIN') {
                    ?>
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                    data-bs-target="#insert_modal"><i class="bi bi-plus-circle-fill"></i></button>
                    <?php
                }
                ?>
            </div>
            <div class="card p-3">
                <div class="table-responsive">
                    <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>
                                <!-- <th>Profile Image</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
$(window).on('load', function(e) {
    if (localStorage.getItem('status') == 'delete') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Account deleted successfully',
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
    var dataTable = $('#tableData').DataTable({
        "serverSide": true,
        "paging": true,
        "pagingType": "simple",
        "scrollX": true,
        "sScrollXInner": "100%",
        "ajax": {
            url: "./tables/admin-account.php",
            type: "post"
        },
        "order": [
            [4, 'asc']
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
    });

    setInterval(function() {
        dataTable.ajax.reload(null, false);
    }, 10000);

    // VALIDATIONS
    var $regexname = /^([A-Za-z\s]+)$/;
    var $regexpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    $('#add_firstname').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexname)) {
            $('.error_add_firstname').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
            $('#add_firstname').addClass('border-danger');
        } else {
            $('.error_add_firstname').text('');
            $('#add_firstname').removeClass('border-danger');
        }
    })

    $('#add_lastname').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexname)) {
            $('.error_add_lastname').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
            $('#add_lastname').addClass('border-danger');
        } else {
            $('.error_add_lastname').text('');
            $('#add_lastname').removeClass('border-danger');
        }
    })

    $('#add_password').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexpass)) {
            $('.error_add_password').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
            $('#add_password').addClass('border-danger');
        } else {
            $('.error_add_password').text('');
            $('#add_password').removeClass('border-danger');
        }
    })

    // GET DELETE
    $(document).on('click', '#get_delete', function(e) {
        e.preventDefault();
        <?php
        if($_SESSION['role'] != 'ADMIN') {
            ?>
            Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    text: 'You are not allowed to delete account!',
                    confirmButtonColor: '#6eada7',
                })
            <?php
        } else {
            ?>
            var admin_id = $(this).data('id');
            $('#delete_admin_id').val(admin_id)
            $('#delete_modal').modal('show');
            <?php
        }
        ?>
    })

    // SUBMIT INSERT
    $('#insert').on('submit', function(e) {
        e.preventDefault();
        var form = new FormData(this);
        form.append('insert', true);

        $.ajax({
            type: "POST",
            url: "./functions/admin-account.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#insert_btn').prop('disabled', true);
                $('#insert_btn').text('Processing');
            },
            complete: function() {
                $('#insert_btn').prop('disabled', false);
                $('#insert_btn').text('ADD');
            },
            success: function(response) {
                if (response.includes('success')) {
                    localStorage.setItem('status', 'insert');
                    location.reload();
                } else if (response.includes('username exist')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: 'Username already used!',
                        confirmButtonColor: '#6eada7',
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: 'Something went wrong!',
                        confirmButtonColor: '#6eada7',
                    })
                }

                console.log(response);
            }
        })
    })

    // SUBMIT DELETE
    $('#delete').on('submit', function(e) {
        e.preventDefault();
        var form = new FormData(this);
        form.append('delete', true);

        $.ajax({
            type: "POST",
            url: "./functions/admin-account.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#preloader').show();
            },
            success: function(response) {
                if (response.includes('success')) {
                    localStorage.setItem('status', 'delete');
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: 'Something went wrong!',
                        confirmButtonColor: '#6eada7',
                    })
                }

                console.log(response);
            }
        })
    })
});
</script>
<?php include './components/component-bottom.php'; ?>