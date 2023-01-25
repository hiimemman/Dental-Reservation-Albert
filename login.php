<?php 
include './components/header.php';

if(isset($_SESSION['user_id'])) {
    ?>
    <script>
    location.href = 'index.php';
    </script>
    <?php
} else {
    unset($_SESSION['change_pass_email']);
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
            <form id="login_form" class="p-5 bg-white">


                <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-1 mt-2">SIGN IN</p>
                <!-- Email input -->
                <div class="form-outline mb-1">
                    <label class="form-label" for="form2Example1">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php if (isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <label class="form-label" for="form2Example1">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="<?php if ( isset($_COOKIE["password"])) { echo $_COOKIE["password"];
            } ?>" />
                    <input type="checkbox" onclick="myFunction()"> Show Password
                    <br>
                    <!--<label class="form-label" for="form2Example2">Password</label>-->
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rem" name="rem" <?php if (isset($_COOKIE["email"]) && isset ($_COOKIE["password"])) { echo "checked"; } ?> />
                            <label class="form-check-label" for="rem"> Remember me </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Simple link -->
                        <a href="forgot-password.php" style="color: #393f81;">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-dark btn-block w-100 mb-3" name="login_btn" id="login_btn">SIGN
                    IN</button>

                <!-- Register buttons -->

                <p class="pb-lg-2">Don't have an account? <a href="register.php" style="color: #393f81;">Register
                        here</a></p>


            </form>
        </div>
    </div>

</section>

<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// SUBMIT LOGIN
$('#login_form').on('submit', function(e) {
    e.preventDefault();

    var form = new FormData(this);
    form.append('login', true);

    $.ajax({
        type: "POST",
        url: "./functions/login.php",
        data: form,
        dataType: 'text',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#login_btn').prop('disabled', true);
            $('#login_btn').text('Processing...');
        },
        complete: function() {
            $('#login_btn').prop('disabled', false);
            $('#login_btn').text('SIGN IN');
        },
        success: function(response) {
            if (response.includes('success')) {
                <?php
                    if(isset($_SESSION['link_user'])) {
                    ?>
                location.href = '<?= $_SESSION['link_user'] ?>';
                <?php
                    } else {
                    ?>
                location.href = 'index.php';
                <?php
                    }
                    ?>
            } else if (response.includes('invalid')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Invalid credentials!'
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