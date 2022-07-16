<?php
include('../Database/db.php'); 
session_start();
$token = $_GET["v"];
$sql = "SELECT * FROM users_share WHERE token = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: portfolio_private.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        if($row['permission'] == 1){
            $_SESSION['share-userid'] = $row['userid'];
            $id = $row['userid'];
        }else{
            $_SESSION['page-found'] = 1;
            header("location: portfolio_private.php");
            exit();
        }
        
    }else{
        $_SESSION['page-found'] = 0;
        header("location: portfolio_private.php");
        exit();
    }
    
    mysqli_stmt_close($stmt);

    include('../UserModule/includes/fetch_acc_info.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>KEEP</title>
    <link rel="icon" href="../assets/images/icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="../assets/fontawesome-free-6.0.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/solid.css" rel="stylesheet">
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" integrity="sha512-/n/dTQBO8lHzqqgAQvy0ukBQ0qLmGzxKhn8xKrz4cn7XJkZzy+fAtzjnOQd5w55h4k1kUC+8oIe6WmrGUYwODA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="js/main.js"></script>
</head>

<body>
<div id="hero" class="container-fluid">
    <div id="hero-content" class="row flex-lg-row-reverse d-flex align-items-center justify-content-center">
        <!-- INSERT HERO-CONTENT HERE (about_update_home.php) -->
    </div>
</div><!-- End Hero -->

<!-- ======= Header ======= -->
<header id="header" class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-light shadow bg-body rounded h-navbar">
  <div class="container-fluid d-flex">
    <a class="navbar-brand" href="#" style="text-transform: uppercase;">
    <span class="fa-solid fa-user" style="color:#0084ff;"></span>
    <?php echo $row['usersFirstName']?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
        <ul class="navbar-nav">
            <li class="nav-item px-2">
                <a class="nav-link scrollto active" href="#">Home</a></li>
            <li class="nav-item px-2">
                <a class="nav-link scrollto" href="#about">About</a></li>
            <li class="nav-item px-2">
                <a class="nav-link scrollto" href="#resume">Resume</a></li>
            <li class="nav-item px-2">
                <a class="nav-link scrollto" href="#services">Services</a></li>
            <li class="nav-item px-2">
                <a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
            <li class="nav-item px-2">
                <a class="nav-link scrollto" href="#Contact">Contact</a></li>
        </ul>
    </div>

  </div>
</nav>
</header><!-- End Header -->

<!-- ======= About Section ======= -->
<section id="about" class="about section-bg">
<div class="container-fluid">
    <!-- About -->
    <div class="section-title">
        <h2>About</h2>
        <p>Learn more about me</p>
    </div>

    <div id="about_content" class="row">
        <!-- INSERT ABOUT CONTENT HERE (about_update.php) -->
    </div>

</div>
</section><!-- End About Section -->

<!-- ======= Skills  ======= -->
<section class="skills section-bg">
    <div class="section-title">
    <h2>Skills</h2>
    </div>
    
    <div id="SkillSection" class="row g-4 skills-content">
    </div>
</section><!-- End Skills -->

<!-- ======= Resume Section ======= -->
<section id="resume" class="resume section-bg">
<div class="container-fluid">

    <div class="section-title">
    <h2>Resume</h2>
    <p>Check My Resume</p>
    </div>

    <h3 class="resume-title"> Education</h3>
    <div id="EducationSection" class="row">
    </div>

    <h3 class="resume-title">Professional Experience</h3>
    <div id="ExperienceSection" class="row"></div>

</div>
</section><!-- End Resume Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
<div class="container-fluid">

    <div class="section-title">
        <h2>Services</h2>
        <p>My Services</p>
    </div>

    <div id="ServiceSection"  class="row g-3 d-flex justify-content-center">
        <!-- insert service/s -->
    </div>

</div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
<div class="container-fluid">

    <div class="section-title">
    <h2>Portfolio</h2>
    <p>My Works</p>
    </div>

    <div id="WorkSection" class="row g-2 g-5 d-flex align-items-center justify-content-center">
    <!-- insert work/s -->
    </div>

</div>
</section><!-- End Portfolio Section -->

<!-- Portfolio Modal -->
<div class="modal fade" id="portfolio-modal" tabindex="-1" aria-labelledby="portfolioModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="portfolioModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row g-3">
            <div class="col-lg-7">
                <img id="view_image" src="../assets/images/image-holder.svg" alt="" class="d-block mx-lg-auto img-fluid" width="500" height="500">
            </div>

            <div class="col-lg-5 portfolio-info">
                <h3>Project information</h3>
                <ul class="portfolio-info-list">
                <li><strong>Category</strong>: <span id="view_category"></span></li>
                <li><strong>Client</strong>: <span id="view_client"></span></li>
                <li><strong>Project date</strong>: <span id="view_date"></span></li>
                <li><strong>Project URL</strong>: <span id ='view_url' href="#"></span></li>
                </ul>
                <p id ='view_description'></p>
            </div>

            </div>

        </div>
        </div><!-- End Portfolio Details -->

    </div>
    </div>
</div>
</div>

<!-- ======= Contact Section ======= -->
<Section id="Contact" class="contact-me">
<div class="container-fluid">
    <div class="row">
        <div id="contact-left" class="col-md-6 py-5">
            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Me</p>
            </div>

            <div class="info-box">
                <h3><i class="fa-solid fa-map"></i> &nbsp;My Address</h3>
                <p id="contact_city" class="info-p" ></p>
            </div>

            <div class="info-box">
                <h3><i class="fa-solid fa-envelope"></i> &nbsp;Email Me</h3>
                <p id="contact_email" class="info-p"></p>
            </div>

            <div class="info-box">
                <h3><i class="fa-solid fa-phone"></i> &nbsp;Call Me</h3>
                <p id="contact_phone" class="info-p"></p>
            </div>
            
        </div>

        <div id="contact-right" class="col-md-6 py-5">
            <div class="section-title">
                <h2></h2>
                <p>Message Me</p>
            </div>
            <form action="#" method="post" role="form" class="contact-form">
                <div class="row g-3">
                    <div class="col-12 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-12 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="col-12 form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="col-12 form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="text-center"><button class="contact-submit" type="submit" disabled>Send Message</button></div>
                </div>
            </form>
        </div>

    </div>
</div>
</Section> 
<!-- /CONTACT US -->

<script src="PortfolioCRUD\portfolio_public.ajax.js"></script>
<?php include 'footer.php';?>