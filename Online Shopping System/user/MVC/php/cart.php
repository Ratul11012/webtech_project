<?php
session_start();  // Start the session

include '../db/db.php';  // Database connection

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to the cart when "Buy Now" is clicked
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        // Add to cart or update the quantity
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity
            ];
        }
    }
}

// Calculate total amount for the cart
$total_amount = 0;
foreach ($_SESSION['cart'] as $cart_item) {
    $total_amount += $cart_item['price'] * $cart_item['quantity'];
}

// Handle order confirmation
if (isset($_POST['confirm_order'])) {
    // Order confirmation logic
    // Insert order into the database (in single_order table)
    $user_id = $_SESSION['user_id'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $size = $_POST['size'];
    $address = $_POST['address'];

    // Insert each product in the cart as an individual order entry in the single_order table
    foreach ($_SESSION['cart'] as $product_id => $cart_item) {
        $product_quantity = $cart_item['quantity'];
        $product_price = $cart_item['price'];
        $total_item_amount = $product_quantity * $product_price;

        $sql = "INSERT INTO single_order (user_id, product_id, product_quantity, total_amount) 
                VALUES ('$user_id', '$product_id', '$product_quantity', '$total_item_amount')";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }
// Optionally, update the stock in the products table
    foreach ($_SESSION['cart'] as $product_id => $cart_item) {
        $product_quantity = $cart_item['quantity'];
        $update_stock_sql = "UPDATE products SET stock = stock - $product_quantity WHERE id = '$product_id'";
        if (!mysqli_query($conn, $update_stock_sql)) {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }

 // Clear the cart after successful order
    $_SESSION['cart'] = [];
    echo "<h2>Order Confirmed!</h2><p>Your order has been placed successfully.</p>";
    header("Location: myorders.php");  // Redirect to my orders page
    exit();
}

// Remove product from cart
if (isset($_GET['remove_product'])) {
    $product_id = $_GET['remove_product'];
    unset($_SESSION['cart'][$product_id]);
    header("Location: cart.php");
    exit();
}


?>
