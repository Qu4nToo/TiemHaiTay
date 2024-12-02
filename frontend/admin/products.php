<?php
include './components/header.php';
require_once '../../backend/models/product.php';
$products = getAllProducts();
?>

<div class="container-fluid">
    <?php include './components/navbar.php'; ?>
    <?php include './components/header.php'; ?>
    <div class="row mt-4">
        <div class="col-md-12">
            <h2 class="text-center">Quản lý Sản phẩm</h2>
            <form action="../../backend/routes/api.php?action=add" method="POST" class="mb-4"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-2 mb-3">
                        <input type="text" name="product_type" class="form-control" placeholder="Hãng"
                            required>
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm" required>
                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <input type="text" name="screen" class="form-control" placeholder="screen">
                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <input type="text" name="cpu" class="form-control" placeholder="CPU">
                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <input type="text" name="camera" class="form-control" placeholder="Camera">
                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <input type="text" name="ram" class="form-control" placeholder="RAM">
                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <input type="text" name="rom" class="form-control" placeholder="ROM">
                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <input type="text" name="warranty" class="form-control" placeholder="Bảo hành">
                    </div>
                    <div class="col-12 col-md-2 mb-3">
                        <input type="number" step="0.01" name="price" class="form-control" placeholder="Giá">
                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <input type="text" name="card" class="form-control" placeholder="Card">
                    </div>
                    <div class="col-12 col-md-1 mb-3">
                        <input type="checkbox" name="status" value="1"> Còn hàng
                    </div>
                    <div class="col-12 mb-3">
                        <textarea name="description" class="form-control" placeholder="Mô tả"></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="image" class="form-label">Ảnh sản phẩm</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Thêm sản phẩm</button>
            </form>
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Hãng</th>
                        <th>Tên sản phẩm</th>
                        <th>Screen</th>
                        <th>CPU</th>
                        <th>Camera</th>
                        <th>RAM</th>
                        <th>ROM</th>
                        <th>Bảo hành</th>
                        <th>Giá</th>
                        <th>Card</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): 
                        $img='../assets/img/'.$product['image'];
                        ?>
                        <tr>
                            <td><img src="<?= $img ?>" alt="123" width="100px" height="100px"></td>
                            <td><?= $product['product_type'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['screen'] ?></td>
                            <td><?= $product['cpu'] ?></td>
                            <td><?= $product['camera'] ?></td>
                            <td><?= $product['ram'] ?></td>
                            <td><?= $product['rom'] ?></td>
                            <td><?= $product['warranty'] ?></td>
                            <td><?= $product['price'] ?> VND</td>
                            <td><?= $product['card'] ?></td>
                            <td><?= $product['status'] ? 'Còn hàng' : 'Hết hàng' ?></td>
                            <td><?= $product['description'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn" data-id="<?= $product['id'] ?>" data-image="<?= $product['image'] ?>"
                                    data-type="<?= $product['product_type'] ?>" data-name="<?= $product['product_name'] ?>"
                                    data-screen="<?= $product['screen'] ?>" data-cpu="<?= $product['cpu'] ?>"
                                    data-camera="<?= $product['camera'] ?>"
                                    data-ram="<?= $product['ram'] ?>" data-rom="<?= $product['rom'] ?>"
                                    data-warranty="<?= $product['warranty'] ?>" data-price="<?= $product['price'] ?>"
                                    data-card="<?= $product['card'] ?>" data-status="<?= $product['status'] ?>"
                                    data-description="<?= $product['description'] ?>">Sửa</button>
                                <a href="../../backend/routes/api.php?action=delete&id=<?= $product['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" action=" ../../backend/routes/api.php?action=edit" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Sửa sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh sản phẩm</label>
                        <input type="file" name="image" id="edit-image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="edit-type" class="form-label">Loại sản phẩm</label>
                        <input type="text" name="product_type" id="edit-type" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="edit-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-screen" class="form-label">Screen</label>
                        <input type="text" name="screen" id="edit-screen" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="edit-cpu" class="form-label">CPU</label>
                        <input type="text" name="cpu" id="edit-cpu" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="edit-camera" class="form-label">Camera</label>
                        <input type="text" name="camera" id="edit-camera" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit-ram" class="form-label">RAM</label>
                            <input type="text" name="ram" id="edit-ram" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit-rom" class="form-label">ROM</label>
                            <input type="text" name="rom" id="edit-rom" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit-warranty" class="form-label">Bảo hành</label>
                        <input type="text" name="warranty" id="edit-warranty" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="edit-price" class="form-label">Giá</label>
                        <input type="number" step="0.01" name="price" id="edit-price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="edit-card" class="form-label">Card</label>
                        <input type="text" name="card" id="edit-card" class="form-control">
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" name="status" id="edit-status" class="form-check-input" value="1">
                        <label for="edit-status" class="form-check-label">Còn hàng</label>
                    </div>
                    <div class="mb-3">
                        <label for="edit-description" class="form-label">Mô tả</label>
                        <textarea name="description" id="edit-description" class="form-control"></textarea>
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

<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Chi tiết sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Layout responsive ngang -->
                <div class="row">
                    <div class="col-md-4 mb-3 text-center">
                        <img id="detail-image" src="" alt="Product Image" class="img-fluid"
                            style="max-width: 100%; height: auto;">
                        <button type="button" id="edit-image-btn" class="btn btn-warning btn-sm mt-2">Sửa
                            ảnh</button>
                    </div>

                    <div class="col-md-8">
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="detail-name" class="form-label">Tên sản phẩm</label>
                                <input type="text" id="detail-name" class="form-control" disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="detail-type" class="form-label">Loại sản phẩm</label>
                                <input type="text" id="detail-type" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="detail-price" class="form-label">Giá</label>
                                <input type="number" id="detail-price" class="form-control" disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="detail-card" class="form-label">Card</label>
                                <input type="text" id="detail-card" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="detail-status" class="form-label">Trạng thái</label>
                                <input type="text" id="detail-status" class="form-control" disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="detail-ram" class="form-label">RAM</label>
                                <input type="text" id="detail-ram" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="detail-rom" class="form-label">ROM</label>
                                <input type="text" id="detail-rom" class="form-control" disabled>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="detail-warranty" class="form-label">Bảo hành</label>
                                <input type="text" id="detail-warranty" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="detail-description" class="form-label">Mô tả</label>
                            <textarea id="detail-description" class="form-control" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="editProductBtn" class="btn btn-warning">Sửa</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- MODEL SUA ANH -->
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../../backend/routes/api.php?action=editImage" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editImageModalLabel">Sửa ảnh sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="image-product-id">
                    <div class="mb-3">
                        <label for="image" class="form-label">Chọn ảnh mới</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Lưu ảnh</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include './components/footer.php'; ?>

<script>
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const modal = new bootstrap.Modal(document.getElementById('editModal'));
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-type').value = this.dataset.type;
            document.getElementById('edit-name').value = this.dataset.name;
            document.getElementById('edit-screen').value = this.dataset.screen;
            document.getElementById('edit-cpu').value = this.dataset.cpu;
            document.getElementById('edit-ram').value = this.dataset.ram;
            document.getElementById('edit-rom').value = this.dataset.rom;
            document.getElementById('edit-warranty').value = this.dataset.warranty;
            document.getElementById('edit-price').value = this.dataset.price;
            document.getElementById('edit-card').value = this.dataset.card;
            document.getElementById('edit-status').checked = this.dataset.status === "1";
            document.getElementById('edit-description').value = this.dataset.description;
            document.getElementById('edit-camera').value = this.dataset.camera;
            modal.show();
        });
    });
</script>
