<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="">
  <title>FixBug - Application</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/elegant.css" type="text/css">
  <!-- Script: Make my navbar transparent when the document is scrolled to top -->
  <script src="<?php echo base_url();?>assets/front/js/navbar-ontop.js"></script>
  <!-- Script: Animated entrance -->
  <script src="<?php echo base_url();?>assets/front/js/animate-in.js"></script>
   <!-- favicon -->
   <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>assets/material/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/material/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/material/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/material/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url();?>assets/material/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/material/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body>
  <!-- Navbar -->
  <nav class="navbar-expand-md navbar-dark bg-dark navbar fixed-top">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar3SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item mx-3">
            <a class="nav-link text-light" href="#"><b>About Me</b></a>
          </li>
        </ul>
        <a class="btn navbar-btn btn-secondary mx-2" href="<?php echo site_url('user/sign_up');?>"><b>Daftar</b></a>
        <a class="btn navbar-btn btn-secondary mx-2" href="<?php echo site_url('user/login');?>"><b>Masuk</b></a>
      </div>
    </div>
  </nav>
  <!-- Cover -->
  <div class="align-items-center d-flex photo-overlay py-5 cover" style="background-image: url('<?php echo base_url();?>assets/front/img/computer_keyboard_mouse_laptop_mac_apple_66734_1920x1080.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center text-lg-left text-center">
          <h3 class="display-3" style="font-family:calibri;"><b><u>FixBug</u></b></h3>
          <p>PT. Intek Sarana Sejahtera</p>
        </div>
        <div class="col-lg-6 align-self-center text-lg-right text-center">
        <img class="display-9" src="<?php echo base_url();?>assets/material/images/fix_bug_logo.png" alt="">
        </div>

      </div>
    </div>
  </div>
  <!-- Intro -->
  <div class="bg-dark py-5">
    <div class="container">
      <div class="row my-5 bg-secondary animate-in-down">
        <div class="p-4 col-md-6 bg-primary">
          <p class="mb-1">&nbsp;My research, my future</p>
          <h2 class="mb-1">Bill Gates</h2> <i class="fa d-inline-block fa-star text-white"></i><i class="fa d-inline-block fa-star mx-1 text-white"></i><i class="fa d-inline-block fa-star text-white"></i>
          <p class="my-4">Considered one of the most brilliant chef of our time. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultrices nes, pellentesque eu, pretium quis, sem.</p>
          <img class="img-fluid d-block"
            src="<?php echo base_url();?>assets/front/img/signature.png" width="300"> </div>
        <div class="p-0 col-md-6">
          <img class="img-fluid d-block" src="<?php echo base_url();?>assets/front/img/14791_workstudyf.jpg"> </div>
      </div>
    </div>
  </div>
  <!-- Gallery -->
  <div class="">
    <div class="container-fluid">
      <div class="row">
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/1.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/goblet-drum_icon-icons.com_60044.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/icon-idea-design.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/video-seo-icon-png-16.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/CleverBaby.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/Custom_Coding-512.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/development.desktop-512.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/ModernXP-74-Software-Install-icon.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/graphic_design_digital_illustrator_drawing_photoshop_software_imac_designer_studio_production_flat_design_icon-512.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/51+XQwGdRnL.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img src="<?php echo base_url();?>assets/front/img/6cdcfad63c487e445cc69083b916f2a9-red-check-mark-by-vexels.png" class="img-fluid"> </div>
        <div class="p-0 col-md-2 col-4">
          <img class="img-fluid" src="<?php echo base_url();?>assets/front/img/iOS App Icon Rounded.png"> </div>
      </div>
    </div>
  </div>
  <!-- Menu -->
  <div class="py-5 text-center" id="menu">
    <div class="container">
      <div class="row p-4 my-5 bg-primary animate-in-down">
        <div class="col-md-12">
          <h2 class="mt-3">Rule Of Point Researcher</h2>
          <p class="mb-5">Week #26</p>
          <div class="row">
            <div class="col-md-4">
              <h5>High Recomended</h5>
              <ul class="list-unstyled">
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
              </ul>
            </div>
            <div class="col-md-4">
              <h5>Medium Recomended</h5>
              <ul class="list-unstyled">
                <li class="my-4">Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
              </ul>
            </div>
            <div class="col-md-4">
              <h5>Low Recomended</h5>
              <ul class="list-unstyled">
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
                <li class="my-4">Is About Rule....Is About Rule....Is About Rule....Is About Rule....Is About Rule....</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Carousel reviews -->
  <div class="p-5 text-center photo-overlay" style="background-image: url('<?php echo base_url();?>assets/front/img/wallpaper-hd-for-computer-famed-computer-for-computer-wallpapers-hd-hd-wallpaper-computer-hd-art-hd-wallpaper-wallpaper-for-computer.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="carousel slide" data-ride="carousel" id="carouselArchitecture">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item">
                <img class="d-block img-fluid rounded-circle mx-auto" src="<?php echo base_url();?>assets/front/img/testimonial_1_dark.jpg" data-holder-rendered="true" width="200">
                <p class="my-3">So good Researcher.
                  <br>Go for the shrimps!.</p> <i class="fa fa-star d-inline"></i><i class="fa fa-star mx-1 d-inline"></i><i class="fa fa-star d-inline"></i><i class="fa fa-star mx-1 d-inline"></i><i class="fa fa-star-o d-inline"></i> </div>
              <div class="carousel-item active">
                <img class="d-block img-fluid rounded-circle mx-auto" src="<?php echo base_url();?>assets/front/img/testimonial_1_dark.jpg.png" data-holder-rendered="true" width="200">
                <p class="">Mohammad Gaza || 224000 Points || 1st Researcher &nbsp;</p> <i class="fa fa-star d-inline"></i><i class="fa fa-star mx-1 d-inline"></i><i class="fa fa-star d-inline"></i><i class="fa fa-star-half-o mx-1 d-inline"></i><i class="fa fa-star-o d-inline"></i>                </div>
              <div class="carousel-item">
                <img class="d-block img-fluid rounded-circle mx-auto" src="<?php echo base_url();?>assets/front/img/testimonial_2_dark.jpg" data-holder-rendered="true" width="200">
                <p class="my-3">Super enthusiastic about this it.
                  <br>Myhobby is Researcher</p> <i class="fa fa-star d-inline"></i><i class="fa fa-star mx-1 d-inline"></i><i class="fa fa-star d-inline"></i><i class="fa fa-star mx-1 d-inline"></i> <i class="fa fa-star d-inline"></i> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Carousel venue -->
  <div class="py-3" id="venue">
    <div class="container">
      <div class="row my-5 bg-primary animate-in-down">
        <div class="p-4 col-md-6 align-self-center">
          <p class="mb-1">Feel comfortable, like home</p>
          <h2 class="">Discover the Resesarch</h2>
          <p class="my-3">Explanation Research it&nbsp;Explanation Research it&nbsp;Explanation Research it&nbsp;Explanation Research it&nbsp;Explanation Research it&nbsp;Explanation Research it&nbsp;Explanation Research it</p>
          <a href="#" class="btn-outline-light mb-3 p-2 btn">View the Documentation</a>
        </div>
        <div class="p-0 col-md-6">
          <div class="carousel slide" data-ride="carousel" id="carousel1">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid w-100" src="<?php echo base_url();?>assets/front/img/cara-memilih-CMS-website-toko-online-terbaik-Tranyar.png" atl="first slide">
                <div class="carousel-caption">
                  <h3>Q &amp; A&nbsp;</h3>
                  <p>Question and Answer</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="<?php echo base_url();?>assets/front/img/venue_3_dark.jpg" data-holder-rendered="true">
                <div class="carousel-caption">
                  <h3>SSSS</h3>
                  <p>Enjoy our </p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="<?php echo base_url();?>assets/front/img/venue_2_dark.jpg" data-holder-rendered="true">
                <div class="carousel-caption">
                  <h3>CCCC</h3>
                  <p>Tastes better</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="<?php echo base_url();?>assets/front/img/venue_4_dark.jpg" data-holder-rendered="true">
                <div class="carousel-caption">
                  <h3>Relax area</h3>
                  <p>TSSSSSl</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
            <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Events -->
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row animate-in-down">
        <div class="col-md-12">
          <p class="m-0 text-center">We gladly invite you to our happenings.</p>
          <h2 class="mb-3 text-primary text-center">Upcoming events</h2>
          <div class="row">
            <div class="col-md-4 p-3">
              <img class="img-fluid d-block w-100 mb-3" src="<?php echo base_url();?>assets/front/img/iOS App Icon Rounded.png">
              <p class="lead text-muted mb-1">26th July, 2018</p>
              <h5 class="text-dark"><b>Research Seminar</b></h5>
              <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
              <a href="#" class="btn btn-outline-secondary"><b class="">Book now!</b></a>
            </div>
            <div class="col-md-4 p-3">
              <img class="img-fluid d-block w-100 mb-3" src="<?php echo base_url();?>assets/front/img/video-seo-icon-png-16.png">
              <p class="lead text-muted mb-1">30th August, 2018</p>
              <h5 class="text-dark"><b>Training</b></h5>
              <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
              <a href="#" class="btn btn-outline-secondary"><b class="">Go to event</b></a>
            </div>
            <div class="col-md-4 p-3">
              <img class="img-fluid d-block w-100 mb-3" src="<?php echo base_url();?>assets/front/img/graphic_design_digital_illustrator_drawing_photoshop_software_imac_designer_studio_production_flat_design_icon-512.png">
              <p class="lead text-muted mb-1">1st October, 2018</p>
              <h5 class="text-dark"><b>Workshop</b></h5>
              <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
              <a href="#" class="btn btn-outline-secondary"><b class="">Read more</b></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Dark opaque section -->
  <div class="py-5 photo-overlay" id="book" style="background-image: url(&quot;<?php echo base_url();?>assets/front/img/makereservation_dark.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-lg-6 p-3 animate-in-down">
          <form class="p-4 bg-dark-opaque" method="post" action="https://formspree.io/">
            <h4 class="mb-4 text-center">Masuk Sebagai Reseacher</h4>
            <p class="my-4">Jika kamu adalah researcher silahkan masuk dan buat penelitianmu sebagai report dengan rekomendasi terbaik &nbsp;dan dapatkan point penelitianmu...</p>
            <div class="form-group"> <label>Username</label>
              <input class="form-control" placeholder="Type here"> </div>
            <div class="form-group"> <label>Password</label>
              <input class="form-control" placeholder="Type here"> </div>
            <button type="submit" class="btn mt-4 btn-block p-2 btn-outline-primary"><b>Masuk Researcher</b></button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <div class="text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4 p-4">
          <h2 class="mb-4">Contact</h2>
          <p class="m-0">
            <a href="tel:+246 - 542 550 5462" class="text-white">+6222 - 542 550 5462</a>
          </p>
          <p>
            <a href="mailto:info@intek-ss.co.id" class="text-white">i</a>nteksaranasejahtera</p>
        </div>
        <div class="col-md-4 p-4">
          <h2 class="mb-4">Location</h2>
          <p>Batununggal, Indonesia</p>
        </div>
        <div class="col-md-4 p-4">
          <h2 class="mb-4">Mail</h2>
          <p>info@intek-ss.co.id</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-muted">© Copyright 2018 - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
  <!-- JavaScript dependencies -->
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js"></script>
</body>

</html>