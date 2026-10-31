<?php
require_once 'config.php';

// Check if 'logout' parameter is set in URL
if (isset($_GET['logout'])) {
    // Remove the user session and destroy it
    unset($_SESSION['user_id']);
    session_destroy();

    // Redirect to the login page (or any page you want after logout)
    header('Location: login-page.php');
    exit(); // Stop further code execution
}

// Fetch registered users for the referrer dropdowns
$users_query = mysqli_query($conn, "SELECT fullname, email, phonenumber FROM users WHERE fullname IS NOT NULL AND fullname != ''");
$users_array = [];
if ($users_query) {
    while ($row = mysqli_fetch_assoc($users_query)) {
        $users_array[] = $row;
    }
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
    <style>
        .cs_page_header {
            height: 400px !important;
        }

        .px-20 {
            padding: 0px 10rem;
        }

        .member-form {
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            padding: 4rem;
            border-radius: 10px;
        }

        .catlist {
            list-style: none;
            padding: 0;
        }

        .catlist li {
            padding-bottom: 10px;
        }

        .sublist {
            margin-top: 20px;
            list-style: none;

        }

        .sublist li {
            position: relative;
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .sublist li::before {
            position: absolute;
            content: '\27B2';
            left: -2px;
            top: 0px;
            font-size: 20px;
        }

        .terms ul {
            list-style: none;
            padding: 0;
        }

        .terms ul li {
            position: relative;
            padding-left: 20px;
            margin-bottom: 10px;
        }

        .terms ul li::before {
            position: absolute;
            content: '\27B2';
            left: -2px;
            top: 0px;
            font-size: 20px;
        }

        .degree {
            display: flex;
            gap: 30px;
            padding-bottom: 20px;
        }

        @media (max-width:600px) {
            .member-form {
                box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                padding: 1.5rem;
                margin: 20px 0 0 !important;
                border-radius: 10px;
            }
        }

        /* Autocomplete Custom Styling */
        .autocomplete-container {
            position: relative;
        }
        .autocomplete-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            z-index: 999;
            max-height: 300px;
            overflow-y: auto;
            display: none;
            margin-top: 5px;
        }
        .autocomplete-suggestion {
            padding: 12px 15px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: all 0.2s ease;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .autocomplete-suggestion:last-child {
            border-bottom: none;
        }
        .autocomplete-suggestion:hover {
            background: #f8f9fa;
            border-left: 4px solid #1b56a5;
            padding-left: 11px;
        }
        .suggestion-name {
            font-weight: 600;
            color: #333;
            font-size: 15px;
        }
        .suggestion-details {
            font-size: 13px;
            color: #777;
            display: flex;
            gap: 15px;
        }
        .suggestion-details i {
            color: #1b56a5;
            margin-right: 4px;
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lcqf34qAAAAAJ2SH_RTOe-uMzMyLtCOmS8gkDvw"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lcqf34qAAAAAJ2SH_RTOe-uMzMyLtCOmS8gkDvw', {action: 'submit'}).then(function(token) {
            document.getElementById('recaptchaResponse').value = token;
        });
    });
