<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng ký</title>
    <meta charset="utf-8">
    <link rel="icon" href="img/CentralPark-logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/99c03377a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"
        type="text/javascript"></script>
</head>
<style>
    .error {
        color: #ff0000;
    }
    .gradient-custom {
        background: linear-gradient(to right, #868f96 0%, #596164 100%);
    }
</style>

<body>
    <div class="vh-100 gradient-custom">
        <div class="mask d-flex align-items-center h-100">
            <div class="container h-auto">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                <form id="register-form" name="frmRegister" action="Login.php">

                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="username">User Name</label>
                                        <input type="text" id="username" class="form-control form-control-lg"
                                            name="user" placeholder="User name" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="email">Your Email</label>
                                        <input type="email" id="email" class="form-control form-control-lg" name="email"
                                            placeholder="Email" />

                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control form-control-lg"
                                            name="password" placeholder="Password" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-2">
                                        <label class="form-label" for="re-password">Repeat your password</label>
                                        <input type="password" id="re-password" class="form-control form-control-lg"
                                            name="re-password" placeholder="Re-password" />
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-3">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3cg" name="checkbox" />
                                        <label class="form-check-label" for="dieukhoan">
                                            Tôi đồng ý với <a href="#!" class="text-body"><u>Điều khoản
                                                </u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block mb-2"
                                            id="submitBtn">Register</button>
                                    </div>

                                    <div id="success-message" class="alert alert-success d-none" role="alert">
                                        Registration successful! You can now log in.
                                    </div>

                                    <p class="text-center text-muted mt-3 mb-0">Have already an account? <a
                                            href="Login.php" class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $().ready(function () {
            $("#register-form").validate({
                onfocusout: false,
		        onkeyup: false,
		        onclick: false,
                rules: {
                    "user": {
                        required: true,
                        maxlength: 15,
                        noSpace: true
                    },
                    "password": {
                        required: true,
                        validatePassword: true,
                        minlength: 8,
                    },
                    "re-password": {
                        equalTo: "#password",
                        minlength: 8
                    },
                    "email": {
                        email: true,
                        required: true
                    },
                    "checkbox": {
                        required: true
                    }
                },
                messages: {
                    "user": {
                        required: "Bắt buộc nhập User name",
                        maxlength: "Hãy nhập tối đa 15 ký tự",
                        noSpace: "Tên đăng nhập không được có dấu cách"
                    },
                    "password": {
                        required: "Bắt buộc nhập password",
                        minlength: "Hãy nhập ít nhất 8 ký tự",
                        validatePassword: "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa,chữ thường,chữ số,kí tự đặc biệt"
                    },
                    "re-password": {
                        equalTo: "Hai password phải giống nhau",
                        minlength: "Hãy nhập ít nhất 8 ký tự",
                        
                    },
                    "email": {
                        email: "hãy nhập đúng định dạng email",
                        required: "hãy nhập email của bạn"
                    },
                    "checkbox": {
                        required: "bạn phải đồng ý trước khi đăng ký."
                    }
                },
            });
        });
        $("#register-form").on("submit", function (event) {
            if($("#register-form").valid()){
                alert("Đăng ký thành công");
            }
        });
        jQuery.validator.addMethod("noSpace", function (value, element) {
            return value.indexOf(" ") == -1;
        }, "Space are not allowed");
        $.validator.addMethod("validatePassword", function (value, element) {
            return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[~!@#$%^&*-_])[a-zA-Z0-9~!@#$%^&*-_]{8,16}$/.test(value);
        });
    </script>
</body>