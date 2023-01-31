<?php
session_start();

if(isset($_SESSION['admin_id'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    
        <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />


</head>
<!-- style -->
<style>
body {
    background: url(./assets/img/dental.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    height: 100%;
    font-family: 'Poppins', sans-serif;
}

.dark {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.13);
}

.my-login-page .brand {
    width: 90px;
    height: 90px;
    overflow: hidden;
    border-radius: 50%;
    margin: 40px auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
    position: relative;
    z-index: 1;
}

.my-login-page .brand img {
    width: 100%;
}

.my-login-page .card-wrapper {
    width: 400px;
}

.my-login-page .card {
    width: 400px;
    max-width: 90%;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-color: transparent;
    box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
}

.my-login-page .card.fat {
    padding: 10px;
}

.my-login-page .card .card-title {
    margin-bottom: 30px;
}


.my-login-page .form-group label {
    width: 100%;
}

.my-login-page .btn.btn-block {
    padding: 12px 10px;
}

.my-login-page .footer {
    margin: 40px 0;
    color: #888;
    text-align: center;
}

.password-container {
    position: relative;
}

.password-container input[type="password"],
.password-container input[type="text"] {
    width: 100%;
    padding: 12px 65px 12px 12px;
    box-sizing: border-box;
}

.password-container #eye,
.password-container #eye1 {
    position: absolute;
    top: 18%;
    right: 1.7%;
    cursor: pointer;
    background-color: #9cdad7;
    color: #fff;
    padding: 0 3px;
    padding-left: 0.238rem;
    border-radius: 2px;
}

.password-container #eye:hover,
.password-container #eye1:hover {
    background-color: #6eada7;
}

@media screen and (max-width: 425px) {
    .my-login-page .card-wrapper {
        width: 90%;
        margin: 0 auto;
    }
}

@media screen and (max-width: 320px) {
    .my-login-page .card.fat {
        padding: 0;
    }

    .my-login-page .card.fat .card-body {
        padding: 15px;
    }
}

.save {
    background-color: #9cdad7 !important;
    border: 1px solid #9cdad7 !important;
}

.save:hover {
    background-color: #6eada7 !important;
    border: 1px solid #6eada7 !important;
}

.data_eye {
    background-color: #9cdad7 !important;
    border: 1px solid #9cdad7 !important;
}

.data_eye:hover {
    background-color: #6eada7 !important;
    border: 1px solid #6eada7 !important;
    color: #6eada7 !important;
}
</style>
<!-- end style -->

<body class="my-login-page">
    <div class="dark"></div>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">

                <div class="card-wrapper mt-5">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title font-weight-bolder text-uppercase">Login</h4>
                            <form id="login_form">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" value=""
                                        required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password
                                    </label>
                                    <div class="password-container">
                                        <input id="login_password" type="password" class="form-control" name="password"
                                            required>
                                        <span id="eye" class="text-dark" style="background: none;"><i class="fas fa-eye"></i></span>
                                       
                                    </div>
                                </div>

                      
                                <div class="form-group m-0">
                                    <button type="submit"
                                        class="btn btn-primary btn-block save text-dark font-weight-bolder text-uppercase text"
                                        id="login_btn">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(document).ready(function() {
        // SHOW PASSWORD
        const passwordInput = document.querySelector("#login_password")
        const eye = document.querySelector("#eye")

        eye.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                eye.innerHTML = "<i class='fas fa-eye-slash'></i>";
                passwordInput.type = 'text';
            } else {
                eye.innerHTML = "<i class='fas fa-eye'>";
                passwordInput.type = 'password';
            }
        })

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
                    $('#login_btn').text('LOGIN');
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
    })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/my-login.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>