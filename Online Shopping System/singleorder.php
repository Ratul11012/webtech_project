<?php
session_start();  

include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
}
else {
    if (isset($_GET['submit'])) {
        $user_id = $_GET['user_id'];
        $product_id = $_GET['product_id'];
        $product_quantity = $_GET['quantity'];
        $price = $_GET['product_price'];
        $total_amount=$product_quantity * $price;
        $sql = "insert into single_order(user_id, product_id, product_quantity, total_amount)
                values('$user_id', '$product_id', '$product_quantity', '$total_amount')";
        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo "Error:  {$conn->error}"; 
        }
        else {
            $sql_update_stock = "update products set stock = stock - $product_quantity where id = '$product_id'";
            $result_stock = mysqli_query($conn, $sql_update_stock);
            if(!$result_stock){
                echo "Error!: {$conn->error}";
            }
            else {
                echo "Order Added Successfully." . "<a href='index.php'> Continue Shopping</a>";
            }
        }
    }
    else {
        header("Location: index.php");
    }
}
?>
