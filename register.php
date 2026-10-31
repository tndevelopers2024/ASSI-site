<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $emailExistsError = "User with this email already exists!";
    } else {
        // Generate OTP
        $otp = mt_rand(100000, 999999);

        // Send OTP to user's email using SMTP
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = false;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "schooloftechies@gmail.com";
            $mail->Password = "imgkejsbclatcepo";
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->From = $from;                           

            //Recipients
            $mail->setFrom('arunkumarddd12@gmail.com  ', 'Assi');
            $mail->addAddress($email, $username);                       // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'OTP Verification';
            $mail->Body    = 'Your OTP for registration is: ' . $otp;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Store OTP in session
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phonenumber'] = $phonenumber;
        $_SESSION['password'] = $password;

        // Redirect to OTP verification page
        header('location: verify_otp.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Scribe Register</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    .tab-content {
    background-color: transparent !important;
    padding: 0 !important;
    width: auto !important;
    height: auto !important;
    border-radius: 20px;
}
    .logo-container {
      display: grid;
      margin: 30px 0;
      place-items: start !important;
      padding-left: 50px;
    }

    .login-1 span {
      color: #fff;
      font-weight: 800;
    }

    .login-page button {
      width: 70%;
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
    
  </style>
</head>

<body>
  <section class="login-page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-5 col-md-12 login-1">
          <h2>
            <span>SCRIBE</span>(<b>S</b>ystematic <b>C</b>ollection of <b>R</b>eflections and <b>I</b>ndividual
            experiences in <b>B</b>ioethics <b>E</b>ducation) <br> "An ePortfolio for Bioethics Education"
          </h2>
        </div>
        <div class="col-12 col-lg-7 col-md-12 login-2">
          <div class="logo-container">
            <img src="assets/images/scribe.png" alt="" />
          </div>
          <h3>Register</h3>  
          <form action="" method="post" enctype="multipart/form-data">
            
            <?php
               if (isset($emailExistsError)) {
                   echo '<h5 style="color: red;">User with this email already exists!</h5>';
               }
               ?>
           <label for="">Your fullname*</label><br>
           <input type="text" placeholder="Enter Your Name" name="name"><br>
           <label for="">Email address*</label><br>
           <input type="text" placeholder="Enter email address" name="email"><br>
           <label for="phonenumber">Phone Number</label><br>
           <input type="tel" placeholder="Enter Phone NUmber" name="phonenumber"><br>
           <label for="">Create password*</label><br>
           <div class="password-input-container">
       <input type="password" placeholder="Enter password" name="password" id="password">
       <i class="toggle-password fas fa-eye-slash" aria-hidden="true" onclick="togglePasswordVisibility()"></i>
   </div>
           <button type="submit" name="submit">Register</button>

           <p>You have an account already? <span> <a href="index.php">Login</a></span></p>
         </form>
        </div>
      </div>
    </div>
  </section>

  <div class="">
  </div>
  
  <script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var icon = document.querySelector('.toggle-password');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>