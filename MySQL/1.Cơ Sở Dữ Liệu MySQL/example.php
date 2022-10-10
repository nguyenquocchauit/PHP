<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bán sữa</title>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'ql_bansua')
        or die("Không thể kết nối tới database" . mysqli_connect_error());
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $sql = "SELECT * FROM Khach_hang";
    $result = mysqli_query($conn, $sql);
    // 4.Xu ly du lieu tra ve
    $checkColor = 1;
    echo "<table border='1' style='padding:5px;background-color:#ffe2e2;with:100%px'>";
    echo "<tr>";
    echo "<td>Mã khách hàng</td>";
    echo "<td>Tên khách hàng</td>";
    echo "<td>Giới tính</td>";
    echo "<td>Địa chỉ</td>";
    echo "<td>Điện thoại</td>";
    echo "<td>Email</td>";
    echo "</tr>";
    if (mysqli_num_rows($result) != 0)
        while ($row = mysqli_fetch_array($result)) {
            if ($checkColor % 2 != 0)
                $color = "style='background-color:#1eff1e3b';";
            else
                $color = "style='background-color:#ff00007a';";
            $checkColor++;
            echo "<tr $color>";
            echo "<td>" . $row['Ma_khach_hang'] . "</td>";
            echo "<td>" . $row['Ten_khach_hang'] . "</td>";
            if ($row['Phai'] == 1)
                echo "<td>Nam</td>";
            else
                if ($row['Phai'] == 0)
                echo "<td>Nữ</td>";
            echo "<td>" . $row['Dia_chi'] . "</td>";
            echo "<td>" . $row['Dien_thoai'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
        }
    echo " </table>";
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

</body>

</html>