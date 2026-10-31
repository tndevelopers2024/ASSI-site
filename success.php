<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submission Successful</title>
  <script src="https://cdn.tailwindcss.com"></script>
   <!-- Favicon Icon -->
   <link rel="icon" href="assets/img/assi/assi-logo.png">
    <!-- Site Title -->
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
    .success-icon {
      background-color: #1b56a5;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 80px;
      height: 80px;
      animation: bounce 1.5s infinite;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
      }
      40% {
        transform: translateY(-20px);
      }
      60% {
        transform: translateY(-10px);
      }
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-lg rounded-lg p-8 max-w-md text-center">
    <div class="success-icon mx-auto mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m0 6a9 9 0 11-6.4-2.6l-1.6 1.6A11 11 0 1012 23v-1z" />
      </svg>
    </div>
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Submission Successful!</h2>
    <p class="text-gray-600 mb-6">Thank you for submitting the membership form. Your submission has been received and is being processed.</p>
    <a style="background: #1b56a5;" href="/" class="inline-block px-6 py-3 text-white font-semibold rounded-md hover:bg-blue-600 transition">Back to Home</a>
  </div>

</body>
</html>
