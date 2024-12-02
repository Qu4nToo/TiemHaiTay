<?php
require_once '../../backend/models/product.php';
$id = $_GET['id'];
$products = getProductById($id);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- FONT -->
    <!-- KOHO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

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
                            <li><a class="dropdown-item" href="../page/edit_user.php?id=<?php echo $_SESSION["id"]; ?>">Sửa
                                    thông tin</a></li>
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
    <div class="boxProduct row container mt-5" style="width: 100%; height: fit-content; margin:auto; ">
        <div class="ColProduct col-2 d-flex flex-column gap-3">
            <a href=""><img src="./img/hp-victus-16.png" alt="" class="img-fluid object-fit-scale border p-2"
                    style="width: 110px; height: 100x; background-color: #EDEDED; opacity: 100%;"></a>
        </div>
        <div class="ColProduct col-5 d-flex flex-items-center" style="background-color: EDEDED;">
            <div class="mainProductImg h-100 p-2">
                <a href=""> <img src=" ./img/hp-victus-16.png" alt=""
                        class=" img-fluid object-fit-cover rounded align-items-center mh-100"
                        style="background-color: #ffffff;"></a>
            </div>
        </div>
        <div class="ColProduct col-5" style="background-color: rgb(255, 255, 255);">
            <style>
                .productInfo {
                    font-family: "KoHo", sans-serif;
                    font-size: 30px;
                }
            </style>
            <div class="BoxProduct">
                <h1 class="productName productInfo pb-2" style="font-weight: 1000;"><?= $products['product_name'] ?>
                </h1>
                <div class="boxStatus d-flex productInfo pb-2">
                    <h2 style="font-size: 20px;">Tình trạng:&nbsp; </h2>
                    <h6 style="font-size: 20px; color:#257707; font-weight: 700;">
                        <?= $products['status'] ? 'còn hàng' : ' hết hàng' ?>
                    </h6>
                </div>
                <div class="boxPrice d-flex productInfo pb-2">
                    <h2 style="font-size: 30;">Giá:&nbsp; </h2>
                    <h6 style="font-size: 30px; font-weight: 700;" class="text-danger">
                        <?= number_format($products['price'], decimals: 0, decimal_separator: ',', thousands_separator: '.') ?>
                        VND
                    </h6>
                </div>

                <div class="boxSpecification d-flex productInfo flex-column">
                    <div class="specificationBoxDetailed p-2 row align-items-start gap-3">
                        <style>
                            .col {
                                padding: 7px 20px;
                                width: 100px;
                            }
                        </style>
                        <div class=" detailed col rounded" style="background-color: #EDEDED; ">
                            <h6 class="info" style="color: #A7A7A7;">Screen size</h6>
                            <h6 class="info" style="color: #000000;"><?= $products['screen'] ?></h6>
                        </div>
                        <div class="detailed col rounded" style="background-color: #EDEDED;">
                            <h6 class="info" style="color: #A7A7A7;">CPU</h6>
                            <h6 class="info" style="color: #000000;"><?= $products['cpu'] ?></h6>
                        </div>
                        <div class="detailed col rounded" style="background-color: #EDEDED;">
                            <h6 class="info" style="color: #A7A7A7;">Rom</h6>
                            <h6 class="info" style="color: #000000;"><?= $products['rom'] ?></h6>
                        </div>
                    </div>

                    <div class="specificationBoxDetailed p-2 row align-items-start gap-3">
                        <div class=" detailed col rounded" style="background-color: #EDEDED; ">
                            <h6 class="info" style="color: #A7A7A7;">Camera</h6>
                            <h6 class="info" style="color: #000000;"><?= $products['camera'] ?></h6>
                        </div>
                        <div class="detailed col rounded" style="background-color: #EDEDED;">
                            <h6 class="info" style="color: #A7A7A7;">Ram</h6>
                            <h6 class="info" style="color: #000000;"><?= $products['ram'] ?></h6>
                        </div>
                        <div class="detailed col rounded" style="background-color: #EDEDED;">
                            <h6 class="info" style="color: #A7A7A7;">Card</h6>
                            <h6 class="info" style="color: #000000;"><?= $products['card'] ?></h6>
                        </div>
                    </div>
                </div>

                <div class="describtionProduct mt-3">
                    <p class="info productInfo descriptionProduct" style="font-size: 18px; color: #717171;">
                        <?= $products['description'] ?>
                    </p>
                </div>

                <div class="boxButtonProductDetailed d-flex gap-3">
                    <style>
                        .btnProduct:hover {
                            background-color: #adadadaf;
                        }

                        .btnProduct {
                            font-size: 16px;
                        }
                    </style>
                    <button type="button"
                        class="rounded productInfo btnProduct border-dark text-dark d-flex align-items-center"
                        data-bs-theme-value="light" aria-pressed="false" style="width: 240px; height: 56px;">
                        <h6 class="btnProduct m-auto w:100%">Add to wish list</h6>
                    </button>
                    <button type="button"
                        class="rounded productInfo btnProduct bg-dark text-light d-flex align-items-center gap-2"
                        data-bs-theme-value="light" aria-pressed="false" style="width: 240px; height: 56px;">
                        <div class="containerBtn m-auto w:100% d-flex">
                            <h6 class="btnProduct  text-light">Add to cart</h6>
                        </div>

                    </button>
                </div>

                <div class="shippingDescription mt-3 d-flex">
                    <div class="col">
                        <div class="boxDescription d-flex " id="1" style="width: 230px; height: fit-content;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="grey"
                                class="bi bi-truck rounded p-2 me-3" viewBox="0 0 16 16"
                                style="background-color: #EDEDED;">
                                <path
                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                            </svg>
                            <div class="detailDescription ml-5">
                                <h6 style="color: #A7A7A7;">Ngày nhập hàng</h6>
                                <h6 style="color: #000000;">Hôm nay</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="boxDescription d-flex " id="1" style="width: 230px; height: fit-content;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="grey"
                                class="bi bi-truck rounded p-2 me-3" viewBox="0 0 16 16"
                                style="background-color: #EDEDED;">
                                <path
                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                            </svg>
                            <div class="detailDescription ml-5">
                                <h6 style="color: #A7A7A7;">Bảo hành</h6>
                                <h6 style="color: #000000;">1 năm</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr class="fs-5">
    <div class="shopRate mt-5" style="height: 500px; background-color: #ffffff;">
        <h3 class="productInfo pb-2 relativeProductTitle mb-5" style="font-size: 30px; font-weight: bold;">Đánh giá tại
            cửa hàng</h3>
        <div class="row-col-10 d-flex justify-content-center text-center">
            <div class="col-2">
                <div class="boxTotalPoint d-flex flex-column align-items-center rounded"
                    style="width: 184px; height: 160px; background-color: #EDEDED;">
                    <h6 class="totalRatePoint productInfo" style="font-size: 55px; font-weight: bold;">5.0</h6>
                    <p class="productInfo" style="color: #959595; font-size: 17px;">of 125 reviews</p>
                    <div class="star d-flex">
                        <style>
                            .starGroup {
                                margin: auto;
                                width: 100%;
                            }
                        </style>
                        <div class="starGroup">
                            <i class="fa-solid fa-star fa-beat" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star fa-beat" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star fa-beat" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star fa-beat" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star fa-beat" style="color: #FFD43B;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 text-start" style="background-color: rgb(255, 255, 255); line-height: 18px;">
                <style>
                    .rateType {
                        font-size: 16px;
                    }
                </style>
                <p class="fw-bold productInfo rateType">Xuất sắc</p>
                <p class="fw-bold productInfo rateType">Tốt</p>
                <p class="fw-bold productInfo rateType">Tạm</p>
                <p class="fw-bold productInfo rateType">Không khuyên dùng</p>
                <p class="fw-bold productInfo rateType">Không nên mua</p>

            </div>
            <div class="col-5" style="background-color: rgb(255, 255, 255);">
                <div class="d-flex flex-column h-100" style="justify-content: space-between; ">

                    <div class="progress d-flex" role="progressbar" aria-label="Warning example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning text-dark" style="width: 100%">100%</div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning text-dark" style="width: 100%">100%</div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning text-dark" style="width: 100%">100%</div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning text-dark" style="width: 100%">100%</div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-warning text-dark" style="width:100%">100%</div>
                    </div>
                </div>
            </div>
            <div class="col-1">
                <div class="d-flex flex-column h-100" style="justify-content: space-between; ">
                    <p>100</p>
                    <p>100</p>
                    <p>100</p>
                    <p>100</p>
                    <p>100</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <input type="search" placeholder="Leave comment here" aria-label="Search"
                style="width: 80%; height: 70px; font-size: 15px;" class="productInfo">
        </div>
    </div>
</body>

<!-- footer -->
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
                        <a href="#!">Các sản phẩm khác</a>
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
    </div>
</footer>

</html>