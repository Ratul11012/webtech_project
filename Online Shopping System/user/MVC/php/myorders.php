<?php
session_start();

include '../db/db.php';

if (isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT single_order.product_id, single_order.product_quantity, single_order.total_amount, products.name as product_name, products.image as product_image, products.price as product_price 
            FROM single_order
            JOIN products ON single_order.product_id = products.id
            WHERE single_order.user_id = '$user_id'"; 

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "ERROR! : {$conn->error}";
    }

} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders - ASHTASY BD</title>
    <link rel="stylesheet" href="../css/myorders.css">
    <link rel="stylesheet" href="../css/darkmode.css">
</head>

<body>

<center>
    <h3 id="pagetitle">Light Mode</h3>
    <button id="switchbutton" onclick="toggle()">Switch to Dark Mode</button>
</center>

<div class="dashboard_sidebar">
    <ul>
        <li><a href="myorders.php">My Orders</a></li>
        <li><a href="index.php">Shop</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<div class="dashboard_main">

    <h2>My Orders</h2>

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
                        <td><img src="../images/<?php echo $row['product_image']; ?>" alt="Product Image" width="50"></td>
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

<script src="../js/darkmode.js"></script>
</body>

</html>
