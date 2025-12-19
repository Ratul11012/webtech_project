<!DOCTYPE html>
<html>  
    <head> 
    <title>Document</title>
    <style>
    .registerdiv{
        display: flex;
        flex-wrap:wrap;
        flex-direction: row;
        justify-content: center;
        
    }
    .registerdiv a{
        text-decoration: none;
        background-color: lightgreen;
        padding: 10px;
    }
</style>
    </head>
    <body>
    
<div class="registerdiv">
    <a href="index.php">Shop</a>
<div>  
    
    <form action="register.php"  method="post">
    <input type="text" name="name" placeholder="Enter your name here!" required>
     <input type="email" name="email" placeholder="Enter your email here!" required>
        <input type="password" name="password" placeholder="Enter your password here!" required>
        <input type="text" name="phone" placeholder="Enter your phone number here!" required>
         <textarea name ="address" placeholder="Enter your address here!" required></textarea>
         <input type="submit" name="submit" value="sign up"> 
</form>
</div>
</div>



</body>
</html>