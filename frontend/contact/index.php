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
    .error-message{
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
         <!-- sidebar -->
         <div class="container">
            <div class="row">
                <!-- trái -->    
                <!-- Bên Phải -->
                <!-- Form đăng nhập -->
                <!-- Checkout Section Begin -->
         <section class="checkout spad">
            <div class="container">
                <div class="checkout__form">
                    <h4 style="color: red;font-weight: bold;">Thông tin liên hệ</h4>
                    <form id="checkoutForm" action="#">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Tên<span>*</span></p>
                                            <input type="text" id="firstNameInput">
                                            <div class="error-message" id="firstNameErrorMessage"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Họ<span>*</span></p>
                                            <input type="text" id="lastNameInput">
                                            <div class="error-message" id="lastNameErrorMessage"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Quốc gia<span>*</span></p>
                                    <input type="text" id="nationInput">
                                    <div class="error-message" id="nationErrorMessage"></div>
                                </div>
                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <input type="text" placeholder="Địa chỉ thường trú" class="checkout__input__add" id="adresseInput">
                                    <div class="error-message" id="adresseErrorMessage"></div>
                                    <input type="text" placeholder="Căn hộ, suite, unite ect (tùy chọn)" id="suiteInput">
                                    <div class="error-message" id="suiteErrorMessage"></div>
                                </div>
                                <div class="checkout__input">
                                    <p>Quê quán<span>*</span></p>
                                    <input type="text" id="countryInput">
                                    <div class="error-message" id="countryErrorMessage"></div>
                                </div>
                                <div class="checkout__input">
                                    <p>Nội dung<span>*</span></p>
                                    <input type="text" id="zipInput">
                                    <div class="error-message" id="zipErrorMessage"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Điện thoại<span>*</span></p>
                                            <input type="text" id="numInput">
                                            <div class="error-message" id="numErrorMessage"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" id="emailInput">
                                            <div class="error-message" id="emailErrorMessage"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-6">
                                <div class="checkout__order">
                                    <center><h4 style="color: red;font-weight: bold;">Đồng ý chấp thuận?</h4></center>
                                    <center><h5 style="font-weight: bold;">Bạn có chắc chắn với lưu thay đổi?</h5></center>
                                    <button type="button" class="site-btn" onclick="validateForm()">Đồng ý</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Checkout Section End -->           
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

            <!-- Scripts Float Animation -->
            <script>
                $(document).ready(function(){
                  $('.user-support').click(function(event) {
                    $('.social-button-content').slideToggle();
                  });
                  });
              </script>
            <!-- End Scripts Float Animation -->
            <!-- Scripts Validate -->
            <script>
                function validateForm() {              
                    var firstName = firstNameInput.value.trim();
                    var lastName = lastNameInput.value.trim();
                    var email = emailInput.value.trim();
                    var nation= nationInput.value.trim();
                    var adress = adresseInput.value.trim();
                    var suite = suiteInput.value.trim();
                    var country = countryInput.value.trim();
                    var zip = zipInput.value.trim();
                    var number = numInput.value.trim();
                    var isValid = true;
        
                    if (firstName === '') {
                        firstNameErrorMessage.textContent = 'Vui lòng nhập tên của bạn.';
                        isValid = false;
                    } else {
                        firstNameErrorMessage.textContent = '';
                    }
        
                    if (lastName === '') {
                        lastNameErrorMessage.textContent = 'Vui lòng nhập họ của bạn.';
                        isValid = false;
                    } else {
                        lastNameErrorMessage.textContent = '';
                    }
        
                    if (nation === '') {
                        nationErrorMessage.textContent = 'Vui lòng nhập quốc gia của bạn.';
                        isValid = false;
                    } else {
                        nationErrorMessage.textContent = '';
                    }
        
                    if (adress === '') {
                        adresseErrorMessage.textContent = 'Vui lòng nhập địa chỉ của bạn.';
                        isValid = false;
                    } else {
                        adresseErrorMessage.textContent = '';
                    }
        
                    if (suite === '') {
                        suiteErrorMessage.textContent = 'Vui lòng nhập nơi của bạn.';
                        isValid = false;
                    } else {
                        suiteErrorMessage.textContent = '';
                    }
        
                    if (country === '') {
                        countryErrorMessage.textContent = 'Vui lòng nhập quê quán của bạn.';
                        isValid = false;
                    } else {
                        countryErrorMessage.textContent = '';
                    }
        
                    if (zip === '') {
                        zipErrorMessage.textContent = 'Vui lòng nhập nội dung của bạn.';
                        isValid = false;
                    } else {
                        zipErrorMessage.textContent = '';
                    }
        
                    if (number === '') {
                        numErrorMessage.textContent = 'Vui lòng nhập số điện thoại của bạn.';
                        isValid = false;
                    } else {
                        numErrorMessage.textContent = '';
                    }
        
                    if (!validateEmail(emailInput.value)) {
                        emailErrorMessage.textContent = 'Vui lòng nhập một địa chỉ email hợp lệ.';
                        isValid = false;
                    } else {
                        emailErrorMessage.textContent = '';
                    }
        
                    if (isValid) {
                        alert('Đặt hàng thành công!');
                    }
        
                }
            
                function validateEmail(email) {
                    var emailRegex = /\S+@\S+\.\S+/;
                    return emailRegex.test(email);
                }       
            </script>
            <!-- End Scripts Validate -->
     <!-- Js Plugins -->
     <script src="scripts/jquery-3.3.1.min.js"></script>
     <script src="scripts/bootstrap.min.js"></script>
     <script src="scripts/jquery.nice-select.min.js"></script>
     <script src="scripts/jquery-ui.min.js"></script>
     <script src="scripts/jquery.slicknav.js"></script>
     <script src="scripts/mixitup.min.js"></script>
     <script src="scripts/owl.carousel.min.js"></script>
     <script src="scripts/main.js"></script>
</body>

</html>