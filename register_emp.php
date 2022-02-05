<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pizza Com Science | Register Employee</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Register Employee</h2>
    </div>
    <form action="register_emp_db.php" method="post">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label for="Emp_name">Name <span style="color:red;">*</span></label>
            <input type="text" name="Emp_name" require>
        </div>
        <div class="input-group">
            <label for="Emp_email">Email <span style="color:red;">*</span></label>
            <input type="email" name="Emp_email" require>
        </div>
        <div class="input-group">
            <label for="Emp_password">Password <span style="color:red;">*</span></label>
            <input type="password" name="Emp_password" require>
        </div>
        <!-- <div class="input-group">
            <label for="Cus_password2">Confirm Password <span style="color:red;">*</span></label>
            <input type="password" name="Cus_password2" require>
        </div> -->
        <div class="input-group">
            <label for="Emp_phone">Phone Number <span style="color:red;">*</span></label>
            <input type="tel" name="Emp_phone" require>
        </div>
        <div class="input-group">
            <label for="Emp_sex">Gender <span style="color:red;">*</span></label>
            <select name="Emp_sex" require>
                <option value="">---Select---</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Not specified">Not specified</option>
            </select>
        </div>
        <div class="input-group">
            <label for="Emp_birthday">Birthday <span style="color:red;">*</span></label>
            <input type="date" name="Emp_birthday" require>
        </div>
        <div class="input-group">
            <label for="Salary">Salary <span style="color:red;">*</span></label>
            <input type="text" name="Salary" require>
        </div>
        <div class="input-group">
            <label for="Dep_ID">Department ID <span style="color:red;">*</span></label>
            <select name="Dep_ID" require>
                <option value="">---Select---</option>
                <option value="1">1 บ้านลาด</option>
                <option value="2">2 บ้านกุ่ม</option>
                <option value="3">3 บ้านโป่ง</option>
            </select>
        </div>
        <div class="input-group">
            <button type="submit" name="Emp_reg" class="btn">Register Employee</button>
            <!-- <input type="submit" value="Register"> -->
        </div>
        <p>Already a Employee? <a href="login_emp.php">Sign in</a></p>
    </form>
</body>

</html>