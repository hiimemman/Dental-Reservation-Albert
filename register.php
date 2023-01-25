<?php 
include './components/header.php'; 

if(isset($_SESSION['user_id'])) {
    ?>
    <script>
        location.href = 'index.php';
    </script>
    <?php
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
</style>

<section class="mt-5 mx-4">

    <!--APPOINTMENT FORM-->
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
            <form id="register" class="p-5 bg-white">

                <p class="text-center h1 fw-bold mb-1 mx-1 mx-md-1 mt-2">SIGN UP</p>


                <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" required />

                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" required />

                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Birthday</label>
                        <input type="date" name="bday" id="bday" class="form-control"  max="2022-12-31" required />

                    </div>
                </div>


                <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Contact</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+63</span>
                            <input type="tel" class="form-control" placeholder="Phone number" aria-label="Username"
                                minlength="10" maxlength="10" pattern="9\d{9}"
                            title="Invalid format! Must start with 9 and has 10 numbers."
                                aria-describedby="basic-addon1" name="contact" id="contact" required>
                        </div>
                        
                    </div>
                </div>


                <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Email </label>
                        <input type="email" size="32" minlength="3" maxlength="64" name="email" id="email"
                            class="form-control" required />

                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Password </label>
                        <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            type="password" name="pass1" id="pass1" class="form-control" required />
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-1">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Repeat Password </label>
                        <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            type="password" name="pass2" id="pass2" class="form-control" required />
                        <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>

                </div>
                <div class="form-check">
                    <label class="form-check-label" for="form2Example3"></label>
                    <input required class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required/>
                    I agree all statements in&nbsp;<a href="terms.php" target="_blank">Terms of Service</a>

                </div>

                <div class="d-flex justify-content-center mx-1 mb-1 mb-lg-1 mt-3">
                    <button type="submit" name="register" id="register_btn"
                        class="btn btn-dark btn-lg w-100">REGISTER</button>
                </div>
                <div class="text-center">
                    <a class="small" href="login.html">Already have an account? Login!</a>

            </form>



            </form>
        </div>
    </div>

</section>


<script>
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



// SUBMIT REGISTER
$('#register').on('submit', function(e) {
    e.preventDefault();

    if($('#pass1').val() != $('#pass2').val()) {
        Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'The password confirmation does not match!'
        })
    } else {
        var form = new FormData(this);
        form.append('register', true);

        $.ajax({
            type: "POST",
            url: "./functions/register.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#register_btn').prop('disabled', true);
                $('#register_btn').text('Processing...');
            },
            complete: function() {
                $('#register_btn').prop('disabled', false);
                $('#register_btn').text('REGISTER');
            },
            success: function(response) {
                if(response.includes('verification.php')) {
                    location.href = response;
                }
                 else if(response.includes('email already used')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Email already used! Please try another email!'
                    });
                } 
                else {
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