<?php
require_once '../controllers/productController.php';
require_once '../controllers/userController.php';

$action = $_GET['action'] ?? '';
print_r($action);
$userActions = ['addUser', 'editUser', 'deleteUser'];
$productActions = ['add', 'edit', 'delete','editImage'];
if (in_array($action, $userActions)) {
    handleRequestUser($action);
    exit;
} elseif (in_array($action, $productActions)) {
    handleRequest($action);
    exit;
} else {
    echo "Action không hợp lệ!";
    exit;
}

