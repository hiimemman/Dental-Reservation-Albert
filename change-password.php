<?php 
include './components/header.php';

if(!isset($_SESSION['change_pass_email'])) {
    ?>
    <script>
    location.href = 'index.php';
    </script>
    <?php
} else {
    unset($_SESSION['forgot_email']);
    unset($_SESSION['otp']);
    unset($_SESSION['time']);

    $email = $_SESSION['change_pass_email'];
}
?>

<style>
body {
    background-image: url('assets/img/dental.jpg');
    background-attachment: fixed;
    background-size: cover;
}
</style>

<section class="mt-5 mx-4">

    <!--APPOINTMENT FORM-->
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <form id="change_pass_form" class="p-5 bg-white">


                <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-1 mt-2">CHANGE PASSWORD</p>
                <!-- Email input -->
                <div class="form-outline mb-1">
                    <label class="form-label" for="form2Example1">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $email ?>" readonly/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example1">New Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="" />
                    <span class="text-danger error error_password"
                            style="font-size: 14px; font-weight: 500;"></span>
                    <!--<label class="form-label" for="form2Example2">Password</label>-->
                </div>
                <div class="form-outline">
                    <label class="form-label" for="form2Example1">Confirm Password</label>
                    <input type="password" id="c_password" name="c_password" class="form-control" value="" />
                    <span class="text-danger error error_c_password"
                            style="font-size: 14px; font-weight: 500;"></span>
                    
                    <!--<label class="form-label" for="form2Example2">Password</label>-->
                </div>
                
                <div class="form-outline my-3">
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-dark btn-block w-100 mb-3" name="change_pass_btn" id="change_pass_btn">SUBMIT</button>


            </form>
        </div>
    </div>

</section>

<script>
function myFunction() {
    var x = document.getElementById("password");
    var y = document.getElementById("c_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}

// VALIDATIONS
var $regexpass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

$('#password').on('keypress keydown keyup', function() {
    if (!$.trim($(this).val()).match($regexpass)) {
        $('.error_password').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
        $('#password').addClass('border-danger');
    } else {
        $('.error_password').text('');
        $('#password').removeClass('border-danger');
    }
})

$('#c_password').on('keypress keydown keyup', function() {
    if (!$.trim($(this).val()).match($regexpass)) {
        $('.error_c_password').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
        $('#c_password').addClass('border-danger');
    } else {
        $('.error_c_password').text('');
        $('#c_password').removeClass('border-danger');
    }
})

// SUBMIT LOGIN
$('#change_pass_form').on('submit', function(e) {
    e.preventDefault();

    if($('#password').val() != $('#c_password').val()) {
        Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'The password confirmation does not match!'
        });
    } else {
        var form = new FormData(this);
        form.append('change_pass', true);

        $.ajax({
            type: "POST",
            url: "./functions/change-password.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#change_pass_btn').prop('disabled', true);
                $('#change_pass_btn').text('Processing...');
            },
            complete: function() {
                $('#change_pass_btn').prop('disabled', false);
                $('#change_pass_btn').text('SUBMIT');
            },
            success: function(response) {
                if (response.includes('success')) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Password updated successfully! You can now login.',
                        showDenyButton: true,
                        confirmButtonText: 'Login',
                        denyButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = 'login.php';
                        } else if (result.isDenied) {
                            location.href = 'index.php';
                        }
                    })
                } else if (response.includes('invalid')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Invalid email!'
                    });
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
    }
})
</script>

<?php include './components/bottom.php'; ?>