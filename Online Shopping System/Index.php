<?php 
session_start();
include "db.php";


if (isset($_GET['category_name']) && $_GET['category_name'] != '') {
    $category_name = mysqli_real_escape_string($conn, $_GET['category_name']);
    $sql_product_category = "SELECT * FROM products WHERE category_name='$category_name'and stock > 0";
} else {

    $sql_product_category = "SELECT * FROM products WHERE stock > 0";
}

$result_product_category = mysqli_query($conn, $sql_product_category);
if (!$result_product_category) {
    die("Product Query Failed: " . mysqli_error($conn));
}

$sql_category = "SELECT * FROM categories";
$result_category = mysqli_query($conn, $sql_category);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>ASHTASY BD</title>
       
        <style>
        
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
        }

        .body{
            background-color: lightgray;
            color:#333;
        }

        /* Header Styling */

        .header{
                background-color:  #0d1553a7;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 30px;     
                position: fixed;
                width: 100%;
                top: 0; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        
        .header a{
            text-decoration: none;
            color: white;
            font-size: 12px;
            font-weight: bold;
            margin-left: 20px;
        }

        .header ul{
            display: flex;
            list-style: none;
        }

        .header li{
            margin-right:50px;

        }

        .header a:hover{
            color: orange;
        }

        /* Brand Name Styling */
        .brandName{
            font-family:'lucida handwriting', cursive;
            font-weight: bold;
            color: white;
            margin-right: auto;
            text-decoration: none;
            letter-spacing: 2px;
            text-align: center;
            flex-grow:1;
            
        }


        /* Categories in the header */
        .category-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-start;
            margin-left: 20px;
            overflow-x: auto; /* Allow horizontal scrolling if needed */
            overflow-y: hidden; /* Prevent vertical scrollbar */
            white-space: nowrap; /* Ensure categories don't wrap */
        }


        .category-links li {
            margin-right: 15px; /* Spacing between categories */
        }


        .category-links a {
           text-decoration: none;
           color: #fff;
           background-color: #0d1553;
           padding: 10px 20px;
           border-radius: 30px;
           font-size: 14px;
           font-weight: bold;
           display: inline-block;
        }


        .category-links a:hover {
           background-color: #FFD700;
           color: #000;
        }

        /* Active category styling (if selected) */
        .category-links a.active {
            background-color: #4CAF50;
            color: white;
        }
        


        /* Main Content Styling */

        .main{
            margin-top: 100px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            justify-items: center;
            padding: 20px;

            
        }

        .product{
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12x rgba(0, 0, 0, 0.1);
            margin: 20px;
            border: 2px solid black;
            max-width: 300px;
            padding: 30px;
            text-align: center;

        }

        .product:hover{
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        
        }

          .product a{
            display:block;
            text-decoration: none;
            color: black;
            background-color: #5e94b8ff;
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            
        }
        
        .product a:hover{
            background-color: darkorange;
        }

        .product h2{
            margin: 15px 0;
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }


        .product p{
            fomnt-size: 14px;
            color: #666;
        }



        /* Product Image Styling */ 

        .product img{
            width: 100px;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid black;
        }

        .product .productPrice{
            font-weight: bold;
            font-size: 18px;
            color: #E74C3C; 
            margin: 10px 0;
        }
        
        
   
        /* Footer Styling */

        .footer{
            text-align: center;
            background-color: lightblue;
            color: white;
            position:sticky;
            bottom: 0;
            padding: 5px;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer p{
            text-align: center;
            font-size: 14px;
            color: black;
        }

        </style>

    </head>


    <body>

    <header class="header">
    <a href="index.php">SHOP</a>
    <a href="index.php"  class="brandName" style="font-size: 24px; color: #ffd752ff;"> ASHTASY </a>       
    
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
    
        <li> <a href="admin/dashboard.php">DASHBOARD </a> </li>
             
     
    </ul>
    </nav>
    </header>



    <main class="main"> 

  <?php 
    while ($row_product_category = mysqli_fetch_assoc($result_product_category)) {
?>
    <div class="product"> 
        <img src="image/<?php echo $row_product_category['image']; ?>" alt="productImg">
        <h2><?php echo $row_product_category['name']; ?></h2>
        <p><?php echo $row_product_category['description']; ?></p>
        <p><?php echo $row_product_category['stock']; ?></p>
        <p class="productPrice">TK. <?php echo $row_product_category['price']; ?> </p>

        <?php
        if (isset($_SESSION['user_id'])) {
        ?>  

        <form action="singleorder.php" method="get">
             <input type="number" name="user_id" value="<?php echo ($_SESSION['user_id']); ?>" hidden>
             <input type="number" name="product_id" value="<?php echo ($row_product_category['id']); ?>" hidden>
             <input type="number" name="product_price" value="<?php echo ($row_product_category['price']); ?>" hidden>
             <input type="number" name="quantity" min="1" max="<?php echo ($row_product_category['stock']); ?>" placeholder="Enter Quantity" required><br>
             <input type="submit" name="submit" value="Buy Now">
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

    

     
        
    

    
<!--
   
    <div class="product"> 
        <img src="productImg/hoodie1.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Comfortable levander hoodie for casual wear.</p>
        <p class="productPrice">TK. 3999 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/hoodie2.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p> stylish black hoodie perfect for casual wear.</p>
        <p class="productPrice">TK. 2899 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/hoodie3.jpg" alt="productImg">
        <h2>ASHTASY HOODIE </h2>
        <p>Solid beige hoodie perfect for casual wear.</p>
        <p class="productPrice">TK. 3599 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/hoodie4.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Cozy charcoal hoodie for effortless everyday style.</p>
        <p class="productPrice">TK. 1599 </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie5.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Cream marble hoodie, effortlessly cool comfort.</p>
        <p class="productPrice">TK. 2199 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/hoodie6.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Rich mocha hoodie, minimal and effortlessly relaxed.</p>
        <p class="productPrice">TK. 3999 </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie7.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Oversized black quarter-zip hoodie, minimalist design.</p>
        <p class="productPrice">TK. 3799 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/hoodie8.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Mustard hoodie with 3D black spine graphic.</p>
        <p class="productPrice">TK. 1849 </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie9.jpeg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>White “PROVIDENCE” print hoodie, casual fit.</p>
        <p class="productPrice">TK. 2199 </p>
        <a href="#">Buy Now</a>
    </div>

        
    <div class="product"> 
        <img src="productImg/jacket1.jpg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>Beige suede-style zip-up jacket, clean minimal look.</p>
        <p class="productPrice">TK. 4999 </p>
        <a href="#">Buy Now</a>
    </div>


     <div class="product"> 
        <img src="productImg/jacket4.jpeg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>Light grey zip-up fleece jacket, casual.</p>
        <p class="productPrice">TK. 5099 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/jacket2.jpg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>Black faux-leather biker jacket with stand collar.</p>
        <p class="productPrice">TK.8999 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/jacket3.jpg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>Oversized light grey zip-up windbreaker jacket.</p>
        <p class="productPrice">TK. 5099 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/jacket5.jpeg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>Navy quilted sleeveless puffer zip-up jacket.</p>
        <p class="productPrice">TK. 3000 </p>
        <a href="#">Buy Now</a>
    </div>


    <div class="product"> 
        <img src="productImg/jacket6.jpeg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>Black track jacket with contrast sleeve piping.</p>
        <p class="productPrice">TK. 3856 </p>
        <a href="#">Buy Now</a>
    </div>
-->

    </main>


    <footer class="footer">

        <p>&copy; 2025 ASHTASY BD, ALL RIGHTS RESERVED. DESIGNED & DEVELOPED BY MUSTAKIM & FAHIM.</p>

    </footer>


    </body>
</html>