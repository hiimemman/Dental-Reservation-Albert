<?php 
include './database/config.php'; 
include './components/header.php'; 
?>

<section id="hero-animated" class="hero-animated d-flex align-items-center bg-primary">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
        data-aos="zoom-out">
        <img src="assets/img/tooth.png" class="img-fluid animated">
        <h2 class="fw-bold">YOUR NEIGHBORHOOD DENTAL CLINIC</h2>
        <div class="d-flex">
            <a href="appointment.php" class="btn bg-white appointment">Book An Appointment Now</a>
        </div>
    </div>
</section>

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="services" class="featured-services">
        <div class="container">

            <div class="row gy-4">

                <div class="section-header">
                    <h2>Our Services</h2>
                </div>



                <?php 
                        $sqltext = mysqli_query($conn,"SELECT * FROM tbl_text");
                        while($rowt = mysqli_fetch_array($sqltext)){
                ?>  

                <div class="col-xl-4 col-md-4 d-flex" data-aos="zoom-out">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="fa-solid fa-tooth"></i></div>
                        <h4><a href="javascript:void(0)" class="stretched-link"><?php echo $rowt['title'] ?></a></h4>
                        <p><?php echo $rowt['texts'] ?></p>
                    </div>
                </div><!-- End Service Item -->
              <?php } ?>              


             
            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <section class="" id="appointment">
        <div class="section-header">
            <h2>Book an Appointment</h2>
        </div>
        <div class="row bg-primary p-5 d-sm-flex justify-content-center">
            <div class="col-md-8 d-sm-flex gap-5">
                <div class="col-md-5 mb-3 mb-md-0">
                    <img class="w-100" src="./assets/img/PngItem_3268228.png" alt="">
                </div>
                <div class="col-md-7 d-sm-flex flex-column justify-content-center text-center text-sm-start">
                    <h2>Schedule an Appointment now!</h2>
                    <p>We are very excited to take care of you!
                        To schedule an appointment you may click the form and apply for an appointment.
                    </p>
                    <p>Let's start your journey towards a healthy smile!</p>
                    <div class="d-sm-flex text-center text-sm-start">
                        <a href="appointment.php" class="btn text-dark appointment" style="background: white;">GO TO
                            APPOINTMENT FORM</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="" id="about">

        <!-- ======= About Section ======= -->
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>
                <p style="color:white !important;">Dela Chica Dental Clinic, your neighborhood dental clinic, is committed to provide an excellent dental care to its patients at a reasonable cost to promote the importance of oral health education
            </div>

            <div class="row gy-4">

            <!-- ==================REVISION #1 CREATE CAROUSEL SLIDER================== -->
            <!-- =======================REVISION #1 STARTS HERE======================== -->
            <div class="autoplay">
            <?php 

            // Retrieve images from the database 
            $getAboutImage = mysqli_query($conn, "SELECT * FROM tbl_img WHERE title = 'about'"); 
     
            if($getAboutImage->num_rows > 0){ 
                while($row = $getAboutImage->fetch_assoc()){ 
                    $imageURL = $row["img"]; 
                
            ?>
                <div class="slide">
                    <img src="<?php echo $imageURL; ?>" alt="" />
                </div>
            <?php } 
            } ?>
            </div>

            <!-- =======================REVISION #1 ENDS HERE=========================== -->


            <!-- ===================CODES BEFORE REVISION======================== -->
            <!-- <--!<?php 
                //     $sqlpic5 = mysqli_query($conn, "SELECT * FROM tbl_img WHERE id = '5'");
                //     $row5 = mysqli_fetch_array($sqlpic5);

                //     $sqlpic6 = mysqli_query($conn, "SELECT * FROM tbl_img WHERE id = '6'");
                //     $row6 = mysqli_fetch_array($sqlpic6);



                //     $sqlpic = mysqli_query($conn, "SELECT * FROM tbl_img WHERE title = 'about'");
                //    while( $row1 = mysqli_fetch_array($sqlpic)){
                ?>

                <div class="col-xl-4 col-md-4 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div class="service-item position-relative">

                        <img class="w-100 h-150" src="./<?php //echo $row1['img']; ?>" alt="">
                    
                    </div>
                </div>End Service Item -->
                <?php //}  ?> <!-- curly bracket for while fetch array sqlpic-->

                <!-- ===================CODES BEFORE REVISION======================== -->
          

            </div>
    </section>
    <!-- <section class="bg-primary" id="protocol">
        <div class="section-header">
            <h2>Clinic Protocols</h2>
        </div>
        <div class="container">
            <div class="row gy-4">

                <div class="col-xl-6 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div class="service-item position-relative">

                        <img class="w-100" src="./<?php echo $row5['img']; ?>" alt="">
                    </div>
                </div>End Service Item -->

                <!-- <div class="col-xl-6 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div class="service-item position-relative">

                        <img class="w-100" src="./<?php echo $row6['img']; ?>" alt="">
                    </div>
                </div> -->
<!-- End Service Item -->
            <!-- </div>



        </div>

        </div>

        </div>
    </section>End About Protocol -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-header">
                <h2>Contact Us</h2>
            </div>

        </div>



        <div class="container">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-4">

                    <div class="info">
                        <h3>Get in touch</h3>
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location:</h4>
                                <p>Avenida Rizal St., Bahayang Pagasa, Molino V, Bacoor, Philippines</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email:</h4>
                                <p><a href="mailto:sleepshaco@gmail.com" >sleepshaco@gmail.com</a></p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-phone flex-shrink-0"></i>
                            <div>
                                <h4>Call:</h4>
                                <p>0998329873 / 09182307784</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                                marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=comia dental clinic&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                href="https://piratebay-proxys.com/">Piratebay</a></div>
                        <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            width: 100%;
                            height: 400px;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            width: 100%;
                            height: 400px;
                        }

                        .gmap_iframe {
                            height: 400px !important;
                        }
                        </style>
                    </div><!-- End Google Maps -->
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->



<?php
        if(isset($_POST['send'])){
           
             $name = $_POST['name'];
                $email  = $_POST['email'];
                $subject  = $_POST['subject'];
                
                  $message =  $conn -> real_escape_string($_POST['message']);

            $sql = mysqli_query($conn, "INSERT INTO tbl_inq (`name`, email, `subject`, `message`) VALUE ('$name','$email','$subject','$message')");   
            if($sql){
                echo '<script>alert("Your message was sent")
                window.location=document.referrer;
                 </script>';
            }
        }
?>



  <!-- ======= feedback ======= -->
 <!-- <section id="contact" class="contact bg-primary">
      <div class="container">

      <div class="section-header">
                <h2>Inquiries/Feedback</h2>
            </div>
        <div class="row  bg-primary">
         
           <form  method="post" action="index.php" ><br>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
             <br>
              <div class="text-center"><button type="submit" name="send" class="btn btn-secondary">Send Message</button></div><br>
            </form>
        
          
        </div>


        

      </div>
    </section> End feedback Section -->



</main><!-- End #main -->

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
var chatbox = document.getElementById('fb-customer-chat');
chatbox.setAttribute("page_id", "111958438406947");
chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
window.fbAsyncInit = function() {
    FB.init({
        xfbml: true,
        version: 'v15.0'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<!-- Manuel Olarve Try Remote -->
<?php 
include './components/footer.php'; 
include './components/bottom.php';
?>
