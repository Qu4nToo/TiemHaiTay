<?php
require '../config/database.php';
require '../models/product.php';
function handleRequest($action)
{
    switch ($action) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $imagePath = uploadImage($_FILES['image']);
                    $_POST['image'] = $imagePath;
                } else {
                    $_POST['image'] = NULL;  
                }
                addProduct($_POST);
                header('Location: ../../frontend/admin/products.php');
            }
            break;
        case 'edit':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $imagePath = uploadImage($_FILES['image']);
                if ($imagePath) {
                    $_POST['image'] = $imagePath;
                }
                updateProduct($_POST['id'], $_POST);
                header('Location: ../../frontend/admin/products.php');
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                deleteProduct($_GET['id']);
                header('Location: ../../frontend/admin/products.php');
            }
            break;
        default:
            echo "Hành động không hợp lệ!";
            break;
    }
}
function uploadImage($file)
{
    if ($file && $file['error'] == UPLOAD_ERR_OK) {
        $targetDir = '../../frontend/assets/img/';
        $fileName = basename($file['name']);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return $fileName;
        }
    } else {
        if ($file) {
            echo "Lỗi tải tệp: " . $file['error'];
        } else {
            echo "Không có tệp nào được gửi.";
        }
        exit;
    }
}
if ($_GET['action'] === 'editImage') {
    if (isset($_FILES['image'])) {
        $productId = $_POST['id'];
        $image = $_FILES['image'];

        // Kiểm tra nếu có ảnh được tải lên
        if ($image['error'] === 0) {
            // Xử lý lưu ảnh
            $imagePath = 'path/to/your/image/directory/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], $imagePath);

            // Cập nhật ảnh vào cơ sở dữ liệu
            $sql = "UPDATE products SET image = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$image['name'], $productId]);

            echo "Ảnh sản phẩm đã được cập nhật!";
        }
    }
}


