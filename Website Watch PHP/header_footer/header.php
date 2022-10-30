<?php


// include 'config/connectDB.php';
// lấy tên trang để active menu
$curPageName = $_SERVER["SCRIPT_NAME"];
$curPageName = explode("/", $curPageName);
$curPageName = $curPageName[(sizeof($curPageName) - 1)];
// $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
// //đăng xuất. kiểm tra khi ấn nút đăng xuất chứa logout = 1 thì xóa $_SESSION['CurrentUser']
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    unset($_SESSION['CurrentUser']);
}
// if đầu tiên kiểm tra $_SESSION['CurrentUser'] nếu không tồn tại thì role và id = null và ngược lại gán cho $Role và $ID dùng truy vấn
if ((isset($_SESSION['CurrentUser']['ID'])) && (isset($_SESSION['CurrentUser']['Role']))) {
    $Role = $_SESSION['CurrentUser']['Role'];
    $ID = $_SESSION['CurrentUser']['ID'];
} else {
    $Role = null;
    $ID = null;
}
// lấy tên người dùng hiện thông quan session[currentuser] chứa id và role(user or admin)
// kiểm tra session chứa role là admin hay user

if ($Role == "Admin")
    $queryCurrenUser = "SELECT CONCAT(administration.First_Name,' ',administration.Last_Name) AS currentUserName FROM administration WHERE ID_Administration='" . $ID . "'";
else
    $queryCurrenUser = "SELECT CONCAT(customers.First_Name,' ',customers.Last_Name) AS currentUserName FROM customers WHERE ID_Customer='" . $ID . "'";
