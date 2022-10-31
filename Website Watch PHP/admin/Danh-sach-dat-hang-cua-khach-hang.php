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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>TC Watch - Danh sách đặt hàng</title>
</head>

<body>
    <?php
    // thêm file navbar menu
    include "../header_footer/header.php";
    ?>
    <div class="body-list-order-detail-customer">
        <div class="container-fluid pt-4">
            <h4 class=" mb-1 pt-1">Danh sách khách hàng oder</h4>
            <table>
                <tr>
                    <td colspan="6"></td>
                    <td><button type="button" class="btn btn-secondary">Tải file Excel</button></td>
                </tr>
                <tr class="tr1">
                    <td>STT</td>
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
                    <td>1</td>
                    <td>Oder0000122222222222222</td>
                    <td>KH999999999999999999</td>
                    <td>25/12/2022</td>
                    <td class="text-danger">Chưa thanh toán</td>
                    <td>11111111111111111111111</td>
                    <td>10.000.000đ</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Oder00001</td>
                    <td>KH999999999999999999</td>
                    <td>25/12/2022</td>
                    <td class="text-success">Đã thanh toán</td>
                    <td>11111111111111111111111</td>
                    <td>10.000.000đ</td>
                </tr>
                <tr>
                    <td>3</td>
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