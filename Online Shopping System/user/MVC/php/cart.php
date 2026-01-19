<?php
session_start();  // Start the session

include '../db/db.php';  // Database connection

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

