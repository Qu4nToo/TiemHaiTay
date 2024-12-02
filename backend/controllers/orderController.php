<?php
require_once '../models/order.php';

function handleRequestOrder($action) {
    switch ($action) {
        case 'addOrder':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                addOrder($_POST); 
                header('Location: ../../frontend/admin/order.php'); 
            }
            break;
        case 'editOrder':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                updateOrder($_POST['id'], $_POST); 
                header('Location: ../../frontend/admin/order.php');
            }
            break;
        case 'deleteOrder':
            if (isset($_GET['id'])) {
                deleteOrder($_GET['id']); 
                header('Location: ../../frontend/admin/order.php');
            }
            break;
        default:
            echo "Hành động không hợp lệ!";
            break;
    }
}
?>
