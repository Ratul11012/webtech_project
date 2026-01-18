<?php
session_start(); 

if (isset($_SESSION['user_id'])) {

     if ($_SESSION['user_role'] == 'user') {
        
   
    } else {
        header("Location: ../../../Admin/MVC/php/dashboard.php");
        exit();
    }

} else {

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Dashboard - ASHTASY BD</title>
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel="stylesheet" href="../css/darkmode.css">
    </head>

    

    <body>

        <center>
            <h3 id="pagetitle">Light Mode</h3>
            <button id="switchbutton" onclick="toggle()">Switch to Dark Mode</button>
        </center>

        <div class="dashboard_sidebar">
            <ul> 
                <li><a href="index.php">Shop</a> </li>
                <li><a href="myorders.php">My Order</a> </li>
                 
                <li><a href="logout.php">Logout</a> </li> 
            </ul>
        </div>
       
        <div class="dashboard_main">
            <p>Welcome to the User Dashboard!</p>  
        </div>

        <script src="../js/darkmode.js"></script>
    </body>

</html>
