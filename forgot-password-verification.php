<?php
include './components/header.php';

if(!isset($_SESSION['forgot_email'])) {
    ?>
    <script>
        location.href = 'forgot-password.php';
    </script>
    <?php
} else {
    $email = $_SESSION['forgot_email'];
    $otp = $_SESSION['otp'];
    $timestamp = $_SERVER['REQUEST_TIME'];
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
            <form id="verification" class="p-5 bg-white">


                <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-1 mt-2">VERIFICATION</p>
                <!-- Email input -->
                <div class="form-outline mb-1">
                    <label class="form-label" for="form2Example1">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example1">Verification Code</label>
                    <input type="tel" id="verification_code" name="verification_code" class="form-control" minlength="6" maxlength="6" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" required />
                    <!--<label class="form-label" for="form2Example2">Password</label>-->
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-dark btn-block w-100 mb-3" name="verify_button" id="verify_button">VERIFY</button>
            </form>
        </div>
    </div>

</section>

<script>

    // SUBMIT VERIFICATION
    $('#verification').on('submit', function(e) {
        e.preventDefault();

        var form = new FormData(this);
        form.append('verify', true);

        $.ajax({
            type: "POST",
            url: "./functions/forgot-password-verification.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#verify_button').prop('disabled', true);
                $('#verify_button').text('Processing...');
            },
            complete: function() {
                $('#verify_button').prop('disabled', false);
                $('#verify_button').text('VERIFY');
            },
            success: function(response) {
                if(response.includes('success')) {
                    location.href = 'change-password.php';
                } else if(response.includes('invalid email')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Invalid email!'
                    });
                } else if(response.includes('expired')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'OTP expired! Please try again.',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = 'forgot-password.php';
                        }
                    })
                } else if(response.includes('invalid otp')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Invalid OTP code!'
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
    })
</script>

<?php include './components/bottom.php'; ?>