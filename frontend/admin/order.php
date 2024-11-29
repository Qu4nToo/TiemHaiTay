<?php
include './components/header.php';
require_once '../../backend/models/order.php';
require_once '../../backend/models/user.php';

$orders = getAllOrders();
$users = getAllUsers();
?>
<link rel="stylesheet" href="../../frontend/assets/css/style.css">
<div class="container-fluid">
    <?php include './components/navbar.php'; ?>
    <div class="row mt-4">
        <div class="col-md-12">
            <h2 class="text-left mb-5">Quản lý Đơn Hàng</h2>
            <form action="../../backend/routes/apiOrder.php?action=addOrder" method="POST" class="mb-4">
                <div class="row">
                    <div class="col-12 col-md-2 mb-3">
                        <input type="datetime-local" name="order_date" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <input type="number" name="total_price" class="form-control" placeholder="Tổng giá" required>
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <select name="status" class="form-control" required>
                            <option value="pending">Chờ xử lý</option>
                            <option value="shipped">Đang giao</option>
                            <option value="delivered">Đã giao</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-user_id" class="form-label">Người dùng</label>
                        <select name="user_id" id="edit-user_id" class="form-control select2" required>
                            <option value="">Chọn người dùng</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Thêm đơn hàng</button>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng giá</th>
                        <th>Trạng thái</th>
                        <th>Người dùng</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['id'] ?></td>
                            <td><?= date('Y-m-d H:i:s', strtotime($order['order_date'])) ?></td>
                            <td><?= number_format($order['total_price'], 2) ?> VND</td>
                            <td><?= ucfirst($order['status']) ?></td>
                            <td><?= getUserById($order['user_id'])['name'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $order['id'] ?>"
                                    data-order_date="<?= $order['order_date'] ?>"
                                    data-total_price="<?= $order['total_price'] ?>" data-status="<?= $order['status'] ?>"
                                    data-user_id="<?= $order['user_id'] ?>" data-toggle="modal"
                                    data-target="#editModal">Sửa</button>
                                <a href="../../backend/routes/apiOrder.php?action=deleteOrder&id=<?= $order['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal sửa đơn hàng -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" action="../../backend/routes/apiOrder.php?action=editOrder" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Sửa đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="edit-order_date" class="form-label">Ngày đặt hàng</label>
                        <input type="date" name="order_date" id="edit-order_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-total_price" class="form-label">Tổng giá</label>
                        <input type="number" name="total_price" id="edit-total_price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-status" class="form-label">Trạng thái</label>
                        <select name="status" id="edit-status" class="form-control" required>
                            <option value="pending">Chờ xử lý</option>
                            <option value="shipped">Đang giao</option>
                            <option value="delivered">Đã giao</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-user_id" class="form-label">Người dùng</label>
                        <select name="user_id" id="edit-user_id" class="form-control" required>
                            <option value="">Chọn người dùng</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include './components/footer.php'; ?>

<script>

$(document).ready(function () {
    $('#select-user').select2({
        placeholder: "Tìm kiếm người dùng...",
        allowClear: true,
        minimumInputLength: 1,  // Tìm kiếm khi nhập ít nhất 1 ký tự
        width: '100%',
    });

    // Xử lý khi nhấn nút sửa đơn hàng
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            var modal = new bootstrap.Modal(document.getElementById('editModal'));
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-order_date').value = this.dataset.order_date;
            document.getElementById('edit-total_price').value = this.dataset.total_price;
            document.getElementById('edit-status').value = this.dataset.status;
            document.getElementById('edit-user_id').value = this.dataset.user_id;

            // Khởi tạo lại select2 cho select người dùng trong modal với khả năng tìm kiếm
            $('#edit-user_id').select2({
                placeholder: "Tìm kiếm người dùng...",
                allowClear: true,
                minimumInputLength: 1,  // Tìm kiếm khi nhập ít nhất 1 ký tự
                width: '100%',
            });

            // Hiển thị modal
            modal.show();
        });
    });
});


</script>