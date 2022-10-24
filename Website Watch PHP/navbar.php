<?php
// đăng xuất
if (isset($_POST['logout'])) {
    session_destroy();
    session_unset();
    header("Refresh:0");
}
$currentUser = "";
// if đầu tiên kiểm tra $_SESSION['CurrentUser'] nếu rỗng và không  tồn tại thì $currentUser = ""
if (!(isset($_SESSION['CurrentUser'])) && !(empty($_SESSION['CurrentUser']))) {
    $currentUser = "";
} else {
    // khi load trang lại tức đã có $_SESSION['CurrentUser'] tồn tại thì $currentUser = $_SESSION['CurrentUser']
    if ((isset($_SESSION['CurrentUser'])))
        $currentUser = $_SESSION['CurrentUser'];
}
// kết nối cơ sở dữ liệu db_watch
require 'connectDB.php';
// lấy tên người dùng hiện thông quan session[currenuser] chứa mã khách hàng
$queryCurrenUser = "SELECT CONCAT(customers.First_Name,' ',customers.Last_Name) AS currentUserName FROM customers WHERE ID_Customer ='$currentUser'";
$resultCurrenUser = mysqli_query($conn, $queryCurrenUser);
// lấy dữ liệu các hãng đồng hồ có trong danh mục sản phẩm theo giới tính nam và nữ
$queryMen = "SELECT DISTINCT b.Name FROM products a inner join brands b on a.ID_Brand = b.ID_Brand WHERE ID_Gender = 'IDM'";
$resultMen = mysqli_query($conn, $queryMen);
$queryWomen = "SELECT DISTINCT b.Name FROM products a inner join brands b on a.ID_Brand = b.ID_Brand WHERE ID_Gender = 'IDWM'";
$resultWomen = mysqli_query($conn, $queryWomen);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    <style>
        .dWSearchResult {
            border-radius: 10px;
            background-color: #f1f1f1;
            display: none;
            position: absolute;
        }

        .showSearchResult {
            display: block;
            position: absolute;
            width: 90%;
            top: 40px;
            left: 0px;
        }
    </style>
    <script>
        // bắt sự kiện đăng xuất
        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.onload = function() {
                document.location = 'home.php';
            }
            // gọi file logout.php 
            xhr.open('GET', 'logout.php', true);
            xhr.send();
        }
        // bắt sự kiện thay đổi ký tự trong input search. Xử lý đưa dữ liệu ra bên ngoài từ từ khóa tìm kiếm
        function search(str) {
            if (str.length != 0) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("searchResult").innerHTML = this.responseText;
                    }
                }
                // gọi file search.php và truyền tham số get search
                xmlhttp.open("GET", "search.php?search=" + str, true);
                xmlhttp.send();
                // hiển thị ô kết quả tìm kiếm khi bắt được sự kiện
                document.getElementById("searchResult").classList.toggle("showSearchResult");
            }
        };
        // sử dụng công nghệ AJAX
        // bắt sự kiện đăng nhập (username và password) xử lý tại file login.php
        $(document).ready(function() {
            $("#submitLogin").submit(function() {

                var _email = $("#username").val();
                var _password = $("#passwordLogin").val();
                if (_email == "" || _email.length == 0) {
                    document.getElementById("validationPassWord").style.display = "none";
                    document.getElementById("validationUserName").innerHTML = "(*) Tài khoản trống";
                    document.getElementById("validationUserName").style.display = "block";
                } else if (_password == "" || _password.length == 0) {
                    document.getElementById("validationUserName").style.display = "none";
                    document.getElementById("validationPassWord").innerHTML = "(*) Mật khẩu trống";
                    document.getElementById("validationPassWord").style.display = "block";
                } else {
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: {
                            email: _email,
                            password: _password
                        },
                        cache: false,
                        success: function(result) {
                            /* check array  */
                            var n = result.search("Unknown database");
                            if (n > 0) {
                                alert("Database không đúng!");
                            } else {
                                /* Convert json to array */
                                var data = JSON.parse(result);
                                if (data['message'] == 1) {
                                    alert("Bạn đăng nhập thành công!")
                                    window.location.href = data['success'];
                                } else if (data['message'] == 0) {
                                    document.getElementById("validationPassWord").innerHTML = "Email & Password không đúng";
                                    document.getElementById("validationPassWord").style.display = "block";
                                } else {
                                    document.getElementById("validationPassWord").innerHTML = "Không tồn tại email và password";
                                    document.getElementById("validationPassWord").style.display = "block";
                                }
                            }
                        },
                        error: function(request, status, error) {
                            alert(status);
                        }
                    });
                }
                return false;
            });

            function show_hidden_password_login() {
                var check = true;
                if (check) {
                    document.getElementById("passwordLogin").setAttribute("type", "text");
                    document.getElementById("icon").setAttribute("class", "fas fa-times");
                    check = false;
                } else {
                    document.getElementById("passwordLogin").setAttribute("type", "password");
                    document.getElementById("icon").setAttribute("class", "fas fa-eye");
                    check = true;
                }
            }
        });
    </script>

