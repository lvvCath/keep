<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../assets/images/icon.png" type="image/x-icon">
<!-- external css -->
<link rel="stylesheet" href="css/main.css">
<script src="js/main.js"></script>  

<div id="hero" class="container-fluid">
    <div class="row"><?php include 'header.php';?></div>
    <div id="hero-content" class="row flex-lg-row-reverse d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <img src="../assets/images/image-holder.svg" class="d-block mx-lg-auto img-fluid" width="500" height="500">
        </div>
        <div class="col-md-6 py-5 mx-auto">
            <a class="main-edit-ico" data-bs-toggle="modal" data-bs-target="#modalHeroEdit"><i class="fa fa-edit"></i></a>
            <h1 class="display-5 fw-bold lh-1 mb-2"><?php echo "".$row['usersFirstName']. " " .$row['usersLastName']. " " ?></h1>
            <div class="hr"></div>
            <p class="lead">
                 <?php echo $rowResume['about_me']?>
            </p>
            <div class="d-grid d-md-flex justify-content-md-center">
                <a href="#about" class="btn-get-started scrollto"><i class="fa-solid fa-angles-down"></i></a>
            </div>
        </div>
    </div>
</div><!-- End Hero -->

<!-- Modal Hero Edit -->
<div class="modal fade" id="modalHeroEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHeroEditLabel">Introduction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-4 " id="formHeroEdit" name="formHeroEdit" method="POST" action="#">
            <div class="col-12">
                <label class="text-muted" for="intro">Introduction</label>
                <textarea class="form-control" id="intro" name="intro" rows="7" maxlength="300" required
                oninput="introLimit(this)" value=""></textarea>
                <div id="charCounter" class="form-text text-end"></div>
            </div>
            <div class="col-12">
                <label class="text-muted" for="introImage">Image Introduction Link</label>
                <input class="form-control" id="introImage" name="introImage" type="text" placeholder="Insert image link" required
                         value="">
            </div>
            <!-- buttons -->
            <div class="col-md-6 d-flex justify-content-center">
                <button type="button" class="modal-cancel-Btn btn btn-primary" data-bs-dismiss="modal">Cancel</button>   
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <button type="submit" name="introUpdateBtn" class="modal-confirm-Btn btn btn-primary">Update</button>      
            </div> 
        </form>
      </div>
    </div>
  </div>
</div>

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
        <h2><a class="main-edit-ico" data-bs-toggle="modal" data-bs-target="#modalAboutEdit"><i class="fa fa-edit"></i></a> About</h2>
        <p>Learn more about me</p>
    </div>

    <div class="row">
    <div class="col-lg-4" data-aos="fade-right">
        <img src="../assets/images/default-profile.jpg" class="img-fluid" alt="">
    </div>
    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">     
        <h3><?php echo $rowResume['profession']?></h3>
        <p class="fst-italic">
        <?php echo $rowResume['info_description']?>
        </p>
        <div class="row">
        <div class="col-lg-6">
             <ul>
            <li><i class="fa-solid fa-diamond"></i> <strong>Age:</strong> <span><?php echo $rowResume['age']?></span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Phone:</strong> <span><?php echo $rowResume['phone']?></span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>City:</strong> <span><?php echo $rowResume['city']?></span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Degree:</strong> <span><?php echo $rowResume['degree']?></span></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <ul>
            <li><i class="fa-solid fa-diamond"></i> <strong>Years of Experience:</strong> <span><?php echo $rowResume['experience']?></span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Website:</strong> <span><?php echo $rowResume['website']?></span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Email:</strong> <span><?php echo $row['usersEmail']?></span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Freelance:</strong> <span><?php echo $rowResume['freelance']?></span></li>
            </ul>
        </div>
  
      
        </div>
    </div>
    </div>

</div>
</section><!-- End About Section -->

