<?php

include 'db.php';

if(isset($_POST['submit'])){
    
$email=$_POST['email'];
$password=$_POST['password'];


$sql= "select * from users where email='$email'";
$result= mysqli_query($conn, $sql);
if($result->num_rows>0){
    $row = mysqli_fetch_assoc($result);
    
    if($row['password'] == $password){
        $_SESSION['user_id'] =$row['id'];
        $_SESSION['user_name'] =$row['name'];
        $_SESSION['user_role'] =$row['role'];
        if($_SESSION['user_role'] == 'admin'){
           header("Location: admin/dashboard.php");
        }

        else{
            echo"dashboard for user";
        }



    else{
        echo "Invalid password";
    }

    }

else{
    echo"Plese! Register first!";
}

}

}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>ASHTASY BD</title>
        <style>
        
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Arial', sans-serif;
            }

            body {
                background: linear-gradient(135deg, #0d1553a7, #ffd752ff); /* Gradient from dark blue to yellow */
                color: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                overflow: hidden;
            }

       
            .brandName {
                font-size: 40px;
                color: #ffd752ff;
                text-decoration: none;
                font-family: 'Lucida Handwriting', cursive;
                position: absolute;
                top: 20px;
                left: 20px;
                padding: 10px 20px;
                background: rgba(0, 0, 0, 0.5);
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            }

        

           
            .login {
                background: rgba(0, 0, 0, 0.7);
                border-radius: 10px;
                padding: 40px 30px;
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.07);
                width: 380px;
                text-align: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

    
            .login input {
                width: 100%;
                padding: 15px;
                margin: 10px 0;
                background: #333;
                border: 2px solid #5e94b8;
                border-radius: 25px;
                color: #fff;
                font-size: 16px;
                outline: none;
    
            }

          
      
            .button {
                padding: 15px;
                background: #5e94b8;
                border: 2px solid #5e94b8;
                border-radius: 25px;
                color: #fff;
                font-size: 18px;
                width: 100%;
                margin-top: 10px;
            }

            .button:hover {
                background-color: #ffd752ff;
                transform: scale(1.05);
                border-color: #ffd752ff;
            }

     
            .login p {
                color: #ddd;
                margin-top: 20px;
                font-size: 14px;
            }

      
      

        </style>
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