</head>

<body>
    <div class="header sticky-top">
        <form action="" method="post">
            <div class="header-contact">
                <div class="container">
                    <div class="row">
                        <div class="left col-6 row">
                            <div class="header-icon col-2">
                                <a href="#">
                                    <i class="fa-brands fa-facebook-f icons"></i>
                                </a>
                                <a href="#">
                                    <i class="fa-brands fa-instagram icons"></i>
                                </a>
                                <a href="#">
                                    <i class="fa-brands fa-twitter icons"></i>
                                </a>
                            </div>
                            <div class="header-add col-10">
                                <a href="home.php">
                                    <p class="">
                                        <i id="iconhouse" class="fa-sharp fa-solid fa-house"></i>
                                        <strong>SHOP: </strong>2 Nguyễn Đình Chiểu, Nha Trang, Khánh Hòa
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="center col-2">

                        </div>
                        <div class="right col-4 ">
                            <p class="">
                                <i id="iconphone" class="fa-solid fa-phone-volume"></i>
                                <strong>HOTLINE: </strong>038 655 5555 |
                                <?php
                                if (mysqli_num_rows($resultCurrenUser) != 0) :
                                    $rowCurrenUser = mysqli_fetch_array($resultCurrenUser);
                                    // chuyển đổ chuỗi thành mãng
                                    $currentUser = explode(" ", $rowCurrenUser['currentUserName']);
                                    // kiểm tra số lượng phần tử trong mảng
                                    $sizeof = sizeof($currentUser);
                                    // ex: Nguyễn Quốc Châu -> $sizeof = 3
                                    // lấy tên (sizeof-1) và tên đệm (sizeof-2) gần nhất với tên.  
                                    $currentUser = $currentUser[($sizeof - 2)] . " " . $currentUser[($sizeof - 1)];
                                ?>
                                    <i class="fa-solid fa-user"></i>
                                    <strong><?php echo $currentUser;  ?></strong>
                                    <button type="submit" name="logout" class="btn btn-dark"><i class="fa-solid fa-right-from-bracket"></i></button>
                                    <!-- <i class="fa-solid fa-right-from-bracket" onclick="logout()"></i> -->
                                <?php else : ?>
                                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#login">Login</button> &nbsp;
                                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#signup">Signup</button>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="header-menu " id="header-menu">
            <div class="container">
                <div class="row">
                    <div class="col-5 menu">
                        <nav class="navbar navbar-expand-lg ">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="home.php">TRANG CHỦ</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                MEN
                                            </a>
                                            <ul class="dropdown-menu">
                                                <!-- duyệt các hãng thuộc giới tính nam, thẻ a có đường dẫn tới file shop chứa brand, giới tính tương tứng -->
                                                <?php while ($rowMen = mysqli_fetch_array($resultMen)) : ?>
                                                    <li><a class="dropdown-item" href="shop.php?gender=men&brand=<?php echo $rowMen[0] ?>"><?php echo $rowMen[0] ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                WOMEN
                                            </a>
                                            <ul class="dropdown-menu">
                                                <!-- duyệt các hãng thuộc giới tính nữ, thẻ a có đường dẫn tới file shop chứa brand, giới tính tương tứng -->
                                                <?php while ($rowWomen = mysqli_fetch_array($resultWomen)) : ?>
                                                    <li><a class="dropdown-item" href="shop.php?gender=women&brand=<?php echo $rowWomen[0] ?>"><?php echo $rowWomen[0] ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">TIN TỨC</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">LIÊN HỆ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="logo col-2">
                        <img id="logo" src="./img/tcwlogo.png" alt="" srcset="">
                    </div>
                    <div class="col-5 row right searchbtn">
                        <div class="col-7">
                            <div class="input-group">
                                <div id="search-autocomplete" class="form-outline">
                                    <input onkeyup="search(this.value)" type="search" id="form1" class="form-control" placeholder="Tìm kiếm..." />
                                </div>
                                <button type="button" class="btn" style="border-bottom-right-radius: 10px;border-top-right-radius: 10px;">
                                    <i class="fa fa-search"></i>
                                </button>
                                <div id="searchResult" class="dropdown-content dWSearchResult">
                                    <!-- hiển thị kết quả tìm kiếm sản phẩm -->
                                    <p><span id="searchResult"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 cartbtn">
                            <a href="product_cart.php" class="cart">
                                <span class="header-cart-title">GIỎ HÀNG<i class="fa-solid fa-bag-shopping mx-3"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Modal-Login -->
    <form action="" method="POST" id="submitLogin">
        <div class="modal fade text-center" id="login" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header mx-auto">
                        <h5 class="modal-title" id="staticBackdropLabel">Đăng Nhập</h5>
                        <button type="button" class="btn-close btn-close-login" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form">
                            <div>
                                <label class="form-label float-start">
                                    <h5>Tên đăng nhập</h5>
                                </label>
                                <input type="text" placeholder="Email hoặc tên đăng nhập" id="username" name="userName" class="input w-100 form-control">
                                <p id="validationUserName" style="color: red;display:block"></p>
                            </div>
                            <div>
                                <label class="form-label float-start">
                                    <h5>Mật khẩu</h5>
                                </label>
                                <input type="password" placeholder="Mật khẩu" id="passwordLogin" name="passWord" class="input w-100 form-control ">
                                <span onclick="show_hidden_password_login()" class="changePasword"><i id="icon" class="fas fa-eye"></i></span>
                                <p id="validationPassWord" style="color: red;display:block"></p>
                            </div>
                            <div class="forgetPass">
                                <a href="#" data-bs-target="#myModal_Forgotten_password" data-bs-toggle="modal" data-bs-dismiss="modal">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button href="#" class="btn btn-primary btn-block mt-3 w-100">Đăng Nhập</button>
                        <p>Chưa có tài khoản? <a href="#" style="text-decoration: none;" data-bs-target="#signup" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng Ký Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal-SignUp -->

    <div class="modal fade" id="signup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header mx-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">Đăng Ký</h5>
                    <button type="button" class="btn-close btn-close-signup" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">
                                    <h5>Họ và Tên</h5>
                                </label>
                                <input class="w-100 form-control" type="text" placeholder="Họ và tên">
                            </div>
                            <div class="col-6">
                                <label class="form-label">
                                    <h5>Email</h5>
                                </label>
                                <input class="w-100 form-control" type="text" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" style="padding-top: 10px;">
                                    <h5>Số di động</h5>
                                </label>
                                <input class="w-100 form-control" type="text" placeholder="Số di động">
                            </div>
                            <div class="col-6">
                                <label class="form-label" style="padding-top: 10px;">
                                    <h5>Tên đăng nhập</h5>
                                </label>
                                <input class="w-100 form-control" type="text" placeholder="Tên đăng nhập">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" style="padding-top: 10px;">
                                    <h5>Mật khẩu</h5>
                                </label>
                                <input class="w-100 form-control" type="password" id="pass_signup" placeholder="Mật khẩu">
                                <span onclick="show_hidden_password()" class="changePasword_Singup"><i id="icon" class="fas fa-eye"></i></span>
                            </div>
                            <div class="col-6">
                                <label class="form-label" style="padding-top: 10px;">
                                    <h5>Nhập lại mật khẩu</h5>
                                </label>
                                <input class="w-100 form-control" type="password" id="re_pass_signup" placeholder="Nhập lại mật khẩu">
                                <span onclick="confirm_show_hidden_password()" class="changePasword_Singup"><i id="icon" class="fas fa-eye"></i></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button href="#" class="btn btn-primary btn-block mt-3 w-100">Đăng Ký</button>
                    <p>Đã có tài khoản? <a href="#" style="text-decoration: none;" data-bs-target="#login" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng Nhập Ngay</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-Forgotten-password -->

    <div class="modal fade" id="myModal_Forgotten_password" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header mx-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">Khôi phục mật khẩu</h5>
                    <button type="button" class="btn-close btn-close-forget" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form">
                        <div>
                            <label class="form-label">
                                <h5>Tên đăng nhập</h5>
                            </label>
                            <input class="w-100 form-control" type="text" placeholder="Tên đăng nhập">
                        </div>
                        <div>
                            <label class="form-label" style="padding-top: 10px;">
                                <h5>Số di động hoặc Email</h5>
                            </label>
                            <input class="w-100 form-control" type="text" placeholder="Số di động hoặc Email">
                        </div>
                        <div>
                            Liên hệ Page Shop <a href="https://www.facebook.com/NguyenQuocChau.NhaTrang" style="text-decoration: none;">Tại đây</a>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Đã có tài khoản? <a href="#" style="text-decoration: none;" data-bs-target="#login" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng Nhập Ngay</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>