<!-- Modal About Edit -->
<div class="modal fade" id="modalAboutEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAboutEditLabel">About Me</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formAboutEdit" name="formAboutEdit" method="POST" action="#">
        <div class="row g-3">
            <div class="divider col-lg-5">
                <div class="row g-3">
                <div class="col-12">
                    <label class="text-muted" for="about-profession"></label>
                    <input class="form-control" id="about-profession" name="about-profession" type="text" required
                            value="">
                </div>
                <div class="col-12">
                    <label class="text-muted" for="about-desc">About Description</label>
                    <textarea class="form-control" id="about-desc" name="about-desc" rows="8"  required
                            value=""></textarea>
                </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row g-3">
                <div class="col-6 col-sm-6">
                    <label class="text-muted" for="about-age">Age</label>
                    <input class="form-control" id="about-age" name="about-age" type="number" required
                            value="">
                </div>
                <div class="col-6 col-sm-6">
                    <label class="text-muted" for="about-experience">Years of Experience</label>
                    <input class="form-control" id="about-experience" name="about-experience" type="number" required
                            value="">
                </div>
                <div class="col-6 col-sm-6">
                    <label class="text-muted" for="about-phone">Phone</label>
                    <input class="form-control" id="about-phone" name="about-phone" type="text" required
                            value="">
                </div>
                <div class="col-6 col-sm-6">
                    <label class="text-muted" for="about-website">Website</label>
                    <input class="form-control" id="about-website" name="about-website" type="text" required
                            value="">
                </div>
                <div class="col-6 col-sm-6">
                    <label class="text-muted" for="about-city">City</label>
                    <input class="form-control" id="about-city" name="about-city" type="text" required
                            value="">
                </div>
                <div class="col-6 col-sm-6">
                    <label class="text-muted" for="about-email">Email</label>
                    <input class="form-control" id="about-email" name="about-email" type="email" required
                            value="">
                </div>
                <div class="col-6 col-sm-6">
                    <label class="text-muted" for="about-degree">Degree</label>
                    <input class="form-control" id="about-degree" name="about-degree" type="text" required
                            value="">
                </div>
                <div class="col-6 col-sm-6">
                    <label class="text-muted" for="about-freelance">Freelance</label>
                    <input class="form-control" id="about-freelance" name="about-freelance" type="text" required
                            value="">
                </div>
                </div>
            </div>

        </div>
        <div class="row mt-2 g-3">
            <!-- buttons -->
            <div class="col-md-6 d-flex justify-content-center">
                <button type="button" class="modal-cancel-Btn btn btn-primary" data-bs-dismiss="modal">Cancel</button>   
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <button type="submit" name="aboutUpdateBtn" class="modal-confirm-Btn btn btn-primary">Update</button>      
            </div> 
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ======= Skills  ======= -->
<section class="skills section-bg">
    <div class="section-title">
    <h2><a class="main-edit-ico" data-bs-toggle="modal" data-bs-target="#"><i class="fa fa-edit"></i></a> Skills</h2>
    </div>

    <div class="row g-4 skills-content">
        <div class="col-md-6">
        <div class="progress">
            <span class="skill"><?php echo $rowResume['skill']?></span>
            <p><?php echo $rowResume['skill_description']?></p>
        </div>
        </div>
</section><!-- End Skills -->

<!-- ======= Resume Section ======= -->
<section id="resume" class="resume section-bg">
<div class="container-fluid">

    <div class="section-title">
    <h2><a class="main-edit-ico" data-bs-toggle="modal" data-bs-target="#"><i class="fa fa-edit"></i></a> Resume</h2>
    <p>Check My Resume</p>
    </div>

    <div class="row">
    <div class="col-lg-6">
        <h3 class="resume-title">Education</h3>
         <?php foreach ($rowResumes as $rowResume){?> 
            <div class="resume-item">
            <h4><?php echo $rowResume['degree']?></h4>
            <h5><?php echo $rowResume['educ_year']?></h5>
            <p><em><?php echo $rowResume['school']?></em></p>
            <p><?php echo $rowResume['educ_description']?></p>
            </div>
          <?php } ?>
    </div>
    <div class="col-lg-6">
        <h3 class="resume-title">Professional Experience</h3>
        <div class="resume-item">
        <h4><?php echo $rowResume['job']?></h4>
        <h5><?php echo $rowResume['exp_year']?></h5>
        <p><em>E<?php echo $rowResume['job_location']?> </em></p>
        <p><?php echo $rowResume['exp_description']?></p>
    </div>
    </div>

