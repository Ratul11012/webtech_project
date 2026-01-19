<?php
include '../db/db.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role= "user";

    $sql ="insert into users(name,email,password,
    phone,address,role) 
    values('$name','$email','$password',
    '$phone','$address','$role')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "Error!:{ $conn->error}";
   
     }
  else{
    echo"Registered Successfully";
  }



}
?>


<!DOCTYPE html>
<html>  
    <head>
    <title>Sign Up - ASHTASY BD</title>
    <link rel="stylesheet" href="../css/register.css">
    </head>
    <body>

<a href="index.php"  class="brandName" > ASHTASY </a>    


<div class="registerdiv">
     
    <form action="register.php"  method="post">
    <input type="text" name="name" placeholder="Enter your name here!" required>
    <input type="email" name="email" placeholder="Enter your email here!" required>
    <input type="password" name="password" placeholder="Enter your password here!" required>
    <input type="text" name="phone" placeholder="Enter your phone number here!" required>
    <textarea name ="address" placeholder="Enter your address here!" required></textarea>
    <input class="button" type="submit" name="submit" value="sign up">
    <p>Go To Login<a href="login.php"> LOGIN</a></p> 
</form>
 
</div>



</body>
</html>
