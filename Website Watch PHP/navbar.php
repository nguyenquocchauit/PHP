<?php
// kết nối cơ sở dữ liệu db_watch
require 'connectDB.php';
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
    </script>

</head>

<body>
    <div class="header sticky-top">
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
                            <p class="">
                                <i id="iconhouse" class="fa-sharp fa-solid fa-house"></i>
                                <strong>SHOP: </strong>2 Nguyễn Đình Chiểu, Nha Trang, Khánh Hòa
                            </p>
                        </div>
                    </div>
                    <div class="center col-2">

                    </div>
                    <div class="right col-4 ">
                        <p class="">
                            <i id="iconphone" class="fa-solid fa-phone-volume"></i>
                            <strong>HOTLINE: </strong>038 655 5555 |
                            <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#login">Login</button> &nbsp;
                            <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#signup">Signup</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
                            <a href="" class="cart">
                                <span class="header-cart-title">GIỎ HÀNG<i class="fa-solid fa-bag-shopping mx-3"></i></span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>