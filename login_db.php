<?php

    session_start();
    include('server.php');

    $errors = array();
    
    if( isset($_POST['Cus_login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['Cus_email']);
        $password = mysqli_real_escape_string($conn, $_POST['Cus_password']);
        
        if(empty($email)) {
            array_push($errors, "Email is required");
        }
        if(empty($password)) {
            array_push($errors, "Password is required");
        }
        
        if(count($errors)==0){
            $password = md5($password);
            $query = "SELECT*FROM customer WHERE Cus_email = '$email' AND Cus_password = '$password' ";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result)==0){
                
                $_SESSION['Cus_email'] = $email;
                $_SESSION['success'] = "Your are logged in";
                header("location: index.php");
            }
            else {
                array_push($errors, "Wrong Email or Password combination");
                $_SESSION['error'] = "Wrong Email or Password try again!";
                header("location: login.php");
            }
        }
    }

?>