<?php
session_start();  

include '../db.php';

if (isset($_SESSION['user_id'])) {

    $Sql="select * from products";
    $result=mysqli_query($conn,$Sql);

 
    if ($_SESSION['user_role'] == 'admin') {

        
            if(!$result){
                echo"ERROR! : {$conn->error}";
            }
            else{
               
            }
        
   
    }
    else{
        echo "Go to user dashboard";
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