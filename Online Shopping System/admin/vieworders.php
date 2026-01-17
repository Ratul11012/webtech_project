<?php
session_start();

include '../db.php';

if (isset($_SESSION['user_id'])) {

    $Sql = "SELECT * FROM payments"; 
    $result = mysqli_query($conn, $Sql);

    if ($_SESSION['user_role'] == 'admin') {

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
                <th>Order id</th>
                <th>User id</th>
                <th>Total Amount</th>
                <th>Payment Method</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['total_amount']; ?></td>
                        <td><?php echo $row['payment_method']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='4'>No orders found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>

</body>

</html>
