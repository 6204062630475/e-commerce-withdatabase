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

if (isset($_REQUEST['btn_insert'])) {
    try {
        $name = $_REQUEST['txt_name'];
        $price = $_REQUEST['txt_price'];
        $cate = $_REQUEST['txt_cate'];

        $image_file = $_FILES['txt_file']['name'];
        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];

        $path = "Pj_DB/img/" . $image_file;

        if (empty($name)) {
            $errorMsg = "Please Enter name";
        } else if (empty($image_file)) {
            $errorMsg = "please Select Image";
        } else if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif" || $type == "image/webp") {
            if (!file_exists($path)) {
                if ($size < 5000000) { 
                    move_uploaded_file($temp, 'img/'.$image_file);
                } else {
                    $errorMsg = "Your file too large please upload 5MB size"; 
                }
            } else {
                $errorMsg = "File already exists... Check upload filder";
            }
        } else {
            $errorMsg = "Upload JPG, JPEG, PNG & GIF file formate...";
        }

        if (!isset($errorMsg)) {
            $insert_stmt = $db->prepare('INSERT INTO food(name, Price, Cate_ID, image) VALUES (:fname, :fprice, :fcate, :fimage)');
            $insert_stmt->bindParam(':fname', $name);
            $insert_stmt->bindParam(':fprice', $price);
            $insert_stmt->bindParam(':fcate', $cate);
            $insert_stmt->bindParam(':fimage', $image_file);
            if ($insert_stmt->execute()) {
                $insertMsg = "File Uploaded successfully...";
                header('refresh:2;index_emp.php');
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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Menu Page</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>


<div class="container text-center">
    <h1>Insert Menu</h1>
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

    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <div class="row">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-9">
            <input type="text" name="txt_name" class="form-control" placeholder="Enter name">
        </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
        <label for="name" class="col-sm-3 control-label">File</label>
        <div class="col-sm-9">
            <input type="file" name="txt_file" class="form-control">
        </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
        <label for="name" class="col-sm-3 control-label">Price</label>
        <div class="col-sm-9">
            <input type="text" name="txt_price" class="form-control" placeholder="Enter price">
        </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
        <label for="name" class="col-sm-3 control-label">Category</label>
        <div class="col-sm-9">
            <!-- <input type="text" name="txt_cate" class="form-control" placeholder="Enter Category ID"> -->
            <select name="txt_cate" require>
                <option value="" disabled selected>---Select---</option>
                <option value="1">1 ชุดสุดคุ้ม</option>
                <option value="2">2 เมนูทานเล่น</option>
                <option value="3">3 พิซซ่า</option>
                <option value="4">4 เมนูสลัด</option>
                <option value="5">5 เมนูไก่</option>
                <option value="6">6 เมนูพาสต้า</option>
                <option value="7">7 เมนูสเต็กและเมนูข้าว</option>
                <option value="8">8 เมนูเครื่องดื่มและของหวาน</option>
            </select>
        </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
            <a href="index_emp.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>