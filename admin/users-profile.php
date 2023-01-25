<?php 
include './components/head_css.php';
include './components/component-top.php'; 
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <?php
    $admin_id = $_SESSION['admin_id'];

    $get_account = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE admin_id = $admin_id");

    foreach($get_account as $row) {
    ?>
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile_image/<?= $row['profile_image'] ?>" alt="Profile" class="rounded-circle">
              <h2><?= $row['firstname'] . ' ' . $row['lastname'] ?></h2>
              <h3><?= $row['role'] ?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile_image/<?= $row['profile_image'] ?>" alt="Profile">
                        <div class="pt-2 d-flex flex-column flex-sm-row gap-1">
                            <form id="update_image">
                              <input type="hidden" name="old_profile_pic" id="old_profile_pic" class="form-control" value="<?= $row['profile_image'] ?>">
                              <input type="hidden" name="admin_id" id="admin_id" class="form-control" value="<?= $admin_id ?>">
                              <input class="form-control w-100 flex-grow-1" type="file" id="profile_image" name="profile_image" accept=".jpg, .jpeg, .png" required>
                            </form>
                            <div class="w-100 d-flex gap-1 justify-content-center justify-content-sm-start">
                              <button type="submit" form="update_image" class="btn btn-primary"><i class="bi bi-upload"></i></button>
                              <?php
                              if($row['profile_image'] != 'profile.png') {
                              ?>
                              <button type="button" id="remove_profile_image" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                      </div>
                    </div>

                    <form id="update_account">
                      <!-- ROLE -->
                      <div class="row mb-3 d-none">
                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Role</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="role" type="text" class="form-control" id="role" value="<?= $row['role'] ?>">
                        </div>
                      </div> <!-- END ROLE -->

                      <!-- FIRSTNAME -->
                      <div class="row mb-3">
                        <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Firstname</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="firstname" type="text" class="form-control" id="firstname" value="<?= $row['firstname'] ?>">
                        </div>
                      </div> <!-- END FIRSTNAME -->

                      <!-- LASTNAME -->
                      <div class="row mb-3">
                        <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Lastname</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="lastname" type="text" class="form-control" id="lastname" value="<?= $row['lastname'] ?>">
                        </div>
                      </div> <!-- END LASTNAME -->

                      <!-- USERNAME -->
                      <div class="row mb-3">
                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="username" type="text" class="form-control" id="username" value="<?= $row['username'] ?>">
                        </div>
                      </div> <!-- END USERNAME -->

                      <!-- OLD PASSWORD -->
                      <div class="row mb-3">
                        <label for="old_pass" class="col-md-4 col-lg-3 col-form-label">Old Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="old_pass" type="password" class="form-control" id="old_pass" value="">
                        </div>
                      </div> <!-- END OLD PASSWORD -->

                      <!-- NEW PASSWORD -->
                      <div class="row mb-3">
                        <label for="new_pass" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="new_pass" type="password" class="form-control" id="new_pass" value="">
                          <span class="text-danger error error_new_pass"
                            style="font-size: 14px; font-weight: 500;"></span>
                        </div> 
                      </div> <!-- END NEW PASSWORD -->

                      <!-- CONFIRM PASSWORD -->
                      <div class="row mb-3">
                        <label for="confirm_pass" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="confirm_pass" type="password" class="form-control" id="confirm_pass" value="">
                          <span class="text-danger error error_confirm_pass"
                            style="font-size: 14px; font-weight: 500;"></span>
                        </div>
                      </div> <!-- END CONFIRM PASSWORD -->

                      <!-- SUBMIT BUTTON -->
                      <div class="text-center">
                        <button type="submit" id="update_acc_btn" class="btn btn-primary">Save Changes</button>
                      </div> <!-- END SUBMIT BUTTON -->
                    </form>

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <?php
    }
    ?>

  </main><!-- End #main -->

<script>
  // ALERTS
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

  $(document).ready(function() {
    // VALIDATIONS
    var $regexpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    $('#new_pass').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexpass)) {
            $('.error_new_pass').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
            $('#new_pass').addClass('border-danger');
        } else {
            $('.error_new_pass').text('');
            $('#new_pass').removeClass('border-danger');
        }
    })

    $('#confirm_pass').on('keypress keydown keyup', function() {
        if (!$.trim($(this).val()).match($regexpass)) {
            $('.error_confirm_pass').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
            $('#confirm_pass').addClass('border-danger');
        } else {
            $('.error_confirm_pass').text('');
            $('#confirm_pass').removeClass('border-danger');
        }
    })

    // UPDATE IMAGE
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
                  url: "./functions/users-profile.php",
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
                var admin_id = $('#admin_id').val();

                $.ajax({
                    type: "POST",
                    url: "./functions/users-profile.php",
                    data: {
                        'delete_image': true,
                        'admin_id': admin_id,
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
    $('#update_account').on('submit', function(e) {
        e.preventDefault();

        var get_form = $('#update_account')[0];

        if ($('#new_pass').val().length != 0) {
            if ($('#confirm_pass').val().length == 0) {
                $('#confirm_pass').prop('required', true);
            } else {
                if ($('#new_pass').val() != $('#confirm_pass').val()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Password confirmation does not match!',
                    });
                } else {
                    var admin_id = $('#admin_id').val();
                    var form = new FormData(get_form);
                    form.append('update_profile_details', true);
                    form.append('admin_id', admin_id);

                    $.ajax({
                        url: "./functions/users-profile.php",
                        type: "POST",
                        data: form,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('#update_acc_btn').prop('disabled', true);
                            $('#update_acc_btn').text('Processing...');
                        },
                        complete: function() {
                            $('#update_acc_btn').prop('disabled', false);
                            $('#update_acc_btn').text('Save Chhanges');
                        },
                        success: function(response) {
                            if (response.includes('wrong password')) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed',
                                    text: 'Incorrect password!',
                                });
                            } else if (response.includes('username already used')) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed',
                                    text: 'Username already used!',
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
            $('#confirm_pass').prop('required', false);
            var admin_id = $('#admin_id').val();
            var form = new FormData(get_form);
            form.append('update_profile_details', true);
            form.append('admin_id', admin_id);

            $.ajax({
                url: "./functions/users-profile.php",
                type: "POST",
                data: form,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#update_acc_btn').prop('disabled', true);
                    $('#update_acc_btn').text('Processing...');
                },
                complete: function() {
                    $('#update_acc_btn').prop('disabled', false);
                    $('#update_acc_btn').text('Save Changes');
                },
                success: function(response) {
                    if (response.includes('wrong password')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Incorrect password!',
                        });
                    } else if (response.includes('username already used')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Username already used!',
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
  })
</script>

<?php include './components/component-bottom.php'; ?>