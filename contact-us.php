<?php
session_start();

// Check if 'logout' parameter is set
if (isset($_GET['logout'])) {
  // Clear all session variables
  $_SESSION = array();

  // Destroy the session
  session_destroy();

  // Redirect the user to index.php (or login-page.php)
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Favicon Icon -->
  <link rel="icon" href="assets/img/assi/assi-logo.png">
  <!-- Site Title -->
  <title>Assi</title>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/plugins/slick.css">
  <link rel="stylesheet" href="assets/css/plugins/animate.css">
  <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">
  <link rel="stylesheet" href="assets/css/plugins/odometer.css">
  <link rel="stylesheet" href="assets/css/default.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .cs_page_header {
      height: 400px !important;
    }

    .px-20 {
      padding: 0px 10rem;
    }

    .member-form {
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
      padding: 4rem;
      border-radius: 10px;
    }

    .catlist {
      list-style: none;
      padding: 0;
    }

    .catlist li {
      padding-bottom: 10px;
    }

    .sublist {
      margin-top: 20px;
      list-style: none;

    }

    .sublist li {
      position: relative;
      padding-left: 20px;
      margin-bottom: 10px;
    }

    .sublist li::before {
      position: absolute;
      content: '\27B2';
      left: -2px;
      top: 0px;
      font-size: 20px;
    }

    .terms ul {
      list-style: none;
      padding: 0;
    }

    .terms ul li {
      position: relative;
      padding-left: 20px;
      margin-bottom: 10px;
    }

    .terms ul li::before {
      position: absolute;
      content: '\27B2';
      left: -2px;
      top: 0px;
      font-size: 20px;
    }

    .degree {
      display: flex;
      gap: 30px;
      padding-bottom: 20px;
    }

    @media (max-width:600px) {
      .member-form {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        padding: 1.5rem;
        margin: 20px 0 0 !important;
        border-radius: 10px;
      }
    }

    .contact {
      height: 100%;
      width: 100%;
      object-fit: cover;
      border-radius: 10px;
      position: relative;
      /* Ensure the position can be animated */
      animation: float 3s ease-in-out infinite;
      /* Define the animation */
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0);
        /* Start and end at the original position */
      }

      50% {
        transform: translateY(-10px);
        /* Move up slightly */
      }
    }

    .contact-us {
      padding: 100px 0;
    }
  </style>

</head>

