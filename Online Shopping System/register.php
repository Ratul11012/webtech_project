<!DOCTYPE html>
<html>  
    <head>
    <title>Document</title>
    <style>
    .registerdiv{
        margin-top: 200px;
        display: flex;
        flex-wrap:wrap;
        flex-direction: row;
        justify-content: center;
        
    }
    .shoplink{
        text-decoration: none;
        font-size: 20px;
        margin-left: 20px;
        background-color: green;
        color: white;
        padding: 10px;
       
        text-align: center;

       
         
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
    
<a class="shoplink" href="index.php">Shop</a>

<div class="registerdiv">
     
    <form action="register.php"  method="post">
    <input type="text" name="name" placeholder="Enter your name here!" required>
    <input type="email" name="email" placeholder="Enter your email here!" required>
    <input type="password" name="password" placeholder="Enter your password here!" required>
    <input type="text" name="phone" placeholder="Enter your phone number here!" required>
    <textarea name ="address" placeholder="Enter your address here!" required></textarea>
    <input class="button" type="submit" name="submit" value="sign up">
    <p>go to login<a href="login.php"> LOGIN</a></p> 
</form>
 
</div>



</body>
</html>