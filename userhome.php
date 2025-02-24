<?php
include("dbconnect.php");
session_start();
$uname=$_SESSION['uname'];
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
  <style>
    .allow-location-button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

  </style>
  <script>
window.onload = function() {
  getLocation();
};

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  document.getElementById("latitude").value = position.coords.latitude;
  document.getElementById("longitude").value = position.coords.longitude;
}
</script>
</head>

<body onLoad="getLocation()" id="body"> 
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
    <a href="#">My Products</a>
    <ul>
        <li><a href="productadd.php">Add Product</a></li>
        <li><a href="products.php">Products List</a></li>
        <li><a href="sales.php">Sales</a></li>
    </ul>
</li>
<li>
    <a href="#">Provider Products</a>
    <ul>
        <li><a href="productssearch1.php">Products List</a></li>
        <li><a href="user_status4.php">My Booking</a></li>
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
<form action="" method="post">
<!--     <label for="latitude">Latitude:</label>
 -->    <input type="hidden" id="latitude" name="lat" value="<?php echo isset($_POST['lat']) ? $_POST['lat'] : '';?>" readonly>
    
    <br><br>
    
<!--     <label for="longitude">Longitude:</label>
 -->    <input type="hidden" id="longitude" name="lon" value="<?php echo isset($_POST['lon']) ? $_POST['lon'] : '';?>" readonly>
    
    <br><br>
    
    <input type="submit" name="btn11" value="Allow Location" class="allow-location-button">
</form>

<main id="main">
<!--    <?php echo $lat;?>   
 -->	  
	  <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Vehicle Information</h2>
           <form name="form1" method="post">
		   <div class="row">
		   		<div class="col-md-4">
				 
				</div>
				<div class="col-md-4">
				<input type="text" name="search" class="form-control" placeholder="Agri Vehicle / Location"> 
				</div>
				<div class="col-md-4">
				<input type="submit" name="btn" class="btn" value="Search"> 
				</div>
		   </div>
		   </form>
          </div>

          <?php
extract($_POST);
if(isset($btn)){
?>
<div class="row">
<?php
$q2 = mysqli_query($connect, "
SELECT 
    ar_provider.id AS provider_id, ar_provider.name AS provider_name, ar_provider.address, 
    ar_provider.district, ar_provider.mobile, ar_provider.email, ar_provider.uname AS provider_uname, 
    ar_provider.pass AS provider_pass, ar_provider.create_date AS provider_create_date, 
    ar_provider.status AS provider_status,
    ar_vehicle.id AS vehicle_id, ar_vehicle.vehicle AS vehicle, ar_vehicle.vno AS vno, 
    ar_vehicle.details AS vehicle_details, ar_vehicle.cost1 AS vehicle_cost1, 
    ar_vehicle.cost2 AS vehicle_cost2, ar_vehicle.photo AS vehicle_photo, 
    ar_vehicle.create_date AS vehicle_create_date, ar_vehicle.status AS vehicle_status
FROM ar_provider
JOIN ar_vehicle ON ar_provider.uname = ar_vehicle.uname
WHERE ar_vehicle.vehicle LIKE '%$search%' OR ar_provider.district LIKE '%$search%';
");
$n1=mysqli_num_rows($q2);
if($n1>0){
    $i=1;
    while($r1 = mysqli_fetch_array($q2)){
?>
    <div class="col-lg-4">
        <div class="box wow  fadeInLeft">
            <div class="car-info-box">
                <p>Vehicle Provider: <?php echo $r1['provider_name'];?></p>
                <a href=""><img src="<?php echo $r1['vehicle_photo'];?>" style="height: 180px; width: 280px;" class="img-responsive"  alt="image"></a>
                <ul style=" width: 280px;">
                    <li><i class="fa fa-car" aria-hidden="true"></i><?php echo $r1['vehicle'];?> - <?php echo $r1['vno'];?></li>
                </ul>
                <div class="car-title-m">
                    <p>Specification: <?php echo $r1['vehicle_details'];?></p>
                    <p>Rent Cost per Hour: Rs. <?php echo $r1['vehicle_cost1'];?></p>
                    <p>Rent Cost per Day: Rs. <?php echo $r1['vehicle_cost2'];?></p>
                    <p><a href="book.php?vid=<?php echo $r1['vehicle_id'];?>&pro=<?php echo $r1['provider_uname'];?>">Book Now</a></p>
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
<?php
}
else {
  // Function to calculate distance between two points using Haversine formula
  function distance($lat1, $lon1, $lat2, $lon2) {
      $earth_radius = 6371; 

      $dLat = deg2rad($lat2 - $lat1); 
      $dLon = deg2rad($lon2 - $lon1); 

      $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
      $c = 2 * atan2(sqrt($a), sqrt(1-$a));

      $distance = $earth_radius * $c; 

      return $distance;
  }

  // Get user's latitude and longitude from form submission
  $user_lat = $_POST['lat'];
  $user_lon = $_POST['lon']; 

  ?>
  <div class="row">
  <?php

  $q2 = mysqli_query($connect, "
  SELECT 
      ar_provider.id AS provider_id, ar_provider.name AS provider_name, ar_provider.address, 
      ar_provider.district, ar_provider.mobile, ar_provider.email, ar_provider.uname AS provider_uname, 
      ar_provider.pass AS provider_pass, ar_provider.create_date AS provider_create_date, 
      ar_provider.status AS provider_status, ar_provider.lat AS lat_value, ar_provider.lon AS lon_value,
      ar_vehicle.id AS vehicle_id, ar_vehicle.vehicle AS vehicle, ar_vehicle.vno AS vno, 
      ar_vehicle.details AS vehicle_details, ar_vehicle.cost1 AS vehicle_cost1, 
      ar_vehicle.cost2 AS vehicle_cost2, ar_vehicle.photo AS vehicle_photo, 
      ar_vehicle.create_date AS vehicle_create_date, ar_vehicle.status AS vehicle_status
  FROM ar_provider
  JOIN ar_vehicle ON ar_provider.uname = ar_vehicle.uname
  ");
  $n1=mysqli_num_rows($q2);
  if($n1>0){
      $i=1;
      while($r1 = mysqli_fetch_array($q2)){
          $provider_distance = distance($user_lat, $user_lon, $r1["lat_value"], $r1["lon_value"]);
          if ($provider_distance <= 5) {
              ?>
              <div class="col-lg-4">
                  <div class="box wow fadeInLeft">
                      <div class="car-info-box">
                          <p>Vehicle Provider: <?php echo $r1['provider_name'];?></p>
                          <a href=""><img src="<?php echo $r1['vehicle_photo'];?>" style="height: 180px; width: 280px;" class="img-responsive"  alt="image"></a>
                          <ul style="width: 280px;">
                              <li><i class="fa fa-car" aria-hidden="true"></i><?php echo $r1['vehicle'];?> - <?php echo $r1['vno'];?></li>
                          </ul>
                          <div class="car-title-m">
                              <p>Specification: <?php echo $r1['vehicle_details'];?></p>
                              <p>Rent Cost per Hour: Rs. <?php echo $r1['vehicle_cost1'];?></p>
                              <p>Rent Cost per Day: Rs. <?php echo $r1['vehicle_cost2'];?></p>
                              <p><a href="book.php?vid=<?php echo $r1['vehicle_id'];?>&pro=<?php echo $r1['provider_uname'];?>">Book Now</a></p>
                          </div>
                          <div class="inventory_info_m ">
                              <p></p>
                          </div>
                      </div>
                  </div>
              </div>
              <?php
          }
          $i++;
      }
  }
  else{
      echo "";
  }
}
?>

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
