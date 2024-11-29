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

function addOrder($data) {
    $conn = getDatabaseConnection();
    $randomId = substr(uniqid('order_', true), 0, 32);

    // Kiểm tra và chuẩn hóa order_date
    if (isset($data['order_date'])) {
        // Kiểm tra xem nếu order_date không có giờ, thêm giờ mặc định
        if (strlen($data['order_date']) == 10) {  // Định dạng YYYY-MM-DD có độ dài 10 ký tự
            $orderDate = $data['order_date'] . ' 00:00:00';  // Thêm giờ mặc định
        } else {
            $orderDate = $data['order_date'];  // Nếu có đầy đủ giờ
        }
    }
    $status = $data['status'];
    // print_r($status);
    // exit;
    $stmt = $conn->prepare("INSERT INTO orders (id, order_date, total_price, status, user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssss", // Các kiểu dữ liệu: 's' cho string, 'i' cho integer
        $randomId,
        $orderDate,
        $data['total_price'],
        $status,  // Sử dụng status dưới dạng string
        $data['user_id']
    );
    return $stmt->execute();
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
