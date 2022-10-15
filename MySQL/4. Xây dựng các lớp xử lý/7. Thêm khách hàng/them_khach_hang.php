<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>Thêm khách hàng</title>
    <script>
        // loại khoảng trắng của ô input mã khách hàng
        $(function() {
            $('#customerID').on('keypress', function(e) {
                if (e.which == 32) {
                    return false;
                }
            });
        });
        // định dạng số điện thoại nhập vào 092.638.3006 cho dễ nhìn so với 0926383006
        $(document).ready(function() {
            $('#phoneNumber').mask('000.000.0000', {
                reverse: true
            });
        });
    </script>
    <style>
        * {
            font-size: 21px;
        }

        #div_parent {
            padding-top: 15px;
        }

        #title_h2 {
            text-align: center;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            color: #0072ff;
        }

        #div_form {
            top: 20px;
            width: 65%;
            margin: 0 auto;
            text-align: start;
            background-color: #0700a330;
            box-shadow: 9px 9px 10px #fef1dc;
        }

        .inp {
            padding: 15px 40px 0px 16px;
        }

        .inp_radio {
            font-size: 35px;
            padding-top: 4px;
            display: flex;
            justify-content: end;
        }

        .label {
            font-family: Verdana, sans-serif;
            padding: 25px 0px 0px 30px;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    // thêm file class khách hàng
    include "../4. Xây dựng lớp xử lý khách hàng_xl_khach_hang/xl_khach_hang.php";
    $khachhang = new KhachHang();
    $khachhang->setConnect($conn);
    $customerID = $khachhang->getCustomerIDAuto();
    ?>
    <form action="" method="post">
        <div id="div_parent">
            <h2 id="title_h2">THÊM KHÁCH HÀNG MỚI</h2>
            <div id="div_form">
                <div class="mb-3 row">
                    <label for="customerID" class="col-sm-2 col-form-label label ">Mã khách hàng</label>
                    <div class="col-sm-10 inp">
                        <input type="text" name="customerID" value="<?php echo $customerID ?>" class="form-control" id="customerID" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="customerName" class="col-sm-2 col-form-label label">Tên khách hàng</label>
                    <div class="col-sm-10 inp">
                        <input type="text" name="customerName" value="" class="form-control" id="customerName" pattern="^(?:((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-.\s])){1,}(['’,\-\.]){0,1}){2,}(([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-. ]))*(([ ]+){0,1}(((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){1,})(['’\-,\.]){0,1}){2,}((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){2,})?)*)$" title="Vui lòng nhập đúng tên thật!" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gender" class="col-sm-2 col-form-label label ">Giới tính</label>
                    <div class="col-sm-1 inp_radio">
                        <input class="form-check-input" type="radio" name="gender" id="inputGenderMale" value="0" required>
                    </div>
                    <div class="col-sm-1 inp">
                        <label class="form-check-label" for="inputGenderMale">Nam</label>
                    </div>
                    <div class="col-sm-1 inp_radio ">
                        <input class="form-check-input" type="radio" name="gender" id="inputGenderFemale" value="1" required>
                    </div>
                    <div class="col-sm-1 inp">
                        <label class="form-check-label" for="inputGenderFemale">Nữ</label>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="address" class="col-sm-2 col-form-label label ">Địa chỉ</label>
                    <div class="col-sm-10 inp">
                        <input type="text" name="address" value="" class="form-control" id="address" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="phoneNumber" class="col-sm-2 col-form-label label">Số điện thoại</label>
                    <div class="col-sm-10 inp">
                        <input type="text" name="phoneNumber" value="" class="form-control" id="phoneNumber" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label label">Email</label>
                    <div class="col-sm-10 inp">
                        <input type="email" name="email" value="" class="form-control" id="email" pattern=".+@gmail\.com" title="Vui lòng nhập đúng định dạng khachang@example.com!" required>
                    </div>
                </div>
                <div class="mb-3 row pb-3">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" name="insert" class="btn btn-success">Thêm <i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['customerName']))
        $customerName = $_POST['customerName'];
    if (isset($_POST['gender']))
        $gender = $_POST['gender'];
    if (isset($_POST['address']))
        $address = $_POST['address'];
    if (isset($_POST['phoneNumber']))
        $phoneNumber = str_replace('.', '', $_POST['phoneNumber']);
    if (isset($_POST['email']))
        $email = $_POST['email'];
    if (isset($_POST['insert'])) {
        $result = $khachhang->insert($customerID, $customerName, $gender, $address, $phoneNumber, $email);
        if ($result)
            echo '
                <script type="text/JavaScript"> 
                    alert("Đã tạo khách hàng ' . ($customerName) . ' thành công!!");
                    location.href ="../../2. Kết hợp PHP và MySQL/12. Xóa – Sửa/thong_tin_khach_hang.php?insert=success";
                </script>';
    }
    ?>
</body>

</html>