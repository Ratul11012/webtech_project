<?php
session_start();  

include 'db.php';

if (isset($_SESSION['user_id'])) {
    if(isset($_GET['user_id'] ,$_GET['product_id'] ,$_GET['product_price'])){
        $user_id = $_GET['user_id'];
        $product_id = $_GET['product_id'];
        $total_amount = $_GET['product_price'];
        $sql="insert into single_order(user_id, product_id,total_amount)
         values('$user_id', '$product_id','$total_amount')";
    
    }

}
else{
    header("Location: index.php");
}

?>