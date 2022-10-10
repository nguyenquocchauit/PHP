<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bán sữa</title>
    <style>
        * {
            font-size: 21px;
        }

        table {
            text-align: center;
            margin: 210px auto;
           /* background-color: #ffe2e2; */
        }
        caption{
            color:  #0095ffc2;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $sql = "SELECT * FROM hang_sua";
    $result = mysqli_query($conn, $sql);
    // 4.Xu ly du lieu tra ve
    $checkColor = 1;
    echo "<table border='1'>";
    echo "<caption>THÔNG TIN HÀNG SỮA</caption>";
    echo "<tr>";
    echo "<td>Mã HS</td>";
    echo "<td>Tên hàng sữa</td>";
    echo "<td>Địa chỉ</td>";
    echo "<td>Điện thoại</td>";
    echo "<td>Email</td>";
    echo "</tr>";
    if (mysqli_num_rows($result) != 0)
        while ($row = mysqli_fetch_array($result)) {
            // if ($checkColor % 2 != 0)
            //     $color = "style='background-color:#1eff1e3b';";
            // else
            //     $color = "style='background-color:#ff00007a';";
            // $checkColor++;
            // echo "<tr $color>";
            echo "<tr>";
            echo "<td>" . $row['Ma_hang_sua'] . "</td>";
            echo "<td>" . $row['Ten_hang_sua'] . "</td>";
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