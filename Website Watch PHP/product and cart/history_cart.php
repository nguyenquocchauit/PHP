<?php
// kết nối cơ sở dữ liệu db_watch
require '../config/connectDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Website Watch PHP/css and javascript/style.css">
    <script src="../thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>TC Watch - Lịch sử giỏ hàng</title>
</head>

<body>
    <div class="body-product-cart">
        <?php
        // thêm file navbar menu
        include "../header_footer/header.php";
        ?>
        <div class="body-cart mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="row pb-3"><strong class=" d-flex justify-content-center" style="font-size: 30px; font-family: 'Oswald', sans-serif;">GIỎ HÀNG CỦA BẠN</strong></div>
                    <div class="col cart">
                    </div>
                </div>
            </div>
        </div>
        <?php
        // thêm file footer
        include "../header_footer/footer.php";
        ?>
    </div>
</body>

</html>