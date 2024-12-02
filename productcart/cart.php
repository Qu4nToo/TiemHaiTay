<?php
require_once '../backend/config/database.php';
require_once '../backend/models/product.php';
require_once '../backend/models/order.php';
session_start();
$db = getDatabaseConnection();

// Kiểm tra nếu giỏ hàng có sản phẩm không
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Khởi tạo giỏ hàng nếu chưa có
}

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $productId = $_GET['id'];
    unset($_SESSION['cart'][$productId]);
}

// Xử lý đặt hàng
if (isset($_POST['action']) && $_POST['action'] == 'checkout') {
    if (!empty($_SESSION['cart'])) {
        $total = 0;
        $userId = $_SESSION['id'] ?? null; // Giả sử bạn lưu id người dùng trong session

        // Tạo đơn hàng
        $orderData = [
            'order_date' => date('Y-m-d H:i:s'),
            'total_price' => $total,
            'status' => 'pending', // Trạng thái đơn hàng mặc định là 'pending'
            'user_id' => $userId
        ];

        // Thêm đơn hàng vào cơ sở dữ liệu
        $orderId = addOrder($orderData);

        if ($orderId) {
            // Thêm chi tiết sản phẩm vào đơn hàng
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                $product = getProductById($productId);
                if ($product) {
                    // Lưu thông tin sản phẩm vào bảng order_details
                    addOrderDetail($orderId);
                }
            }

            // Sau khi lưu đơn hàng, xóa giỏ hàng
            $_SESSION['cart'] = array();
            echo "<script>alert('Đặt hàng thành công!'); window.location.href = 'cart.php';</script>";
        } else {
            echo "<script>alert('Lỗi khi tạo đơn hàng!');</script>";
        }
    } else {
        echo "<script>alert('Giỏ hàng trống!');</script>";
    }
}

$total = 0;
echo "<h2 class='my-4'>Giỏ hàng của bạn</h2>";
if (empty($_SESSION['cart'])) {
    echo "<div class='alert alert-warning'>Giỏ hàng của bạn hiện tại trống!</div>";
} else {
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Tổng</th><th></th></tr></thead>";
    echo "<tbody>";
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $product = getProductById($productId);
        if ($product) {
            $totalPrice = $product['price'] * $quantity;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($product['product_name']) . "</td>";
            echo "<td>" . number_format($product['price'], 0, ',', '.') . "đ</td>";
            echo "<td>" . $quantity . "</td>";
            echo "<td>" . number_format($totalPrice, 0, ',', '.') . "đ</td>";
            echo "<td><a href='cart.php?action=remove&id=" . $productId . "' class='btn btn-danger'>Xóa</a></td>";
            echo "</tr>";
            $total += $totalPrice;
        }
    }
    echo "</tbody>";
    echo "</table>";
    echo "<h4>Tổng tiền: " . number_format($total, 0, ',', '.') . "đ</h4>";
}
?>

<!-- Nút thanh toán -->
<?php 
if (!empty($_SESSION['cart'])): ?>
    <form method="POST" action="cart.php" class="mt-4">
        <input type="hidden" name="action" value="checkout">
        <button type="submit" class="btn btn-primary btn-lg w-100">Thanh toán</button>
    </form>
<?php endif; ?>
