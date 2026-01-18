<?php
session_start();  
include '../db/db.php';

if (isset($_SESSION['user_id'])) {

    $Sql1="select * from categories";
    $result1=mysqli_query($conn,$Sql1);

 
    if ($_SESSION['user_role'] == 'admin') {

        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $stock=$_POST['stock'];
            $image=$_FILES['image']['name'];
            $temp_location=$_FILES['image']['tmp_name'];
            $upload_location= "../images/";
            $category_name=$_POST['category_name'];
            
            $sql="insert into products (name,description,price,stock,image,category_name)
            values('$name' , '$description' , '$price' , '$stock' , '$image' , '$category_name')";

            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo"ERROR! : {$conn->error}";
            }
            else{
                echo "Product added successfully!";
                move_uploaded_file($temp_location, $upload_location.$image);
            }
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
        <title>Add Product - ASHTASY BD</title>
        <link rel="stylesheet" href="../css/addproduct.css">
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
     
                <form action="addproduct.php" method="post" enctype="multipart/form-data">

                <h1> Enter Product Details: </h1> <br>

                <input type="text" name="name" placeholder="Enter product name" required>
                
                <textarea name="description" placeholder="Enter product description" required></textarea>

                <input type="number" name="price" placeholder="Enter product price here!" required>
                <input type="number" name="stock" placeholder="Enter stock number" required>

                <h2> Select Product Image: </h2>
                <input type="file" name="image" required>

                <h2>Select Product Category:</h2>
                <select name="category_name" required>
                <?php
                   while ($row = mysqli_fetch_assoc($result1)) {
                ?>
                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php
                   }
                ?>
                </select>

                <input type="submit" class="button" name="submit" value="add product">
                 
                </form>
        </div>

        <script src="../js/darkmode.js"></script>
    </body>

</html>
