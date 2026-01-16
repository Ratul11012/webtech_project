<?php
session_start();  

include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
}

else{
    if (isset($_SESSION['user_id'])) {
    if(isset($_GET['user_id'] ,$_GET['product_id'] ,$_GET['product_price'])){
        $user_id = $_GET['user_id'];
        $product_id = $_GET['product_id'];
        $total_amount = $_GET['product_price'];
        $sql="insert into single_order(user_id, product_id,total_amount)
         values('$user_id', '$product_id','$total_amount')";
        $result=mysqli_query($conn,$sql);
        if(!$result){
            echo "Error:  {$conn->error}"; 
        }
        else{
            $order_id=mysqli_insert_id($conn);
            $payment_method = "Cash on Delivery";
            $sql_payment="insert into payments(order_id,user_id,payment_method)values('','$user_id','$payment_method')";
            echo"Order Added Successfully." . "<a href='index.php'> Continue Shopping</a>";
        }

    }

    
}
else{
    header("Location: index.php");
}

}

?>