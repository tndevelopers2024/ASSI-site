<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Laralink" />
    <link rel="icon" href="assets/img/assi/assi-logo.png" />
    <title>ASSI TV</title>

    <!-- Google Font: Rubik -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            font-family: "Rubik", sans-serif !important;
        }

        /* Preloader */
        .cs_preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease-in-out;
        }

        .cs_preloader.hide {
            opacity: 0;
            pointer-events: none;
        }

        /* HERO SECTION */
        .hero-wrapper {
            height: 600px;
        }

        .video-left{
            height:100%;
        }
        .video-left h4{
            font-weight:normal;
        }
        .video-right {
            height: 100%;
        }

        .video-right .video-box {
            height: 48%;
            margin-bottom: 10px;
        }

        .hero-wrapper iframe {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        /* CARDS */
        .video-card iframe {
            width: 100%;
            height: 250px;
            border-radius: 6px;
        }

        .video-title {
            font-size: 14px;
            font-weight: 600;
            margin-top: 8px;
        }

        .section-title {
            font-size: 30px;
            font-weight: 500;
            margin: 30px 0 15px;
        }

        /* RESPONSIVE FIX */
        @media (max-width: 992px) {
            .hero-wrapper {
                height: auto;
            }

            .video-right .video-box {
                height: auto;
            }

            .hero-wrapper iframe {
                height: 250px;
            }
        }
        .cs_page_header::before{
            background-color:rgba(0, 0, 0, 0.4) !important;
        }
        .trending-section{
            padding:20px 0px;
            padding-bottom:30px;
            background-color:#ddddff;
        }
        


        .yt-wrapper {
    position: relative;
    width: 100%;
    padding-top: 56.25%; /* 16:9 ratio */
    background: #000;
    cursor: pointer;
    border-radius: 10px;
    overflow:hidden;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
}

.yt-wrapper .yt-thumbnail {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    
}

.yt-wrapper .yt-play {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 70px;
    height: 70px;
    background: url('https://i.imgur.com/8P3KQ90.png') no-repeat center;
    background-size: contain;
    opacity: 0.85;
    transition: 0.3s;
    display:none;
}

.yt-wrapper:hover .yt-play {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1.1);
}

.video-boxx{
    box-shadow: rgba(99, 99, 99, 0.6) 0px 2px 8px 0px;
    min-height:350px;
    padding:10px;
    border-radius:10px;
    background:#fff;
    transition:0.3s;
}
.video-boxx:hover{
    background:#1A56A4;
}
.video-boxx:hover.video-boxx h5{
    color:#fff;
}
@media screen and (max-width:734px) {
    .video-boxx{
        min-height:auto;
    }
    .video-boxx h5{
        font-size:13px !important;
    }
}
    </style>
</head>

<body class="bg-light">
  <?php include "header.php" ?>

<!-- PRELOADER -->
<div class="cs_preloader cs_accent_color cs_white_bg">
    <div class="cs_preloader bg-white d-flex justify-content-center align-items-center">
      <div class="cs_preloader_in">
        <img src="assets/img/assi/assi-logo.png" alt="Logo" />
      </div>
    </div>
  </div>

<!-- HEADER SECTION -->
<section class="cs_page_header position-relative background-filled d-flex align-items-center justify-content-between"
style="background:url(assets/img/video-banner.webp); background-repeat:no-repeat; background-size:cover;">
    <div class="container position-relative z-index-1">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-white cs_fs_18 cs_mb_5">
          <li class="breadcrumb-item">
            <a href="index.php">Home</a>
            <i class="fa-solid fa-chevron-right"></i>
          </li>
        </ol>
      </nav>
      <h1 class="cs_fs_48 cs_fs_lg_36 text-white m-0">ASSI TV</h1>
    </div>
</section>

