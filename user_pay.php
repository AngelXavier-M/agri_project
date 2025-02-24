<?php
include("dbconnect.php");
session_start();
$uname=$_SESSION['uname'];
extract($_REQUEST);
if (isset($_POST['btn11'])) {
  $card = mysqli_real_escape_string($connect, $_POST['card']);
  $bid = mysqli_real_escape_string($connect, $_POST['bid']);
  $vid = mysqli_real_escape_string($connect, $_POST['vid']);

  $ins = mysqli_query($connect, "UPDATE ar_booking SET status='2' WHERE id='$bid' AND vid='$vid'");
  if ($ins) {
    mysqli_query($connect, "UPDATE ar_vehicle SET status='0' WHERE id='$vid'");
      ?>
      <script language="javascript">
          alert("<?php echo $uname; ?>, Money Paid and vehicle returned!");
          window.location.href = "user_status.php";
      </script>
      <?php
  } else {
      $msg = "Payment Failed!";
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

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <link href="./static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="./static/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="./static/lib/animate/animate.min.css" rel="stylesheet">
  <link href="./static/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="./static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="./static/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="./static/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <link href="./static/css/style.css" rel="stylesheet"> 
  <style>
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .image-container a {
            margin: 0 10px; /* Add some space between the images */
        }
        .image-container img {
            width: 220px; /* Adjust size as needed */
            height: 150px; /* Ensure images are the same size */
            object-fit: cover; /* Ensure images cover the specified size */
        }
    </style>
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
    <li class="menu-active"><a href="userhome.php">Home</a></li>
    
    <li><a href="user_status.php">Status</a></li>
    <li>
    <a href="#">Products</a>
    <ul>
        <li><a href="productadd.php">Add Product</a></li>
        <li><a href="products.php">Products List</a></li>
        <li><a href="sales.php">Sales</a></li>
    </ul>
</li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav><!-- #nav-menu-container -->
</div>
  </header><!-- #header -->
 <section id="innerBanner"> 
  <div class="inner-content">
    <h2><span>Farmer: <?php echo $uname;?> </span><br>We provide high quality vehicles</h2>
    <div> 
    </div>
  </div> 
</section><!-- #Page Banner -->

<main id="main">
      
	  
	  <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Payment</h2>
			<!-- {% if msg=="ok" %}
			<script language="javascript">
			alert("Paid & Returned Success");
			window.location.href="/user_status";
			</script>
			{% endif %} -->
      <div class="image-container">
        <a href="user_pay.php?act=cash&bid=<?php echo $bid;?>&vid=<?php echo $vid;?>"><img src="payimage/cashonly.jpg" alt="Cash Only"></a>
        <a href="user_pay1.php?bid=<?php echo $bid;?>&vid=<?php echo $vid;?>"><img src="payimage/onlineonly.jpg" alt="Online Only"></a>
    </div>
    <?php
    if($act=="cash")
{
?>
<form name="form1" method="post">
		   <div class="row">
		   		<div class="col-md-4">
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
          <?php
        $q2 = mysqli_query($connect, "SELECT * FROM ar_booking where id='$bid' and vid='$vid'");
                                       
                                       $r1 = mysqli_fetch_array($q2);
                                            ?>
				Amount: Rs.  <?php echo $r1['amount'];?>
				</div>
			</div>
      <input type="hidden" name="bid" value="<?php echo $bid; ?>">
            <input type="hidden" name="vid" value="<?php echo $vid; ?>">
			<br>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-2">
				</div>
				<div class="col-md-4">
				<input type="submit" name="btn11" class="btn" value="Payment"> 
				</div>
		   </div>
		   </form>

<?php
}
	?>

<?php
    if($act=="online")
{
?>
<form name="form1" msethod="post">
		   <div class="row">
		   		<div class="col-md-4">
				</div>
				<div class="col-md-4">
          <br>
          <br>
				<input type="text" name="card" maxlength="12" class="form-control" placeholder="Card No." required> 
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
          <?php
        $q2 = mysqli_query($connect, "SELECT * FROM ar_booking where id='$bid' and vid='$vid'");
                                       
                                       $r1 = mysqli_fetch_array($q2);
                                            ?>
				Amount: Rs.  <?php echo $r1['amount'];?>
				</div>
			</div>
      <input type="hidden" name="bid" value="<?php echo $bid; ?>">
            <input type="hidden" name="vid" value="<?php echo $vid; ?>">
			<br>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-2">
				</div>
				<div class="col-md-4">
				<input type="submit" name="btn11" class="btn" value="Payment"> 
				</div>
		   </div>
		   </form>

<?php
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
