<?php
require_once '../../backend/models/user.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        // Gọi hàm getCustomerByEmail để lấy thông tin người dùng theo email
        $user = getCustomerByEmail($email);
        //print_r($user);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Lưu thông tin người dùng vào session
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['user_id'] = $user['id'];
                // Điều hướng đến trang chủ
                header("Location: ../");
                exit();
            } else {
                $error1 = "Mật khẩu không đúng!";
            }

        } else {
            $error2 = "Email không đúng!";
        }
    } catch (Exception $e) {
        $error = "Có lỗi xảy ra: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <link rel="icon" href="img/CentralPark-logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/99c03377a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"
        type="text/javascript"></script>
</head>
<style>
    .error-text {
        color: red;
    }

    .gradient-custom {
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
    }
</style>

<body>
    <div id="content" class="d-flex justify-content-center align-items-center vh-100 gradient-custom">
        <form id="login-form" class="p-5 rounded-4 border border-success bg-white" name="frmLogin" action="" method="POST">
            <h1 class="text-center mb-2">Login</h1>
            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="username">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <?php if (isset($error2))
                    echo "<div class='alert alert-danger'>$error2</div>";
                    unset($error2);
                ?>
            </div>

            <div data-mdb-input-init class="form-outline mb-2">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                <?php if (isset($error1))
                    echo "<div class='alert alert-danger'>$error1</div>"; 
                    unset($error1);
                ?>  
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign
                    in</button>
            </div>


            <div class="text-center">
                <p>Not a member? <a href="../register/">Register</a></p>
            </div>
            <div class="text-center">
                <p><a href="../" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i>Go back</a></p>
            </div>
        </form>
    </div>
</body>