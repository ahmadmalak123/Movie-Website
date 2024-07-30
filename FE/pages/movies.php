<?php
session_start();
require_once("../../BE/Common/dbconfig.php");
require_once("../../BE/Models/movieModel.php");
require_once("../../BE/Movie.php");
require_once("../Views/movieView.php");
$movies = GetMovies();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Lugx Gaming - Movie Page</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="../assets/css/owl.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  <style>
    .header-area {
      background: transparent;
    }

    .logo img {
      filter: brightness(0) invert(1);
    }

    .img-fluid {
      border-radius: 15px;
      /* Rounded corners */
      box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
      /* Adding shadow */
      max-width: 100%;
    }

    .trending-box {
      margin-bottom: 50px;
    }
    .thumb img {
  height: 300px; /* Fixed height for all images */
  object-fit: cover;
  border-radius: 15px;
  /* Rounded corners */
  box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
  /* Adding shadow */
  max-width: 100%;
}


    .trending-items .down-content span.category,
    .trending-items .down-content a {
      display: none;
    }
  </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="../../index.php" class="logo">
                            <img src="../assets/images/logo.png" alt="" style="width: 158px;">
                        </a>
                        <!-- ***** Logo End ***** -->
                      <?php require_once("common/clientMenu.php");?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Our Movies</h3>
                    <span class="breadcrumb"><a href="#">Home</a> > Our Movies</span>
                </div>
            </div>
        </div>
    </div>

    <div class="section trending">
        <div class="container">
            <div class="row trending-box">
                <?php foreach ($movies as $movie): ?>
                <?php echo generateMovieCard($movie); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/isotope.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/counter.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>
</html>
