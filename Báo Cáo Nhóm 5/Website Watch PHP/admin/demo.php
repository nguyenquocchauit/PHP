<?php
require '../config/connectDB.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css and javascript/style.css">

    <script src="../thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../thuvienweb/fontawesome-free-6.1.2-web/css/all.min.css">
    <script src="../thuvienweb/fontawesome-free-6.1.2-web/js/all.min.js"></script>
    <script src="../thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>TC WATCH</title>
</head>

<body>
    <?php
    // thêm file navbar menu
    include "../header_footer/header.php";
    ?>
    <div class="body-oder mt-5">
        <div class="container-fluid">
            <h4 class="text-center mb-5">Chi tiết hóa đơn</h4>
            <table>
                <tr class="tr1">
                    <td>
                        <p>ID_Detail</p>
                    </td>
                    <td>
                        <p>ID_Oder</p>
                    </td>
                    <td>
                        <p>ID_Product</p>
                    </td>
                    <td>
                        <p>Product</p>
                    </td>
                    <td>
                        <p>Create_At</p>
                    </td>
                    <td>
                        <p>Quantity</p>
                    </td>
                    <td>
                        <p>Price</p>
                    </td>
                    <td>
                        <p>Total</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Detail0011111111111111111</p>
                    </td>
                    <td>
                        <p>Oder001</p>
                    </td>
                    <td>
                        <p>Product001</p>
                    </td>
                    <td>
                        <img src="./img/baby-g.png" alt="" srcset="">
                    </td>
                    <td>
                        <p>25/10/2022</p>
                    </td>
                    <td>
                        <p>2</p>
                    </td>
                    <td>
                        <p>10.000.000 vnđ</p>
                    </td>
                    <td>
                        <p>20.000.000 vnđ</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Detail001</p>
                    </td>
                    <td>
                        <p>Oder0012222222222222222</p>
                    </td>
                    <td>
                        <p>Product001</p>
                    </td>
                    <td>
                        <img src="./img/g-shock.png" alt="" srcset="">
                    </td>
                    <td>
                        <p>25/10/2022</p>
                    </td>
                    <td>
                        <p>2</p>
                    </td>
                    <td>
                        <p>10.000.000 vnđ</p>
                    </td>
                    <td>
                        <p>20.000.000 vnđ</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Detail001</p>
                    </td>
                    <td>
                        <p>Oder001</p>
                    </td>
                    <td>
                        <p>Product0013333333333333</p>
                    </td>
                    <td>
                        <img src="./img/g-steel.png" alt="" srcset="">
                    </td>
                    <td>
                        <p>25/10/2022</p>
                    </td>
                    <td>
                        <p>2</p>
                    </td>
                    <td>
                        <p>10.000.000 vnđ</p>
                    </td>
                    <td>
                        <p>20.000.000 vnđ</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="body-dskho mt-5">
        <div class="container-fluid">
            <h4 class=" mb-5">Danh sách khách hàng oder</h4>
            <table>
                <tr>
                    <td colspan="5"></td>
                    <td><button type="button" class="">Tải file</button></td>
                </tr>
                <tr class="tr1">
                    <td>
                        <p>ID_Oder</p>
                    </td>
                    <td>
                        <p>ID_Customer</p>
                    </td>
                    <td>
                        <p>Create_At</p>
                    </td>
                    <td>
                        <p>Status</p>
                    </td>
                    <td>
                        <p>Description</p>
                    </td>
                    <td>
                        <p>Total</p>
                    </td>
                </tr>
                <tr>
                    <td>Oder0000122222222222222</td>
                    <td>KH999999999999999999</td>
                    <td>25/12/2022</td>
                    <td class="text-danger">Chưa thanh toán</td>
                    <td>11111111111111111111111</td>
                    <td>10.000.000đ</td>
                </tr>
                <tr>
                    <td>Oder00001</td>
                    <td>KH999999999999999999</td>
                    <td>25/12/2022</td>
                    <td class="text-success">Đã thanh toán</td>
                    <td>11111111111111111111111</td>
                    <td>10.000.000đ</td>
                </tr>
                <tr>
                    <td>Oder00001</td>
                    <td>KH999999999999999999</td>
                    <td>25/12/2022</td>
                    <td class="text-danger">Chưa thanh toán</td>
                    <td>11111111111111111111111</td>
                    <td>10.000.000đ</td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    // thêm file footer
    include "../header_footer/footer.php";
    ?>
</body>

</html>