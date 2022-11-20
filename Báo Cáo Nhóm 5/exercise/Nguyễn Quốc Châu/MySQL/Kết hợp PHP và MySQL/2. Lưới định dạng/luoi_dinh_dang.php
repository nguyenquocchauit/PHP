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
        #title {
            text-align: center;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }

        #title_col {
            text-align: center;
            color: red;
        }

        #td_center {
            text-align: center;
        }
    </style>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../../../includes/header.php"; ?>
        <?php
        // 1. Ket noi CSDL
        require '../../connectDB.php';
        // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
        $sql = "SELECT * FROM Khach_hang";
        $result = mysqli_query($conn, $sql);
        // 4.Xu ly du lieu tra ve
        $checkColor = 1;
        echo "<table class='table table-bordered'>";
        echo "<thead> <tr>";
        echo "<th scope='col' colspan='6' id='title'>THÔNG TIN KHÁCH HÀNG</th>";
        echo "</tr><tr id='title_col'>";
        echo "<th scope='col'>Mã khách hàng</th>";
        echo "<th scope='col'>Tên khách hàng</th>";
        echo "<th scope='col'>Giới tính</th>";
        echo "<th scope='col'>Địa chỉ</th>";
        echo "<th scope='col'>Điện thoại</th>";
        echo "<th scope='col'>Email</th>";
        echo "</tr> </thead>";
        if (mysqli_num_rows($result) != 0)
            while ($row = mysqli_fetch_array($result)) {
                if ($checkColor % 2 != 0)
                    $color = "style='background-color:#ffb70021;'";
                else
                    $color = "style='background-color:none;'";
                $checkColor++;
                $customerID = $row['Ma_khach_hang'];
                $customerName = $row['Ten_khach_hang'];
                $gender = $row['Phai'];
                $address = $row['Dia_chi'];
                $phoneNumber = $row['Dien_thoai'];
                $email = $row['Email'];
                echo "<tbody><tr $color>";
                echo "<td>" . $customerID . "</td>";
                echo "<td>" . $customerName . "</td>";
                echo "<td id='td_center'>" . $gender . "</td>";
                echo "<td>" . $address . "</td>";
                echo "<td>" . $phoneNumber . " gram</td>";
                echo "<td>" . $email . " VNĐ</td>";
                echo "</tr></tbody>";
            }
        echo " </table>";
        // 5. Xoa ket qua khoi vung nho va Dong ket noi
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
        <?php include "../../../../../includes/footer.php"; ?>
    </div>

</body>

</html>