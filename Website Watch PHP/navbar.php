<?php
// kết nối cơ sở dữ liệu db_watch
require 'connectDB.php';
// lấy dữ liệu các hãng đồng hồ có trong danh mục sản phẩm theo giới tính nam và nữ
$queryMen = "SELECT DISTINCT b.Name,b.Slug FROM products a inner join brands b on a.ID_Brand = b.ID_Brand WHERE ID_Gender = 'IDM'";
$resultMen = mysqli_query($conn, $queryMen);
$queryWomen = "SELECT DISTINCT b.Name,b.Slug FROM products a inner join brands b on a.ID_Brand = b.ID_Brand WHERE ID_Gender = 'IDWM'";
$resultWomen = mysqli_query($conn, $queryWomen);
?>
<div class="header-menu sticky-top" id="header-menu">
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
                                            <li><a class="dropdown-item" href="shop.php?gender=men&brand=<?php echo $rowMen[1] ?>"><?php echo $rowMen[0] ?></a></li>
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
                                            <li><a class="dropdown-item" href="shop.php?gender=women&brand=<?php echo $rowWomen[1] ?>"><?php echo $rowWomen[0] ?></a></li>
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
                            <input type="search" id="form1" class="form-control" placeholder="Tìm kiếm ..." />
                        </div>
                        <button type="button" class="btn">
                            <i class="fas fa-search"></i>
                        </button>
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