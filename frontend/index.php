<?php
require_once '../backend/models/product.php';
$products = getAllProducts();
session_start();
// // Khởi tạo giỏ hàng nếu chưa tồn tại
// if (!isset($_SESSION['cart'])) {
//     $_SESSION['cart'] = [];
// }

// // Hàm thêm sản phẩm vào giỏ hàng
// if (isset($_POST['add_to_cart'])) {
//     $product_id = $_POST['product_id'];
//     $product_name = $_POST['product_name'];
//     $product_price = $_POST['product_price'];

//     $selectedProduct = [
//         'id' => $product_id,
//         'name' => $product_name,
//         'price' => $product_price,
//         'quantity' => 1, // Mặc định là 1
//     ];
//     $found = false;
//     foreach ($_SESSION['cart'] as &$item) {
//         if ($item['id'] == $product_id) {
//             $item['quantity'] += 1; // Tăng số lượng thêm 1 nếu đã tồn tại
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         $_SESSION['cart'][] = $selectedProduct; // Thêm sản phẩm mới vào giỏ hàng
//         print_r($_SESSION['cart']);
//         exit;
//     }
// }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/99c03377a9.js" crossorigin="anonymous"></script>
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

    //modal gio hàng css
    .modal {
        display: none;
        /* Ẩn modal khi không mở */
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        /* Nền mờ */
        padding-top: 50px;
        /* Khoảng cách từ trên */
    }

    /* Nội dung modal */
    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        /* Chiếm 80% chiều rộng màn hình */
        max-width: 600px;
        /* Giới hạn chiều rộng tối đa */
        overflow-y: auto;
        /* Nếu quá dài, cuộn dọc */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Đổ bóng nhẹ */
    }

    /* Đóng modal */
    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Tiêu đề modal */
    .modal-header {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Danh sách sản phẩm trong giỏ */
    /* Cấu trúc modal */
    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
        overflow-y: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Các phần tiêu đề */
    .cart-items-list.header {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        /* Tạo 4 cột */
        margin-bottom: 15px;
        padding: 0;
        border-bottom: 2px solid #ddd;
    }

    .header-item {
        font-weight: 600;
        color: #333;
        text-align: center;
    }

    /* Các phần tử trong giỏ hàng */
    .cart-items-list {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        /* Tạo 4 cột cho từng sản phẩm */
        margin-bottom: 10px;
        padding: 0;
        list-style: none;
        border-bottom: 1px solid #eee;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
    }

    .item-name {
        font-weight: 600;
        color: #333;
        text-align: left;
    }

    .quantity-input {
        width: 50px;
    }

    .update-cart-btn {
        margin-top: 20px;
        text-align: center;
    }

    .empty-cart-text {
        font-size: 18px;
        text-align: center;
        color: #888;
    }

    .cart-item button {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 4px;
        font-size: 14px;
    }

    .cart-item button:hover {
        background-color: #d32f2f;
    }

    .hover-text-white:hover {
        color: white !important;
        /* Đổi màu chữ thành trắng khi hover */
    }

    #cart-modal .modal-dialog {
        max-width: 80%;
        /* Hoặc giá trị khác tùy ý */
    }

    /* Responsive cho màn hình nhỏ */
    @media screen and (max-width: 600px) {
        .modal-content {
            width: 90%;
        }

        .cart-items-list.header {
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }

        .cart-items-list {
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }

        .cart-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .cart-item input {
            margin-bottom: 10px;
        }

        .cart-item button {
            width: 100%;
        }
    }
</style>

