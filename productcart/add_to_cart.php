<?php
session_start();
require_once '../backend/models/product.php';
// Lấy ID sản phẩm từ request
$productId = $_GET['id'] ?? null;

if (!$productId) {
    echo "Product ID is missing.";
    exit();
}

// Kiểm tra và khởi tạo giỏ hàng nếu chưa có
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart = $_SESSION['cart'];

// Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng
$productExists = false;
foreach ($cart as $key => $item) {
    if (is_array($item) && $item['id'] == $productId) {
        // Tăng số lượng sản phẩm nếu đã có trong giỏ hàng
        $_SESSION['cart'][$key]['quantity'] += 1;
        $productExists = true;
        break;
    }
}

// Nếu sản phẩm chưa có trong giỏ hàng, thêm vào
if (!$productExists) {
    $product = getProductById($productId);
    
    if ($product) {
        $_SESSION['cart'][] = [
            'id' => $product['id'],
            'name' => $product['product_name'],
            'price' => $product['price'],
            'quantity' => 1,
            'image' => $product['image']
        ];
    } else {
        echo "Product not found.";
        exit();
    }
}

// Hiển thị giỏ hàng (hoặc chuyển hướng nếu cần)
//print_r($_SESSION['cart']);

 header('Location: ./cart.php'); 
exit();
