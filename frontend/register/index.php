<?php
require_once '../../backend/models/user.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data['name'] = $_POST['name'];
    $data['phone'] = $_POST['phone'];
    $data['address'] = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['re-password'];

    // Biến chứa thông báo lỗi


    // Kiểm tra số điện thoại (chỉ chấp nhận 10 chữ số)
    if (!preg_match('/^[0-9]{10}$/', $data['phone'])) {
        $error1 = '';
        $error1 = "Số điện thoại không hợp lệ! Số điện thoại phải có 10 chữ số.";
    }
    // Kiểm tra mật khẩu (ít nhất 1 ký tự thường, 1 chữ số, và tối thiểu 8 ký tự)
    elseif (!preg_match('/^(?=.*[a-z])(?=.*\d).{8,}$/', $password)) {
        $error2 = '';
        $error2 = "Mật khẩu phải có ít nhất 8 ký tự, chứa ít nhất 1 ký tự thường và 1 chữ số.";
    }
    // Kiểm tra khớp mật khẩu và xác nhận mật khẩu
    elseif ($password !== $confirmPassword) {
        $error3 = '';
        $error3 = "Mật khẩu và xác nhận mật khẩu không khớp!";
    } elseif (getCustomerByEmail($email)) {
        $error4 = "Email đã tồn tại! Vui lòng sử dụng email khác.";
    } else {
        // Hash mật khẩu trước khi lưu vào cơ sở dữ liệu
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $data['email'] = $_POST['email'];
        $addSuccess = addUser($data);
        if ($addSuccess) {
            header('Location: ../login');
            exit();
        } else {
            $error = '';
            $error = "Đăng ký không thành công. Vui lòng thử lại.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng ký</title>
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
    .error {
        color: #ff0000;
    }

    .gradient-custom {
        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
    }
</style>

<body class=" gradient-custom">
    <div>
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="row d-flex h-100  justify-content-center my-4">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5 pt-4">
                                <h2 class="text-uppercase text-center mb-3">Create an account</h2>
                                <?php if (isset($error))
                                    echo "<div class='alert alert-danger'>$error</div>"; ?>
                                <form id="register-form" name="frmRegister" action="" Method="POST">
                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="email">User Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Tên người dùng"
                                            required>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="email">Your Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            required>
                                        <?php if (isset($error4))
                                            echo "<div class='alert alert-danger'>$error4</div>"; ?>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="Số điện thoại" required>
                                        <?php if (isset($error1))
                                            echo "<div class='alert alert-danger'>$error1</div>"; ?>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="Address">Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ"
                                            required>
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Mật khẩu" required>
                                        <?php if (isset($error2))
                                            echo "<div class='alert alert-danger'>$error2</div>"; ?>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="re-password">Repeat your password</label>
                                        <input type="password" class="form-control" name="re-password"
                                            placeholder="Re-password" />
                                        <?php if (isset($error3))
                                            echo "<div class='alert alert-danger'>$error3</div>"; ?>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-block mb-2"
                                            id="submitBtn">Register</button>
                                    </div>

                                    <div id="success-message" class="alert alert-success d-none" role="alert">
                                        Registration successful! You can now log in.
                                    </div>

                                    <p class="text-center text-muted mt-3 mb-0">Have already an account? <a
                                            href="../login/" class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>