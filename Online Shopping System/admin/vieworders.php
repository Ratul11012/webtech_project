<?php
session_start();

include '../db.php';

if (isset($_SESSION['user_id'])) {

    $sql = "SELECT single_order.user_id, single_order.product_id, single_order.product_quantity, single_order.total_amount, products.name as product_name, products.image as product_image, products.price as product_price 
            FROM single_order
            JOIN products ON single_order.product_id = products.id"; 

    if ($_SESSION['user_role'] == 'admin') {
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "ERROR! : {$conn->error}";
        } else {

        }

    } else {
        echo "Go to user dashboard";
    }

} else {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ASHTASY BD</title>
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
            border: none;
        }

        th {
            border-top: 4px solid darkblue;
        }

        tr, th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid blue;
        }

        td {
            background-color: lightblue;
        }

        .update {
            background-color: lightgreen;
            text-decoration: none;
            padding: 10px;
        }

        .delete {
            background-color: lightcoral;
            text-decoration: none;
            padding: 10px;
        }
    </style>
</head>

<body>

<div class="dashboard_sidebar">
    <ul>
        <li><a href="addproduct.php">Add Product</a></li>
        <li><a href="displayproduct.php">View Products</a></li>
        <li><a href="vieworders.php">View Orders</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</div>

<div class="dashboard_main">

    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Amount</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><img src="../image/<?php echo $row['product_image']; ?>" alt="Product Image" width="50"></td>
                        <td><?php echo $row['product_price']; ?> TK</td>
                        <td><?php echo $row['product_quantity']; ?></td>
                        <td><?php echo $row['total_amount']; ?> TK</td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>No orders found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>

</body>

</html>
