<?php
include("dbconnect.php");
session_start();
$uname=$_SESSION['uname'];
extract($_REQUEST);
$msg="";
if(isset($register))
{
	 $q1=mysqli_query($connect,"select * from ar_products where status='1' and id='$pid'");
   $row=mysqli_fetch_array($q1);

	 $n1=mysqli_num_rows($q1);
	 if($n1==1)
	 {
	$mq=mysqli_query($connect,"select max(id) from ar_product_booking");
	$mr=mysqli_fetch_array($mq);
	$id=$mr['max(id)']+1;
    $final=$price*$qty;

  
    $ins=mysqli_query($connect,"insert into ar_product_booking(id,uname,farmer,pid,qty,final,req_date,status) values($id,'$uname','$far','$pid','$qty','$final','$req_date','0')");
			if($ins)
			{
		 ?>
	<script language="javascript">
		alert("<?php echo $uname;?>,Your details has Booking!.");
		window.location.href="pay.php?payid=<?php echo $id;?>";
		 </script>
		 <?php
			}
	}
	else
	{
	$msg="Already Exist!";
	}
}
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
     <h1><a href="" id="body" class="scrollto"><span style="font-weight:bold">Agri Vehicle</span>Rental</a></h1> 
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
    <li class="menu-active"><a href="pro_home.php">Home</a></li>
      <li><a href="pro_vehicle.php">Vehicles</a></li>
	  <li><a href="pro_history.php">History</a></li>
    <li>
    <a href="#">Farmer Products</a>
    <ul>
        <li><a href="productssearch.php">Products List</a></li>
        <li><a href="user_status1.php">My Booking</a></li>
    </ul>
</li>
<li>
    <a href="#">My Products</a>
    <ul>
        <li><a href="productadd1.php">Add Product</a></li>
        <li><a href="products1.php">Products List</a></li>
        <li><a href="sales1.php">Sales</a></li>
    </ul>
</li>

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
      <section id="about" class="wow fadeInUp">
        <div class="container"> 
          <div class="row">
            <div class="col-lg-6 about-img">
              <img src="./static/img/nissan.jpg" alt="">
            </div>

            <div class="col-lg-6 content">
              <h4>Booking</h4>
              <?php
                                        $q2 = mysqli_query($connect, "SELECT * FROM ar_user where uname='$far'");
                                       
                                      $r1 = mysqli_fetch_array($q2);
                                            ?>
			  <p>Farmer : <?php echo $r1['name'];?> </p>
			  <p>Address: <?php echo $r1['address'];?>, <?php echo $r1['district'];?></p>
			  <p>Contact: <?php echo $r1['mobile'];?>, <?php echo $r1['email'];?></p>
			 
              <?php
                                        $q2 = mysqli_query($connect, "SELECT * FROM ar_products where id='$pid'");
                                       
                                      $r1 = mysqli_fetch_array($q2);
                                            ?>
			  <form name="form1" method="post">
                <input type="hidden" name="price" value="<?php echo $r1['price'];?>">
                <p>Price: <?php echo $r1['price'];?></p>
			  <div class="row">
			  	<div class="col-md-4">
				Quantity
				</div>
				
				<div class="col-md-3">
				<input type="text" name="qty" class="form-control" placeholder="" required>
				</div>
				
			  <br>
			  <div class="row">
			  	<div class="col-md-4">
				Required Date
				</div>
				
				<div class="col-md-6">
				<input type="date" name="req_date" class="form-control" placeholder="" required>
				</div>
			  </div>
			  <br>
			  <div class="row">
			  	<div class="col-md-4">
				
				</div>
				
				<div class="col-md-6">
				<input type="submit" name="register" class="btn" value="Submit">
				</div>
			  </div>
				
			  
			  </form>
			  
            </div>
          </div>

        </div>
      </section><!-- #about -->
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
