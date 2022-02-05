<?php   
    session_start();
    include('server.php');

    $errors = array();

    if( isset($_POST['Emp_reg'])){
        $name = mysqli_real_escape_string($conn, $_POST['Emp_name']);
        $email = mysqli_real_escape_string($conn, $_POST['Emp_email']);
        $password = mysqli_real_escape_string($conn, $_POST['Emp_password']);
        // $password2 = mysqli_real_escape_string($conn, $_POST['Emp_password2']);
        $phone = mysqli_real_escape_string($conn, $_POST['Emp_phone']);
        $sex = mysqli_real_escape_string($conn, $_POST['Emp_sex']);
        $birthday = mysqli_real_escape_string($conn, $_POST['Emp_birthday']);
        $Salary = mysqli_real_escape_string($conn, $_POST['Salary']);
        $Dep_ID = mysqli_real_escape_string($conn, $_POST['Dep_ID']);
        
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
        if(empty($Salary)){
            array_push($errors, "Salary is required");
        }
        if(empty($Dep_ID)){
            array_push($errors, "Department ID is required");
        }

        $user_check = "SELECT * FROM employee WHERE Emp_email = '$email' ";
        $query = mysqli_query($conn, $user_check);
        $result = mysqli_fetch_assoc($query);
        
        if($result) {
    
            if($result['Emp_email']===$email) {
                array_push($errors, "***Email already exist***");
            }
        }
        
        if(count($errors) == 0){
            
            $password = md5($password);
            $sql = "INSERT INTO employee(Emp_email, Emp_password, Emp_name, Emp_phone, Emp_sex, Emp_birthday, Salary, Dep_ID) VALUES ('$email', '$password', '$name', '$phone',  '$sex', '$birthday', '$Salary', '$Dep_ID')";
            
            mysqli_query($conn, $sql);
            
            $_SESSION['Emp_email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: index_emp.php');
               
        }
        else {
            array_push($errors, "***Email already exist***");
            $_SESSION['error'] = "***Email already exist***";
            header("location: register_emp.php");
        }
    }  

?>