<?php
include './components/head-css.php';
?>

<style>
.custom_banner {
    width: 100%;
    object-fit: cover;
    height: 300px;
}

@media (min-width: 576px) {
    .custom_banner {
        height: 500px;
    }
}

@media (min-width: 768px) {
    .custom_banner {
        height: 700px;
    }
}

@media (min-width: 992px) {
    .custom_banner {
        height: 900px;
    }
}
</style>

<body class="bg-body">
    <!-- Navbar Component -->
    <?php include './components/navbar.php'; ?>

    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Healthy <span class="text-primary">Pet,</span> Healthy <span
                        class="text-primary">Life</span></h1>
                <p class="animated fadeIn mb-4 pb-2">The confidence you need to keep your pets happy and healthy. Book
                    with us today!</p>
                <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Schedule an Appointment</a>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item h-100">
                        <img class="img-fluid custom_banner" src="./assets/img/bannerdogcat.png" alt="">
                    </div>
                    <div class="owl-carousel-item h-100">
                        <img class="img-fluid custom_banner" src="./assets/img/dog-banner.jpg" alt="">
                    </div>
                    <div class="owl-carousel-item h-100" style="object-fit: cover;">
                        <img class="img-fluid custom_banner" src="./assets/img/cats.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Services Start -->
    <div class="container-xxl py-5" id="service">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">Services Listing</h1>
                        <p>All Pet Care Services</p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/vaccination.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Vaccination</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>We’ll keep your pet safe
                                        from parvo, distemper, leptospirosis, rabies, corona, kennel cough and more —
                                        and send reminders when they’re due for a vaccine.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/ultrasound.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Ultrasound</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>Our pet clinic offers
                                        ultrasound services for your furry friends. Ultrasound is a non-invasive and
                                        painless imaging technique that uses sound waves to produce pictures of the
                                        inside of the body.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/deworming.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Deworming</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>We offer deworming
                                        services for dogs and cats. This treatment involves administering medication to
                                        kill any worms or parasites.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/checkup.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Check-up</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>Our team of skilled
                                        veterinarians and support staff are dedicated to providing high-quality care for
                                        your furry friends. Our check-up service includes a thorough examination of your
                                        pet to assess their overall health and well-being.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/rapidtest.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Rapid Test Kit</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>Rapid test kits can save
                                        pet owners time and money by allowing them to quickly determine whether their
                                        pet is suffering from a particular condition.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/grooming.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Pet Grooming</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>Our pet clinic offers
                                        professional grooming services for your furry friends. Our experienced groomers
                                        provide a range of services, including bathing, brushing, trimming, and nail
                                        clipping.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/surgery.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Minor Surgery</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>Our pet clinic offers
                                        minor surgical services for your furry companions. Our experienced veterinarians
                                        are skilled in performing various types of minor surgeries, such as spaying and
                                        neutering, tooth extractions, and tumor removals.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/xray.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">X-ray</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>Our pet clinic offers
                                        x-ray services for your beloved pets. X-ray, or radiography, is a common imaging
                                        technique that uses ionizing radiation to produce images of the inside of the
                                        body.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/treatment.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Treatment</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>We offer advanced
                                        radiology services for pets. Our state-of-the-art equipment allows us to take
                                        high-quality X-ray images of your pet's body, providing valuable information
                                        about their health and any potential medical conditions.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden bg-white h-100">
                                <div class="position-relative overflow-hidden">
                                    <a href=""><img class="img-fluid"
                                            style="height: 300px; width: 100%; object-fit: cover;"
                                            src="./assets/img/confinement.jpg" alt=""></a>
                                </div>
                                <div class="p-4 pb-0">
                                    <a class="d-block h5 mb-2" href="">Confinement</a>
                                    <p><i class="fa-solid fa-arrow-right text-primary me-2"></i>Our pet clinic offers
                                        confinement services for your furry companions. If your pet needs to be kept in
                                        a controlled environment for medical or other reasons, our clinic provides a
                                        safe and comfortable space for them to stay.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- About Start -->
    <div class="container-xxl py-5" id="about-us">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="./assets/img/aboutus.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">ABOUT US</h1>
                    <p class="mb-4">Welcome to our pet clinic! We are a team of passionate and dedicated veterinarians, technicians, and support staff who are committed to providing the highest quality medical care for your furry friends.
                    </p>
                    <p class="mb-4">Our team is dedicated to maintaining a warm and welcoming environment for both pets and their owners, and we are always happy to answer any questions or concerns you may have.
                    </p>
                    <p class="mb-4">We are grateful for the trust that our clients place in us and we look forward to serving you and your beloved pets for many years to come. Thank you for choosing us as your trusted pet care provider.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Dentist Start -->
    <div class="container-xxl py-5" id="veterinarian">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Veterinarian</h1>
                <p>Meet our Certified and Experienced Veterinarian</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden  bg-white">
                        <div class="position-relative">
                            <img class="img-fluid" src="./assets/img/team-1.jpg" alt="">
                            <!-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded overflow-hidden  bg-white">
                        <div class="position-relative">
                            <img class="img-fluid" src="./assets/img/team-2.jpg" alt="">
                            <!-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded overflow-hidden  bg-white">
                        <div class="position-relative">
                            <img class="img-fluid" src="./assets/img/team-3.jpg" alt="">
                            <!-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item rounded overflow-hidden  bg-white">
                        <div class="position-relative">
                            <img class="img-fluid" src="./assets/img/team-4.jpg" alt="">
                            <!-- <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div> -->
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dentist End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5" id="feedback">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Our Clients Say!</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                    sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-body rounded p-3" style="background-color:  #fdf3ce
 !important;">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                            diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="./assets/img/testimonial-1.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-body rounded p-3" style="background-color:  #fdf3ce
 !important;">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                            diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="./assets/img/testimonial-2.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-body rounded p-3" style="background-color:  #fdf3ce
 !important;">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet
                            diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="./assets/img/testimonial-3.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer -->
    <?php include './components/footer.php' ?>

    <!-- Script -->
    <?php include './components/script.php' ?>
</body>

</html>