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
                margin: 10px auto;
                border-collapse: collapse;
                table-layout: fixed;
                border-radius: 10px;
                margin-right:60px;
            }

            th, td {
                padding: 12px;
                text-align: center;
                border: 1px solid #e0e0e0;
                word-wrap: break-word;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 14px;
            }

            th {
                background-color: #2196F3;
                color: white;
                font-weight: bold;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            td {
                background-color: #fafafa;
                color: #333;
                border-bottom: 2px solid #e0e0e0;
                border-radius: 8px;
            }

            td img {
               max-width: 70%;
               height: auto;
               display: block;
               margin: 0 auto;
               border-radius: 8px;
            }

            tr:nth-child(even) td {
               background-color: #f9f9f9;
            }

            tr:hover td {
               background-color: #e1f5fe;
               cursor: pointer;
            }
            

            a{
              display: inline-block; /* Make the links behave like buttons */
              padding: 10px 20px;
              border-radius: 5px;
              font-size: 14px;
              cursor: pointer;
              text-decoration: none; /* Remove underline from links */
              font-weight: bold;
              min-width: 80px;
              text-align: center;
            }          

            .update {
              background-color: #4CAF50;
              color: white;
            }

            .update:hover {
              background-color: #45a049;
              box-shadow: 0 6px 12px rgba(0, 128, 0, 0.3);
            }

            .update:active {
              background-color: #388e3c;
              box-shadow: 0 2px 6px rgba(0, 128, 0, 0.1);
            }


            .delete {
              background-color: #f44336;
              color: white;
              box-shadow: 0 4px 8px rgba(255, 0, 0, 0.2);
            }

            .delete:hover {
              background-color: #e53935;
              box-shadow: 0 6px 12px rgba(255, 0, 0, 0.3);
            }

            .delete:active {
              background-color: #c62828;
              box-shadow: 0 2px 6px rgba(255, 0, 0, 0.1);
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