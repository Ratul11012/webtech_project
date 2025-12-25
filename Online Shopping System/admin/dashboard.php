<?<php>

session_start();
if(isset($_SESSION['user_id'])){
    
    if($_SESSION['user_role'] =='admin'){
 
    }
    else{
        echo"go to user dashboard";
    }
    
}

else{
    header("Location: ../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>ASHTASY BD</title>
    </head>
    
    <body>
       
    </body>

</html>