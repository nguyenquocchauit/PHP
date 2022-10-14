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

        caption {
            color: #0095ffc2;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    //include 'xl_hang_sua.php';
    include '../../4. Xây dựng các lớp xử lý/Xây dựng lớp xử lý hãng sữa_xl_hang_sua/xl_hang_sua.php';
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    // $sql = "SELECT * FROM hang_sua";
    // $result = mysqli_query($conn, $sql);
    $exec = new HangSua();
    $exec->setConnect($conn);
    // funtion all get all data in table
    $result = $exec->all();
    // queryByID get data by ID
    //queryByID ($milkBrandID, $milkBrandName, $address, $phoneNumber, $email)
    //$result = $exec->queryByID('NoParameter','NoParameter','NoParameter','NoParameter','NoParameter');
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
            $milkBrandID = $row['Ma_hang_sua'];
            $milkBrandName = $row['Ten_hang_sua'];
            $address = $row['Dia_chi'];
            $phoneNumber = $row['Dien_thoai'];
            $email = $row['Email'];
            echo "<tr>";
            echo "<td>" . $milkBrandID . "</td>";
            echo "<td>" . $milkBrandName . "</td>";
            echo "<td>" . $address . "</td>";
            echo "<td>" . $phoneNumber . "</td>";
            echo "<td>" . $email . "</td>";
            echo "</tr>";
        }
    echo " </table>";
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

</body>

</html>