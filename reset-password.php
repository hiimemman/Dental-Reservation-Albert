<?php include './components/header.php'; ?>

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

<section class="mt-5">

    <!--APPOINTMENT FORM-->
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-md-4">
            <form action="" method="POST" class="p-5 bg-white">

                <h2>Forgot your password?</h2>
                <p>Change your password in three easy steps. This will help you to secure your password!</p>
                <ol class="list-unstyled">
                    <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
                    <li><span class="text-primary text-medium">2. </span>Our system will send you a code</li>
                    <li><span class="text-primary text-medium">3. </span>Enter code to reset your password</li>
                </ol>


                <div class="d-flex flex-row align-items-center mb-1">
                    <div class="form-group w-100">
                        <label for="email-for-pass">Enter your Email Address</label>
                        <input class="form-control" type="text" id="email-for-pass" name="email-for-pass">
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center mb-1">
                    <button class="btn btn-success  w-100 m-1" type="submit" name="reset" id="reset">Get New
                        Password</button>
                    <button class="btn btn-dark  w-100 m-1" type="submit" name="cancel" id="cancel"
                        href="login.html">Back to Login</button>
                </div>



            </form>
        </div>
    </div>

</section>

<?php include './components/bottom.php'; ?>