<?php
require '../config/database.php';

function handleRequest($action) {
    switch ($action) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                addProduct($_POST);
                header('Location: ../../frontend/admin.php');
            }
            break;
        case 'edit':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                updateProduct($_POST['id'], $_POST);
                header('Location: ../../frontend/admin.php');
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                deleteProduct($_GET['id']);
                header('Location: ../../frontend/admin.php');
            }
            break;
        default:
            echo "Hành động không hợp lệ!";
            break;
    }
}
?>
