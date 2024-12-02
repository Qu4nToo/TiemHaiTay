<!-- edit_user.php -->
<?php
require_once("../../backend/models/user.php");
// Kiểm tra người dùng đã đăng nhập chưa
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit;
}

// Kết nối cơ sở dữ liệu và lấy thông tin người dùng
$user = getUserById($_SESSION['id']); // Giả sử hàm này trả về thông tin người dùng

// Kiểm tra nếu người dùng gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Lấy dữ liệu từ form
  $data['name'] = $_POST['name'];
  $data['phone'] = $_POST['phone'];
  $data['address'] = $_POST['address'];
  $data['email'] = $user['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['re-password'];

  if (!preg_match('/^[0-9]{10}$/', $data['phone'])) {
    $error1 = '';
    $error1 = "Số điện thoại không hợp lệ! Số điện thoại phải có 10 chữ số.";
  } elseif (!empty($password)) {
    // Kiểm tra mật khẩu (ít nhất 1 ký tự thường, 1 chữ số, và tối thiểu 8 ký tự)
    if (!preg_match('/^(?=.*[a-z])(?=.*\d).{8,}$/', $password)) {
      $error2 = '';
      $error2 = "Mật khẩu phải có ít nhất 8 ký tự, chứa ít nhất 1 ký tự thường và 1 chữ số.";
    } elseif (password_verify($password, $user['password'])) {
      $error4 = "không nhập lại mật khẩu cũ";
    } elseif ($password !== $confirmPassword) {
      $error3 = '';
      $error3 = "Mật khẩu và xác nhận mật khẩu không khớp!";
    } else {
      $data['password'] = password_hash($password, PASSWORD_DEFAULT);
      $updateUser = updateUser($_SESSION['id'], $data);
      if ($updateUser) {
        $_SESSION['name'] = $data['name'];
        header('Location: ../'); // Điều hướng về trang khách hàng
        exit();
      } else {
        echo "Lỗi khi cập nhật khách hàng.";
      }
    }
  }
  // Kiểm tra khớp mật khẩu và xác nhận mật khẩu
  else {
    $data['password'] = $user['password'];
    $updateUser = updateUser($_SESSION['id'], $data);
    if ($updateUser) {
      $_SESSION['name'] = $data['name'];
      header('Location: ../'); // Điều hướng về trang khách hàng
      exit();
    } else {
      echo "Lỗi khi cập nhật khách hàng.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chỉnh sửa thông tin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container w-25 mt-5">
    <h2>Chỉnh sửa thông tin cá nhân</h2>
    <form method="POST" action="">
      <div class="mb-3">
        <label for="fullname" class="form-label">Họ và tên</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
        <?php if (isset($error1))
          echo "<div class='alert alert-danger'>$error1</div>"; ?>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>"
          required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <?php if (isset($error2))
        echo "<div class='alert alert-danger'>$error2</div>"; ?>
      <?php if (isset($error4))
        echo "<div class='alert alert-danger'>$error4</div>"; ?>
      <div class="mb-3">
        <label for="re-password" class="form-label">Nhập lại mật khẩu</label>
        <input type="password" class="form-control" id="re-password" name="re-password">
        <?php if (isset($error3))
          echo "<div class='alert alert-danger'>$error3</div>"; ?>
      </div>
      <button type="submit" class="btn btn-primary ">Cập nhật</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>