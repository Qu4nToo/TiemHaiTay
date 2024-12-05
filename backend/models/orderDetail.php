<?php
require_once __DIR__ . '/../config/database.php';
function getOrderDetailsByOrderId($orderId) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("SELECT * FROM order_details WHERE order_id = ?");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
function addOrderDetail($data) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param(
        "ssid", // Các kiểu dữ liệu: 'i' cho integer, 'd' cho double
        $data['order_id'],
        $data['product_id'],
        $data['quantity'],
        $data['price']
    );
    return $stmt->execute();
}
function updateOrderDetail($id, $data) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("UPDATE order_details SET order_id = ?, product_id = ?, quantity = ?, price = ? WHERE id = ?");
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
    $stmt = $conn->prepare("DELETE FROM order_details WHERE id = ?");
    $stmt->bind_param("s", $id);
    return $stmt->execute();
}
function getOrderDetailsWithProductInfo($orderId) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("
        SELECT od.*, p.name AS product_name, p.description, p.image 
        FROM orderdetails od
        JOIN products p ON od.product_id = p.id
        WHERE od.order_id = ?
    ");
    $stmt->bind_param("s", $orderId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

