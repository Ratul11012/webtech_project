<?php
session_start();
include '../db.php';
if(isset($_SESSION['user_id'])) {

    if($_SESSION['user_role'] == 'admin') {

        if(isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $sql="delete from products where product_id = '$product_id'";
            $result=mysqli_query($conn,$sql);
            

        }

    }
    else {
        echo "Go to user dashboard";
    }
} 

else {
    header("Location: ../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html>

    <head>
        <title>ASHTASY BD</title>

        <style>

        </style>
    </head>

    <body>

    </body>

</html>