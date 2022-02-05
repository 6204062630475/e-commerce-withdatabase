<?php
    session_start();

    if(!isset($_SESSION['Emp_email'])) {
        $_SESSION['msg']="You must log in first";
        header('location: login_emp.php');
    }

    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['Emp_email']);
        header('location: login_emp.php');
    }
?>
<?php include('server.php'); ?>
<?php 

require_once('connection.php');


if (isset($_REQUEST['btn_insert'])) {
    try {
        $name = $_REQUEST['txt_name'];
        
        if (empty($name)) {
            $errorMsg = "Please Enter name";
        }

        if (!isset($errorMsg)) {
            $insert_stmt = $db->prepare('INSERT INTO category(Cate_name) VALUES (:fcate)');
            
            $insert_stmt->bindParam(':fcate', $name);

            if ($insert_stmt->execute()) {
                $insertMsg = "File Uploaded successfully...";
                header('refresh:2;cate.php');
            }
        }

    } catch(PDOException $e) {
        $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Category</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css4?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css4/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css4" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css4/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css4/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>
<body>


<div class="container text-center">
    <!-- <h1>Insert Menu</h1> -->
    <nav class="navbar navbar-expand-xl">
      <div class="container h-100">
        <a class="navbar-brand" href="index.html">
          <h1 class="tm-site-title mb-0">Admin</h1>
        </a>
        <button
          class="navbar-toggler ml-auto mr-0"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <!-- <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="fas fa-tachometer-alt"></i> Status
                <span class="sr-only">(current)</span>
              </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active" href="cate.php">
                <i class="far fa-file-alt"></i> Category
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index_emp.php">
                <i class="fas fa-shopping-cart"></i> Food
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listOrder.php">
                <i class="fas fa-shopping-cart"></i> Order
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="customer.php">
                <i class="fas fa-shopping-cart"></i> Customer
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminslip.php">
                <i class="fas fa-shopping-cart"></i> Slip
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php 
        if(isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong><?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>

    <?php 
        if(isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong><?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Category</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <!-- <form action="" class="tm-edit-product-form"> -->
                <form action="" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                        <label
                        for="name"
                        >Category Name
                        </label>
                        <input
                        id="name"
                        name="txt_name"
                        type="text"
                        class="form-control validate"
                        placeholder="Enter Category name"
                        required
                        />
                        
                    </div>
              
                    <div class="col-12">
                        <!-- <button type="submit" name="btn_insert" class="btn btn-primary btn-block text-uppercase">Add Category Now</button>
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Cancel</button> -->
                        <input type="submit" name="btn_insert" class="btn btn-primary btn-block text-uppercase" value="Add Category Now">
                        
                        <a href="cate.php" class="btn btn-primary btn-block text-uppercase">Cancel</a>
                    </div>
                   
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>                

</form>
</div>

    <script src="js3/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js3/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
</body>
</html>