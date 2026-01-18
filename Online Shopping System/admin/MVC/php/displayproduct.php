<?php
session_start();  

include '../db/db.php';

if (isset($_SESSION['user_id'])) {

    $Sql="select * from products";
    $result=mysqli_query($conn,$Sql);

 
    if ($_SESSION['user_role'] == 'admin') {

        
            if(!$result){
                echo"ERROR! : {$conn->error}";
            }
            else{
               
            }
        
   
    }
    else{
        echo "Go to user dashboard";
    }

}
else{

    header("Location: index.php");
    exit();
}

?>


<!DOCTYPE html>
<html>

    <head>
        <title> Display Products - ASHTASY BD</title>
        <link rel="stylesheet" href="../css/displayproduct.css">
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
                <li><a href="addproduct.php">Add Product</a> </li>
                <li><a href="displayproduct.php">View Products</a> </li>
                <li><a href="managequantity.php">Manage Quantity</a></li> 
                <li><a href="vieworders.php">View Orders</a></li>
                <li><a href="logout.php">Logout</a> </li> 
            </ul>
        </div>
       
        <div class="dashboard_main">
            <p>Welcome to the Admin Dashboard!</p>  
        </div>


    <table>
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Product Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            while($row=mysqli_fetch_assoc($result)){

            
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description'] ?>  </td>
                <td><?php echo $row['price'] ?>  </td>
                <td><?php echo $row['stock'] ?>  </td>
                <td> <img src="../images/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image" width="200" height="200"> </td>
                <td> <?php echo $row['category_name'] ?> </td>
                <td> <a class="update" href="updateproduct.php?product_id=<?php echo $row['id'] ?> "> Update </a> </td>
                <td> <a class="delete" href="deleteproduct.php?product_id=<?php echo $row['id'] ?> "> Delete </a> </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>

    <script src="../js/darkmode.js"></script>
    </body>

</html>
