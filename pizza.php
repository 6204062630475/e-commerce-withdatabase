<?php
    session_start();

    if(!isset($_SESSION['Cus_email'])) {
        $_SESSION['msg']="You must log in first";
        header('location: login.php');
    }

    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['Cus_email']);
        header('location: login.php');
    }
?>
<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pizza Com Science | Home Page</title>

    <link rel="stylesheet" href="style.css"> -->
    <title>The Pizza Com Science | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css3?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css3?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css3?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css3/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css3/animate.css">
    
    <link rel="stylesheet" href="css3/owl.carousel.min.css">
    <link rel="stylesheet" href="css3/owl.theme.default.min.css">
    <link rel="stylesheet" href="css3/magnific-popup.css">

    <link rel="stylesheet" href="css3/aos.css">

    <link rel="stylesheet" href="css3/ionicons.min.css">

    <link rel="stylesheet" href="css3/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css3/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css3/flaticon.css">
    <link rel="stylesheet" href="css3/icomoon.css">
    <link rel="stylesheet" href="css3/style.css">
</head>

<body>
    <!-- <div class="header">
    <h2>HELLO THE PIZZA COM SCIENCE | HOME PAGE</h2>
    </div> -->

    <div class="content">
        <!-- notification massage -->
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>

                </h3>
            </div>
        <?php endif ?>  

        <!-- logged in user information -->
        <?php if (isset($_SESSION['Cus_email'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['Cus_email']; ?></strong></p>
            <p><a href="index.php?logout='1'" style="color: orange">Logout</a></p>
        <?php endif ?>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		    <a class="navbar-brand" href="index.php"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicous</small></a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		    </button>
	        <div class="collapse navbar-collapse" id="ftco-nav">
	            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="pizza.php" class="nav-link">Menu</a></li>
				<li class="nav-item"><a href="cart.php" class="nav-link">ตะกร้าสินค้า</a></li>
				<li class="nav-item"><a href="upload.php" class="nav-link">ยืนยันการชำระเงิน</a></li>
	            </ul>
	      </div>
		</div>
	</nav>
    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">
      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	
		<div class="tab-content ftco-animate" id="v-pills-tabContent">
			<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
			<table width="600" border="1" align="center" bordercolor="#666666">
  <tr>
    <td width="91" align="center" bgcolor="#CCCCCC"><strong>ภาพ</strong></td>
    <td width="200" align="center" bgcolor="#CCCCCC"><strong>Product</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong>รายละเอียดสินค้า</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("connect2.php");
  $sql = "select * from food order by id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
	echo "<td align='center'><img src='img/" . $row["image"] ." ' width='80'></td>";
	echo "<td align='left'>" . $row["name"] . "</td>";
    echo "<td align='center'>" .number_format($row["Price"],2). "</td>";
    echo "<td align='center'><a href='product_detail.php?id=$row[id]'>คลิก</a></td>";
	echo "</tr>";
  }
  ?>
</table>
			</div>
	    </div>
    </section>

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js2/jquery.min.js"></script>
<script src="js2/jquery-migrate-3.0.1.min.js"></script>
<script src="js2/popper.min.js"></script>
<script src="js2/bootstrap.min.js"></script>
<script src="js2/jquery.easing.1.3.js"></script>
<script src="js2/jquery.waypoints.min.js"></script>
<script src="js2/jquery.stellar.min.js"></script>
<script src="js2/owl.carousel.min.js"></script>
<script src="js2/jquery.magnific-popup.min.js"></script>
<script src="js2/aos.js"></script>
<script src="js2/jquery.animateNumber.min.js"></script>
<script src="js2/bootstrap-datepicker.js"></script>
<script src="js2/jquery.timepicker.min.js"></script>
<script src="js2/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js2?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js2/google-map.js"></script>
<script src="js2/main.js"></script>
</body>
</html> 