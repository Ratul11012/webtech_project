<?php
session_start();
include '../db.php';


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
    header("Location: ../index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management - ASHTASY BD</title>
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

        .delete {
            background-color: lightcoral;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }

        .delete:hover {
            background-color: red;
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
    </style>
</head>

<body>

<div class="dashboard_sidebar">
    <ul>
        <li><a href="manageuser.php">User Management</a></li>
        <li><a href="addproduct.php">Add Product</a></li>
        <li><a href="displayproduct.php">View Products</a></li>
        <li><a href="vieworders.php">View Orders</a></li>
        <li><a href="../logout.php">Logout</a></li>
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

</body>
</html>
