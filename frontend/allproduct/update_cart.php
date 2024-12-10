<?php
session_start();
if (!isset($_SESSION['previous_page']) && isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = $_POST['id'] ?? null;
    if ($action === 'update_cart' && $id !== null) {
        $quantity = max(1, (int) ($_POST['quantity'] ?? 1));
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    } elseif ($action === 'remove' && $id !== null) {
        unset($_SESSION['cart'][$id]);
    }
    $redirect_url = $_SESSION['previous_page'] ?? './index.php';
    unset($_SESSION['previous_page']); 
    header("Location: $redirect_url");
    exit;
}

