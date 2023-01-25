<?php 
include './components/header.php';
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
            <form id="forgot_pass_form" class="p-5 bg-white">


                <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-1 mt-2">FORGOT PASSWORD</p>
                <!-- Email input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example1">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-dark btn-block w-100 mb-3" name="forgot_btn" id="forgot_btn">RESET PASSWORD</button>
            </form>
        </div>
    </div>

</section>

<script>
// SUBMIT FORGOT PASS
$('#forgot_pass_form').on('submit', function(e) {
    e.preventDefault();

    var form = new FormData(this);
    form.append('forgot_pass', true);

    $.ajax({
        type: "POST",
        url: "./functions/forgot-password.php",
        data: form,
        dataType: 'text',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#forgot_btn').prop('disabled', true);
            $('#forgot_btn').text('Processing...');
        },
        complete: function() {
            $('#forgot_btn').prop('disabled', false);
            $('#forgot_btn').text('RESET PASSWORD');
        },
        success: function(response) {
            if (response.includes('success')) {
                location.href = 'forgot-password-verification.php';
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
})
</script>

<?php include './components/bottom.php'; ?>