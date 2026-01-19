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

