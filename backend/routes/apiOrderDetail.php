<?
require_once '../../../backend/models/orderDetail.php';
if ($_GET['action'] == 'getOrderDetails') {
    $orderId = $_GET['id'];

    // Gọi model để lấy thông tin chi tiết đơn hàng
    $orderDetails = getOrderDetailsByOrderId($orderId);
    $productDetails = getOrderDetailsWithProductInfo($orderId);

    echo json_encode([
        'orderDetails' => $orderDetails,
        'productDetails' => $productDetails,
    ]);
    exit;
}