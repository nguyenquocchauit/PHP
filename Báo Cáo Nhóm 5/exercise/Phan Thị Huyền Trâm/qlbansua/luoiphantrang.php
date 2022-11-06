<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        td:nth-child(3) {
            text-align: center;
        }

        tr:nth-child(1) {
            color: red;
        }

        tr:nth-child(even) {
            /* nth-child : Lựa chọn phần tử chẵn (Even) lẻ (Odd) */
            background-color: lightpink;
        }

        h3 {
            text-align: center;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Không thể kết nối tới database' . mysqli_connect_error());
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $sql = "SELECT Ten_sua, Ten_hang_sua , Ten_loai, Trong_luong, Don_gia 
                FROM sua JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
    $result = mysqli_query($conn, $sql);
    // 4.Xu ly du lieu tra ve
    echo "<h3>Thông tin khách hàng</h3>";
    echo "<table>";
    echo "<tr>";
    echo "<td>STT</td>";
    echo "<td>Tên sữa </td>";
    echo "<td>Hãng sữa </td>";
    echo "<td>Loại sữa </td>";
    echo "<td>Trọng lượng </td>";
    echo "<td>Đơn giá</td>";
    echo "</tr>";
    if (mysqli_num_rows($result) != 0) {
        $STT = 1;
        while ($row = mysqli_fetch_array($result)) {
            $Name = $row['Ten_sua'];
            $HangSua = $row['Ten_hang_sua'];
            $LoaiSua = $row['Ten_loai'];
            $TrongLuong = $row['Trong_luong'];
            $DonGia = $row['Don_gia'];
            echo "<tr>";
            echo "<td> $STT </td>";
            echo "<td> $Name </td>";
            echo "<td> $HangSua </td>";
            echo "<td> $LoaiSua </td>";
            echo "<td> $TrongLuong  </td>";
            echo "<td> $DonGia </td>";
            echo "</tr>";
            $STT++;
        }
    }
    echo "</table>";

    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>

</html>