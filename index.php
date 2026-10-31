<?php
session_start();

// Handle logout
if (isset($_GET['logout'])) {
  // Unset all session variables
  $_SESSION = array();

  // Destroy the session
  session_destroy();

  // Redirect to the login page or home page
  header("Location: login-page.php");
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
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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

  .video-section::before {
    content: "";
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    background-color: #00000000 !important;
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
    height: fit-content !important;
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

  .carousel-control-next,
  .carousel-control-prev {
    display: none !important;
  }

  @media(max-width:600px) {
    .cs_hero_text {
      text-align: center !important;
    }

    .sub-banner {
      gap: 5px !important;
    }

    .new-icon {
      display: inline-block !important;
      width: 30px;
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

    .cs_service_list a.active {
      display: flex;
      align-items: center;
    }

  }

  .image-1 {
    height: 360px;
    object-fit: cover;
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

  .height-div {
    height: 150px;
    text-align: center;
    background-color: #1b56a5;
    place-content: center;
    border-bottom-left-radius: 7px;
    border-bottom-right-radius: 7px;
  }

  .home-bg {
    height: 100%;
    display: flex;
    align-items: center;
  }

  .scroll-container {
    width: 100%;
    overflow: hidden;
    background: #1B56A5;
    padding: 8px 0;
    display: flex;
  }

  .scroll-text {
    display: inline-block;
    white-space: nowrap;
    animation: scroll-right 30s linear infinite;
    font-size: 20px;
    color: #fff;
  }

  .scroll-text a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
  }

  .scroll-text a:hover {
    color: #E4322C;
  }

  @keyframes scroll-right {
    from {
      transform: translateX(100%);
    }

    to {
      transform: translateX(-100%);
    }
  }

  @media(max-width:600px) {
    @keyframes scroll-right {
      from {
        transform: translateX(20%);
      }

      to {
        transform: translateX(-100%);
      }
    }
  }
</style>

<body>

  <?php include "header.php" ?>
  <!-- End Header Section -->

  <!-- Popup HTML -->
  <div class="popup" style="display: none;">
    <button id="close" style="position:absolute; top:20px; right:30px; font-size:30px; color:#fff; background:none; border:none; z-index:9999;"><i class="fa-solid fa-xmark"></i></button>
    <a id="popupAnchor" href="#" target="_blank">
        <img id="popupImage" src="" alt="Popup Image" style="max-height: 90vh;">
    </a>
  </div>

  <!--<div class="floating-div">-->
  <!--     <a target="_blank" href="https://assilive25.com/"><img src="assets/img/icons/float.jpg"-->
  <!--             alt=""></a>-->
  <!-- </div>-->


  <!-- <section>
    <div class="swiper-container">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <section
            class=" cs_hero banner-hero cs_style_2 d-flex align-items-center justify-content-center background-filled  position-relative overflow-hidden cs_ripple_version"
            style="background: linear-gradient(90deg, rgba(0,21,153,0.6547794117647058) 0%, rgba(0,0,0,0) 66%), url('assets/img/Banner/banner 1.jpeg'); background-size: cover; background-position: top; background-repeat:no-repeat;">
            <div class="container">
              <div class="cs_hero_text position-relative cs_zindex_3 text-center wow fadeInUp" data-wow-duration="0.8s"
                data-wow-delay="0.2s">
                <div class="banner-content">
                  <h3>
                    About Association of Spine<br> Surgeons of India
                  </h3>
                  <p>ASSI remains committed to Education, Training and Research.<br> We find ourselves devoted to
                    enhancing the
                    quality of our fellowship <br> programs, improving our research endeavours to match global
                    standards<br> and
                    introducing novel concepts of simulated learning.</p>
                </div>
                <a href="aboutus.php"
                  class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                    Assi</span></a>
              </div>
            </div>
            <div class="opacity-75 position-absolute w-100 h-100 start-0 top-0"></div>

          </section>
        </div>
        <div class="swiper-slide">
          <section
            class=" cs_hero banner-hero cs_style_2 d-flex align-items-center justify-content-center background-filled  position-relative overflow-hidden cs_ripple_version"
            style="background: linear-gradient(90deg, rgba(0,21,153,0.6547794117647058) 0%, rgba(0,0,0,0) 66%), url('assets/img/Banner/banner 2.jpeg'); background-size: cover; background-position: top;">
            <div class="container">
              <div class="cs_hero_text position-relative cs_zindex_3 text-center wow fadeInUp" data-wow-duration="0.8s"
                data-wow-delay="0.2s">
                <div class="banner-content">
                  <h3>
                    About Association of Spine<br> Surgeons of India
                  </h3>
                  <p>ASSI remains committed to Education, Training and Research.<br> We find ourselves devoted to
                    enhancing the
                    quality of our fellowship <br> programs, improving our research endeavours to match global
                    standards<br> and
                    introducing novel concepts of simulated learning.</p>
                </div>
                <a href="aboutus.php"
                  class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                    Assi</span></a>
              </div>
            </div>
            <div class="opacity-75 position-absolute w-100 h-100 start-0 top-0"></div>

          </section>
        </div>
        <div class="swiper-slide">
          <section
            class=" cs_hero banner-hero cs_style_2 d-flex align-items-center justify-content-center background-filled  position-relative overflow-hidden cs_ripple_version"
            style="background: linear-gradient(90deg, rgba(0,21,153,0.6547794117647058) 0%, rgba(0,0,0,0) 66%), url('assets/img/Banner/banner 3.jpeg'); background-size: cover; background-position: center;">
            <div class="container">
              <div class="cs_hero_text position-relative cs_zindex_3 text-center wow fadeInUp" data-wow-duration="0.8s"
                data-wow-delay="0.2s">
                <div class="banner-content">
                  <h3>
                    About Association of Spine<br> Surgeons of India
                  </h3>
                  <p>ASSI remains committed to Education, Training and Research.<br> We find ourselves devoted to
                    enhancing the
                    quality of our fellowship <br> programs, improving our research endeavours to match global
                    standards<br> and
                    introducing novel concepts of simulated learning.</p>
                </div>
                <a href="aboutus.php"
                  class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                    Assi</span></a>
              </div>
            </div>
            <div class="opacity-75 position-absolute w-100 h-100 start-0 top-0"></div>

          </section>
        </div>
        <div class="swiper-slide">
          <section
            class=" cs_hero banner-hero cs_style_2 d-flex align-items-center justify-content-center background-filled  position-relative overflow-hidden cs_ripple_version"
            style="background: linear-gradient(90deg, rgba(0,21,153,0.6547794117647058) 0%, rgba(0,0,0,0) 66%), url('assets/img/Banner/banner 4.jpeg'); background-size: cover; background-position: center; background-position-y: -120px;">
            <div class="container">
              <div class="cs_hero_text position-relative cs_zindex_3 text-center wow fadeInUp" data-wow-duration="0.8s"
                data-wow-delay="0.2s">
                <div class="banner-content">
                  <h3>
                    About Association of Spine<br> Surgeons of India
                  </h3>
                  <p>ASSI remains committed to Education, Training and Research.<br> We find ourselves devoted to
                    enhancing the
                    quality of our fellowship <br> programs, improving our research endeavours to match global
                    standards<br> and
                    introducing novel concepts of simulated learning.</p>
                </div>
                <a href="aboutus.php"
                  class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                    Assi</span></a>
              </div>
            </div>
            <div class="opacity-75 position-absolute w-100 h-100 start-0 top-0"></div>

          </section>
        </div>
        <div class="swiper-slide">
          <section
            class=" cs_hero banner-hero cs_style_2 d-flex align-items-center justify-content-center background-filled  position-relative overflow-hidden cs_ripple_version"
            style="background: linear-gradient(90deg, rgba(0,21,153,0.6547794117647058) 0%, rgba(0,0,0,0) 66%), url('assets/img/Banner/banner 5.jpeg'); background-size: cover; background-position: center;">
            <div class="container">
              <div class="cs_hero_text position-relative cs_zindex_3 text-center wow fadeInUp" data-wow-duration="0.8s"
                data-wow-delay="0.2s">
                <div class="banner-content">
                  <h3>
                    About Association of Spine<br> Surgeons of India
                  </h3>
                  <p>ASSI remains committed to Education, Training and Research.<br> We find ourselves devoted to
                    enhancing the
                    quality of our fellowship <br> programs, improving our research endeavours to match global
                    standards<br> and
                    introducing novel concepts of simulated learning.</p>
                </div>
                <a href="aboutus.php"
                  class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                    Assi</span></a>
              </div>
            </div>
            <div class="opacity-75 position-absolute w-100 h-100 start-0 top-0"></div>

          </section>
        </div>

      </div>
      <div class="swiper-button-next" style="right: 46px;"></div>
      <div class="swiper-button-prev" style="left: 46px;"></div>
    </div>
  </section> -->

  <div id="carouselExampleFade" class="carousel slide carousel-fade" style="padding:0;" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="carousel-img"
          style="height:100vh;  background: linear-gradient(90deg, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 66%), url('assets/img/Banner/banner 1.jpeg'); background-size: cover; background-position: top; background-repeat:no-repeat;">
          <div class="container home-bg">
            <div class="cs_hero_text position-relative cs_zindex_3 text-left wow fadeInUp" data-wow-duration="0.8s"
              data-wow-delay="0.2s">
              <div class="banner-content">
                <h3>About Association of Spine<br> Surgeons of India</h3>
                <p style="font-weight:400; margin-bottom:15px;">ASSI remains committed to Education, Training and
                  Research.<br> We find ourselves devoted to
                  enhancing the
                  quality of our fellowship <br> programs, improving our research endeavours to match global
                  standards<br> and
                  introducing novel concepts of simulated learning.</p>
              </div>
              <a href="aboutus.php"
                class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                  Assi</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="carousel-img"
          style="height:100vh;  background: linear-gradient(90deg, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 66%), url('assets/img/Banner/banner 2.jpeg'); background-size: cover; background-position: top; background-repeat:no-repeat;">
          <div class="container home-bg">
            <div class="cs_hero_text position-relative cs_zindex_3 text-left wow fadeInUp" data-wow-duration="0.8s"
              data-wow-delay="0.2s">
              <div class="banner-content">
                <h3>
                  About Association of Spine<br> Surgeons of India
                </h3>
                <p style="font-weight:400; margin-bottom:15px;">ASSI remains committed to Education, Training and
                  Research.<br> We find ourselves devoted to
                  enhancing the
                  quality of our fellowship <br> programs, improving our research endeavours to match global
                  standards<br> and
                  introducing novel concepts of simulated learning.</p>
              </div>
              <a href="aboutus.php"
                class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                  Assi</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="carousel-img"
          style="height:100vh;  background: linear-gradient(90deg, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 66%), url('assets/img/Banner/banner 3.jpeg'); background-size: cover; background-position: top; background-repeat:no-repeat;">
          <div class="container home-bg">
            <div class="cs_hero_text position-relative cs_zindex_3 text-left wow fadeInUp" data-wow-duration="0.8s"
              data-wow-delay="0.2s">
              <div class="banner-content">
                <h3>
                  About Association of Spine<br> Surgeons of India
                </h3>
                <p style="font-weight:400; margin-bottom:15px;">ASSI remains committed to Education, Training and
                  Research.<br> We find ourselves devoted to
                  enhancing the
                  quality of our fellowship <br> programs, improving our research endeavours to match global
                  standards<br> and
                  introducing novel concepts of simulated learning.</p>
              </div>
              <a href="aboutus.php"
                class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                  Assi</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="carousel-img"
          style="height:100vh;  background: linear-gradient(90deg, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 66%), url('assets/img/Banner/banner 4.jpeg'); background-size: cover; background-position: top; background-repeat:no-repeat;">
          <div class="container home-bg">
            <div class="cs_hero_text position-relative cs_zindex_3 text-left wow fadeInUp" data-wow-duration="0.8s"
              data-wow-delay="0.2s">
              <div class="banner-content">
                <h3>
                  About Association of Spine<br> Surgeons of India
                </h3>
                <p style="font-weight:400; margin-bottom:15px;">ASSI remains committed to Education, Training and
                  Research.<br> We find ourselves devoted to
                  enhancing the
                  quality of our fellowship <br> programs, improving our research endeavours to match global
                  standards<br> and
                  introducing novel concepts of simulated learning.</p>
              </div>
              <a href="aboutus.php"
                class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                  Assi</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="carousel-img"
          style="height:100vh;  background: linear-gradient(90deg, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0) 66%), url('assets/img/Banner/banner 5.jpeg'); background-size: cover; background-position: top; background-repeat:no-repeat;">
          <div class="container home-bg">
            <div class="cs_hero_text position-relative cs_zindex_3 text-left wow fadeInUp" data-wow-duration="0.8s"
              data-wow-delay="0.2s">
              <div class="banner-content">
                <h3>
                  About Association of Spine<br> Surgeons of India
                </h3>
                <p style="font-weight:400; margin-bottom:15px;">ASSI remains committed to Education, Training and
                  Research.<br> We find ourselves devoted to
                  enhancing the
                  quality of our fellowship <br> programs, improving our research endeavours to match global
                  standards<br> and
                  introducing novel concepts of simulated learning.</p>
              </div>
              <a href="aboutus.php"
                class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>About
                  Assi</span></a>
            </div>
          </div>
        </div>
      </div>


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="scroll-container mt-2">
    <div class="scroll-text">
      <a href="#">⭐ ASSI Outreach Program on Sunday, 31st May 2026 at MGM Medical College, Aurangabad, Maharashtra, by
        Dr. Faisal Rehman Khan, Orthopedic and Spine Surgeon, Apple Multispeciality Hospital. ⭐</a>
    </div>
    <div class="scroll-text">
      <a href="#">⭐ ASSI Outreach Program on Sunday, 21st June 2026 at Venjaramoodu, Thiruvananthapuram, Kerala, by Dr.
        Suresh S. Pillai, Department of Spine Surgery, Sree Gokulam Medical College Hospital. ⭐</a>
    </div>

  </div>






  <!-- End Hero -->
  <!-- Start Service Section -->

  <!--<section class="assi">-->
  <!--  <div class="container">-->
  <!--    <div style="align-items: center;" class="row">-->
  <!--      <div class="col-lg-5">-->
  <!--        <div class="association">-->
  <!--          <img src="assets/img/assi/sub-banner1.jpg" alt="">-->
  <!--        </div>-->
  <!--      </div>-->
  <!--      <div class="col-lg-7">-->
  <!--        <div class="sub-banner cs_pl_40 cs_pr_40 cs_pt_40 cs_pb_40 cs_pl_lg_25 cs_pr_lg_25 cs_pt_lg_25 cs_pb_lg_25">-->
  <!--          <img src="assets/img/assi/ics.jpg" alt="">-->
  <!--          <img src="assets/img/assi/sub-banner2.jpg" alt="">-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</section>-->

  <!-- Start Our Latest Project -->
  <section class="background-top-filled cs_pt_70 cs_pt_lg_75 cs_pb_70 cs_pb_lg_80"
    data-src="assets/img/gallery_bg.jpeg">
    <div class="container-fluid">
      <div style="align-items: center;" class="row">
        <div class="col-xl-7 col-lg-7 cs_mb_lg_60 latest-news">
          <div class="cs_service_list cs_mb_40">
            <h2 class="cs_fs_20 text-white text-uppercase bg-accent cs_pl_30 cs_pr_30 cs_pt_23 cs_pb_23 m-0">Latest News
            </h2>
            <ul id="style-2" class=" scrollbar m-0 cs_pl_30 cs_pr_30 cs_pt_30 cs_pb_30">
              <li><a class="active popup-link" data-link="https://drive.google.com/drive/folders/1B0ZpZO7YuGIt0SDHq11vCB_zt0wy0wuG?usp=sharing"
                  href="assets/img/awards.jpeg">ASSI Awards 2027<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i
                    class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="active popup-link" data-link="https://drive.google.com/drive/folders/14hPBIevvIQ7MkG94ZyjsmznvlU2Q2lAz?usp=drive_link"
                  href="assets/img/letter.jpeg">ASSI election 2027<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i
                    class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="active" target="_blank"
                  href="assets/img/Result-of-the-ASSI-Spine-Fellowship-online-counseling.pdf">Result of the ASSI Spine
                  Fellowship - online counseling<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i
                    class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="active" target="_blank"
                  href="assets/img/Top_40_selected_for_counseling-ASSI_Spine_Fellowship_Online_Entrance_Exam_2026.pdf">Top
                  40 selected for counseling-ASSI Spine Fellowship Online Entrance Exam 2026<img class="new-icon"
                    src="assets/img/assi/new-icon.png" alt=""><i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="active" target="_blank"
                  href="assets/img/FINAL-Advertisement-ASSI-fellowship-2026-2028.pdf">Call for Applications for the ASSI
                  02 Spine Surgery Fellowship for the year 2026–2028<img class="new-icon"
                    src="assets/img/assi/new-icon.png" alt=""><i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="active" target="_blank" href="http://www.ics2026bhopal.com">ICS 2026 – Bhopal<img
                    class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i
                    class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="active" target="_blank" href="http://www.assicon2027jaipur.com">ASSICON 2027 – Jaipur<img
                    class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i
                    class="fa-solid fa-arrow-right-long"></i></a></li>
              <!-- <li><a class="active" target="_blank" href="https://forms.gle/hWA9hEUjK5YdbcMh8">GBM Voting<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i class="fa-solid fa-arrow-right-long"></i></a></li> -->
              <li><a class="active" target="_blank" href="assets/img/ASSI-Memorandum-Jan-2026.pdf">Memorandum of
                  Association for Member Review and Suggestions<img class="new-icon" src="assets/img/assi/new-icon.png"
                    alt=""><i class="fa-solid fa-arrow-right-long"></i></a></li>
              <!-- <li><a class="active" target="_blank" href="assets/img/assi/Webinar-4-10th-January-2026.pdf">Webinar 4 - 10th January 2026<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i class="fa-solid fa-arrow-right-long"></i></a></li> -->
              <!-- <li><a class="active" target="_blank" href="assets/img/ASSI-SPIN-OUTREACH-PROGRAM-1.pdf">ASSI SPIN OUTREACH PROGRAM 1<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i class="fa-solid fa-arrow-right-long"></i></a></li> -->
              <li><a class="active" target="_blank" href="assets/img/ASSI-Outreach-Agenda-13th-Dec.pdf">ASSI Outreach
                  Agenda 13th Dec<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i
                    class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="active" target="_blank"
                  href="assets/img/Assi-research-grant-application-form-with-extended-date.doc">ASSI Research Grant
                  Application Form withExtended Date<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i
                    class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="active" target="_blank"
                  href="assets/img/Last-Date-Extended-for-Advertisement-for-Research-Grant-2025-to-30.11.2025.pptx">Last
                  Date Extended for Advertisement for Research Grant 2025 to 30.11.2025<img class="new-icon"
                    src="assets/img/assi/new-icon.png" alt=""><i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="" target="_blank" href="assets/img/Assi-research-grant-application-form.doc">ASSI Research
                  Grant Application Form<i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="" target="_blank" href="assets/img/assi/Advertisement-for-Research-Grant-2025.pptx">Call for
                  Proposals for ASSI Research Grant Award 2025<i class="fa-solid fa-arrow-right-long"></i></i></a></li>
              <li><a class="" target="_blank"
                  href="assets/img/assi/Announcement-for-ASSI-ELECTION-2026.pdf">Announcement for ASSI ELECTION 2026<i
                    class="fa-solid fa-arrow-right-long"></i></i></a></li>
              <li><a class="" target="_blank" href="assets/img/assi/ASSI-ELECTION-2026-Nomination-Form.docx">ASSI
                  ELECTION 2026 Nomination Form<i class="fa-solid fa-arrow-right-long"></i></a></li>
              <!-- <li><a class="" target="_blank" href="assets/img/assi/ASSI_Live-Program_08_10_2025.pdf">ASSI Operative Course 2025 Final Programme (17-19 OCT)<i class="fa-solid fa-arrow-right-long"></i></i></a></li>
              <li><a class="" target="_blank" href="assets/img/assi/RESULT-ASSI-EXIT-Exam-2023-2025.pdf">ASSI Spine Fellowship Exit Examination 2025 for the batch 2023-2025<i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a class="" target="_blank" href="assets/img/assi/Format - for ASSI Travelling fellowship 2026.doc">Format - for ASSI Travelling fellowship 2026<i class="fa-solid fa-arrow-right-long"></i></a></li> -->
              <!-- <li><a class="active" target="_blank" href="assets/img/assi/ASSI - Call for Applicatons for various ASSI Awards 2026.pdf">ASSI - Call for Applicatons for various ASSI Awards 2026<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i class="fa-solid fa-arrow-right-long"></i></i></a></li>
              <li><a class="" target="_blank" href="assets/img/ASSI-online-entrance-Exam-RESULT.pdf">Rank Wise Result - Spine Surgery Clinical Fellowship (2025-2027)<i class="fa-solid fa-arrow-right-long"></i></i></a></li>
              <li><a class="" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSdvIPOH0NVn8DZQ2Ti2Z2Zr_TZiu9JWme23b_AnALOp9C7dtQ/viewform?usp=header">Register for ASSI SCOLI WEEK 2025<i class="fa-solid fa-arrow-right-long"></i></i></a></li>
              <li><a target="_blank" href="https://forms.gle/icmrwYaHwkruovaW9">ASSI Fellows Teaching Course on 10th August 2025<i class="fa-solid fa-arrow-right-long"></i></i></a></li> -->
              <!-- <li><a class="active" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSfJv_uZ6CZtRU7VvXrqsR09yx1Xng5yeQTjPegsJCWft1Jwfw/viewform">Click here to apply for ASSI Fellowship 2025 - 2027<img class="new-icon" src="assets/img/assi/new-icon.png" alt=""><i
                    class="fa-solid fa-arrow-right-long"></i></i></a></li> -->
              <!-- <li><a target="_blank" href="assets/img/assi/RegistrationForm_A4.pdf">ASSI Live Operative Course 2025 Registration Form<i
                    class="fa-solid fa-arrow-right-long"></i></i></a></li>

              <li><a target="_blank" href="assets/img/assi/Brochure.pdf">ASSI Live Operative Course
                  2025 Details <i class="fa-solid fa-arrow-right-long"></i></a></li>
              <li><a target="_blank" href="assets/img/assi/assi-research-grant-application-form.doc">ASSI
                  Research Grant
                  Application Form - Research Grant 2024 <i class="fa-solid fa-arrow-right-long"></i></a></li> -->
            </ul>
          </div>
        </div>
        <div class=" otp-form bg-gray col-lg-5 cs_pl_30 cs_pr_30 cs_pt_55 cs_pb_60">
          <h2 class="cs_fs_26 cs_mb_25 text-center text-white">Member Login</h2>
          <form action="login.php" method="post">
            <input required name="identifier" class="form-control cs_fs_14 cs_rounded_5 border-0 cs_mb_15 bg-white"
              type="text" placeholder="Email or User Id ">
            <input name="password" class="form-control cs_fs_14 cs_rounded_5 border-0 cs_mb_15 bg-white" type="password"
              placeholder="Password">
            <button type="submit" name="submit"
              class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden w-100"><span>Login</span></button>
            <button type="submit" name="forget_password"
              class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden w-100"><span>Forgot
                Password?</span></button>
          </form>
          <!-- <h4 class="h4 pt-5 text-light">Primary Membership </h4>
          <p class="p">(2 Years Access) – 3000/- +GST</p>
          <h4 class="h4 text-light">Primary Membership </h4>
          <p class="p">(5 Years Access) – 6000/- +GST</p> -->
        </div>
      </div>
    </div>

  </section>
  <!-- End Our Latest Project -->

  <!-- Start Team Section -->
  <section class="cs_pb_55 cs_pt_70 cs_pb_lg_0">
    <div class="container">
      <div class="cs_section_heading cs_style_1 d-flex align-items-center text-center cs_mb_60 cs_mb_lg_40">
        <div class="cs_section_heading_in">
          <h3 class="cs_fs_20 cs_fs_lg_18 text-accent fw-normal cs_lh_base cs_mb_10 wow fadeInUp"
            data-wow-duration="0.8s" data-wow-delay="0.2s">Meet Our Team Member</h3>
          <h2 class="cs_fs_48 cs_fs_lg_36 m-0">Current Office Bearers</h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Dr. S.K. Srivastava.png" alt="Card 1">
            <div class="height-div">
              <h4>President</h4>
              <p>Dr. SK Srivastava
              </p>
              <p>(2025-27)</p>
              <!--<a href="">president@assi.in-->
              <!--  saumyajitbasu@hotmail.com</a>-->
            </div>

          </div>
        </div>

        <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Appaji.png" alt="Card 1">
            <div class="height-div">
              <h4>Secretary</h4>
              <p>Dr. Appaji Krishnan</p>
              <p>(2025-27)</p>
              <!--<a href="">president@assi.in-->
              <!--  saumyajitbasu@hotmail.com</a>-->
            </div>

          </div>
        </div>

        <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Dr. Naresh Babu.png" alt="Card 4">
            <div class="height-div">
              <h4>Joint Secretary and<br> Treasurer </h4>
              <p>Dr. Naresh Babu
              </p>
              <p>(2025-2027)</p>
              <!--<a href="">jtsecretary@assi.in-->
              <!--  appajikrishnan@gmail.com</a>-->
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/DR Ajoy.png" alt="Card 2">
            <div class="height-div">
              <h4>President Elect</h4>
              <p>Dr. Ajoy Shetty
              </p>
              <p>(2025-26)</p>
              <!--<a href="">kemh_sks@yahoo.co.in</a>-->
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Team Section -->

  <!-- Start About Section -->
  <section class="cs_pt_135 cs_pt_lg_75 cs_pb_70 cs_pb_lg_80 position-relative">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 cs_mb_lg_55">
          <div class="cs_experience cs_style_1 position-relative">
            <div class="cs_experience_thumb">
              <img src="assets/img/Home Page/1.jpeg" alt="Thumb"
                class="position-relative cs_zindex_3 cs_rounded_15 image-1">
              <div class="cs_experience_shape"><img src="assets/img/experience_shape_1.png" alt="Shape"
                  class="moving_x"></div>
            </div>
            <div
              class="cs_experience_box background-filled text-center bg-white cs_rounded_10 position-absolute bottom-0 end-0 cs_zindex_3 d-flex flex-column justify-content-center align-items-center about-img"
              data-src="assets/img/Home Page/2.jpeg" style="background-image:url('assets/img/Home Page/2.jpeg')">
              <img src="assets/img/experience_icon.svg" alt="Icon" class="cs_mb_5">
              <!-- <h3 class="text-white cs_fs_60 cs_fs_lg_46 fw-bold lh_1 mb-0 d-flex justify-content-between">
                <span data-count-to="40" class="odometer"></span>
                <span class="fw-light">+</span>
              </h3> -->
              <!-- <h2 class="cs_fs_18 fw-normal text-white m-0">Work Experience</h2> -->
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="cs_about cs_style_1">
            <div class="cs_section_heading cs_style_1 d-flex align-items-center cs_mb_15">
              <div class="cs_section_heading_in">
                <h3 class="cs_fs_20 cs_fs_lg_18 text-accent fw-normal cs_lh_base cs_mb_10 wow fadeInLeft"
                  data-wow-duration="0.8s" data-wow-delay="0.2s">Join our
                  team</h3>
                <h2 class="cs_fs_48 cs_fs_lg_36 cs_mb_20">Become a Member</h2>
                <p class="m-0">Embrace a community committed to advancing innovation and excellence in spine
                  surgery—become a member and shape the future of spinal healthcare.</p>
              </div>
            </div>
            <hr style="border-top: 1.3px solid #e4322c;opacity: 0.7;margin-bottom: 20px;">
            <div class="row cs_mb_15">
              <div class="col-lg-6">
                <div class="cs_about-icon-box position-relative cs_mb_25">
                  <span
                    class="position-absolute cs_height_20 cs_width_20 top-0 start-0 cs_mt_5 bg-accent text-white cs_fs_10 d-flex align-items-center justify-content-center cs_rounded_30"><i
                      class="fa-solid fa-angles-right"></i></span>
                  <h3 class="cs_fs_16 cs_pl_30 cs_mb_12 cs_lh_lg">ASSI Life Membership:</h3>
                  <p class="m-0">Access to Journals, events and Database</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="cs_about-icon-box position-relative cs_mb_25">
                  <span
                    class="position-absolute cs_height_20 cs_width_20 top-0 start-0 cs_mt_5 bg-accent text-white cs_fs_10 d-flex align-items-center justify-content-center cs_rounded_30"><i
                      class="fa-solid fa-angles-right"></i></span>
                  <h3 class="cs_fs_16 cs_pl_30 cs_mb_12 cs_lh_lg">Value Added Annual Subscriptions:</h3>
                  <p class="m-0">Everything in ASSI life Membership and Access to Premium journals and features. </p>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center cs_row_gap_20 cs_column_gap_30 cs_column_gap_lg_20 flex-wrap">
              <a href="https://www.assi.in/membership-registration.php"
                class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>Click
                  here to Join</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs_section_shape-1 position-absolute semi_rotate">
      <svg width="182" height="177" viewBox="0 0 182 177" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M94.4478 96.1115C106.99 105.211 120.6 111.159 132.748 112.86C132.823 112.871 132.894 112.876 132.967 112.886L150.387 27.5688C151.002 24.552 147.98 22.0838 145.148 23.2887L63.8438 57.8735C67.5196 70.1011 78.6592 84.6548 94.4478 96.1115Z"
          fill="#1B56A5" fill-opacity="0.2" />
        <path
          d="M128.155 120.487C115.612 118.057 102.053 111.863 89.5833 102.815C72.3806 90.3334 60.5954 75.0018 56.1891 61.1295L14.8513 78.7143C11.6218 80.0876 11.7968 84.724 15.1212 85.8483L74.9037 106.09C78.4203 107.281 81.3895 109.706 83.2572 112.915L115.015 167.46C116.78 170.492 121.358 169.74 122.061 166.301L131.308 121.013C130.265 120.863 129.215 120.692 128.155 120.487Z"
          fill="#1B56A5" fill-opacity="0.2" />
        <path
          d="M129.41 114.012C116.866 111.583 103.307 105.387 90.8381 96.3405C61.4995 75.0532 47.8833 45.4701 59.84 28.9897C71.7975 12.512 104.146 16.278 133.483 37.5651C143.082 44.5285 151.409 52.7615 157.564 61.3736C158.895 63.2352 158.464 65.8208 156.603 67.1511C154.742 68.4799 152.156 68.0495 150.827 66.1896C145.184 58.2942 137.505 50.7138 128.621 44.2672C103.894 26.326 75.466 21.5559 66.5447 33.8531C57.6235 46.1491 70.9766 71.6938 95.7041 89.6352C108.246 98.7348 121.848 104.686 134.005 106.383C145.234 107.955 153.677 105.705 157.78 100.049C162.059 94.1524 160.568 86.183 158.563 80.5345C157.799 78.3788 158.926 76.0123 161.081 75.2472C163.236 74.4823 165.604 75.6089 166.369 77.7657C170.142 88.3972 169.474 98.04 164.484 104.915C158.497 113.168 147.265 116.603 132.859 114.587C131.719 114.43 130.568 114.237 129.41 114.012Z"
          fill="#1B56A5" fill-opacity="0.2" />
      </svg>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Start Service Section -->
  <section id="events" class="background-filled cs_pt_70 cs_pt_lg_75 cs_pb_70 cs_pb_lg_80 cs_gray_bg"
    data-src="assets/img/services_bg.png">
    <div class="container">
      <div
        class="cs_section_heading cs_style_1 d-flex align-items-center cs_mb_60 cs_mb_lg_40 cs_column_gap_15 cs_row_gap_15">
        <div id="Upcoming-Meetings" class="cs_section_heading_in">
          <!--<h3 class="cs_fs_20 cs_fs_lg_18 text-accent fw-normal cs_lh_base cs_mb_10 wow fadeInLeft"-->
          <!--  data-wow-duration="0.8s" data-wow-delay="0.2s">Events</h3>-->
          <h2 class="cs_fs_48 cs_fs_lg_36 m-0">Upcoming Events</h2>
        </div>
      </div>
      <div class="row">


        <div style="place-content: center;" class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="http://www.ics2026bhopal.com/"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="http://www.ics2026bhopal.com/">
                <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/ICS.jpeg"></div>
              </a>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="http://www.ics2026bhopal.com/"
                  class="inline-block">ICS 2026 – Bhopal</a>
              </h2>
            </div>
          </div>
        </div>
        <div style="place-content: center;" class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="http://www.assicon2027jaipur.com"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="http://www.assicon2027jaipur.com">
                <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/ASSICON.jpeg"></div>
              </a>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="http://www.assicon2027jaipur.com"
                  class="inline-block">ASSICON 2027 – Jaipur</a>
              </h2>
            </div>
          </div>
        </div>
        <div style="place-content: center;" class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/new-upcoming.png"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="assets/img/new-upcoming.png">
                <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/new-upcoming.png"></div>
              </a>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="assets/img/new-upcoming.png"
                  class="inline-block">Webinar on "Robotics vs Navigation: Is There Incremental Value In Pedicle Screw
                  Fixation and Beyond?"</a>
              </h2>
            </div>
          </div>
        </div>

        <div style="place-content: center;" class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/new-event.jpeg"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="assets/img/new-event.jpeg">
                <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/new-event.jpeg"></div>
              </a>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="assets/img/new-event.jpeg"
                  class="inline-block">Webinar on "Robotics 2.0 precision Learning Curves & Real world Outcomes"</a>
              </h2>
            </div>
          </div>
        </div>

        <div style="place-content: center;" class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/assi/new-event-img.jpg"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="assets/img/assi/new-event-img.jpg">
                <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/assi/new-event-img.jpg"></div>
              </a>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="assets/img/assi/new-event-img.jpg"
                  class="inline-block">Proposal for hosting ASSI Events in 2027 and 2028</a>
              </h2>
            </div>
          </div>
        </div>


        <!-- <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="#"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                data-src="assets/img/assi/ics.jpg"></div>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="#" class="inline-block">ICS 2024 Instructional Course in Spine</a></h2>
            </div>
            <p class="cs_mb_24">Assistance with HR-related tasks such as recruitment, training, performance.</p>
          </div>
        </div> -->

        <div style="place-content: center;" class="col-lg-6">
          <!-- <div class="cs_video_block cs_style_1 position-relative cs_rounded_20 overflow-hidden d-flex justify-content-center align-items-center flex-column cs_zindex_3">
              <div class="video-section cs_video_block-bg w-100 position-absolute top-0 start-0 background-filled"
                data-src="assets/img/Home Page/3.jpeg" style="background-image:url('assets/img/Home Page/3.jpeg');">
              </div>
            </div> -->
          <!-- End Service Section -->
        </div>

      </div>
      <h2 class="cs_fs_48 cs_fs_lg_36 m-0 mt-5" id="past-meetings">Past Events</h2>
      <div class="row mt-5">

        <div style="place-content: center;" class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/assi/new-event.jpg"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="assets/img/assi/new-event.jpg">
                <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/assi/new-event.jpg"></div>
              </a>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a
                  href="https://docs.google.com/forms/d/e/1FAIpQLSdvIPOH0NVn8DZQ2Ti2Z2Zr_TZiu9JWme23b_AnALOp9C7dtQ/viewform?usp=header"
                  class="inline-block">Register for ASSI SCOLI WEEK 2025</a>
              </h2>
            </div>
          </div>
        </div>
        <div style="place-content: center;" class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/assi/RegistrationForm_A4.pdf"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="assets/img/assi/RegistrationForm_A4.pdf">
                <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/assi/live-operation.jpg"></div>
              </a>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="assets/img/assi/RegistrationForm_A4.pdf"
                  class="inline-block">ASSI Live Operative Course 2025 Details</a>
              </h2>
            </div>
          </div>
        </div>

        <div style="place-content: center;" class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/assi/RegistrationForm_A4.pdf"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="assets/img/assi/RegistrationForm_A4.pdf">
                <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/assi/live-operation.jpg"></div>
              </a>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="assets/img/assi/RegistrationForm_A4.pdf"
                  class="inline-block">ASSI Live Operative Course 2025 Registration Form </a>
              </h2>
            </div>
          </div>
        </div>

        <!-- <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="https://docs.google.com/forms/d/e/1FAIpQLSfJv_uZ6CZtRU7VvXrqsR09yx1Xng5yeQTjPegsJCWft1Jwfw/viewform"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                data-src="assets/img/assi/event-img.jpg"></div>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="https://docs.google.com/forms/d/e/1FAIpQLSfJv_uZ6CZtRU7VvXrqsR09yx1Xng5yeQTjPegsJCWft1Jwfw/viewform" class="inline-block">Call for applications for ASSI Fellowship</a></h2>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/assi/sub-banner.jpg"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                data-src="assets/img/assi/sub-banner.jpg"></div>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="#" class="inline-block">Get Your Abstract Ready Submission Will Start on 1st September 2024</a></h2>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/assi/sub-banner1.jpg"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                data-src="assets/img/assi/sub-banner1.jpg"></div>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="#" class="inline-block">Annual Conference of Association of Spine Surgeons of India 2025</a></h2>
            </div>


          </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="assets/img/assi/ics.jpg"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                data-src="assets/img/assi/ics.jpg"></div>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="#" class="inline-block">ICS 2024 Instructional
                  Course in Spine</a></h2>
            </div>
          </div> 
        </div> -->

        <!-- <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
            <div class="cs_service_thumb position-relative cs_rounded_5 pb-3">
              <a href="#"
                class="cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                    fill="currentColor" />
                </svg>
              </a>
              <div class="cs_service_thumb-in position-relative-in background-filled h-100"
                data-src="assets/img/assi/ics.jpg"></div>
            </div>
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">
              <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="#" class="inline-block">ICS 2024 Instructional Course in Spine</a></h2>
            </div>
          </div>
        </div> -->
      </div>

    </div>
  </section>
  <!-- End Service Section -->


  <!-- Start Service Section -->
  <section class="cs_pb_50 cs_pb_lg_50 cs_pt_70">
    <div class="container">
      <div class="cs_section_heading cs_style_1 text-center cs_mb_60 cs_mb_lg_40">
        <div class="cs_section_heading_in">
          <!-- <h3 class="cs_fs_20 text-accent fw-normal cs_lh_base wow fadeInUp" data-wow-duration="0.8s"
            data-wow-delay="0.2s">Our Products</h3> -->
          <h2 class="cs_fs_48 cs_fs_lg_36 m-0">ASSI Products</h2>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="cs_service_slider_2 cs_gap_24">
        <div class="cs_slider_activate">
          <div class="cs_slide">
            <div
              class="cs_service cs_style_1 cs_type_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
              <div class="cs_service_thumb position-relative cs_rounded_5 cs_mb_25">
                <div style="background-size: contain;"
                  class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/assi/ASSI-text-books.jpg"></div>
              </div>
              <div class="text-center cs_service_iconbox d-flex align-items-center cs_mb_20">
                <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="#" class="inline-block">ASSI Text books Spinal
                    Infections & Trauma</a></h2>
              </div>
              <p class="text-center cs_mb_20">by Dr. S Rajasekaran</p>
              <div class="text-center text-primary">
                <a href="#"
                  class="cs_post_btn_2 d-inline-flex justify-content-between align-items-center cs_column_gap_10">
                  <span class="cs_post_btn-text">Buy Online</span>
                  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M14.9505 5.44725C14.9547 5.44105 14.9583 5.43463 14.9621 5.42827C14.9656 5.42241 14.9692 5.41669 14.9725 5.41066C14.9759 5.40418 14.9789 5.39751 14.982 5.3909C14.985 5.38461 14.9881 5.37844 14.9908 5.372C14.9934 5.36559 14.9956 5.35902 14.9979 5.3525C15.0004 5.34559 15.003 5.33877 15.0052 5.3317C15.0071 5.32519 15.0086 5.31857 15.0102 5.312C15.0121 5.3048 15.0141 5.29767 15.0155 5.29034C15.017 5.28274 15.0179 5.27507 15.019 5.26744C15.02 5.26099 15.0212 5.25466 15.0218 5.24814C15.0232 5.23406 15.0239 5.21991 15.024 5.20576C15.024 5.20554 15.024 5.20532 15.024 5.20512C15.024 5.20492 15.024 5.20469 15.024 5.20448C15.0239 5.19035 15.0232 5.17621 15.0218 5.1621C15.0212 5.15556 15.02 5.14925 15.019 5.1428C15.0179 5.13517 15.017 5.12749 15.0155 5.1199C15.0141 5.11256 15.0121 5.10544 15.0102 5.09824C15.0086 5.09167 15.0071 5.08505 15.0052 5.07854C15.003 5.07149 15.0004 5.06465 14.9979 5.05774C14.9956 5.05122 14.9934 5.04467 14.9908 5.03824C14.9881 5.0318 14.985 5.02562 14.982 5.01934C14.9789 5.01272 14.9759 5.00606 14.9725 4.99958C14.9692 4.99355 14.9656 4.98781 14.9621 4.98197C14.9583 4.97561 14.9547 4.96918 14.9505 4.96299C14.9462 4.9565 14.9414 4.9504 14.9367 4.94415C14.9328 4.93902 14.9293 4.93373 14.9252 4.92872C14.916 4.91758 14.9064 4.90689 14.8962 4.89672L10.887 0.88748C10.7167 0.717156 10.4405 0.717155 10.2702 0.88748C10.0999 1.0578 10.0999 1.33395 10.2702 1.50427L13.5349 4.76894L1.01817 4.76893C0.777297 4.76893 0.582021 4.96421 0.582021 5.20508C0.582021 5.44595 0.777297 5.64123 1.01817 5.64123L13.5349 5.64122L10.2702 8.9059C10.0999 9.07622 10.0999 9.35236 10.2702 9.52269C10.4405 9.69301 10.7167 9.69303 10.887 9.5227L14.8962 5.51349C14.9064 5.50333 14.916 5.49264 14.9251 5.48153C14.9292 5.47652 14.9328 5.47125 14.9367 5.46609C14.9414 5.45984 14.9462 5.45374 14.9505 5.44725Z"
                      fill="currentColor"></path>
                  </svg> <button class="buynow-btn">Amazon</button>
                </a>
              </div>
            </div>
          </div>
          <div class="cs_slide">
            <div
              class="cs_service cs_style_1 cs_type_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
              <div class="cs_service_thumb position-relative cs_rounded_5 cs_mb_25">
                <div style="background-size: contain;"
                  class="cs_service_thumb-in position-relative-in background-filled h-100"
                  data-src="assets/img/assi/ASSI-text-books1.jpg"></div>
              </div>
              <div class="text-center cs_service_iconbox align-items-center cs_mb_20">
                <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0"><a href="#" class="inline-block">ASSI Monographs</a>
                </h2>
              </div>
              <p class="text-center cs_mb_20">by Dr. Gautam Zaveri, Dr. Raghava D. Mulukutla</p>
              <div class="text-center text-primary">
                <a href="#"
                  class="cs_post_btn_2 d-inline-flex justify-content-between align-items-center cs_column_gap_10">
                  <span class="cs_post_btn-text">Buy Online </span>
                  <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M14.9505 5.44725C14.9547 5.44105 14.9583 5.43463 14.9621 5.42827C14.9656 5.42241 14.9692 5.41669 14.9725 5.41066C14.9759 5.40418 14.9789 5.39751 14.982 5.3909C14.985 5.38461 14.9881 5.37844 14.9908 5.372C14.9934 5.36559 14.9956 5.35902 14.9979 5.3525C15.0004 5.34559 15.003 5.33877 15.0052 5.3317C15.0071 5.32519 15.0086 5.31857 15.0102 5.312C15.0121 5.3048 15.0141 5.29767 15.0155 5.29034C15.017 5.28274 15.0179 5.27507 15.019 5.26744C15.02 5.26099 15.0212 5.25466 15.0218 5.24814C15.0232 5.23406 15.0239 5.21991 15.024 5.20576C15.024 5.20554 15.024 5.20532 15.024 5.20512C15.024 5.20492 15.024 5.20469 15.024 5.20448C15.0239 5.19035 15.0232 5.17621 15.0218 5.1621C15.0212 5.15556 15.02 5.14925 15.019 5.1428C15.0179 5.13517 15.017 5.12749 15.0155 5.1199C15.0141 5.11256 15.0121 5.10544 15.0102 5.09824C15.0086 5.09167 15.0071 5.08505 15.0052 5.07854C15.003 5.07149 15.0004 5.06465 14.9979 5.05774C14.9956 5.05122 14.9934 5.04467 14.9908 5.03824C14.9881 5.0318 14.985 5.02562 14.982 5.01934C14.9789 5.01272 14.9759 5.00606 14.9725 4.99958C14.9692 4.99355 14.9656 4.98781 14.9621 4.98197C14.9583 4.97561 14.9547 4.96918 14.9505 4.96299C14.9462 4.9565 14.9414 4.9504 14.9367 4.94415C14.9328 4.93902 14.9293 4.93373 14.9252 4.92872C14.916 4.91758 14.9064 4.90689 14.8962 4.89672L10.887 0.88748C10.7167 0.717156 10.4405 0.717155 10.2702 0.88748C10.0999 1.0578 10.0999 1.33395 10.2702 1.50427L13.5349 4.76894L1.01817 4.76893C0.777297 4.76893 0.582021 4.96421 0.582021 5.20508C0.582021 5.44595 0.777297 5.64123 1.01817 5.64123L13.5349 5.64122L10.2702 8.9059C10.0999 9.07622 10.0999 9.35236 10.2702 9.52269C10.4405 9.69301 10.7167 9.69303 10.887 9.5227L14.8962 5.51349C14.9064 5.50333 14.916 5.49264 14.9251 5.48153C14.9292 5.47652 14.9328 5.47125 14.9367 5.46609C14.9414 5.45984 14.9462 5.45374 14.9505 5.44725Z"
                      fill="currentColor"></path>
                  </svg> <button class="buynow-btn">Amazon</button> <button class="buynow-btn">Thieme</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex cs_column_gap_15 justify-content-center cs_pt_50">
          <div
            class="cs_slider_prev filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4">
            <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M0.461063 4.4077H19.538C19.7649 4.4077 19.9482 4.22437 19.9482 3.99745C19.9482 3.77052 19.7649 3.58719 19.538 3.58719H1.45209L3.94183 1.09745C4.10209 0.937189 4.10209 0.676933 3.94183 0.516677C3.78158 0.35642 3.52132 0.35642 3.36106 0.516677L0.170038 3.7077C0.0520878 3.82565 0.0174732 4.00129 0.0815754 4.15514C0.145678 4.3077 0.295677 4.4077 0.461063 4.4077Z"
                fill="black" />
              <path
                d="M3.65549 7.60253C3.76062 7.60253 3.86575 7.56278 3.94524 7.48202C4.10549 7.32176 4.10549 7.0615 3.94524 6.90125L0.750365 3.70637C0.590108 3.54612 0.329853 3.54612 0.169597 3.70637C0.00934029 3.86663 0.00934029 4.12689 0.169597 4.28714L3.36447 7.48202C3.44524 7.56278 3.55036 7.60253 3.65549 7.60253Z"
                fill="black" />
            </svg>
          </div>
          <div
            class="cs_slider_next filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4">
            <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19.5389 4.4077H0.462014C0.235091 4.4077 0.0517578 4.22437 0.0517578 3.99745C0.0517578 3.77052 0.235091 3.58719 0.462014 3.58719H18.5479L16.0582 1.09745C15.8979 0.937189 15.8979 0.676933 16.0582 0.516677C16.2184 0.35642 16.4787 0.35642 16.6389 0.516677L19.83 3.7077C19.9479 3.82565 19.9825 4.00129 19.9184 4.15514C19.8543 4.3077 19.7043 4.4077 19.5389 4.4077Z"
                fill="#18191D" />
              <path
                d="M16.3445 7.60253C16.2394 7.60253 16.1342 7.56278 16.0548 7.48202C15.8945 7.32176 15.8945 7.0615 16.0548 6.90125L19.2496 3.70637C19.4099 3.54612 19.6701 3.54612 19.8304 3.70637C19.9907 3.86663 19.9907 4.12689 19.8304 4.28714L16.6355 7.48202C16.5548 7.56278 16.4496 7.60253 16.3445 7.60253Z"
                fill="#18191D" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->

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
  <!-- <script src="assets/js/plugins/ripples.min.js"></script> -->
  <script src="assets/js/plugins/wow.min.js"></script>
  <script src="assets/js/plugins/swiper.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script>
    // Initialize Swiper
    var swiper = new Swiper('.swiper-container', {
      // Optional parameters
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      spaceBetween: 10,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
      },
    });
  </script>
  <script>
    $(document).ready(function () {

      // Open popup on image link click
      $(".popup-link").on("click", function (e) {
        e.preventDefault();
        var imgSrc = $(this).attr("href");
        var driveLink = $(this).attr("data-link");
        $("#popupImage").attr("src", imgSrc);
        $("#popupAnchor").attr("href", driveLink);
        $(".popup").fadeIn(500);
      });

      // Close popup
      $("#close").on("click", function (e) {
        e.preventDefault();
        $(".popup").fadeOut(500);
      });
      $(".popup").on("click", function (e) {
        if ($(e.target).is(".popup")) {
          e.preventDefault();
          $(".popup").fadeOut(500);
        }
      });

    });
  </script>
</body>

</html>