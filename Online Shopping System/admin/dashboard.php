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

        <style> 

        .dashboard_sidebar{
            postion: fixed;
            top:0;
            background-color: #505050ff;
            width: 250px;
            height: 100%;
        }

        </style>
    </head>

    <body>
       <div class="dashboard_sidebar">

       <ul> 
        <li><a href="">Add Product</a> </li>
        <li><a href="">View Orders</a> </li>
        <li> <a href="">Logout</a> </li>
       </ul>

       </div> 
    </body>

</html>