<?php
ob_start(); // Start output buffering

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include Composer's autoloader
require 'vendor/autoload.php';

// Include the database configuration file
require 'config.php';

$email = $_SESSION['email'];
$password = $_SESSION['password'];
$otp = $_SESSION['otp'];
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['otp'])) {
  // If OTP is not set, redirect to registration page
  header('location: index.php');
  exit();
}

if (isset($_POST['submit'])) {
  // Concatenate the OTP digits into a single string
  $enteredOTP = implode("", $_POST['otp']);

  $storedOTP = $_SESSION['otp'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];

  if ($enteredOTP == $storedOTP) {
    // OTP matched, proceed with updating the password
    $update_password_query = mysqli_query($conn, "UPDATE `users` SET password = '$password' WHERE TRIM(email) = '$email' ");
    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$user_id' ") or die('query failed');

    if ($update_password_query) {
      // Password updated successfully
      // Clear OTP and session variables
      unset($_SESSION['otp']);
      unset($_SESSION['email']);
      unset($_SESSION['password']);

      // Redirect to dashboard or success page
      $user_row = mysqli_fetch_assoc($select_user);
      $_SESSION['user_id'] = $user_row['id'];
      header('location: dashboard.php');
      exit();
    } else {
      $error = "Failed to update password. Please try again.";
    }
  } else {
    // OTP didn't match, show error message
    $error = "Invalid OTP. Please try again.";
  }
}

// Resend OTP
if (isset($_POST['resend'])) {
  $email = $_SESSION['email'];
  $otp = $_SESSION['otp'];
  sendOTP($email, $otp);
}

function sendOTP($email, $otp)
{
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = false;
    $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com'; // Google Workspace SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'assisecretariat@assi.in'; // Your Google Workspace email
    $mail->Password = 'favndayuuqgulima'; // Use App Password if 2FA is enabled
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; // Use 465 for SSL
            $mail->setFrom('assisecretariat@assi.in', 'Assi');
    $mail->addAddress($email);  // Add a recipient

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'OTP Verification';
    $mail->Body = 'Your OTP for registration is: ' . $otp;

    $mail->send();

  
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Assi OTP Verification</title>
  <link rel="stylesheet" href="assets/css/style.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/plugins/slick.css">
  <link rel="stylesheet" href="assets/css/plugins/animate.css">
  <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">
  <link rel="stylesheet" href="assets/css/plugins/odometer.css">
  <link rel="stylesheet" href="assets/css/default.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet" />
  <style>
    .login-1 {
      background-image: url(assets/images/login-img.png);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      display: grid;
      place-items: center;
    }

    .otp-input {
      width: 10% !important;
      padding: 12px !important;
      height: 50px !important;
      text-align: center !important;
    }

    form h3 {
      text-align: center;
      font-size: 30px;
    }

    form {
      display: grid;
      place-items: center;
    }

    form div {
      width: 55%;
      justify-content: center;
      display: flex;
      margin: auto;
    }
button{
  margin-top: 30px;
}
    .logo-container {
      display: grid;
      margin: 30px 0;
      padding-left: 50px;
      place-items: center;
    }

    .login-1 span {
      color: #fff;
      font-weight: 800;
    }

    .login-page {
      padding: 170px 100px 100px;
    }

    .h-100vh {
      height: 89vh;
    }

    .login-page button {
      width: 22%;
      background: #1953a2;
      color: #fff;
      border: none;
      border-radius: 5px;
    }

    .login-page button {
      padding: 13px 68px !important;
    }



    @media (max-width: 600px) {
      .login-page button {
        padding: 13px 160px !important;
        width: 100% !important;
      }

      .login-2 {
        padding: 0px 20px 11px 20px !important;
      }

      .logo-container {
        place-items: center !important;
        padding-left: 0px !important;
      }

      .logo-container img {
        height: 100px !important;
        margin-left: 0px !important;
      }
    }

    .cs_nav .cs_nav_list>li {
      margin-right: 30px;
      height: inherit;
    }

    .cs_site_branding+.cs_nav {
      margin-left: 10px;
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
                <li class="menu-item-has-children"><a href="education.php">Events </a>
                  <ul>
                    <li> <a href="index.php#Upcoming-Meetings">Upcoming events</a></li>
                    <!--<li><a href="#">Associated International Events </a></li>-->
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
                </li>
                <li class="menu-item-has-children"><a href="#">Membership</a>
                  <ul>
                    <li> <a href="membership-registration.php">Online Membership Registration</a></li>
                    <!--<li><a href="https://www.assi.in/Subscription-Services.php">Value Added Subscription Service (VASS)</a></li>-->
                    <!--<li><a href="#">Offline Registration</a></li>-->
                    <!--<li><a href="https://www.assi.in/payment_option.php">Payment Options</a></li>-->
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

  <!-- End Header Section -->
  <section class="login-page ">
    <div class="container-fluid ">
      <div class="row ">

        <div class="col-12 col-lg-12 col-md-12 login-2">

          <form action="" method="post" enctype="multipart/form-data">
            <h3>OTP Verification</h3>
            <?php if (isset($error)) { ?>
              <div><?php echo $error; ?></div>
            <?php } ?>
            <p>OTP sended to your email : <b style="color:#E4322C;text-decoration: underline;"><?php echo $email; ?></b></p>
            <label for="otp">Enter OTP</label>
            <div>
              <?php for ($i = 0; $i < 6; $i++) { ?>
                <input class="otp-input" type="text" maxlength="1" name="otp[]" required
                  oninput="moveToNext(this, <?php echo $i; ?>)">
              <?php } ?>
            </div>
            <button type="submit" name="submit" value="Verify">Register</button>
          </form>
          <form method="post">
            <input style="    background: none;
    box-shadow: none;    color: #e5322c;
    margin-top: 20px;
    border: navajowhite;" type="submit" name="resend" value="Resend OTP">
          </form>

          <?php if (isset($_POST['resend'])) { ?>
            <div>OTP has been resent to your email.</div>
          <?php } ?>

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
        <p class="m-0">Copyright © 2023 <a href="index.html">Assi</a>. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script>
    function moveToNext(input, index) {
      var inputLength = input.value.length;

      if (inputLength === 1) {
        var nextIndex = index + 1;
        var nextInput = document.getElementsByName('otp[]')[nextIndex];

        if (nextInput) {
          nextInput.focus();
        }
      } else if (inputLength === 0) {
        var prevIndex = index - 1;
        var prevInput = document.getElementsByName('otp[]')[prevIndex];

        if (prevInput) {
          prevInput.focus();
        }
      }
    }

  </script>
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