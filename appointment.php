<?php
include './database/config.php';
include './components/header.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION["link_user"] = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
<script>
location.href = 'login.php';
</script>
<?php
} else {
    $user_id = $_SESSION['user_id'];
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

.form-control:focus {
    box-shadow: none;
}
</style>

<section class="mt-5 mx-4">

    <!--APPOINTMENT FORM-->
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10 col-md-7">
            <form id="appointment_form" class="p-5 bg-white">

                <div>
                    <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4 mt-2">ONLINE APPOINTMENT REQUEST FORM</p>
                </div>

                <input type="hidden" name="user_id" id="user_id" value="<?= $user_id; ?>" class="form-control">
                <div class="row form-group p-1">
                    <div class="col-lg-6 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name"
                            value="<?= $row['firstname'] ?>" required>
                        <span class="text-danger error error_firstname"
                            style="font-size: 14px; font-weight: 500;"></span>
                    </div>
                    <div class="col-lg-6">
                        <label class="font-weight-bold" for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname" class="form-control"
                            value="<?= $row['lastname'] ?>" required>
                        <span class="text-danger error error_lastname"
                            style="font-size: 14px; font-weight: 500;"></span>
                    </div>
                </div>

                <div class="row form-group p-1">
                    <div class="col-lg-6">
                        <label class="font-weight-bold" for="lastname">Age</label>
                        <input type="text" id="age" name="age" class="form-control" value="" minlength="1" maxlength="2"
                            required>
                        <span class="text-danger error error_age" style="font-size: 14px; font-weight: 500;"></span>
                    </div>
                    <div class="col-lg-6 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="firstname">Gender</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                    value="Male" checked>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                    value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row form-group p-1">
                    <div class="col-lg-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">+63</span>
                            <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control"
                                placeholder="9992736514" value="<?=$row['contact']?>" minlength="10" maxlength="10" pattern="9\d{9}"
                            title="Invalid format! Must start with 9 and has 10 numbers."
                                required />
                        </div>
                        <span class="text-danger error error_phoneNumber"
                            style="font-size: 14px; font-weight: 500;"></span>
                    </div>
                    <div class="col-lg-6">
                        <label class="font-weight-bold" for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= $row['email'] ?>"
                            readonly>
                    </div>

                    
                </div>
                <div class="row form-group p-1">
                    <div class="col-lg-6 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="fname">Appointment Date</label>
                        <input type="date" id="date" name="date" id="date" class="form-control" value="" required>
                    </div>

  <div class="col-lg-6 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="fname">Other Request</label>
                         <textarea class="form-control" name = "request"id="exampleFormControlTextarea1" rows="1"></textarea>
                    </div>
                </div>

                <div class="row form-group p-1">
                    <div class="col-lg-6">
                        <label class="font-weight-bold" for="email">Services</label>
                        <div class="options">
                           

                            <?php $sql1 = mysqli_query($conn,"SELECT * FROM tbl_services");
                                    while($row1 = mysqli_fetch_array($sql1)){
                            ?>

                            <div class="form-check">
                                <input type="checkbox" required name="services[]" value="<?php echo $row1['service']; ?>">
                                <label><?php echo $row1['service']; ?></label>
                            </div>
                <?php      } ?>

                           
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-dark custom_btn" name="submit" id="submit">Submit</button>
                    </div>
                </div>


            </form>
        </div>
    </div>

</section>

<script>
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
document.getElementById("date").setAttribute("min", today);

$(function() {
    var requiredCheckboxes = $('.options .form-check :checkbox[required]');
    requiredCheckboxes.change(function() {
        if (requiredCheckboxes.is(':checked')) {
            requiredCheckboxes.removeAttr('required');
        } else {
            requiredCheckboxes.attr('required', 'required');
        }
    });
});

var $regexname = /^([A-Za-z\s]+)$/;
var $regexnum = /^([0-9]+)$/;
var $regexcontact = /^([0-9]{10})$/;

$('#firstname').on('keypress keydown keyup', function() {
    if (!$.trim($(this).val()).match($regexname)) {
        $('.error_firstname').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
        $('#firstname').addClass('border-danger');
    } else {
        $('.error_firstname').text('');
        $('#firstname').removeClass('border-danger');
    }
})

$('#lastname').on('keypress keydown keyup', function() {
    if (!$.trim($(this).val()).match($regexname)) {
        $('.error_lastname').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
        $('#lastname').addClass('border-danger');
    } else {
        $('.error_lastname').text('');
        $('#lastname').removeClass('border-danger');
    }
})

$('#age').on('keypress keydown keyup', function() {
    if (!$.trim($(this).val()).match($regexnum)) {
        $('.error_age').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
        $('#age').addClass('border-danger');
    } else {
        $('.error_age').text('');
        $('#age').removeClass('border-danger');
    }
})

$('#phoneNumber').on('keypress keydown keyup', function() {
    if (!$.trim($(this).val()).match($regexcontact)) {
        $('.error_phoneNumber').html('<i class="bi bi-exclamation-circle"></i> Invalid format');
        $('#phoneNumber').addClass('border-danger');
    } else {
        $('.error_phoneNumber').text('');
        $('#phoneNumber').removeClass('border-danger');
    }
})

$('#appointment_form').on('submit', function(e) {
    e.preventDefault();

    if ($('.error').text() != '') {
        Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'Fill all required fields!'
        });
    } else {
        var get_form = $('#appointment_form')[0];
        var form = new FormData(get_form);
        form.append('appoint', true);

        $.ajax({
            type: "POST",
            url: "./functions/appointment.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#submit').prop('disabled', true);
                $('#submit').text('Processing...');
            },
            complete: function() {
                $('#submit').prop('disabled', false);
                $('#submit').text('Submit');
            },
            success: function(response) {
                if (response.includes('full slot')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Sorry',
                        text: 'There is no slot on your selected date!'
                    });
                } else if (response.includes('already set appointment')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Sorry',
                        text: 'You already set appointment in selected date!'
                    });
                } else if (response.includes('2 services only')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Sorry',
                        text: 'We only accept up to 2 services only!'
                    });
                } else if (response.includes('success')) {
                    Swal.fire({
                        icon: 'succes',
                        title: 'Your appointment request is pending. Just wait for our confirmation which will be sent via SMS notification. Thank you!',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = 'my-appointment.php';
                        }
                    })
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
<?php include './components/bottom.php';?>