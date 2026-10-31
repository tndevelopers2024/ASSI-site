<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Laralink" />
  <!-- Favicon Icon -->
  <link rel="icon" href="assets/img/assi/assi-logo.png" />
  <!-- Site Title -->
  <title>Assi</title>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css" />
  <link rel="stylesheet" href="assets/css/plugins/slick.css" />
  <link rel="stylesheet" href="assets/css/plugins/animate.css" />
  <link rel="stylesheet" href="assets/css/plugins/swiper.min.css" />
  <link rel="stylesheet" href="assets/css/plugins/odometer.css" />
  <link rel="stylesheet" href="assets/css/default.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<style>
  .banner-hero {
    height: 80vh;
  }

  /* Style for tab content */
  .tabshown {
    display: none;
  }

  .tabshown.active {
    display: block;
  }

  .sliderr .slide img {
    height: 348px !important;
    object-position: 0px -30px;
  }
</style>

<body>
  <div class="cs_preloader cs_accent_color cs_white_bg">
    <div class="cs_preloader bg-white d-flex justify-content-center align-items-center">
      <div class="cs_preloader_in">
        <img src="assets/img/assi/assi-logo.png" alt="Logo" />
      </div>
    </div>
  </div>
  <!-- Start Header Section -->
  <header class="cs_site_header cs_style_1 cs_sticky_header cs_site_header_full_width">

    <div class="cs_main_header">
      <div class="container">
        <div class="cs_main_header_in">
          <div class="cs_main_header_left">
            <a class="cs_site_branding" href="index.php">
              <img src="assets/img/assi/assi-logo.png" alt="Logo" />
            </a>
            <div class="cs_nav cs_primary_font fw-medium">
              <ul class="cs_nav_list fw-medium text-uppercase">
                <li class=""><a href="index.php">Home</a> </li>
                <li class=""><a href="aboutus.php">About Assi</a></li>
                <li class="menu-item-has-children"><a href="https://www.assi.in/index.php#events">Events </a>
                  <ul>
                    <li> <a href="index.php#Upcoming-Meetings">Upcoming events</a></li>
                    <!--<li><a href="#">Associated International Events </a></li>-->
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="education.php">Committee </a>
                  <ul>
                    <li> <a class="tablink" onclick="openTab(event, 'Tab1')" href="#sub-commitee">Education Committee
                      </a></li>
                    <li><a class="tablink" onclick="openTab(event, 'Tab2')" href="#sub-commitee">Research & Award
                        Committee
                      </a></li>
                    <li><a href="#sub-commitee">Program Committee
                      </a></li>
                    <li><a href="#sub-commitee">Website Committee
                      </a></li>
                    <li><a href="#sub-commitee">Advocacy Committee
                      </a></li>
                    <li><a href="#sub-commitee">Finance Committee
                      </a></li>
                    <li><a href="#sub-commitee">Nomination & Constitution Committee
                      </a></li>
                    <li><a href="#sub-commitee">ASSI Case Discussion Forum Sub-Committee
                      </a></li>
                    <li><a href="#sub-commitee">ISJ Sub-Committee
                      </a></li>
                    <li><a href="#sub-commitee">ASSI Outreach Program Sub-committee
                      </a></li>
                    <li><a href="#sub-commitee">ASSI Spine Registry Sub-Committee
                      </a></li>
                    <li><a href="#sub-commitee">Scoliosis Screening Sub=Committee
                      </a></li>
                    <li><a href="#sub-commitee">ASSI Membership Sub-Committee
                      </a></li>
                    <li><a href="#sub-commitee">ASSI Elearnspine.org Sub-Committee
                      </a></li>
                  </ul>
                </li>
                <!--<li class="menu-item-has-children">-->
                <!--  <a href="#">ISJ</a>-->
                <!--  <ul>-->
                <!--    <li><a href="#">Author Instructions</a></li>-->
                <!--    <li><a href="#">Current Issue</a></li>-->
                <!--    <li><a href="#">Advertisement Tariff</a></li>-->
                <!--    <li><a href="#">Journal</a></li>-->
                <!--  </ul>-->
                <!--</li>-->
                <!--<li><a href="#">Assi Research</a></li>-->
                <!--<li><a href="#">News Letter</a></li>-->
                <li class="menu-item-has-children"><a href="#">Membership</a>
                  <ul>
                    <li> <a href="membership-registration.php">Online Membership Registration</a></li>
                    <!--<li><a href="https://www.assi.in/Subscription-Services.php">Value Added Subscription Service-->
                    <!--    (VASS)</a></li>-->
                    <!--<li><a href="#">Offline Registration</a></li>-->
                    <!--<li><a href="https://www.assi.in/payment_option.php">Payment Options</a></li>-->
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
  </header>
  <!-- End Header Section -->
  <section class="cs_page_header position-relative background-filled d-flex align-items-center justify-content-between"
    data-src="assets/img/assi/bg.jpg">
    <div class="container position-relative z-index-1">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-white cs_fs_18 cs_mb_5">
          <li class="breadcrumb-item">
            <a href="index.php">Home</a>
            <i class="fa-solid fa-chevron-right"></i>
          </li>
        </ol>
      </nav>
      <h1 class="cs_fs_48 cs_fs_lg_36 text-white m-0">History</h1>
    </div>
  </section>

  <!-- Start Blog Section -->
  <section id="history" class="cs_pt_70 cs_pt_lg_80 cs_pb_50 cs_pb_lg_80">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="cs_post cs_style_1 bg-white shadow-sm cs_mb_30">

            <div class="cs_pl_40 cs_pr_40 cs_pt_40 cs_pb_40 cs_pl_lg_25 cs_pr_lg_25 cs_pt_lg_25 cs_pb_lg_25">
              <h2 class="cs_post_title cs_lh_base cs_fs_26 cs_fs_lg_18 cs_mb_20">
                History!
              </h2>
              <h3>History of Association of Spine Surgeons of India ( ASSI )</h3>
              <div class="cs_post_subtitle">
                The Association of Spine Surgeons of India (ASSI) was established in 1985, marking a pivotal moment in
                the history of spine surgery in India. Its origins trace back to 1983, when an international symposium
                on spinal trauma was held at Vigyan Bhavan, New Delhi. Major Ahluwalia, a traumatic quadriplegia
                survivor and army commander, led the event, highlighting the dire need for spine care development in
                India.
              </div>
              <div class="cs_post_subtitle pt-2">
                In September 1985, Dr. K. T. Dholakia hosted a landmark meeting with Drs. Chaubal, Bavdekar, and V. T.
                Ingalhalikar, leading to the decision to form ASSI. On December 18, 1985, during WIROC at Mumbai’s Hotel
                Centaur, Dr. Ingalhalikar announced ASSI’s formation. Nineteen members joined within two hours, laying
                the foundation for India’s spine surgery community.
              </div>
              <div class="cs_post_subtitle pt-2">
                The inaugural committee included Dr. Dholakia as President, Drs. Chaubal and Bavdekar as Vice
                Presidents, Dr. Mehta as Treasurer, and Dr. Ingalhalikar as Secretary. ASSI held its first academic
                meeting, ASSICON, on May 1, 1986, in Mumbai, with 82 surgeons attending. Membership surged from 54 at
                the meeting to over 3,500 today. Remarkably, ASSI predates the British Spine Society (1986) and followed
                the North American Spine Society by just one year.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Start Latest Project -->
  <section id="past-president" class="cs_pt_50 cs_pt_lg_73 cs_pb_50 cs_pb_lg_80 background-filled">
    <div class="container">
      <div class="cs_section_heading cs_style_1 d-flex align-items-center text-center cs_mb_60 cs_mb_lg_40">
        <div class="cs_section_heading_in">
          <h2 class="cs_fs_32 cs_fs_lg_36 m-0">
            Founding Team
          </h2>
          <p class="pt-4">First Scientific Meeting of ASSI was held in Mumbai on 1st through 3rd May 1986 : ASSICON 1 It
            was attended
            by 82 Orthopedic and neurosurgeons. During this meeting the membership increased to 54 . The theme of the
            meeting was : Disorders of Lumbar Spine</p>
        </div>
      </div>
      <div class="cs_project_slider_2 cs_gap_24">
        <div class="cs_slider_activate">
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/assi/dummy.jpg"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. K. T. Dholakia</h4>
              <h6><a href="#">Vice President</a></h6>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/assi/dummy.jpg"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. K. V. Chaubal</h4>
              <h6><a href="#">Vice President</a></h6>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/assi/dummy.jpg"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. A. V. Bavdekar</h4>
              <h6>
                <a href="#">Vice President</a>
              </h6>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/assi/dummy.jpg"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. S. D. Mehta</h4>
              <h6>
                <a href="#">Treasurer</a>
              </h6>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/Imgalikarikar.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. V. T. Ingalalhikar</h4>
              <h6>
                <a href="#">Secretary</a>
              </h6>
            </div>
          </div>
        </div>
        <div
          class="cs_slider_prev filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4 position-absolute">
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
          class="cs_slider_next filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4 position-absolute">
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
  </section>
  <!-- End Latest Project -->



  <!-- Start Latest Project -->
  <section id="past-president" class="cs_pt_50 cs_pt_lg_73 cs_pb_50 cs_pb_lg_80 background-filled">
    <div class="container">
      <div class="cs_section_heading cs_style_1 d-flex align-items-center text-center cs_mb_60 cs_mb_lg_40">
        <div class="cs_section_heading_in">
          <h2 class="cs_fs_32 cs_fs_lg_36 m-0">
            Past Presidents and Secretaries
          </h2>
        </div>
      </div>
      <div class="cs_project_slider_2 cs_gap_24">
        <div class="cs_slider_activate">
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/Dave.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. P K Dave</h4>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/Imgalikarikar.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. V T Ingalhalikar
              </h4>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/Haridikar.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. S M Hardikar
              </h4>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/ShekarBhojraj.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. Shekhar Y Bhojraj
              </h4>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/AravindJayswal.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. Arvind Jayaswal</h4>
            </div>
          </div>
        </div>
        <div
          class="cs_slider_prev filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4 position-absolute">
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
          class="cs_slider_next filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4 position-absolute">
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
  </section>


  <section id="past-president" class="cs_pt_50 cs_pt_lg_73 cs_pb_50 cs_pb_lg_80 background-filled">
    <div class="container">
      <div class="cs_project_slider_2 cs_gap_24">
        <div class="cs_slider_activate">
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/RajaSekaran.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. S Rajasekaran</h4>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/sajanhedge.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. Sajan Hegde
              </h4>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/RamChadda.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. Ram Chaddha
              </h4>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/Raghavadutt.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. Raghava Dutt Mulukutla
              </h4>
            </div>
          </div>
          <div class="cs_slide">
            <div class="cs_portfolio cs_style_1 position-relative overflow-hidden">
              <a href="#"
                class="cs_portfolio_overlay cs_transition_4 position-absolute h-100 w-100 start-0 top-0 cs_zindex_1 d-block"></a>
              <div class="cs_portfolio_thumb d-block h-100 w-100 background-filled cs_transition_6"
                data-src="assets/img/about/Chabra.png"></div>
            </div>
            <div class="member-name text-center">
              <h4>Dr. HS Chhabra</h4>
            </div>
          </div>
        </div>
        <div
          class="cs_slider_prev filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4 position-absolute">
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
          class="cs_slider_next filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4 position-absolute">
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
  </section>
  <!-- End Latest Project -->





  <section>
    <div class="container pt-5 pb-5">
      <div class="row">
        <div class="col-lg-6 text-center">
          <h2 class="cs_fs_26 cs_fs_lg_36 pb-4 m-0">Joint Secretary</h2>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. A. N. Parelkar</p>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. R. N. Mitra (Calcutta)</p>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. M. N. Shahane</p>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. P. K. Dave (Delhi)</p>
          <p class="m-0 cs_lh_base cs_fs_18">
            Dr. K. Shrinivasan (Bangalore)
          </p>
          <p class="m-0 cs_lh_base cs_fs_18">
            Dr. Dinubhai Patel (Ahmedabad)
          </p>
        </div>
        <div class="col-lg-6 text-center">
          <h2 class="cs_fs_26 cs_fs_lg_36 pb-4 m-0">Past Secretaries</h2>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. V. T. Ingalhalikar</p>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. S. Y. Bhojraj</p>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. Arvind Jayaswal</p>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. S. Rajasekaran</p>
          <p class="m-0 cs_lh_base cs_fs_18">Dr. Ram Chadda</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Latest Project -->

  <!-- Start Team Details Section -->
  <section class="cs_pt_80 cs_pt_lg_80 cs_pb_50 cs_pb_lg_55">
    <div class="container">
      <div class="row">
        <div class="col-xxl-5 col-xl-5 col-lg-5">
          <div class="cs_mb_25 cs_pr_36 cs_pr_lg_0">
            <img src="assets/img/assi/history1.jpg" alt="Member" class="w-100" />
          </div>
        </div>
        <div class="col-xxl-7 col-xl-7 col-lg-7">
          <!-- Start FAQ Section -->
          <section class="cs_pt_lg_73 cs_pb_50 cs_pb_lg_80 background-filled">
            <div class="container">
              <div class="cs_accordians cs_style_1">
                <div class="cs_accordian active bg-white">
                  <div class="cs_accordian_head">
                    <h2
                      class="cs_accordian_title cs_transition_3 cs_fs_16 fw-medium m-0 cs_pl_25 cs_pt_18 cs_pb_18 cs_pr_35">
                      The Early scientific meetings
                    </h2>
                    <span class="cs_accordian_toggle"></span>
                  </div>
                  <div class="cs_accordian_body">
                    <ul class="pt-4">
                      <li>First ASSICON : 1 to 3 May 1986, Mumbai</li>
                      <li>ASSICON 1987 : Mumbai</li>
                      <li>ASSICON 1988 : Ahmadabad</li>
                      <li>ASSICON 1989 : 10th to 13th September. Mumbai</li>
                    </ul>
                  </div>
                </div>
                <!-- .cs_accordian -->
                <div class="cs_accordian bg-white">
                  <div class="cs_accordian_head">
                    <h2
                      class="cs_accordian_title cs_transition_3 cs_fs_16 fw-medium m-0 cs_pl_25 cs_pt_18 cs_pb_18 cs_pr_35">
                      First International Update Symposium, “ Disorders Of
                      Lumbar Spine”
                    </h2>
                    <span class="cs_accordian_toggle"></span>
                  </div>
                  <div class="cs_accordian_body">
                    <p class="m-0 pt-3 cs_pl_25 cs_pr_25 cs_pb_20">
                      ASSICON 90 ( 8th, 9th December 90 ) Pune <br />
                      The aim of ASSI was to promote scientific spine care,
                      both surgical and non-surgical, in India through the
                      medium of national, regional and local meetings,
                      symposia, CMEs and workshops. The Motto was “if we are
                      doing it, let us do it better”. ASSI promoted any spine
                      related scientific activity, anywhere in India. ASSI
                      also helped formation of local spine bodies.!
                    </p>
                  </div>
                </div>
                <!-- .cs_accordian -->
                <div class="cs_accordian bg-white">
                  <div class="cs_accordian_head">
                    <h2
                      class="cs_accordian_title cs_transition_3 cs_fs_16 fw-medium m-0 cs_pl_25 cs_pt_18 cs_pb_18 cs_pr_35">
                      ASSI Annual Conferences : ASSICONS
                    </h2>
                    <span class="cs_accordian_toggle"></span>
                  </div>
                  <div class="cs_accordian_body">
                    <p class="m-0 cs_pl_25 cs_pr_25 pt-3 cs_pb_20">
                      The annual conference of ASSI is being held every uear
                      now and has experienced growing popularity every year.
                      ASSICONs have been held at Mumbai, Delhi, Hyderabad,
                      Pune, Khajuraho, Jabalpur, Chennai, Chandigarh,
                      Dibrugarh, Banglore, Nagpur, Jaipur, Ahmadabad, Kolkata,
                      Goa and many other cities. The conference is attended by
                      300-400 delegates every year.
                    </p>
                  </div>
                </div>
                <!-- .cs_accordian -->
                <div class="cs_accordian bg-white">
                  <div class="cs_accordian_head">
                    <h2
                      class="cs_accordian_title cs_transition_3 cs_fs_16 fw-medium m-0 cs_pl_25 cs_pt_18 cs_pb_18 cs_pr_35">
                      ASSI Workshops
                    </h2>
                    <span class="cs_accordian_toggle"></span>
                  </div>
                  <div class="cs_accordian_body">
                    <ul class="pt-3">
                      <li>
                        1st Cadaveric Spine Teaching Course in India was held
                        in Sept. 1986 at Lokmanya Tilak Medical College,
                        Mumbai. seventy one Orthopedic Surgeons Enrolled.
                      </li>
                      <li>
                        All other Orthopedic Cadaveric courses (Hip etc. )
                        started afterwards.
                      </li>
                      <li>
                        Since 1986, a large number of workshops were held
                        under the auspices of ASSI or helped by ASSI.
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- .cs_accordian -->
                <div class="cs_accordian bg-white">
                  <div class="cs_accordian_head">
                    <h2
                      class="cs_accordian_title cs_transition_3 cs_fs_16 fw-medium m-0 cs_pl_25 cs_pt_18 cs_pb_18 cs_pr_35">
                      The ASSI Textbook of Spinal Infections and Trauma
                    </h2>
                    <span class="cs_accordian_toggle"></span>
                  </div>
                  <div class="cs_accordian_body">
                    <p class="m-0 cs_pl_25 cs_pr_25 cs_pb_20 pt-3">
                      Keeping up with the Aim, ASSI has published an
                      international quality book which is a matter of great
                      pride to all of us! Edited by Dr. Rajasekaran and other
                      members of ASSI this book is authored by only Indian
                      Spinal Surgeons. The focus was on producing a book which
                      will be helpful to India and all other developing
                      nations. The book has been receieved well by medical
                      community and hasreceived excellent reviews.
                    </p>
                  </div>
                </div>
                <!-- .cs_accordian -->
                <div class="cs_accordian bg-white">
                  <div class="cs_accordian_head">
                    <h2
                      class="cs_accordian_title cs_transition_3 cs_fs_16 fw-medium m-0 cs_pl_25 cs_pt_18 cs_pb_18 cs_pr_35">
                      Formal Certification of Spinal surgeons in India
                    </h2>
                    <span class="cs_accordian_toggle"></span>
                  </div>
                  <div class="cs_accordian_body">
                    <p class="m-0 cs_pl_25 cs_pr_25 cs_pb_20 pt-3">
                      ASSI executives and members, especially Prof P.K.Dave
                      and Dr. Prof Arvind Jaiswal, persuaded "The National
                      Board of Examinations" to recognize "Spinal Surgery as a
                      Subspeciality" in India. First Post - DNB certifying
                      examination was held in 2006.
                    </p>
                  </div>
                </div>
                <!-- .cs_accordians -->
                <div class="cs_accordian bg-white">
                  <div class="cs_accordian_head">
                    <h2
                      class="cs_accordian_title cs_transition_3 cs_fs_16 fw-medium m-0 cs_pl_25 cs_pt_18 cs_pb_18 cs_pr_35">
                      Joint scientific events
                    </h2>
                    <span class="cs_accordian_toggle"></span>
                  </div>
                  <div class="cs_accordian_body">
                    <p class="m-0 cs_pl_25 cs_pr_25 cs_pb_20 pt-3">
                      Today ASSI is a well respected organisation in India and
                      in the world and participates and /or organises
                    </p>
                    <ul>
                      <li>
                        Indian Orthopedic Association's Annual conference.
                        ASSI has a place of pride in hosting subspeciality
                        spine meeting during the IOACON
                      </li>
                      <li>
                        Instructional Lecture Series with European Spine
                        Society annually since 2004.
                      </li>
                      <li>
                        Scoliosis Research Society meeting : Delhi 2009.
                      </li>
                      <li>
                        Dartmouth Hitchcock Travelling Fellowship since 2006.
                      </li>
                      <li>
                        International Spinal Arthroplasty Society had meeting
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- .cs_accordians -->
                <div class="cs_accordian bg-white">
                  <div class="cs_accordian_head">
                    <h2
                      class="cs_accordian_title cs_transition_3 cs_fs_16 fw-medium m-0 cs_pl_25 cs_pt_18 cs_pb_18 cs_pr_35">
                      ASSI 's Overseas Friends
                    </h2>
                    <span class="cs_accordian_toggle"></span>
                  </div>
                  <div class="cs_accordian_body">
                    <p class="m-0 cs_pl_25 cs_pr_25 cs_pb_20 pt-3">
                      Over the last 35 years ASSI has garnered a large number
                      of overseas friends who regularly help ASSI and enjoy
                      being here for ASSI events. They have come to love ASSI
                      and India. We greatly appreciate their association and
                      their contribution to ASSI
                    </p>
                    <p class="m-0 cs_pl_25 cs_pr_25 cs_pb_20 pt-3">
                      In the last 35 years of existence, primary focus of ASSI
                      has been "Patient's welfare first” ! It puts the patient
                      above anything else and practices science. It is an
                      organization of scientists with humane minds.
                    </p>
                  </div>
                </div>
                <!-- .cs_accordians -->
              </div>
            </div>
          </section>
          <!-- End FAQ Section -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Team Details Section -->

  <!--  -->



  <!-- Start Footer -->
  <footer class="cs_footer background-filled text-white" data-src="assets/img/assi/footer_bg.jpeg">
    <div class="container">
      <div
        class="cs_footer_top d-flex justify-content-between align-items-start align-items-md-center cs_pt_46 cs_pb_46 cs_column_gap_15 cs_row_gap_15 flex-md-row flex-column">
        <div class="cs_footer_contact_info">
          <h3 class="text-accent fw-normal cs_mb_4 cs_fs_16 cs_lh_lg">
            Have Any Question?
          </h3>
          <h2 class="text-white fw-medium m-0 cs_fs_22">8929991288</h2>
        </div>
        <div style="width: 30%" class="cs_footer_logo wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">
          <img src="assets/img/assi/ASSI-footer.png" alt="Logo" />
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
                  We find ourselves devoted to enhancing the quality of our fellowship programs, improving our research
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
                    placeholder="Enter your mail" />
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
        <p class="m-0">
          Copyright © 2023 <a href="index.php">Assi</a>. All rights reserved.
        </p>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  <!-- Script -->

  <script>
    // Function to scroll the content vertically
    function autoScroll() {
      let element = document.getElementById("style-2");
      element.scrollBy({
        top: 75, // Scroll down 5 pixels (you can adjust this value)
        behavior: "smooth", // Smooth scrolling behavior
      });
      if (element.scrollTop >= element.scrollHeight - element.clientHeight) {
        // Reset scrollTop when reaching the bottom
        element.scrollTop = 0;
      }
    }

    // Set interval for auto-scrolling
    setInterval(autoScroll, 2000); // Scroll every 2 seconds


  </script>


  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
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