</script>
</head>

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
  <!-- <div class="floating-div">
    <a target="_blank" href="https://www.assicon2025bengaluru.com/"><img src="assets/img/icons/float.png" alt=""></a>
  </div> -->
  <!-- Start Header Section -->
  <?php include "header.php" ?>
  <!-- End Header Section -->

    <!--Hero Section -->
    <section
        class="cs_page_header position-relative background-filled d-flex align-items-center justify-content-between"
        data-src="assets/img/assi/bg.jpg" style="background-image: url(&quot;assets/img/assi/bg.jpg&quot;);">
        <div class="container position-relative z-index-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-white cs_fs_18 cs_mb_5">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                </ol>
            </nav>
            <h1 class="cs_fs_48 cs_fs_lg_36 text-white m-0">Membership Registration</h1>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- content area -->
    <div class="container mt-5">

        <div class="subcat">
            <h3>Applicant Membership</h3>

            <ul class="catlist">
                <li>
                    <b>Eligibility and Enrollment of Applicant Members:</b>
                    <ul class="sublist">
                        <li>
                            All new applicants seeking membership of the Association shall, upon fulfillment of the following eligibility criteria, be enrolled as Applicant Members for a mandatory period of two (2) years:
                        </li>
                        <li>
                            <b>Educational Qualification:</b>
                            <ul class="sublist">
                                <li>MBBS degree from a recognized institution</li>
                                <li>Postgraduate qualification:</li>
                                <li>MS (Orthopaedics) or</li>
                                <li>MCh (Neurosurgery) or</li>
                                <li>DNB (Orthopaedics/Neurosurgery)</li>
                            </ul>
                        </li>
                        <li>Valid registration with NMC/MCI/State Medical Council</li>
                        <li>Two referees who are eligible members of the Association</li>
                        <li>
                            <b>Membership fee as under:</b>
                            <ul class="sublist">
                                <li>₹5,000/- (Membership Fee)</li>
                                <li>₹900/- (18% GST)</li>
                                <li><b>Total: ₹5,900/- (Rupees Five Thousand Nine Hundred Only)</b></li>
                            </ul>
                        </li>
                        <li>
                            During the Applicant Membership period, members shall be entitled to all academic, educational, and professional benefits of ASSI membership. However, they shall not have voting rights and shall not be eligible to contest elections during this period.
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="subcat">
            <h3>
                Associate Membership
            </h3>
            <ul class="catlist">
                <li>
                    <b>Eligibility and Enrollment of Associate Members:</b>
                    <ul class="sublist">
                        <li>Persons other than qualified Spine, Orthopaedic, or Neurosurgery professionals registered with the Medical Council of India (MCI) / National Medical Commission (NMC), who have a professional interest in the field, including but not limited to anaesthesiologists, biomechanical engineers, physiotherapists, nurses, and technicians.</li>

                        <li>Foreign nationals holding a recognized qualification in Orthopaedics or Neurosurgery, who are not registered with MCI/NMC.</li>

                        <li>Applicants must be proposed by two referees who are eligible members of the Association.</li>

                        <li>
                            <b>The Membership Fee as follows:</b>
                            <ul class="sublist">
                                <li>₹4,500/- (Membership Fee)</li>
                                <li>₹810/- (18% GST)</li>
                                <li><b>Total: ₹5,310/- (Rupees Five Thousand Three Hundred And Ten Only)</b></li>
                                <li>payable for a period of three (3) years, after which renewal shall be mandatory.</li>
                            </ul>
                        </li>

                        <li>The duration of membership and the quantum of the Membership Fee applicable to Associate Members may be reviewed, revised, or modified by the Executive Committee, in whole or in part, from time to time, in accordance with the policies and resolutions of the Association.</li>

                        <li>Associate Members shall not have voting rights and shall not be eligible to contest elections.</li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <div class="subcat">
            <h3>
                International Membership
            </h3>
            <ul class="catlist">
                <li>
                    <ul class="sublist">
                        <li>Spine surgeons who are not bona fide citizens of India and who hold recognized qualifications in Orthopaedics or Neurosurgery (MS/DNB – Orthopaedics or MCh/DNB – Neurosurgery), and are duly registered with their respective Medical Councils, shall be eligible for enrolment as International Members of the Association.</li>
                        <li>The Membership Fee applicable to International Members shall be USD 150, payable for a period of three (3) years, after which renewal shall be mandatory</li>
                        <li>International Members shall not have voting rights and shall not be eligible to contest elections of the Association.</li>
                    </ul>
                </li>
            </ul>
        </div>


        

    <div class="container my-5 member-form">

        <!-- <h2 class="mb-4">Form Example</h2> -->
        <form action="members-form.php" method="POST" enctype="multipart/form-data">

            <!-- Radio buttons -->

            <div class="mb-3">
                <label for=""><span style="color: red;">*</span><b>It is mandatory for an existing ASSI member to propose or refer the application of a new member.</b></label> <br>
                <label class="form-label">Membership Type</label><br>
                <div class="d-flex  gap-5">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="membership-typ" id="membership-typ1"
                                value="Applicant Membership" checked>
                            <label class="form-check-label" for="membership-typ1">
                                Applicant Membership
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="membership-typ" id="membership-typ2"
                                value="Associate Membership">
                            <label class="form-check-label" for="membership-typ2">
                                Associate Membership
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="membership-typ" id="membership-typ2"
                                value="International Membership">
                            <label class="form-check-label" for="membership-typ2">
                                International Membership
                            </label>
                        </div>
                    </div>

                </div>

            </div>

            <div class="mb-3">
                <label for="recent-img" class="form-label">Your recent Image</label>
                <input required type="file" class="form-control" id="recent-img" name="recent-img">
            </div>

            <div class="mb-3">

                <select required class="form-select" name="prof" aria-label="Default select example ">
                    <option selected value="Dr">Dr.</option>
                    <option value="Prof">Prof.</option>
                    <option value="Mr">Mr.</option>
                    <option value="Ms">Ms.</option>
                    <option value="Mrs">Mrs.</option>
                </select>

            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name ( AS per NMC/state medical council) </label>
                <input required type="text" class="form-control" id="name" name="name"
                    placeholder="Enter your First Name">
            </div>

            <!-- Email input -->
            <div class="mb-3">
                <label for="badgename" class="form-label">Badge Name ( For Conference registrations)</label>
                <input required type="text" class="form-control" id="badgename" name="badgename"
                    placeholder="Enter your Last Name">
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <div class="d-flex  gap-5">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender-type" id="gender-type1"
                                value="Male" checked>
                            <label class="form-check-label" for="gender-type1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender-type" id="gender-type2"
                                value="Female">
                            <label class="form-check-label" for="gender-type2">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender-type" id="gender-type3"
                                value="Others">
                            <label class="form-check-label" for="gender-type3">
                                Others
                            </label>
                        </div>
                    </div>

                </div>

            </div>


            <!-- Email input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input required type="email" class="form-control" id="email" name="email"
                    placeholder="Enter your Email">
            </div>

            <!-- Phone input -->
            <div class="mb-3">
                <label for="phone" class="form-label">WhatsApp or Phone number</label>
                <input required type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10,15}"
                    placeholder="Enter your phone number">
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea required class="form-control" id="address" name="address" rows="3"></textarea>
            </div>

            <!-- Phone input -->
            <div class="mb-3">
                <label for="pphone" class="form-label">
                    Personal Mobile Number</label>
                <input required type="tel" class="form-control" id="pphone" name="pphone"
                    placeholder="Enter your phone number">
            </div>

            <!-- Date input -->
            <div class="mb-3">
                <label for="date" class="form-label">Birth Date</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <!-- Textareas -->

            <div class="mb-3">
                <label for="qualification" class="form-label">Your Qualifications</label>
                <textarea required class="form-control" id="qualification" name="qualification" rows="3"></textarea>
            </div>

            <!-- File inputs -->
            <div class="degrees">
                <label for="degree" class="form-label">MBBS Degree</label>
                <div class="degree">
                    <input required type="text" class="form-control" id="mbbspassoutyear" name="mbbspassoutyear"
                        placeholder="Passout  year  ">
                    <input required type="text" class="form-control" id="mbbscollege" name="mbbscollege"
                        placeholder="College Name">
                    <input required type="text" class="form-control" id=" mbbsuniversity" name=" mbbsuniversity"
                        placeholder="University ">
                </div>
            </div>
            <!-- File inputs -->
            <div class="degrees">
                <label for="degree" class="form-label">MS/DNB Degree</label>
                <div class="degree">
                    <input required type="text" class="form-control" id="mspassoutyear" name="mspassoutyear"
                        placeholder="Passout  year  ">
                    <input required type="text" class="form-control" id="mscollege" name="mscollege"
                        placeholder="College Name">
                    <input required type="text" class="form-control" id=" msuniversity" name=" msuniversity"
                        placeholder="University ">
                </div>
            </div>
            <!-- File inputs -->
            <div class="degrees">
                <label for="degree" class="form-label">MCH Degree</label>
                <div class="degree">
                    <input required type="text" class="form-control" id="mchpassoutyear" name="mchpassoutyear"
                        placeholder="Passout  year  ">
                    <input required type="text" class="form-control" id="mchcollege" name="mchcollege"
                        placeholder="College Name">
                    <input required type="text" class="form-control" id=" mchuniversity" name=" mchuniversity"
                        placeholder="University ">
                </div>
            </div>
          
            <!-- Textareas -->
            <div class="mb-3">
                <label for="spine" class="form-label">Spine Fellowship Details</label>
                <textarea required class="form-control" id="spine" name="spine" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="current-org" class="form-label">Current Organisation you're working with</label>
                <textarea required class="form-control" id="current-org" name="current-org" rows="3"></textarea>
            </div>

            <!-- File inputs -->
            <div class="degrees">
                <label for="degree" class="form-label">NMC/ State  Registration Detail</label>
                <div class="degree">
                    <input required type="text" class="form-control" id="nameofcouncil" name="nameofcouncil"
                        placeholder="Name of Council">
                    <input required type="text" class="form-control" id="registrationno" name="registrationno"
                        placeholder="Registration No. ">
                    <input required type="text" class="form-control" id=" validitydate" name=" validitydate"
                        placeholder="Validity date ">
                </div>
                <label for="medical-council" class="form-label">Upload Certificate
                </label>
                <input required type="file" class="form-control" id="medical-council" name="medical-council">
            </div>

            <!-- Referrer 1 & 2 Custom Autocomplete -->
            <!-- Textareas -->
            <div class="mb-3 autocomplete-container">
                <label for="referred" class="form-label">Referred by (Referrer 1 Name)</label>
                <input required type="text" class="form-control" id="referred" name="referred" placeholder="Search by Name, Email or Phone" autocomplete="off">
                <div id="referred_suggestions" class="autocomplete-suggestions"></div>
            </div>
            <div class="mb-3 autocomplete-container">
                <label for="referrer_email" class="form-label">Referrer 1 Email ID</label>
                <input required type="email" class="form-control" id="referrer_email" name="referrer_email"
                    placeholder="Search by Name, Email or Phone" autocomplete="off">
                <div id="referrer_email_suggestions" class="autocomplete-suggestions"></div>
            </div>
            <div class="mb-3 autocomplete-container">
                <label for="referrer_phone" class="form-label">Referrer 1 Mobile Number</label>
                <input required type="tel" class="form-control" id="referrer_phone" name="referrer_phone"
                    placeholder="Search by Name, Email or Phone" autocomplete="off">
                <div id="referrer_phone_suggestions" class="autocomplete-suggestions"></div>
            </div>
            <div class="mb-3 autocomplete-container">
                <label for="referrer2_name" class="form-label">Referrer 2 Name</label>
                <input required type="text" class="form-control" id="referrer2_name" name="referrer2_name"
                    placeholder="Search by Name, Email or Phone" autocomplete="off">
                <div id="referrer2_suggestions" class="autocomplete-suggestions"></div>
            </div>
            <div class="mb-3 autocomplete-container">
                <label for="referrer2_email" class="form-label">Referrer 2 Email ID</label>
                <input required type="email" class="form-control" id="referrer2_email" name="referrer2_email"
                    placeholder="Search by Name, Email or Phone" autocomplete="off">
                <div id="referrer2_email_suggestions" class="autocomplete-suggestions"></div>
            </div>
            <div class="mb-3 autocomplete-container">
                <label for="referrer2_phone" class="form-label">Referrer 2 Mobile Number</label>
                <input required type="tel" class="form-control" id="referrer2_phone" name="referrer2_phone"
                    placeholder="Search by Name, Email or Phone" autocomplete="off">
                <div id="referrer2_phone_suggestions" class="autocomplete-suggestions"></div>
            </div>
            <!-- Textareas -->
            <div class="mb-3">
                <div class="form-check">
                    <p>That, once the application is approved by the Executive Committee, membership payment link will
                        be sent and temporary membership No. will be issued.</p>
                    <input required class="form-check-input" type="checkbox" name="agree" value="i agree" id="agree">
                    <label class="form-check-label" for="agree">
                        I agree
                    </label>
                </div>
            </div>
            <input type="text" name="honeypot" style="display:none;">
            <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
    </div>

    <!-- footer section -->
    <footer class="cs_footer background-filled text-white" data-src="assets/img/assi/footer_bg.jpeg"
        style="background-image: url(&quot;assets/img/assi/footer_bg.jpeg&quot;);">
        <div class="container">
            <div
                class="cs_footer_top d-flex justify-content-between align-items-start align-items-md-center cs_pt_46 cs_pb_46 cs_column_gap_15 cs_row_gap_15 flex-md-row flex-column">
                <div class="cs_footer_contact_info">
                    <h3 class="text-accent fw-normal cs_mb_4 cs_fs_16 cs_lh_lg">
                        Have Any Question?
                    </h3>
                    <h2 class="text-white fw-medium m-0 cs_fs_22">8929991288</h2>
                </div>
                <div style="width: 30%; visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: zoomIn;"
                    class="cs_footer_logo wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <img src="assets/img/assi/ASSI-footer.png" alt="Logo">
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
                                    We find ourselves devoted to enhancing the quality of our fellowship programs,
                                    improving our research
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
                            <h2 class="cs_widget_title text-white cs_fs_22 cs_mb_22">
                                Explore
                            </h2>
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
                                <h2 class="cs_newsletter_title text-white cs_fs_22 cs_mb_9">
                                    Newsletter
                                </h2>
                                <form action="#" class="cs_newsletter_form position-relative">
                                    <input type="email"
                                        class="cs_newsletter_input text-white cs_fs_14 cs_rounded_5 border-0 w-100 cs_pt_10"
                                        placeholder="Enter your mail" fdprocessedid="d5gka">
                                    <button
                                        class="cs_newsletter_btn cs_fs_14 cs_rounded_5 cs_transition_4 bg-accent position-absolute text-uppercase"
                                        fdprocessedid="2u8d3">
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
                    Copyright © 2024 <a href="index.php">Assi</a>. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- end footer section -->
    <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
    <script src="assets/js/plugins/isotope.pkg.min.js"></script>
    <script src="assets/js/plugins/jquery.slick.min.js"></script>
    <script src="assets/js/plugins/odometer.js"></script>
    <script src="assets/js/plugins/ripples.min.js"></script>
    <script src="assets/js/plugins/wow.min.js"></script>
    <script src="assets/js/plugins/swiper.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Auto-fill Referrer Details Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usersData = <?php echo json_encode($users_array); ?>;

            function setupAutocomplete(activeInputId, nameInputId, emailInputId, phoneInputId, suggestionsId) {
                const activeInput = document.getElementById(activeInputId);
                const nameInput = document.getElementById(nameInputId);
                const emailInput = document.getElementById(emailInputId);
                const phoneInput = document.getElementById(phoneInputId);
                const suggestionsBox = document.getElementById(suggestionsId);

                activeInput.addEventListener('input', function() {
                    const query = this.value.toLowerCase();
                    suggestionsBox.innerHTML = '';
                    
                    if (!query) {
                        suggestionsBox.style.display = 'none';
                        return;
                    }

                    // Determine which field we are prioritizing based on the active input id
                    let priorityField = 'fullname';
                    if (activeInputId.includes('email')) {
                        priorityField = 'email';
                    } else if (activeInputId.includes('phone')) {
                        priorityField = 'phonenumber';
                    }

                    const scoredUsers = usersData.map(u => {
                        let score = 0;
                        const n = (u.fullname || '').toLowerCase();
                        const e = (u.email || '').toLowerCase();
                        const p = (u.phonenumber || '').toLowerCase();
                        
                        const valToSearch = priorityField === 'email' ? e : (priorityField === 'phonenumber' ? p : n);

                        // Score logic for prioritized field
                        if (valToSearch === query) score += 100;
                        else if (valToSearch.startsWith(query)) score += 50;
                        else if (valToSearch.includes(query)) score += 10;
                        
                        // Check other fields to still include matches
                        if (n === query || e === query || p === query) score += 5;
                        else if (n.startsWith(query) || e.startsWith(query) || p.startsWith(query)) score += 3;
                        else if (n.includes(query) || e.includes(query) || p.includes(query)) score += 1;

                        return { user: u, score: score };
                    }).filter(item => item.score > 0);

                    // Sort by score descending
                    scoredUsers.sort((a, b) => b.score - a.score);

                    const filteredUsers = scoredUsers.map(item => item.user).slice(0, 5);

                    if (filteredUsers.length > 0) {
                        filteredUsers.forEach(user => {
                            const div = document.createElement('div');
                            div.className = 'autocomplete-suggestion';
                            div.innerHTML = `
                                <div class="suggestion-name">${user.fullname || 'N/A'}</div>
                                <div class="suggestion-details">
                                    <span><i class="fa-solid fa-envelope"></i> ${user.email || 'N/A'}</span>
                                    <span><i class="fa-solid fa-phone"></i> ${user.phonenumber || 'N/A'}</span>
                                </div>
                            `;
                            div.addEventListener('click', function() {
                                nameInput.value = user.fullname || '';
                                emailInput.value = user.email || '';
                                phoneInput.value = user.phonenumber || '';
                                suggestionsBox.style.display = 'none';
                            });
                            suggestionsBox.appendChild(div);
                        });
                        suggestionsBox.style.display = 'block';
                    } else {
                        suggestionsBox.style.display = 'none';
                    }
                });

                // Hide on blur, but delay so click registers
                activeInput.addEventListener('blur', function() {
                    setTimeout(() => {
                        suggestionsBox.style.display = 'none';
                    }, 200);
                });
                
                // Show on focus if has value
                activeInput.addEventListener('focus', function() {
                    if (this.value && suggestionsBox.children.length > 0) {
                        suggestionsBox.style.display = 'block';
                    }
                });
            }

            // Referrer 1
            setupAutocomplete('referred', 'referred', 'referrer_email', 'referrer_phone', 'referred_suggestions');
            setupAutocomplete('referrer_email', 'referred', 'referrer_email', 'referrer_phone', 'referrer_email_suggestions');
            setupAutocomplete('referrer_phone', 'referred', 'referrer_email', 'referrer_phone', 'referrer_phone_suggestions');

            // Referrer 2
            setupAutocomplete('referrer2_name', 'referrer2_name', 'referrer2_email', 'referrer2_phone', 'referrer2_suggestions');
            setupAutocomplete('referrer2_email', 'referrer2_name', 'referrer2_email', 'referrer2_phone', 'referrer2_email_suggestions');
            setupAutocomplete('referrer2_phone', 'referrer2_name', 'referrer2_email', 'referrer2_phone', 'referrer2_phone_suggestions');
        });
    </script>
</body>

</html>