<?php
    $id=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .notification-container {
            text-align: center;
            background: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .notification-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        .notification-container a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .notification-container a:hover {
            background-color: #0056b3;
        }

        .notification-container p {
            margin-top: 10px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="notification-container">
        <h1>Đơn hàng đã được tạo thành công!</h1>
        <p>Mã đơn hàng của bạn là: <strong><?php echo $id; ?></strong></p>
        <a href="viewOrderDetail.php?order_id=<?php echo $id; ?>">Xem đơn hàng</a>
    </div>
</body>
</html>