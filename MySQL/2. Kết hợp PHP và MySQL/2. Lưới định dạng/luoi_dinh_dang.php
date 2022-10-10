<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Quản lý bán sữa</title>
    <style>
        * {
            font-size: 21px;
        }

        #title {
            text-align: center;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }
        #title_col {
            text-align: center;
            color: red;
        }
        #td_center
        {
            text-align: center;
        }
    </style>
</head>

<body>
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
            echo "<tbody><tr $color>";
            echo "<td>" . $row['Ma_khach_hang'] . "</td>";
            echo "<td>" . $row['Ten_khach_hang'] . "</td>";
            echo "<td id='td_center'>" . $row['Phai'] . "</td>";
            echo "<td>" . $row['Dia_chi'] . "</td>";
            echo "<td>" . $row['Dien_thoai'] . " gram</td>";
            echo "<td>" . $row['Email'] . " VNĐ</td>";
            echo "</tr></tbody>";
        }
    echo " </table>";
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

</body>

</html>