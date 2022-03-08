<?php include 'sendemail.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <title>KEEP</title>
   <link rel="icon" href="../assets/images/icon.png" type="image/x-icon">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar">
   
   <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
      <div class="container">
         <a class="navbar-brand" href="#">
            <img src="../assets/images/icon.png" alt="" width="30" height="40" class="d-inline-block align-text-top">
        </a>
        <a class="navbar-brand logo-text" href="#">KEEP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#about">About Us</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#portfolio">Portfolio</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#features">Features</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#testimonials">Testimonials</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#contact">Contact</a>
             </li>
             <li class="nav-item px-5">
               <button class="btn btn-outline-primary my-2 my-sm-0"  onclick="location.href='../LoginModule/LogIn.php '" style=" padding: 10px 20px; width:150px; margin: 4px 2px; border-radius: 32px" >Sign In</button>
           </li>   
          </ul>
        </div>
      </div>
    </nav>

    
   <!--alert messages start-->
   <?php echo $alert; ?>
   <!--alert messages end-->

   <section id="home">
      <div class="container text-center">
         <div class="row justify-content-center">
            <div class="col-md-10">
               <h1 class="text-white display-2">BUILD YOUR OWN <br>E-PORTFOLIO </h1>
               <h1 class="text-white display-4">WITH KEEP</h1>
               <br><br>
              <button class="btn btn-brand"  style="font-size:1.5vw; padding:1% 1% 1% 1%; "  onclick="location.href='../LoginModule/LogIn.php '" >GET Started</button>
               
            </div>
         </div>
      </div>
   </section>
   
<!--About section-->
   <section id="about" >
      <div class="container">
         <div class="row">
            <div class="col-12 section-intro">
               <h1>About Us</h1>
               <div class="hline"></div>
            </div>
         </div>
         <div class="row"  >
            <figure class="text-center">
               <p  class="blockquote" style=" color: #11245A;   text-align: justify; text-justify: inter-word;"> KEEP (Keeper of Excellent and essential Profile) is created to transform traditional portfolio management into a more computerized way of managing career and personal data.  The company wants to enable students, job-seekers, and professionals to create an e-portfolio.  That includes their educational background, contact details, and projects that they have worked on. Using a user-friendly application and providing an organized system for the user.  Provide a secure and safe platform to 
                  make e-portfolio.</p>
               </figure>
         </div>

      </div>
   </section>

<!--Portfolio section-->
   <section id="portfolio" class="row g-0 py-0">
      <div class="col-lg-4 col-sm-6">
         <div class="portfolio-item">
               <img src="img/1.png" alt="">
               <div class="portfolio-overlay">
                  <div>
                     <h3>About</h3>
                  </div>
               </div>
         </div>
      </div>
      <div class="col-lg-4 col-sm-6">
         <div class="portfolio-item">
               <img src="img/2.png" alt="">
               <div class="portfolio-overlay">
                  <div>
                     <h3>Skills</h3>  
                  </div>
               </div>
         </div>
      </div>
      <div class="col-lg-4 col-sm-6">
         <div class="portfolio-item">
               <img src="img/3.png" alt="">
               <div class="portfolio-overlay">
                  <div>
                     <h3>Resume</h3> 
                  </div>
               </div>
         </div>
      </div>
      <div class="col-lg-4 col-sm-6">
         <div class="portfolio-item">
               <img src="img/4.png" alt="">
               <div class="portfolio-overlay">
                  <div>
                     <h3>My services</h3>
                  </div>
               </div>
         </div>
      </div>
      <div class="col-lg-4 col-sm-6">
         <div class="portfolio-item">
               <img src="img/5.png" alt="">
               <div class="portfolio-overlay">
                  <div>
                     <h3>My Works</h3>
                  </div>
               </div>
         </div>
      </div>
      <div class="col-lg-4 col-sm-6">
         <div class="portfolio-item">
               <img src="img/6.png" alt="">
               <div class="portfolio-overlay">
                  <div>
                     <h3>Contact Us</h3> 
                  </div>
               </div>
         </div>
      </div>
   </section>
   
<!--Features section-->
   <section id="features">
      <div class="container">
         <div class="row">
            <div class="col-12 section-intro">
               <h1>Our Features</h1>
               <div class="hline"></div>
            </div>
         </div>
         <div class="row gy-5">
            <div class="col-lg-4 col-sm-6 feature d-flex">
               <div class="icon-box me-3">
                  <i class="bx bx-check"></i>
               </div>
               <div>
                  <h5 class="title-sm">Feature</h5>
                  <p  style="color:black;"> KEEP is FREE</p>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 feature d-flex">
               <div class="icon-box me-3">
                  <i class="bx bx-check"></i>
               </div>
               <div>
                  <h5 class="title-sm">Feature</h5>
                  <p  style="color:black;"> Your personal information is safe to us </p>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 feature d-flex">
               <div class="icon-box me-3">
                  <i class="bx bx-check"></i>
               </div>
               <div>
                  <h5 class="title-sm">Feature</h5>
                  <p style="color:black;"> No need to do hard coding </p>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 feature d-flex">
               <div class="icon-box me-3">
                  <i class="bx bx-check"></i>
               </div>
               <div>
                  <h5 class="title-sm">Feature</h5>
                  <p style="color:black;"> A user-friendly E-portfolio Builder, even newbie and professional can easily navigate the website</p>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 feature d-flex">
               <div class="icon-box me-3">
                  <i class="bx bx-check"></i>
               </div>
               <div>
                  <h5 class="title-sm">Feature</h5>
                  <p style="color:black;">More different designer made template E-portfolio templates that match on your career.</p>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6 feature d-flex">
               <div class="icon-box me-3">
                  <i class="bx bx-check"></i>
               </div>
               <div>
                  <h5 class="title-sm">Feature</h5>
                  <p style="color:black;">You can easily share your E-portfolio to your friends and clients. Just copy the link and set the restriction.</p>
               </div>
            </div>
         </div>
      </div>
   </section>

