<?php
require_once '../controllers/productController.php';
require_once '../controllers/userController.php';

$action = $_GET['action'] ?? '';
print_r($action);
//exit;
// Danh sách các action thuộc user và product
$userActions = ['addUser', 'editUser', 'deleteUser'];
$productActions = ['add', 'edit', 'delete'];

// Phân loại action
if (in_array($action, $userActions)) {
    // Các hành động liên quan đến user
    handleRequestUser($action);
    exit;
} elseif (in_array($action, $productActions)) {
    // Các hành động liên quan đến product
    handleRequest($action);
    exit;
} else {
    echo "Action không hợp lệ!";
    exit;
}
?>
