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
                // if (isset($_FILES['image'])) {
                //     $file = $_FILES['image'];
            
                //     // Kiểm tra trạng thái lỗi của file
                //     if ($file['error'] !== UPLOAD_ERR_OK) {
                //         echo 'Lỗi khi tải lên file: ';
                //         switch ($file['error']) {
                //             case UPLOAD_ERR_INI_SIZE:
                //                 echo 'Kích thước file vượt quá giới hạn cấu hình upload_max_filesize.';
                //                 break;
                //             case UPLOAD_ERR_FORM_SIZE:
                //                 echo 'Kích thước file vượt quá giới hạn trong form HTML.';
                //                 break;
                //             case UPLOAD_ERR_PARTIAL:
                //                 echo 'File chỉ được tải lên một phần.';
                //                 break;
                //             case UPLOAD_ERR_NO_FILE:
                //                 echo 'Không có file nào được tải lên.';
                //                 break;
                //             case UPLOAD_ERR_NO_TMP_DIR:
                //                 echo 'Thư mục tạm không tồn tại.';
                //                 break;
                //             case UPLOAD_ERR_CANT_WRITE:
                //                 echo 'Không thể ghi file vào đĩa.';
                //                 break;
                //             case UPLOAD_ERR_EXTENSION:
                //                 echo 'Tải lên file bị chặn bởi một extension.';
                //                 break;
                //             default:
                //                 echo 'Lỗi không xác định.';
                //         }
                //         exit;
                //     }
            
                //     // Kiểm tra loại file (chỉ chấp nhận ảnh)
                //     $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
                //     $fileMimeType = mime_content_type($file['tmp_name']);
                //     if (!in_array($fileMimeType, $allowedMimeTypes)) {
                //         echo 'Loại file không hợp lệ. Chỉ chấp nhận JPEG, PNG hoặc GIF.';
                //         exit;
                //     }
            
                //     // Kiểm tra kích thước file
                //     $maxFileSize = 2 * 1024 * 1024; // 2MB
                //     if ($file['size'] > $maxFileSize) {
                //         echo 'Kích thước file vượt quá 2MB.';
                //         exit;
                //     }
            
                //     // Nếu mọi thứ hợp lệ, hiển thị thông tin file
                //     echo 'File hợp lệ!<br>';
                //     echo 'Tên file: ' . htmlspecialchars($file['name']) . '<br>';
                //     echo 'Kích thước file: ' . $file['size'] . ' bytes<br>';
                //     echo 'Loại file: ' . $fileMimeType . '<br>';
            
                //     // Thêm code lưu file (nếu cần)
                //     $uploadDir = 'uploads/';
                //     $uploadPath = $uploadDir . basename($file['name']);
            
                //     if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                //         echo 'File đã được lưu thành công vào ' . htmlspecialchars($uploadPath);
                //     } else {
                //         echo 'Lỗi khi lưu file.';
                //     }
                // } else {
                //     echo 'Không có file nào được gửi lên.';
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
