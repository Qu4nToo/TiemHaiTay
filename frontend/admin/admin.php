<?php
require_once '../backend/models/product.php';
$products = getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <h1>Quản lý sản phẩm</h1>
    <form action="../backend/routes/api.php?action=add" method="POST">
        <input type="text" name="product_type" placeholder="Loại sản phẩm" required>
        <input type="text" name="product_name" placeholder="Tên sản phẩm" required>
        <input type="text" name="ram" placeholder="RAM">
        <input type="text" name="rom" placeholder="ROM">
        <input type="text" name="warranty" placeholder="Bảo hành">
        <input type="number" step="0.01" name="price" placeholder="Giá">
        <input type="text" name="card" placeholder="Card">
        <input type="checkbox" name="status" value="1"> Còn hàng
        <textarea name="description" placeholder="Mô tả"></textarea>
        <button type="submit">Thêm sản phẩm</button>
    </form>

    <h2>Danh sách sản phẩm</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Loại</th>
            <th>Tên</th>
            <th>RAM</th>
            <th>ROM</th>
            <th>Bảo hành</th>
            <th>Giá</th>
            <th>Card</th>
            <th>Trạng thái</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['product_type'] ?></td>
            <td><?= $product['product_name'] ?></td>
            <td><?= $product['ram'] ?></td>
            <td><?= $product['rom'] ?></td>
            <td><?= $product['warranty'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['card'] ?></td>
            <td><?= $product['status'] ? 'Còn hàng' : 'Hết hàng' ?></td>
            <td><?= $product['description'] ?></td>
            <td>
                <a href="../backend/routes/api.php?action=delete&id=<?= $product['id'] ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
