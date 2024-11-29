<?php
require_once __DIR__ . '/../config/database.php';

// Lấy tất cả chi tiết đơn hàng theo order_id
function getOrderDetailsByOrderId($orderId) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("SELECT * FROM orderdetails WHERE order_id = ?");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Thêm chi tiết đơn hàng
function addOrderDetail($data) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("INSERT INTO orderdetails (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param(
        "siid", // Các kiểu dữ liệu: 'i' cho integer, 'd' cho double
        $data['order_id'],
        $data['product_id'],
        $data['quantity'],
        $data['price']
    );
    return $stmt->execute();
}

// Cập nhật chi tiết đơn hàng
function updateOrderDetail($id, $data) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("UPDATE orderdetails SET order_id = ?, product_id = ?, quantity = ?, price = ? WHERE id = ?");
    $stmt->bind_param(
        "siidi", // Các kiểu dữ liệu: 'i' cho integer, 'd' cho double
        $data['order_id'],
        $data['product_id'],
        $data['quantity'],
        $data['price'],
        $id
    );
    return $stmt->execute();
}

function deleteOrderDetail($id) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("DELETE FROM orderdetails WHERE id = ?");
    $stmt->bind_param("s", $id);
    return $stmt->execute();
}
?>
