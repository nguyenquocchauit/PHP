<?php
require '../config/connectDB.php';
include 'inlcudes_function/show_update_info.php';
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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- thư viện sweet aler  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>TC Watch - Thông tin chi tiết</title>
</head>

<body>
    <div class="body-detail-customer">
        <?php
        // thêm file navbar menu
        include "../header_footer/header.php";
        ?>
        <div class="detail-customer">
            <div class="row">
                <div class="row pt-1 pb-3"><strong class=" d-flex justify-content-center" style="font-size: 30px; font-family: 'Oswald', sans-serif;">THÔNG TIN CHI TIẾT</strong></div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Họ và tên</span>
                        <input type="hidden" class="form-control" value="<?php echo $row['ID_Customer'] ?>" id="" name="">
                        <input type="hidden" class="form-control" value="<?php echo $row['Create_At'] ?>" id="" name="">
                        <input type="text" class="form-control" value="<?php echo $row['First_Name'] ." ". $row['Last_Name'] ?>" id="" name="">
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Số điện thoại</span>
                        <input type="text" class="form-control" value="<?php echo $row['Phone'] ?>" id="" name="">
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Email</span>
                        <input type="text" class="form-control" value="<?php echo $row['Email'] ?>" id="" name="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Địa chỉ</span>
                        <input type="text" class="form-control" value="<?php echo $row['Address'] ?>" id="" name="">
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Tên đăng nhập</span>
                        <input type="text" class="form-control" value="<?php echo $row['UserName'] ?>" id="" name="">
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Mật khẩu</span>
                        <input type="text" class="form-control" value="" id="" name="">
                    </div>
                </div>
                <div class="col-4"><strong class="message-title"><span class="message">(*)</span> Nhập lại mật khẩu hiện tại</strong></div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-2">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="inputGroup-sizing-default">Đổi mật khẩu</span>
                        <input type="text" class="form-control" value="" id="" name="">
                    </div>
                </div>
                <div class="col-4"><strong class="message-title"><span class="message">(*)</span> Nếu bạn muốn đổi mật khẩu vui lòng nhập vào ô đổi mật khẩu</strong></div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 p-2 pb-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Lưu thông tin</button>
                </div>
                <div class="col-4"></div>
            </div>

        </div>
        <?php
        // thêm file footer
        include "../header_footer/footer.php";
        ?>
    </div>
</body>

</html>