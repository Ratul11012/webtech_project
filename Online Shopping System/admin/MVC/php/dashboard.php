<?php
session_start();  

if (isset($_SESSION['user_id'])) {

 
    if ($_SESSION['user_role'] == 'admin') {
   
    } else {
        header("Location: ../../../User/MVC/php/index.php");
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
        <title>Admin Dashboard - ASHTASY BD</title>
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
                <li><a href="manageuser.php">User Management</a></li>
                <li><a href="addproduct.php">Add Product</a> </li>
                <li><a href="displayproduct.php">View Products</a> </li>
                <li> <a href="managequantity.php">Manage Products Stock</a> </li>
                <li><a href="vieworders.php">View Orders</a></li>
                <li><a href="logout.php">Logout</a> </li> 
            </ul>
        </div>
       
        <div class="dashboard_main">
            <p>Welcome to the Admin Dashboard!</p>  
        </div>

        <script src="../js/darkmode.js"></script>
    </body>

</html>
