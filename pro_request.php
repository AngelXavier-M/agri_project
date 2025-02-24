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
    <li class="menu-active"><a href="pro_home.php">Home</a></li>
      <li><a href="pro_vehicle.php">Vehicles</a></li>
	  <li><a href="pro_history.php">History</a></li>

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
            <h2>Rent Request</h2>
	<!-- 		{% if msg=="ok" %}
			<script language="javascript">
			alert("Vehicle Provided.");
			window.location.href="/pro_vehicle";
			</script>
			{% endif %} -->
      <?php
              $q22 = mysqli_query($connect, "SELECT * FROM ar_vehicle where id='$vid'");
              $n22=mysqli_num_rows($q22);
              $r11 = mysqli_fetch_array($q22);
              ?>
           <img src="<?php echo $r11['photo'];?>" style="height: 180px; width: 280px;" class="img-responsive"  alt="image" >
		   <p><?php echo $r11['vehicle'];?> - <?php echo $r11['vno'];?></p>
		   <p>Specification: <?php echo $r11['details'];?></p>
           <p>Rent Cost per Hour: Rs. <?php echo $r11['cost1'];?> </p>
			<p>Rent Cost per Day: Rs. <?php echo $r11['cost2'];?> </p>
          </div>

          <div class="row">
		  		<h3>Vehicle Required by Farmers for Rent</h3>
          <?php
              $q221 = mysqli_query($connect, "SELECT * FROM ar_booking where vid='$vid'");
              $i=1;
              while($r111 = mysqli_fetch_array($q221)){

             ?>
              
             	<div class="col-md-4">
			  <table>
			  
			  <tr class="alert-primary">
			  <td><?php echo $i;?>. Farmer: <?php echo $r111['uname'];?></td>
			  </tr>
			  <tr>
			  <td>Duration: <?php echo $r111['duration'];?>
        <?php
        if($r111['time_type']==1)
        {
          echo "Hours";
        }
        else{
          echo "Hours";
        }
        ?>
			  		
			  </td>
        <tr>

       
        <td>
        Start Time to End Time:(<?php echo $r111['stime'];?>-<?php echo $r111['etime'];?>)

        </td>
      
        

			  </tr>
			  <tr>
          <?php
          $mq=mysqli_query($connect,"select * from ar_user where uname='".$r111['uname']."'");
          $mr=mysqli_fetch_array($mq);
          ?>
			  <td>Address: <?php echo $mr['address'];?>, <?php echo $mr['district'];?></td>
			  </tr>
			  <tr>
			  <td>Contact: <?php echo $mr['mobile'];?>, <?php echo $mr['email'];?></td>
			  </tr>
			  <tr>
			  <td>Request Date: <?php echo $r111['req_date'];?></td>
			  </tr>
			  <tr>
			  <td>
        <?php
        if($r111['status']==1)
        {
          echo "Provided, Pay Amount: Rs. " . $r111['amount'];
        }
        else{
         ?>
			  <a href="pro_request.php?act=ok&bid=<?php echo $r111['id'];?>&vid=<?php echo $r111['vid'];?>">Click to Provide</a>
<?php
        }
        ?>
			
			  </td>
			  </tr>
			  </table>
			  </div>
<?php
$i++;
              }
?>             
			 
        </div>
      </div>
    </section><!-- #services -->
	  
	  <?php
extract($_REQUEST);

if ($act == "ok") {
    mysqli_query($connect, "update ar_booking set status='1' WHERE id='$bid' and vid='$vid'");
    mysqli_query($connect, "update ar_vehicle set status='1' WHERE id='$vid'");
    ?>
    <script language="javascript">
        alert("Provided!");
        window.location.href = "pro_vehicle.php";
    </script>
<?php
}
?>
	  
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
