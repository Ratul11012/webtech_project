<?php
session_start();
include '../db/db.php';

if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin') {

    if (isset($_GET['delete_user_id'])) {
        $user_id = $_GET['delete_user_id'];


        if ($user_id == $_SESSION['user_id']) {
            echo "You cannot delete your own account.";
            exit();
        }

        $delete_sql = "DELETE FROM users WHERE id = '$user_id'";
        $delete_result = mysqli_query($conn, $delete_sql);

        if ($delete_result) {
            echo "User deleted successfully. <a href='manageuser.php'>Go back</a>";
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    }

  
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

} else {
    header("Location: index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management - ASHTASY BD</title>
    <link rel="stylesheet" href="../css/manageuser.css">
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
    <h2>Manage Users</h2>
    <p>Here you can view and delete users.</p>


    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
         
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td>
                
                        <a class="delete" href="manageuser.php?delete_user_id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script src="../js/darkmode.js"></script>
</body>
</html>