</div>
</section><!-- End Resume Section -->
 
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
<div class="container">

    <div class="section-title">
        <h2><a class="main-edit-ico" data-bs-toggle="modal" data-bs-target="#"><i class="fa fa-edit"></i></a> Services</h2>
        <p>My Services</p>
    </div>

    <div class="row g-5 d-flex align-items-center justify-content-center">
        <div class="col-md-4">
        <div class="icon-box">
            <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
            <h4 class="title"><a href=""><?php echo $rowResume['service']?></a></h4>
            <p class="description"><?php echo $rowResume['service_description']?></p>
        </div>
        </div>

    </div>

</div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
<div class="container">

    <div class="section-title">
    <h2><a class="main-add-ico" data-bs-toggle="modal" data-bs-target="#"><i class="fa fa-circle-plus"></i></a> Portfolio</h2>
    <p>My Works</p>
    </div>

    <!-- <div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-app">App</li>
        <li data-filter=".filter-card">Card</li>
        <li data-filter=".filter-web">Web</li>
        </ul>
    </div>
    </div> -->

    <div class="row portfolio-container ">

    <div class="col-lg-4 col-md-6 portfolio-item filter-category">
        <div class="portfolio-wrap">
        <img src="../assets/images/image-holder.svg" class="img-fluid" alt="">
        <div class="portfolio-info">
            <h4>Card 2</h4>
            <p>Card</p>
            <div class="portfolio-links">
            <a class="btn" title="Portfolio Details" data-bs-toggle="modal" data-bs-target="#portfolio-modal">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
            </div>
        </div>
        </div>
    </div>

    </div>

</div>
</section><!-- End Portfolio Section -->

<!-- Portfolio Modal -->
<div class="modal fade" id="portfolio-modal" tabindex="-1" aria-labelledby="portfolioModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="portfolioModalLabel">Project Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row g-3">
            <div class="col-lg-7">
                <img src="../assets/images/image-holder.svg" alt="" class="d-block mx-lg-auto img-fluid" width="500" height="500">
            </div>

            <div class="col-lg-5 portfolio-info">
                <h3>Project information</h3>
                <ul class="portfolio-info-list">
                <li><strong>Category</strong>: <?php echo $rowResume['category']?></li>
                <li><strong>Client</strong>: <?php echo $rowResume['client']?></li>
                <li><strong>Project date</strong>: <?php echo $rowResume['project_date']?></li>
                <li><strong>Project URL</strong>: <a href="#"><?php echo $rowResume['project_url']?></a></li>
                </ul>
                <p>
                <?php echo $rowResume['project_description']?>
                </p>
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
                <p class="info-p" >A108 Adam Street, New York, NY 535022</p>
            </div>

            <div class="info-box">
                <h3><i class="fa-solid fa-share-alt"></i> &nbsp;Social Profiles</h3>
                <div class="social-links">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>

            <div class="info-box">
                <h3><i class="fa-solid fa-envelope"></i> &nbsp;Email Me</h3>
                <p class="info-p">contact@example.com</p>
            </div>

            <div class="info-box">
                <h3><i class="fa-solid fa-phone"></i> &nbsp;Call Me</h3>
                <p class="info-p">+1 5589 55488 55</p>
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
                    <div class="text-center"><button class="contact-submit" type="submit">Send Message</button></div>
                </div>
            </form>
        </div>

    </div>
</div>
</Section> 
<!-- /CONTACT US -->


<?php include 'footer.php';?>




