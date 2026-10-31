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

  .otp-form {
    height: 100%;
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

    #login-page {
      margin: 120px 0;
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

  .popup {
    position: fixed;
    height: 100%;
    z-index: 80000;
    width: 100%;
    display: grid;
    place-items: center;
    place-content: center;
    background: rgba(0, 0, 0, 0.5);
  }

  .popup img {
    height: 100vh;
    padding: 30px 0;
  }

  #close {
    position: absolute;
    background: #fff;
    color: #1b56a5;
    right: 32%;
    top: 32px;
    padding: 3px 12px;
    border-radius: 52px;
    border: none;

  }

  #login-page {
    margin: 100px 0;
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
  <!--<div class="popup">-->
  <!--    <img src="assets/img/home-popup.jpg"/>-->
  <!--    <button id="close"><i class="fa-solid fa-xmark"></i></button>-->
  <!--</div>-->
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
                <li class=""><a href="index.php">Home</a> </li>
                <li class=""><a href="aboutus.php">About Assi</a></li>
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
                <li class="menu-item-has-children"><a href="https://www.assi.in/index.php#events">Events </a>
                  <ul>
                    <li> <a href="#Upcoming-Meetings">Upcoming events</a></li>
                    <!--<li><a href="#">Associated International Events </a></li>-->
                  </ul>
                </li>

                <!--<li class="menu-item-has-children"><a href="#">ISJ</a>-->
                <!--  <ul>-->
                <!--    <li> <a href="#">Author Instructions</a></li>-->
                <!--    <li><a href="#">Current Issue</a></li>-->
                <!--    <li><a href="#">Advertisement Tariff</a></li>-->
                <!--    <li><a href="#">Journal</a></li>-->
                <!--  </ul>-->
                <!--</li>-->
                <!--<li><a href="#">Assi Research</a>-->
                <!--</li>-->
                <!--<li><a href="#">News Letter</a>-->
                <!--</li>-->
                <li class="menu-item-has-children"><a href="#">Membership</a>
                  <ul>
                    <li> <a href="membership-registration.php">Online Membership Registration</a></li>
                    <!--<li><a href="#">Value Added Subscription Service-->
                    <!--    (VASS)</a></li>-->
                    <!--<li><a href="#">Offline Registration</a></li>-->
                    <!--<li><a href="#">Payment Options</a></li>-->
                  </ul>
                </li>
                <li class=""><a href="contact-us.php">Contact Us</a> </li>

                <li class="log-in"><a href="login-page.php"><button>Login</button></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </header>
  <!-- End Header Section -->

  <section id="login-page" class="background-top-filled cs_pt_70 cs_pt_lg_75 cs_pb_70 cs_pb_lg_80"
    data-src="assets/img/gallery_bg.jpeg">
    <div class="container-fluid">
      <div style="align-items: center;" class="row">
        <div class="col-xl-7 col-lg-7 cs_mb_lg_60 latest-news">
          <div class="cs_service_list cs_mb_40">
            <h2 class="cs_fs_20 text-white text-uppercase bg-accent cs_pl_30 cs_pr_30 cs_pt_23 cs_pb_23 m-0">Latest News
            </h2>
            <ul id="style-2" class=" scrollbar m-0 cs_pl_30 cs_pr_30 cs_pt_30 cs_pb_30">
              <li><a class="active" target="_blank" href="assets/img/assi/assi-research-grant-application-form.doc">ASSI
                  Research Grant
                  Application Form - Research Grant 2024 <img class="new-icon" src="assets/img/assi/new-icon.png"
                    alt=""><i class="fa-solid fa-arrow-right-long"></i></a></li>

              <li><a class="active" target="_blank" href="assets/img/assi/latest-news1.jpg">ASSI - Statement
                  of Solidarity <i class="fa-solid fa-arrow-right-long"></i></a></li>

              <li><a target="_blank" href="assets/img/assi/4th-Basic-Research-Methodology-Workshop.jpg">4th Basic
                  Research Methodology Workshop<i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a target="_blank" href="assets/img/assi/agenda-2.pdf">Agenda - 4th Basic Research
                  Methodology Workshop<i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a target="_blank" href="assets/img/assi/ASSI-extended-deadline-for-fellowship-2024-2026.jpg"
                  class="">Call for applications for ASSI Fellowship
                  Extended deadline from 9th July to 20th July<i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a target="_blank" href="assets/img/assi/ics.pdf">ICS 2024 Instructional Course in
                  Spine<i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a target="_blank" href="assets/img/assi/sub-banner3.jpg">Call For Applications For Assi Fellowship<i
                    class="fa-solid fa-arrow-right-long"></i></a>
              </li>
              <li><a target="_blank" href="assets/img/assi/sub-banner.jpg">Get Your Abstract Ready Submission Will Start
                  on 1st
                  September 2024 <i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a target="_blank" href="assets/img/assi/sub-banner1.jpg">Annual Conference of Association of Spine
                  Surgeons of India<i class="fa-solid fa-arrow-right-long"></i></a></li>
            </ul>
          </div>
        </div>
        <div class=" otp-form bg-gray col-lg-5 cs_pl_30 cs_pr_30 cs_pt_55 cs_pb_60">
          <h2 class="cs_fs_26 cs_mb_25 text-center text-white">Member Login</h2>
          <form action="login.php" method="post">
            <input name="identifier" class="form-control cs_fs_14 cs_rounded_5 border-0 cs_mb_15 bg-white" type="text"
              placeholder="Email or User Id">
            <input name="password" class="form-control cs_fs_14 cs_rounded_5 border-0 cs_mb_15 bg-white" type="password"
              placeholder="Password">
            <button type="submit" name="submit"
              class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden w-100"><span>Login</span></button>
            <button type="submit" name="forget_password"
              class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden w-100"><span>Forgot
                Password?</span></button>
          </form>
          <h4 class="h4 pt-5">Applicant Membership ₹5,900/-</h4>
          <p class="p">Rs. 5000/- + Rs. 900/- (18% GST)</p>
          <h4 class="h4">Associate Membership ₹5,310/-</h4>
          <p class="p">Rs. 4500/- + Rs. 810/- (18% GST)</p>
          <h4 class="h4">International Membership</h4>
          <p class="p">USD 200</p>
        </div>
      </div>
    </div>

  </section>
  <!-- End Our Latest Project -->







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
  <script>
    $(document).ready(function () {

      //select the POPUP FRAME and show it
      $(".popup").hide().fadeIn(1000);

      //close the POPUP if the button with id="close" is clicked
      $("#close").on("click", function (e) {
        e.preventDefault();
        $(".popup").fadeOut(1000);
      });
      $(".popup").on("click", function (e) {
        e.preventDefault();
        $(".popup").fadeOut(1000);
      });

    });
  </script>
</body>

</html>