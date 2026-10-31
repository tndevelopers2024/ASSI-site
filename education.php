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
</head>

<style>
  .banner-hero {
    height: 80vh;
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
  <!-- Start Header Section -->
  <?php include "header.php" ?>

  <!-- start hero Section -->
  <section class="cs_page_header position-relative background-filled d-flex align-items-center justify-content-between"
    data-src="assets/img/assi/bg.jpg" style="background-image: url(&quot;assets/img/page_header_1.jpeg&quot;);">
    <div class="container position-relative z-index-1">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-white cs_fs_18 cs_mb_5">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Education</li>
        </ol>
      </nav>
      <h1 class="cs_fs_48 cs_fs_lg_36 text-white m-0">Education</h1>
    </div>
    <div class="position-absolute end-0 bottom-0">
      <svg width="660" height="497" viewBox="0 0 660 497" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M240 0H660L430 497H0L240 0Z" fill="url(#paint0_linear_81_9510)"></path>
        <defs>
          <linearGradient id="paint0_linear_81_9510" x1="330" y1="78.2497" x2="375.052" y2="780.743"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="white" stop-opacity="0" offset="none"></stop>
            <stop offset="0.9999" stop-color="#D9D9D9" stop-opacity="0.35"></stop>
            <stop offset="1" stop-color="#222121" stop-opacity="0"></stop>
            <stop offset="1" stop-color="#222121" stop-opacity="0"></stop>
          </linearGradient>
        </defs>
      </svg>
    </div>
  </section>
  <!-- End hero -->
  <!-- start tab Section -->

  <div id="tabs-group-4" class="tab-group tab-group--4">

    <h2 class="tab-group__title">ASSI Education</h2>

    <div class="js-tabs" data-existing-hx="h3" data-tabs-prefix-class="hb">
      <ul class="js-tablist">
        <li class="js-tablist__item"><a class="js-tablist__link" href="#Fellowships">Fellowships</a></li>
        <li class="js-tablist__item"><a class="js-tablist__link" href="#Fellowship-Centers">Fellowship Centers</a></li>
        <li class="js-tablist__item"><a class="js-tablist__link" href="#Teaching">Teaching Courses and Activities</a>
        </li>

      </ul>
      <div class="js-tabcontent" id="Fellowships">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
              ASSI 2 Year Fellowship Program
              </h3>
              <a href="assets/pdf/ASSI-2-Year-Fellowship-Program-converted.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
              Fellowship Entry Criteria and Exit Exam Criteria
              </h3>
              <a href="assets/pdf/ASSI-Fellowship-Entry-and-Exit-Exam-Criteria.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
              ASSI Spine Fellowship Handbook
              </h3>
              <a href="assets/pdf/ASSI-Spine-Fellowship-Handbook.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
              ASSI Spine Fellows (Past and Current) Details
              </h3>
              <a href="assets/pdf/past-and-current-assi-fellows__1_.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
              Fellowship Application Guidelines
              </h3>
              <a href="assets/pdf/Fellowship-Application-Guidelines.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
              ASSI Short Term Observership Program In Minimal Invasive Spine (MIS)
              </h3>
              <a href="assets/pdf/ASSI-Short-Term-Fellowship-Specialty-Program-Minimally-Invasive.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 m-auto">
            <div class="edu-card">
              <h3>
              ASSI Short Term Observership Program In Deformities
              </h3>
              <a href="assets/pdf/ASSI_Short_term_fellowship_deformities.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 m-auto">
            <div class="edu-card">
              <h3>
              ASSI Short Term Observership Program In Endoscopic spine surgery
              </h3>
              <a href="assets/pdf/ASSI_Short_term_fellowship_Endoscopy.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 m-auto">
            <div class="edu-card">
              <h3>
              ASSI Short Term Observership Program In Robotics and Navigation
              </h3>
              <a href="assets/pdf/ASSI_Short_term_fellowship_Robotics_and_Navigation.pdf">View More</a>
            </div>
          </div>

        </div>
      </div>
      <div class="js-tabcontent" id="Fellowship-Centers">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                Apollo Hospital, Chennai
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/APOLLO-HOSPITAL.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                B J Medical College, Ahmedabad
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/BJ-MEDICAL-COLLEGE.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                Bombay Hospital, Mumbai
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/BOMBAY-HOSPITAL.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                Ganga Hospital, Coimbatore
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/GANGA-MEDICAL-CENTER-AND-HOSPITAL.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                P D Hinduja National Hospital and MRC, Mumbai
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/P-D-HINDUJA-NATIONAL-HOSPITAL-AMD-MRC.pdf">View
                More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                Kothari Medical Center, Kolkatta
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/KOTHARI-MEDICAL-CENTRE-KOLKATA.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                Indian Spinal Injuries Center, New Delhi
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/ISIC.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                Lilvathi Hospital and Research Center, Mumbai
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/SANCHETI-HOSPITAL.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 ">
            <div class="edu-card">
              <h3>
                Sancheti Institue of Orthopaedics and Rehabilitaion, Pune
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/SANCHETI-HOSPITAL.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 ">
            <div class="edu-card">
              <h3>
                Stavya Spine hospital and Research Institute, Gujarat
              </h3>
              <a href="https://www.assi.in/pdf/fellowship_centers/STAVYA-HOSPITAL.pdf">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 ">
            <div class="edu-card">
              <h3>
                Supplementary Information
              </h3>
              <a href="https://www.assi.in/pdf/fellowship-centers/supplementary-information.pdf">View More</a>
            </div>
          </div>

        </div>
      </div>
      <div class="js-tabcontent" id="Teaching">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                Live Courses
              </h3>
              <a href="http://assilivesurgerycourse.isiconline.org/index.html">View More</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="edu-card">
              <h3>
                Online Activities
              </h3>
              <a href="https://www.assi.in/webinars.php">View More</a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <!-- End tab Section -->
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
                <li><a href="#">About</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Support </a></li>
                <li><a href="#">Pricing Page</a></li>
                <li><a href="#">New Projects</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="">Privacy Policy</a></li>
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
        <p class="m-0">Copyright © 2023 <a href="index.html">Assi</a>. All rights reserved.</p>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <!-- Script -->

  <script>
    // Function to scroll the content vertically
    function autoScroll() {
      let element = document.getElementById('style-2');
      element.scrollBy({
        top: 75, // Scroll down 5 pixels (you can adjust this value)
        behavior: 'smooth' // Smooth scrolling behavior
      });
      if (element.scrollTop >= (element.scrollHeight - element.clientHeight)) {
        // Reset scrollTop when reaching the bottom
        element.scrollTop = 0;
      }
    }

    // Set interval for auto-scrolling
    setInterval(autoScroll, 2000); // Scroll every 2 seconds
  </script>
  <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/plugins/isotope.pkg.min.js"></script>
  <script src="assets/js/plugins/jquery.slick.min.js"></script>
  <script src="assets/js/plugins/odometer.js"></script>
  <script src="assets/js/plugins/ripples.min.js"></script>
  <script src="assets/js/plugins/wow.min.js"></script>
  <script src="assets/js/plugins/swiper.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/tabs.js"></script>
</body>

</html>