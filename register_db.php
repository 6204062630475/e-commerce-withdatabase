<?php   
    session_start();
    include('server.php');

    $errors = array();

    if( isset($_POST['Cus_reg'])){
        $name = mysqli_real_escape_string($conn, $_POST['Cus_name']);
        $email = mysqli_real_escape_string($conn, $_POST['Cus_email']);
        $password = mysqli_real_escape_string($conn, $_POST['Cus_password']);
        // $password2 = mysqli_real_escape_string($conn, $_POST['Cus_password2']);
        $phone = mysqli_real_escape_string($conn, $_POST['Cus_phone']);
        $sex = mysqli_real_escape_string($conn, $_POST['Cus_sex']);
        $birthday = mysqli_real_escape_string($conn, $_POST['Cus_birthday']);
        
        if(empty($name)){
            array_push($errors, "Name is required");
        }
        if(empty($email)){
            array_push($errors, "Email is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        }
        // if(empty($password2)){
        //     array_push($errors, "Confirm Password is required");
        // }
        if(empty($phone)){
            array_push($errors, "Phone is required");
        }
        if(empty($sex)){
            array_push($errors, "Sex is required");
        }
        if(empty($birthday)){
            array_push($errors, "Birthday is required");
        }
        // if($password != $password2){
        //     array_push($errors, "The two password do not match");
        // }
        

        $user_check = "SELECT * FROM customer WHERE Cus_email = '$email' ";
        $query = mysqli_query($conn, $user_check);
        $result = mysqli_fetch_assoc($query);
        
        if($result) {
    
            if($result['Cus_email']===$email) {
                array_push($errors, "Email already exist");
            }
        }
        
        if(count($errors) == 0){
            
            $password = md5($password);
            $sql = "INSERT INTO customer(Cus_name, Cus_email, Cus_password, Cus_phone, Cus_sex, Cus_birthday) VALUES ('$name', '$email', '$password', '$phone', '$sex', '$birthday')";
            
            mysqli_query($conn, $sql);
            
            $_SESSION['Cus_email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }
        else {
            array_push($errors, "Email already exist");
            $_SESSION['error'] = "Email already exist";
            header("location: register.php");
        }
    }  

?>