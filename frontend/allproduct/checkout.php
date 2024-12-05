<?php
session_start();
require_once '../../backend/models/product.php';
require_once '../../backend/models/orderDetail.php';
require_once '../../backend/models/order.php';
require_once '../../backend/models/user.php';

//check neu chua dang nhap
//xu ly user
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/index.php');
    exit();
}
$userId = $_SESSION['user_id'];
$userOrdering = getUserById($userId);
//xu ly don hang
if (empty($_SESSION['cart'])) {
    header('Location: ./index.php');
    exit();
}
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['quantity'] * $item['price'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderData = [
        'order_date' => date('Y-m-d H:i:s'),
        'total_price' => $totalPrice,
        'status' => 'pending',
        'user_id' => $userId,
    ];
    $orderId = addOrder($orderData);
    if ($orderId) {
        foreach ($_SESSION['cart'] as $item) {
            $orderDetailData = [
                'order_id' => $orderId,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];
            //print_r($orderDetailData);
            //exit;
            addOrderDetail($orderDetailData);
        }
        
        unset($_SESSION['cart']);
        echo 'Đơn hàng đã được tạo thành công!<br>';
        echo '<a href="order_success.php">Xem đơn hàng</a>';
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Toàn bộ trang */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 50%;
            height: fit-content;
            max-width: 1200px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Định dạng cho phần header */
        h2 {
            text-align: center;
            margin-top: 20px;
            font-size: 30px;
            color: #333;
        }

        h3 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #666;
        }

        /* Danh sách sản phẩm trong giỏ hàng */
        ul {
            list-style: none;
            padding: 0;
            margin: 0 20px;
        }

        ul li {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        ul li span {
            font-size: 16px;
            color: #555;
        }

        /* Định dạng cho tổng tiền */
        p {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 20px 20px;
        }

        /* Nút thanh toán */
        form button {
            background-color: #28a745;
            color: white;
            font-size: 18px;
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            max-width: 300px;
            display: block;
            margin: 0 auto;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #218838;
        }

        .limited-line {
            width: 50%;
            border-top: 2px solid #000;
            margin: 20px auto;
        }

        form.d-flex {
            display: flex;
            justify-content: space-between;
            /* Căn chỉnh các nút nằm ngang với khoảng cách đều */
            gap: 10px;
            /* Tạo khoảng cách giữa các nút */
        }

        /* Định dạng nút Hủy bỏ */
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Định dạng nút Xác nhận thanh toán */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-custom {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            display: inline-block;
        }

        .btn-custom:hover {
            background-color: darkred;
        }

        /* man hinh nho*/
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }

            body {
                padding: 10px;
            }

            ul li {
                padding: 12px;
                font-size: 14px;
            }

            h2 {
                font-size: 26px;
            }

            h3 {
                font-size: 18px;
            }

            form button {
                max-width: 100%;
                padding: 12px 20px;
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Thanh toán đơn hàng</h2>
        <p><strong>Tên Khách Hàng:</strong>
            <span class="fw-bold">
                <?php
                if ($userOrdering) {
                    echo htmlspecialchars($userOrdering['name']);
                }
                ?>
            </span>
        </p>
        <p><strong>Số điện thoại:</strong>
            <span class="fw-bold">
                <?php
                if ($userOrdering) {
                    echo htmlspecialchars($userOrdering['phone']);
                }
                ?>
            </span>
        </p>
        <p>Địa chỉ:
            <span class="fw-bold">
                <?php
                if ($userOrdering) {
                    echo htmlspecialchars($userOrdering['address']);
                }
                ?>
            </span>
        </p>
        <hr class="limited-line">
        <h3>Giỏ hàng của bạn</h3>
        <ul>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li>
                    <span><?= htmlspecialchars($item['name']); ?> x <?= $item['quantity']; ?> -
                        <?= number_format($item['price'], 0); ?> đ</span>
                </li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Tổng tiền: </strong><?= number_format($totalPrice, ); ?> đ</p>
        <form method="POST" class="d-flex">
            <a href="../allproduct/index.php" class="btn btn-danger text-white text-decoration-none btn-custom">Hủy
                bỏ</a>
            <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
        </form>

    </div>
</body>

</html>