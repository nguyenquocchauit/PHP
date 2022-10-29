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
            width:500px;
            margin: auto;
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
        img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Không thể kết nối tới database' . mysqli_connect_error());
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $sql = "SELECT Ten_sua, Ten_hang_sua , Ten_loai, Trong_luong, Don_gia ,Hinh 
    FROM sua JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
    JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
    $result = mysqli_query($conn, $sql);
    // 4.Xu ly du lieu tra ve
    echo "<table>";
    echo "<tr>";
    echo "<td colspan='2'><h3>Thông tin các sản phẩm</h3></td>";
    echo "</tr>";
    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_array($result)) {
            $Name = $row['Ten_sua'];
            $HangSua = $row['Ten_hang_sua'];
            $LoaiSua = $row['Ten_loai'];
            $TrongLuong = $row['Trong_luong'];
            $DonGia = $row['Don_gia'];
            $Hinh = $row['Hinh'];
            $file =" './img/$Hinh'";
                    if (!(file_exists($file)))
                        $Hinh = 'loi.jpg';
            echo "<tr>";
                echo "<td>";
                    echo "<img src='./img/$Hinh'>";
                echo "</td>";
                echo "<td>";
                    echo "<p>$Name</p>";
                    echo "<p> Nhà sản xuất : $HangSua</p> ";
                    echo "<p>  $LoaiSua - $TrongLuong - $DonGia </p>";
                echo "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>

</html>