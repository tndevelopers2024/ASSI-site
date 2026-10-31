<?php
include 'config.php';

// If user is logged in and hasn't been redirected yet
if (isset($_SESSION['user_id']) && !isset($_SESSION['redirected'])) {
  $_SESSION['redirected'] = true; // Set flag to avoid repeated redirection
  header('location: dashboard.php');
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
</head>

<style>
  .banner-hero {
    height: 90vh;
  }

  .cs_service.cs_style_1 .cs_service_thumb {
    margin-left: -16px;
    width: calc(93% + 50px);
  }

  .cs_service.cs_style_1 {
    border-top: 3px solid #1b56a5;
    border-radius: 7px;
  }

  .video-section {
    height: 100% !important;
  }

  .cs_video_block.cs_style_1 {
    height: 500px;
  }

  .cs_width_80 {
    width: 50px;
  }

  .banner-content {
    text-align: left;
    position: relative;
  }

  .cs_hero_text {
    text-align: left !important;
  }

  .banner-content p {
    color: #fff;
  }

  .banner-content h3 {
    color: #fff;
    font-weight: 600;
  }

  .sub-banner img {
    width: 50%;
  }

  .h4 {
    color: #fff;
    text-align: center;
  }

  .p {
    color: #fff;
    text-align: center;
  }

  .cs_service.cs_style_1 .cs_service_thumb-in {
    border-radius: inherit;
    background-size: contain;
  }

  .sub-banner {
    display: flex;
    gap: 30px;
  }

  .new-icon {
    width: 5%;
    margin-left: 15px;
  }

  .cs_height_80 {
    height: 50px;
  }

  @media(max-width:600px) {
    .cs_hero_text {
      text-align: center !important;
    }

    .sub-banner {
      gap: 5px !important;
    }

    .new-icon {
      display: none !important;
    }

    .banner-content {
      text-align: center !important;
    }

    .banner-content br {
      display: none !important;
    }

    .cs_service.cs_style_1 .cs_service_thumb {
      margin-left: 0px !important;
      width: calc(92% + 30px) !important;
    }

    .floating-div img {
      right: 15px !important;
      z-index: 9999;
      width: 45% !important;
    }
  }


  .floating-div img {
    position: fixed;
    bottom: 30px;
    right: 10px;
    z-index: 9999;
    width: 15%;
    background-color: #000;
    padding: 5px;
    border-radius: 5px;
  }


  #payment-section {
    display: flex;
    justify-content: center;
  }

  .payment-section {
    text-align: center;
    padding: 80px 0;
  }

  input[type="checkbox" i] {
    height: 25px;
    width: 25px;
    margin-top: 5px;
    border: 1px solid #e4322c;
    appearance: none;
    /* Remove default checkbox styling */
    -webkit-appearance: none;
    /* For WebKit browsers */
    outline: none;
    cursor: pointer;
    position: relative;
  }

  input[type="checkbox" i]::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: white;
    /* Background color when unchecked */
    border-radius: 4px;
  }

  input[type="checkbox" i]:checked {
    background-color: #4caf50;
    /* Change this to the desired checked color */
    border: 1px solid #4caf50;
  }

  input[type="checkbox" i]:checked::before {
    background-color: #4caf50;
    /* Change this to the desired checked color */
    content: "✔";
    /* Checkmark */
    color: white;
    font-size: 16px;
    text-align: center;
    line-height: 20px;
  }

  .payment-checkbox label {
    color: #fff;
    font-size: 24px;
    font-weight: 500;
    padding-left: 8px;
    position: relative;
  }

  .payment-button {
    margin-top: 30px;
  }

  .payment-button button {
    width: 60% !important;
  }

  .otp-form {
    height: auto !important;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }

  .otp-form h2 {
    position: relative;
    font-size: 32px;
    margin-bottom: 5px;
  }

  .otp-form span {
    position: relative;
    color: #fff;
    font-weight: 300;
  }

  .otp-form::before {
    content: '';
    background-color: #0000009c;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    position: absolute;
    border-radius: 20px;
  }
