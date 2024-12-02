<?php
session_start();
require_once '.../backend/models/order.php';

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "Giỏ hàng của bạn trống!";
    exit();
}

// Lấy thông tin từ giỏ hàng
$cart = $_SESSION['cart'];
$total = array_reduce($cart, fn($sum, $item) => $sum + $item['price'] * $item['quantity'], 0);

// Thực hiện lưu đơn hàng
$orderId = createOrder($_SESSION['name'], $total); // Hàm này sẽ lưu đơn hàng vào CSDL và trả về ID
foreach ($cart as $item) {
    addOrderItem($orderId, $item['id'], $item['quantity'], $item['price']); // Lưu chi tiết đơn hàng
}

// Xóa giỏ hàng sau khi thanh toán
unset($_SESSION['cart']);
echo "Đơn hàng của bạn đã được xử lý!";
