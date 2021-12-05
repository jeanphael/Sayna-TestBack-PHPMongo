<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>GetCoachings Telechargement</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url(); ?>/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Flatty
    Template URL: https://templatemag.com/flatty-bootstrap-app-landing-page-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <img src="<?php echo base_url('assets/img/logo.png'); ?>" width="50" height="50" style="float:left;padding:5%" />
        <a class="navbar-brand" href="#"><b>GET COACHING</b></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('index.php/user/signin'); ?>" class="smoothscroll">S'inscrire</a></li>
        </ul>
        
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>

  <div id="headerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
		 <p><?php echo $message; ?></p>
          <h1 style="color:rgb(84, 114, 174)">Bienvenue sur GetCoaching ! <br/>
					</h1>
         <div class="col-lg-6">
          <form class="form" role="form" action="<?php echo base_url('index.php/download/file'); ?>" method="POST">
            <div class="form-group">
              <input type="email" autocomplete="off" class="form-control" id="exampleInputEmail1" placeholder="Entrer votre adresse email"  name="email" required>
			 <br/>  <input type="password" class="form-control" id="exampleInput" placeholder="Entrer votre mot de passe" name="password" required>
            </div>
			<div class="form-group">
			 <button type="submit" class="form-control btn btn-lg " style="background-color:rgb(84, 114, 174);color:rgb(245, 245, 220);height:100%">T&eacute;l&eacute;charger l'application</button>
			 </div>
			  <p class="text-center"><a href="<?php echo base_url('index.php/user/signin'); ?>" class="smoothscroll" style="margin-top:5%;font-style:underline">S'inscrire</a> </p>
           
          </form>
		   </div>
        </div>
        <!-- /col-lg-6 -->
        <div class="col-lg-6">
          <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/ipad-hand.png" alt="">
        </div>
        <!-- /col-lg-6 -->

      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /headerwrap -->


  <div class="container">
   
    <!-- /row -->

    <div class="row mt centered">
      <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/bootcamp.png" width="180" height="100" alt="">
        <h4>Bootcamp</h4>
      </div>
      <!--/col-lg-4 -->

      <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/boxes.png" width="180" height="100" alt="">
        <h4>Boxes</h4>
      </div>
      <!--/col-lg-4 -->

      <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/boxes-fitness.png" width="180"  height="100" alt="">
        <h4>Boxes fitness</h4>
      </div>
	  <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/circuit-training.png" width="180"  height="100" alt="">
        <h4>Circuit training</h4>
       </div>
	  <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/coaching-hiit.png" width="180" height="100"  alt="">
        <h4>Coaching Hit</h4>
      </div>
	  <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/course-a-pied.png" width="180"  height="100" alt="">
        <h4>Course &agrave; pied</h4>
      </div>
	 </div>
     <div class="row mt centered">
	   <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/cross-fit.png" width="180"  height="100" alt="">
        <h4>Crossfit</h4>
      </div>
	   <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/cross-trainer.png" width="180"  height="100" alt="">
        <h4>Cross Trainer</h4>
    
      </div>
	   <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/jogging.png" width="180"  height="100" alt="">
        <h4>Jogging</h4>
     
      </div>
	   <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/marche-a-pied.png" width="180"  height="100" alt="">
        <h4>Marche &agrave; pied</h4>
   
      </div>
	   <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/marche-athletique.png" width="180" height="100"  alt="">
        <h4>Marche athl&eacute;tique</h4>
      </div><!--/col-lg-4 -->
	  <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/marche-nordique.png" width="180"  height="100" alt="">
        <h4>Marche nordique</h4>
      
      </div><!--/col-lg-4 -->
	    </div>
		<div class="row mt centered">
	  <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/musculation.png" width="180" height="100"  alt="">
        <h4>Musculation</h4>
      
      </div><!--/col-lg-4 -->
	    <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/musculation-poids-de-corps.png"  height="100" width="180" alt="">
        <h4>Musculation poids de corps</h4>
     
      </div><!--/col-lg-4 -->
	    <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/pilate.png" width="180" height="100"  alt="">
        <h4>Pilate</h4>
     
      </div><!--/col-lg-4 -->
	    <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/steps.png" width="180"  height="100" alt="">
        <h4>Steps</h4>
     
      </div><!--/col-lg-4 -->
	  <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/streching.png" width="180"  height="100" alt="">
        <h4>Streching</h4>
     
      </div><!--/col-lg-4 -->
	  <div class="col-lg-2">
        <img src="<?php echo base_url(); ?>/assets/img/yoga.png" width="180"  height="100" alt="">
        <h4>Yoga</h4>
         </div>
      </div><!--/col-lg-4 -->
	  
    </div>
	
    <!-- /row -->
  </div>
  <!-- /container -->

  <div class="container">
    <div class="row mt centered">
      <div class="col-lg-6 col-lg-offset-3">
        <h1>Prenez un rendez-vous avec nos coach</h1>
        <h3></h3>
      </div>
    </div>
    <!-- /row -->

    <div class="row mt centered">
      <div class="col-lg-6 col-lg-offset-3">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			 <li data-target="#carousel-example-generic" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img style="margin-left:30%;margin-right:30%" src="<?php echo base_url(); ?>/assets/img/1.JPEG" width="200" height="400">
            </div>
            <div class="item">
              <img style="margin-left:30%;margin-right:30%" src="<?php echo base_url(); ?>/assets/img/2.JPEG" alt="" width="200" height="400">
            </div>
            <div class="item">
              <img style="margin-left:30%;margin-right:30%" src="<?php echo base_url(); ?>/assets/img/3.JPEG" alt="" width="200" height="400">
            </div>
			 <div class="item">
              <img style="margin-left:30%;margin-right:30%" src="<?php echo base_url(); ?>/assets/img/4.JPEG" alt="" width="200" height="400">
            </div>
          </div>
        </div>
      </div>
      <!-- /col-lg-8 -->
    </div>
    <!-- /row -->
  </div>

 

 
  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>GetCoaching</strong>. All Rights Reserved
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/flatty-bootstrap-app-landing-page-template/
          Licensing information: https://templatemag.com/license/
        -->
       </div>
    </div>
  </div>
  <!-- / copyrights -->

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url(); ?>/assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/lib/php-mail-form/validate.js"></script>
  <script src="<?php echo base_url(); ?>/assets/lib/easing/easing.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
