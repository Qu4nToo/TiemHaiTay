<?php
require '../config/database.php';
require '../models/product.php';
function handleRequest($action) {
    switch ($action) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy đường dẫn ảnh từ form
                $imagePath = uploadImage($_FILES['image']);
                $_POST['image'] = $imagePath;
                addProduct($_POST);
                header('Location: ../../frontend/admin/products.php');
            }
            break;
        case 'edit':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy đường dẫn ảnh từ form (nếu có upload)
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
function uploadImage($file) {
    if ($file && $file['error'] == UPLOAD_ERR_OK) {
        $targetDir = '../../frontend/assets/images/';
        $fileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDir . $fileName;
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return 'assets/images/' . $fileName; 
        }
    }
    return null; // Không có ảnh
}


