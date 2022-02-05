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

    $select_stmt = $db->prepare('SELECT * FROM customer WHERE Cus_ID = :id');
    $select_stmt->bindParam(':id', $id);
    $select_stmt->execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    unlink("img/".$row['image']); 

    
    $delete_stmt = $db->prepare('DELETE FROM customer WHERE Cus_ID = :id');
    $delete_stmt->bindParam(':id', $id);
    $delete_stmt->execute();

    header("Location: customer.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu Page</title>

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

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 --></head>
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
              <a class="nav-link" href="cate.php">
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
              <a class="nav-link active" href="customer.php">
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


    <table class="table tm-table-small tm-product-table">
        <thead>
            <tr>
                <td>Customer ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Delete</td>
            </tr>
        </thead>

        <tbody>
            <?php 
                $select_stmt = $db->prepare('SELECT * FROM customer'); 
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row['Cus_ID']; ?></td>                           
                    <td><?php echo $row['Cus_name']; ?></td>
                    <td><?php echo $row['Cus_email']; ?></td>        
                    <td><?php echo $row['Cus_phone']; ?></td> 
                    <td><?php echo $row['Cus_address']; ?></td>                                   
                    <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>                        
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>