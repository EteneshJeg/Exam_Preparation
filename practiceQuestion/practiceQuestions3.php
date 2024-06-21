<?php
require_once("../helpers/init.php");
$query = "SELECT * FROM practicequestions WHERE tid = 3";
$result = mysqli_query($link, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practiceQuestion3</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="../FrontendExam/css/bootstrap.min.css" rel="stylesheet">

    <link href="../FrontendExam/css/bootstrap-icons.css" rel="stylesheet">

    <link href="../FrontendExam/css/templatemo-ebook-landing.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles.css">

</head>

<body>
    <!-- <h1>Practice Questions Page</h1> -->
    <div style="display: inline;"> <a class="navbar-brand" style="color: #E76F40; margin:40px;" href="../FrontendExam/home/home.html">
            /<span>Home</span>
        </a>
    </div>
    <section id="faq" class="faq section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Javascript Practice Questions</h2>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-container">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="faq-item">
                                <h3> <?php echo $row['question']; ?></h3>
                                <div class="faq-content">
                                    <p><?php echo $row['answer']; ?></p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- footer section  -->
    <section class="contact-section section-padding mg-t=3" id="section_5">
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

    <script src="./script.js"></script>
</body>

</html>