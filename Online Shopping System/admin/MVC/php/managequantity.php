<?php
session_start();
include '../db/db.php';


if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin') {

    if (isset($_POST['update_quantity'])) {
        $product_id = $_POST['product_id'];
        $new_quantity = $_POST['quantity'];

        $update_sql = "UPDATE products SET stock = '$new_quantity' WHERE id = '$product_id'";
        $update_result = mysqli_query($conn, $update_sql);

        if (!$update_result) {
            echo "Error updating quantity: " . mysqli_error($conn);
        } else {
            echo "Product quantity updated successfully.";
        }
    }

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

} else {
    header("Location: index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Product Quantity - ASHTASY BD</title>
    <link rel="stylesheet" href="../css/managequantity.css">
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
        <li><a href="addproduct.php">Add Product</a></li>
        <li><a href="displayproduct.php">View Products</a></li>
        <li><a href="managequantity.php">Manage Quantity</a></li>  
        <li><a href="vieworders.php">View Orders</a></li>    
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="dashboard_main">
    <h2>Manage Product Quantities</h2>

    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Current Stock</th>
                <th>Update Quantity</th>
                <th>Low Stock Alert</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['id'];
                $product_name = $row['name'];
                $product_image = $row['image'];
                $current_stock = $row['stock'];
                $low_stock_alert = ($current_stock <= 5) ? "Yes" : "No"; 

                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $product_name . "</td>";
                echo "<td><img src='../images/$product_image' alt='Product Image' class='product-img'></td>";
                echo "<td>" . $current_stock . "</td>";
                echo "<td>
                        <form action='managequantity.php' method='post'>
                            <input type='number' name='quantity' min='0' value='$current_stock' required>
                            <input type='hidden' name='product_id' value='$product_id'>
                            <input type='submit' name='update_quantity' value='Update' class='button'>
                        </form>
                      </td>";
                echo "<td>" . $low_stock_alert . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="../js/darkmode.js"></script>
</body>
</html>
