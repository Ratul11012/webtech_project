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

}

</style>
    </head>
    <body>
    
<a class="shoplink" href="index.php">Shop</a>

<div class="registerdiv">
     
    <form action="register.php"  method="post">
    <input type="text" name="name" placeholder="Enter your name here!" required>
     <input type="email" name="email" placeholder="Enter your email here!" required>
        <input type="password" name="password" placeholder="Enter your password here!" required>
        <input type="text" name="phone" placeholder="Enter your phone number here!" required>
         <textarea name ="address" placeholder="Enter your address here!" required></textarea>
         <input type="submit" name="submit" value="sign up"> 
</form>
 
</div>



</body>
</html>