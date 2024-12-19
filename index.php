<?php 
     session_start();
    include "admin/config/db.php";
    include "admin/config/fun.php";
    $connect=new connect();
    $fun=new fun($connect->dbconnect());
    $msg="";
    $fetch = $fun->view_photos(); 


    $fetch1 = $fun->view_owner(1);
    if(mysqli_num_rows($fetch1)>0){
        $res2=mysqli_fetch_assoc($fetch1); 
    }
    else{
        $res2=null;
    }

     
    $fetch3 = $fun->view_testimonial();
   
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Solar - Solar Energy Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    .product-img.fixed-size {
        position: relative;
        width: 100%;
        height: 250px;
        /* Set a fixed height for consistency */
        overflow: hidden;
        margin-bottom: 1rem;
        /* Add some space below the image */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-img img.cover-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .product-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg  navbar-dark py-1 py-lg-0 px-lg-5" style="background-color:orange/*
* Created with https://www.css-gradient.com
* Gradient link: https://www.css-gradient.com/?c1=eaab08&c2=e28649&gt=l&gd=dtl
*/
background: #EAAB08;
background: linear-gradient(135deg, #EAAB08, #E28649);">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="display-4 text-white text-uppercase m-0">Solar</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#service" class="nav-item nav-link">Service</a>
                <a href="#project" class="nav-item nav-link">Project</a>
            </div>
            <a href="index.php" class="navbar-brand  px-4 mx-3 d-none d-lg-block">
                <h1 class="display-4 text-white text-uppercase m-0"><img src="img/sunvibe_logo_new.jpg" alt=""
                        style="height: 4rem;  object-fit:cover"></h1>
            </a>
            <div class="navbar-nav mr-auto py-0">
                <a href="#team" class="nav-item nav-link">Owner</a>
                <a href="#faqs" class="nav-item nav-link">FAQs</a>
                <a href="#testimonial" class="nav-item nav-link">Testimonial</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="img/carosal_1.jpg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Solar Energy</h4>
                            <h3 class="display-2 font-secondary text-white mb-4">Home Brilliance: Powered by SunVibes
                            </h3>
                            <a class="btn btn-warning font-weight-bold py-3 px-5 mt-2 btn-scroll" href="#contact">Get in
                                touch</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="img/carosal_3.jpeg" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Solar Energy</h4>
                            <h4 class="display-2 font-secondary text-white mb-">We are authorised vendor of PM Surya
                                Ghar Muft Bijli Yojana</h4>
                            <a class="btn btn-warning font-weight-bold py-3 px-5  btn-scroll" href="#contact">Get in
                                touch</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev justify-content-start" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary px-0" style="width: 68px; height: 68px;">
                    <span class="carousel-control-prev-icon mt-3"></span>
                </div>
            </a>
            <a class="carousel-control-next justify-content-end" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary px-0" style="width: 68px; height: 68px;">
                    <span class="carousel-control-next-icon mt-3"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid mb-4 mb-lg-0" src="img/new_about_solar.jpeg" alt="">
                </div>
                <div class="col-lg-7">
                    <h6 class="text-uppercase text-danger mb-3" style="letter-spacing: 3px;">About Us</h6>
                    <h1 class="display-4 mb-3"><span class="text-warning">7+ Years Experience</span> In Solar Power
                        Industry</h1>
                    <p>
                        <span style="font-weight: bold;color:Black">SUNVIBE</span> is a forward-thinking solar energy
                        company dedicated to harnessing the power of the sun to create sustainable and efficient energy
                        solutions. With a focus on innovation, reliability, and environmental stewardship, SUN VIBE
                        offers cutting-edge solar products and services designed to meet the diverse needs of
                        residential, commercial, and industrial clients. Our mission is to drive the transition to clean
                        energy and make solar power accessible and affordable for all. <span
                            style="font-weight: bold;color:Black">We are an authorized vendor of PM Surya Muft Bijli
                            Yojna.</span> Experience the energy of the future with SUN VIBE, where we turn sunlight into
                        savings.
                    </p>
                    <a class="btn btn-warning font-weight-bold py-3 px-5 mt-2" type="button" data-toggle="modal"
                        data-target="#exampleModalLong1">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- happy client start -->



    <!-- happy client end -->

    <!-- Service Start -->
    <div class="container-fluid py-5" id="service">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Services</h6>
                <h1 class="font-secondary display-4">What We Cover</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="product-item mb-2">
                        <div class="product-img fixed-size">
                            <img class="img-fluid cover-img" src="img/ongrid_1.png" alt="">
                            <a type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalLong_ongrid">
                                <i class="fa fa-2x fa-plus text-white"></i>
                            </a>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <h3 class="m-0">On-grid solar</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="product-item mb-2">
                        <div class="product-img fixed-size">
                            <img class="img-fluid cover-img" src="img/off-grid_solar.jpg" alt="">
                            <a type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalLong_offgrid">
                                <i class="fa fa-2x fa-plus text-white"></i>
                            </a>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <h3 class="m-0">Off-grid solar</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="product-item mb-2">
                        <div class="product-img fixed-size">
                            <img class="img-fluid cover-img" src="img/hybrid_1.jpeg" alt="">
                            <a type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalLong_hybridgrid">
                                <i class="fa fa-2x fa-plus text-white"></i>
                            </a>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <h3 class="m-0">Hybrid solar</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- Gallery Start -->
    <div class="container-fluid bg-gallery" id="project" style="padding: 120px 0; margin: 90px 0;">
        <div class="section-title position-relative text-center" style="margin-bottom: 120px;">
            <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Project</h6>
            <h1 class="font-secondary display-4 text-white">Project Photo Gallery
            
            </h1>
            <?php 
             print_r ($fetch)
            ?> 
        </div>


        <div class="owl-carousel gallery-carousel">

            <?php
                if(mysqli_num_rows($fetch)>0){
               while($res = mysqli_fetch_assoc($fetch)){
                
            ?>

            <div class="gallery-item">
                <img class="img-fluid w-100" src="admin/images/gallery_images/<?php echo $res['image'];?>" alt=""
                    style="height:15rem;">
                <a class="btn btn-primary" href="admin/images/gallery_images/<?php echo $res['image'];?>"
                    data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>

            <?php 
             }
             }?>
            <!-- <div class="gallery-item">
                <img class="img-fluid w-100" src="img/gallery-2.jpg" alt="">
                <a class="btn btn-primary" href="img/gallery-2.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="img/gallery-3.jpg" alt="">
                <a class="btn btn-primary" href="img/gallery-3.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="img/gallery-4.jpg" alt="">
                <a class="btn btn-primary" href="img/gallery-4.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="img/gallery-5.jpg" alt="">
                <a class="btn btn-primary" href="img/gallery-5.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="img/gallery-6.jpg" alt="">
                <a class="btn btn-primary" href="img/gallery-6.jpg" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div> -->
        </div>
    </div>
    <!-- Gallery End -->


    <!-- Team Start -->
    <div class="container-fluid py-5" id="team">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Team</h6>
                <h1 class="font-secondary display-4">Meet The owner</h1>
            </div>
            <div class="row justify-content-lg-center m-0 mb-4 pb-2 mb-sm-0 pb-sm-0 ">
                <div class="col-lg-6 p-0 ">
                    <div class="row m-0">
                        <div class="col-sm-6 p-0 text-center">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                                <h5 class="mb-2"><?php echo $res2['name'];?></h5>
                                <p class="text-muted font-italic mb-2">CEO & Founder</p>
                                <p>"Empowering your home with the infinite energy of the sun."</p>
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary btn-square mr-1" href="<?php echo $res2['twitterlink'];?>"  target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-primary btn-square mr-1" href="<?php echo $res2['fblink'];?>"  target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-primary btn-square mr-1" href="<?php echo $res2['instalink'];?>"  target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-0" style="min-height: 300px;">
                            <img class="position-absolute w-100 h-100"
                                src="./admin/images/owner_images/<?php echo $res2['image'];?>"
                                style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row justify-content-lg-end m-0 mb-4 pb-2 mb-sm-0 pb-sm-0">
                <div class="col-lg-6 p-0">
                    <div class="row m-0">
                        <div class="col-sm-6 p-0" style="min-height: 300px;">
                            <img class="position-absolute w-100 h-100" src="img/team-2.jpg" style="object-fit: cover;">
                        </div>
                        <div class="col-sm-6 p-0 text-center">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                                <h5 class="mb-2">Adam Phillips</h5>
                                <p class="text-muted font-italic mb-2">Engineer</p>
                                <p>Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem</p>
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-start m-0 mb-4 pb-2 mb-sm-0 pb-sm-0">
                <div class="col-lg-6 p-0">
                    <div class="row m-0">
                        <div class="col-sm-6 p-0 text-center">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                                <h5 class="mb-2">Thomas Olsen</h5>
                                <p class="text-muted font-italic mb-2">Engineer</p>
                                <p>Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem</p>
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-0" style="min-height: 300px;">
                            <img class="position-absolute w-100 h-100" src="img/team-3.jpg" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-lg-end m-0">
                <div class="col-lg-6 p-0">
                    <div class="row m-0">
                        <div class="col-sm-6 p-0" style="min-height: 300px;">
                            <img class="position-absolute w-100 h-100" src="img/team-4.jpg" style="object-fit: cover;">
                        </div>
                        <div class="col-sm-6 p-0 text-center">
                            <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4">
                                <h5 class="mb-2">James Alien</h5>
                                <p class="text-muted font-italic mb-2">Engineer</p>
                                <p>Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem</p>
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-primary btn-square mr-1" href="#"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Team End -->


    <!-- FAQs Start -->
    <div class="container-fluid py-5" id="faqs">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">FAQs</h6>
                <h1 class="display-4">You Should Know</h1>
            </div>
            <div class="row">
                <div class="col-md-6 border-right border-primary">
                    <div class="text-center text-md-right mr-md-3 mb-4 mb-md-0">
                        <h3 class="mb-4">Why Switch to Solar?</h3>
                        <h5 class="mb-3"><i
                                class="fa fa-check text-success float-md-right mr-2 mr-md-0 ml-md-2"></i>"Save on
                            Electricity Bills: Generate your own power and reduce your energy costs."</h5>
                        <h5 class="mb-3"><i
                                class="fa fa-check text-success float-md-right mr-2 mr-md-0 ml-md-2"></i>"Eco-Friendly:
                            Lower your carbon footprint with clean, renewable energy."</h5>
                        <h5 class="mb-3"><i
                                class="fa fa-check text-success float-md-right mr-2 mr-md-0 ml-md-2"></i>"Energy
                            Independence: Gain reliability and reduce reliance on the grid."</h5>
                        <h5 class="mb-0"><i
                                class="fa fa-check text-success float-md-right mr-2 mr-md-0 ml-md-2"></i>"Boost Property
                            Value: Increase your home's market value with solar panels."</h5>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-left ml-md-3">
                        <h3 class="mb-4">Why Choose Us?</h3>
                        <h5 class="mb-3"><i class="fa fa-check text-success mr-2"></i>"Innovative Solutions: We offer
                            cutting-edge solar products and services."</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-success mr-2"></i>"Reliability: Count on us for
                            dependable and efficient energy solutions."</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-success mr-2"></i>"Environmental Stewardship:
                            Committed to sustainability and reducing carbon footprints."</h5>
                        <h5 class="mb-0"><i class="fa fa-check text-success mr-2"></i>"Customer Satisfaction: Dedicated
                            to providing excellent service and support."</h5>
                    </div>

                </div>
                <div class="col-md-12 text-center pt-3">
                    <a class="btn btn-warning font-weight-bold py-3 px-5 mt-4 btn-scroll" href="#contact">Get A
                        Quote</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5" id="testimonial">
        <div class="container py-5">
            <div class="section-title position-relative text-center" style="margin-bottom: 120px;">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Testimonial</h6>
                <h1 class="display-4">Our Clients Say</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                    <?php
                   if(mysqli_num_rows($fetch3)>0){
                   while($res3 = mysqli_fetch_assoc($fetch3)){
                     ?>
                        <div class="text-center">
                            <img class="img-fluid mx-auto mb-3" src="admin/images/testimonial_images/<?php echo $res3['image'];?>" style="width: 100px;">
                            <p style="font-size: 16px;"><?php echo $res3['review'];?></p>
                            <h4><?php echo $res3['name'];?></h4>
                            <!-- <span>Profession</span> -->
                        </div>
                        <?php 
                                                          }
                                                          }?>
                        <!-- <div class="text-center">
                            <img class="img-fluid mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 100px;">
                            <p style="font-size: 22px;">Dolor eirmod diam stet kasd sed. Aliqu rebum est eos. Rebum
                                elitr dolore et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod
                                eos labore diam</p>
                            <h4>Client Name</h4>
                            <span>Profession</span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5" id="contact">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Contact</h6>
                <h1 class="font-secondary display-4">Get In Touch</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <div id="success"></div>
                        <!-- <form class="forms-sample" action="./admin/owner_form_sub.php" method="POST"> -->
                        <form class="forms-sample" action="demo.php" method="POST">
                            <div class="form-row">
                                <div class="col-sm-6 control-group">
                                    <input type="text" class="form-control bg-secondary border-0 py-4 px-3" id="name"
                                        name="name" placeholder="Your Name" required="required"
                                        data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="col-sm-6 control-group">
                                    <input type="email" class="form-control bg-secondary border-0 py-4 px-3" id="email"
                                        name="email" placeholder="Your Email" required="required"
                                        data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class=" col-sm-6 control-group">
                                <input type="tel" class="form-control bg-secondary border-0 py-4 px-3" id="number"
                                    name="number" placeholder="Contact-Number" required="required"
                                    pattern="[6-9]{1}[0-9]{9}" maxlength="10"
                                    data-validation-required-message="Please enter a valid Indian mobile number" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class=" col-sm-6 control-group">
                                <input type="text" class="form-control bg-secondary border-0 py-4 px-3" id="subject"
                                    name="subject" placeholder="Subject" required="required"
                                   
                                     />
                                <p class="help-block text-danger"></p>
                            </div>
                            </div>

                            <div class="control-group">
                                <textarea class="form-control bg-secondary border-0 py-2 px-3" rows="6" id="message"
                                    name="message" placeholder="Message" required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary font-weight-bold py-3 px-5" type="submit"
                                    id="sendMessageButton" name="enquiry_update">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-12 mb-4 px-4">
                <div class="row mb-5 p-4" style="background: rgba(256, 256, 256, .05);">
                    <div class="col-md-4">
                        <div class="text-md-center">
                            <h5 class="text-primary text-uppercase mb-2" style="letter-spacing: 5px;">Our Office</h5>
                            <p class="mb-4 m-md-0">Sirspeth Telipura,
                            Reshimbagh, Nagpur 440009.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-md-center">
                            <h5 class="text-primary text-uppercase mb-2" style="letter-spacing: 5px;">Email Us</h5>
                            <p class="mb-4 m-md-0">sunvibers7@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-md-center">
                            <h5 class="text-primary text-uppercase mb-2" style="letter-spacing: 5px;">Call Us</h5>
                            <p class="m-0">8657247205 , 79724055389</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <!-- <div class="col-md-6 mb-5">
                        <p>Et et amet ut elitr ipsum sit dolor dolor dolore. Sit accusam elitr ut diam sit rebum. Eirmod
                            duo kasd diam vero labore sea, est et et lorem ut at erat, gubergren ipsum et ipsum elitr et
                            rebum rebum</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Our Products</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white btn-scroll mb-2" href="#service"><i
                                    class="fa fa-angle-right mr-2"></i>Solar System</a>
                            <a class="text-white btn-scroll mb-2" href="#service"><i
                                    class="fa fa-angle-right mr-2"></i>Wind Turbine</a>
                            <a class="text-white btn-scroll mb-2" href="#service"><i
                                    class="fa fa-angle-right mr-2"></i>Wind Generator</a>
                            <a class="text-white btn-scroll mb-2" href="#service"><i
                                    class="fa fa-angle-right mr-2"></i>Solar Energy</a>
                            <a class="text-white btn-scroll" href="#service"><i class="fa fa-angle-right mr-2"></i>Solar
                                Panel</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- <div class="col-lg-5 col-md-12 mb-5">
                <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Newsletter</h5>
                <p>Rebum labore lorem dolores kasd est, et ipsum amet et at kasd, ipsum sea tempor magna tempor. Accu
                    kasd sed ea duo ipsum. Dolor duo eirmod sea justo no lorem est diam</p>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 30px;"
                            placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="container-fluid bg-dark text-white text-center border-top py-4 px-sm-3 px-md-5"
        style="border-color: rgba(256, 256, 256, .05) !important;">
        <p class="m-0 text-white">&copy; <a href="#">Domain Name</a>. All Rights Reserved. Designed by <a
                href="https://htmlcodex.com">HTML Codex</a></p>
    </div>
    <!-- Footer End -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Solar Energy System</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid mb-4" src="img/carousel-1.jpg" alt="">
                    <p>Sit eos diam rebum amet stet sit lorem invidunt, kasd dolor ea dolores ut nonumy, sea est rebum
                        dolore dolor. Lorem tempor tempor gubergren dolor dolor dolor. Kasd amet labore voluptua justo
                        diam, dolore accusam duo est stet nonumy tempor dolores sadipscing duo. Stet at et nonumy erat
                        et sed.</p>
                    <p>Sit eos diam rebum amet stet sit lorem invidunt, kasd dolor ea dolores ut nonumy, sea est rebum
                        dolore dolor. Lorem tempor tempor gubergren dolor dolor dolor. Kasd amet labore voluptua justo
                        diam, dolore accusam duo est stet nonumy tempor dolores sadipscing duo. Stet at et nonumy erat
                        et sed.</p>
                    <p>Sit eos diam rebum amet stet sit lorem invidunt, kasd dolor ea dolores ut nonumy, sea est rebum
                        dolore dolor. Lorem tempor tempor gubergren dolor dolor dolor. Kasd amet labore voluptua justo
                        diam, dolore accusam duo est stet nonumy tempor dolores sadipscing duo. Stet at et nonumy erat
                        et sed.</p>
                    <p>Sit eos diam rebum amet stet sit lorem invidunt, kasd dolor ea dolores ut nonumy, sea est rebum
                        dolore dolor. Lorem tempor tempor gubergren dolor dolor dolor. Kasd amet labore voluptua justo
                        diam, dolore accusam duo est stet nonumy tempor dolores sadipscing duo. Stet at et nonumy erat
                        et sed.</p>
                    <p>Sit eos diam rebum amet stet sit lorem invidunt, kasd dolor ea dolores ut nonumy, sea est rebum
                        dolore dolor. Lorem tempor tempor gubergren dolor dolor dolor. Kasd amet labore voluptua justo
                        diam, dolore accusam duo est stet nonumy tempor dolores sadipscing duo. Stet at et nonumy erat
                        et sed.</p>
                    <p>Sit eos diam rebum amet stet sit lorem invidunt, kasd dolor ea dolores ut nonumy, sea est rebum
                        dolore dolor. Lorem tempor tempor gubergren dolor dolor dolor. Kasd amet labore voluptua justo
                        diam, dolore accusam duo est stet nonumy tempor dolores sadipscing duo. Stet at et nonumy erat
                        et sed.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->


    <!-- Modal 1-->
    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Solar Energy System</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid mb-4" src="img/about_1.jpg" alt="">
                    <p>SUN VIBE is a forward-thinking solar energy company dedicated to harnessing the power of the sun
                        to create sustainable and efficient energy solutions. With a focus on innovation, reliability,
                        and environmental stewardship, SUN VIBE offers cutting-edge solar products and services designed
                        to meet the diverse needs of residential, commercial, and industrial clients.</p>
                    <p>At SUN VIBE, our mission is to drive the transition to clean energy and make solar power
                        accessible and affordable for all. We believe in the transformative power of solar energy and
                        are committed to providing top-quality solar panels, inverters, and energy storage systems. Our
                        products are designed with the latest technology to ensure maximum efficiency and durability,
                        giving our customers the best return on their investment.</p>
                    <p>Our team of experts works closely with each client to develop customized solar solutions tailored
                        to their specific needs and goals. From initial consultation and system design to installation
                        and maintenance, SUN VIBE provides comprehensive support every step of the way. Our goal is to
                        make the switch to solar energy as seamless and beneficial as possible.</p>
                    <p>Environmental stewardship is at the core of everything we do. By choosing SUN VIBE, you are not
                        only investing in your own energy independence but also contributing to a cleaner, greener
                        future. Our solar solutions help reduce carbon emissions and decrease reliance on fossil fuels,
                        paving the way for a more sustainable planet.</p>
                    <p>Experience the energy of the future with SUN VIBE, where we turn sunlight into savings. Join us
                        in our mission to create a brighter, more sustainable world.</p>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal 1 -->
    <!-- Modal on grid -->
    <div class="modal fade" id="exampleModalLong_ongrid" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> On-grid Solar Energy System</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid mb-4" src="img/ongrid_inner.png" alt="">
                    <p>On-grid solar systems, also known as grid-tied solar systems, are a popular choice for homeowners
                        and businesses. These systems are connected to the public electricity grid and allow you to use
                        solar power during the day while drawing from the grid at night or during periods of low
                        sunlight.</p>
                    <p>One of the main advantages of on-grid solar systems is the potential for net metering. Net
                        metering allows you to feed excess solar energy back into the grid in exchange for credits on
                        your electricity bill, reducing your overall energy costs.</p>
                    <p>On-grid solar systems are typically less expensive to install compared to off-grid systems
                        because they don't require battery storage. This makes them a cost-effective solution for those
                        looking to reduce their electricity bills and carbon footprint.</p>
                    <p>The installation process for on-grid solar systems involves setting up solar panels, an inverter,
                        and the necessary wiring to connect to the grid. A licensed solar installer can ensure that the
                        system is properly connected and complies with local regulations.</p>
                    <p>Maintenance for on-grid solar systems is generally minimal. Regular cleaning of the solar panels
                        and periodic checks by a professional are usually sufficient to keep the system running
                        efficiently.</p>
                    <p>Overall, on-grid solar systems provide a reliable and sustainable way to harness solar energy,
                        offering both economic and environmental benefits. By investing in solar power, you can
                        contribute to a greener future while enjoying the financial savings on your energy bills.</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal on grid -->

    <!-- Modal off_grid -->
    <div class="modal fade" id="exampleModalLong_offgrid" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">OFF-grid Solar Energy System</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid mb-4" src="img/off_grid_inner.jpeg" alt="">
                    <p>Off-grid solar systems, also known as standalone solar systems, operate independently of the
                        public electricity grid. These systems are ideal for remote areas where access to the grid is
                        unavailable or unreliable.</p>
                    <p>A key component of off-grid solar systems is battery storage. These batteries store excess solar
                        energy generated during the day for use at night or during cloudy periods, ensuring a continuous
                        power supply.</p>
                    <p>While off-grid systems are generally more expensive to install due to the cost of batteries and
                        additional equipment, they provide complete energy independence and can be a reliable power
                        source in remote locations.</p>
                    <p>The installation of off-grid solar systems requires careful planning and design to ensure that
                        the system can meet the energy needs of the property. This includes calculating energy
                        consumption, sizing the solar array, and selecting appropriate batteries and inverters.</p>
                    <p>Maintenance of off-grid systems involves regular checks and maintenance of the batteries, solar
                        panels, and other system components to ensure optimal performance and longevity.</p>
                    <p>Overall, off-grid solar systems offer a sustainable and independent energy solution, particularly
                        suited for areas with limited or no access to the public electricity grid. Investing in an
                        off-grid system can provide reliable power, reduce reliance on fossil fuels, and contribute to a
                        greener future.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal off_grid -->

    <!-- Modal hybrid_grid -->
    <div class="modal fade" id="exampleModalLong_hybridgrid" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hybrid Solar Energy System</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid mb-4" src="img/hybrid_inner.jpeg" alt="">
                    <p>Hybrid solar systems combine the best features of both on-grid and off-grid systems. These
                        systems are connected to the public electricity grid and also have battery storage to store
                        excess solar energy.</p>
                    <p>The key advantage of hybrid solar systems is their flexibility. During the day, solar panels
                        generate electricity to power your home or business, with any excess energy stored in batteries.
                        At night or during periods of low sunlight, the stored energy can be used, reducing reliance on
                        the grid.</p>
                    <p>In the event of a power outage, hybrid systems can provide backup power, ensuring a continuous
                        power supply. This makes them an ideal choice for areas with unreliable grid power or for users
                        who want additional energy security.</p>
                    <p>The installation of hybrid solar systems involves setting up solar panels, an inverter, and
                        battery storage, along with the necessary wiring to connect to both the grid and the batteries.
                        A professional installer can ensure the system is properly configured and compliant with local
                        regulations.</p>
                    <p>Maintenance for hybrid solar systems includes regular cleaning of solar panels, periodic checks
                        of the inverter and batteries, and ensuring all components are functioning correctly. Proper
                        maintenance ensures the longevity and efficiency of the system.</p>
                    <p>Overall, hybrid solar systems offer a versatile and reliable energy solution. They provide the
                        benefits of solar power with the added security of battery backup and grid connectivity, making
                        them a smart investment for both residential and commercial applications.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal hybrid_grid -->



    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-outline-primary btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>