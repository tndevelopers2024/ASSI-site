<?php
include 'config.php';
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
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $designation = isset($_POST['designation']) ? mysqli_real_escape_string($conn, $_POST['designation']) : '';
    $membership_plan = mysqli_real_escape_string($conn, $_POST['membership_plan']);
    $membership_category = mysqli_real_escape_string($conn, $_POST['membership_category']);
    $designation_hospital = isset($_POST['designation_hospital']) ? mysqli_real_escape_string($conn, $_POST['hospital_name']) : '';
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    $target_dir = "user-profile/";
    $target_file = $target_dir . basename($_FILES["profile_url"]["name"]);

    // Check if file size is too large
    if ($_FILES["profile_url"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        exit(); // Stop execution
    }

    // Attempt to move uploaded file
    if (move_uploaded_file($_FILES["profile_url"]["tmp_name"], $target_file)) {
        $profile_url = $target_file;

        // Insert data into database
        $insert_query = "UPDATE users SET fullname = '$name', email = '$email', phonenumber = '$phonenumber', designation = '$designation', membership_plan = '$membership_plan', membership_category = '$membership_category', designation_hospital = '$designation_hospital', location = '$location', profile_url='$profile_url' WHERE id = '$user_id'";

        if (!mysqli_query($conn, $insert_query)) {
            echo "Error updating data in admin table: " . mysqli_error($conn);
            exit(); // Stop execution
        }

        header('Location: dashboard.php');
        exit(); // Stop execution after redirection
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
;

$select_all = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
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
        height: 90vh;
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
        height: 415px;
    }

    .banner-content h3 {
        color: #fff;
        font-weight: 600;
    }

    .cs_height_80 {
        height: 50px;
    }

    @media(max-width:600px) {
        .cs_hero_text {
            text-align: center !important;
        }

        table {
            table-layout: auto !important;
        }

        .banner-content {
            text-align: center !important;
        }

        .banner-content br {
            display: none !important;
        }

        .otp-form {
            height: 415px !important;
        }
    }
</style>

<style>
    /* Basic styling for the chat window */
    #chatWindow {
        display: none;
        width: 370px;
        height: 400px;
        border: 1px solid #ccc;
        position: fixed;
        bottom: 100px;
        right: 10px;
        background: white;
    }

    .close-chat {
        background-color: #E4322C;
        color: #fff;
        border: none;
        border-radius: 50%;
        padding: 0px 10px;
    }

    #chatHeader {
        background: #1b56a5;
        color: white;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #chatContent {
        padding: 10px;
        overflow-y: auto;
        height: calc(100% - 80px);
    }

    #chatFooter {
        display: flex;
        padding: 10px;
        box-sizing: border-box;
    }

    #chatInput {
        flex: 1;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-right: none;
    }

    #sendButton {
        padding: 10px;
        border: 1px solid #ccc;
        border-left: none;
        background-color: #1b56a5;
        color: white;
        cursor: pointer;
    }

    /* .head{
                text-align: center !important;
            } */

    #sendButton:hover {
        background-color: #E4322C;
    }

    td a:hover {
        color: #E4322C !important;
    }
</style>

