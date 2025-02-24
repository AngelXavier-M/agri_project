<?php
include("dbconnect.php");
session_start();
$uname=$_SESSION['uname'];
extract($_REQUEST);
                                            
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Vehicle Rental</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="./static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="./static/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="./static/lib/animate/animate.min.css" rel="stylesheet">
  <link href="./static/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="./static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="./static/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="./static/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="./static/css/style.css" rel="stylesheet"> 
</head>

<body id="body"> 
 <header id="header">
  <div class="container">

    <div id="logo" class="pull-left">
     <h1><a href="" id="body" class="scrollto"><span style="font-weight:bold">Agri Vehicle</span> Rental</a></h1> 
     <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
   </div>
   <div class="pull-left ml-4">
    <!-- SEARCH FORM -->
   <!-- <form class="form-inline "  action="search.php" method="post">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="text"  name="searchdata" placeholder="Search Vehicle" aria-label="Search" required="true">
        <div class="input-group-append">
          <button class="btn btn-navbar" style="background-color: #49a3ff;" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->
  </div>


  <nav id="nav-menu-container">
    <ul class="nav-menu">
    <li class="menu-active"><a href="admin.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>
         
    </ul>
  </nav><!-- #nav-menu-container -->
</div>
  </header><!-- #header -->
 <section id="innerBanner"> 
  <div class="inner-content">
    <h2><span>Vehicle Provider</span><br>We provide high quality vehicles</h2>
    <div> 
    </div>
  </div> 
</section><!-- #Page Banner -->

<main id="main">
      
	  
<section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Vehicle Information</h2>
           
          </div>

          <div class="row">
          <?php
                                        $q2 = mysqli_query($connect, "SELECT * FROM ar_vehicle where uname='$uname'");
                                        $n1=mysqli_num_rows($q2);
                                        if($n1>0){
                                          $i=1;
                                        while($r1 = mysqli_fetch_array($q2)){
                                            ?>
           		
              <div class="col-lg-4">
                <div class="box wow  fadeInLeft">
                  <div class="car-info-box">
                    <a href="<?php echo $r1['photo'];?>" target="_blank"><img src="<?php echo $r1['photo'];?>" style="height: 180px; width: 280px;" class="img-responsive"  alt="image" >
                    </a>
                    <ul style=" width: 280px;">
                      <li><i class="fa fa-car" aria-hidden="true"></i><?php echo $r1['vehicle'];?> - <?php echo $r1['vno'];?></li>
                      
                    </ul>
                    <div class="car-title-m">
					<p>Specification: <?php echo $r1['details'];?></p>
                      <p>Rent Cost per Hour: Rs. <?php echo $r1['cost1'];?> </p>
					  <p>Rent Cost per Day: Rs. <?php echo $r1['cost2'];?> </p>
					   <p>
             <?php
             
        if($r1['status']==1){
          echo "Given to Rent";

        }
        else{
          echo "Vehicle Available";
        }
        ?>
        </p>
					
					  </p>
					  <p>
              <?php
              $q22 = mysqli_query($connect, "SELECT * FROM ar_booking where provider='$uname'");
              $n22=mysqli_num_rows($q22);
              $r11 = mysqli_fetch_array($q22);
                  if($r11['status']==0){
                    ?>
                    	<a href="pro_request.php?vid=<?php echo $r11['vid'];?>">Rent Request <?php echo $n22;?></a>
                      <?php

                  }
                  else{
                    ?>
					  <a href="pro_request.php?vid=<?php echo $r11['vid'];?>">Rent Request</a>
<?php
                  }
                  ?>

					  </p>
					  
                    </div>
                    <div class="inventory_info_m ">
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php
        $i++;
                                        }
                                      }
                                      else{
                                        echo "";
                                      }
                                        ?>             
			 
        </div>
      </div>
    </section><!-- #services -->
	  
	  
	  
	  
    </main>
    <footer id="footer">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>Agriculture Vehicle Booking System</strong>.
    </div>
  </div>
</footer>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript  -->
    <script src="./static/lib/jquery/jquery.min.js"></script>
    <script src="./static/lib/jquery/jquery-migrate.min.js"></script>
    <script src="./static/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./static/lib/easing/easing.min.js"></script>
    <script src="./static/lib/superfish/hoverIntent.js"></script>
    <script src="./static/lib/superfish/superfish.min.js"></script>
    <script src="./static/lib/wow/wow.min.js"></script>
    <script src="./static/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./static/lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="./static/lib/sticky/sticky.js"></script> 
    <script src="./static/contact/jqBootstrapValidation.js"></script>
    <script src="./static/contact/contact_me.js"></script>
    <script src="./static/js/main.js"></script>

  </body>
  </html>
