<?php 
session_start();
?>
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
    <!-- Css Styles -->
    <link rel="stylesheet" href="styles/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="styles/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="styles/nice-select.css" type="text/css">
    <link rel="stylesheet" href="styles/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="styles/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="styles/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="styles/style.css">
    <!-- End Css Styles -->

    <title>Liên Hệ</title>
</head>
<style>
    .error-message {
        color: red;
        font-weight: bold;
    }

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
</style>

<body onload="renderProduct()">
<nav class=" navbar navbar-expand-lg sticky-top mb-4 bg-white border-bottom border-dark"
        style="margin-bottom: 10px;">
        <div class="container alight-item-center">
            <a href="../" class=" navbar-brand text-dark rounded-2 d-flex align-items-center flex-grow-0 col-3">
                <img class="img-fluid" src="../assets/img/lopoXoaPhong.png" width="20%" height="20%" alt=""
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
                    $(document).ready(function () {
                        $("#search").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            $("#products-list li").filter(function () {
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
                        <a class="nav-link text-dark" href="../">Home</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="../allproduct">All Product</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="../contact/">Contact</a>
                    </li>

                </ul>
            </div>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
                <div class="nav-item fs-4 rounded-2 px-2">
                    <a class="nav-link text-dark " href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
                <div class="dropdown nav-item rounded-2">
                    <?php
                    if (isset($_SESSION["name"]) && $_SESSION["name"] != "") {
                        ?>
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $_SESSION['name']; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="../page/edit_user.php?id=<?php echo $_SESSION["id"]; ?>">Sửa thông tin</a></li>
                            <li><a class="dropdown-item" href="#">Xem đơn hàng</a></li>
                            <li><a class="dropdown-item" href="../page/logout.php">Đăng xuất</a></li>
                        </ul>
                    <?php } else { ?>
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-regular fa-user"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="../login">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="../register">Đăng ký</a></li>
                        </ul>
                    <?php } ?>
                </div>
                <!-- <div href='pages/edit_user.php?id=' class='btn '>
                    <p class="fs-4 m-2"><?php echo $_SESSION['name']; ?></p class="font-sm">
                </div>
                <div href="pages/logout.php" class="btn btn-danger">Đăng xuất</div> -->
            </div>
        </div>
    </nav>
    <!-- sidebar -->
    <div class="container">

        <div class="container p-5">
            <div class="row">
                <!-- Contact Information -->
                <div class="col-md-6 bg-primary text-white p-5">
                    <h2>Contact Information</h2>
                    <p>If you have any questions, feel free to contact us through the details below:</p>
                    <ul class="list-unstyled">
                        <li><strong>Phone:</strong> +84 123 456 789</li>
                        <li><strong>Email:</strong> contact@example.com</li>
                        <li><strong>Address:</strong> 123 Main Street, Hanoi, Vietnam</li>
                    </ul>
                </div>

                <!-- Contact Form -->
                <div class="col-md-6 p-5">
                    <h2>Contact Form</h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Write your message"
                                required></textarea>
                        </div>
                        <div class="container d-flex ">
                            <button type="button" class="btn btn-outline-primary mx-auto">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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