<body onload="renderProduct()">
    <nav class=" navbar navbar-expand-lg sticky-top mb-4 bg-white border-bottom border-dark"
        style="margin-bottom: 10px;">
        <div class="container alight-item-center">
            <a href="./" class=" navbar-brand text-dark rounded-2 d-flex align-items-center flex-grow-0 col-3">
                <img class="img-fluid" src="./assets/img/lopoXoaPhong.png" width="20%" height="20%" alt=""
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
                        <a class="nav-link text-dark" href="./">Home</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="./allproduct">All Product</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="./contact/">Contact</a>
                    </li>

                </ul>
            </div>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
                <div class="nav-item fs-4 rounded-2 px-2">
                    <button class="nav-link text-dark " id="card-btn" onclick="openCart()"><i
                            class="fa-solid fa-cart-shopping"></i></button>
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
                            <li><a class="dropdown-item" href="./page/edit_user.php?id=<?php echo $_SESSION["id"]; ?>">Sửa
                                    thông tin</a></li>
                            <li><a class="dropdown-item" href="#">Xem đơn hàng</a></li>
                            <li><a class="dropdown-item" href="./page/logout.php">Đăng xuất</a></li>
                        </ul>
                    <?php } else { ?>
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-regular fa-user"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="./login">Đăng nhập</a></li>
                            <li><a class="dropdown-item" href="./register">Đăng ký</a></li>
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
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="./assets/img/uudai1.png" class="d-block w-50 m-auto mb-4" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="./assets/img/uudai2.png" class="d-block w-50 m-auto mb-4" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/uudai3.png" class="d-block w-50 m-auto mb-4" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="carousel-indicators position-static">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
    </div>
    <div class="container-fluid text-center p-4" style="background-color: #EDEDED;">
        <p class="mt-4 h5">Ở tiệm hai tay</p>
        <div class="mt-4 mb-4">
            <p class="m-0 ">Chúng tôi cung cấp các sản phẩm Laptop secondhand chất lượng, giá tốt.</p>
            <p class="m-0">Tại <Strong>Tiệm Hai Tay</Strong>, tất cả sản phẩm đều được kiểm tra kỹ lưỡng trước khi trao
                đến tay của các bạn!</p>
        </div>
    </div>
    <div class="container-fluid p-5">
        <p class="h5 text-center">Danh mục sản phẩm</p>
        <div class="carousel-inner mt-5">
            <div class="carousel-item active" data-bs-interval="10000">
                <div class="container">
                    <div class="row ">
                        <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                            <button type="button" class="btn text-center w-100 product-btn">
                                <img src="../frontend/assets/img/logo-dell.png" alt="" class="img-fluid w-25 h-25">
                                <p class="m-0">Dell</p>
                            </button>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                            <button type="button" class="btn text-center  w-100 product-btn">
                                <img src="../frontend/assets/img/logo-hp.png" alt="" class="img-fluid w-25 h-25">
                                <p class="m-0">HP</p>
                            </button>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                            <button type="button" class="btn text-center w-100 product-btn">
                                <img src="../frontend/assets/img/logo-asus.png" alt="" class="img-fluid w-25 h-25">
                                <p class="m-0">Asus</p>
                            </button>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                            <button type="button" class="btn text-center w-100 product-btn">
                                <img src="../frontend/assets/img/logo-macbook.png" alt="" class="img-fluid w-25 h-25">
                                <p class="m-0">MacBook</p>
                            </button>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                            <button type="button" class="btn text-center w-100 product-btn">
                                <img src="../frontend/assets/img/logo-lenovo.png" alt="" class="img-fluid w-25 h-25">
                                <p class="m-0">Lenovo</p>
                            </button>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                            <button type="button" class="btn text-center w-100 product-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10.5%" height="10.5%" fill="currentColor"
                                    class="bi bi-laptop mb-2" viewBox="0 0 16 16">
                                    <path
                                        d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5" />
                                </svg>
                                <p class="m-0">orther</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="carouselExampleDark2" class="carousel carousel-dark slide p-4 border-bottom border-dark"
        data-bs-ride="carousel" style="background-color: #EDEDED;">
        <div class="carousel-inner">
            <?php foreach ($products as $index => $product):
                $img = './assets/img/' . $product['image'];
                ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-bs-interval="10000">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-10 mt-3">
                                <a href="../productdetail?id=<?= htmlspecialchars($product['id']) ?>"
                                    class="text-decoration-none p-2" id="<?= htmlspecialchars($product['id']) ?>">
                                    <div class="col product-card">
                                        <div class="card">
                                            <img src="<?= htmlspecialchars($img) ?>" class="card-img-top p-3 pb-0"
                                                alt="<?= htmlspecialchars($product['product_name']) ?>">
                                            <div class="px-5 pb-5">
                                                <h4 class="card-title allproduct-card-title fs-5">
                                                    <?= htmlspecialchars($product['product_name']) ?>
                                                </h4>
                                                <div class="d-flex gap-2">
                                                    <p class="card-text m-0 rounded-pill bg-dark text-white px-1">Ram:
                                                        <?= htmlspecialchars($product['ram']) ?>
                                                    </p>
                                                    <p class="card-text m-0 rounded-pill bg-dark text-white px-1">Rom:
                                                        <?= htmlspecialchars($product['rom']) ?>
                                                    </p>
                                                </div>
                                                <p class="card-text text-danger fw-bold fs-5 m-1">
                                                    <?= number_format($product['price'], 0, ",", ".") ?> VND
                                                </p>
                                                <p class="card-text ms-1">Bảo hành:
                                                    <?= htmlspecialchars($product['warranty']) ?> tháng
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="container d-flex justify-content-center mt-3">
            <a href="./allproduct/" class="btn bg-dark text-white">Xem tất cả</a>
        </div>
    </div>

    <div class="container-fluid pb-5 pt-0">
        <div class="container">
            <div class="container-fluid p-2 rounded-5"
                style="background-color: #EDEDED;margin-bottom: 7%;margin-top: 2%;">
                <p class="h4 text-center ">Tin tức nổi bật</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-3 p-3" style="width: 100%;background-color: #EDEDED;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-6">
                                <img src="./assets/img/hp-victus-16.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <p class="card-text">Chúc mừng bạn Trần Nguyễn Hoàng Quân đã trúng Give Away -
                                        Laptop HP Victus 16 của shop vào tháng này!</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="card-link mt-2 text-center text-dark">Xem tin tức tại đây</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3 p-3" style="width: 100%; background-color: #EDEDED;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-6">
                                <img src="./assets/img/man-hinh-uu-dai.png" height="140" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <p class="card-text">Vào mùa hè này, chúng ta hãy cùng chúng mình giải nhiệt mùa hè
                                        cùng đại tiệc ưu đãi tưng bừng vào mùa hè này!!
                                        Nhanh tay nào các bạn ơi</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="card-link mt-2 text-center text-dark">Xem tin tức tại đây</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3 p-3" style="width: 100%; background-color: #EDEDED;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-6">
                                <img src="./assets/img/laptop-uu-dai.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <p class="card-text">Cùng tận hưởng mùa hè bằng những ưu đãi nào!! Đặt biệt dành cho
                                        học sinh và sinh viên trong mùa hè này!
                                        Nhanh tay nào, nhanh tay nào.</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="card-link mt-2 text-center text-dark">Xem tin tức tại đây</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3 p-3" style="width: 100%; background-color: #EDEDED;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-6">
                                <img src="./assets/img/voucher_thang_5.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <p class="card-text">Cùng tận hưởng những ưu đãi ngập tràng vào tháng 5 này các bạn
                                        nhé!! Sưu tầm và nhập
                                        nhiều ưu đãi khi mua hàng vào tháng 5 này!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="card-link mt-2 text-center text-dark">Xem tin tức tại đây</a>
                    </div>
                </div>
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
                    <h5 class="text-uppercase">Laptop</h5>

                    <ul class="list-unstyled mb-0 ft-item">
                        <li>
                            <a href="#!" class="">Dell</a>
                        </li>
                        <li>
                            <a href="#!">HP</a>
                        </li>
                        <li>
                            <a href="#!">ASUS</a>
                        </li>
                        <li>
                            <a href="#!">ACER</a>
                        </li>
                        <li>
                            <a href="#!">LENOVO</a>
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
    <!-- <div id="cart-modal" class="modal">
        <div class="modal-content modal-lg">
            <span class="close" onclick="closeCart()">&times;</span>
            <h2 class="modal-header">Giỏ Hàng</h2>
            <div id="cart-items">
                <?php if (!empty($_SESSION['cart'])): ?>
                    <form method="POST" action="update_cart.php">
                        <!-- Tiêu đề của các cột -->
                        <div class="row mb-3">
                            <div class="col-4"><strong class="header-item">Tên Sản Phẩm</strong></div>
                            <div class="col-2"><strong class="header-item">Giá Gốc</strong></div>
                            <div class="col-2"><strong class="header-item">Số Lượng</strong></div>
                            <div class="col-2"><strong class="header-item">Tổng Tiền</strong></div>
                            <div class="col-2"><strong class="header-item"></strong></div>
                        </div>

                        <!-- Danh sách các sản phẩm trong giỏ hàng -->
                        <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                            <div class="row mb-3 align-items-center">
                                <div class="col-4">
                                    <span class="item-name"
                                        style="font-size: 14px;"><?= htmlspecialchars($item['name']); ?></span>
                                </div>
                                <div class="col-2">
                                    <span class="item-name"
                                        style="font-size: 14px;"><?= number_format($item['price'], 0) . 'đ'; ?></span>
                                </div>
                                <div class="col-2">
                                    <input class="form-control quantity-input" type="number" name="quantities[<?= $index; ?>]"
                                        value="<?= $item['quantity']; ?>" min="1" style="width: 80px;">
                                </div>
                                <div class="col-2">
                                    <span class="item-name text-dark"
                                        style="font-size: 14px;"><?= number_format($item['quantity'] * $item['price'], 0) . 'đ'; ?>
                                    </span>
                                </div>
                                <div class="col-2">
                                    <button type="submit" name="remove" value="<?= $index; ?>"
                                        class="btn btn-danger btn-sm w-70 text-dark">Xóa</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="update-cart-btn d-flex flex-row-reverse gap-3">
                            <a href="checkout.php"
                                class="btn btn-success text-dark hover-text-white text-decoration-none">Thanh
                                toán</a>
                            <button type="submit" name="update_cart" class="btn btn-primary text-dark hover-text-white">Cập
                                nhật giỏ hàng</button>
                        </div>
                    </form>
                <?php else: ?>
                    <p class="empty-cart-text">Giỏ hàng rỗng!</p>
                <?php endif; ?>
            </div>
        </div>
    </div> -->
</body>

</html>
<script>
    // function openCart() {
    //     document.getElementById("cart-modal").style.display = "block";
    // }
    // function closeCart() {
    //     document.getElementById("cart-modal").style.display = "none";
    // }

    // // Đóng modal khi nhấp bên ngoài
    // window.onclick = function (event) {
    //     const modal = document.getElementById("cart-modal");
    //     if (event.target === modal) {
    //         modal.style.display = "none";
    //     }
    // };
</script>