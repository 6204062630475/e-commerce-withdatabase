<?php 
    session_start();
    include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pizza Com Science | Login</title>

    <link rel="stylesheet" href="style.css"> -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>The Pizza Com Science | Login</title>
</head>

<body>
  

    <div class="half">
        <div class="bg order-1 order-md-2" style="background-image: url('images/5193138.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="form-block">
                            <div class="text-center mb-5">
                                <h3>Login</h3>
                            <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                            </div>
                            <form action="login_db.php" method="post">
                                <?php include('errors.php'); ?>
                                <?php if(isset($_SESSION['error'])) : ?>
                                    <div class="error">
                                        <h3>
                                            <?php 
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            ?>

                                        </h3>
                                    </div>
                                <?php endif ?>  
                                <div class="form-group first">
                                    <label for="Cus_email">Email <span style="color:red;">*</span></label>
                                    <input type="email" class="form-control" name="Cus_email">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="Cus_password">Password <span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" name="Cus_password">
                                </div>
                                
                                <div class="d-sm-flex mb-5 align-items-center">
                                    <!-- <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked"/>
                                        <div class="control__indicator"></div>
                                    </label> -->
                                    <!-- <p>Not yet a member? <a href="register.php">Sign up</a></p> -->
                                    <span class="ml-auto"><p>Not yet a member? <a href="register.php" class="forgot-pass">Sign up</a></p></span> 
                                </div>

                                <!-- <input type="submit" name="Cus_login" value="Log In" class="btn btn-block btn-primary"> -->
                                <!-- <button type="submit" name="Cus_login" class="btn btn-block btn-primary">Login<a href="index.php"></a></button> -->
                                <div class="d-sm-flex mb-5 align-items-center">
                                    <button type="submit" name="Cus_login" class="btn btn-block btn-primary">Login<a href="index.php"></a></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>