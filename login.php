<?php
  session_start();
  require_once "pdo.php";
  $salt = "new_ton56*";
  if(isset($_POST['uname'])&&isset($_POST['pass']))
  {
    $check = hash('md5', $salt.$_POST['pass']);
    $query=$pdo->prepare("SELECT *,COUNT(*) FROM users WHERE uname = :uname AND pass = :upass");
    $query->execute(array(":uname"=>$_POST['uname'],":upass"=>$check));
    $user_data=$query->fetch(PDO::FETCH_ASSOC);
    if($user_data['COUNT(*)']!=0)
    {
      if($user_data['uname']==$_POST['uname'] && $user_data['pass']==$check)
      {
        $_SESSION['user']=$user_data['uname'];
        if(isset($_SESSION['user']))
        {
          header('Location: admin.php');
        }
      }
    }
    else {
      die("Wrong Credentials");
      //header("location:login.php");
    }
  }


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Title, icon, description and keywords -->
  <title>TEDxMedi-Caps University</title>
  <link rel="shortcut icon" href="res/images/favicon.ico">
  <meta name="description" content="TEDxMU, x = independently organised TED event. Changing Era. This February, at Medi-Caps University.">
  <meta name="keywords" content="TEDx, MU, Medi-Caps University,Medicaps, Indore, event, talks">

  <!-- Social media tags -->
  <!-- Browser themes -->
  <meta name="theme-color" content="#000">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="res/css/bootstrap.min.css">

  <!-- Font Icons -->
  <link rel="stylesheet" href="res/css/font-awesome.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="res/css/flickity.min.css">
  <link rel="stylesheet" href="res/css/magnific-popup.css">

  <!-- Main styles -->
  <link rel="stylesheet" href="res/css/main.css">
  <link rel="stylesheet" href="res/css/style.css">

  <!-- Color skin -->
  <link rel="stylesheet" href="res/css/color_red.css">
  <!--About Part css start-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <link rel="stylesheet" type="text/css" href="res/css/stylesheet.css">
  <!--About part css end-->
  <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 8]>
  <script src="res/js/modernizr.min.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script>
      new WOW().init();
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
</head>

<body id="page-top">
  <form method="post" >
    <div class="col-xs-6 col-xs-offset-6">Username:</div><input type="text" name="uname" class="col-xs-9 col-xs-offset-1" required>
    <div class="col-xs-6 col-xs-offset-6">Password:</div><input type="Password" name="pass" class="col-xs-9 col-xs-offset-1" required>

    <input type="submit" class="col-xs-9 col-xs-offset-1">
  </form>



  <!-- Footer Start -->
  <footer class="footer bg-white">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="footer-logo xs-text-center">
            <img src="res/images/logos/TedXMU_light.png" style="width:200; hieght:200" alt="">
          </div>
          <!-- //.footer-logo -->
          <p class="disclaimer xs-text-center">
            This independent TEDx event is operated under license from TED.
          </p>
          <!-- //.disclaimer -->
        </div>
        <!-- //.col-sm-4 -->

        <div class="col-sm-8">
          <div class="footer-social text-right">
            <ul class="list-inline list-unstyled no-margin xs-text-center xs-title-small title-medium">
              <li><a href="https://www.facebook.com/TEDxMedicaps"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://instagram.com/tedxmedicapsuniversity"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://www.ted.com/tedx/events/29582"><i class="fa fa-external-link"></i></li>
            </ul>
            <p class="disclaimer xs-text-center">
              Website By:<br>Anurag Phadnis<br>Pratik Purohit<br>Aman Shah<br>
            </p>
          </div>
          <!-- //.footer-social -->
        </div>
        <!-- //.col-sm-8 -->
      </div>
      <!-- //.row -->
    </div>
    <!-- //.container -->
  </footer>
  <!-- //Footer End -->

  <!-- Scroll to top -->
  <a href="#page-top" class="page-scroll scroll-to-top"><i class="fa fa-angle-up"></i></a>


  <!-- jQuery -->
  <script src="res/js/jquery.min.js"></script>

  <!-- Bootstrap -->
  <script src="res/js/bootstrap.min.js"></script>

  <!-- Plugins -->
  <script src="res/js/pace.min.js"></script>
  <script src="res/js/debouncer.min.js"></script>
  <script src="res/js/jquery.easing.min.js"></script>
  <script src="res/js/jquery.inview.min.js"></script>
  <script src="res/js/jquery.matchHeight.js"></script>
  <script src="res/js/isotope.pkgd.min.js"></script>
  <script src="res/js/imagesloaded.pkgd.min.js"></script>
  <script src="res/js/flickity.pkgd.min.js"></script>
  <script src="res/js/jquery.magnific-popup.min.js"></script>
  <script src="res/js/jquery.validate.min.js"></script>

  <!-- BG slideshow -->
  <script src="res/js/jquery.flexslider.min.js"></script>

  <!-- BG Parallax JS -->
  <script src="res/js/TweenMax.min.js"></script>
  <script src="res/js/ScrollMagic.min.js"></script>
  <script src="res/js/animation.gsap.min.js"></script>

  <!-- Theme -->
  <script src="res/js/main.js"></script>

  <!-- Countdown -->
  <script src="res/js/jquery.countdown.min.js"></script>
  <script src="res/js/countdown.js"></script>
</body>

</html>
