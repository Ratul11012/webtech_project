

<!DOCTYPE html>
<html>  
    <head>
    <title>ASHTASY</title>
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

  body{
    background-color: #0d1553a7;
    
    color: #924848ff;
    font-family: Arial, sans-serif;

    
    
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

    <?php
     include "db.php" ;
     session_start() ;

   if(isset($_POST['submit'])){
   
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' " ;
    $result = mysqli_query($conn, $sql) ;

    if($result->num_rows){
        $row=mysqli_fetch_assoc($result) ;
        if($row['password']==$password);
        $_SESSION['user_id'] = $row['id'] ;
        $_SESSION['user_name'] = $row['name'] ;
        $_SESSION['user_role'] = $row['role'] ;
    }
    else{
        echo "Invalid email or password" ;



    }

   }

?> 



     <a href="index.php"  class="brandName" > ASHTASY </a> 
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