<div class="py-4">

    <!-- ================= HERO SECTION ================= -->
    <section class="container">
        <div class="row hero-wrapper">
        <div class="col-lg-8 video-left">
            <!-- <h4>Live TV <i class="fa-solid fa-circle text-danger"></i></h4> -->
            <iframe 
                src="https://www.youtube.com/embed/y-_eeYUUuXk?si=5Gc9GDpMKx49bXj-"
                frameborder="0"
                allowfullscreen>
            </iframe> 
                   
        </div>

        <div class="col-lg-4 video-right d-flex flex-column justify-content-between">
            <div class="video-box">
                <iframe 
                    src="https://www.youtube.com/embed/mZP0ZoYYPrM?si=LNblvqortCHgwNny"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>

            <div class="video-box">
                <iframe 
                    src="https://www.youtube.com/embed/gakto_6prXQ?si=rdjNhXp4qFMFlwkE"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

    </section>
    <br>

     <!-- ================= TRENDING ================= -->
    <section class="trending-section">
        <div class="container" style="position:relative; z-index:10;">
            <h4 class="section-title">Webinars</h4>

        <div class="row g-4">

    <div class="col-6 col-md-4">
        <div class="video-boxx">
            <div class="yt-wrapper" data-id="3exyV4V_d90">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">ASSI Pro Series Webinar - Lumbar Disc herniation</h5>
        </div>
    </div>

    <div class="col-6 col-md-4">
        <div class="video-boxx">
            <div class="yt-wrapper" data-id="yK2pVwi45eE">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">ASSI Webinar - Complex CVJ anomalies</h5>
        </div>
    </div>

    <div class="col-6 col-md-4">
        <div class="video-boxx">
            <div class="yt-wrapper" data-id="M1IIJcDY4ko">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">Video Journal Club 14 - Dr Gururaj Sangondimath - Kyphosis in Ankylosing Spondylitis</h5>
        </div>
    </div>

    <div class="col-6 col-md-4">
        <div class="video-boxx">
            <div class="yt-wrapper" data-id="2GlJwSm9pNs">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">Video Journal Club 15 Dr Subir Jhaveri Thoracolumbar Trauma</h5>
        </div>
    </div>

    <div class="col-6 col-md-4">
        <div class="video-boxx">
            <div class="yt-wrapper" data-id="TpR6G7hvD8Y">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">ASSI Pro Series - Lumbar Spondylolisthesis</h5>
        </div>
    </div>

    <div class="col-6 col-md-4">
        <div class="video-boxx">
            <div class="yt-wrapper" data-id="97CObF8S5V0">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">ASSI LIVE 2nd TEACHING COURSE</h5>
        </div>
    </div>

</div>

        </div>
    </section>    

    <br>
    <!-- ================= EVENT COVERAGES ================= -->
    <section class="container">
    <h2 class="section-title">Other Videos</h2>

    <div class="row g-4">

        <div class="col-6 col-md-4">
            <div class="video-boxx">
                <div class="yt-wrapper" data-id="Zg9o6kI9djk">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>                
            </div>
            <h5 class="mt-3">Master Class In Spinal Problems for Family Physicians 1/4</h5>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="video-boxx">
                <div class="yt-wrapper" data-id="G8Xvbu3Ua_w">
                    <div class="yt-thumbnail"></div>
                    <div class="yt-play"></div>
                </div>
            <h5 class="mt-3">Video Journal Club 7 - Dr Shailesh Hadgaonkar - O Arm navigation in Spine surgery</h5>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="video-boxx">
                <div class="yt-wrapper" data-id="Y2sPhel8ON4">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">My research that changed my practice - Dr S. Rajasekaran</h5>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="video-boxx">
                <div class="yt-wrapper" data-id="tl3Q8B9Pprg">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">Abhay Nene Interviews <br> Dr V T Ingalhalikar</h5>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="video-boxx">
                <div class="yt-wrapper" data-id="2GlJwSm9pNs">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">Video Journal Club 15 Dr Subir Jhaveri Thoracolumbar Trauma</h5>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="video-boxx">
                <div class="yt-wrapper" data-id="khRpDwNwnCo">
                <div class="yt-thumbnail"></div>
                <div class="yt-play"></div>
            </div>
            <h5 class="mt-3">Master Class In Spinal Problems for Family Physicians 2/4</h5>
            </div>
        </div>

    </div>
</section>


</div>


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

<!-- PRELOADER HIDE SCRIPT -->
<script>
    window.addEventListener("load", function () {
        document.querySelector(".cs_preloader").classList.add("hide");
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.querySelectorAll('.yt-wrapper').forEach(wrapper => {
    const videoId = wrapper.getAttribute('data-id');
    const thumbnail = wrapper.querySelector('.yt-thumbnail');

    // Load the thumbnail
    thumbnail.style.backgroundImage =
        `url(https://img.youtube.com/vi/${videoId}/hqdefault.jpg)`;

    // On click load YouTube iframe
    wrapper.addEventListener('click', () => {
        wrapper.innerHTML = `
            <iframe 
                src="https://www.youtube.com/embed/${videoId}?autoplay=1&controls=1&modestbranding=1&rel=0" 
                frameborder="0" 
                allow="autoplay; encrypted-media" 
                allowfullscreen
                style="width:100%; height:100%; position:absolute; top:0; left:0;">
            </iframe>
        `;
    });
});
</script>

</body>
</html>
