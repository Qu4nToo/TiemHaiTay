<?php
require_once '../controllers/userController.php';
$action = $_GET['action'] ?? '';
print_r($action);
$userActions = ['addUser', 'editUser', 'deleteUser'];
if (in_array($action, $userActions)) {
    // Các hành động liên quan đến user
    handleRequestUser($action);
    exit;
} else {
    echo "Action không hợp lệ!";
    exit;
}
?>