</style>

<body>
  <div class="cs_preloader cs_accent_color cs_white_bg">
    <div class="cs_preloader bg-white d-flex justify-content-center align-items-center">
      <div class="cs_preloader_in">
        <img src="assets/img/assi/assi-logo.png" alt="Logo">
      </div>
    </div>
  </div>


  <div class="floating-div">
    <a target="_blank" href="https://www.assicon2025bengaluru.com/"><img src="assets/img/icons/float.png" alt=""></a>
  </div>
  <!-- Start Header Section -->
  <header class="cs_site_header cs_style_1 cs_sticky_header cs_site_header_full_width">
    <div class="cs_top_header">
      <div class="container">
        <div class="cs_top_header_in">
          <div class="cs_top_header_left">
            <ul class="cs_top_nav d-flex flex-wrap align-items-center cs_fs_12 text-white m-0 p-0">
              <li><b class="fw-medium text-white">Address:</b> C/O Indian Spinal Injuries Centre,
                Sector-C, Vasant Kunj,
                New Delhi- 110070.</li>
              <li><a href="mailto:assisecretariat@assi.in">assisecretariat@assi.in</a></li>
            </ul>
          </div>
          <div class="cs_top_header_right">
            <ul class="cs_top_nav d-flex flex-wrap align-items-center cs_fs_12 text-white m-0 p-0">
              <li><a href="">Help</a></li>
              <li><a href="">Support</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="cs_main_header">
      <div class="container">
        <div class="cs_main_header_in">
          <div class="cs_main_header_left">
            <a class="cs_site_branding" href="index.php">
              <img src="assets/img/assi/assi-logo.png" alt="Logo">
            </a>
            <div class="cs_nav cs_primary_font fw-medium">
              <ul class="cs_nav_list fw-medium text-uppercase">
                <li class="menu-item-has-children"><a href="aboutus.php">About Assi</a>
                  <ul>
                    <li> <a href="aboutus.php">History</a></li>
                    <li><a href="aboutus.php">Past President</a></li>
                    <li><a href="aboutus.php">Office Bearers</a></li>
                    <li><a href="aboutus.php">Sub Committees</a></li>
                    <li><a href="aboutus.php">Eligibility Criteria For Various Posts of ASSI</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="education.php">Committee </a>
                  <ul>
                    <li> <a href="aboutus.php#sub-commitee">Education Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">Research & Award Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">Program Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">Website Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">Advocacy Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">Finance Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">Nomination & Constitution Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">ASSI Case Discussion Forum Sub-Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">ISJ Sub-Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">ASSI Outreach Program Sub-committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">ASSI Spine Registry Sub-Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">Scoliosis Screening Sub=Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">ASSI Membership Sub-Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">ASSI Elearnspine.org Sub-Committee
                      </a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="education.php">Events </a>
                  <ul>
                    <li> <a href="#Upcoming-Meetings">Upcoming events</a></li>
                    <!-- <li><a href="#">Associated International Events </a></li> -->
                  </ul>
                </li>

                <!-- <li class="menu-item-has-children"><a href="#">ISJ</a>
                  <ul>
                    <li> <a href="#">Author Instructions</a></li>
                    <li><a href="#">Current Issue</a></li>
                    <li><a href="#">Advertisement Tariff</a></li>
                    <li><a href="#">Journal</a></li>
                  </ul>
                </li>
                <li><a href="#">Assi Research</a>
                </li>
                <li><a href="#">News Letter</a>
                </li> -->
                <li class="menu-item-has-children"><a href="#">Membership</a>
                  <ul>
                    <li> <a href="#">Online Membership Registration</a></li>
                    <!-- <li><a href="#">Value Added Subscription Service
                        (VASS)</a></li>
                    <li><a href="#">Offline Registration</a></li>
                    <li><a href="#">Payment Options</a></li> -->
                  </ul>
                </li>
                <li class="https://www.assi.in/contact.php"><a href="#">Contact Us</a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </header>
  <!-- End Header Section -->

  <div class="pay_banner" >
      <div class="pay-btn">
          <h1>
              Life Membership (Life Time Access)
          </h1>
          <P>Click here to pay and get your life membership</P>
          <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_PLXRTJMNjBqqNs" async> </script> </form>
      </div>
      
  </div>



  <style>
  .pay_banner{
          padding: 210px 20px 100px;
    display: flex;
    justify-content: center;
  }
  .pay-btn{
       box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    width: 52%;
    padding: 50px;
    text-align: center;
    display: grid;
    place-items: center;
  }
  .pay-btn h1{
          font-size: 34px;
  }
    @media(max-width:600px) {
        .pay-btn {
    width: 100%;
    padding: 30px;
        }
        .pay_banner {
    padding: 160px 20px 60px;
        }
        .pay-btn h1 {
    font-size: 26px;
}
    }
  </style>




  <script>
    function uncheckOther(selectedId, otherId) {
      const selectedCheckbox = document.getElementById(selectedId);
      const otherCheckbox = document.getElementById(otherId);

      if (selectedCheckbox.checked) {
        otherCheckbox.checked = false;
      }
    }
  </script>



  <!-- Start Footer -->
  <footer class="cs_footer background-filled text-white" data-src="assets/img/assi/footer_bg.jpeg">
    <div class="container">
      <div
        class="cs_footer_top d-flex justify-content-between align-items-start align-items-md-center cs_pt_46 cs_pb_46 cs_column_gap_15 cs_row_gap_15 flex-md-row  flex-column">
        <div class="cs_footer_contact_info">
          <h3 class="text-accent fw-normal cs_mb_4 cs_fs_16 cs_lh_lg">Have Any Question?</h3>
          <h2 class="text-white fw-medium m-0 cs_fs_22">8929991288</h2>
        </div>
        <div style="width: 30%;" class="cs_footer_logo wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s"><img
            src="assets/img/assi/ASSI-footer.png" alt="Logo"></div>
        <div class="cs_footer_contact_info">
          <h3 class="text-accent fw-normal cs_mb_4 cs_fs_16 cs_lh_lg">Send Email</h3>
          <h2 class="text-white fw-medium m-0 cs_fs_22"><a class="mail"
              href="mailto:assisecretariat@assi.in">assisecretariat@assi.in</a></h2>
        </div>
      </div>
      <div class="cs_footer_main cs_pt_30 cs_pb_30">
        <div class="row">
          <div class="col-lg-4">
            <div class="cs_footer_item cs_pt_20 cs_pb_20">
              <div class="cs_text_widget">
                <p>ASSI remains committed to Education, Training and Research.
                  We find ourselves devoted to enhancing the quality of our fellowship programs, improving our research
                  endeavours
                  to match global standards and introducing novel concepts of simulated learning.</p>
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
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Support </a></li>
                <li><a href="#">Pricing Page</a></li>
                <li><a href="#">New Projects</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="privacy-policy.php">Privacy Policy</a></li>
                <li><a href="terms-conditions.php">Terms and Conditions</a></li>
                <li><a href="refund-policy.php">Refund Policy</a></li>
                <li><a href="membership-registration.php">Membership Registration</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="cs_footer_item cs_pt_20 cs_pb_20">
              <div class="cs_newsletter cs_style_1">
                <h2 class="cs_newsletter_title text-white cs_fs_22 cs_mb_9">Newsletter</h2>
                <form action="#" class="cs_newsletter_form position-relative">
                  <input type="email"
                    class="cs_newsletter_input text-white cs_fs_14 cs_rounded_5 border-0 w-100 cs_pt_10"
                    placeholder="Enter your mail">
                  <button
                    class="cs_newsletter_btn cs_fs_14 cs_rounded_5 cs_transition_4 bg-accent position-absolute text-uppercase">
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
        <p class="m-0">Copyright © 2023 <a href="index.php">Assi</a>. All rights reserved.</p>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <!-- Script -->


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