<body>
  <div class="cs_preloader cs_accent_color cs_white_bg">
    <div class="cs_preloader bg-white d-flex justify-content-center align-items-center">
      <div class="cs_preloader_in">
        <img src="assets/img/assi/assi-logo.png" alt="Logo">
      </div>
    </div>
  </div>
  <!--<div class="popup">-->
  <!--    <img src="assets/img/home-popup.jpg"/>-->
  <!--    <button id="close"><i class="fa-solid fa-xmark"></i></button>-->
  <!--</div>-->
  <!--<div class="floating-div">-->
  <!--  <a target="_blank" href="https://www.assicon2025bengaluru.com/"><img src="assets/img/icons/float.png" alt=""></a>-->
  <!--</div>-->
  <!-- Start Header Section -->
  <?php include "header.php" ?>


  <!--Hero Section -->
  <section class="cs_page_header position-relative background-filled d-flex align-items-center justify-content-between"
    data-src="assets/img/assi/bg.jpg" style="background-image: url(&quot;assets/img/assi/bg.jpg&quot;);">
    <div class="container position-relative z-index-1">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-white cs_fs_18 cs_mb_5">
          <li class="breadcrumb-item">
            <a href="index.php">Home</a>
            <i class="fa-solid fa-chevron-right"></i>
          </li>
        </ol>
      </nav>
      <h1 class="cs_fs_48 cs_fs_lg_36 text-white m-0">Contact Us</h1>
    </div>
  </section>
  <!-- End Hero Section -->


  <div class="container contact-us">
    <div class="row">
      <div class="col-lg-6">
        <img class="contact" src="assets/img/assi/contact-us.avif" alt="">
      </div>

      <div class="col-lg-6">
        <h2 class="mx-4">We Love to Hear From You!</h2>
        <form action="contact-form.php" method="post">
          <div class="form-check">
            <label for="name" class="form-label">Name</label>
            <input required type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
          </div>

          <div class="form-check mt-3">
            <label for="email" class="form-label">Email ID</label>
            <input required type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
          </div>

          <div class="form-check mt-3">
            <label for="number" class="form-label">Phone Number</label>
            <input required type="tel" class="form-control" id="number" name="number" placeholder="Enter your Number">
          </div>

          <div class="form-check mt-3">
            <label for="message" class="form-label">Query</label>
            <textarea required="" placeholder="Enter your message here" class="form-control" id="message" name="message"
              rows="3"></textarea>
          </div>

          <div class="form-check mt-3">
            <button type="submit" class="btn btn-primary" name="submitBtn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div style="text-align:center;" class="container pb-5">
    <div style="justify-content: center;" class="row">
      <h4>Head Office</h4>
      <p>C/O Indian Spinal Injuries Centre, Sector-C,<br> Vasant Kunj, New Delhi- 110070.</p>
      <p>Email: <a style="color:#e4322c" href="mailto:assisecretariat@assi.in">assisecretariat@assi.in</a></p>
      <p>Phone: <a style="color:#e4322c" href="tel:8929991288">8929991288</a></p>
    </div>
  </div>



  <script src="https://www.google.com/recaptcha/api.js?render=6Lcqf34qAAAAAJ2SH_RTOe-uMzMyLtCOmS8gkDvw"></script>
  <script>
    grecaptcha.ready(function () {
      grecaptcha.execute('6Lcqf34qAAAAAJ2SH_RTOe-uMzMyLtCOmS8gkDvw', { action: 'submit' }).then(function (token) {
        document.getElementById('recaptchaResponse').value = token;
      });
    });
  </script>
  </div>


  <!-- footer section -->
  <footer class="cs_footer background-filled text-white" data-src="assets/img/assi/footer_bg.jpeg"
    style="background-image: url(&quot;assets/img/assi/footer_bg.jpeg&quot;);">
    <div class="container">
      <div
        class="cs_footer_top d-flex justify-content-between align-items-start align-items-md-center cs_pt_46 cs_pb_46 cs_column_gap_15 cs_row_gap_15 flex-md-row flex-column">
        <div class="cs_footer_contact_info">
          <h3 class="text-accent fw-normal cs_mb_4 cs_fs_16 cs_lh_lg">
            Have Any Question?
          </h3>
          <h2 class="text-white fw-medium m-0 cs_fs_22">8929991288</h2>
        </div>
        <div
          style="width: 30%; visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: zoomIn;"
          class="cs_footer_logo wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">
          <img src="assets/img/assi/ASSI-footer.png" alt="Logo">
        </div>
        <div class="cs_footer_contact_info">
          <h3 class="text-accent fw-normal cs_mb_4 cs_fs_16 cs_lh_lg">
            Send Email
          </h3>
          <h2 class="text-white fw-medium m-0 cs_fs_22">
            <a class="mail" href="mailto:assisecretariat@assi.in">assisecretariat@assi.in</a>
          </h2>
        </div>
      </div>
      <div class="cs_footer_main cs_pt_30 cs_pb_30">
        <div class="row">
          <div class="col-lg-4">
            <div class="cs_footer_item cs_pt_20 cs_pb_20">
              <div class="cs_text_widget">
                <p>
                  ASSI remains committed to Education, Training and Research.
                  We find ourselves devoted to enhancing the quality of our fellowship programs,
                  improving our research
                  endeavours
                  to match global standards and introducing novel concepts of simulated learning.
                </p>
              </div>
              <div class="cs_social_btns d-flex flex-wrap cs_column_gap_15 cs_row_gap_15 cs_transition_5">
                <a href="#"
                  class="d-flex align-items-center justify-content-center cs_height_35 cs_width_35 text-white rounded-circle"><i
                    class="fa-brands fa-facebook-f"></i></a>
                <a href="#"
                  class="d-flex align-items-center justify-content-center cs_height_35 cs_width_35 text-white rounded-circle"><i
                    class="fa-brands fa-twitter"></i></a>
                <a href="#"
                  class="d-flex align-items-center justify-content-center cs_height_35 cs_width_35 text-white rounded-circle"><i
                    class="fa-brands fa-linkedin-in"></i></a>
                <a href="#"
                  class="d-flex align-items-center justify-content-center cs_height_35 cs_width_35 text-white rounded-circle"><i
                    class="fa-brands fa-dribbble"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <div class="cs_footer_item cs_pt_20 cs_pb_20">
              <h2 class="cs_widget_title text-white cs_fs_22 cs_mb_22">Explore</h2>
              <ul class="cs_menu_widget text-uppercase">
                <li><a href="aboutus.php">About</a></li>
                <li><a href="aboutus.php#sub-commitee">
                    Committee</a></li>
                <li><a href="index.php#events">
                    Events</a></li>
                <li><a href="membership-registration.php">Membership </a></li>
                <li><a href="contact-us.php">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="cs_footer_item cs_pt_20 cs_pb_20">
              <div class="cs_newsletter cs_style_1">
                <h2 class="cs_newsletter_title text-white cs_fs_22 cs_mb_9">
                  Newsletter
                </h2>
                <form action="#" class="cs_newsletter_form position-relative">
                  <input type="email"
                    class="cs_newsletter_input text-white cs_fs_14 cs_rounded_5 border-0 w-100 cs_pt_10"
                    placeholder="Enter your mail" fdprocessedid="d5gka">
                  <button
                    class="cs_newsletter_btn cs_fs_14 cs_rounded_5 cs_transition_4 bg-accent position-absolute text-uppercase"
                    fdprocessedid="2u8d3">
                    <span>Go</span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs_copyright text-center cs_fs_124 cs_lh_lg cs_pt_20 cs_pb_20">
      <div class="container">
        <p class="m-0">
          Copyright © 2024 <a href="index.php">Assi</a>. All rights reserved.
        </p>
      </div>
    </div>
  </footer>
  <!-- end footer section -->
  <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/plugins/isotope.pkg.min.js"></script>
  <script src="assets/js/plugins/jquery.slick.min.js"></script>
  <script src="assets/js/plugins/odometer.js"></script>
  <script src="assets/js/plugins/ripples.min.js"></script>
  <script src="assets/js/plugins/wow.min.js"></script>
  <script src="assets/js/plugins/swiper.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>