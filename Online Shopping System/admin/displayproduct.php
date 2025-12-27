<?php
session_start();  

include '../db.php';

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
        <title>ASHTASY BD</title>

        <style>

        </style>
    </head>

    <body>


    <div class="dashboard_sidebar">
            <ul> 
                <li><a href="addproduct.php">Add Product</a> </li>
                <li><a href="displayproduct.php">View Orders</a> </li>
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
                <td> <img src="../image/<?php echo $row['image'] ?> "  alt=""> </td>
                <td> <?php echo $row['category_name'] ?> </td>
                <td> <a class="update" href="#"> Update</a></td>
                <td> <a class="delete" href="#"> Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>

    </body>

</html>