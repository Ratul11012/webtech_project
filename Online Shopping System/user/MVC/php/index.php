<?php
session_start();
include '../db/db.php'; 

$sql_category = "SELECT * FROM categories";
$result_category = mysqli_query($conn, $sql_category);


if (isset($_GET['category_name']) && $_GET['category_name'] != '') {
    $category_name = mysqli_real_escape_string($conn, $_GET['category_name']);
    $sql_product_category = "SELECT * FROM products WHERE category_name='$category_name' AND stock > 0";
} else {
    $sql_product_category = "SELECT * FROM products WHERE stock > 0";
}

$result_product_category = mysqli_query($conn, $sql_product_category);
if (!$result_product_category) {
    die("Product Query Failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<head>
    <title>ASHTASY BD - Shop</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/darkmode.css">
</head>
<body>

    <center>
        <h3 id="pagetitle">Light Mode</h3>
        <button id="switchbutton" onclick="toggle()">Switch to Dark Mode</button>
    </center>

    <header class="header">
        <a href="index.php" class="brandName" style="font-size: 24px; color: #ffd752ff;">ASHTASY</a>
        
        <ul class="category-links">
            <?php 
            while ($row_category = mysqli_fetch_assoc($result_category)) {
            ?>
                <li><a href="index.php?category_name=<?php echo $row_category['name']; ?>">
                <?php echo $row_category['name']; ?>
                </a></li>
            <?php 
            } 
            ?>
        </ul>

        <nav>
            <ul>
                <?php 
                if(!isset($_SESSION['user_id'])){ ?> 
                <li> <a href="login.php">LOGIN </a> </li>
                <li> <a href="register.php">SIGNUP </a> </li>
                <?php } ?>

                <li> <a href="dashboard.php">DASHBOARD </a> </li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <?php 
        while ($row_product_category = mysqli_fetch_assoc($result_product_category)) {
        ?>
            <div class="product">
                <img src="../images/<?php echo $row_product_category['image']; ?>" alt="productImg">
                <h2><?php echo $row_product_category['name']; ?></h2>
                <p><?php echo $row_product_category['description']; ?></p>
                <p class="productPrice">TK. <?php echo $row_product_category['price']; ?> </p>

                <?php
                if (isset($_SESSION['user_id'])) {
                ?>  
               
                <form action="cart.php" method="get">
                    <input type="hidden" name="product_id" value="<?php echo $row_product_category['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $row_product_category['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row_product_category['price']; ?>">
                    <input type="number" name="quantity" min="1" max="<?php echo $row_product_category['stock']; ?>" placeholder="Quantity" required><br>
                    <input type="submit" name="add_to_cart" value="Buy Now">
                </form>
                <?php
                }
                else {
                ?>  
                    <a href="login.php">Buy Now</a>   
                <?php 
                }
                ?>
            </div>
        <?php 
        }
        ?>
    </main>

    <footer class="footer">
        <p>&copy; 2025 ASHTASY BD, ALL RIGHTS RESERVED. DESIGNED & DEVELOPED BY MUSTAKIM & FAHIM.</p>
    </footer>

    <script src="../js/darkmode.js"></script>
</body>
</html>
