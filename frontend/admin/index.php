<?php include 'components/header.php'; ?>
<div class="container-fluid">
    <?php include 'components/navbar.php'; ?>
    <div class="row">
        <div class="col-md-12 mt-4">
            <h2 class="text-center">Dashboard</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Sản phẩm</h5>
                            <p class="card-text">Quản lý và cập nhật sản phẩm.</p>
                            <a href="products.php" class="btn btn-light">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Khách hàng</h5>
                            <p class="card-text">Quản lý thông tin khách hàng.</p>
                            <a href="customers.php" class="btn btn-light">Chi tiết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Đơn hàng</h5>
                            <p class="card-text">Quản lý các đơn hàng.</p>
                            <a href="orders.php" class="btn btn-light">Chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'components/footer.php'; ?> 