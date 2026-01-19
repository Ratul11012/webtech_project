<?php
session_start();  

include '../db/db.php';  

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

    
    $sql = "SELECT * FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        
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


$total_amount = 0;
foreach ($_SESSION['cart'] as $cart_item) {
    $total_amount += $cart_item['price'] * $cart_item['quantity'];
}


if (isset($_POST['confirm_order'])) {
    
    $user_id = $_SESSION['user_id'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $size = $_POST['size'];
    $address = $_POST['address'];

    
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

    foreach ($_SESSION['cart'] as $product_id => $cart_item) {
        $product_quantity = $cart_item['quantity'];
        $update_stock_sql = "UPDATE products SET stock = stock - $product_quantity WHERE id = '$product_id'";
        if (!mysqli_query($conn, $update_stock_sql)) {
            echo "Error: " . mysqli_error($conn);
            exit();
        }
    }

 
    $_SESSION['cart'] = [];
    echo "<h2>Order Confirmed!</h2><p>Your order has been placed successfully.</p>";
    header("Location: myorders.php");  
    exit();
}


if (isset($_GET['remove_product'])) {
    $product_id = $_GET['remove_product'];
    unset($_SESSION['cart'][$product_id]);
    header("Location: cart.php");
    exit();
}


?>

<!DOCTYPE html>
<head>
    <title>Your Cart - ASHTASY BD</title>
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <h1>Your Cart</h1>

<?php if (!empty($_SESSION['cart'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $product_id => $cart_item): ?>
                    <tr>
                        <td><?php echo $cart_item['name']; ?></td>
                        <td><?php echo $cart_item['price']; ?> TK</td>
                        <td><?php echo $cart_item['quantity']; ?></td>
                        <td><?php echo $cart_item['price'] * $cart_item['quantity']; ?> TK</td>
                        <td><a href="cart.php?remove_product=<?php echo $product_id; ?>">Remove</a></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <p>Total Amount: <?php echo $total_amount; ?> TK</p>

        <form action="cart.php" method="post">
            <button type="submit" name="confirm_order">Confirm Order</button>
        </form>

        
        <a href="index.php">
            <button>Continue Shopping</button>
        </a>
    <?php else: ?>
        <p>Your cart is empty!</p>
    <?php endif; ?>




    </body>
</html>