<style>
    h1 {
        font-size: 30px;
        color: #000;
        text-transform: uppercase;
        font-weight: 300;
        text-align: center;
        margin-bottom: 40px;
    }

    table {
        width: 100%;
        table-layout: fixed;
    }

    .tbl-header {
        background-color: rgba(255, 255, 255, 0.3);
    }

    .tbl-content {
        height: 500px;
        overflow-x: auto;
        margin-top: 0px;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    th {
        padding: 20px 15px;
        text-align: left;
        font-weight: 500;
        font-size: 12px;
        color: #fff;
        text-transform: uppercase;
    }

    td {
        padding: 15px;
        text-align: left;
        vertical-align: middle;
        font-weight: 300;
        font-size: 12px;
        color: #fff;
        border-bottom: solid 1px rgba(255, 255, 255, 0.1);
    }


    /* demo styles */

    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);


    table td,
    table th {
        background: #1b56a5;
        color: #fff !important;
    }

    .sheet {
        margin: 180px 50px 50px 50px;
    }

    .logout {
    all: unset;
    margin-top: 10px;
    background-color: #e4322c;
    padding: 0px 15px;
}
    /* follow me template */
    .made-with-love {
        margin-top: 40px;
        padding: 10px;
        clear: left;
        text-align: center;
        font-size: 10px;
        font-family: arial;
        color: #fff;
    }

    .made-with-love i {
        font-style: normal;
        color: #F50057;
        font-size: 14px;
        position: relative;
        top: 2px;
    }

    .made-with-love a {
        color: #fff;
        text-decoration: none;
    }

    .made-with-love a:hover {
        text-decoration: underline;
    }


    /* for custom scrollbar for webkit browser*/

    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    ::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }


    @import url('https://fonts.googleapis.com/css2?family=Belanosima&family=Rubik+Vinyl&display=swap');

    .darksoul-search-bar {
        position: absolute;
        top: -4px;
        width: 45px;
        height: 45px;
        background-color: #1b56a5;
        display: flex;
        border-radius: 0% 30px 30px 30px;
        transition: width 1s;
        box-shadow: 5px 5px 10px #d8e6fd, -5px 0px 10px white;
        position: absolute;
        right: 5%;
    }

    .search-icon {
        margin-bottom: auto;
        margin-top: auto;
        margin-left: -2px;
        margin-right: auto;
        margin-top: -5px;
        border-radius: 50%;
        transform: rotate(-30deg);
    }

    .darksoul-search-bar:hover {
        width: 400px;
        border-radius: 0% 30px 30px 30px;
    }


    input::placeholder {
        color: #fff;
    }

    .darksoul-search-input {
        background-color: #1b56a5;
        margin: auto;
        display: none;
        transition: display 12s;
        color: #fff;
        outline: none;
        border: none;
        font-family: 'Belanosima', sans-serif;
        border-radius: 25px;
    }

    .darksoul-search-bar:hover .darksoul-search-input {
        display: inline-flex;
        width: 78%;
        height: 70%;
    }

    .search-bar {
        position: relative;
    }

    input[type="submit"] {
        display: none;
    }

    .mob {
        display: none;
    }


    @media only screen and (max-width: 600px) {
        .darksoul-search-bar:hover {
            width: 80%;
            border-radius: 0% 30px 30px 15px;
        }

        .mob {
            display: block;
        }

        h1 {
            margin-bottom: 26px;
        }

        .desk {
            display: none;
        }

        .darksoul-search-bar {
            right: 6%;
        }

        .sheet {
            margin: 140px 5px 50px 5px !important;
        }

        .sheet-head {
            margin-top: 30px !important;
        }

        table td,
        table th {
            text-align: center !important;
        }
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
    <!--<div class="popup">-->
    <!--    <img src="assets/img/home-popup.jpg"/>-->
    <!--    <button id="close"><i class="fa-solid fa-xmark"></i></button>-->
    <!--</div>-->
    <!--<div class="floating-div">-->
    <!--    <a target="_blank" href="https://assilive25.com/"><img src="assets/img/icons/float.png"-->
    <!--            alt=""></a>-->
    <!--</div>-->
    <!-- Start Header Section -->
    <header class="cs_site_header cs_style_1 cs_sticky_header cs_site_header_full_width">
        <!-- <div class="cs_top_header">
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
    </div> -->
        <div class="cs_main_header">
            <div class="container">
                <div class="cs_main_header_in">
                    <div class="cs_main_header_left">
                        <a class="cs_site_branding" href="index.php">
                            <img src="assets/img/assi/assi-logo.png" alt="Logo">
                        </a>
                        <div class="cs_nav cs_primary_font fw-medium">
                            <ul class="cs_nav_list fw-medium text-uppercase">
                                <li class=""><a href="index.php">Home</a> </li>
                                <li class=""><a href="aboutus.php">About Assi</a></li>
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
                                <li class="menu-item-has-children"><a href="https://www.assi.in/index.php#events">Events
                                    </a>
                                    <ul>
                                        <li> <a href="#Upcoming-Meetings">Upcoming events</a></li>
                                        <!--<li><a href="#">Associated International Events </a></li>-->
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
                                <!--</li>-->
                                <!--<li class="menu-item-has-children"><a href="#">Membership</a>-->
                                <!--    <ul>-->
                                <!--        <li> <a href="membership-registration.php">Online Membership Registration</a>-->
                                <!--        </li>-->
                                <!--    </ul>-->
                                <!--</li>-->
                                <li class=""><a href="contact-us.php">Contact Us</a> </li>

                                <li style="display: flex;align-items: center;">
                <form action="logout.php" method="post">
                  <button class="logout text-white" type="submit" name="logout">Logout</button>
                </form>
              </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- End Header Section -->




    <section class="sheet">
        <div class="search-bar">
            <div class="darksoul-search-bar">
                <img class="search-icon" src="assets/img/assi/search.png" width="50" height="50" />
               <input type="search" placeholder="Search Doctors" id="search" class="darksoul-search-input" autocomplete="on" />
            </div>
        </div>


        <!--for demo wrap-->
        <div class="sheet-head">
            <h1>Life Members</h1>
        </div>

        <!-- Table -->
<div class="tbl-content">
    <table border="1" id="userTable">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>
                <!--<th>Phone Number</th>-->
                 <th>Email</th>
                <th>Designation & Hospital Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($select_all) > 0) {
                while ($fetch = mysqli_fetch_assoc($select_all)) {
                    echo "
                    <tr>
                        <td>{$fetch['user_id']}</td>
                        <td><a href=\"#\" onclick=\"openChat('{$fetch['fullname']}')\">{$fetch['fullname']}</a></td>
                        <td>{$fetch['email']}</td>
                        <td>{$fetch['designation_hospital']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

        <!--<div id="chatWindow">-->
        <!--    <div id="chatHeader">-->
        <!--        <span class="chat-with">Chat with</span>-->
        <!--        <span id="chatWithName">NAIDU K V DHANWANTARY</span>-->
        <!--        <button class="close-chat" onclick="closeChat()">X</button>-->
        <!--    </div>-->
        <!--    <div id="chatContent">-->
        <!--         Chat messages will appear here -->
        <!--    </div>-->
        <!--    <div id="chatFooter">-->
        <!--        <input type="text" id="chatInput" placeholder="Type Your Message..." onkeypress="handleKeyPress(event)">-->
        <!--        <button id="sendButton" onclick="sendMessage()">Send</button>-->
        <!--    </div>-->
        <!--</div>-->
        </div>
    </section>

    <script>
        const chatHistories = {};

        function openChat(name) {
            document.getElementById('chatWindow').style.display = 'block';
            document.getElementById('chatWithName').innerText = name;
            const chatContent = document.getElementById('chatContent');
            chatContent.innerHTML = '';

            if (chatHistories[name]) {
                chatHistories[name].forEach(message => {
                    const messageElement = document.createElement('div');
                    messageElement.textContent = message;
                    chatContent.appendChild(messageElement);
                });
            }
        }

        function closeChat() {
            document.getElementById('chatWindow').style.display = 'none';
        }

        function sendMessage() {
            const message = document.getElementById('chatInput').value;
            const name = document.getElementById('chatWithName').innerText;
            if (message) {
                if (!chatHistories[name]) {
                    chatHistories[name] = [];
                }
                chatHistories[name].push('You: ' + message);

                const chatContent = document.getElementById('chatContent');
                const newMessage = document.createElement('div');
                newMessage.textContent = 'You: ' + message;
                chatContent.appendChild(newMessage);
                document.getElementById('chatInput').value = '';
                chatContent.scrollTop = chatContent.scrollHeight; // Scroll to the bottom
            }
        }

        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                sendMessage();
            }
        }
    </script>

    <script>
        document.getElementById('search').addEventListener('input', function () {
    const query = this.value.toLowerCase();
    const rows = document.querySelectorAll('#userTable tbody tr');

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
        row.style.display = rowText.includes(query) ? '' : 'none';
    });
});

    </script>

    <script>
        // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
        $(window).on("load resize ", function () {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({ 'padding-right': scrollWidth });
        }).resize();


    </script>



    <!-- Start Footer -->
    <footer class="cs_footer background-filled text-white" data-src="assets/img/assi/footer_bg.jpeg">
        <div class="container">
            <div
                class="cs_footer_top d-flex justify-content-between align-items-start align-items-md-center cs_pt_46 cs_pb_46 cs_column_gap_15 cs_row_gap_15 flex-md-row  flex-column">
                <div class="cs_footer_contact_info">
                    <h3 class="text-accent fw-normal cs_mb_4 cs_fs_16 cs_lh_lg">Have Any Question?</h3>
                    <h2 class="text-white fw-medium m-0 cs_fs_22">8929991288</h2>
                </div>
                <div style="width: 30%;" class="cs_footer_logo wow zoomIn" data-wow-duration="0.8s"
                    data-wow-delay="0.2s"><img src="assets/img/assi/ASSI-footer.png" alt="Logo"></div>
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
                                    We find ourselves devoted to enhancing the quality of our fellowship programs,
                                    improving our research
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
</body>

</html>