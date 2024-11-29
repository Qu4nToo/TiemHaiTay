<?php
require_once '../models/user.php';

function handleRequestUser($action) {
    switch ($action) {
        case 'addUser':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                addUser($_POST);
                header('Location: ../../frontend/admin/users.php');
            }
            break;
        case 'editUser':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                updateUser($_POST['id'], $_POST);
                header('Location: ../../frontend/admin/users.php');
            }
            break;
        case 'deleteUser':
            if (isset($_GET['id'])) {
                deleteUser($_GET['id']);
                header('Location: ../../frontend/admin/users.php');
            }
            break;
        default:
            echo "Hành động không hợp lệ!";
            break;
    }
}
?>
