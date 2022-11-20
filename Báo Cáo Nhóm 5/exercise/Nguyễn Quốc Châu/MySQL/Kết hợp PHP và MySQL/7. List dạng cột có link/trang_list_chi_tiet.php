<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Quản lý bán sữa</title>
    <style>
        #table {
            box-shadow: 0px 0px 70px #fef1dc;
            width: 100%;
            margin: 0 auto;
        }

        #title {
            background-color: #ffa50029;
            color: orange;
            text-align: center;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }

        img {
            width: 150px;
            height: 175px;
        }

        #tr_show {
            width: 100%;
        }

        #td_weight_price {
            text-align: end;
        }

        #td_img {
            padding-top: 20px;
            display: flex;
            justify-content: center;
        }

        #td_content {
            width: 80%;
        }

        #td_goback {
            text-align: end;
        }

        a:link {
            color: #b32a2a;
            text-decoration: none;
        }

        a:hover {
            color: red;
        }
    </style>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../../../includes/header.php"; ?>
        <?php
        // 1. Ket noi CSDL
        require '../../connectDB.php';
        // get milkcode data from url
        $id = $_GET['Ma_sua'];
        // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
        $query = "SELECT a.Ten_sua,a.Hinh, a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,b.Ten_hang_sua 
    FROM sua A inner join hang_sua B on a.Ma_hang_sua = b.Ma_hang_sua WHERE a.Ma_sua='$id' ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if (!($row > 0)) {
            header('Location: list_dang_cot_co_link.php');
        }
        // 4.Xu ly du lieu tra ve
        $pathImg = $row['Hinh'];
        $file = "../../../images/Hinh_sua/$pathImg";
        if (!(file_exists($file)))
            $pathImg = 'loi.jpg';
        $contentIngredients = $row['TP_Dinh_Duong'];
        $contentBenefit = $row['Loi_ich'];
        $weight = $row['Trong_luong'];
        $price = number_format($row['Don_gia']);
        ?>
        <table class='table table-bordered' id='table'>
            <thead>
                <tr>
                    <th scope='col' colspan='5' id='title'> <?php echo $row['Ten_sua'] . " - " . $row['Ten_hang_sua']  ?></th>
                </tr>
            </thead>
            <tbody>
                <tr id='tr_show'>
                    <td id='td_img'><img src='../../../images/Hinh_sua/<?php echo $pathImg ?>' alt=''></td>
                    <td id='td_content'>
                        <table class=''>
                            <tbody>
                                <tr>
                                    <td><b>Thành phần dinh dưỡng:</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo $contentIngredients ?></td>
                                </tr>
                                <tr>
                                    <td><b>Lợi ích:</b></td>
                                </tr>
                                <tr>
                                    <td><?php echo $contentBenefit ?></td>
                                </tr>
                                <tr>
                                    <td id='td_weight_price'>
                                        <b>Trọng lượng: </b><?php echo $weight ?> gr -
                                        <b>Đơn giá: </b><?php echo $price ?> VNĐ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td id='td_goback'><a href='javascript:window.history.back(-1);'>Trở về trang trước</a></td>
                </tr>
            </tbody>
        </table>
        <?php
        // 5. Xoa ket qua khoi vung nho va Dong ket noi
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
        <?php include "../../../../../includes/footer.php"; ?>
    </div>

</body>

</html>