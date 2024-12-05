<?php
session_start();
require_once '../../backend/models/order.php';
require_once '../../backend/models/orderDetail.php';
require_once '../../backend/config/database.php';
require_once '../../backend/models/product.php';
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index.php');
    exit();
}

$userId = $_SESSION['user_id'];

// Kiểm tra xem đã có order_id trong URL chưa
if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    echo "Không tìm thấy đơn hàng.";
    exit();
}
$orderId = $_GET['order_id'];
$order = getOrderById($orderId);
if ($order['user_id'] != $userId) {
    echo "Bạn không có quyền xem đơn hàng này.";
    exit();
}

// Lấy chi tiết các sản phẩm trong đơn hàng
$orderDetails = getOrderDetailsByOrderId($orderId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            width: 50%;
            margin: 0 auto;  
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
        }

        /* Tiêu đề trang */
        h2 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 30px;
        }

        h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
        }

        /* Thông tin đơn hàng */
        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 5px 0;
            color: #555;
        }

        p strong {
            color: #007BFF;
        }

        /* CSS cho bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #555;
            font-size: 16px;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        a.btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 30px;
            transition: background-color 0.3s ease;
        }

        a.btn:hover {
            background-color: #218838;
        }

        a.btn:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
        }

        /* Mobile Responsive */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 10px;
            }

            h2 {
                font-size: 24px;
            }

            h3 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Chi tiết đơn hàng</h2>

        <!-- Thông tin đơn hàng -->
        <p><strong>Mã đơn hàng:</strong> <?= $order['id']; ?></p>
        <p><strong>Ngày đặt:</strong> <?= date('d-m-Y H:i', strtotime($order['order_date'])); ?></p>
        <p><strong>Tổng tiền:</strong> <?= number_format($order['total_price'], 2); ?> đ</p>
        <p><strong>Trạng thái:</strong> <?= htmlspecialchars($order['status']); ?></p>

        <hr class="limited-line">

        <h3>Chi tiết sản phẩm trong đơn hàng</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderDetails as $detail): ?>
                    <tr>
                        <?php
                        $productInOrderDetail = getProductById($detail['product_id']);
                        ?>
                        <td><?= htmlspecialchars($productInOrderDetail['product_name']); ?></td>
                        <td><?= $detail['quantity']; ?></td>
                        <td><?= number_format($detail['price'], 2); ?> đ</td>
                        <td><?= number_format($detail['price'] * $detail['quantity'], 2); ?> đ</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="viewOrderUser.php" class="btn btn-primary">Quay lại danh sách đơn hàng</a>
    </div>
</body>

</html>