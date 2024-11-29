<?php
require_once '../models/order.php';

function handleRequestOrder($action) {
    switch ($action) {
        case 'addOrder':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                addOrder($_POST); // Thêm đơn hàng mới
                header('Location: ../../frontend/admin/order.php'); // Chuyển hướng về trang quản lý đơn hàng
            }
            break;
        case 'editOrder':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                updateOrder($_POST['id'], $_POST); // Cập nhật đơn hàng
                header('Location: ../../frontend/admin/order.php'); // Chuyển hướng về trang quản lý đơn hàng
            }
            break;
        case 'deleteOrder':
            if (isset($_GET['id'])) {
                deleteOrder($_GET['id']); // Xóa đơn hàng
                header('Location: ../../frontend/admin/order.php'); // Chuyển hướng về trang quản lý đơn hàng
            }
            break;
        default:
            echo "Hành động không hợp lệ!";
            break;
    }
}
?>
