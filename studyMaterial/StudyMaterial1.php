<?php
require_once("../helpers/init.php");
$query = "SELECT * FROM studyMaterial WHERE tid = 1";
$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studyMaterial1</title>
    <!-- Include FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <link rel="stylesheet" href="../FrontendExam/css/custom.css"> -->
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="../FrontendExam/css/bootstrap.min.css" rel="stylesheet">

    <link href="../FrontendExam/css/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./styles.css">
    <link href="../FrontendExam/css/templatemo-ebook-landing.css" rel="stylesheet">
</head>

<body>
    <!-- <a href="https://www.w3schools.com/whatis/whatis_html.asp">what is html</a> -->
    <div> <a class="navbar-brand" style="color: #E76F40; margin:40px;" href="../FrontendExam/home/home.html">
            /<span>Home</span>
        </a>
    </div>
    <div class="container">
        <h2> HTML Study Material</h2>
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">



                <!-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <img src="../images/htmlInEasySteps.webp" class="img-fluid" alt="">
                        <a href="https://html.com/" class="link-icon" title="App 1" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <?php
                        $row = mysqli_fetch_assoc($result);
                        $images_dir = 'images/';
                        $images = scandir($images_dir);

                        // Loop through the images and display them one by one
                        foreach ($images as $image) {
                            echo '<img src="' . $images_dir . $image . '" />';
                            echo '<a href="' . $row['material'] . '" class="link-icon" title="App 1" target="_blank"><i class="bi bi-box-arrow-up-right"></i>
                            </a>';
                            echo '<a href="' . $row['material'] . '" class="btn mt-3 mb-3 custom-btn " download>Download Book</a>';
                        }
                        ?>
                        
                    </div>
                </div>
                        <!-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <img src="../images/CoversHtml.PNG" class="img-fluid" alt="">
                        <a href="https://www.dcpehvpm.org/E-Content/BCA/BCA-II/Web%20Technology/the-complete-reference-html-css-fifth-edition.pdf" class="link-icon" title="App 1" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <img src="../images/HTMLFourthEdition.webp" class="img-fluid" alt="">
                        <a href="https://html.com/" class="link-icon" title="App 1" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>
                    </div>

                </div>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <img src="../images/htmlInEasySteps.webp" class="img-fluid" alt="">
                        <a href="https://html.com/" class="link-icon" title="App 1" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <img src="../images/basicshtml.jpg" class="img-fluid" alt="">
                        <a href="https://www.lkouniv.ac.in/site/writereaddata/siteContent/202005171817289765Priyanka-WT-HTML%20Basics.pdf" class="link-icon" title="App 1" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <img src="../images/begineershtml.jpg" class="img-fluid" alt="">
                        <a href="https://www.webdesign.org/downloads/Beginners_Guide_to_HTML.pdf" class="link-icon" title="App 1" target="_blank"><i class="bi bi-box-arrow-up-right"></i></a>

                    </div>
                </div> -->
                    </div>
                    <!-- End Portfolio Container -->
                </div>
            </div>
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
</body>

</html>