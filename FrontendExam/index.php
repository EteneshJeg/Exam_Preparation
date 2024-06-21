<?php

require_once("../helpers/init.php");
// $_SESSION['test'] = 'example';

// print "<pre>";
// print_r($_POST);
// print_r($_SESSION);
?>

<?php
// Start the session
// session_start();

// Set error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in (you can replace this condition with your own logic)
if (isset($_SESSION['uHash'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}

// Simulating logout functionality (You can implement your own logout logic)
if (isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect to homepage or login page
    header("Location: ../user/login.php"); // Change the URL to your desired location
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exam preparation</title>


    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href=".css/bootstrap.min.css" rel="stylesheet">

    <link href="./css/bootstrap-icons.css" rel="stylesheet">

    <link href="./css/templatemo-ebook-landing.css" rel="stylesheet">
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <i class="navbar-brand-icon bi-book me-2"></i>
                    <span>ExamPrep</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto me-lg-4">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </main>

    <!-- the landing page  -->

    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 pb-5 pb-lg-0 mb-lg-0">

                    <h6>Welcome to Exam Prep</h6>

                    <h1 class="text-white mb-4">Manage your time and goals on one single platform.</h1>

                    <a href="./users/register.html" class="btn custom-btn smoothscroll me-3">Register</a>

                    <a href="./users/login.html" class="btn custom-btn smoothscroll me-3">Login</a>
                </div>

                <div class="hero-image-wrap col-lg-6 col-12 mt-3 mt-lg-0">
                    <img src="./images/education-online-books.png" class="hero-image img-fluid" alt="education online books">
                </div>

            </div>
        </div>
    </section>
    <section class="featured-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12">
                </div>
            </div>
        </div>
    </section>


    <section class="py-lg-5"></section>

    <!-- About us section -->


    <section class="book-section section-padding" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <img src="./FrontendExam/images/about.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 col-12">
                    <div class="book-section-info">
                        <h6>Modern &amp; Creative</h6>


                        <h2 class="mb-4">About examPrep</h2>

                        <p>The Exam Preparation Platform is your one-stop solution for effective exam readiness.</p>

                        <p>With concise study materials, practice questions, and interactive quizzes, our user-friendly tools empower students to excel. Unlock your full academic potential and conquer your exams with confidence.</p>

                        <p>Your path to exam Execellence starts here...</p>

                        <h5>Achieve Exam Success with Effective and Supportive Prep</h5>

                        <p>Open the Door to your exam success.Where warm and supportive preparation sets you up for Achievement.</p>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="contact-section section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-12 mx-auto pt-1">
                    <h6 class="mt-5">Say hi and talk to us</h6>

                    <h2 class="mb-4">Contact Us</h2>
                    <p class="mb-3">
                        <i class="bi-geo-alt me-2"></i>
                        Ethiopia,Addis Ababa
                    </p>
                </div>

                <div class="col-lg-6 col-12">


                    <h6>Phone Number</h6>

                    <p class="mb-2">
                        <a href="tel: 010-020-0340" class="contact-link">
                            +251-934929292
                        </a>
                    </p>
                    <h6>Our email</h6>

                    <p>
                        <a href="mailto:info@company.com" class="contact-link">
                            examPreparation@gmail.com
                        </a>
                    </p>

                    <h6 class="site-footer-title mt-5 mb-3">Social</h6>

                    <ul class="social-icon mb-4">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>

                    <p class="copyright-text">Copyright © 2024 examPrep
                </div>

            </div>
        </div>
    </section>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="./FrontendExam/js/jquery.min.js"></script>
    <script src="./FrontendExam/js/bootstrap.bundle.min.js"></script>
    <script src="./FrontendExam/js/jquery.sticky.js"></script>
    <script src="./FrontendExam/js/click-scroll.js"></script>
    <script src="./FrontendExam/js/custom.js"></script>

</body>


<!-- <script>
    function toggleTopics(index) {
        var topics = document.getElementById('topics' + index);
        if (topics.style.display === "none") {
            topics.style.display = "block";
        } else {
            topics.style.display = "none";
        }
    }
</script> -->


</html>