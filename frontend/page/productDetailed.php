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

    <div class="tabPage">

        <div class="tabPageContainer container d-flex align-items-center">
            <style>
            .tabPage {
                width: 100%;
                height: 50px;
                background-color: #ffffff;
                align-content: center;
            }

            .tabPageItem {
                font-size: 16px;
                font-family: "KoHo", sans-serif;
                margin-right: 10px;
                color: #A4A4A4;
                font-weight: 500;
            }
            </style>
            <h5 class="tabPageItem tabPageContent align-self-center">Home</h5>
            <i class="fa-solid fa-greater-than tabPageItem"></i>
            <h5 class="tabPageItem tabPageContent align-self-center">All Product</h5>
            <i class="fa-solid fa-greater-than tabPageItem"></i>
            <h5 class="tabPageItem tabPageContent align-self-center text-dark fw-bold">HpVictus 16</h5>
        </div>
    </div>

    <div class="boxProduct row container mt-5" style="width: 100%; height: fit-content; margin:auto; ">
        <div class="ColProduct col-2 d-flex flex-column gap-3">
            <a href=""><img src="./img/hp-victus-16.png" alt="" class="img-fluid object-fit-scale border p-2"
                    style="width: 110px; height: 100x; background-color: #EDEDED; opacity: 100%;"></a>
            <a href=""><img src="./img/hp-victus-16.png" alt="" class="img-fluid object-fit-scale border p-2"
                    style="width: 110px; height: 100x; background-color: #EDEDED; opacity: 50%;"></a>
            <a href=""><img src="./img/hp-victus-16.png" alt="" class="img-fluid object-fit-scale border p-2"
                    style="width: 110px; height: 100x; background-color: #EDEDED; opacity: 50%;"></a>
            <a href=""><img src="./img/hp-victus-16.png" alt="" class="img-fluid object-fit-scale border p-2"
                    style="width: 110px; height: 100x; background-color: #EDEDED; opacity: 50%;"></a>
        </div>
        <div class="ColProduct col-5 d-flex flex-items-center" style="background-color: EDEDED;">
            <div class="mainProductImg h-100 p-2"">
                <a href="">  <img src=" ./img/hp-victus-16.png" alt=""
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
                <h1 class="productName productInfo pb-2" style="font-weight: 1000;"> HP Victus 16 Used</h1>
                <div class="boxStatus d-flex productInfo pb-2">
                    <h2 style="font-size: 20px;">Tình trạng:&nbsp; </h2>
                    <h6 style="font-size: 20px; color:#257707; font-weight: 700;"> Có hàng</h6>
                </div>
                <div class="boxPrice d-flex productInfo pb-2">
                    <h2 style="font-size: 30;">Giá:&nbsp; </h2>
                    <h6 style="font-size: 30px; font-weight: 700;"> 7.000.000VND</h6>
                </div>

                <div class="boxSpecification d-flex productInfo flex-column">
                    <div class="specificationBoxDetailed p-2 row align-items-start gap-3" >
                        <style>
                            .col {
                                padding: 7px 20px;
                                width: 100px;
                            }
                            
                        </style>
                        <div class=" detailed col rounded" style="background-color: #EDEDED; ">
                        <h6 class="info" style="color: #A7A7A7;">Screen size</h6>
                        <h6 class="info" style="color: #000000;">16"</h6>
                    </div>
                    <div class="detailed col rounded" style="background-color: #EDEDED;">
                        <h6 class="info" style="color: #A7A7A7;">CPU</h6>
                        <h6 class="info" style="color: #000000;">Ryzen 5-5600H</h6>
                    </div>
                    <div class="detailed col rounded" style="background-color: #EDEDED;">
                        <h6 class="info" style="color: #A7A7A7;">Rom</h6>
                        <h6 class="info" style="color: #000000;">512GB</h6>
                    </div>
                </div>

                <div class="specificationBoxDetailed p-2 row align-items-start gap-3" >
                        <div class=" detailed col rounded" style="background-color: #EDEDED; ">
                    <h6 class="info" style="color: #A7A7A7;">Camera</h6>
                    <h6 class="info" style="color: #000000;">HD</h6>
                </div>
                <div class="detailed col rounded" style="background-color: #EDEDED;">
                    <h6 class="info" style="color: #A7A7A7;">Ram</h6>
                    <h6 class="info" style="color: #000000;">8GB</h6>
                </div>
                <div class="detailed col rounded" style="background-color: #EDEDED;">
                    <h6 class="info" style="color: #A7A7A7;">Card</h6>
                    <h6 class="info" style="color: #000000;">RTX 3050</h6>
                </div>
            </div>
        </div>

        <div class="describtionProduct mt-3">
            <p class="info productInfo descriptionProduct" style="font-size: 18px; color: #717171;">Laptop HP Victus 16
                đã qua sử dụng, tình trạng tổng thể tốt, ngoại hình tốt, bàn phím và camera sử dụng bình thường, đã test
                hết tất cả chức năng.</p>
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
            <button type="button" class="rounded productInfo btnProduct border-dark text-dark d-flex align-items-center"
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

        <div class="shippingDescription mt-3 ">
            <div class="row">
                <div class="col">
                    <style>
                    .detailDescription h6 {
                        font-size: 14px;
                        margin-left: 10px;
                        line-height: 10px;
                    }
                    </style>
                    <div class="boxDescription d-flex " id="1" style="width: 230px; height: fit-content;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="grey"
                            class="bi bi-truck rounded p-2 mr-3" viewBox="0 0 16 16" style="1ckground-color: #EDEDED;">
                            <path
                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                        </svg>
                        <div class="detailDescription ml-5">
                            <h6 style="color: #A7A7A7;">Free shipping with</h6>
                            <h6 style="color: #000000;">Phạm vi 3km</h6>
                            <h6 style="color: #000000;">Đơn hàng trên 1 triệu</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="boxDescription d-flex " id="1" style="width: 230px; height: fit-content;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="grey"
                            class="bi bi-truck rounded p-2 mr-3" viewBox="0 0 16 16" style="background-color: #EDEDED;">
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
                            class="bi bi-truck rounded p-2 mr-3" viewBox="0 0 16 16" style="background-color: #EDEDED;">
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
    </div>
    <div class="SpecifyInfomartionProduct container-fluid pt-5 ">
        <style>
        .SpecifyInfomartionProduct {
            height: fit-content;
            background-color: #EDEDED;
            margin-top: 100px;
        }

        .SpecifyInfomartionProduct_child {
            background-color: #fefefe;
            height: 300px;
            margin: auto;
            width: 80%;
            height: fit-content;

        }

        .hightLightBox {
            margin-bottom: 50px;
        }

        .NameSpecific {
            padding-top: 50px;
        }

        .seeMoreBtn {
            width: 190px;
            height: 48px;
            background-color: #ffffff;
            border-color: #868686;
        }
        </style>
        <div class="SpecifyInfomartionProduct_child p-5 rounded">
            <h3 class="productInfo text-center pb-5" style="font-size: 30px; font-weight: bold;">Chi tiết sản phẩm</h3>
            <div class="hightLightBox" id="hightlightProduct1">
                <h6 class="productInfo productHightlight" id="hightLightProduct1_title"
                    style="font-size: 20px; font-weight: bold;">Đặc điểm nổi bật của HP Gaming Victus 16</h6>
                <p class="productInfo productHightlightDescription" id="hightLightProduct1_content"
                    style="font-size: 20px;">
                    Với những linh kiện cực đỉnh như CPU Ryzen 5 5600H hay card đồ họa RTX 3050, HP Gaming Victus 16
                    đích thực là một ngôi sao trong phân khúc laptop gaming giá rẻ, sẵn sàng cùng bạn chiến game một
                    cách mạnh mẽ ở bất cứ đâu.
                </p>
            </div>

            <div class="hightLightBox" id="hightLightProduct2">
                <h6 class="productInfo productHightlight" id="hightLightProduct2_title"
                    style="font-size: 20px; font-weight: bold;">Chiếc laptop chơi game lịch lãm</h6>
                <p class="productInfo productHightlightDescription" id="hightLightProduct2_content"
                    style="font-size: 20px;">
                    HP Victus 16mang trên mình vẻ ngoài lịch lãm theo ngôn ngữ thiết kế đơn giản, thay vì hầm hố như
                    những chiếc laptop chơi game khác. Màu đen xám mạnh mẽ, những đường nét vuông vắn cứng cáp và đặc
                    biệt là sự tối giản tạo nên một sản phẩm đẳng cấp, toát lên vẻ lạnh lùng, sang trọng. Dù có màn hình
                    lớn 16,1 inch nhưng HP Victus vẫn rất gọn gàng với trọng lượng chỉ 2,46kg và độ mỏng 2,35cm. Viền
                    màn hình cực mỏng ở 3 cạnh cùng trọng lượng tương đối nhẹ giúp HP Victus có tính di động cao, dễ
                    dàng để bạn mang đi bất cứ đâu.
                </p>
            </div>

            <div class="hightLightBox" id="hightlightProduct1">
                <h6 class="productInfo productHightlight" id="hightLightProduct1_title"
                    style="font-size: 20px; font-weight: bold;">Chơi game hết mình, làm việc hết sức</h6>
                <p class="productInfo productHightlightDescription" id="hightLightProduct1_content"
                    style="font-size: 20px;">
                    HP Victus 16 trang bị CPU Ryzen 5 5600H, bộ vi xử lý thuộc series 6000 thế hệ mới từ nhà AMD. Với ưu
                    điểm là sản xuất trên tiến trình 7nm tiên tiến, có tới 6 lõi 12 luồng, tốc độ tối đa 4.5GHz và TDP
                    45W, Ryzen 5 5600H vừa mang đến hiệu suất mạnh mẽ, vừa tiết kiệm năng lượng, lại vừa có khả năng duy
                    trì xung nhịp cao trong thời gian dài. Chính vì thế, HP Victus 16 không chỉ chơi game tốt mà còn đạt
                    hiệu quả cao trong công việc, đáp ứng được những công việc chuyên nghiệp, đòi hỏi hiệu suất cao.
                </p>
            </div>

            <h3 class="productInfo text-center pb-5" style="font-size: 30px; font-weight: bold;">Thông số sản phẩm</h3>
            <div class="specific_DetailedProduct">
                <div class="NameSpecific" id="NameSpecific_1">
                    <h6 class="productInfo pb-5" style="font-size: 20px; font-weight: bold; padding-bottom: 10px;">Màn
                        hình</h6>
                    <div id="specificDetailed1_1" class="d-flex" style="justify-content: space-between; height:20px;">
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">Kích thước</h3>
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">16"</h3>
                    </div>
                    <hr>
                    <div id="specificDetailed1_1" class="d-flex" style="justify-content: space-between; height:20px;">
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">Độ phân giải</h3>
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">1920 x 1080</h3>
                    </div>
                    <hr>
                    <div id="specificDetailed1_1" class="d-flex" style="justify-content: space-between; height:20px;">
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">Tấm nền</h3>
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">IPS</h3>
                    </div>
                    <hr>
                    <div id="specificDetailed1_1" class="d-flex" style="justify-content: space-between; height:20px;">
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">Tốc độ</h3>
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">144Hz</h3>
                    </div>
                    <hr>
                    <div id="specificDetailed1_1" class="d-flex" style="justify-content: space-between; height:20px;">
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">Thông tin thêm</h3>
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">Gồm các chế độ hỗ trợ khác nhau tuỳ nhu
                            cầu như chơi game, làm việc.</h3>
                    </div>
                    <hr>
                </div>

                <div class="NameSpecific" id="NameSpecific_2">
                    <h6 class="productInfo pb-5" style="font-size: 20px; font-weight: bold; padding-bottom: 10px;">CPU
                    </h6>
                    <div id="specificDetailed1_1" class="d-flex" style="justify-content: space-between; height:20px;">
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">CPU</h3>
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">AMD, Ryzen 5, 5600H</h3>
                    </div>
                    <hr>
                    <div id="specificDetailed1_1" class="d-flex" style="justify-content: space-between; height:20px;">
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">Number of cores</h3>
                        <h3 class="productInfo  pb-5" style="font-size: 15px;">6</h3>
                    </div>
                </div>
                <div class="btnSeeMoreContainer d-flex justify-content-center">
                    <button class="seeMoreBtn productInfo rounded text-dark" style="font-size: 15px;">
                        Xem thêm
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="SpecifyInfomartionProduct container-fluid pt-3 ">
        <style>
        .SpecifyInfomartionProduct {
            height: fit-content;
            background-color: #EDEDED;
            margin-top: 100px;
        }

        .SpecifyInfomartionProduct_child {
            background-color: #fefefe;
            height: 300px;
            margin: auto;
            width: 80%;
            height: fit-content;
        }

        .relativeProductTitle {
            padding-top: 50px;
            padding-left: 30px;
        }

        .textInCard {
            font-size: 20px;
            font-family: "KoHo", sans-serif;
            font-weight: bold;
        }
        </style>
        <div id="carouselExampleDark2" class="carousel carousel-dark slide border-bottom border-grey "
            data-bs-ride="carousel" style="background-color: #EDEDED;">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <div class="container rounded" style="background-color: rgb(255, 255, 255);">
                        <h3 class="productInfo pb-2 relativeProductTitle" style="font-size: 30px; font-weight: bold;">
                            Sản phẩm cùng loại</h3>
                        <div class="row justify-content-center" style="padding-bottom: 50px;">
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <div class="container rounded" style="background-color: rgb(255, 255, 255);">
                        <h3 class="productInfo pb-2 relativeProductTitle" style="font-size: 30px; font-weight: bold;">
                            Sản phẩm cùng loại</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container rounded" style="background-color: rgb(255, 255, 255);">
                        <h3 class="productInfo pb-2 relativeProductTitle" style="font-size: 30px; font-weight: bold;">
                            Sản phẩm cùng loại</h3>
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-10 mt-3">
                                <div class="card p-4">
                                    <img src="./img/ipad.png" class="card-img-top" alt="...">
                                    <div class="card-body pt-0">
                                        <h5 class="card-title text-center textInCard">Ipad pro M1</h5>
                                        <p class="card-text h5 m-0 textInCard">Pin: 90%</p>
                                        <p class="card-text h5 m-0 textInCard">Ngoại hình:90%</p>
                                        <p class="card-text h5 m-0 textInCard text-danger">Price: 9.000.000vnđ</p>
                                        <div class="container d-flex justify-content-center mt-3">
                                            <a href="#" class="btn bg-dark text-white">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark2"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark2"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="container d-flex justify-content-center mt-3 mb-3">
                <button type="button" class="btn bg-dark text-white">Xem tất cả</button>
            </div>
        </div>
    </div>
    </div>

    <div class="shopRate" style="height: 500px; background-color: #ffffff;">
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