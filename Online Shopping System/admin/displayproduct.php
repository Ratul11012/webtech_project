<?php
session_start();  

include '../db.php';
include '../Include/darkmode.php';

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

    header("Location: ../index.php");
    exit();
}

?>


<!DOCTYPE html>
<html>

    <head>
        <title> Display Products - ASHTASY BD</title>

        <style>

        
            * {
                margin: 0;
                padding: 0;
            }

            .dashboard_sidebar {
                position: fixed;
                top: 0;
                background-color: darkcyan;
                width: 150px;  
                height: 100%;
                overflow-y: auto;
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
                margin-left: 220px;
                padding: 30px;
            }

            table {
                width: 80%; 
                border-collapse: collapse;
                margin: 20px auto; 
                table-layout: fixed; 
            }

            th, td {
                padding: 8px; 
                text-align: center;
                border-bottom: 2px solid blue;
                word-wrap: break-word; 
           } 

            th {
               border-top: 4px solid darkblue;
               background-color: lightgray;
            }

            td {
              background-color: lightblue;
            }

            td img {
              max-width: 100%;
              height: auto;
            }

            .update{
                background-color:lightgreen;
                text-decoration:none;
                padding:8px;
            }

            .delete{
                background-color:lightcoral;
                text-decoration:none;
                padding:8px;
            }

        </style>
    </head>

    <body>


    <div class="dashboard_sidebar">
            <ul> 
                <li><a href="manageuser.php">User Management</a></li>
                <li><a href="addproduct.php">Add Product</a> </li>
                <li><a href="displayproduct.php">View Products</a> </li>
                <li><a href="managequantity.php">Manage Quantity</a></li> 
                <li><a href="vieworders.php">View Orders</a></li>
                <li><a href="../logout.php">Logout</a> </li> 
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
                <th>Action</th>
                <th>Action</th>
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
                <td> <img src="../image/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image" width="200" height="200"> </td>
                <td> <?php echo $row['category_name'] ?> </td>
                <td> <a class="update" href="updateproduct.php?product_id=<?php echo $row['id'] ?> "> Update </a> </td>
                <td> <a class="delete" href="deleteproduct.php?product_id=<?php echo $row['id'] ?> "> Delete </a> </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>

    </body>

</html>