<!--testimonial section-->
   <section id="testimonials" class="text-center">
      <div class="container">
         <div class="row">
            <div class="col-12 section-intro">
               <h1>CUSTOMER FEEDBACK</h1>
               <div class="hline"></div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                       <img src="img/team-4-800x800.jpg" alt="">
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                     <img src="img/team-6-800x800.jpg" alt="">
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                     <img src="img/team-8-800x800.jpg" alt="">
                    </button>
                  </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                     <div class="review">
                        <div class="stars">
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                        </div>
                        <p class="lead">Big thanks to KEEP, It's easy now to create  e-portfolio</p>
                        <h5 class="title-sm mb-0">John Garcia</h5>
                        <small>Vistual Assistant</small>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                     <div class="review">
                        <div class="stars">
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                        </div>
                        <p class="lead">It's a great platform, it's easy to use and so many premade portfolio to choose. </p>
                        <h5 class="title-sm mb-0">Nori Collins</h5>
                        <small>Book Keeper</small>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                     <div class="review">
                        <div class="stars">
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                           <i class="bx bxs-star"></i>
                        </div>
                        <p class="lead">It help me to make my own e-portfolio without need of coding and it's easy to share my e-portfolio to my clients.</p>
                        <h5 class="title-sm mb-0">Joshua Garcia</h5>
                        <small>Programmer</small>
                     </div>
                  </div>
                </div>
            </div>
         </div>
      </div>
   </section>

<!--Contact section-->
   <section id="contact">
      <div id="contact-us" class="contact-us section">
         <div class="form contact-us-form">
            <div class="contact-info">
               <h3 class="title">CONNECT WITH US</h3>
               <p class="text">Let's connect</p>
               <div class="info"><br>
                     <div class="social-information"> <i class="fa fa-map-marker"></i>
                        <p>938 Aurora Blvd, Cubao, Quezon City, 1109 Metro Manila</p>
                     </div>
                     <div class="social-information"> <i class="fa fa-envelope"></i>
                        <p>keep.webpage@gmail.com</p>
                     </div>
                     <div class="social-information"> <i class="fa fa-phone"></i>
                        <p>(02) 8733 9117</p>
                     </div>
               </div>
               <div class="social-media"><br>
                     <p>Social media account :</p>
                     <div class="social-icons"> 
                        <a href="#"><i class="bx bxl-facebook"></i></a> 
                        <a href="#"><i class="bx bxl-twitter"></i></a> 
                        <a href="#"><i class="bx bxl-instagram"></i></a>
                     </div>
               </div>
            </div>

            <div class="contact-info-form"> <span class="circle one"></span> <span class="circle two"></span>
               <form class="contact" action="" method="post" autocomplete="off">
                     <h3 class="title">Contact us</h3>
                     <div class="social-input-containers"> 
                        <input type="text" name="name" class="input" placeholder="Name" required/> 
                     </div>
                     <div class="social-input-containers"> 
                        <input type="email" name="email" class="input" placeholder="Email" required/> 
                     </div>
                     <div class="social-input-containers"> 
                        <input type="telephone" name="phone" class="input" placeholder="Phone"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required/> 
                     </div>
                     <div class="social-input-containers textarea"> 
                        <textarea name="message" class="input" placeholder="Message" required></textarea> 
                     </div> 
                     <input type="submit" name="submit" value="Send" class="btn" />
               </form>
            </div>
         </div>
      </div> 
   </section>

<!--Footer section-->
   <footer>
      <div class="footer-top">
         <div class="container">
            <div class="row gy-5">
               <div class="col-md-1">
                     <img src="../assets/images/icon.png" alt="logo"  loading="lazy" class="img-responsive" /> 
               </div>
               <div class="col-md-4">   
                  <h4 class="footer-logo-text">KEEP</h4>
                  <p style="color: white;">Keeper of Excellent and essential Profile </p>
                  <div class="social-icons">
                     <a href="#" style="color: white;"><i class="bx bxl-facebook"></i></a>
                     <a href="#" style="color: white;"><i class="bx bxl-twitter"></i></a>
                     <a href="#" style="color: white;"><i class="bx bxl-instagram"></i></a>
                  </div>
                  
               </div>
               <div class="col-md-2">
                  <h5 class="footer-logo-text">Navigation</h5>
                  <div class="footer-links">
                     <a href="#about">About Us</a>
                     <a href="#portfolio" >Portfolio</a>
                     <a href="#features" >Features</a>
                     <a href="#testimonials" >Testimonials</a>
                  </div>
               </div>
               <div class="col-md-2">
                  <h5 class="footer-logo-text">Contact</h5>
                  <div class="footer-links">
                     <p class="mb" >938 Aurora Blvd, Cubao, Quezon City, 1109 Metro Manila</p>
                     <p class="mb-" >(02) 8911 0964</p>
                     <p class="mb" >keep.webpage@gmail.com</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="footer-bottom">
         <div class="container">
            <div class="row justify-content-between gy-3">
               <div class="col-md-6">
                  <p class="mb-0" style="color: white;">© 2022 KEEP | All rights reserved</p>
               </div>
               <div class="col-auto">
                  <p class="mb-0" style="color: white;">Created with KEEP</p>
               </div>
            </div>
         </div>
      </div>
   </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script type="text/javascript">
      if(window.history.replaceState){
         window.history.replaceState(null, null, window.location.href);
      }
    </script>

  </body>



