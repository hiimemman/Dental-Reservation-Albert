<?php 
include './database/config.php'; 
include './components/header.php'; 
?>

<main id="main" >

    <section class="" id="terms">
        <!-- ======= Terms Section ======= -->
        <div class="container" data-aos="fade-up">

            <div class="section-header mt-5">
                
                <h2 style="background: #6eada7; width:100%; padding: 10px; color: white;">Terms & Conditions</h2>
                <br>
                <h5 style="text-align: left; color: #277c75;">Terms of Service</h5>
                <h6 style="text-align: justify;">We will always provide the best service that we can to our patients.
                The following sections provide further clarity on our terms and conditions of service.
                If you have any queries, please email us on comiadentalclinic@gmail.com</h6>
                <br>
                <h5 style="text-align: left; color: #277c75;">Website</h5>
                <h6 style="text-align: justify;">We do not guarantee that our site, or any content on it, will be free from errors or omissions and may be out-of-date at any given time including personnel and practice changes or information. We will not be liable to you if for any reason our website is unavailable at any time or for any period.Please be aware that any information provided through any part of our website is provided for interest purposes only and does not constitute personalised professional advice. For personal professional dental advice, we strongly recommend that you see a dentist for consultation</h6>
                <br>
                <h5 style="text-align: left; color: #277c75;">Personal Details</h5>
                <h6 style="text-align: justify;">It is important that you provide a full and accurate medical history with details of any medications that you may be taking. It is also a requirement that we have your correct contact details on the system.Should these change it is very important for you to tell your dentist and the reception team.Whilst we will ask and try to keep all information updated on each visit, it is the patient’s responsibility to inform the clinic of any changes in either personal details and/or their medical history. All records are kept in accordance with strict Data Protection guidelines.</h6>
                  <br>
                <h5 style="text-align: left; color: #277c75;">Contact</h5>
                <h6 style="text-align: justify;">Contact We like to keep you updated about pending appointments so we will send reminders, via calls, emails, SMS (text message) or post. If you would prefer that we did not contact you by any one or other reminder system please ensure you inform reception during your next visit. We do this to minimise your late cancellations and failure to attend, which has a direct impact on the use of our service and on-going registration. Rest assured we do not use your details for anything else and will not pass on your information to third parties.</h6>
                 <br>
                <h5 style="text-align: left; color: #277c75;">Feedback & Complaints</h5>
                <h6 style="text-align: justify;">At Comia Dental Care Group our aim is to ensure all of our patients are happy with their experience with us, and we welcome feedback to improve the service. Any service compliant is always taken sincerely as we want to ensure that every patient has a great experience with us. Feedback or complaints can be sent to us via our reception teams or via email. Every complaint will receive acknowledgment within 5 working days, and the management will strive to resolve the complaint within a quick, reasonable period of time (usually about 2 weeks). For our full complaints policy, please ask a member of our reception team.</h6>
            </div>

    </section>
   
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
<?php 
include './components/bottom.php';
?>