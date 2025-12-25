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

        *{
            margin:0;
            padding:0;
        }

        .dashboard_sidebar{
            position: fixed;
            top:0;
            background-color:darkcyan;
            width: 200x;
            height: 100%;
        }

        .dashboard_sidebar ul li{
            list-style: none;
            text-align: center;
            
        }

        .dashboard_sidebar ul li a{
            display: block;
            text-decoration: none;
            color:white;
            padding: 10px;
        }

        .dashboard_sidebar ul li a:hover{
            background-color: black;
        }


        .dashboard_main{
            margin-left: 200px;
            padding: 30px;
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
       
       <div class="dashboard_main">
       <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores enim ab ut in esse qui iure ea, recusandae rerum commodi quo corrupti quos itaque beatae possimus! Deserunt voluptates modi sint. </p>
       </div>


    </body>

</html>