<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pizza Com Science | Register</title>

    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label for="Cus_name">Name <span style="color:red;">*</span></label>
            <input type="text" name="Cus_name" require>
        </div>
        <div class="input-group">
            <label for="Cus_email">Email <span style="color:red;">*</span></label>
            <input type="email" name="Cus_email" require>
        </div>
        <div class="input-group">
            <label for="Cus_password">Password <span style="color:red;">*</span></label>
            <input type="password" name="Cus_password" require>
        </div>
        <!-- <div class="input-group">
            <label for="Cus_password2">Confirm Password <span style="color:red;">*</span></label>
            <input type="password" name="Cus_password2" require>
        </div> -->
        <div class="input-group">
            <label for="Cus_phone">Phone Number <span style="color:red;">*</span></label>
            <input type="tel" name="Cus_phone" placeholder="0123456789" pattern="[0-9]{10}" require>
        </div>
        <div class="input-group">
            <label for="Cus_sex">Gender <span style="color:red;">*</span></label>
            <select name="Cus_sex" require>
                <option value="" disabled selected>---Select---</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Not specified">Not specified</option>
            </select>
        </div>
        <div class="input-group">
            <label for="Cus_birthday">Birthday <span style="color:red;">*</span></label>
            <input type="date" name="Cus_birthday" require>
        </div>
        <div class="input-group">
            <button type="submit" name="Cus_reg" class="btn">Register</button>
            <!-- <input type="submit" value="Register"> -->
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
</body>

</html>