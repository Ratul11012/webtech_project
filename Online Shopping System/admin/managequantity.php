<?php
session_start();
include '../db.php';
include '../Include/darkmode.php';


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
    header("Location: ../index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Product Quantity - ASHTASY BD</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .dashboard_sidebar {
            position: fixed;
            top: 0;
            background-color: darkcyan;
            width: 200px;
            height: 100%;
        }

        .dashboard_sidebar ul li {
            list-style: none;
            text-align: center;
        }

        .dashboard_sidebar ul li a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 10px;
        }

        .dashboard_sidebar ul li a:hover {
            background-color: black;
        }

        .dashboard_main {
            margin-left: 200px;
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid blue;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: lightblue;
        }

        .alert {
            background-color: yellow;
            color: red;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .button {
            padding: 10px;
            background-color: #5e94b8;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .button:hover {
            background-color: #FFD700;
        }

        input {
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .product-img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
    </style>
</head>

<body>

<div class="dashboard_sidebar">
    <ul>
         <li><a href="manageuser.php">User Management</a></li>
        <li><a href="addproduct.php">Add Product</a></li>
        <li><a href="displayproduct.php">View Products</a></li>
        <li><a href="vieworders.php">View Orders</a></li>
        <li><a href="managequantity.php">Manage Quantity</a></li>      
        <li><a href="../logout.php">Logout</a></li>
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
                echo "<td><img src='../image/$product_image' alt='Product Image' class='product-img'></td>";
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

</body>
</html>
