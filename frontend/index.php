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
    <!-- Quân -->
    <nav class=" navbar navbar-expand-lg sticky-top mb-4 bg-white border-bottom border-dark"
        style="margin-bottom: 10px;">
        <div class="container alight-item-center">
            <a href="./" class=" navbar-brand text-dark rounded-2 d-flex align-items-center flex-grow-0 col-3">
                <img class="img-fluid" src="./assets/img/lopoXoaPhong.png" width="30%" height="30%" alt=""
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
                <ul class="navbar-nav mb-lg-0 d-flex flex-row justify-content-between col-3">
                    <li class="nav-item fs-4 rounded-2 ps-1 pe-1">
                        <a class="nav-link text-dark " href="#"><i class="fa-regular fa-heart"></i></a>
                    </li>
                    <li class="nav-item fs-4 rounded-2 ps-1 pe-1">
                        <a class="nav-link text-dark " href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav-item fs-4 rounded-2 ps-1 pe-1">
                        <a class="nav-link text-dark " href="./login/"><i class="fa-regular fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="./assets/img/uudai1.png"
                    class="d-block w-50 m-auto mb-4" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="./assets/img/uudai2.png" class="d-block w-50 m-auto mb-4"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/uudai3.png"
                    class="d-block w-50 m-auto mb-4" alt="...">
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
    <!-- Triển -->
    <div class="container-fluid text-center p-4" style="background-color: #EDEDED;">
        <p class="mt-4 h5">Ở tiệm hai tay</p>
        <div class="mt-4 mb-4">
            <p class="m-0 ">Chúng tôi cung cấp các sản phẩm Laptop secondhand chất lượng, giá tốt.</p>
            <p class="m-0">Tại <Strong>Tiệm Hai Tay</Strong>, tất cả sản phẩm đều được kiểm tra kỹ lưỡng trước khi trao
                đến tay của các bạn!</p>
        </div>
    </div>
    <div class="container-fluid p-5">
        <div id="carouselExampleDark1" class="carousel carousel-dark slide">
            <p class="h5 text-center">Danh mục sản phẩm</p>
            <div class="carousel-inner mt-5">
                <div class="carousel-item active" data-bs-interval="10000">
                    <div class="container">
                        <div class="row ">
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-phone mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                    </svg>
                                    <p class="m-0">Phones</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center  w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-smartwatch mb-2" viewBox="0 0 16 16">
                                        <path d="M9 5a.5.5 0 0 0-1 0v3H6a.5.5 0 0 0 0 1h2.5a.5.5 0 0 0 .5-.5z" />
                                        <path
                                            d="M4 1.667v.383A2.5 2.5 0 0 0 2 4.5v7a2.5 2.5 0 0 0 2 2.45v.383C4 15.253 4.746 16 5.667 16h4.666c.92 0 1.667-.746 1.667-1.667v-.383a2.5 2.5 0 0 0 2-2.45V8h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5H14v-.5a2.5 2.5 0 0 0-2-2.45v-.383C12 .747 11.254 0 10.333 0H5.667C4.747 0 4 .746 4 1.667M4.5 3h7A1.5 1.5 0 0 1 13 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 11.5v-7A1.5 1.5 0 0 1 4.5 3" />
                                    </svg>
                                    <p class="m-0">Smart Watch</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-camera mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z" />
                                        <path
                                            d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                    </svg>
                                    <p class="m-0">Camera</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-headphones mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5" />
                                    </svg>
                                    <p class="m-0">Headphones</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center  w-100   product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-laptop mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5" />
                                    </svg>
                                    <p class="m-0">Laptop</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-controller mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1z" />
                                        <path
                                            d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729q.211.136.373.297c.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466s.34 1.78.364 2.606c.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527s-2.496.723-3.224 1.527c-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.3 2.3 0 0 1 .433-.335l-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a14 14 0 0 0-.748 2.295 12.4 12.4 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.4 12.4 0 0 0-.339-2.406 14 14 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27s-2.063.091-2.913.27" />
                                    </svg>
                                    <p class="m-0">Gaming</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-phone mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                    </svg>
                                    <p class="m-0">Phones</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center  w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-smartwatch mb-2" viewBox="0 0 16 16">
                                        <path d="M9 5a.5.5 0 0 0-1 0v3H6a.5.5 0 0 0 0 1h2.5a.5.5 0 0 0 .5-.5z" />
                                        <path
                                            d="M4 1.667v.383A2.5 2.5 0 0 0 2 4.5v7a2.5 2.5 0 0 0 2 2.45v.383C4 15.253 4.746 16 5.667 16h4.666c.92 0 1.667-.746 1.667-1.667v-.383a2.5 2.5 0 0 0 2-2.45V8h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5H14v-.5a2.5 2.5 0 0 0-2-2.45v-.383C12 .747 11.254 0 10.333 0H5.667C4.747 0 4 .746 4 1.667M4.5 3h7A1.5 1.5 0 0 1 13 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 11.5v-7A1.5 1.5 0 0 1 4.5 3" />
                                    </svg>
                                    <p class="m-0">Smart Watch</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-camera mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z" />
                                        <path
                                            d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                    </svg>
                                    <p class="m-0">Camera</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-headphones mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5" />
                                    </svg>
                                    <p class="m-0">Headphones</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center  w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-laptop mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5" />
                                    </svg>
                                    <p class="m-0">Laptop</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-controller mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1z" />
                                        <path
                                            d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729q.211.136.373.297c.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466s.34 1.78.364 2.606c.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527s-2.496.723-3.224 1.527c-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.3 2.3 0 0 1 .433-.335l-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a14 14 0 0 0-.748 2.295 12.4 12.4 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.4 12.4 0 0 0-.339-2.406 14 14 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27s-2.063.091-2.913.27" />
                                    </svg>
                                    <p class="m-0">Gaming</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-phone mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                    </svg>
                                    <p class="m-0">Phones</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center  w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-smartwatch mb-2" viewBox="0 0 16 16">
                                        <path d="M9 5a.5.5 0 0 0-1 0v3H6a.5.5 0 0 0 0 1h2.5a.5.5 0 0 0 .5-.5z" />
                                        <path
                                            d="M4 1.667v.383A2.5 2.5 0 0 0 2 4.5v7a2.5 2.5 0 0 0 2 2.45v.383C4 15.253 4.746 16 5.667 16h4.666c.92 0 1.667-.746 1.667-1.667v-.383a2.5 2.5 0 0 0 2-2.45V8h.5a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5H14v-.5a2.5 2.5 0 0 0-2-2.45v-.383C12 .747 11.254 0 10.333 0H5.667C4.747 0 4 .746 4 1.667M4.5 3h7A1.5 1.5 0 0 1 13 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 11.5v-7A1.5 1.5 0 0 1 4.5 3" />
                                    </svg>
                                    <p class="m-0">Smart Watch</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-camera mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z" />
                                        <path
                                            d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                    </svg>
                                    <p class="m-0">Camera</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-headphones mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5" />
                                    </svg>
                                    <p class="m-0">Headphones</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center  w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-laptop mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5" />
                                    </svg>
                                    <p class="m-0">Laptop</p>
                                </button>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-6 mt-2 mb-2">
                                <button type="button" class="btn text-center w-100 product-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-controller mb-2" viewBox="0 0 16 16">
                                        <path
                                            d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1m-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1z" />
                                        <path
                                            d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729q.211.136.373.297c.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466s.34 1.78.364 2.606c.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527s-2.496.723-3.224 1.527c-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.3 2.3 0 0 1 .433-.335l-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a14 14 0 0 0-.748 2.295 12.4 12.4 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.4 12.4 0 0 0-.339-2.406 14 14 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27s-2.063.091-2.913.27" />
                                    </svg>
                                    <p class="m-0">Gaming</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-center mt-5 align-items-center">
                <button class="carousel-control-prev position-static flex-grow-0" type="button"
                    data-bs-target="#carouselExampleDark1" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <div class="carousel-indicators m-0 position-static">
                    <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <button class="carousel-control-next position-static fs-4" type="button"
                    data-bs-target="#carouselExampleDark1" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- PHU -->
    <div id="carouselExampleDark2" class="carousel carousel-dark slide p-4 border-bottom border-dark"
        data-bs-ride="carousel" style="background-color: #EDEDED;">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/iPad-9-wifi.jpg" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad 9 WIFI</h5>
                                    <p class="card-text h5 m-0">pin: 98%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:97%</p>
                                    <p class="card-text h5 m-0">Price: 4.900.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/ipad.png" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad pro M1</h5>
                                    <p class="card-text h5 m-0">pin: 90%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:90%</p>
                                    <p class="card-text h5 m-0">Price: 9.000.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/ipad-air-11-inch-m2-wifi.jpg" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad Air 6 M2</h5>
                                    <p class="card-text h5 m-0">pin: 95%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:98%</p>
                                    <p class="card-text h5 m-0">Price: 14.590.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/ipad-air-13-inch-m2-wifi.jpg" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad Air 6 M2</h5>
                                    <p class="card-text h5 m-0">pin: 97%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:99%</p>
                                    <p class="card-text h5 m-0">Price: 16.900.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/ipad-pro-11-inch-m4-wifi.jpg" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad pro M4</h5>
                                    <p class="card-text h5 m-0">pin: 92%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:93%</p>
                                    <p class="card-text h5 m-0">Price: 20.900.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/ipad-pro-13-inch-m4-wifi.jpg" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad pro M4</h5>
                                    <p class="card-text h5 m-0">pin: 94%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:97%</p>
                                    <p class="card-text h5 m-0">Price: 29.490.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/iPad-Gen-10.jpg" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad 10</h5>
                                    <p class="card-text h5 m-0">pin: 90%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:94%</p>
                                    <p class="card-text h5 m-0">Price: 4.900.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/iPad-9-5G.jpg" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad 9 5G</h5>
                                    <p class="card-text h5 m-0">pin: 93%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:98%</p>
                                    <p class="card-text h5 m-0">Price: 4.290.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-10 mt-3">
                            <div class="card p-4">
                                <img src="./assets/img/ipad-air-5-wifi.jpg" class="card-img-top" alt="...">
                                <div class="card-body pt-0">
                                    <h5 class="card-title text-center">Ipad Air 5</h5>
                                    <p class="card-text h5 m-0">pin: 94%</p>
                                    <p class="card-text h5 m-0">Ngoại hình:92%</p>
                                    <p class="card-text h5 m-0">Price: 9.900.000vnđ</p>
                                    <div class="container d-flex justify-content-center mt-3">
                                        <a href="./productdetail/" class="btn bg-dark text-white">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <button type="button" class="btn bg-dark text-white">Xem tất cả</button>
        </div>
    </div>

    <!-- Trí -->
    <div class="container-fluid pb-5 pt-0">
        <div class="container-fluid p-2 rounded-bottom-5" style="background-color: #EDEDED;margin-bottom: 7%;">
            <p class="h4 text-center ">Tin tức nổi bật</p>
        </div>
        <div class="container">
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
    <!-- Thành -->
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

</body>

</html>