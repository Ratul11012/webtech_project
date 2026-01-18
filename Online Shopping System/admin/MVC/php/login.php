<?php

include '../db/db.php';
session_start();

if(isset($_POST['submit'])){
    
$email=$_POST['email'];
$password=$_POST['password'];


$sql= "select * from users where email='$email'";
$result= mysqli_query($conn, $sql);
if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    
    if($row['password'] == $password){
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_role'] = $row['role'];
        
        if($_SESSION['user_role'] == 'admin'){
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: ../../../User/MVC/php/index.php");
            exit();
        }

    } else { 
        echo "Invalid password";
    }

}

else { 
    echo "Please! Register first!";
}

}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Login - ASHTASY BD</title>
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>

   
        <a href="index.php" class="brandName">ASHTASY</a>

  
        <div class="login">
            <form action="login.php" method="post">
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <input class="button" type="submit" name="submit" value="Login">
                <p>Don't have an account? <a href="register.php">Sign Up</a></p>
            </form>
        </div>

    </body>
</html>
