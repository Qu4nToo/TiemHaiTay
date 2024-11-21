<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
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
    .error-text {
        color: red;
    }
    .gradient-custom {
        background: linear-gradient(to right, #868f96 0%, #596164 100%);
    }
</style>

<body>
    <div id="content" class="d-flex justify-content-center align-items-center vh-100 gradient-custom">
        <form id="login-form" class="p-5 rounded-4 border border-success bg-white" name="frmLogin" action="">
            <h1 class="text-center mb-4">Login</h1>
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="username" class="form-control" name="username" />
                <label class="form-label" for="username">User Name</label>
                <p id="error-text-1" class="error-text"></p>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="password" class="form-control" />
                <label class="form-label" for="password">Password</label>
                <p id="error-text-2" class="error-text"></p>
            </div>

            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>

                <div class="col">
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary btn-block mb-4" onclick="return myFunction()">Sign
                    in</button>
            </div>


            <div class="text-center">
                <p>Not a member? <a href="../register/">Register</a></p>
            </div>
            <div class="text-center">
                <p><a href="../" style="text-decoration: none;"><i class="fa-solid fa-arrow-left"></i>Go back</a></p>
            </div>
        </form>
    </div>
    <script>
        function myFunction() {
            let u = document.getElementById("username").value;
            let text = "";
            var x = document.getElementById("error-text-1");
            var y = document.getElementById("error-text-2");
            if (u > 15 || u == 0 || u.indexOf(' ') !== -1) {
                text = "tên tài khoản không hợp lệ";
            }
            else {
                x.style.display = 'none';
            }
            document.getElementById("error-text-1").innerHTML = text;
            let p = document.getElementById("password").value;
            let text1 = "";
            if (p < 8 || p == 0 || p.indexOf(' ') !== -1) {
                text1 = "Mật khẩu không hợp lệ";
            }
            else {
                y.style.display = 'none';
            }
            document.getElementById("error-text-2").innerHTML = text1;
            var frm = document.frmLogin;
            if (u == "admin" && p == "123"){
                frm.action = './admin/';
                frm.submit();
            }
            else if (text == "" && text1 == "") {
                frm.action = '/';
                frm.submit();
            }

        }
    </script>
</body>