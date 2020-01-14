<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
    <link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
    <link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

    <?= $this->getMeta() ?>
</head>
<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!--Header Span-->
        <div class="header-span"></div>

        <!-- Main Header-->
        <header class="main-header">
            <!--Main Box-->
            <div class="main-box">
                <div class="nav-outer clearfix">

                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <?php // TODO: adaptive menu ?>
                                <li class="current"><a href="/">Home</a>
<!--                                    <ul>-->
<!--                                        <li><a href="index.html">Home Style 01</a></li>-->
<!--                                        <li><a href="index-2.html">Home Style 02</a></li>-->
<!--                                        <li class="dropdown"><a href="#">Header Styles</a>-->
<!--                                            <ul>-->
<!--                                                <li><a href="index.html">Header Type 01</a></li>-->
<!--                                                <li><a href="index-2.html">Header Type 02</a></li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                    </ul>-->
                                </li>
<!--                                <li class="dropdown"><a href="#">Pages</a>-->
<!--                                    <ul>-->
<!--                                        <li><a href="about.html">About Us</a></li>-->
<!--                                        <li class="dropdown"><a href="#">Blog</a>-->
<!--                                            <ul>-->
<!--                                                <li><a href="blog-classic.html">Latest Blog</a></li>-->
<!--                                                <li><a href="blog-single.html">Post Details</a></li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </li>-->

                                <li>
                                    <a href="/products">Shop</a>
                                </li>
                                <li><a href="/contact">Contact Us</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/blog">Blog</a></li>
                            </ul>
                        </div>
                    </nav>

                    <div class="logo-outer">
                        <div class="logo"><a href="/"><img src="images/logo.png" alt="" title=""></a></div>
                    </div>

                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                        <div class="social-links ">
                            <span>Follow us :</span>
                            <ul class="social-icon-one">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!--Search Box-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-magnifying-glass"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                    <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="like-btn"><span class="icon flaticon-like"></span></div>
                        <div class="cart-btn">
                            <a href="/cart">
                                <span class="count">3</span>
                                <span class="icon flaticon-shopping-bag"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!--Mobile Menu-->
                <div class="mobile-menu">
                    <div class="nav-header clearfix">
                        <div class="text">Menu</div>
                        <div class="menu-btn"><span class="fa fa-bars"></span></div>
                    </div>
                    <div class="links-outer">
                        <div class="links-box">
                            <ul class="navigation">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!--End Main Box -->

        </header>
        <!--End Main Header -->




        <?= $content ?>




        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="auto-container">

                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">
                        <!--Big Column-->
                        <div class="big-column footer-column col-md-5 col-sm-12 col-xs-12">
                            <div class="footer-widget about-widget">
                                <div class="widget-content">
                                    <div class="footer-logo"><a href="index.html"><img src="images/footer-logo.png" alt=""></a></div>
                                    <div class="text">The movie star the professor and mary ann here on gilligans Isle you wanna be where you can see our troubles.</div>
                                    <ul class="contact-info">
                                        <li><i class="fa fa-phone"></i> <span>Call us :</span> +2 5600 900 200</li>
                                        <li><i class="fa fa-envelope-open-o"></i> <span>Email :</span>  getsupport@mail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--Big Column-->
                        <div class="big-column col-md-7 col-sm-12 col-xs-12">
                            <div class="row clearfix">

                                <!--Footer Column-->
                                <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2 class="widget-title">Quick Links</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="/about">About Us</a></li>
                                                <li><a href="#">Collections</a></li>
                                                <li><a href="/blog">Blog</a></li>
                                                <li><a href="#">Faq’s</a></li>
                                                <li><a href="/contact">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2 class="widget-title">Information</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="#">Terms & Conditions</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Returns & Exchange</a></li>
                                                <li><a href="#">Security</a></li>
                                                <li><a href="#">Sitemap</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2 class="widget-title">Help</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="#">Payment Options</a></li>
                                                <li><a href="#">Cancellations</a></li>
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="#">Shipping</a></li>
                                                <li><a href="#">Delivery</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <div class="pull-left">
                            <div class="copyright">© 2018 <a href="index.html">Les Cons.</a> All rights reserved.</div>
                        </div>
                        <div class="pull-right clearfix">
                            <div class="payment-box">
                                <h4>Payment :</h4>
                                <a href="#"><img src="images/resource/payments-options.png" alt=""></a>
                            </div>

                            <div class="social-links">
                                <h4>Connect :</h4>
                                <ul class="social-icon-two clearfix">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Main Footer -->


    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>
    <script src="js/jquery.js"></script>
    <!--Revolution Slider-->
    <script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="js/main-slider-script.js"></script>
    <!-- End Revolution Slider -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/wow.js"></script>

    <script src="js/validate.js"></script>

    <script src="js/script.js"></script>
</body>
</html>