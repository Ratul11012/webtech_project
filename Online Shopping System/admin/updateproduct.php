<?php
session_start();  

include '../db.php';
include '../Include/darkmode.php';

if (isset($_SESSION['user_id'])) {

    $Sql1="select * from categories";
    $result1=mysqli_query($conn,$Sql1);

    if(isset($_GET['product_id'])){
        $product_id=$_GET['product_id'];
        $sql2="select * from products where id='$product_id' ";
        $result2=mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_assoc($result2);
    }

    $sql2="select * from products where id='$product_id' ";
    if ($_SESSION['user_role'] == 'admin') {

        if(isset($_POST['submit'])){
            $product_id=$_GET['product_id'];
            $name=$_POST['name'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $stock=$_POST['stock'];
            
            $sql3="update products set name='$name', description='$description', price='$price', stock='$stock' where id='$product_id' ";
            $result3=mysqli_query($conn, $sql3);
            if($result3){
                header("Location: displayproduct.php");
            }
            else{
                echo"ERROR! : {$conn->error}";
            }

            $image=$_FILES['image']['name'];
            if($image){
            $temp_location=$_FILES['image']['tmp_name'];
            $upload_location= "../image/";

            $sql4="update products set name='$name', description='$description', price='$price', stock='$stock', image='$image' where id='$product_id' ";
            $result4=mysqli_query($conn, $sql4);
            if($result4){
                
                echo "Product added successfully!";
                move_uploaded_file($temp_location, $upload_location.$image);
                header("Location: displayproduct.php");
            }
            else{
                echo"ERROR! : {$conn->error}";
            }
            
            }

             $category_name=$_POST['category_name'];
             if($category_name){
  
            $sql5="update products set name='$name', description='$description', price='$price', stock='$stock', category='$category_name' where id='$product_id' ";
            $result5=mysqli_query($conn, $sql5);
            if($result5){
                header("Location: displayproduct.php");
            }
            else{
                echo"ERROR! : {$conn->error}";
            }
            
            }


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

    header("Location: ../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Update Product - ASHTASY BD</title>
        <style> 
            * {
                margin: 0;
                padding: 0;
                overflow-x: hidden;
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
                position:relative;
                padding: 30px;
                left: 45%;
                margin-top: 10px;
            }

            .dashboard_main input{
                display:block;  /* each input FIELD on a new line, so br use kora lagenai. */
                margin: 10px;
                padding: 20px;
                border-left: 2px solid lightcoral;
                border-right: 2px solid lightcoral;
                border-radius: 15px 50px;
            }

            .dashboard_main select{
                display:inline-block;  /* each input FIELD on a new line, so br use kora lagenai. */
                margin: 15px;
                padding: 20px;
                border-left: 2px solid lightcoral;
                border-right: 2px solid lightcoral;
                border-radius: 15px 50px;
            }

            .dashboard_main textarea{
                display:block;  /* each input FIELD on a new line, so br use kora lagenai. */
                margin: 10px;
                padding: 20px;
                width: 30%;
                border-left: 2px solid lightcoral;
                border-right: 2px solid lightcoral;
                border-radius: 15px 50px;
            }

            .button {
                width:20%;
                background-color: darkcyan;
                border-radius: 15px 50px;
            }

            .button:hover {
                background-color: black;
                color: white;
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
     
                <form action="updateproduct.php ?product_id=<?php echo $product_id; ?>" method="post" enctype="multipart/form-data">

                <input type="text" name="name" value="<?php echo $row2['name']; ?>">
                
                <textarea name="description" value="<?php echo $row2['description']; ?>"></textarea>

                <input type="number" name="price" value="<?php echo $row2['price']; ?>">
                <input type="number" name="stock" value="<?php echo $row2['stock']; ?>">
                
                <img src="../image/<?php echo $row2['image']; ?>" alt="" style="max-width: 200px; max-height: 200px; object-fit: cover;">

                <input type="file" name="image">

                <h1> Category Name Is: <?php echo $row2['category_name']; ?></h1>
                 <select name="category_name">
                <?php
                while ($row=mysqli_fetch_assoc($result1))
                    { ?>
                        <option value=" <?php echo $row['name']; ?>"> 
                         <?php echo $row['name']; ?>  </option>
                         <?php } ?>
                </select>

                <input type="submit" class="button" name="submit" value="add product">
                 
                </form>
        </div>

    </body>

</html>
