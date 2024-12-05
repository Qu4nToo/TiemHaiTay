<?
require_once '../../../backend/models/orderDetail.php';
if ($_GET['action'] == 'getOrderDetails') {
    $orderId = $_GET['id'];
    $orderDetails = getOrderDetailsByOrderId($orderId);
    $productDetails = getOrderDetailsWithProductInfo($orderId);
    echo json_encode([
        'orderDetails' => $orderDetails,
        'productDetails' => $productDetails,
    ]);
    exit;
}