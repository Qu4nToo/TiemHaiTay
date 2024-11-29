<?php
require_once __DIR__ . '/../config/database.php';

function getAllUsers() {
    $conn = getDatabaseConnection();
    $result = $conn->query("SELECT * FROM users");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getUserById($id) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function addUser($data) {
    $conn = getDatabaseConnection();
    $randomId = substr(uniqid('user_', true), 0, 32);
    $stmt = $conn->prepare("INSERT INTO users (id, name, phone, email, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssss", // Các kiểu dữ liệu: 's' cho string
        $randomId, 
        $data['name'], 
        $data['phone'], 
        $data['email'], 
        $data['address']
    );
    return $stmt->execute();
}
function updateUser($id, $data) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("UPDATE users SET name = ?, phone = ?, email = ?, address = ? WHERE id = ?");
    $stmt->bind_param(
        "ssssi", 
        $data['name'], 
        $data['phone'], 
        $data['email'], 
        $data['address'], 
        $id
    );
    return $stmt->execute();
}
function deleteUser($id) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("s", $id);
    return $stmt->execute();
}
?>
