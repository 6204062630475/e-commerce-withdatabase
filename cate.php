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
<?php 

require_once('connection.php');

if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select_stmt = $db->prepare('SELECT * FROM category WHERE id = :id');
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    unlink("upload/".$row['image']); 

    
    $delete_stmt = $db->prepare('DELETE FROM category WHERE Cate_ID = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header("Location: cate.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Categories</title>
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
        <?php if (isset($_SESSION['Cus_email'])) : ?>
            
            <p><a href="index_emp.php?logout='1'" style="color: orange">Logout</a></p>
        <?php endif ?>
</div> 

<div class="container text-center">
    <!-- <h1>Menu Page</h1> -->
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
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="login_emp.php">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- <a href="add.php" class="btn btn-success">Add Menu</a>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <td>Name</td>
                <td>Image</td>
                <td>Price</td>
                <td>Category</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>

        <tbody>
            <?php 
                $select_stmt = $db->prepare('SELECT * FROM category'); 
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>                        
                    <td><img src="upload/<?php echo $row['image']; ?>" width="100px" height="100px" alt=""></td>    
                    <td><?php echo $row['Price']; ?></td>
                    <td><?php echo $row['Cate_ID']; ?></td>                     
                    <td><a href="edit.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>                        
                    <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>                        
                </tr>
            <?php } ?>
        </tbody>
    </table> -->
    <div class="container mt-5">
      <div class="row tm-content-row">
        
        <!-- <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col"> -->
          <!-- <div class="tm-bg-primary-dark tm-block tm-block-product-categories"> -->
            <h2 class="tm-block-title">Product Categories</h2>
            <a href="add_cate.php" class="btn btn-primary btn-block text-uppercase mb-3">Add Category</a>
            <!-- <div class="tm-product-table-container"> -->
              <table class="table tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <!-- <td>Price</td>
                    <td>Category</td> -->
                    <td>Edit</td>
                    <td>Delete</td>
                  </tr>
                </thead>

                <tbody>
                    <?php 
                        $select_stmt = $db->prepare('SELECT * FROM category'); 
                        $select_stmt->execute();

                        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        
                        <td class="tm-product-name"><?php echo $row['Cate_ID']; ?></td>
                        <td class="tm-product-name"><?php echo $row['Cate_name']; ?></td> 

                        <td><a href="edit_cate.php?update_id=<?php echo $row['Cate_ID']; ?>" class="btn btn-warning">Edit</a></td>                        
                        <!-- <td>
                            <a href="?delete_id=<?php echo $row['Cate_ID']; ?>" class="tm-product-delete-link">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>
                        </td> -->
                        <td><a href="?delete_id=<?php echo $row['Cate_ID']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php } ?>
                   
                </tbody>
              </table>
            <!-- </div> -->
            <!-- table container -->
            
            
            <!-- <button class="btn btn-primary btn-block text-uppercase mb-3">
              Add new category
            </button> -->
          <!-- </div> -->
        <!-- </div> -->
      </div>
    </div>
</div>

<script src="js3/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js3/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script></body>
</html>