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
              <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
              <li class="nav-item"><a href="pizza.php" class="nav-link">Menu</a></li>
              <li class="nav-item"><a href="cart.php" class="nav-link">ตะกร้าสินค้า</a></li>
				<li class="nav-item"><a href="upload.php" class="nav-link">ยืนยันการชำระเงิน</a></li>
	            </ul>
	      </div>
		</div>
	</nav>
  <section class="home-slider owl-carousel img" style="background-image: url(upload/5193138.jpg);">
     
    <div class="slider-item">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            	<img src="upload/โฮม/2.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            	<img src="upload/โฮม/3.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            	<img src="upload/โฮม/4.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            	<img src="upload/โฮม/6.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            	<img src="upload/โฮม/7.jpg" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>000 (123) 456 7890</h3>
	    						<p>A small river named Duden flows</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>198 West 21th Street</h3>
	    						<p>Suite 721 New York NY 10016</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Open Monday-Friday</h3>
	    						<p>8:00am - 9:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="social d-md-flex pl-md-5 p-4 align-items-center">
	    			<ul class="social-icon">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
	    		</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
    	<div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <h2 class="mb-4">Welcome to <span class="flaticon-pizza">Pizza</span> Com Science</h2>
        </div>
        <div>
  				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
  			</div>
    	</div>
    </section>

    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="row">
					
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
						<div class="text">
							<div class="icon"><span class="flaticon-pizza-1"><a href="valueset.php" class="nav-link"></a></span></div>
							<span><a href="pizza.php" class="nav-link">Value Set</a></span>
						</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
						<div class="text">
							<div class="icon"><span class="flaticon-pizza-1"><a href="pizza.php" class="nav-link"></a></span></div>
							<span><a href="pizza.php" class="nav-link">Pizza</a></span>
						</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
						<div class="text">
							<div class="icon"><span class="flaticon-pizza-1"><a href="appetizers.php" class="nav-link"></a></span></div>
							<span><a href="pizza.php" class="nav-link">Appetizers</a></span>
						</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
						<div class="text">
							<div class="icon"><span class="flaticon-pizza-1"><a href="chicken.php" class="nav-link"></a></span></div>
							<span><a href="pizza.php" class="nav-link">Chicken</a></span>
						</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
						<div class="text">
							<div class="icon"><span class="flaticon-pizza-1"><a href="salad.php" class="nav-link"></a></span></div>
							<span><a href="pizza.php" class="nav-link">Salad</a></span>
						</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
						<div class="text">
							<div class="icon"><span class="flaticon-pizza-1"><a href="pasta.php" class="nav-link"></a></span></div>
							<span><a href="pizza.php" class="nav-link">Pasta</a></span>
						</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
						<div class="text">
							<div class="icon"><span class="flaticon-pizza-1"><a href="steakrice.php" class="nav-link"></a></span></div>
							<span><a href="pizza.php" class="nav-link">Steak&Rice</a></span>
						</div>
						</div>
					</div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
						<div class="text">
							<div class="icon"><span class="flaticon-pizza-1"><a href="drinkdessert.php" class="nav-link"></a></span></div>
							<span><a href="pizza.php" class="nav-link">Drinks&Desserts</a></span>
						</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
    </section>

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