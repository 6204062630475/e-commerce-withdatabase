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

if (isset($_REQUEST['update_id'])) {
    try {
        $id = $_REQUEST['update_id'];
        $select_stmt = $db->prepare('SELECT * FROM food WHERE id = :id');
        $select_stmt->bindParam(":id", $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
    } catch(PDOException $e) {
        $e->getMessage();
    }
}   

if (isset($_REQUEST['btn_update'])) {
    try {

        $name = $_REQUEST['txt_name'];
        $price = $_REQUEST['txt_price'];
        $cate = $_REQUEST['txt_cate'];

        $image_file = $_FILES['txt_file']['name'];
        $type = $_FILES['txt_file']['type'];
        $size = $_FILES['txt_file']['size'];
        $temp = $_FILES['txt_file']['tmp_name'];

        $path = "img/".$image_file;
        $directory = "img/"; 

        if ($image_file) {
            if ($type == "image/jpg" || $type == 'image/jpeg' || $type == "image/png" || $type == "image/gif") {
                if (!file_exists($path)) { 
                    if ($size < 5000000) { 
                        unlink($directory.$row['image']); 
                        move_uploaded_file($temp, 'img/'.$image_file); 
                    } else {
                        $errorMsg = "Your file to large please upload 5MB size";
                    }
                } else {
                    $errorMsg = "File already exists... Check upload folder";
                }
            } else {
                $errorMsg = "Upload JPG, JPEG, PNG & GIF formats...";
            }
        } else {
            $image_file = $row['image']; 
        }

        if (!isset($errorMsg)) {
            $update_stmt = $db->prepare("UPDATE food SET name = :name_up, Price = :price_up, Cate_ID = :cate_up, image = :file_up WHERE id = :id");
            $update_stmt->bindParam(':name_up', $name);
            $update_stmt->bindParam(':id', $id);
            $update_stmt->bindParam(':price_up', $price);
            $update_stmt->bindParam(':cate_up', $cate);
            $update_stmt->bindParam(':file_up', $image_file);
            if ($update_stmt->execute()) {
                $updateMsg = "File update successfully...";
                header("refresh:2;index_emp.php");
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
<title>Edit Menu Page</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>


<div class="container text-center">
    <h1>Edit Menu</h1>
    <?php 
        if(isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong><?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>

    <?php 
        if(isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong><?php echo $updateMsg; ?></strong>
        </div>
    <?php } ?>

    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <div class="row">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-9">
            <input type="text" name="txt_name" class="form-control" value="<?php echo $name; ?>">
        </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
        <label for="name" class="col-sm-3 control-label">File</label>
        <div class="col-sm-9">
            <input type="file" name="txt_file" class="form-control" value="<?php echo $image; ?>">
            <p>
                <img src="img/<?php echo $image; ?>" height="100" width="100" alt="">
            </p>
        </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
        <label for="name" class="col-sm-3 control-label">Price</label>
        <div class="col-sm-9">
            <input type="text" name="txt_price" class="form-control" value="">
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
            <input type="submit" name="btn_update" class="btn btn-primary" value="Update">
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