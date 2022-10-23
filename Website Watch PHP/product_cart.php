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
    <title>TC WATCH</title>
</head>

<body>
    <?php
    // thêm file navbar menu
    include "navbar.php";
    ?>
    <div class="body-cart mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9 cart">
                    <table>
                        <tr class="tr1">
                            <td>
                                <p>Sản phẩm</p>
                            </td>
                            <td>
                                <p>Tên sản phẩm</p>
                            </td>
                            <td>
                                <p>Giá</p>
                            </td>
                            <td>
                                <p>Số lượng</p>
                            </td>
                            <td>
                                <p>Tổng</p>
                            </td>
                            <td>
                                <p>Xóa</p>
                            </td>
                        </tr>
                        <tbody>
                            <tr>
                                <td style="width: 15%;">
                                    <div class="divimg"><img src="./img/image_products_home/olym-pianus-899833g1b-1.png" alt="" srcset=""></div>
                                </td>
                                <td style="width: 26%;"><span>BaBy-G</span></td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <button class="btnquantity" onclick="tru()">-</button>
                                        <input type="number" class="inpquantity" name="" id="" value="10">
                                        <button class="btnquantity" onclick="cong()">+</button>
                                    </div>
                                </td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td><i class="fa-regular fa-circle-xmark"></i></td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">
                                    <div class="divimg"><img src="./img/image_products_home/olym-pianus-899833g1b-1.png" alt="" srcset=""></div>
                                </td>
                                <td style="width: 26%;"><span>nguyễn quốc châu</span></td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <button class="btnquantity" onclick="tru()">-</button>
                                        <input type="number" class="inpquantity" name="" id="" value="10">
                                        <button class="btnquantity" onclick="cong()">+</button>
                                    </div>
                                </td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td><i class="fa-regular fa-circle-xmark"></i></td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">
                                    <div class="divimg"><img src="./img/image_products_home/olym-pianus-899833g1b-1.png" alt="" srcset=""></div>
                                </td>
                                <td style="width: 26%;"><span>nguyễn quốc châu</span></td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <button class="btnquantity" onclick="tru()">-</button>
                                        <input type="number" class="inpquantity" name="" id="" value="10">
                                        <button class="btnquantity" onclick="cong()">+</button>
                                    </div>
                                </td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td><i class="fa-regular fa-circle-xmark"></i></td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">
                                    <div class="divimg"><img src="./img/image_products_home/olym-pianus-899833g1b-1.png" alt="" srcset=""></div>
                                </td>
                                <td style="width: 26%;"><span>nguyễn quốc châu</span></td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <button class="btnquantity" onclick="tru()">-</button>
                                        <input type="number" class="inpquantity" name="" id="" value="10">
                                        <button class="btnquantity" onclick="cong()">+</button>
                                    </div>
                                </td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td><i class="fa-regular fa-circle-xmark"></i></td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">
                                    <div class="divimg"><img src="./img/image_products_home/olym-pianus-899833g1b-1.png" alt="" srcset=""></div>
                                </td>
                                <td style="width: 26%;"><span>nguyễn quốc châu</span></td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <button class="btnquantity" onclick="tru()">-</button>
                                        <input type="number" class="inpquantity" name="" id="" value="10">
                                        <button class="btnquantity" onclick="cong()">+</button>
                                    </div>
                                </td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td><i class="fa-regular fa-circle-xmark"></i></td>
                            </tr>
                            <tr>
                                <td style="width: 15%;">
                                    <div class="divimg"><img src="./img/image_products_home/olym-pianus-899833g1b-1.png" alt="" srcset=""></div>
                                </td>
                                <td style="width: 26%;"><span>nguyễn quốc châu</span></td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td>
                                    <div class="quantity">
                                        <button class="btnquantity" onclick="tru()">-</button>
                                        <input type="number" class="inpquantity" name="" id="" value="10">
                                        <button class="btnquantity" onclick="cong()">+</button>
                                    </div>
                                </td>
                                <td>
                                    <p>3.499.000 VNĐ</p>
                                </td>
                                <td><i class="fa-regular fa-circle-xmark"></i></td>
                            </tr>
                            <tr class="trbtn " >
                                <td></td>
                                <td style="text-align: end;">
                                    <button type="button" class=""><i class="fa-solid fa-arrow-left" id="iconback"></i>Tiếp tục xem sản phẩm</button>
                                </td>
                                <td style="text-align: start;">
                                    <button type="button" class="">Cập nhập giỏ hàng</button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="col-3 pay">
                    <table>
                        <tr class="tr1">
                            <td colspan="2">
                                <p>Tổng số lượng</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Tổng phụ</p>
                            </td>
                            <td>
                                <p>3.499.000 vnđ</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Giao hàng</p>
                            </td>
                            <td>
                                <p>Giao hàng miễn phí</p>
                                <p>Ước tính cho Việt Nam</p>
                                <p>Đổi địa chỉ</p>
                            </td>
                        </tr>
                        <tr class="trbtn">
                            <td colspan="2">
                                <button type="button" class="">Tiến hành thanh toán</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    // thêm file footer
    include "footer.php";
    ?>
</body>

</html>