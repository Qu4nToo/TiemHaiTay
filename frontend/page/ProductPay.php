<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/99c03377a9.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/productpay.css">
    <title>Trang chủ</title>
</head>
<style>
.ft-icon a:hover {
    background: rgba(178, 192, 201, 0.758);
}

.ft-item p {
    color: #CFCFCF;
}

.ft-item li a {
    text-decoration: none;
    color: #CFCFCF;
}

.ft-item li a:hover {
    text-decoration: underline;
}

.btn {
    background-color: #EDEDED;
}

.nav-item:hover {
    background: rgba(178, 192, 201, 0.758);
}

.product-btn:hover {
    background: rgba(178, 192, 201, 0.758);
}

.name {
    text-decoration: none;
    color: black;
}

.dropdown-menu a:hover {
    background-color: rgba(65, 64, 64, 0.253) !important;
}

#products-list {
    display: none;
}
</style>
<body onload="renderProduct()">
<nav class=" navbar navbar-expand-lg sticky-top mb-4 bg-white border-bottom border-dark"
        style="margin-bottom: 10px;">
        <div class="container alight-item-center">
            <a href="welcome.php" class=" navbar-brand text-dark rounded-2 d-flex align-items-center flex-grow-0 col-3">
                <img class="img-fluid" src="./img/lopoXoaPhong.png" width="30%" height="30%" alt=""
                    style="margin-right: 10px;">
                <span class="h5 text-dark slogan">Tiệm hai tay</span>
            </a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1 mt-1" id="navbarSupportedContent">
                <div class="dropdown col-lg-12 mb-lg-0">
                    <style>
                    .search-nav::placeholder {
                        font-size: 14px;
                    }
                    </style>
                    <input type="search" placeholder="Tìm kiếm gì đó ở đây"
                        class="dropdown-toggle search-nav w-75 rounded p-1" data-bs-toggle="dropdown" id="search">
                    </input>
                    <ul class="dropdown-menu w-100" id="products-list">
                    </ul>
                </div>
                <script>
                function renderProduct() {
                    fetch('https://665892f55c36170526490b38.mockapi.io/TiemHaiTay', {
                            method: 'GET',
                            headers: {
                                'content-type': 'application/json'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            let product = '';
                            data.map(value => product += `
    <li id="products"><a class="dropdown-item border-0" href="${value.url}" >
        <div class="mt-2 mb-2" style="width: auto;">
            <div class="row g-0">
              <div class="col-2">
                <img src="${value.img}" class="img-fluid rounded-star img-search me-2" alt="...">
              </div>
              <div class="col-10 ps-3">
                  <p class="card-title">${value.name}</p>
                  <p class="card-text" style="color: red;">${value.price}</p>
              </div>
            </div>
          </div>
    </a></li>`);
                            document.getElementById('products-list').innerHTML = product;
                        })
                        .catch(error => console.log(error));
                }
                $(document).ready(function() {
                    $("#search").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#products-list li").filter(function() {
                            var x = document.getElementById('products-list');
                            x.style.display = 'block'
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            var y = document.getElementById('search').value;
                            if (y == '') {
                                document.getElementById('products-list').style.display = 'none'
                            }
                        });
                    });
                });
                </script>
            </div>
            <div class="collapse navbar-collapse flex-grow-0 ms-1" id="navbarSupportedContent">
                <ul class="navbar-nav mb-lg-0 ">
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark" href="welcome.php">Home</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="AllProduct.php">All Product</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="#">Refund</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="Contact.php">Contact</a>
                    </li>

                </ul>
            </div>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
                <ul class="navbar-nav mb-lg-0 d-flex flex-row justify-content-between col-3">
                    <li class="nav-item fs-4 rounded-2 ps-1 pe-1">
                        <a class="nav-link text-dark " href="#"><i class="fa-regular fa-heart"></i></a>
                    </li>
                    <li class="nav-item fs-4 rounded-2 ps-1 pe-1">
                        <a class="nav-link text-dark " href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav-item fs-4 rounded-2 ps-1 pe-1">
                        <a class="nav-link text-dark " href="Login.php"><i class="fa-regular fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container d-flex">
        <!-- Trái -->
        <div class="containers">
            <div class="card cart">
                <label class="title">THANH TOÁN MUA HÀNG</label>
                <div class="steps">
                    <div class="step">
                        <div>
                            <span style="font-weight: 700;">VẬN CHUYỂN TỪ</span>
                            <p>1234 đường Chi Dân, Quận Đống Đa, Hà Nam</p>
                            <p>Hà Nội, VietNam</p>
                        </div>
                        <hr>
                        <div>
                            <span style="font-weight: 700;">PHƯƠNG THỨC THANH TOÁN</span>
                            <p>Ship Cod</p>

                        </div>
                        <hr>
                        <div class="promo">
                            <span style="font-weight: 700;">NHẬP MÃ KHUYẾN MÃI (NẾU CÓ)</span>
                            <form class="form">
                                <input class="input_field" placeholder="Nhập mã khuyến mãi" type="text">
                                <button>Xác nhận</button>
                            </form>
                        </div>
                        <hr>
                        <div class="payments">
                            <span style="font-weight: 700;">THANH TOÁN</span>
                            <div class="details" style="font-style: italic;">
                                <span>Tên sản phẩm:</span>
                                <span>Iphone 15 pro max</span>
                                <span>Số lượng:</span>
                                <span>1</span>
                                <span>Giá:</span>
                                <span>29.000.000 VNĐ</span>
                                <hr>
                                <span></span>
                                <span>Tổng tiền:</span>
                                <span>29.000.000 VNĐ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phải -->
        <div class="container" style="margin-left: 100px;">
            <h3>Thông tin khách hàng</h3>

            <form action="welcome.php" class="was-validated">
                <div class="col-md-12">

                    <label for="validationCustom01" class="form-label">Họ và tên lót</label>
                    <input type="text" class="form-control" id="validationCustom01" required>

                    <div class="valid-feedback">
                        Hoàn hảo
                    </div>
                    <div class="invalid-feedback">Vui lòng nhập đủ thông tin</div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Tên</label>
                    <input type="text" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Hoàn hảo
                    </div>
                    <div class="invalid-feedback">Vui lòng nhập đủ thông tin</div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" id="validationCustom02" required>
                    <div class="valid-feedback">
                        Hoàn hảo
                    </div>
                    <div class="invalid-feedback">Vui lòng nhập đủ thông tin</div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <label for="validationCustom03" class="form-label">Yêu cầu về sản phẩm</label>
                        <input type="text" class="form-control" id="validationCustom03" required>
                        <div class="valid-feedback">
                            Hoàn hảo
                        </div>
                        <div class="invalid-feedback">Vui lòng nhập đủ thông tin</div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Phương thức thanh toán</label>
                        <select class="form-select" id="validationCustom04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Ship cod</option>
                            <option>Thanh toán trước</option>
                        </select>
                        <div class="valid-feedback">
                            Hoàn hảo
                        </div>
                        <div class="invalid-feedback">Vui lòng nhập đủ thông tin</div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom05" class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" id="validationCustom05" required>
                        <div class="valid-feedback">
                            Hoàn hảo
                        </div>
                        <div class="invalid-feedback">Vui lòng nhập đủ thông tin</div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Tôi đồng ý với điều khoản và thông tin của Shop.
                            </label>
                            <div class="invalid-feedback">
                                Bạn đồng ý trước khi đặt hàng.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" onclick="myFunction()">Đặt hàng</button>
                </div>
                <script>
                function myFunction() {
                    alert("Bạn đã đặt hàng thành công");
                }
                </script>
        </div>
    </div>
    <div><br></div>
    <footer class="bg-dark text-white text-center text-lg-start">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-5 col-md-12 mb-4 mb-md-0 ft-item">
                    <h5 class="text-uppercase">Tiệm hai tay</h5>
                    <p>Địa chỉ: 1234 đường Chi Dân, Quận Đống Đa, Hà Nam</p>
                    <p>Hotline:1900 9827</p>
                    <p>Email: tiemhaitay@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Dịch vụ</h5>

                    <ul class="list-unstyled mb-0 ft-item">
                        <li>
                            <a href="#!" class="">Điện thoại</a>
                        </li>
                        <li>
                            <a href="#!">Laptop</a>
                        </li>
                        <li>
                            <a href="#!">Loa</a>
                        </li>
                        <li>
                            <a href="#!">Camera</a>
                        </li>
                        <li>
                            <a href="#!">Ipad</a>
                        </li>
                        <li>
                            <a href="#!">Các sẩn phẩm khác</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Bạn cần hỗ trợ?</h5>

                    <ul class="list-unstyled mb-0 ft-item">
                        <li>
                            <a href="#!">Cách đặt hàng?</a>
                        </li>
                        <li>
                            <a href="#!">Bạn muốn hoàn hàng?</a>
                        </li>
                        <li>
                            <a href="#!">Bạn cần tư vấn?</a>
                        </li>
                        <li>
                            <a href="#!">Tại sao bạn nên chọn chúng tôi?</a>
                        </li>
                        <li>
                            <a href="#!">Chính sách bảo hành & đãi ngộ?</a>
                        </li>
                        <li>
                            <a href="#!">Feedback từ khách hàng đã mua tại cửa hàng.</a>
                        </li>
                    </ul>
                </div>
            </div>
            <footer class="text-center">
                <!-- Grid container -->
                <div class="container pt-4">
                    <!-- Section: Social media -->
                    <section class="mb-4 ft-icon">
                        <!-- Facebook -->
                        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!"
                            role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!"
                            role="button" data-mdb-rippler-color="dark"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!"
                            role="button" data-mdb-ripple-color="dark"><i class="fab fa-tiktok"></i></a>

                        <!-- Instagram -->
                        <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!"
                            role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                    </section>
                </div>
            </footer>
        </div>

    </footer>
</body>

</html>