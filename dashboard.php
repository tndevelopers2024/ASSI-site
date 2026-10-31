<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
  header('location:index.php');
  exit();
}

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:index.php');
  exit();
}

$select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select) > 0) {
  $fetch = mysqli_fetch_assoc($select);
}

if (isset($_POST['profile_details'])) {

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $designation_hospital = isset($_POST['designation_hospital']) ? mysqli_real_escape_string($conn, $_POST['designation_hospital']) : '';

  $profile_url = $fetch['profile_url']; // Default to existing profile URL

  if ($_FILES["profile_url"]["size"] > 0) {
    $target_dir = "user-profile/";
    $target_file = $target_dir . basename($_FILES["profile_url"]["name"]);

    // Check if file size is too large
    if ($_FILES["profile_url"]["size"] > 2000000) { // Increased to 2MB
      echo "Sorry, your file is too large.";
      exit(); // Stop execution
    }
    // Attempt to move uploaded file
    if (move_uploaded_file($_FILES["profile_url"]["tmp_name"], $target_file)) {
      $profile_url = $target_file;
    } else {
      echo "Sorry, there was an error uploading your file.";
      exit(); // Stop execution
    }
  }

  // Fetch current email, lastpaid_date, membership_category, and membership_plan from database
  $query = "SELECT email, lastpaid_date, membership_category, membership_plan FROM users WHERE id = '$user_id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $email = $row['email'];
  $lastpaid_date = $row['lastpaid_date'];
  $membership_category = $row['membership_category'];
  $membership_plan = $row['membership_plan'];

  // Update data in database
  $update_query = "UPDATE users SET fullname = '$name', email = '$email', phonenumber = '$phonenumber', address = '$address', designation_hospital = '$designation_hospital', membership_plan = '$membership_plan', membership_category = '$membership_category', lastpaid_date = '$lastpaid_date', profile_url='$profile_url' WHERE id = '$user_id'";

  if (!mysqli_query($conn, $update_query)) {
    echo "Error updating data in admin table: " . mysqli_error($conn);
    exit(); // Stop execution
  }

  header('Location: dashboard.php');
  exit(); // Stop execution after redirection
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  .cs_nav .cs_nav_list>li {
    margin-right: 30px;
    height: inherit;
  }

  .cs_service.cs_style_1 {
    border-top: 3px solid #1b56a5;
    border-radius: 7px;
  }

  .shadows {
    height: 300px !important;
  }

  .cs_service.cs_style_1 .cs_service_btn {
    display: none !important;
  }

  .buttons {
    position: relative !important;
    display: flex;
    justify-content: end !important;
  }

  .not-edit {
    color: #E4322C;
    font-size: 11px;
  }

  #backprofile {
    all: unset;
    cursor: pointer;
    color: #E4322C;
    font-size: 18px;
  }

  .cs_site_branding+.cs_nav {
    margin-left: 10px;
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

  .start-date {
    position: absolute;
    opacity: 0;
  }

  .renewal {
    display: grid;
    place-items: center;
    place-content: center;
    padding: 30px;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
    margin-top: 30px;
  }

  .renewal h3 {
    font-size: 16px;
    text-align: center;
  }

  @media(max-width:600px) {
    .profile-form {
      padding-top: 40px !important;
    }

    .profile h2 {
      text-align: center !important;
    }

    .profile-form label {
      font-size: 16px !important;
      font-weight: 500 !important;
    }

    .profile-form input {
      width: 100% !important;
    }
  }
</style>

<body>
  <!-- <div class="cs_preloader cs_accent_color cs_white_bg">
    <div class="cs_preloader bg-white d-flex justify-content-center align-items-center">
      <div class="cs_preloader_in">
        <img src="assets/img/assi/assi-logo.png" alt="Logo">
      </div>
    </div>
  </div> -->

  <div class="chat-option">
    <a href="sheet.php">Membership Directory</a>
  </div>
  <!-- Start Header Section -->
  <?php include "header.php" ?>
  <!-- End Header Section -->

  <!-- Start Hero -->
  <section class="profile">
    <div class="container pro">
      <div class="row">
        <div class="col-md-4 m-0 p-0">
          <?php if (!empty($fetch['profile_url'])): ?>
            <img src="<?php echo $fetch['profile_url']; ?>" alt="User Profile Image">
          <?php else: ?>
            <img src="assets/img/assi/profile.jpg" alt="Default Profile Image">
          <?php endif; ?>
          <div class="details1 pt-2">
            <h2><?php echo $fetch['fullname']; ?></h2>
            <button class="sumit mt-2" id="editprofile"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
          </div>
          <div id="needed-btn" class="renewal" style="display: none;">
            <!-- <h3>Click here for Membership Renewal / Upgrade (VAAS) - 2500/- + GST ( 3 Years )</h3>
            <form>
              <script src="https://checkout.razorpay.com/v1/payment-button.js"
                data-payment_button_id="pl_PJyQayDbZ1U6ha" async> </script>
            </form> -->
            <h3>VAAS Membership Renewal</h3>
            <br>
            <!-- <h3>For 2 years - Rs 3540/- (Rs 3000 plus 18% GST)</h3>
            <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_RbuoQeTXTdcXHv" async> </script> </form>
            <br>
            <h3>For 5 years - Rs 7080/- (Rs 6000 plus 18% GST)</h3>
            <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_RxPZ8I6GLPbluz" async> </script> </form>
            <br> -->
            <h3>For 3 Years - ₹5,310/- (₹4,500 + 18% GST)</h3>
            <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_TaJrXFRSqu7PqC" async> </script> </form>
          </div>
        </div>
        <div class="col-md-8">
          <div class="profile-details">
            <div class="details2">
              <div class="detail">
                <p>User ID</p>
                <h4><?php echo $fetch['user_id']; ?></h4>
              </div>
              <div class="detail">
                <p>Designation</p>
                <h4><?php echo $fetch['designation_hospital']; ?></h4>
              </div>
              <div class="detail" style="margin-bottom: 15px;">
                <p>Email</p>
                <div>
                  <h4><?php echo $fetch['email']; ?></h4>
                  <small style="color: #E4322C; font-size: 12px; display: block; margin-top: 5px; font-weight: 500;">For a change in Email ID please reach out to <a href="mailto:assisecretariat@assi.in" style="color: inherit; text-decoration: underline;">assisecretariat@assi.in</a> , <a href="mailto:membershipdata@assi.in" style="color: inherit; text-decoration: underline;">membershipdata@assi.in</a></small>
                </div>
              </div>
              <div class="detail">
                <p>Address</p>
                <h4><?php echo $fetch['address']; ?></h4>
              </div>
              <div class="detail">
                <p>Phone No</p>
                <h4><?php echo $fetch['phonenumber']; ?></h4>
              </div>

              <div class="detail">
                <p>Membership Plan</p>
                <h4 id="membership-plan"><?php echo $fetch['membership_plan']; ?></h4>
              </div>
              <div class="detail start-date">
                <p>Start Date</p>
                <h4 id="start-date"><?php echo $fetch['lastpaid_date']; ?></h4>
              </div>
              <div class="detail">
                <p>Valid Upto</p>
                <h4 id="expiry-date"></h4>
              </div>
              <div class="detail">
                <p>Membership Category</p>
                <h4 id="membership-category"><?php echo $fetch['membership_category']; ?></h4>
              </div>

              <!-- <div class="detail">
                <ul>
                  <li>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                  </li>
                </ul>
              </div> -->
            </div>
          </div>
          <div class="profile-form">
            <form action="" method="post" enctype="multipart/form-data">
              <?php
              // Display success message
              if (isset($_POST['profile_details'])) {
                echo '<div id="successAlert" class="alert alert-success" role="alert">Your data has been submitted successfully!
    <button type="button" class="btn-close" aria-label="Close" onclick="closeAlert()"></button>
    </div>';
              }
              ?>
              <h2>Edit Profile</h2>
              <div class="row">

                <div class="col-md-4">
                  <label for="name">Name</label><br />
                  <input type="text" name="name" value="<?php echo $fetch['fullname']; ?>" id="name" required />
                </div>
                <div class="col-md-4">
                  <label for="Email">Email</label><br />
                  <input type="email" name="email" value="<?php echo $fetch['email']; ?>" id="Email" required
                    disabled />
                  <small style="color: #E4322C; font-size: 12px; display: block; margin-top: 5px; font-weight: 500;">For a change in Email ID please reach out to <a href="mailto:assisecretariat@assi.in" style="color: inherit; text-decoration: underline;">assisecretariat@assi.in</a> , <a href="mailto:membershipdata@assi.in" style="color: inherit; text-decoration: underline;">membershipdata@assi.in</a></small>
                </div>
                <div class="col-md-4">
                  <label for="PhoneNumber">Phone Number</label><br />
                  <input type="text" name="phonenumber" value="<?php echo $fetch['phonenumber']; ?>" id="PhoneNumber"
                    required />
                </div>
                <div class="col-md-4">
                  <label for="designation_hospital">Designation</label><br />
                  <input type="text" name="designation_hospital" value="<?php echo $fetch['designation_hospital']; ?>" id="designation_hospital" />
                </div>
                
                
                    <div class="col-md-4">
                  <label for="address">Address</label><br />
                  <input type="text" name="address" value="<?php echo $fetch['address']; ?>" id="address" />
                </div>
                
                
                <div class="col-md-4">
                  <label for="membership_category">Membership Category <span class="not-edit">(Non
                      Editable)</span></label><br />
                  <input disabled type="text" name="membership_category"
                    value="<?php echo $fetch['membership_category']; ?>" id="membership_category" />
                </div>
                <div class="col-md-4">
                  <label for="membership_plan">Membership Plan <span class="not-edit">(Non
                      Editable)</span></label><br />
                  <input disabled type="text" name="membership_plan" value="<?php echo $fetch['membership_plan']; ?>"
                    id="membership_plan" />
                </div>

                <div class="col-md-4">
                  <label for="profile_url">Profile <span class="not-edit">(Less than 2 mb)</span></label><br />
                  <input style="border: none;" type="file" name="profile_url" id="profile_url" />
                </div>
              </div>
              <button id="submit" class="sumit mt-5" name="profile_details" type="submit">Submit</button>
            </form>
            <div class="buttons">
              <button id="backprofile" class="mt-5" name="back_details"><i class="fa-solid fa-backward"></i>
                Back</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
document.addEventListener('DOMContentLoaded', function () {

  const planEl = document.getElementById('membership-plan');
  const startEl = document.getElementById('start-date');
  const expiryEl = document.getElementById('expiry-date');
  const neededBtn = document.getElementById('needed-btn');
  const categoryEl = document.getElementById('membership-category');

  if (!neededBtn || !categoryEl) return;

  const membershipCategory = categoryEl.innerText.trim().toUpperCase();

  /* =================================================
     🔥 LIFE MEMBERSHIP → ALWAYS SHOW PAYMENT
  ================================================= */
  if (membershipCategory === 'LIFE') {
    neededBtn.style.display = 'block';
    expiryEl.innerText = '-';
    return; // stop further logic
  }

  /* =================================================
     NORMAL MEMBERSHIP EXPIRY LOGIC
  ================================================= */
  if (!planEl || !startEl || !expiryEl) return;

  const membershipPlan = planEl.innerText.trim();
  const rawDate = startEl.innerText.trim();

  if (!rawDate) {
    expiryEl.innerText = '-';
    neededBtn.style.display = 'none';
    return;
  }

  const dateOnly = rawDate.split(' ')[0];
  let startDate;

  if (/^\d{4}-\d{2}-\d{2}$/.test(dateOnly)) {
    const [y, m, d] = dateOnly.split('-').map(Number);
    startDate = new Date(y, m - 1, d);
  } else if (/^\d{2}-\d{2}-\d{4}$/.test(dateOnly)) {
    const [d, m, y] = dateOnly.split('-').map(Number);
    startDate = new Date(y, m - 1, d);
  } else {
    expiryEl.innerText = '-';
    neededBtn.style.display = 'none';
    return;
  }

  let validityYears = 1;
  switch (membershipPlan) {
    case '2 Years': validityYears = 2; break;
    case '3 Years': validityYears = 3; break;
    case '5 Years': validityYears = 5; break;
  }

  const expiryDate = new Date(startDate);
  expiryDate.setFullYear(expiryDate.getFullYear() + validityYears);

  expiryEl.innerText =
    String(expiryDate.getDate()).padStart(2, '0') + '-' +
    String(expiryDate.getMonth() + 1).padStart(2, '0') + '-' +
    expiryDate.getFullYear();

  const today = new Date();
  const oneMonthBefore = new Date(expiryDate);
  oneMonthBefore.setMonth(oneMonthBefore.getMonth() - 1);

  neededBtn.style.display = today >= oneMonthBefore ? 'block' : 'none';

});
</script>





  <script>
    function closeAlert() {
      var successAlert = document.getElementById("successAlert");
      successAlert.style.display = "none";
    }
  </script>


  <script>
    var editprofile = document.getElementById('editprofile');
    editprofile.addEventListener('click', function () {
      var profile_form = document.querySelector('.profile-form');
      var profile_details = document.querySelector('.profile-details');
      profile_details.style.display = 'none';
      profile_form.style.display = 'block';
      editprofile.style.display = "none";
    });

    var backprofile = document.getElementById('backprofile');
    var editprofile = document.getElementById('editprofile');
    backprofile.addEventListener('click', function () {
      var profile_form = document.querySelector('.profile-form');
      var profile_details = document.querySelector('.profile-details');
      profile_details.style.display = 'flex';
      profile_form.style.display = 'none';
      editprofile.style.display = "inline";
    })
  </script>
  <!-- End Hero -->
  <!-- Start Service Section -->
  <section class="cs_pt_lg_80 cs_pb_70 cs_pb_lg_55">
    <div class="container">
      <div class="cs_section_heading cs_style_1 text-center cs_mb_60 cs_mb_lg_40">
        <div class="cs_section_heading_in">
          <h3 class="cs_fs_20 text-accent fw-normal cs_lh_base wow fadeInUp" data-wow-duration="0.8s"
            data-wow-delay="0.2s"
            style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">Our
            article</h3>
          <h2 class="cs_fs_48 cs_fs_lg_36 m-0">Latest Article and <br>Publications</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow shadows 5">
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">

              <h2 class="cs_lh_base cs_fs_20 m-0"><a href="services-details.html" class="inline-block">ASSI publications will be displayed here</a></h2>
            </div>
            <a href="services-details.html"
              class="artical-btn cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                  fill="currentColor"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow shadows cs_mb_25">
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">

              <h2 class="cs_lh_base cs_fs_20 m-0"><a href="#" class="inline-block">
                  ASSI publications will be displayed here</a></h2>
            </div>
            <a href="#"
              class="artical-btn cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                  fill="currentColor"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow shadows cs_mb_25">
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">

              <h2 class="cs_lh_base cs_fs_20 m-0"><a href="#" class="inline-block">ASSI publications will be displayed here</a></h2>
            </div>
            <a href="#"
              class="artical-btn cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                  fill="currentColor"></path>
              </svg>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div
            class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow shadows cs_mb_25">
            <div class="cs_service_iconbox d-flex align-items-center cs_mb_20">

              <h2 class="cs_lh_base cs_fs_20 m-0"><a href="services-details.html" class="inline-block">ASSI publications will be displayed here</a></h2>
            </div>
            <a href="services-details.html"
              class="artical-btn cs_service_btn d-flex align-items-center justify-content-center rounded-circle position-absolute text-white">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M20.8491 11.347C20.855 11.3381 20.8602 11.3289 20.8656 11.3198C20.8706 11.3114 20.8759 11.3032 20.8805 11.2946C20.8855 11.2853 20.8897 11.2757 20.8942 11.2663C20.8984 11.2573 20.9029 11.2484 20.9067 11.2392C20.9105 11.23 20.9136 11.2206 20.9169 11.2113C20.9205 11.2014 20.9243 11.1916 20.9274 11.1814C20.9302 11.1721 20.9322 11.1626 20.9346 11.1532C20.9372 11.1429 20.9401 11.1327 20.9422 11.1222C20.9444 11.1113 20.9456 11.1003 20.9472 11.0894C20.9485 11.0801 20.9503 11.0711 20.9512 11.0617C20.9532 11.0415 20.9543 11.0213 20.9543 11.001C20.9543 11.0007 20.9543 11.0004 20.9543 11.0001C20.9543 10.9998 20.9543 10.9994 20.9543 10.9991C20.9542 10.9789 20.9532 10.9586 20.9512 10.9384C20.9503 10.929 20.9485 10.92 20.9472 10.9108C20.9456 10.8998 20.9444 10.8888 20.9422 10.8779C20.9401 10.8674 20.9372 10.8572 20.9346 10.8469C20.9322 10.8375 20.9302 10.828 20.9274 10.8187C20.9243 10.8086 20.9205 10.7988 20.9169 10.7889C20.9136 10.7795 20.9105 10.7701 20.9067 10.7609C20.9029 10.7517 20.8984 10.7428 20.8941 10.7338C20.8897 10.7244 20.8855 10.7148 20.8805 10.7055C20.8759 10.6969 20.8706 10.6887 20.8656 10.6803C20.8602 10.6712 20.855 10.662 20.8491 10.6531C20.8428 10.6438 20.8359 10.635 20.8292 10.6261C20.8237 10.6187 20.8186 10.6112 20.8127 10.604C20.7996 10.588 20.7858 10.5727 20.7713 10.5581L15.026 4.81285C14.7819 4.56877 14.3862 4.56877 14.1421 4.81285C13.898 5.05692 13.898 5.45264 14.1421 5.69672L18.8204 10.375L0.88388 10.375C0.53871 10.375 0.258878 10.6548 0.258878 11C0.258878 11.3452 0.53871 11.625 0.88388 11.625L18.8204 11.625L14.1421 16.3033C13.8981 16.5474 13.8981 16.9431 14.1421 17.1872C14.3862 17.4312 14.7819 17.4313 15.026 17.1872L20.7713 11.442C20.7858 11.4274 20.7996 11.4121 20.8127 11.3962C20.8186 11.389 20.8237 11.3814 20.8292 11.374C20.8359 11.3651 20.8428 11.3563 20.8491 11.347Z"
                  fill="currentColor"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Start Service Section -->




  <!-- End Footer -->
  <!-- Script -->

  <script>
    // Function to scroll the content vertically
    function autoScroll() {
      let element = document.getElementById('style-2');
      // Success!
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
</body>

</html>