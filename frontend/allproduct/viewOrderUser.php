<?php
session_start();
require_once '../../backend/models/order.php';
require_once '../../backend/models/orderDetail.php';
require_once '../../backend/config/database.php';
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index.php');
    exit();
}

$userId = $_SESSION['user_id'];
$orders = getOrdersByUserId($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Đặt nền và chiều rộng cho container */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        /* Thêm khoảng cách cho văn bản */
        p {
            font-size: 18px;
            color: #555;
            text-align: center;
            margin-bottom: 20px;
        }

        /* CSS cho bảng */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        /* Chỉnh sửa màu khi hover vào dòng trong bảng */
        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-info {
            padding: 8px 15px;
            background-color: #17a2b8;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        /* CSS cho trạng thái đơn hàng */
        .status {
            font-weight: bold;
            color: #28a745;
            /* Màu xanh lá cho trạng thái thành công */
        }

        .status.pending {
            color: #ffc107;
            /* Màu vàng cho trạng thái chờ */
        }

        .status.cancelled {
            color: #dc3545;
            /* Màu đỏ cho trạng thái hủy */
        }

        /* Mobile Responsive */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
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
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="../">về trang chủ</a>
        <h2>Danh sách đơn hàng của bạn</h2>
        <?php if (empty($orders)): ?>
            <p>Bạn chưa có đơn hàng nào.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['id']; ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($order['order_date'])); ?></td>
                            <td><?= number_format($order['total_price'], 2); ?> đ</td>
                            <td class="status <?= strtolower($order['status']); ?>"><?= htmlspecialchars($order['status']); ?>
                            </td>
                            <td><a href="./viewOrderDetail.php?order_id=<?= $order['id']; ?>" class="btn btn-info">Xem chi tiết</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>