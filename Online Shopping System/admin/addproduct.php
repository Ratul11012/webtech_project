<?php
session_start();  

if (isset($_SESSION['user_id'])) {

 
    if ($_SESSION['user_role'] == 'admin') {
   
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
                <li><a href="addproduct.php">Add Product</a> </li>
                <li><a href="">View Orders</a> </li>
                <li><a href="../logout.php">Logout</a> </li> 
            </ul>
        </div>
       

        <div class="dashboard_main">
     
                <form action="addproduct.php" method="post" enctype="/multipart/form-data"> 

                <input type="text" name="name" placeholder="Enter product name">
                
                <textarea name="description" placeholder="Enter product description"></textarea>

                <input type="number" name="price" placeholder="Enter product price here!">

                <input type="number" name="stock" placeholder="Enter stock number">

                <h2> Select Product Image: </h2>
                <input type="file" name="image">

                <select name=""> 
                    <option value="category_id"> category_id</option>
                </select>
                
               <select name=""> 
                    <option value="category_name"> category_name</option>
                </select>

                <input type="submit" class="button" name="submit" value="add product">
                 
                </form>
        </div>

    </body>

</html>