// truy vấn tìm kiếm currentuser thông qua if in line 23
$resultCurrenUser = mysqli_query($conn, $queryCurrenUser);
// lấy dữ liệu các hãng đồng hồ có trong danh mục sản phẩm theo giới tính nam và nữ
$queryMen = "SELECT DISTINCT b.Name,b.ID_Brand FROM products a inner join brands b on a.ID_Brand = b.ID_Brand WHERE ID_Gender = 'IDM'";
$resultMen = mysqli_query($conn, $queryMen);
$queryWomen = "SELECT DISTINCT b.Name,b.ID_Brand FROM products a inner join brands b on a.ID_Brand = b.ID_Brand WHERE ID_Gender = 'IDWM'";
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
    <!-- thư viện sweet aler  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
    <script type="text/javascript">
        // css màu input nếu đăng nhập có xãy ra lỗi
        var boxShadowCSS = '0px 3px #1bcf4840';
        var borderCSS = '2px solid red';
        // tải lại trang sẽ hiển thị lại số lượng sản phẩm trong giỏ hàng lưu tại session[cart]
        window.onload = function() {
            /*
                Các đối tượng XMLHttpRequest (XHR) được sử dụng để tương tác với các máy chủ. 
                Bạn có thể truy xuất dữ liệu từ một URL mà không cần phải làm mới toàn bộ trang. 
                Điều này cho phép một trang Web chỉ cập nhật một phần của trang mà không làm gián đoạn những gì người dùng đang làm.
            */
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                /*
                    readyState ==1 : UNSENT
                    readyState ==2 : OPENED
                    readyState ==3 : LOADING
                    readyState ==4 : DONE
                */
                /*
                    UNSENT: 0
                    OPENED: 0
                    LOADING: 200
                    DONE: 200
                 */
                /* 
                    responseText trả về từ file được send
                */
                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("quantity-shopping-cart").innerHTML = this.responseText;
                }
            }
            // gọi file quantity_shopping_cart.php xử lý tổng sản phẩm trong giỏ hàng
            xmlhttp.open("GET", "../product and cart/quantity_shopping_cart.php");
            xmlhttp.send();
        };

        // sử dụng công nghệ AJAX

        // bắt sự kiện thay đổi ký tự trong input search. Xử lý đưa dữ liệu ra bên ngoài từ từ khóa tìm kiếm
        function search(str) {
            if (str.length != 0) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    /*
                        readyState ==1 : UNSENT
                        readyState ==2 : OPENED
                        readyState ==3 : LOADING
                        readyState ==4 : DONE
                    */
                    /*
                        UNSENT: 0
                        OPENED: 0
                        LOADING: 200
                        DONE: 200
                     */
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("searchResult").innerHTML = this.responseText;
                    }
                }
                // gọi file search.php và truyền tham số get search
                xmlhttp.open("GET", "../product and cart/search.php?search=" + str, true);
                xmlhttp.send();
                // hiển thị ô kết quả tìm kiếm khi bắt được sự kiện
                document.getElementById("searchResult").classList.toggle("showSearchResult");
            }
        };
        // sử dụng công nghệ AJAX
        $(document).ready(function() {

            // bắt sự kiện hiển thị dropdown lịch sử cart
            // bắt sự kiện phần tử có id show_history_cart show lịch cart
            var obj = document.getElementById('show_history_cart');
            obj.addEventListener('mouseover', function() {
                var x = document.getElementById("dropdown_cart");
                x.classList.add("show");
                // thiết lập thời gian show 2 giây
                setTimeout(function() {
                    x.classList.remove("show");
                }, 2000);
            });

            // tìm phần tử con của dropdown_cart là các thẻ li tồn tại
            var obj_hidden = document.getElementById('dropdown_cart').getElementsByClassName('dropdown_hidden')[0];
            obj_hidden.addEventListener('mouseout', function() {
                // di chuyển chuột ra ngoài li sẽ remove class show
                document.getElementById('dropdown_cart').classList.remove("show");
            });

            // Bắt sự kiện click thêm giỏ hàng thêm hiệu ứng animation tới icon giỏ hàng
            $('.add-to-cart').on('click', function() {
                var cart = $('.shopping-cart');
                var imgtodrag = $(this).parent('.product-item-desc-button-submit').parent('.product-item-desc').parent(".product-item").find(".product-item-img").find("img").eq(0);
                // tìm đúng các value của phần tử theo vị trí nút button được click 
                var _productID = $(this).parent('.product-item-desc-button-submit').find(".productID").val();
                var _productName = $(this).parent('.product-item-desc-button-submit').find(".productName").val();
                var _productImage = $(this).parent('.product-item-desc-button-submit').find(".productImage").val();
                var _productQuantity = $(this).parent('.product-item-desc-button-submit').find(".productQuantity").val();
                var _productPrice = $(this).parent('.product-item-desc-button-submit').find(".productPrice").val();

                if (imgtodrag) {
                    // tạo phần tử sao chép giống phần tử cha. Tức là copy ra 1 ảnh như vậy

                    var imgclone = imgtodrag.clone()
                        .offset({
                            //offset lấy vị trí top & left của img gốc
                            top: imgtodrag.offset().top,
                            left: imgtodrag.offset().left
                        })
                        .css({
                            // thiết lập css
                            'opacity': '0.5',
                            'position': 'absolute',
                            'height': '250px',
                            'width': '200px',
                            'z-index': '100'
                        })
                        .appendTo($('body') /* thêm vào body hiển thị ra giao diện*/ )
                        .animate({
                            // animation cho img tới giỏ hàng
                            top: cart.offset().top + 10,
                            left: cart.offset().left + 10,
                            width: 75,
                            height: 75,
                            position: "absolute",
                        }, 1000);
                    imgclone.animate({
                        'width': 0,
                        'height': 0

                    }, function() {

                        console.log(_productID, _productName, _productImage, _productQuantity, _productPrice);
                        $.ajax({
                            type: 'POST',
                            url: '../product and cart/product_cart.php',
                            data: {
                                action: "additems",
                                productID: _productID,
                                productName: _productName,
                                productImage: _productImage,
                                productQuantity: _productQuantity,
                                productPrice: _productPrice,
                            },
                            success: function(data) {

                                var xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                    /*
                                        readyState ==1 : UNSENT
                                        readyState ==2 : OPENED
                                        readyState ==3 : LOADING
                                        readyState ==4 : DONE
                                    */
                                    /*
                                        UNSENT: 0
                                        OPENED: 0
                                        LOADING: 200
                                        DONE: 200
                                     */
                                    /* 
                                        responseText trả về từ file được send
                                    */
                                    if (this.readyState == 4 && this.status == 200) {

                                        document.getElementById("quantity-shopping-cart").innerHTML = this.responseText;
                                    }
                                }
                                // gọi file quantity_shopping_cart.php xử lý tổng sản phẩm trong giỏ hàng
                                xmlhttp.open("GET", "../product and cart/quantity_shopping_cart.php");
                                xmlhttp.send();

                            }
                        });
                        Swal.fire({
                            position: 'top-end',
                            //icon: 'success',
                            imageUrl: '../img/image_products_home/' + _productImage,
                            imageWidth: 70,
                            imageHeight: 90,
                            title: 'Đã thêm sản phẩm ' + _productName.toLowerCase() + ' vào giỏ hàng!',
                            showConfirmButton: false,
                            timer: 1300
                        });
                        $(this).detach()
                    });
                }
            });
            // bắt sự kiện đăng nhập (username và password) xử lý tại file login.php 
            // loại khoảng trắng của ô input tên dăng nhập
            $('#usernameLogin').on('keypress', function(e) {
                if (e.which == 32) {
                    return false;
                }
            });
            // bắt sự kiện đăng nhập
            $("#submitLogin").submit(function() {
                var usernameLogin = document.getElementById("usernameLogin");
                var passwordLogin = document.getElementById("passwordLogin");
                var _username = $("#usernameLogin").val();
                var _password = $("#passwordLogin").val();
                console.log(_username, _password);
                if (_username == "" || _username.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Tài khoản không được để trống!',
                        timer: 1500,
                        timerProgressBar: true,
                    })


                    usernameLogin.style.border = borderCSS;
                    usernameLogin.style.boxShadow = boxShadowCSS;
                    passwordLogin.style.border = null;
                    passwordLogin.style.boxShadow = null;
                } else if (_password == "" || _password.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Mật khẩu không được để trống!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                    passwordLogin.style.border = borderCSS;
                    passwordLogin.style.boxShadow = boxShadowCSS;
                    usernameLogin.style.border = null;
                    usernameLogin.style.boxShadow = null;
                } else {
                    usernameLogin.style.border = null;
                    usernameLogin.style.boxShadow = null;
                    passwordLogin.style.border = null;
                    passwordLogin.style.boxShadow = null;
                    $.ajax({
                        type: "POST",
                        url: "../access/login.php",
                        data: {
                            username: _username,
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
                                // dùng console.log xem biến in ra ở trên trình duyệt ở mục console . debug cho dễ
                                console.log(data);
                                if (data['message'] == 0) {
                                    // sử dụng thư viện sweetaler thông báo cho đẹp :v
                                    let timerInterval
                                    Swal.fire({
                                        title: 'Đăng nhập thành công!',
                                        html: 'Đang đăng nhập vào Website <strong></strong> giây.',
                                        //icon: "success",
                                        imageUrl: '../img/cat.gif',
                                        imageWidth: 315,
                                        imageHeight: 230,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading()
                                            // thiết lập thời gian theo giây, ban đầu là millisecond
                                            timerInterval = setInterval(() => {
                                                Swal.getHtmlContainer().querySelector('strong')
                                                    .textContent = (Swal.getTimerLeft() / 1000)
                                                    .toFixed(0)
                                            }, 100)
                                        },
                                        willClose: () => {
                                            clearInterval(timerInterval)
                                        }
                                    }).then((result) => {
                                        // hoàn thành xong chuyển tới trang home
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            var file = data['success'];
                                            window.location.href = "../" + file;

                                        }
                                    })

                                } else if (data['message'] == 1) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Thông báo!',
                                        text: 'Tài khoản không tồn tại!',
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                    usernameLogin.style.border = borderCSS;
                                    usernameLogin.style.boxShadow = boxShadowCSS;
                                    passwordLogin.style.border = null;
                                    passwordLogin.style.boxShadow = null;
                                } else if (data['message'] == -1) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Thông báo!',
                                        text: 'Mật khẩu sai!',
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                    passwordLogin.style.border = borderCSS;
                                    passwordLogin.style.boxShadow = boxShadowCSS;
                                    usernameLogin.style.border = null;
                                    usernameLogin.style.boxShadow = null;
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
            // loại khoảng trắng của ô input tên dăng nhập
            $('#username').on('keypress', function(e) {
                if (e.which == 32) {
                    return false;
                }
            });
            const validateEmail = (email) => {
                return email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
            };

            /////////////////////////////signup
            $("#submitsignup").submit(function() {
                var checkEmail = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";
                var _create_at = $("#create_at").val();
                var _name = $("#name").val();
                var _email = $("#email").val();
                _email = _email.toLowerCase();
                var _phone = $("#phone").val();
                var _username = $("#username").val();
                var _pass = $("#pass").val();
                var _checkpass = $("#checkpass").val();
                if (_name == "" || _name.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Họ tên không được để trống!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                } else if (_email == "" || _email.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Email không được để trống!',
                        timer: 1500,
                        timerProgressBar: true,
                    })

                } else if (_phone == "" || _phone.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Số điện thoại không được để trống!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                } else if (_username == "" || _username.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Tên đăng nhập không được để trống!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                } else if (_pass == "" || _pass.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Mật khẩu không được để trống!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                } else if (_checkpass == "" || _checkpass.length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Xác nhận mật khẩu không được để trống!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                } else if (_checkpass != _pass) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Xác nhận mật khẩu sai, vui lòng kiểm tra lại!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                } else if (validateEmail(_email) == null) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Không đúng định dạng Email',
                        html: 'Ví dụ: tcwatch@gmail.com',
                        timer: 2000,
                        timerProgressBar: true,
                    })
                } else if (_pass.length < 6) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Mật khẩu tối thiểu 6 kí tự',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                } else if (_phone.length < 10 || _phone.length >10) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Số điện thoại phải là 10 số',
                        html: 'Ví dụ: 0123456789',
                        timer: 2000,
                        timerProgressBar: true,
                    })
                } else {
                    $.ajax({
                        type: "POST",
                        url: "../access/signup.php",
                        data: {
                            create_at: _create_at,
                            name: _name,
                            email: _email,
                            phone: _phone,
                            username: _username,
                            pass: _pass,
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
                                console.log(data);
                                if (data['message'] == 0) {
                                    // sử dụng thư viện sweetaler thông báo cho đẹp :v
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Đăng ký thành công!',
                                        timer: 1000,
                                        timerProgressBar: true,
                                    }).then((result) => {
                                        // hoàn thành xong chuyển tới trang home
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            $.ajax({
                                                type: "POST",
                                                url: "../access/login.php",
                                                data: {
                                                    username: _username,
                                                    password: _pass
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
                                                        // dùng console.log xem biến in ra ở trên trình duyệt ở mục console . debug cho dễ
                                                        console.log(data);
                                                        if (data['message'] == 0) {
                                                            // sử dụng thư viện sweetaler thông báo cho đẹp :v
                                                            let timerInterval
                                                            Swal.fire({
                                                                title: 'Đăng nhập thành công!',
                                                                html: 'Đang đăng nhập vào Website <strong></strong> giây.',
                                                                //icon: "success",
                                                                imageUrl: '../img/cat.gif',
                                                                imageWidth: 315,
                                                                imageHeight: 230,
                                                                timer: 3000,
                                                                timerProgressBar: true,
                                                                didOpen: () => {
                                                                    Swal.showLoading()
                                                                    // thiết lập thời gian theo giây, ban đầu là millisecond
                                                                    timerInterval = setInterval(() => {
                                                                        Swal.getHtmlContainer().querySelector('strong')
                                                                            .textContent = (Swal.getTimerLeft() / 1000)
                                                                            .toFixed(0)
                                                                    }, 100)
                                                                },
                                                                willClose: () => {
                                                                    clearInterval(timerInterval)
                                                                }
                                                            }).then((result) => {
                                                                // hoàn thành xong chuyển tới trang home
                                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                                    var file = data['success'];
                                                                    window.location.href = "../" + file;
                                                                }
                                                            })
                                                        }
                                                    }
                                                },
                                                error: function(request, status, error) {
                                                    alert(status);
                                                }
                                            });
                                        }
                                    })
                                } else if (data['email'] == 2) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Thông báo!',
                                        text: 'Email đã tồn tại!',
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                } else if (data['username'] == 1) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Thông báo!',
                                        text: 'Tên đăng nhập đã tồn tại!',
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
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
        });
        // ẩn hiện mật khẩu
        var check_login = true;
        var check_signup = true;
        var confirm_check_signup = true;

        function show_hidden_password_login() {
            console.log(check_login);
            if (check_login) {
                document.getElementById("passwordLogin").setAttribute("type", "text");
                document.getElementById("icon").setAttribute("class", "fas fa-times");
                check_login = false;
            } else {
                document.getElementById("passwordLogin").setAttribute("type", "password");
                document.getElementById("icon").setAttribute("class", "fas fa-eye");
                check_login = true;
            }
        }
        function confirm_show_hidden_password() {
            console.log(confirm_check_signup);
            if (confirm_check_signup) {
                document.getElementById("confirm_password_signup").setAttribute("type", "text");
                document.getElementById("icon").setAttribute("class", "fas fa-times");
                confirm_check_signup = false;
            } else {
                document.getElementById("confirm_password_signup").setAttribute("type", "password");
                document.getElementById("icon").setAttribute("class", "fas fa-eye");
                confirm_check_signup = true;
            }
        }
        function show_hidden_password() {
            console.log(check_signup);
            if (check_signup) {
                document.getElementById("password_signup").setAttribute("type", "text");
                document.getElementById("icon").setAttribute("class", "fas fa-times");
                check_signup = false;
            } else {
                document.getElementById("password_signup").setAttribute("type", "password");
                document.getElementById("icon").setAttribute("class", "fas fa-eye");
                check_signup = true;
            }
        }
        
    </script>

