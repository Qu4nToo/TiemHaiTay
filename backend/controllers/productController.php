<?php
require '../config/database.php';
require '../models/product.php';
function handleRequest($action)
{
    switch ($action) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Kiểm tra tệp được tải lên
                // if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                //     $imagePath = uploadImage($_FILES['image']);
                // }

                // Gán đường dẫn ảnh vào mảng dữ liệu POST
                addProduct($_POST);

                // Chuyển hướng sau khi thêm sản phẩm
                header('Location: ../../frontend/admin/products.php');
                exit();
            }
            break;

        case 'edit':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['id'])) {
                    if($_POST['image']==null){
                        $_POST['image'] = getProductById($_POST['id'])['image'];
                    }
                    updateProduct($_POST['id'], $_POST);
                }

                // Chuyển hướng sau khi chỉnh sửa
                header('Location: ../../frontend/admin/products.php');
                exit();
            }
            break;
        case 'delete':
            // Xóa sản phẩm nếu ID hợp lệ
            if (isset($_GET['id'])) {
                deleteProduct($_GET['id']);
                header('Location: ../../frontend/admin/products.php');
                exit();
            } else {
                echo "Không tìm thấy ID để xóa!";
            }
            break;

        default:
            echo "Hành động không hợp lệ!";
            break;
    }
}
?>
