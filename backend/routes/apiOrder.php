<?php
require_once '../controllers/orderController.php';

$action = $_GET['action'] ?? '';
//print_r($action);
$orderActions = ['addOrder', 'editOrder', 'deleteOrder'];
if (in_array($action, $orderActions)) {
    handleRequestOrder($action); 
    exit;
} else {    
    echo "Action không hợp lệ!";
    exit;
}


