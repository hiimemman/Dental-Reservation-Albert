<?php 
include './database/config.php'; 
include './components/header.php'; 

if(!isset($_SESSION['user_id'])) {
    ?>
<script>
location.href = 'login.php';
</script>
<?php
} else {
    $user_id = $_SESSION['user_id'];
    $get_account = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id = $user_id");

    $row = mysqli_fetch_array($get_account);
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

.custom_btn {
    background: #6eada7 !important;
    border-color: #6eada7 !important;
}

.custom_btn:hover {
    background: #2a6861 !important;
    border-color: #2a6861 !important;
}
</style>

<section class="mt-5 mx-4">

    <!-- Account -->
    <div class="row d-flex justify-content-center">
        <div class="card col-sm-10 col-md-8 col-lg-6">
            <div class="card-body">
                <h4 class="fw-bold text-uppercase">Profile Details</h4>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <div class="d-flex flex-column gap-2">
                        <img style="border: 1px solid #6eada7;"
                            src="./assets/img/profile_image/<?= $row['profile_image'] ?>" alt="user-avatar"
                            class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <?php
                            if($row['profile_image'] != 'profile.png') {
                            ?>
                        <button type="button" class="btn btn-danger btn-sm" id="remove_profile_image">REMOVE</button>
                        <?php
                            }
                            ?>
                    </div>
                    <div class="button-wrapper">
                        <form id="update_image">
                            <div class="d-flex flex-column flex-sm-row gap-2">
                                <input type="hidden" name="user_id" id="user_id" value="<?= $user_id; ?>">
                                <input type="hidden" name="old_profile_pic" id="old_profile_pic"
                                    value="<?= $row['profile_image']; ?>">
                                <input class="form-control form-control-sm w-100 w-sm-75" type="file" id="profile_image"
                                    name="profile_image" required>
                                <button type="submit" class="btn btn-primary btn-sm custom_btn">UPLOAD</button>
                            </div>
                        </form>

                        <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Max size of 10MB</p>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <form id="formAccountSettings">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstName" name="firstName"
                                value="<?= $row['firstname'] ?>" autofocus required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" name="lastName" id="lastName"
                                value="<?= $row['lastname'] ?>" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email" value="<?= $row['email'] ?>"
                                placeholder="john.doe@example.com" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">+63</span>
                                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                    placeholder="9992736514" value="<?= $row['contact'] ?>" required />
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Birth Date</label>
                            <input class="form-control" type="date" id="bday" name="bday"
                                value="<?= $row['birthdate'] ?>" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Old Password</label>
                            <input class="form-control" type="password" id="old_pass" name="old_pass" required />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">New Password</label>
                            <input class="form-control" type="password" id="new_pass" name="new_pass"
                                placeholder="Ignore if you'll not change password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Confirm Password</label>
                            <input class="form-control" type="password" id="c_pass" name="c_pass"
                                placeholder="Ignore if you'll not change password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2 custom_btn" id="form_update_btn">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Account -->

</section>


<script>
$(window).on('load', function(e) {
    if (localStorage.getItem('status') == 'image_updated') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Image profile updated successfully!',
        });
        localStorage.removeItem('status');
    } else if (localStorage.getItem('status') == 'updated_account') {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Account updated successfully!',
        });
        localStorage.removeItem('status');
    } else if (localStorage.getItem('status') == 'delete_image') {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Profile image deleted successfully!',
        });
        localStorage.removeItem('status');
    }
})

function myFunction() {
    var x = document.getElementById("pass1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    var y = document.getElementById("pass2");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();

if (dd < 10) {
    dd = '0' + dd;
}

if (mm < 10) {
    mm = '0' + mm;
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("bday").setAttribute("max", today);

// Update Image
$('#update_image').on('submit', function(e) {
    e.preventDefault();

    var get_form = $('#update_image')[0];

    var image_ext = $('#profile_image').val().split('.').pop().toLowerCase();

    if ($.inArray(image_ext, ['png', 'jpg', 'jpeg']) == -1) {
        Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'File not supported!'
        });
    } else {
        var imageSize = $('#profile_image')[0].files[0].size;

        if (imageSize > 10485760) {
            Swal.fire({
                icon: 'error',
                title: 'Failed',
                text: 'File too large!'
            });
        } else {
            var form = new FormData(get_form);
            form.append('update_profile_picture', true);
            $.ajax({
                url: "./functions/profile.php",
                type: "POST",
                data: form,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.includes('success')) {
                        localStorage.setItem('status', 'image_updated');
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Something went wrong!',
                        });
                    }
                    console.log(response);
                }
            })
        }
    }
})

// REMOVE IMAGE
$('#remove_profile_image').on('click', function(e) {
    Swal.fire({
        title: 'Are you sure you want to remove your profile image?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
    }).then((result) => {
        if (result.isConfirmed) {
            var old_image = $('#old_profile_pic').val();
            var user_id = $('#user_id').val();

            $.ajax({
                type: "POST",
                url: "./functions/profile.php",
                data: {
                    'delete_image': true,
                    'user_id': user_id,
                    'old_profile': old_image,
                },
                success: function(response) {
                    if(response.includes('success')) {
                        localStorage.setItem('status', 'delete_image');
                        location.reload();
                    }
                    console.log(response);
                }
            })
        }
    })
})

// UPDATE ACCOUNT
$('#formAccountSettings').on('submit', function(e) {
    e.preventDefault();

    var get_form = $('#formAccountSettings')[0];

    if ($('#new_pass').val().length != 0) {
        if ($('#c_pass').val().length == 0) {
            $('#c_pass').prop('required', true);
        } else {
            if ($('#new_pass').val() != $('#c_pass').val()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Password confirmation does not match!',
                });
            } else {
                var user_id = $('#user_id').val();
                var form = new FormData(get_form);
                form.append('update_profile_details', true);
                form.append('user_id', user_id);

                $.ajax({
                    url: "./functions/profile.php",
                    type: "POST",
                    data: form,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#form_update_btn').prop('disabled', true);
                        $('#form_update_btn').text('Processing...');
                    },
                    complete: function() {
                        $('#form_update_btn').prop('disabled', false);
                        $('#form_update_btn').text('Save changes');
                    },
                    success: function(response) {
                        if (response.includes('wrong password')) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: 'Incorrect password!',
                            });
                        } else if (response.includes('email already used')) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: 'Email already used!',
                            });
                        } else if (response.includes('success')) {
                            localStorage.setItem('status', 'updated_account');
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: 'Something went wrong!',
                            });
                        }
                        console.log(response);
                    }
                })
            }
        }
    } else {
        $('#c_pass').prop('required', false);
        var user_id = $('#user_id').val();
        var form = new FormData(get_form);
        form.append('update_profile_details', true);
        form.append('user_id', user_id);

        $.ajax({
            url: "./functions/profile.php",
            type: "POST",
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#form_update_btn').prop('disabled', true);
                $('#form_update_btn').text('Processing...');
            },
            complete: function() {
                $('#form_update_btn').prop('disabled', false);
                $('#form_update_btn').text('Save changes');
            },
            success: function(response) {
                if (response.includes('wrong password')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Incorrect password!',
                    });
                } else if (response.includes('email already used')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Email already used!',
                    });
                } else if (response.includes('success')) {
                    localStorage.setItem('status', 'updated_account');
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Something went wrong!',
                    });
                }
                console.log(response);
            }
        })
    }
})
</script>
<?php include './components/bottom.php'; ?>