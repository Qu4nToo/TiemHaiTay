<?php
require_once __DIR__ . '/../config/database.php';

function getAllOrders() {
    $conn = getDatabaseConnection();
    $result = $conn->query("SELECT * FROM orders");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getOrderById($id) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
function getOrdersByUserId($userId) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);  // Trả về tất cả các đơn hàng dưới dạng mảng
}
function addOrder($data) {
    $conn = getDatabaseConnection();
    $randomId = substr(uniqid('order_', true), 0, 32);
    if (isset($data['order_date'])) {
        if (strlen($data['order_date']) == 10) {
            $orderDate = $data['order_date'] . ' 00:00:00';
        } else {
            $orderDate = $data['order_date'];
        }
    }
    $status = $data['status'];
    $stmt = $conn->prepare("INSERT INTO orders (id, order_date, total_price, status, user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssss",
        $randomId,
        $orderDate,
        $data['total_price'],
        $status,
        $data['user_id']
    );

    if ($stmt->execute()) {
        return $randomId; // Trả về ID đơn hàng
    }
    return false; // Nếu có lỗi
}

function updateOrder($id, $data) {
    $conn = getDatabaseConnection();
    $status = $data['status'];
    $stmt = $conn->prepare("UPDATE orders SET order_date = ?, total_price = ?, status = ?, user_id = ? WHERE id = ?");
    $stmt->bind_param(
        "sssss", 
        $data['order_date'],
        $data['total_price'],
        $status,  // Sử dụng status dưới dạng string
        $data['user_id'],
        $id
    );
    return $stmt->execute();
}

function deleteOrder($id) {
    $conn = getDatabaseConnection();    
    $stmt = $conn->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->bind_param("s", $id); 
    return $stmt->execute();
}
?>
