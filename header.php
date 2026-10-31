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
  .indication {
    font-size: 12px;
    color: green;
  }
  
  .floating-div {
    position: fixed;
    bottom: 160px;
    right: 15px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 15px;
  }

  .floating-div img {
    width: 16vw;
    background-color: transparent !important;
    border-radius: 16px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .doc-popup-overlay {
    position: fixed;
    z-index: 10000;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(1);
    width: 90%;
    max-width: 500px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    padding: 20px;
    opacity: 1;
    transition: all 0.5s ease-in-out;
  }
  
  .doc-popup-overlay.minimized {
    top: calc(100% - 230px);
    left: calc(100% - 70px);
    transform: translate(-50%, -50%) scale(0.1);
    opacity: 0;
    pointer-events: none;
  }
  
  .doc-popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
    margin-bottom: 15px;
  }
  
  .doc-popup-header h4 {
    margin: 0;
    color: #e31e24;
    font-size: 18px;
    font-weight: 600;
  }
  
  .doc-popup-close {
    background: none;
    border: none;
    font-size: 28px;
    line-height: 1;
    cursor: pointer;
    color: #333;
    transition: color 0.2s;
  }
  
  .doc-popup-close:hover {
    color: #e31e24;
  }

  .floating-doc-btn {
    background-color: #e31e24;
    color: #ffffff !important;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: all 0.4s ease;
    text-align: center;
    white-space: nowrap;
    border: none;
    cursor: pointer;
    opacity: 0;
    pointer-events: none;
    transform: scale(0.5);
  }

  .floating-doc-btn.active {
    opacity: 1;
    pointer-events: auto;
    transform: scale(1);
  }

  .floating-doc-btn:hover {
    background-color: #c0181d;
  }
.floating-div2 img{
    position: fixed;
    bottom: 50px;
    right: 15px;
    z-index: 9999;
    width: 16%;
    background-color: transparent !important;
    padding: 5px;
    border-radius: 10px;
}

  @media(max-width:600px) {
    .indication {
      font-size: 12px;
      color: green;
      margin-top: 0px !important;
      margin-left: 20px !important;
    }
    .floating-div2 img {
      width: 50%;
    }
  }
</style>

<body>

  <header class="cs_site_header cs_style_1 cs_sticky_header cs_site_header_full_width">
    <div class="cs_main_header">
      <div class="container">
        <div class="cs_main_header_in">
          <div class="cs_main_header_left">
            <a class="cs_site_branding" href="index.php">
              <img src="assets/img/assi/assi-logo.png" alt="Logo">
            </a>
            <div class="cs_nav cs_primary_font fw-medium">
              <ul class="cs_nav_list fw-medium text-uppercase">
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About Assi</a></li>
                <li><a href="video-gallery.php">ASSI TV</a></li>
                <li><a href="mission-and-vission.php">Study Groups</a></li>
                <li class="menu-item-has-children"><a href="education.php">Committee</a>
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
                    <li><a href="aboutus.php#sub-commitee">Scoliosis Screening Sub-Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">ASSI Membership Sub-Committee
                      </a></li>
                    <li><a href="aboutus.php#sub-commitee">ASSI Elearnspine.org Sub-Committee
                      </a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="https://www.assi.in/index.php#events">Events </a>
                  <ul>
                  <li> <a href="index.php#Upcoming-Meetings">Upcoming events</a></li>
                  <li> <a href="index.php#past-meetings">Past events</a></li>
                    <!--<li><a href="#">Associated International Events </a></li>-->
                  </ul>
                </li>
                <!--     <li class="menu-item-has-children"><a href="#">Membership</a>-->
                <!--  <ul>-->
                   <li> <a href="membership-registration.php"> Membership Registration</a></li>
                <!--  </ul>-->
                <!--</li>-->
                <li><a href="contact-us.php">Contact Us</a></li>

<?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])): ?>
    <li class="log-in"><a href="logout.php"><button>Log out</button></a></li>
     <p class="indication">You're Logged in!</p>
<?php else: ?>
    <li class="log-in"><a href="login-page.php"><button>Login</button></a></li>
<?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  
     <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])): ?>
        <div id="docPopup" class="doc-popup-overlay">
            <div class="doc-popup-header">
                <h4>Document Notice</h4>
                <button class="doc-popup-close" id="closeDocPopup">&times;</button>
            </div>
            <div class="doc-popup-body">
                <p>Proposed provisional MoA for ASSI 2026</p>
                <a href="assets/img/Proposed-provisional-MoA-for-ASSI-2026.pdf" style="color: #e31e24; text-decoration: underline;">Click here to view document</a>
            </div>
        </div>
        <div class="floating-div">
            <button id="openDocBtn" class="floating-doc-btn">MoA For ASSI</button>
            <a target="_blank" href="http://assiconnect.in/">
                <img src="assets/img/assi_logo.png" alt="">
            </a>
        </div>
    <?php endif; ?>

     <!-- <div class="floating-div2">
        <a target="_blank" href="https://www.assicon2026pune.com/"><img src="assets/img/icons/float2.jpg"
                alt=""></a>
    </div> -->


  <!-- End Header Section -->


  <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/plugins/isotope.pkg.min.js"></script>
  <script src="assets/js/plugins/jquery.slick.min.js"></script>
  <script src="assets/js/plugins/odometer.js"></script>
  <!-- <script src="assets/js/plugins/ripples.min.js"></script> -->
  <script src="assets/js/plugins/wow.min.js"></script>
  <script src="assets/js/plugins/swiper.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
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

      //select the POPUP FRAME and show it
      // $(".popup").hide().fadeIn(1000);

      //close the POPUP if the button with id="close" is clicked
      // $("#close").on("click", function (e) {
      //   e.preventDefault();
      //   $(".popup").fadeOut(1000);
      // });
      // $(".popup").on("click", function (e) {
      //   e.preventDefault();
      //   $(".popup").fadeOut(1000);
      // });
      
      // Document Popup Animation Logic
      $('#closeDocPopup').on('click', function() {
        $('#docPopup').addClass('minimized');
        setTimeout(function() {
            $('#openDocBtn').addClass('active');
        }, 300);
      });
      
      $('#openDocBtn').on('click', function(e) {
        e.preventDefault();
        $('#openDocBtn').removeClass('active');
        $('#docPopup').removeClass('minimized');
      });

    });
  </script>
</body>

</html>