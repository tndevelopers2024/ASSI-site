<?php
session_start();

// Check if 'logout' parameter is set in URL
if (isset($_GET['logout'])) {
  // Remove the user session and destroy it
  unset($_SESSION['user_id']);
  session_destroy();

  // Redirect to the login page (or any page you want after logout)
  header('Location: login-page.php');
  exit(); // Stop further code execution
}
?>



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

<style>
  .history-sec {
    text-align: left;
    padding: 40px 0;
    background-color: #1B56A5;
  }

  .history-sec h1 {
    font-size: 30px;
    color: #fff;
  }

  .history-sec h3 {
    font-size: 25px;
    color: #fff;
  }
  .slide img {
    min-height:332px;
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
  <?php include "header.php" ?>
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
      <h1 class="cs_fs_48 cs_fs_lg_36 text-white m-0">About Us</h1>
    </div>
  </section>

  <!-- Start Blog Section -->
  <section id="history" class="cs_pt_20 cs_pt_lg_20 cs_pb_lg_80">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="cs_post cs_style_1 bg-white shadow-sm cs_mb_30">

            <div class="cs_pl_40 cs_pr_40 cs_pt_40 cs_pb_40 cs_pl_lg_25 cs_pr_lg_25 cs_pt_lg_25 cs_pb_lg_25">


              <div class="container">
                <h2>About Assi</h2>
                <div class="row">
                  <div class="cs_post_subtitle">
                    The Association of Spine Surgeons of India (ASSI), established in 1985, has played a pivotal role in
                    advancing spine surgery in India. Its formation marked a crucial step toward addressing the nation’s
                    spine care needs. Beginning with a modest group of surgeons, ASSI has grown into a robust community
                    with over 3,500 members today.
                  </div>

                  <div class="cs_post_subtitle pt-2">
                    ASSI has emerged as a hub for scientific education and research, hosting national and international
                    conferences, workshops, and seminars that facilitate knowledge exchange on the latest advancements
                    in spine surgery. Recognizing the need for specialized training, the association has developed
                    standardized fellowship programs, shaping a new generation of skilled spine surgeons.
                  </div>

                  <div class="cs_post_subtitle pt-2">
                    Research has become a cornerstone of ASSI’s mission, with annual grants supporting competitive
                    research projects. Prestigious awards recognize excellence in clinical and basic science research,
                    young investigator achievements, and notable publications. To further promote scientific work, the
                    Indian Spine Journal (ISJ), established six years ago, has gained indexing with Scopus and is on its
                    way to becoming a leading publication in the region.
                  </div>
                  <div class="cs_post_subtitle pt-2">
                    ASSI also emphasizes global collaboration, partnering with international spine societies to exchange
                    expertise and expand its global presence. Through outreach programs, instructional courses,
                    operative workshops, and webinars, the association fosters continuous learning.
                    Community service is central to ASSI’s mission. It organizes medical camps for underprivileged
                    populations and runs advocacy and educational initiatives to raise awareness about spine health.
                  </div>
                  <div class="cs_post_subtitle pt-2">
                    Looking ahead, ASSI aspires to solidify its standing as a world-leading spine surgery association by
                    promoting research, expanding international collaborations, and nurturing a community of spine
                    surgeons committed to excellence and service. Its enduring focus on education, innovation, and
                    societal outreach ensures that it remains at the forefront of spine surgery advancement in India and
                    beyond.
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
  </section>


  <section id="office-bearers" class="Office-Bearers">
    <div class="container pt-5">
      <h2>Core Executive Committee</h2>
      <div class="row pt-3">

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

        <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Appaji.png" alt="Card 1">
            <div class="height-div">
              <h4>Secretary</h4>
              <p>Dr. Appaji Krishnan</p>
              <p>(2025-27)</p>
              <!--<a href="">secretary@assi.in</a>-->
            </div>
          </div>
        </div>


        <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Dr. Naresh Babu.png" alt="Card 4">
            <div class="height-div">
              <h4>Joint Secretary and Treasurer </h4>
              <p>Dr. Naresh Babu
              </p>
              <p>(2025-2027)</p>
              <!--<a href="">jtsecretary@assi.in-->
              <!--  appajikrishnan@gmail.com</a>-->
            </div>
          </div>
        </div>
      </div>

      <div style="justify-content:center;" class="row mt-5">
        <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/DR Saumyajith Basu.png" alt="Card 4">
            <div class="height-div">
              <h4>Immediate Past<br> President
              </h4>
              <p>DR Saumyajit Basu
              </p>
              <p>(2023-25)</p>
              <!--<a href="">jtsecretary@assi.in-->
              <!--  appajikrishnan@gmail.com</a>-->
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Rupinder.png" alt="Card 4">
            <div class="height-div">
              <h4>Immediate Past<br> Secretary
              </h4>
              <p>Dr. R. S. Chahal
              </p>
              <p>(2023-2025)</p>
              <!--<a href="">jtsecretary@assi.in-->
              <!--  appajikrishnan@gmail.com</a>-->
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container pt-5">
      <h2>Executive Members</h2>
      <div class="row">

      <div class="col-lg-3">
        <div class="slide">
          <img src="assets/img/about/Dr. Aditya Banta.png" alt="Card 3">
          <div class="height-div1">
            <p>Dr. Aditya Banta<br>
              (2025-27)</p>
            <!--<a href="">muralidharan.spine@gmail.com</a>-->
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="slide">
          <img src="assets/img/about/Dr_Ashwin.jpg" alt="Card 3">
          <div class="height-div1">
            <p>Dr. Ashwin K. Khandge<br>
              (2025-28)</p>
            <!--<a href="">muralidharan.spine@gmail.com</a>-->
          </div>
        </div>
      </div>
      
      <div class="col-lg-3">
        <div class="slide">
          <img src="assets/img/about/Dr_Ishwara.jpg" alt="Card 3">
          <div class="height-div1">
            <p>Dr. Ishwara Keerthi C<br>
              (2025-28)</p>
            <!--<a href="">muralidharan.spine@gmail.com</a>-->
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="slide">
          <img src="assets/img/about/Chaitanya.jpg" alt="Card 3">
          <div class="height-div1">
            <p>Dr. K.S.K. Chaitanya<br>
              (2025-28)</p>
            <!--<a href="">muralidharan.spine@gmail.com</a>-->
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="slide">
          <img src="assets/img/about/Sasidharan.jpg" alt="Card 3">
          <div class="height-div1">
            <p>Dr. M.D.S. Sasidharan<br>
              (2025-28)</p>
            <!--<a href="">muralidharan.spine@gmail.com</a>-->
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="slide">
          <img src="assets/img/about/Dr. Neeraj.png" alt="Card 2">
          <div class="height-div1">
            <p>Dr. Neeraj Gupta<br>
              (2025-27)</p>
            <!--<a href="">tnrathod@gmail.com</a>-->
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="slide">
          <img src="assets/img/about/DR Phani.png" alt="Card 1">
          <div class="height-div1">
            <p>Dr. Phani Kiran S<br> (2025-27)
            </p>
            <!--<a href="">naveen.st@gmail.com</a>-->
          </div>
        </div>
      </div>

      <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Dr. Rohan Gala.png" alt="Card 9">
            <div class="height-div1">
              <p>Dr. Rohan Gala<br>
                (2025-27)</p>
              <!--<a href="">sachin.aiims@gmail.com</a>-->
            </div>
          </div>
        </div>

      
      <div class="col-lg-3">
        <div class="slide">
          <img src="assets/img/about/Dr_Vishnu.jpg" alt="Card 3">
          <div class="height-div1">
            <p>Dr. Vishnu Prasath CS<br>
              (2025-28)</p>
            <!--<a href="">muralidharan.spine@gmail.com</a>-->
          </div>
        </div>
      </div>

      
      

      

        

        
      </div>
      <div class="row">
        <!--<div class="col-lg-3">-->
        <!--  <div class="slide">-->
        <!--    <img src="assets/img/about/Navin Thasildar.png" alt="Card 1">-->
        <!--    <div class="height-div1">-->
        <!--      <p>Dr. Naveen Tahasildar<br> (2023-25)-->
        <!--      </p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="col-lg-3">-->
        <!--  <div class="slide">-->
        <!--    <img src="assets/img/about/Tushar Rathod.png" alt="Card 2">-->
        <!--    <div class="height-div1">-->
        <!--      <p>Dr. Tushar Rathod<br>-->
        <!--        (2023-25)</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="col-lg-3">-->
        <!--  <div class="slide">-->
        <!--    <img src="assets/img/about/Murali Venkateshan.png" alt="Card 3">-->
        <!--    <div class="height-div1">-->
        <!--      <p>Dr. Muralidharan Venkatesan<br>-->
        <!--        (2023-25)</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->

        <!--<div class="col-lg-3">-->
        <!--  <div class="slide">-->
        <!--    <img src="assets/img/about/SachinBorkar.png" alt="Card 9">-->
        <!--    <div class="height-div1">-->
        <!--      <p>Dr. Sachin A. Borkar<br>-->
        <!--        (2023-25)</p>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
      </div>

      <div class="row">
        <!-- <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/RishiKanna.png" alt="Card 5">
            <div class="height-div1">
              <p>Dr. Rishi Kanna<br>
                (2024-26)</p>
            </div>
          </div>
        </div> -->

        <!-- <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Tarun Suri.png" alt="Card 6">
            <div class="height-div1">
              <p>Dr. Tarun Suri<br>
                (2024-26)</p>
            </div>
          </div>
        </div> -->

        <!-- <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/PriankPatel.png" alt="Card 7">
            <div class="height-div1">
              <p>Dr. Priyank Patel<br>
                (2024-26)</p>
            </div>
          </div>
        </div> -->

        <!-- <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Varun Agarwal.png" alt="Card 8">
            <div class="height-div1">
              <p>Dr. Varun Agarwal<br>
                (2024-26)</p>
            </div>
          </div>
        </div> -->
      </div>

      <div style="justify-content:center;" class="row mt-5">
        <!-- <div class="col-lg-3">
          <div class="slide">
            <img src="assets/img/about/Gurudip Das.png" alt="Card 4">
            <div class="height-div1">
              <p>Dr. Gurudip Das<br>
                (2024-26)</p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>




  <script>
    // Define openTab1 function
    function openTab1(evt, tabName) {
      // Hide all elements with class="tabshown" and remove "active" class from all buttons
      const tabContents = document.getElementsByClassName("tabshown");
      for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = "none";
      }
      const tabButtons = document.getElementsByClassName("btn-tab");
      for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove("active");
      }
      // Show the current tab and add an "active" class to the button that opened the tab
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.classList.add("active");
    }

    // Slide navigation
    const sliders = document.querySelectorAll('.slider');

    sliders.forEach(slider => {
      const slidesContainer = slider.querySelector('.slides-container');
      const totalSlides = slidesContainer.children.length;
      let slideIndex = 0;

      slider.querySelector('.prev').addEventListener('click', () => {
        slideIndex = (slideIndex - 1 + totalSlides) % totalSlides;
        updateSlider(slidesContainer, slideIndex);
      });

      slider.querySelector('.next').addEventListener('click', () => {
        slideIndex = (slideIndex + 1) % totalSlides;
        updateSlider(slidesContainer, slideIndex);
      });
    });

    function updateSlider(slidesContainer, slideIndex) {
      const slideWidth = 100 / slidesContainer.children.length;
      const offset = -slideIndex * slideWidth;
      slidesContainer.style.transform = `translateX(${offset}%)`;
    }
  </script>

  <script>
    function openTab1(evt, tabName) {
      var i, tabshown, btnTab;

      // Hide all tab content
      tabshown = document.getElementsByClassName("tabshown");
      for (i = 0; i < tabshown.length; i++) {
        tabshown[i].classList.remove("active");
      }

      // Deactivate all buttons
      btnTab = document.getElementsByClassName("btn-tab");
      for (i = 0; i < btnTab.length; i++) {
        btnTab[i].classList.remove("active");
      }

      // Show the selected tab and activate the button
      document.getElementById(tabName).classList.add("active");
      evt.currentTarget.classList.add("active");
    }
  </script>

  <div id="sub-commitee" class="cs_section_heading_in Sub-Committees">
    <h2 class="cs_fs_32 cs_fs_lg_36 m-0">Sub Committees</h2>
  </div>
  <!-- Sub Committees -->
  <div class="container pb-5">
    <div class="tabs-navs">
      <div class="tab">
        <button class="tablinks active" onclick="openTab(event, 'Tab1')">
          Education Committee

        </button>
        <button class="tablinks" onclick="openTab(event, 'Tab2')">
          Research & Award Committee
        </button>
        <button class="tablinks" onclick="openTab(event, 'Tab3')">
          Program Committee
        </button>
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab4')">
          Website Committee
        </button> -->
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab5')">
          Advocacy Committee
        </button> -->
        <button class="tablinks" onclick="openTab(event, 'Tab6')">
          Finance Committee
        </button>
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab7')">
          Nomination & Constitution Committee
        </button> -->
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab8')">
          ASSI Case Discussion Forum Sub-Committee
        </button> -->
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab9')">
          ISJ Sub-Committee
        </button> -->
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab10')">
          ASSI Outreach Program Sub-committee
        </button> -->
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab11')">
          ASSI Spine Registry Sub-Committee
        </button> -->
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab12')">
          Scoliosis Screening Sub-Committee
        </button>
        <button class="tablinks" onclick="openTab(event, 'Tab13')">
          ASSI Membership Sub-Committee
        </button> -->
        <!-- <button class="tablinks" onclick="openTab(event, 'Tab14')">
          ASSI Elearnspine.org Sub-Committee
        </button> -->
        <button class="tablinks" onclick="openTab(event, 'Tab15')">
          ISJ Journal Committee
        </button>
        <button class="tablinks" onclick="openTab(event, 'Tab16')">
          ASSI Outreach Committee

        </button>
        <button class="tablinks" onclick="openTab(event, 'Tab17')">

          ASSI Short-term Observership Committee

        </button>
        <button class="tablinks" onclick="openTab(event, 'Tab18')">

          ASSI Website Committee

        </button>
      </div>
      <!-- tab1 -->
      <div id="Tab1" class="tabcontent active">
        <h3>| ASSI Education Committee</h3>

        <p><b>Members:</b></p>
        <ul>
          <li style="color:green;"><b>Dr Ajoy Shetty - Core EC Incharge</b>
          </li>
          <li style="color:#1B56A5;">
            <b>Dr Gururaj (Chair) </b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Murulidharan Venkatesan ( Co-chair )</b>
          </li>
          <li>
            Dr Neeraj Gupta
          </li>
          <li>Dr Phani Kiran</li>
          <li>Dr Mantu jain</li>
          <li>Dr Rohan Gala</li>
          <li>Dr.Vignesh B</li>
          <li>Dr Amitava Biswas</li>
          <li>ASSI Executive - Neema Bisht/Om Prakash</li>
        </ul>


        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Conduction of ASSI PG teaching courses
          </li>
          <li>
            Conduction of Fellowship Entrance, Exit Exam
          </li>
          <li>Short Term Observership Programs
          </li>
          <li>
            Accreditation/Reacreditation of Institutes
          </li>
        </ul>
      </div>
      <!-- tab2 -->
      <div id="Tab2" class="tabcontent">
        <h3>| ASSI Research & Award Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:green;"><b>Dr Saumyajit Basu ( Core EC In Charge )</b>
          </li>
          <li style="color:#1B56A5;">
            <b>Dr J.Naresh Babu( Chair )
            </b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Janardhana Aithala ( Co-Chair )
            </b></li>
          <li>Dr Suresh Pillai
          </li>
          <li>Dr Siddharth Aiyer
          </li>
          <li>Dr Tarun Suri
          </li>
          <li>Dr Vishal Kumar
          </li>
          <li>ASSI Executive - Om Prakash/Neema Bisht

          </li>
        </ul>


        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Shortlist judges, Evaluate all ASSI Research Awards
          </li>
          <li>
            Call for Research Proposals in a prepared format
          </li>
          <li>Updating Research part of the Website
          </li>
          <li>
            Workshops on Research Methodology
          </li>
        </ul>

      </div>
      <!-- tab3 -->
      <div id="Tab3" class="tabcontent">
        <h3>| ASSI Program Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:green;"><b>Dr Rupinder Singh Chahal (Core EC In Charge)
            </b>
          </li>
          <li style="color:#1B56A5;">
            <b>Dr R.S. Chahal (Chair )
            </b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Thomas Kishen (Co-Chair)
            </b>
          </li>
          <li>
            Dr Umesh Srikantha

          </li>
          <li>Dr Parthasarathy
          </li>
          <li>ASSI Executive - Neema Bisht
          </li>

        </ul>


        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>ASSICON, ICS,ASSI Live Surgery Program formulation.
          </li>
          <li>
            International Society/ Meeting collaboration.
          </li>
          <li>Coordinating with other national meetings.
          </li>
          <li>
            Coordinating with other societies.
          </li>
        </ul>
      </div>
      <!-- tab4 -->
      <div id="Tab4" class="tabcontent">
        <h3>| ASSI Website Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:green;"><b>Dr Rupinder Chahal and Dr Appaji Krishnan (Core EC In Charge)</b>
          </li>
          <li style="color:#1B56A5;">
            <b>Dr Venkatesh Krishnan (Chair)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Tushar Rathod (Co Chair)</b>
          </li>
          <li>
            Dr R. Sivakumar
          </li>
          <li>Dr Aju Bosco</li>
          <li>Dr Chiranjit Singh Dhillon</li>
          <li>Dr Navin Tahsildar</li>
        </ul>


        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Updating existing website including member updates
          </li>
          <li>
            Creating patient information base
          </li>
          <li>Creating system of issuing mail alerts
          </li>
          <li>
            Creating and Monitoring the payment portal
          </li>
        </ul>
      </div>
      <!-- tab5 -->
      <div id="Tab5" class="tabcontent">
        <h3>| ASSI Advocacy Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:green;"><b>Dr Shankar Acharya (Core EC In Charge)</b>
          </li>
          <li style="color:#1B56A5;">
            <b>Dr HS Chhabra (Chair)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Sailesh Hadgaonkar (Co-Chair)</b>
          </li>
          <li>
            Dr Suresh Pillai
          </li>
          <li>Dr Arun Bhanot</li>
          <li>Dr Arvind Bhave</li>
          <li>Dr Varun Agarwal</li>
        </ul>


        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Addressing medico-legal concerns
          </li>
          <li>
            Interacting with regulatory authorities, media
          </li>
          <li>SCI day, Injury Prevention, Osteoporosis
          </li>
          <li>
            ASSI Consent Forms
          </li>
        </ul>
      </div>
      <!-- tab6 -->
      <div id="Tab6" class="tabcontent">
        <h3>| ASSI Finance Committee</h3>

        <p><b>Members:</b></p>
        <ul>
          <li style="color:green;"><b>Dr Appaji Krishnan / Dr. Naresh Babu ( Core EC In Charge )
            </b>
          </li>
          <li style="color:#1B56A5;">
            <b>Dr Vishal Kundnani ( Chair )
            </b>
          </li>
          <li>
            Dr Ayush Sharma

          </li>
          <li>Dr Subir N. Jhaveri
          </li>
          <li>ASSI Executive - Mr. GD Mishra
          </li>

        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Income Generation
          </li>
          <li>
            Budgetary Allocation and Expenditure Calculations
          </li>
          <li>Ensuring IT / GST compliance
          </li>
          <li>
            Closing of Pending Accounts
          </li>
        </ul>
      </div>
      <!-- tab7 -->
      <div id="Tab7" class="tabcontent">
        <h3>| ASSI Nomination & Constitution Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:green;"><b>Dr Shankar Acharya (Core EC In Charge)</b>
          </li>
          <li style="color:#1B56A5;">
            <b>Dr Shankar Acharya (Chair) (Immediate Past President)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Saumyajit Basu (Co-Chair)(President)</b>
          </li>
          <li>
            Dr Sudhir Srivastava (President Elect)
          </li>
          <li>Dr H. S. Chhabra (Ex President)</li>
          <li>Dr Ram Chaddha (Ex-President)</li>
          <li>Dr Raghava Dutt Mulukutla (Ex-President)</li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Inviting applications of vacant positions in EC
          </li>
          <li>
            Screening applications for ASSI events
          </li>
          <li>Creating eligibility criteria for various posts
          </li>
          <li>
            Constitutional issues/amendments
          </li>
        </ul>
      </div>
      <!-- tab8 -->
      <div id="Tab8" class="tabcontent">
        <h3>| ASSI Case Discussion Forum Sub-Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr Kshitij Chaudhary (Chair)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Sachin Borkar (Co Chair)</b>
          </li>
          <li>
            Dr Priyank Patel
          </li>
          <li>Dr Shah Waliullah </li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Setting up some reward processes
          </li>
          <li>
            ASSI Connect for getting opinions on cases
          </li>
        </ul>
      </div>
      <!-- tab9 -->
      <div id="Tab9" class="tabcontent">
        <h3>| ASSI ISJ Sub-Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr Manish Chadha (Chair) </b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Sudhir Ganesan (Co Chair)</b>
          </li>
          <li>
            Dr Sumit Sural
          </li>
          <li>Dr Arvind Kulkarni</li>
          <li>Dr Amit Jhala</li>
          <li>Dr Raghava Dutt Mululkutla</li>
          <li>Dr Pramod Sudrarshan</li>
          <li>Dr K V Menon</li>
          <li>Dr B.N. Upendra</li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Increasing Original Articles, Pubmed Indexing.
          </li>
          <li>
            Revamping the Editoral Board, Reviewers
          </li>
        </ul>
      </div>
      <!-- tab8 -->
      <div id="Tab8" class="tabcontent">
        <h3>| ASSI Outreach Program Sub-committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr Abhishek Srivastava (Chair)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Shyamsunder Bhatt (Co Chair)</b>
          </li>
          <li>
            Dr Bikram Kar
          </li>
          <li>Dr Umesh (manipur)</li>
          <li>Dr Chirayu Parmecha</li>
          <li>Dr Suhail Afzal</li>
          <li>Dr Sarvdeep Dhatt</li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Collaborating with Local Societies and Medical Colleges
          </li>
          <li>
            Structured Course Program
          </li>
        </ul>
      </div>
      <!-- tab10 -->
      <!-- <div id="Tab10" class="tabcontent">
        <h3>| ASSI Outreach Program Sub-committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr Abhishek Srivastava (Chair)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Shyamsunder Bhatt (Co Chair)</b>
          </li>
          <li>
            Dr Bikram Kar
          </li>
          <li>Dr Umesh (manipur)</li>
          <li>Dr Chirayu Parmecha</li>
          <li>Dr Suhail Afzal</li>
          <li>Dr Sarvdeep Dhatt</li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Collaborating with Local Societies and Medical Colleges
          </li>
          <li>
            Structured Course Program
          </li>
        </ul>
      </div> -->
      <!-- tab11 -->
      <div id="Tab11" class="tabcontent">
        <h3>| ASSI Spine Registry Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr Bharat Dave (Chair)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Amitava Biswas (Co Chair)</b>
          </li>
          <li>
            Dr Mirant Dave
          </li>
          <li>Dr Raju Srinivasan Iyengar</li>
          <li>Dr Sandeep Sonone</li>
          <li>Dr Devanand D</li>
          <li>Dr Thomas Kishen </li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Evaluation of accumulated data
          </li>
          <li>
            Follow-up data retrieval systems
          </li>
        </ul>
      </div>
      <!-- tab12 -->
      <div id="Tab12" class="tabcontent">
        <h3>| ASSI Task Force on Scoliosis Screening Program</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr Ranjith Unnikrishnan (Chair)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Dhiraj Sonawane (Co-Chair) </b>
          </li>
          <li>
            Dr Ujjwal Debnath
          </li>
          <li>Dr Montu jain</li>
          <li>Dr Varun aggarwal</li>
          <li>Dr Ayush sharma</li>
          <li>Dr Suresh Pillai</li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Setting up nodal centers for Screening in various zones
          </li>
          <li>
            Analysis of results already captured
          </li>
        </ul>
      </div>
      <!-- tab13 -->
      <div id="Tab13" class="tabcontent">
        <h3>| ASSI Membership Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr Abrar Ahmed (Chair)</b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Neeraj Gupta (Co Chair)</b>
          </li>
          <li>
            Dr Ashish Jaiswal
          </li>
          <li>Dr Charanjit Singh Dhillon</li>
          <li>Dr Niraj B Vasavada</li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Strive for VAS Membership
          </li>
          <li>
            Correcting ASSI members details
          </li>
        </ul>
      </div>
      <!-- tab14 -->
      <div id="Tab14" class="tabcontent">
        <h3>| ASSI Elearnspine.org Sub-Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr H S Chhabra (Chair) </b>
          </li>
          <li style="color:#1B56A5;"><b>Rajat Mahajan (Co-Chair)</b>
          </li>
          <li>
            Vikshet Basani
          </li>
          <li>Dr Vishal Kumar</li>
          <li>Dr Ashok Thomas</li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Time bound closure of the job
          </li>
          <li>
            Financial viability to be ensured
          </li>
        </ul>
      </div>
      <!-- tab15 -->
      <div id="Tab15" class="tabcontent">
        <h3>| ISJ Journal Committee</h3>
        <p><b>Members:</b></p>
        <ul>
          <li style="color:#1B56A5;">
            <b>Dr Rishi Kanna ( Chair )
            </b>
          </li>
          <li style="color:#1B56A5;"><b>Dr Sudhir Ganesan (Co Chair)
            </b>
          </li>
          <li>
            Dr. Rohan Gala

          </li>
          <li>Dr. Macherla Babu Subramanian</li>
          <li>Dr Pramod Sudrarshan</li>
          <li>Dr. Arun Kumar Vishwanathan</li>
        </ul>

        <p><b>Role and Responsibilities:</b></p>
        <ul>
          <li>Increasing Original Articles, Pubmed Indexing.

          </li>
          <li>
            Revamping the Editoral Board, Reviewers

          </li>
        </ul>
      </div>
      <!-- tab16 -->
      <div id="Tab16" class="tabcontent">
        <h3>| ASSI Outreach Committee

        </h3>
        <p><b>Members:</b></p>
        <ul>

          <li style="color:#1B56A5;"><b>Dr R.S. Chahal ( Chair )

            </b>
          </li>

        </ul>

      </div>
      <!-- tab17 -->
      <div id="Tab17" class="tabcontent">
        <h3>| ASSI Short-term Observership Committee</h3>
        <p><b>Members:</b></p>
        <ul>

          <li style="color:#1B56A5;"><b>Dr. Ankur Nanda ( Chair )

            </b>
          </li>
        </ul>
      </div>
      <!-- tab18 -->
      <div id="Tab18" class="tabcontent">
        <h3>| ASSI Short-term Observership Committee</h3>
        <p><b>Members:</b></p>
        <ul>

          <li style="color:#1B56A5;"><b>Dr. Appaji Krishnan (Chair)

            </b>
          </li>

          <li>Dr. Kshitij Chaudhary


          </li>
          <li>Dr. Priyank Patel

          </li>
        </ul>
      </div>
    </div>
  </div>

  <script>
    function openTab(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>

  <!--  -->

  <section class="history-sec">
    <div class="container">
      <div class="row">
        <h1>History of Association of Spine Surgeons of India ( ASSI )</h1>
        <h3>THE JOURNEY SO FAR !</h3>
        <p class="text-white">The Association of Spine Surgeons of India (ASSI) was established in 1985, marking a
          pivotal moment in the history of spine surgery in India. Its origins trace back to 1983, when an international
          symposium on spinal trauma was held at Vigyan Bhavan, New Delhi... </p>

        <div style="" class="d-flex pt-4">
          <a href="history.php"
            class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>Click
              here to Know More</span></a>
        </div>
      </div>
    </div>
  </section>





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