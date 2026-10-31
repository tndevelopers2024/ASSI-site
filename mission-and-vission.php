<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Laralink" />
  <link rel="icon" href="assets/img/assi/assi-logo.png" />
  <title>ASSI Study Groups - ASSI</title>

  <!-- Google Font: Rubik -->
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/default.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: "Inter", sans-serif;
      background-color: #f8fafc;
      color: #1f2937;
    }

    /* HERO */
    .hero {
      background: linear-gradient(120deg, #1e3a8a, #2563eb);
      color: #fff;
      padding: 50px 0 0px;
      position: relative;
      overflow: hidden;
    }

    .hero img {
      max-width: 100%;
      border-radius: 16px;
    }

    /* SECTION */
    .section {
      padding: 80px 0;
    }

    .section-title {
      font-weight: 700;
      margin-bottom: 15px;
    }

    .section-subtitle {
      color: #6b7280;
      max-width: 750px;
      margin: 0 auto 50px;
    }

    /* CARDS */
    .info-card {
      background: #fff;
      border-radius: 18px;
      padding: 30px;
      height: 100%;
      box-shadow: 0 10px 30px rgba(0,0,0,0.06);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 45px rgba(0,0,0,0.12);
    }

    .icon-box {
      width: 60px;
      height: 60px;
      background: linear-gradient(135deg, #2563eb, #1e40af);
      color: #fff;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      margin-bottom: 20px;
    }

    /* IMAGE BLOCK */
    .image-block img {
      width: 100%;
    }

    /* LIST STYLE */
    .custom-list li {
      margin-bottom: 10px;
      padding-left: 10px;
    }

    /* FOOTER */
    .footer {
      background: #020617;
      color: #cbd5f5;
      padding: 30px 0;
      text-align: center;
    }
    @media screen and (max-width:734px){
      .hero{
        padding-top:140px;
      }
    }
  </style>
</head>

<body class="bg-light">
  <?php include "header.php" ?>

  <!-- HERO -->
  <section class="hero">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold text-white">ASSI Study Groups</h1>
          <p class="lead">
            With Fostering collaboration and pooling expertise, a study group can contribute significantly to the field of spine surgery. Successful study groups thrive on active participation, open communication, and a shared commitment to advancing spinal care.
          </p>
        </div>
        <div class="col-lg-6 text-center">
          <!-- Replace image -->
          <img src="assets/img/doctor-home.webp" style="width:400px;" alt="Spine Research">
        </div>
      </div>
    </div>
  </section>

  <!-- COMMON INTERESTS -->
  <section class="section">
    <div class="container text-center">
      <h2 class="section-title">Identification of Common Interests</h2>
      <p class="section-subtitle">
        Focused collaboration across key domains in spine surgery.
      </p>

      <div class="row g-4 mt-4">
        <div class="col-md-4">
          <div class="info-card text-center">
            <div class="icon-box mx-auto"><i class="bi bi-people"></i></div>
            <h5>Pediatric Deformities</h5>
            <p>Advancing care and outcomes for pediatric spinal deformities.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="info-card text-center">
            <div class="icon-box mx-auto"><i class="bi bi-cpu"></i></div>
            <h5>Enabling Technologies</h5>
            <p>Exploring innovative technologies shaping modern spine surgery.</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="info-card text-center">
            <div class="icon-box mx-auto"><i class="bi bi-shield-check"></i></div>
            <h5>Infections</h5>
            <p>Improving prevention, diagnosis, and management of spinal infections.</p>
          </div>
        </div>
      </div>
      
      <div class="mt-4">
        <h2 class="mb-0 mt-5 pt-5">ASSI Study Groups</h2>
        <img src="assets/img/Artboard.png" style="width:100%;" alt="">
      </div>
    </div>
  </section>

  <!-- FORMALIZATION -->
  <section class="section bg-light">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6 image-block">
          <!-- Replace image -->
          <img src="assets/img/doctor-group.png" alt="Leadership">
        </div>
        <div class="col-lg-6">
          <h2 class="section-title">Formalization of the Group</h2>
          <ul class="custom-list">
            <li>Define goals, objectives, and scope.</li>
            <li>
              Create a name for the group that reflects its purpose, e.g. ASSISGET for Enabling Technologies and ASSISGIN for Infection and ASSISGPD for Pediatric Deformities. 
            </li>
            <li>Appoint leadership roles (e.g., Advisor, Chair, Co-Chair, Secretary) to manage group activities.  Invite spine surgeons from the society to join the study group- Encourage active participation and commitment.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- EDUCATION -->
  <section class="section bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Educational Initiatives & Regular Meetings</h2>
      <p class="section-subtitle">
        Promoting continuous learning, collaboration, and active member participation.
      </p>
    </div>

    <div class="row g-4">
      <!-- Point 1 -->
      <div class="col-md-4">
        <div class="info-card text-center h-100">
          <div class="icon-box mx-auto">
            <i class="bi bi-mortarboard"></i>
          </div>
          <h5 class="fw-semibold">Structured Educational Sessions</h5>
          <p>
            Organize educational sessions within the study group by inviting
            guest speakers, sharing learning resources, and discussing
            emerging techniques in spine surgery.
          </p>
        </div>
      </div>

      <!-- Point 2 -->
      <div class="col-md-4">
        <div class="info-card text-center h-100">
          <div class="icon-box mx-auto">
            <i class="bi bi-calendar-check"></i>
          </div>
          <h5 class="fw-semibold">Regular ASSI Meetings</h5>
          <p>
            Schedule regular meetings during ASSI events (virtual or in-person)
            to discuss research progress, share findings, and strengthen
            collaborative efforts.
          </p>
        </div>
      </div>

      <!-- Point 3 -->
      <div class="col-md-4">
        <div class="info-card text-center h-100">
          <div class="icon-box mx-auto">
            <i class="bi bi-chat-square-text"></i>
          </div>
          <h5 class="fw-semibold">Interactive Academic Activities</h5>
          <p>
            Host webinars, journal clubs, and case discussions, with rotating
            facilitators to encourage inclusive participation from all members.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- RESEARCH -->
  <section class="section bg-light">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <h2 class="section-title">Research Projects and Publications</h2>
          <ul class="custom-list">
            <li>Identify research topics or questions relevant to the group as a part of ASSI-directed research.</li>
            <li>Collaborate on multicenter prospective studies. Collect data, analyze results, and publish findings. Create a platform for data sharing and collaboration. Use secure databases or platforms to store and exchange research data.</li>
            <li>Collaborate on manuscripts, systematic reviews, and meta-analyses. Aim for high-quality research publications.</li>
          </ul>
        </div>
        <div class="col-lg-6 image-block">
          <!-- Replace image -->
          <img src="assets/img/doctor-research.png" alt="Research">
        </div>
      </div>
    </div>
  </section>

  <!-- ADVOCACY -->
  <section class="section">
    <div class="container text-center">
      <h2 class="section-title">Advocacy and Networking Opportunities</h2>
      <p class="section-subtitle">
        Building strong professional networks and representing ASSI research globally.
      </p>

      <div class="row g-4 mt-4">
        <div class="col-md-6">
          <div class="info-card">
            <div class="icon-box mx-auto"><i class="bi bi-diagram-3"></i></div>
            <p>Facilitate networking among study group members.</p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="icon-box mx-auto"><i class="bi bi-globe2"></i></div>
            <p>Attending conferences together and present group research.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

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

</body>
</html>
