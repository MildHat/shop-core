<!--Page Title-->
<section class="page-title" style="background-image:url(images/background/about.jpg);">
<div class="auto-container">
    <h1><?= CONTACT_US ?></h1>
    <ul class="bread-crumb clearfix">
        <li><a href="/"><?= HOME ?> </a></li>
        <li><?= CONTACT_US ?></li>
    </ul>
</div>
</section>
<!--End Page Title-->

<!-- Contact Section -->
<section class="contact-section">
<div class="auto-container">
    <div class="sec-title text-center">
        <h2>Get in Touch</h2>
        <div class="text">The biggest gift would be from me and the card attached would say thank you</div>
    </div>

    <div class="contact-form">
        <form method="post" action="sendemail.php" id="contact-form">
            <div class="row clearfix">

                <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                    <input type="text" name="username" placeholder="Name" required="">
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                    <input type="tel" name="phone" placeholder="Phone" required="">
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                    <input type="email" name="email" placeholder="Email" required="">
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <textarea name="message" placeholder="Message"></textarea>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 form-group text-center">
                    <button class="theme-btn btn-style-four" type="submit" name="Submit Now">Send Message</button>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
<!--End Contact Section -->

<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
<script src="js/map-script.js"></script>
<!--End Google Map APi-->