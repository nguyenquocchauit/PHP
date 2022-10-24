<?php
session_start();
// kết nối cơ sở dữ liệu db_watch
require 'connectDB.php';
// lấy toàn bộ sản phẩm
$queryAll = "SELECT products.ID_Product,brands.Name as 'Brand_Name' ,gender.Name as 'Gender_Name', products.Name, products.Image, products.Quantity, products.Price, products.Discount 
FROM products inner join brands on products.ID_Brand = brands.ID_Brand inner JOIN gender on products.ID_Gender= gender.ID_Gender";
$resultAll = mysqli_query($conn, $queryAll);
// lấy sản phẩm được giảm (discount>0)
$queryDiscount = "SELECT products.ID_Product, brands.Name as 'Brand_Name' ,gender.Name as 'Gender_Name', products.Name, products.Image, products.Price, products.Discount 
FROM products inner join brands on products.ID_Brand = brands.ID_Brand inner JOIN gender on products.ID_Gender= gender.ID_Gender WHERE products.Discount >0 ";
$resultDiscount = mysqli_query($conn, $queryDiscount);
// lấy sản phẩm được bán chạy nhất. Mặc định hiện tại 2 sản phẩm
$queryBestSeller = "SELECT a.Name,a.Image,a.Price,a.Discount,b.number_of_oders,c.Name as 'Brand_Name' ,d.Name as 'Gender_Name' FROM products a inner join 
(SELECT a.ID_Product, sum(a.Quantity) as 'number_of_oders' FROM order_details a inner join products b on a.ID_Product=b.ID_Product GROUP BY a.ID_Product) b 
on a.ID_Product = b.ID_Product inner join brands c on a.ID_Brand = c.ID_Brand inner join gender d on a.ID_Gender=d.ID_Gender GROUP BY b.number_of_oders DESC LIMIT 2";
$resultBestSeller = mysqli_query($conn, $queryBestSeller);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="./thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
  <link rel="stylesheet" href="./thuvienweb/fontawesome-free-6.1.2-web/css/all.min.css">
  <script src="./thuvienweb/fontawesome-free-6.1.2-web/js/all.min.js"></script>
  <script src="./thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/js/all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title>TC WATCH</title>

</head>

