<?php


?>

<!DOCTYPE html>
<html>  
    <head>
    <title>Document</title>
<style>
   .login{
display: flex;
justify-content: center ;
align-items: center;
background-color: darkgray;
position: fixed;
top: 35%;
left: 40%;
padding: 30px;



   }
   .login input{

    display: block;
    padding: 10px;
    border-radius: 15px 50px ;
    border-bottom: 2px solid darkolivegreen;
    margin-top: 10px;
    margin-bottom: 5px;


   }

   .login a{
    color: darkolivegreen;
    margin-left: 5px;

   }


   .button{
     border: 2px solid darkolivegreen;
    background-color: darkolivegreen;
    width: 100%;
    


   }

    </style>


    </head>
    <body> 
        <div class="login">

      
        <form action="login.php" method="post">
        <input type="email" name="email" placeholder="Enter your email here!" required>
        <input type="password" name="password" placeholder="Enter your password here!" required>
        <input class="button" type="submit" name="submit" value="login">
        <p> Don't Register Yet!<a href="register.php"> Sign Up</a></p>
      </div>
    </form> 
    </body>
    </html>