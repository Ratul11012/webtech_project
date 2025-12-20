<!DOCTYPE html>
<html>  
    <head>
    <title>ASHTASY</title>
    <style>

    body{
        background-color: #0d1553a7;
        font-family: Arial, sans-serif;
        color: #333;

    }



    .registerdiv{
        margin-top: 200px;
        display: flex;
        flex-wrap:wrap;
        flex-direction: row;
        justify-content: center;
        
    }
    .brandName{
       font-size: 24px; 
       color: #ffd752ff;
         text-decoration: none;
            font-family:'lucida handwriting', cursive;
            margin-left: 20px;
            position: fixed;
            top: 10px;
            left: 20px;
            
        

       
         
    }

.registerdiv input{
    display: block;
    padding: 15px;
    margin: 8px;


}
.registerdiv textarea{
    display: block;
    padding: 15px;
    margin: 8px;
    width: 162px;


}
.button{
    width: 200px;
    background-color: lightcoral;
    border: none;

}
button:hover{
    background-color: darkorange;

   
    
}
.registerdiv a{
    color: black;
    margin-left: 5px;
    margin-top: 10px;

   }
</style>
    </head>
    <body>

<?php
include "db.php" ;
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