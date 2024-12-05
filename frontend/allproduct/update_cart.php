<?php
session_start();
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

    header('Location: ./index.php');
    exit;
}