</head>

<body>
    <div class="header sticky-top" id="header">
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
                                <a href="../home.php">
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
                                    <button type="button" name="logout" class="btn btn-dark"><a href="<?php echo $curPageName ?>?logout=1" style="color:#f1f1f1"><i class="fa-solid fa-right-from-bracket"></i></a></button>
                                    <!-- <i class="fa-solid fa-right-from-bracket" onclick="logout()"></i> -->
                                <?php else : ?>
                                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#login">Đăng nhập</button> &nbsp;
                                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#signup">Đăng ký</button>
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
                                            <a class="nav-link  <?php if ($curPageName == "home.php") echo "active";
                                                                else echo "" ?>" aria-current="page" href="../home.php">TRANG CHỦ</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link <?php if ($curPageName == "news.php") echo "active";
                                                                else echo "" ?>" href="#">TIN TỨC</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle <?php if (isset($_GET['gender']) && $_GET['gender'] == "IDM") echo "active";
                                                                                else echo "" ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                MEN
                                            </a>
                                            <ul class="dropdown-menu">
                                                <!-- duyệt các hãng thuộc giới tính nam, thẻ a có đường dẫn tới file shop chứa brand, giới tính tương tứng -->
                                                <?php while ($rowMen = mysqli_fetch_array($resultMen)) : ?>
                                                    <li><a class="dropdown-item" href="<?php if ($curPageName == "home.php" or $curPageName == "contact.php") echo "../product and cart/" ?>shop.php?gender=IDM&brand=<?php echo $rowMen['ID_Brand'] ?>"><?php echo $rowMen['Name'] ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle  <?php if (isset($_GET['gender']) && $_GET['gender'] == "IDWM") echo "active";
                                                                                else echo "" ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                WOMEN
                                            </a>
                                            <ul class="dropdown-menu">
                                                <!-- duyệt các hãng thuộc giới tính nữ, thẻ a có đường dẫn tới file shop chứa brand, giới tính tương tứng -->
                                                <?php while ($rowWomen = mysqli_fetch_array($resultWomen)) : ?>
                                                    <li><a class="dropdown-item" href="<?php if ($curPageName == "home.php" or $curPageName == "contact.php") echo "../product and cart/" ?>shop.php?gender=IDWM&brand=<?php echo $rowWomen['ID_Brand'] ?>"><?php echo $rowWomen['Name'] ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($curPageName == "contact.php") echo "active";
                                                                else echo "" ?>" href="../contact/contact.php">LIÊN HỆ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="logo col-2">
                        <img id="logo" src="<?php if ($curPageName != "home.php") echo "." ?>./img/tcwlogo.png" alt="" srcset="">
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
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a href="../product and cart/product_cart.php" id="show_history_cart" class="nav-link <?php if ($curPageName == "product_cart.php") echo "active";
                                                                                                                            else echo "" ?>">
                                        <span class="header-cart-title">GIỎ HÀNG
                                            <i style="color: black;" class="fa-solid fa-cart-shopping mx-2 shopping-cart"></i>
                                            <span style="position: absolute;top: 0%;color:#b31212;">
                                                <p id="quantity-shopping-cart"></p>
                                            </span>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu " id="dropdown_cart" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 42px);">
                                        <li class="dropdown_hidden"><a class="dropdown-item " href="../product and cart/history_cart.php">Lịch sử đặt hàng</a></li>
                                    </ul>
                                </li>
                            </ul>
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
                                <input type="text" placeholder="Email hoặc tên đăng nhập" id="usernameLogin" name="userName" class="input w-100 form-control">
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
    <form action="" method="POST" id="submitsignup">
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
                                    <input id="create_at" type="hidden" value="<?php // lấy thời gian hệ thống
                                                                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                                                                $timeNow = date("Y-m-d H:i:s");
                                                                                echo $timeNow; ?>">
                                    <input class="w-100 form-control" type="text" placeholder="Họ và tên" name="name" id="name" pattern="[A-Za-z]{}">
                                    <p id="validationName" style="color: red;display:block"></p>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">
                                        <h5>Email</h5>
                                    </label>
                                    <input class="w-100 form-control" type="text" placeholder="Email" name="email" id="email">
                                    <p id="validationEmail" style="color: red;display:block"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" style="padding-top: 10px;">
                                        <h5>Số di động</h5>
                                    </label>
                                    <input class="w-100 form-control" type="text" placeholder="Số di động" name="phone" id="phone">
                                    <p id="validationPhone" style="color: red;display:block"></p>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" style="padding-top: 10px;">
                                        <h5>Tên đăng nhập</h5>
                                    </label>
                                    <input class="w-100 form-control" type="text" placeholder="Tên đăng nhập" name="username" id="username">
                                    <p id="validationUserName" style="color: red;display:block"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" style="padding-top: 10px;">
                                        <h5>Mật khẩu</h5>
                                    </label>
                                    <input class="w-100 form-control" type="password" id="password_signup" placeholder="Mật khẩu" name="pass" id="pass">
                                    <span onclick="show_hidden_password()" class="changePasword_Singup"><i id="icon" class="fas fa-eye"></i></span>
                                    <p id="validationPass" style="color: red;display:block"></p>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" style="padding-top: 10px;">
                                        <h5>Nhập lại mật khẩu</h5>
                                    </label>
                                    <input class="w-100 form-control" type="password" id="confirm_password_signup" placeholder="Nhập lại mật khẩu" name="checkpass" id="checkpass">
                                    <span onclick="confirm_show_hidden_password()" class="changePasword_Singup"><i id="icon" class="fas fa-eye"></i></span>
                                    <p id="validationCheckPass" style="color: red;display:none"></p>
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
    </form>

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