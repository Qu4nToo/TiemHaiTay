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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../js/app.js">
    <link rel="stylesheet" href="../css/app.css">
    <title>Trang chủ</title>
    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable .col ").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('mouseover', () => {
            card.classList.add('hover');
        });

        card.addEventListener('mouseout', () => {
            card.classList.remove('hover');
        });
    });
    </script>
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

.breadcrumb {
    padding-left: 100px;
}

.breadcrumb-item a {
    color: rgba(0, 0, 0, 0.558);
    text-decoration: none;
}

.accordion-button:not(.collapsed) {
    background-color: transparent !important;
    color: inherit;
}

button.accordion-button:focus {
    box-shadow: inherit;

}

.card {
    background-color: rgb(247, 247, 247);
    border: none;
}

.accordion-body ul li a {
    color: black;
    text-decoration: none;
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
<script>
const cards = document.querySelectorAll('.card');

cards.forEach(card => {
    card.addEventListener('mouseover', () => {
        card.classList.add('hover');
    });

    card.addEventListener('mouseout', () => {
        card.classList.remove('hover');
    });
});
</script>

<body onload="renderProduct()">
    <nav class=" navbar navbar-expand-lg sticky-top mb-4 bg-white border-bottom border-dark"
        style="margin-bottom: 10px;">
        <div class="container alight-item-center">
            <a href="../" class=" navbar-brand text-dark rounded-2 d-flex align-items-center flex-grow-0 col-3">
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
                        <a class="nav-link text-dark" href="../">Home</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="../allproduct/">All Product</a>
                    </li>
                    <li class="nav-item rounded-2 ps-1">
                        <a class="nav-link text-dark " href="../contact/">Contact</a>
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
                        <a class="nav-link text-dark " href="../login/"><i class="fa-regular fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Than bai -------------------- -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <div class="container alight-item-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="text-decoration: none;" href="#">Home</a></li>
                <li class="breadcrumb-item " aria-current="page">All Product</li>
            </ol>
        </div>
    </nav>
    <!-- sidebar -->
    <div class="container">
        <div class="row">
            <!-- trái -->
            <div class="col-md-3">
                <strong style="margin-left: 30px;">Danh mục sản phẩm</strong>
                <div>
                    <hr>
                </div>
                <form class="d-flex" style="margin-bottom: 30px;">
                    <input class="form-control me-2" id="myInput" type="search" placeholder="Tìm danh mục sản phẩm"
                        aria-label="Search">
                </form>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Laptop
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul id="laptop">
                                    <li><a href="">Laptop Gaming</a> </li>
                                    <li><a href="">Laptop văn phòng</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Ipad
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul id="ipad">
                                    <li><a href=""></a> Ipad Pro M1</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Máy tính bảng
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul id="maytinhbang">
                                    <li><a href="">SAMSUNG</a></li>
                                    <li><a href="">OPPO</a></li>
                                    <li><a href="">XIAOMI</a></li>
                                    <li><a href="">LENOVO</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Điện thoại
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul id="dienthoai">
                                    <li><a href="">SAMSUNG</a></li>
                                    <li><a href="">OPPO</a></li>
                                    <li><a href="">XIAOMI</a></li>
                                    <li><a href="">IPHONE</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFive" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Sản phẩm khác
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href=""></a>MÁY IN</li>
                                    <li><a href=""></a>MỰC IN</li>
                                    <li><a href=""></a>SIM</li>
                                    <li><a href=""></a>THẺ CÀO</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-bottom pb-4 mb-4" style="margin-left: 30px;">


                    <div class="custom-control custom-checkbox font-size-1 text-lh-md mb-2">
                        <input type="checkbox" class="custom-control-input" id="assetTypeRadioChechbox1"
                            name="assetTypeRadioChechbox">
                        <label class="custom-control-label" for="assetTypeRadioChechbox1">
                            Ipod (110)
                        </label>
                    </div>

                    <div class="custom-control custom-checkbox font-size-1 text-lh-md mb-2">
                        <input type="checkbox" class="custom-control-input" id="assetTypeRadioChechbox1"
                            name="assetTypeRadioChechbox">
                        <label class="custom-control-label" for="assetTypeRadioChechbox1">
                            Màn hình máy tính (125)
                        </label>
                    </div>

                    <div class="custom-control custom-checkbox font-size-1 text-lh-md mb-2">
                        <input type="checkbox" class="custom-control-input" id="assetTypeRadioChechbox1"
                            name="assetTypeRadioChechbox">
                        <label class="custom-control-label" for="assetTypeRadioChechbox1">
                            Camera(68)
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox font-size-1 text-lh-md mb-2">
                        <input type="checkbox" class="custom-control-input" id="assetTypeRadioChechbox1"
                            name="assetTypeRadioChechbox">
                        <label class="custom-control-label" for="assetTypeRadioChechbox1">
                            Linh kiện máy tính(44)
                        </label>
                    </div>

                    <div class="custom-control custom-checkbox font-size-1 text-lh-md mb-2">
                        <input type="checkbox" class="custom-control-input" id="assetTypeRadioChechbox2"
                            name="assetTypeRadioChechbox">
                        <label class="custom-control-label" for="assetTypeRadioChechbox2">
                            Gear máy tính (36)
                        </label>
                    </div>

                    <div class="custom-control custom-checkbox font-size-1 text-lh-md mb-2">
                        <input type="checkbox" class="custom-control-input" id="assetTypeRadioChechbox1"
                            name="assetTypeRadioChechbox">
                        <label class="custom-control-label" for="assetTypeRadioChechbox1">
                            Loa(10)
                        </label>
                    </div>
                </div>
            </div>
            <!-- phải -->
            <div class="allProductBox col-md-9" style="background-color: #ffffff; height: auto">
                <div class="productbox mt-5" id="myTable">

                    <div class="row row-cols-1 row-cols-md-4 g-4 container m-auto" style="max-width: 1150px;">
                        <div class="col">
                            <div class="card">
                                <img src="./img/hinh-1.png" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Laptop</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Laptop Avita PURA A+ AF14A3VNF56F
                                        Black</h4>
                                    <p class="card-text">CPU: Intel® Core™ i5-1235U</p>
                                    <p class="card-text">Ram: 8GB DDR4 3200MHz </p>
                                    <p class="card-text">Rom: 512GB SSD SATA M.2</p>
                                    <p class="card-text">Bảo hành: 12 tháng</p>
                                    <p class="card-text text-danger fw-bold">Price: 4.490.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/hinh-2.png" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Laptop</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Laptop Lenovo V14 G4 IAH
                                        83FR000UVN</h4>
                                    <p class="card-text">CPU: Intel® Core™ i5-12500H</p>
                                    <p class="card-text">Ram: 16GB DDR4 3200MHz </p>
                                    <p class="card-text">Rom: 512GB SSD M.2</p>
                                    <p class="card-text">Bảo hành: 12 tháng</p>
                                    <p class="card-text text-danger fw-bold">Price: 9.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/hinh-3.png" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Laptop</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Laptop Avita PURA A+ AF14A3VNF56F
                                        Silver</h4>
                                    <p class="card-text">CPU: Intel® Core™ i5-1235U</p>
                                    <p class="card-text">Ram: 8GB DDR4 3200MHz</p>
                                    <p class="card-text">Rom: 512GB SSD SATA M.2</p>
                                    <p class="card-text">Bảo hành: 12 tháng</p>
                                    <p class="card-text text-danger fw-bold">Price: 4.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/hinh-4.png" class="card-img-top p-3" alt="Tranh bo doi bien phong">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Laptop</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Laptop ASUS Expertbook B1 B1402CBA
                                        NK1535W</h4>
                                    <p class="card-text">CPU: Intel® Core™ i3-1215U</p>
                                    <p class="card-text">Ram: 8GB DDR4 3200MHz </p>
                                    <p class="card-text">Rom: 256GB PCIE G3 SSD</p>
                                    <p class="card-text">Bảo hành: 12 tháng</p>
                                    <p class="card-text text-danger fw-bold">Price: 4.790.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-4 g-4 container m-auto" style="max-width: 1150px;">
                        <div class="col">
                            <div class="card">
                                <img src="./img/iphone-15-pro-max-xanh-1.png" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Điện thoại</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Điện thoại iPhone 15 Pro Max 256GB
                                        Màu xanh</h4>
                                    <p class="card-text">Màn hình: OLED6.7"Super Retina XDR</p>
                                    <p class="card-text">Hệ điều hành: iOS 17</p>
                                    <p class="card-text">Chip: A17 Pro</p>
                                    <p class="card-text">Ram: 8 GB</p>
                                    <p class="card-text">Rom: 256 GB</p>
                                    <p class="card-text text-danger fw-bold">Price: 27.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/iphone-15-pro-max-titan-1.png" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Điện thoại</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Điện thoại iPhone 15 Pro Max 256GB
                                        titan</h4>
                                    <p class="card-text">Màn hình: OLED6.7"Super Retina XDR</p>
                                    <p class="card-text">Hệ điều hành: iOS 17</p>
                                    <p class="card-text">Chip: A17 Pro</p>
                                    <p class="card-text">Ram: 8 GB</p>
                                    <p class="card-text">Rom: 256 GB</p>
                                    <p class="card-text text-danger fw-bold">Price: 29.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/iphone-15-hong-dai-dien-1.png" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Điện thoại</p>
                                    <h4 class="card-title allproduct-card-title fs-5">iPhone 15 Plus 128GB VN/A</h4>
                                    <p class="card-text">Màn hình: OLED6.7"Super Retina XDR</p>
                                    <p class="card-text">Hệ điều hành: iOS 17</p>
                                    <p class="card-text">Chip: A17 Pro</p>
                                    <p class="card-text">Ram: 8 GB</p>
                                    <p class="card-text">Rom: 256 GB</p>
                                    <p class="card-text text-danger fw-bold">Price: 22.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/avt-iphone-13-pro-max-gray.png" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Điện thoại</p>
                                    <h4 class="card-title allproduct-card-title fs-5">iPhone 13 Pro Max 128GB Cũ đẹp
                                        99%iPhone 13 Pro Max 128GB Cũ đẹp 99%</h4>
                                    <p class="card-text">Màn hình: 6.7 inches</p>
                                    <p class="card-text">Hệ điều hành: IOS 15</p>
                                    <p class="card-text">Chip: Apple A15</p>
                                    <p class="card-text">Ram: 8 GB</p>
                                    <p class="card-text">Rom: 128 GB</p>
                                    <p class="card-text text-danger fw-bold">Price: 14.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-4 g-4 container m-auto" style="max-width: 1150px;">
                        <div class="col">
                            <div class="card">
                                <img src="./img/iPad-9-wifi.jpg" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Tablet</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Máy tính bảng iPad 9 WiFi 64GB
                                    </h4>
                                    <p class="card-text">Màn hình: 10.2"Retina IPS LCD</p>
                                    <p class="card-text">Hệ điều hành: iPadOS 15</p>
                                    <p class="card-text">Chip: Apple A13 Bionic</p>
                                    <p class="card-text">Ram: 3 GB</p>
                                    <p class="card-text">Rom: 64 GB</p>
                                    <p class="card-text text-danger fw-bold">Price: 14.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/ipad-pro-11-inch-m4-wifi.jpg" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Tablet</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Máy tính bảng iPad Pro M4 11 inch
                                        WiFi 256GB</h4>
                                    <p class="card-text">Màn hình: 11"Ultra Retina XDR</p>
                                    <p class="card-text">Hệ điều hành: iPadOS 17</p>
                                    <p class="card-text">Chip: Apple M4 9 nhân</p>
                                    <p class="card-text">Ram: 8 GB</p>
                                    <p class="card-text">Rom: 256 GB</p>
                                    <p class="card-text text-danger fw-bold">Price: 20.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/ipad-air-5-wifi.jpg" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Tablet</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Máy tính bảng iPad Air 5 M1 WiFi
                                        64GB</h4>
                                    <p class="card-text">Màn hình: 10.9"Retina IPS LCD</p>
                                    <p class="card-text">Hệ điều hành: iPadOS 15</p>
                                    <p class="card-text">Chip: Apple M1</p>
                                    <p class="card-text">Ram: 8 GB</p>
                                    <p class="card-text">Rom: 64 GB</p>
                                    <p class="card-text text-danger fw-bold">Price: 9.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./img/samsung-galaxy-tab-a9-bac-4g-4.jpg" class="card-img-top p-3" alt="">
                                <div class="card-body">
                                    <p class="card-text">Loại sản phẩm: Tablet</p>
                                    <h4 class="card-title allproduct-card-title fs-5">Máy tính bảng Samsung Galaxy Tab
                                        A9 4G</h4>
                                    <p class="card-text">Màn hình: 8.7"TFT LCD</p>
                                    <p class="card-text">Hệ điều hành: Android 13</p>
                                    <p class="card-text">Chip: MediaTek Helio G99</p>
                                    <p class="card-text">Ram: 4 GB</p>
                                    <p class="card-text">Rom: 64 GB</p>
                                    <p class="card-text text-danger fw-bold">Price: 2.900.000 VND</p>
                                    <div class="btn-group" role="group" aria-label="Basic example"
                                        style="float: right;">
                                        <a href="../productdetail/"><button type="button"
                                                class="btn btnAllProduct-viewdetail bg-dark text-light">View
                                                detail</button></a>
                                        <a href="ProductPay.php"><button type="button"
                                                class="btn btnAllProduct-buy">Buy</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

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