<body>
  <?php
  // thêm file navbar menu
  include "navbar.php";
  ?>

  <div class="header-slide">

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active btnslide" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="btnslide" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/banner-01.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./img/banner-02.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>

  <div class="body">
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-4 content-item d-flex">
            <img class="imgitem" src="./img/24-hours-phone-service-300x300.png" alt="">
            <h3>Phục vụ 24/7</h3>
          </div>
          <div class="col-4 content-item  d-flex ">
            <img class="imgitem" src="./img/logistics-delivery-truck-in-movement-300x300.png" alt="">
            <h3>Giao hàng tận nơi</h3>
          </div>
          <div class="col-4 content-item  d-flex">
            <img class="imgitem" src="./img/gift-300x300.png" alt="">
            <h3>Miễn phí vận chuyển</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="productlist">
      <div class="product mt-5">
        <h2 class="tc-title ">Danh mục sản phẩm</h2>
        <div class="thanh">
          <div class="ngang" id="ngang1"></div>
          <div class="clock"><i class="fa-regular fa-clock"></i></div>
          <div class="ngang" id="ngang2"></div>
        </div>
        <div class="container mt-5">
          <div id="wapper">
            <div class=" filtering">
              <!-- duyệt danh sách  tất cả sản phẩm: ảnh, tên, số lượng có sẵn -->
              <?php while ($rowAll = mysqli_fetch_array($resultAll)) : ?>
                <div class="item">
                  <div class="wap-items-ss brbox">
                    <div class="wap-ss-img">
                      <!-- Image lưu trữ nhiều ảnh, tách dữ liệu lấy ảnh đầu tiên. Các ảnh được ngăn cách bởi dấu , -->
                      <img alt="" src="./img/image_products_home/<?php $img1 = explode(",", $rowAll['Image']);
                                                                  echo $img1[0] ?>">
                    </div>
                    <div class="textleft">
                      <div><a href="shop.php?gender=<?php echo $rowAll['Gender_Name'] ?>&brand=<?php echo $rowAll['Brand_Name'] ?>"><?php echo $rowAll['Name'] ?></div></a>
                      <div><b><?php echo $rowAll['Quantity'] ?> sản phẩm</b></div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>

            </div>
          </div>
        </div>
      </div>
      <div class="product-sale mt-5">
        <h2 class="tc-title">Sản phẩm giảm giá</h2>
        <div class="thanh">
          <div class="ngang" id="ngang1"></div>
          <div class="clock"><i class="fa-regular fa-clock"></i></div>
          <div class="ngang" id="ngang2"></div>
        </div>
        <div class="container mt-5">
          <div id="wapper">
            <div class=" filtering">
              <!-- duyệt danh sách  tất cả sản phẩm: giá được giảm, ảnh, tên, số lượng có sẵn -->
              <?php while ($rowDiscount = mysqli_fetch_array($resultDiscount)) : ?>
                <div class="item">
                  <div class="sale">
                    <!-- đổi số thập phân sang dạng phần trăm -->
                    <?php $discount = $rowDiscount['Discount'];
                    $percent = round((float)$discount * 100) . '%';
                    echo "-" . $percent;
                    ?>
                  </div>
                  <div class="wap-items-ss brbox ">
                    <div class="wap-ss-img itemimg">
                      <!-- Image lưu trữ nhiều ảnh, tách dữ liệu lấy ảnh đầu tiên. Các ảnh được ngăn cách bởi dấu , -->
                      <img alt="" src="./img/image_products_home/<?php $img1 = explode(",", $rowDiscount['Image']);
                                                                  echo $img1[0] ?>">
                    </div>
                    <div class="textleft">
                      <div><a href="shop.php?gender=<?php echo $rowDiscount['Gender_Name'] ?>&brand=<?php echo $rowDiscount['Brand_Name'] ?>"><?php echo $rowDiscount['Name'] ?></a></div>
                      <div class="price d-flex">
                        <!-- number_format dùng định dạng số theo kiểu đơn vị tiền tệ -->
                        <p class="price-pre"><?php echo number_format($rowDiscount['Price']) ?></p>
                        <p>
                          <!-- xử lý in giá bán sau khi áp dụng giảm giá -->
                          <?php
                          $price = $rowDiscount['Price'];
                          $price = $price - ($price * $discount);
                          echo number_format($price) . " VNĐ";
                          ?>
                        </p>
                      </div>
                      <div><button type="submit" class="btn btn-light add-to-cart">Thêm vào giỏ</button></div>
                      <input type="hidden" name="productID"></input>
                      <input type="hidden" name="productQuantity"></input>
                      <input type="hidden" name="productName"></input>
                      <input type="hidden" name="productPrice"></input>
                      <input type="hidden" name="productImage"></input>
                      <input type="hidden" name="productGender"></input>
                      <input type="hidden" name="productBrand"></input>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="product-hot mt-5">
        <h2 class="tc-title">Sản phẩm nổi bật</h2>
        <div class="thanh">
          <div class="ngang" id="ngang1"></div>
          <div class="clock"><i class="fa-regular fa-clock"></i></div>
          <div class="ngang" id="ngang2"></div>
        </div>
        <div class="container mt-5">
          <div id="wapper">
            <div class=" filtering">
              <!-- duyệt danh sách  tất cả sản phẩm theo danh sách sp bán chạy nhất top 2: giá được giảm, ảnh, tên, số lượng có sẵn -->
              <?php while ($rowBestSeller = mysqli_fetch_array($resultBestSeller)) : ?>
                <div class="item">
                  <div class="sale">
                    <!-- đổi số thập phân sang dạng phần trăm -->
                    <?php $discount = $rowBestSeller['Discount'];
                    $percent = round((float)$discount * 100) . '%';
                    echo "-" . $percent;
                    ?>
                  </div>
                  <div class="wap-items-ss brbox">
                    <div class="wap-ss-img">
                      <!-- Image lưu trữ nhiều ảnh, tách dữ liệu lấy ảnh đầu tiên. Các ảnh được ngăn cách bởi dấu , -->
                      <img alt="" src="./img/image_products_home/<?php $img1 = explode(",", $rowBestSeller['Image']);
                                                                  echo $img1[0] ?>">
                    </div>
                    <div class="textleft">
                      <div><a href="shop.php?gender=<?php echo $rowBestSeller['Gender_Name'] ?>&brand=<?php echo $rowBestSeller['Brand_Name'] ?>"><?php echo $rowBestSeller['Name'] ?></a></div>
                      <div class="price d-flex">
                        <!-- number_format dùng định dạng số theo kiểu đơn vị tiền tệ -->
                        <p class="price-pre"><?php echo number_format($rowBestSeller['Price']) ?></p>
                        <p>
                          <!-- xử lý in giá bán sau khi áp dụng giảm giá -->
                          <?php
                          $price = $rowBestSeller['Price'];
                          $price = $price - ($price * $discount);
                          echo number_format($price) . " VNĐ";
                          ?>
                        </p>
                      </div>
                      <div><button type="button" class="btn btn-light add-to-cart">Thêm vào giỏ</button></div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="feedback mt-5">
        <h2 class="tc-title">Feed back từ khách hàng</h2>
        <div class="thanh">
          <div class="ngang" id="ngang1"></div>
          <div class="clock"><i class="fa-regular fa-clock"></i></div>
          <div class="ngang" id="ngang2"></div>
        </div>
        <div class="blog-area">
          <div class="container">
            <div class="row">
              <div class="col-4">
                <img src="./img/gg-1000-1a8dr-01.png" alt="" class="imgfeedback">
                <div class="row mt-4">
                  <div class="col-1">
                    <img src="./img/feedbacknqc.png" alt="">
                  </div>
                  <div class="col-4">
                    <p>Quốc Châu</p>
                  </div>
                  <div class="col-7 d-flex">
                    <p>27 tháng 8</p>
                    <p><i class="fa-regular fa-heart"></i>15</p>
                    <p><i class="fa-regular fa-comment"></i>4</p>
                  </div>
                  <hr>
                  <h5>STOCKING YOUR RESTAURANT KITCHEN FINDING RELIABLE SELLERS</h5>
                  <p>Saving money – is something we would all like to do.
                    Whether you are struggling to manage day to day or earning a six figure salary,
                    saving is something we all think about.</p>
                </div>
              </div>
              <div class="col-4">
                <img src="./img/ga-1100-2bdr-01.png" alt="" class="imgfeedback">
                <div class="row mt-4">
                  <div class="col-1">
                    <img src="./img/xuser.webp" alt="">
                  </div>
                  <div class="col-4">
                    <p>Mark Wiens</p>
                  </div>
                  <div class="col-7 d-flex">
                    <p>13th Dec</p>
                    <p><i class="fa-regular fa-heart"></i>15</p>
                    <p><i class="fa-regular fa-comment"></i>4</p>
                  </div>
                  <hr>
                  <h5>COOKING FOR SPECIAL OCCASIONS COOKWARE IN THE BRICK AND MORTR</h5>
                  <p>Let’s talk about meat fondue recipes and what you need to know first.
                    Meat fondue also known as oil fondue is a method of cooking all kinds of meats,
                    poultry, and seafood in a pot of heated oil.</p>
                </div>
              </div>
              <div class="col-4">
                <img src="./img/gst-b100d-1a9dr-01.png" alt="" class="imgfeedback">
                <div class="row mt-4">
                  <div class="col-1">
                    <img src="./img/xuser.webp" alt="">
                  </div>
                  <div class="col-4">
                    <p>Mark Wiens</p>
                  </div>
                  <div class="col-7 d-flex">
                    <p>13th Dec</p>
                    <p><i class="fa-regular fa-heart"></i>15</p>
                    <p><i class="fa-regular fa-comment"></i>4</p>
                  </div>
                  <hr>
                  <h5>WHEN YOUR MEAL BITES BACK TIPS FOR AVOIDING FOOD POISONING</h5>
                  <p>While some people really seem to have a knack for barbequing
                    – always grilling up a perfect meal – for the rest of us, it is something that must be learned,
                    not something that just comes naturally.
                    Believe it or not, there is technique involved.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  // thêm file footer
  include "footer.php";
  ?>


  <script type="text/javascript" src="frontend/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="./style.js"></script>
</body>

</html>