<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
    href="./thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="./thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
  <link rel="stylesheet" href="./thuvienweb/fontawesome-free-6.1.2-web/css/all.min.css">
  <script src="./thuvienweb/fontawesome-free-6.1.2-web/js/all.min.js"></script>
  <script src="./thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/js/all.min.js"></script>

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <title>TC WATCH</title>
</head>

<body>
  <div class="header">
    <!-- <div class="header-menu sticky-top" id="header-menu">
      <div class="container">
        <div class="row">
          <div class="col-5 menu">
            <nav class="navbar navbar-expand-lg ">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        MEN
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Men</a></li>
                        <li><a class="dropdown-item" href="#">Women</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        WOMEN
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Men</a></li>
                        <li><a class="dropdown-item" href="#">Women</a></li>
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
    </div> -->
    
    <?php 
    // thêm file navbar menu
    include "navbar.php";
    ?>

  </div>
  <div class="bodyshop d-flex">
    <div class="sidebar">
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar sticky-top collapse bg-light">
        <div class="position-sticky">
          <div class="list-group list-group-flush mx-3 mt-4">
            <a
              href="#"
              class="list-group-item list-group-item-action py-2 ripple title"
              aria-current="true"
            >
              <span >DANH MỤC SẢN PHẨM </span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple ">
             <span>Aviator</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple active"
              ><span>Baby-G</span></a
            >
            <a href="#" class="list-group-item list-group-item-action py-2 ripple"
              ><span>Edifice</span></a
            >
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
              <span>G-Shock</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple"
              ><span>G-Steel</span></a
            >
            <a href="#" class="list-group-item list-group-item-action py-2 ripple"
              ><span>gravity-master</span></a
            >
            <a href="#" class="list-group-item list-group-item-action py-2 ripple"
              ><span>Mubmaster</span></a
            >
          </div>
        </div>
      </nav>
    </div>
    <div class="product-shop mt-5">
      <div class="container">
        <div class="row">
          <div class="col-3">
            <div class="item">
              <div class="sale">
                -28%
              </div>
              <div class="product">
                <div class="img">
                  <img alt="" src="./img/gwg-1000-1a3dr-01.png">
                </div>
                <div class="textleft">
                  <div class="name"><a href="http://">GWG-1000-1A3DR</a></div>
                  <div class="price d-flex">
                    <p class="price-pre">21.000.000đ</p>
                    <p>14.999.000đ</p>
                  </div>
                  <div><button type="button" class="btn btn-light">Thêm vào giỏ</button></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="item">
              <div class="sale">
                -28%
              </div>
              <div class="product">
                <div class="img">
                  <img alt="" src="./img/gwg-1000-1a3dr-01.png">
                </div>
                <div class="textleft">
                  <div class="name"><a href="http://">GWG-1000-1A3DR</a></div>
                  <div class="price d-flex">
                    <p class="price-pre">21.000.000đ</p>
                    <p>14.999.000đ</p>
                  </div>
                  <div><button type="button" class="btn btn-light">Thêm vào giỏ</button></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="item">
              <div class="sale">
                -28%
              </div>
              <div class="product">
                <div class="img">
                  <img alt="" src="./img/gwg-1000-1a3dr-01.png">
                </div>
                <div class="textleft">
                  <div class="name"><a href="http://">GWG-1000-1A3DR</a></div>
                  <div class="price d-flex">
                    <p class="price-pre">21.000.000đ</p>
                    <p>14.999.000đ</p>
                  </div>
                  <div><button type="button" class="btn btn-light">Thêm vào giỏ</button></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="item">
              <div class="sale">
                -28%
              </div>
              <div class="product">
                <div class="img">
                  <img alt="" src="./img/gwg-1000-1a3dr-01.png">
                </div>
                <div class="textleft">
                  <div class="name"><a href="http://">GWG-1000-1A3DR</a></div>
                  <div class="price d-flex">
                    <p class="price-pre">21.000.000đ</p>
                    <p>14.999.000đ</p>
                  </div>
                  <div><button type="button" class="btn btn-light">Thêm vào giỏ</button></div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="row mt-5">
          <div class="col-3">
            <div class="item">
              <div class="sale">
                -28%
              </div>
              <div class="product">
                <div class="img">
                  <img alt="" src="./img/gwg-1000-1a3dr-01.png">
                </div>
                <div class="textleft">
                  <div class="name"><a href="http://">GWG-1000-1A3DR</a></div>
                  <div class="price d-flex">
                    <p class="price-pre">21.000.000đ</p>
                    <p>14.999.000đ</p>
                  </div>
                  <div><button type="button" class="btn btn-light">Thêm vào giỏ</button></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="item">
              <div class="sale">
                -28%
              </div>
              <div class="product">
                <div class="img">
                  <img alt="" src="./img/gwg-1000-1a3dr-01.png">
                </div>
                <div class="textleft">
                  <div class="name"><a href="http://">GWG-1000-1A3DR</a></div>
                  <div class="price d-flex">
                    <p class="price-pre">21.000.000đ</p>
                    <p>14.999.000đ</p>
                  </div>
                  <div><button type="button" class="btn btn-light">Thêm vào giỏ</button></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="item">
              <div class="sale">
                -28%
              </div>
              <div class="product">
                <div class="img">
                  <img alt="" src="./img/gwg-1000-1a3dr-01.png">
                </div>
                <div class="textleft">
                  <div class="name"><a href="http://">GWG-1000-1A3DR</a></div>
                  <div class="price d-flex">
                    <p class="price-pre">21.000.000đ</p>
                    <p>14.999.000đ</p>
                  </div>
                  <div><button type="button" class="btn btn-light">Thêm vào giỏ</button></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="item">
              <div class="sale">
                -28%
              </div>
              <div class="product">
                <div class="img">
                  <img alt="" src="./img/gwg-1000-1a3dr-01.png">
                </div>
                <div class="textleft">
                  <div class="name"><a href="http://">GWG-1000-1A3DR</a></div>
                  <div class="price d-flex">
                    <p class="price-pre">21.000.000đ</p>
                    <p>14.999.000đ</p>
                  </div>
                  <div><button type="button" class="btn btn-light">Thêm vào giỏ</button></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="footer mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-12 mt-5">
          <img class="logo" src="./img/tcwlogo.png" alt="" srcset="">
          <table>
            <tr>
              <td><i class="fa-solid fa-location-dot"></i></td>
              <td>319 - C16 Lý Thường Kiệt, P.15,Q.11, Tp.HCM</td>
            </tr>
            <tr>
              <td><i class="fa-solid fa-phone"></i> </td>
              <td>076 912 0166 </td>
            </tr>
            <tr>
              <td><i class="fa-solid fa-envelope"></i></td>
              <td>demonhunterg@gmail.com</td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6 col-sm-6 mt-5">
          <h2>Đăng ký</h2>
          <p>Đăng ký để nhận được được thông tin mới nhất từ chúng tôi.</p>
          <input type="text" placeholder="Email ..."><i class="fa-solid fa-paper-plane" id="plane"></i>
          <h2>Kết nối với chúng tôi</h2>
          <div>
            <a href="#" class="iconfaw">
              <i class="fa-brands fa-facebook-f icons"></i>
            </a>
            <a href="#" class="iconfaw">
              <i class="fa-brands fa-instagram icons"></i>
            </a>
            <a href="#" class="iconfaw">
              <i class="fa-brands fa-twitter icons"></i>
            </a>
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-11">
          <i>Copyright ©2021 All rights reserved | This template is made with by #TeamTCWatch</i>
        </div>
        <div class=" col-1 back-top" style="display: block;">
          <a title="Go to top" href="#">
            <i class="fa fa-circle-chevron-up" id="back-top"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>