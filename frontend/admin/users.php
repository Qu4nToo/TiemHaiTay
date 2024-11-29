<?php
include './components/header.php';
require_once '../../backend/models/user.php';
$users = getAllUsers();
?>
<div class="container-fluid">
    <?php include './components/navbar.php'; ?>
    <div class="row mt-4">
        <div class="col-md-12">
            <h2 class="text-center">Quản lý Người Dùng</h2>
            <form action="../../backend/routes/apiUser.php?action=addUser" method="POST" class="mb-4">
                <div class="row">
                    <div class="col-12 col-md-2 mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Tên người dùng" required>
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <input type="number" name="phone" class="form-control" placeholder="Số điện thoại" required>
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Thêm người dùng</button>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['phone'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['address'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $user['id'] ?>"
                                    data-name="<?= $user['name'] ?>" data-phone="<?= $user['phone'] ?>"
                                    data-email="<?= $user['email'] ?>" data-address="<?= $user['address'] ?>"
                                    data-toggle="modal" data-target="#editModal">Sửa</button>
                                <a href="../../backend/routes/apiUser.php?action=deleteUser&id=<?= $user['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal sửa người dùng -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" action="../../backend/routes/apiUser.php?action=editUser" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Sửa người dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Tên người dùng</label>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-phone" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" id="edit-phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-email" class="form-label">Email</label>
                        <input type="email" name="email" id="edit-email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-address" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" id="edit-address" class="form-control" required>
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
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            var modal = new bootstrap.Modal(document.getElementById('editModal'));
            //console.log(this.dataset);
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-name').value = this.dataset.name;
            document.getElementById('edit-phone').value = this.dataset.phone;
            document.getElementById('edit-email').value = this.dataset.email;
            document.getElementById('edit-address').value = this.dataset.address;
            modal.show();
        });
    });
});

</script>
