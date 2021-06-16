<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="css/main_style.css">
    <link rel="shortcut icon" type="image/png" href="img/Lephoto.png">

    <title>LE PHOTO STATION</title>
</head>

<body>

    <div class="navigation">
        <input type="checkbox" class="navigation__checkbox" id="navi-toggle">

        <label for="navi-toggle" class="navigation__button">
            <span class="navigation__icon">&nbsp;</span>
        </label>

        <div class="navigation__background">&nbsp;</div>

        <nav class="navigation__nav">
            <ul class="navigation__list">
                <li class="navigation__item"><a href="admin/imageupload/photos.php" class="navigation__link"><span>01</span>Gallery</a></li>
                <li class="navigation__item"><a href="chatapp/chat.php" class="navigation__link"><span>02</span>Chat Now</a></li>
                <li class="navigation__item"><a href="calendar.php" class="navigation__link"><span>03</span>Reserve Now</a></li>
                <li class="navigation__item"><a href="logout.php" class="navigation__link"><span>04</span>Logout</a></li>
            </ul>
        </nav>
    </div>

    <header class="header">
        <div class="header__logo-box">
            <img src="img/Lephoto.png" alt="fav-icon" class="header__logo">
        </div>

        <div class="header__text-box">
            <h1 class="heading-primary">
                <span class="heading-primary--main">LE PHOTO STATION</span>
                <span class="heading-primary--sub">PHOTOGRAPHY RESERVATION</span>
            </h1>

            <a href="calendar.php" class="btn btn--white btn--animated">Reserve Now</a><br><br>
            <a href="intruc.php" class="btn btn--white btn--animated">How to reserve Instructions</a>
        </div>
    </header>

    <main>
        <section class="next1">
            <div class="u-center-text u-margin-bottom-big">
                <h2 class="heading-section2">
                    LE PHOTO STATION
                </h2>
            </div>

            <div class="row">
                <div class="col-1-of-2">
                    <h3 class="heading-tertiary u-margin-bottom-small">Trusted by many clients</h3>
                    <video class="bg-video__content" autoplay controls>
                            <source src="img/LE PHOTO STATION VIDEO FINAL.mp4" type="video/mp4"> 
                            <source src="img/LE PHOTO STATION VIDEO FINAL.mp4" type="video/webm"> 
                            Your browser does not support mp4 videos
                        </video>

                </div>
                <div class="col-1-of-2">
                    <div class="composition">
                        <img src="img/GRADPIC A-min.jpg" alt="Photo 1" class="composition__photo composition__photo--p1">
                        <img src="img/GRADPIC AA-min.jpg" alt="Photo 2" class="composition__photo composition__photo--p2">
                        <img src="img/GLAMOUR.jpg" alt="Photo 3" class="composition__photo composition__photo--p3">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <section class="section-slider">
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 11</div>
                <img src="img/Graduation Package-min.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 11</div>
                <img src="img/STUDIO PACKAGES-min.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 11</div>
                <img src="img/slide.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 11</div>
                <img src="img/slide1.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">5 / 11</div>
                <img src="img/slide2.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">6 / 11</div>
                <img src="img/slide3.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">7 / 11</div>
                <img src="img/slide4.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">8 / 11</div>
                <img src="img/slide5.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">9 / 11</div>
                <img src="img/slide6.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">10 / 11</div>
                <img src="img/slide7.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <div class="numbertext">11 / 11</div>
                <img src="img/slide8.jpg" style="width:100%">

            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

    </section>

    <section class="section-prices">
        <div class="u-center-text u-margin-bottom-medium">
            <h2 class="heading-secondary">
                Prices Best for you
            </h2>
        </div>

        <div class="row">
            <div class="col-1-of-3">
                <div class="card">
                    <div class="card__side card__side--front">
                        <div class="card__picture card__picture--1">
                            &nbsp;
                        </div>
                        <h3 class="card__heading">
                            <span class="card__heading-span card__heading-span--1">Graduation Photo Package</span>
                        </h3>
                        <div class="card__details">
                            <ul>
                                <li>1pc. 11x14 Frame Graduation Portrait</li>
                                <li>2pcs. 5R Toga/Glamour</li>
                                <li>2pcs. 3R Filipiniana/Barong/Toga</li>
                                <li>4pcs. Cute Size Pictures</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card__side card__side--back card__side--back-1">
                        <div class="card__cta">
                            <div class="card__price-box">
                                <p class="card__price-only">Only</p>
                                <p class="card__price-value">&#8369;1280</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1-of-3">
                <div class="card">
                    <div class="card__side card__side--front">
                        <div class="card__picture card__picture--2">
                            &nbsp;
                        </div>
                        <h3 class="card__heading2">
                            <span class="card__heading-span card__heading-span--2">Special Event</span>
                        </h3>
                        <div class="card__details">
                            <ul>
                                <li>Max 4 members</li>
                                <li>PHP 150/person for Additional</li>
                                <li>Max of 10 poses</li>
                                <li>Choose 5 shots for Enhancement</li>
                                <li>1pc. 11x14 w/ Frame</li>
                                <li>FREE Digital Copies</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card__side card__side--back card__side--back-2">
                        <div class="card__cta">
                            <div class="card__price-box">
                                <p class="card__price-only">Only</p>
                                <p class="card__price-value">&#8369;1250</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1-of-3">
                <div class="card">
                    <div class="card__side card__side--front">
                        <div class="card__picture card__picture--3">
                            &nbsp;
                        </div>
                        <h3 class="card__heading3">
                            <span class="card__heading-span card__heading-span--3">Birthday</span>
                        </h3>
                        <div class="card__details">
                            <ul>
                                <li>Family/Group</li>
                                <li>Up to 1hr. Photo Session</li>
                                <li>Max of 8 persons</li>
                                <li>PHP 150/person for Additional</li>
                                <li>Choose 10 shots for Enhancement</li>
                                <li>1pc. 16x20 Print</li>
                                <li>FREE Digital Copies</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card__side card__side--back card__side--back-3">
                        <div class="card__cta">
                            <div class="card__price-box">
                                <p class="card__price-only">Only</p>
                                <p class="card__price-value">&#8369;2500</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial">
        <div class="image">
            <div class="new">
                <h2 class="header-testimonial u-center-text testimonial-h2">Our customers can't live without us</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-1-of-3">
                    <blockquote>
                        The staff were very accommodating and friendly. Pictures and their edits are greatly quality, and ang galing pa ng make up artists nila. I highly recommended this place!
                        <cite><img src="img/testimonial2.png" alt="Customer 1 photo">Shelley Sumat</cite>
                    </blockquote>
                </div>
                <div class="col-1-of-3">
                    <blockquote>
                        Very warm and accomodative, I love the quality of their service More power to all of the make up artists, hair stylists, photographer and editors. Sobrang hands on sa work nila. You'll never feel na you are aloof with them.
                        <cite><img src="img/testimonial3.png" alt="Customer 2 photo">Rhoan Ballesteros</cite>
                    </blockquote>
                </div>
                <div class="col-1-of-3">
                    <blockquote>
                        Le Photo Station! best of the best! Una at huli hindi ka bibiguin. Mabilis at very accomodating lahat ng staffs nila.
                        <cite><img src="img/testimonial1.png" alt="Customer 3 photo">Ellaine Joy Pecson</cite>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer__logo-box">
            <img src="img/Lephoto.png" alt="Full logo" class="footer__logo">
        </div>
        <div class="row">
            <div class="col-1-of-2">
                <div class="footer__navigation">
                    <ul class="footer__list">
                        <li class="footer__item"><a href="#company" class="footer__link">Company</a></li>
                        <li class="footer__item"><a href="#contact" class="footer__link">Contact us</a></li>
                        <li class="footer__item"><a href="#careers" class="footer__link">Mission and Vision</a></li>
                        <li class="footer__item"><a href="#privacyandpolicy" class="footer__link">Privacy policy</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-1-of-2">
                <p class="footer__copyright">
                    Le Photo Station is an organized Photo Studio highly recognized business institution located in Tarlac City founded in 2015. It primarily provides photography and videography services specializing in Graduation Portraits.
                </p>
            </div>
        </div>
    </footer>

    <div class="popup" id="privacyandpolicy">
        <div class="popup__content">
            <div class="popup__text">
                <div class="popup__h3">
                    <h3 class="heading-secondary1 popup__margin-primary terms">Privacy and Policy</h3>
                </div>
                <div class="popup__text1">
                    <h3 class="heading-tertiary popup__margin-tertiary">Frames and Softcopy Policy<br> The FRAMES to be claimed by customers SHOULD BE CHECKED BY THE CUSTOMERS themselves upon pick up. After the frames have been picked up, any damage and/or concern with frames will be not Le Photo Station’s
                        accountability.
                        <br> SOFTCOPIES can be provided by Le Photo Station WITHIN 3 MONTHS FOR FREE. After 3 months the charge will apply. Charges for the Softcopies may vary.<br> LE PHOTO STATION’S STANDARD PRACTICE OF RELEASING SOFTCOPIES IS NOT THROUGH
                        E-MAIL, HOWEVER, IT IS OUR EXTRA EFFORT TO OFFER IT TO THOSE WHO MAY NEED IT THROUGH E-MAIL (EX. HOUSE FAR FROM THE STUDIO). PLEASE GET THE SOFTCOPIES FROM THE AUTHORIZED STAFF IN THE STUDIO.<br> THANK YOU! GOD BLESS!<br> LE PHOTO
                        STATION MANAGEMENT

                    </h3>
                </div>
                <a href="#header" class="popup__close">&times;</a>
            </div>
        </div>
    </div>

    <div class="popup" id="terms">
        <div class="popup__content">
            <div class="popup__text">
                <div class="popup__h3">
                    <h3 class="heading-secondary1 popup__margin-primary terms">Terms</h3>
                </div>
                <div class="popup__text1">
                    <h3 class="heading-tertiary popup__margin-tertiary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Id cursus metus aliquam eleifend mi in nulla. Hac habitasse platea dictumst quisque sagittis purus sit. Odio
                        aenean sed adipiscing diam donec adipiscing tristique risus nec. Nunc lobortis mattis aliquam faucibus purus in massa tempor nec. In vitae turpis massa sed elementum tempus egestas sed sed. Interdum velit laoreet id donec ultrices.
                        Dignissim convallis aenean et tortor at risus viverra adipiscing. Pretium fusce id velit ut tortor pretium. Malesuada proin libero nunc consequat interdum.</h3>
                </div>
                <a href="#header" class="popup__close">&times;</a>
            </div>
        </div>
    </div>

    <div class="popup" id="careers">
        <div class="popup__content">
            <div class="popup__text">
                <div class="popup__h3">
                    <h3 class="heading-secondary1 popup__margin-primary terms">Company Mission and Vision</h3>
                </div>
                <div class="popup__text1">
                    <h3 class="heading-tertiary popup__margin-tertiary">
                        VISION<br> To deliver “WOW CLIENT EXPERIENCE” and maximum client satisfaction.<br><br> MISSION

                        <br> To provide excellent services in photography and other related products and services.<br> To produce and sustain quality services throughout the process.<br> To continuously improve the products and services.<br>
                    </h3>
                </div>
                <a href="#header" class="popup__close">&times;</a>
            </div>
        </div>
    </div>

    <div class="popup" id="contact">
        <div class="popup__content">
            <div class="popup__text">
                <div class="popup__h3">
                    <h3 class="heading-secondary1 popup__margin-primary terms">Contact US</h3>
                </div>
                <div class="popup__text1">
                    <h3 class="heading-tertiary popup__margin-tertiary">Le Photo Station<br> 2nd Floor Pilar Building, San Vicente, Tarlac City<br> Contact Number: 0933 825 0775<br> Email address: lephotostation@gmail.com<br> FB Page: https://www.facebook.com/LePhotoStationOfficial<br>
                    </h3>
                </div>
                <a href="#header" class="popup__close">&times;</a>
            </div>
        </div>
    </div>

    <div class="popup" id="company">
        <div class="popup__content">
            <div class="popup__text">
                <div class="popup__h3">
                    <h3 class="heading-secondary1 popup__margin-primary terms">Company</h3>
                </div>
                <div class="popup__text1">
                    <h3 class="heading-tertiary popup__margin-tertiary">Le Photo Station is an organized Photo Studio highly recognized business institution located<br> in Tarlac City founded in 2015. It primarily provides photography and videography services<br> specializing in Graduation Portraits.</h3>
                </div>
                <a href="#header" class="popup__close">&times;</a>
            </div>
        </div>
    </div>


    <script src="js/index.js"></script>
</body>

</html>