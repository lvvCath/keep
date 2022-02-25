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
            <h1 class="display-5 fw-bold lh-1 mb-2"><?php echo "".$row['usersFirstName']. " " .$row['usersLastName']. " " ?></h1>
            <div class="hr"></div>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit</p>
            <div class="d-grid d-md-flex justify-content-md-center">
                <a href="#about" class="btn-get-started scrollto"><i class="fa-solid fa-angles-down"></i></a>
            </div>
        </div>
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
                <a class="nav-link scrollto active" href="#hero">Home</a></li>
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

    <div class="row">
    <div class="col-lg-4" data-aos="fade-right">
        <img src="../assets/images/default-profile.jpg" class="img-fluid" alt="">
    </div>
    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
        <h3>UI/UX &amp; Graphic Designer</h3>
        <p class="fst-italic">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua.
        </p>
        <div class="row">
        <div class="col-lg-6">
            <ul>
            <li><i class="fa-solid fa-diamond"></i> <strong>Age:</strong> <span>30</span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Phone:</strong> <span>+123 456 7890</span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>City:</strong> <span>New York, USA</span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Degree:</strong> <span>Master</span></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <ul>
            <li><i class="fa-solid fa-diamond"></i> <strong>Years of Experience:</strong> <span>10</span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Website:</strong> <span>www.example.com</span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Email:</strong> <span>email@example.com</span></li>
            <li><i class="fa-solid fa-diamond"></i> <strong>Freelance:</strong> <span>Available</span></li>
            </ul>
        </div>
        </div>
        <p>
        Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
        Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
        </p>
    </div>
    </div>

</div>
</section><!-- End About Section -->

<!-- ======= Skills  ======= -->
<section class="skills section-bg">
    <div class="section-title">
    <h2>Skills</h2>
    </div>

    <div class="row g-4 skills-content">
        <div class="col-md-6">
        <div class="progress">
            <span class="skill">HTML <i class="val">90%</i></span>
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="progress">
            <span class="skill">HTML <i class="val">80%</i></span>
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="progress">
            <span class="skill">HTML <i class="val">100%</i></span>
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="progress">
            <span class="skill">HTML <i class="val">60%</i></span>
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="progress">
            <span class="skill">HTML <i class="val">100%</i></span>
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="progress">
            <span class="skill">HTML <i class="val">60%</i></span>
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
        </div>
        </div>
    </div>
</section><!-- End Skills -->

<!-- ======= Resume Section ======= -->
<section id="resume" class="resume section-bg">
<div class="container-fluid">

    <div class="section-title">
    <h2>Resume</h2>
    <p>Check My Resume</p>
    </div>

    <div class="row">
    <div class="col-lg-6">
        <h3 class="resume-title">Sumary</h3>
        <div class="resume-item pb-0">
        <h4>Alice Barkley</h4>
        <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
        <p>
        <ul>
            <li>Portland par 127,Orlando, FL</li>
            <li>(123) 456-7891</li>
            <li>alice.barkley@example.com</li>
        </ul>
        </p>
        </div>

        <h3 class="resume-title">Education</h3>
        <div class="resume-item">
        <h4>Master of Fine Arts &amp; Graphic Design</h4>
        <h5>2015 - 2016</h5>
        <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
        <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>
        </div>
        <div class="resume-item">
        <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
        <h5>2010 - 2014</h5>
        <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
        <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>
        </div>
    </div>
    <div class="col-lg-6">
        <h3 class="resume-title">Professional Experience</h3>
        <div class="resume-item">
        <h4>Senior graphic design specialist</h4>
        <h5>2019 - Present</h5>
        <p><em>Experion, New York, NY </em></p>
        <p>
        <ul>
            <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>
            <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>
            <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>
            <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
        </ul>
        </p>
        </div>
        <div class="resume-item">
        <h4>Graphic design specialist</h4>
        <h5>2017 - 2018</h5>
        <p><em>Stepping Stone Advertising, New York, NY</em></p>
        <p>
        <ul>
            <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>
            <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
            <li>Recommended and consulted with clients on the most appropriate graphic design</li>
            <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
        </ul>
        </p>
        </div>
    </div>
    </div>

</div>
</section><!-- End Resume Section -->
 
<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
<div class="container">

    <div class="section-title">
        <h2>Services</h2>
        <p>My Services</p>
    </div>

    <div class="row g-5 d-flex align-items-center justify-content-center">
        <div class="col-md-4">
        <div class="icon-box">
            <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
        </div>
        </div>

        <div class="col-md-4">
        <div class="icon-box">
            <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
        </div>
        </div>

        <div class="col-md-4">
        <div class="icon-box">
            <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
        </div>
        </div>

        <div class="col-md-4">
        <div class="icon-box">
            <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
        </div>
        </div>
        <div class="col-md-4">
        <div class="icon-box">
            <div class="icon"><i class="fa-solid fa-briefcase"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
        </div>
        </div>

    </div>

</div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
<div class="container">

    <div class="section-title">
    <h2>Portfolio</h2>
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
                <li><strong>Category</strong>: Mobile Application</li>
                <li><strong>Client</strong>: ABC Company</li>
                <li><strong>Project date</strong>: 01 January, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.website.com</a></li>
                </ul>
                <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
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
<Section id="contact" class="contact-me">
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




