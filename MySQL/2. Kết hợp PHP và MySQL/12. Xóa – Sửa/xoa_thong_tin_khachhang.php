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
    <title>Quản lý bán sữa</title>
    <style>
        * {
            font-size: 20px;
        }

        #a_goback {
            color: white;
            text-decoration: none;
        }

        .inp_radio {
            padding-top: 16px;
            display: flex;
            justify-content: end;
        }

        #div_parent {
            margin: 0 auto;
            width: 74%;
            padding-top: 15px;
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

        .label {
            font-family: Verdana, sans-serif;
            padding: 20px 0px 0px 0px;
        }

        #title {
            background-color: #ffa50029;
            color: orange;
            text-align: center;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    // get milkcode data from url
    $id = $_GET['CustomerID'];
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $query = "SELECT * FROM khach_hang WHERE Ma_khach_hang='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if (!($row > 0)) {
        header('Location: thong_tin_khach_hang.php');
    }
    // 4.Xu ly du lieu tra ve
    $customerID = $row['Ma_khach_hang'];
    $customerName = $row['Ten_khach_hang'];
    $gender = $row['Phai'];
    $address = $row['Dia_chi'];
    $phoneNumber = $row['Dien_thoai'];
    $email = $row['Email'];
    if ($gender == 1) {
        $addCheckedFemale = 'checked';
        $addCheckedMale = null;
    } else
        if ($gender == 0) {
        $addCheckedMale = 'checked';
        $addCheckedFemale = null;
    }
    $getName = $customerName;
    ?>
    <form action="" method="post">
        <div id="div_parent">
            <h2 id="title_h2">THÔNG TIN KHÁCH HÀNG</h2>
            <div id="div_form"></div>
            <div class="mb-3 row">
                <label for="inputCustomerID" class="col-sm-2 col-form-label label ">Mã khách hàng</label>
                <div class="col-sm-10 inp">
                    <input type="text" name="customerID" value="<?php echo $customerID ?>" class="form-control" id="inputCustomerID" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputCustomerName" class="col-sm-2 col-form-label label ">Tên khách hàng</label>
                <div class="col-sm-10 inp">
                    <input type="text" name="customerName" value="<?php echo $customerName ?>" class="form-control" id="inputCustomerName" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputGender" class="col-sm-2 col-form-label label ">Giới tính</label>
                <div class="col-sm-1 inp_radio">
                    <input class="form-check-input" type="radio" name="gender" id="inputGenderMale" value="0" disabled <?php echo $addCheckedMale ?>>
                </div>
                <div class="col-sm-1 inp">
                    <label class="form-check-label" for="inputGenderMale">Nam</label>
                </div>
                <div class="col-sm-1 inp_radio ">
                    <input class="form-check-input" type="radio" name="gender" id="inputGenderFemale" value="1" disabled <?php echo $addCheckedFemale ?>>
                </div>
                <div class="col-sm-1 inp">
                    <label class="form-check-label" for="inputGenderFemale">Nữ</label>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputAddress" class="col-sm-2 col-form-label label ">Địa chỉ</label>
                <div class="col-sm-10 inp">
                    <input type="text" name="address" value="<?php echo $address ?>" class="form-control" id="inputAddress" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPhoneNumber" class="col-sm-2 col-form-label label ">Số điện thoại</label>
                <div class="col-sm-10 inp">
                    <input type="text" name="phoneNumber" value="<?php echo $phoneNumber ?>" class="form-control" id="inputPhoneNumber" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputEmail" class="col-sm-2 col-form-label label ">Số điện thoại</label>
                <div class="col-sm-10 inp">
                    <input type="text" name="email" value="<?php echo $email ?>" class="form-control" id="inputEmail" disabled>
                </div>
            </div>
            <div class="mb-3 row pb-3">
                <div class="col-6 d-flex justify-content-end">
                    <a id="a_goback" class="btn btn-secondary" href='javascript:window.history.back(-1);'><i class="fa-solid fa-left-long"></i> Quay lại</a>
                </div>
                <div class="col-6 d-flex justify-content-start  ">
                    <button type="submit" name="delete" class="btn btn-danger">Xóa <i class='fa-solid fa-trash-can'></i></button>
                </div>
            </div>
        </div>
        </div>
    </form>
    <?php
    if (isset($_POST['delete'])) {
        // check khách hàng đã từng mua hàng chưa
        $query = " SELECT A.Ma_khach_hang, COUNT(B.So_hoa_don) AS 'So_HD' 
        FROM khach_hang A INNER JOIN hoa_don B ON A.Ma_khach_hang = B.Ma_khach_hang WHERE A.Ma_khach_hang = '" . ($customerID) . "'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if ($row['So_HD'] != 0) {
            echo '
            <script type="text/JavaScript"> 
                alert("Không thể xóa khách hàng ' . ($getName) . ' vì đã mua hàng!!");
                location.href ="thong_tin_khach_hang.php?delete=error";
            </script>';
        } else if ($row['So_HD'] == 0) {
            $query = "DELETE FROM Khach_hang WHERE Ma_khach_hang='" . $customerID . "'";
            $result = mysqli_query($conn, $query);
            if ($result == true) {
                echo '
            <script type="text/JavaScript"> 
                alert("Đã xóa khách hàng ' . ($getName) . ' thành công!!");
                location.href ="thong_tin_khach_hang.php?delete=success";
            </script>';
            }
        }
    }
    // 5. Xoa ket qua khoi vung nho va Dong ket noia
    mysqli_close($conn);

    ?>
</body>

</html>