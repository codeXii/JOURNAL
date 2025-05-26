<?php

require './config/database.php';

// FETCH ALL PUBLICATIONS
$pub_query = "SELECT * FROM pubs ORDER BY id DESC";
$pub_result = mysqli_query($connect, $pub_query);


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Starter Page - </title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/site-logo.jpg" rel="icon">
  <link href="assets/img/site-logo.jpg" rel="apple-touch-icon">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="starter-page-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/site-logo.jpg" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home<br></a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="courses.php">Courses</a></li>
           <li><a href="./publications.php"><span>Publications</span></a></li>
          <!-- <li class="dropdown"><a href="publication.php"><span>Publication</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="events.html">Events</a></li>
              <li><a href="starter-page.html">Lectures</a></li>
              <li><a href="starter-page.html">Media</a></li>
            
            </ul>
          </li> -->
          <li><a href="contact.php">Contact</a></li>
          <a class="btn-getstarted" href="pricing.php"> Donate</a>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
       
      </nav>

    </div>
  </header>

   <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">

         <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <!-- <li><a href="index.html">Home</a></li> -->
            <li class="current">Upload a publication</li>
          </ol>
        </div>
      </nav>

      <div>

        <div class="container mb-3">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-12">

            <!-- FORM FOR PUBLICATION UPLOADING -->
              <form method="POST" action="<?= ROOT_URL ?>addpub-logic.php" class="mt-3" enctype="multipart/form-data">
                  

                <div class="row mb-3 ">
                  <div class="form-group col-md-6">
                        <label for="password">Author Full Names</label>
                        <input type="text" class="form-control" name="author" id="" placeholder="Fullnames" required>
                  </div>

                  <div class="col-md-6 form-group">
                        <label for="password">Co-Authors</label>
                        <input type="text" class="form-control" name="co-author" value="" id="" placeholder="Names are comma seperated" required>     
                  </div>
                </div>


                 <div class="row  mb-3 form-group">
                        <div class="col-md-6">
                            <label for="password">Publication Title</label>
                            <input type="text" class="form-control" name="pub-title" value="" id="" placeholder="Title of publication" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password">Publication cover photo</label>
                            <input type="file" class="form-control" name="pub-photo" value="" id="" placeholder="Title of publication" required>
                        </div>
                </div>

                <div class="row mb-2 form-group">

                      <div class="form-group col-6 mb-2" >
                          <label for="password">Description</label>
                          <textarea name="description" id="" placeholder="A brief summary of the publication" class="form-control" required></textarea>
                      </div> 

                      <div class="form-group col-6 mb-2" >
                          <label for="password">Document (Pdf, Docx)</label>
                          <input type="file" class="form-control" name="document" value="" placeholder="Pdf, Docx" required>
                      </div> 

                </div>
                
                
                <div class="row">
                  <div class="form-group col-md-6">
                    <button class="btn btn-secondary" type="submit" name="submit">Upload</button>
                </div>

                <?php if(isset($_SESSION['pub-doc'])): ?>
                  
                  <div class="col-md-6 bg-danger text-center pt-2 border border-danger rounded">
                    <p>
                      <?= $_SESSION['pub-doc'];
                       unset($_SESSION['pub-doc']); ?>
                    </p>
                </div>

              <?php endif; ?>

                
               </form>
            </div>
          </div>
        </div>
      </div>
     
    </div>

  </main>


  
  <main class="main">
    <section id="courses" class="courses section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2></h2>
        <p>Popular Publications</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <?php while($pub = mysqli_fetch_assoc($pub_result)): ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item">
              <img src="./images/<?= $pub['pub_photo'] ?>" class="img-fluid" alt="<?= $pub['pub_photo'] ?>">
              <div class="course-content">
             

                <h3><a href="course-details.html"><?= $pub['pub_title'] ?></a></h3>
                <p class="description"><?= $pub['description'] ?></p>
                <div class="trainer d-flex justify-content-between align-items-center">
                    <p class="mt-2">By: <?= $pub['author'] ?></p>
                    <a href="./documents/<?= $pub['document'] ?>" download class="bi bi-download"></i> Download</a>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
      <?php endwhile; ?>

        

        </div>

      </div>

    </section>
   

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">CERPART</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Full address ofice</p>
            <p> nigeria</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+234902314564</span></p>
            <p><strong>Email:</strong> <span>info@CERPART.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Publications</a></li>
            <li><a href="#">media</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Publications</a></li>
            <li><a href="#">Lectures</a></li>
            <li><a href="#">Readers Hub</a></li>
            <li><a href="#">MEMO</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Centre of Renaissance Pan-African Thought (CERPART)</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>