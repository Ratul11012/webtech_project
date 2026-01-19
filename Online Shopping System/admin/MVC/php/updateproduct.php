<?php
session_start();  

include '../db/db.php';

if (isset($_SESSION['user_id'])) {

    $Sql1 = "SELECT * FROM categories"; 
    $result1 = mysqli_query($conn, $Sql1);

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $sql2 = "SELECT * FROM products WHERE id='$product_id'"; 
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
    }

    if ($_SESSION['user_role'] == 'admin') {
        if (isset($_POST['submit'])) {
            $product_id = $_GET['product_id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $category_name = $_POST['category_name'];

           
            $sql3 = "UPDATE products SET name='$name', description='$description', price='$price', stock='$stock', category_name='$category_name' WHERE id='$product_id'"; // Use category_name

            if (isset($_FILES['image']) && $_FILES['image']['name']) {
                $image = $_FILES['image']['name'];
                $temp_location = $_FILES['image']['tmp_name'];
                $upload_location = "../images/";

                $result3 = mysqli_query($conn, $sql3);
                if ($result3) {
                    move_uploaded_file($temp_location, $upload_location . $image);
                    $sql4 = "UPDATE products SET image='$image' WHERE id='$product_id'";
                    $result4 = mysqli_query($conn, $sql4);
                    if ($result4) {
                        header("Location: displayproduct.php");
                        exit();
                    } else {
                        echo "Error uploading image: {$conn->error}";
                    }
                } else {
                    echo "Error updating product: {$conn->error}";
                }
            } else {
                $result3 = mysqli_query($conn, $sql3);
                if ($result3) {
                    header("Location: displayproduct.php");
                    exit();
                } else {
                    echo "Error updating product: {$conn->error}";
                }
            }
        }
    } else {
        echo "Go to user dashboard";
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<head>
    <title>Update Product - ASHTASY BD</title>
    <link rel="stylesheet" href="../css/updateproduct.css">
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
        <form action="updateproduct.php?product_id=<?php echo $product_id; ?>" method="post" enctype="multipart/form-data">
            <label for="name">Product Name:</label>
            <input type="text" name="name" value="<?php echo $row2['name']; ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" required><?php echo $row2['description']; ?></textarea>

            <label for="price">Price:</label>
            <input type="number" name="price" value="<?php echo $row2['price']; ?>" required>

            <label for="stock">Stock:</label>
            <input type="number" name="stock" value="<?php echo $row2['stock']; ?>" required>

            <label for="image">Product Image:</label>
            <img src="../images/<?php echo $row2['image']; ?>" alt="" style="max-width: 200px; max-height: 200px; object-fit: cover;">
            <input type="file" name="image">

            <label for="category_name">Category Name:</label>
            <h1>Current Category: <?php echo $row2['category_name']; ?></h1>
            <select name="category_name" required>
                <?php while ($row = mysqli_fetch_assoc($result1)) { ?>
                    <option value="<?php echo $row['name']; ?>" <?php echo ($row['name'] == $row2['category_name']) ? 'selected' : ''; ?>>
                        <?php echo $row['name']; ?>
                    </option>
                <?php } ?>
            </select>

            <input type="submit" class="button" name="submit" value="Update Product">
        </form>
    </div>

    <script src="../js/darkmode.js"></script>

</body>
</html>
