<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Document</title>
    <style>
        table {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-collapse: collapse;
            width: 700px;
            margin: auto;
        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
        }

        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body class="body">
    <?php include "../../../../includes/header.php"; ?>
    <?php
    // 1. Ket noi CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Không thể kết nối tới database' . mysqli_connect_error());
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $ms = $_GET['id'];
    $sql = "SELECT Ma_sua,  Ten_sua, Ten_hang_sua , Ten_loai, Trong_luong, Don_gia ,Hinh,TP_Dinh_Duong,Loi_ich
            FROM sua JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
            JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
            WHERE Ma_sua = '$ms' ";
    $result = mysqli_query($conn, $sql);
    // 4.Xu ly du lieu tra ve

    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_array($result)) {
            $Name = $row['Ten_sua'];
            $Hang = $row['Ten_hang_sua'];
            $TrongLuong = $row['Trong_luong'];
            $DonGia = $row['Don_gia'];
            $Hinh = $row['Hinh'];
            $file = "../img/$Hinh";
            if (!(file_exists($file)))
                $Hinh = 'loi.jpg';
            $TPDD = $row['TP_Dinh_Duong'];
            $Loiich = $row['Loi_ich'];
            echo "
            <table>
                <tr>
                    <td colspan = '2'><h2>$Name - $Hang</h2></td>
                </tr>
                <tr>
                    <td><img src='../img/$Hinh'></td>
                    <td>
                        <p>Thành phần dinh dưỡng</p>
                        <p>$TPDD</p>
                        <p>Lợi ich:</p>
                        <p>$Loiich</p>
                        <p>Trọng lượng : $TrongLuong gram  - Đơn giá : $DonGia VNĐ</p>
                    </td>
                </tr>
                <tr>
                    <td><a href='javascript:window.history.back(-1);'>Quay lại</a></td>
                    <td></td>
                </tr>
            </table>
            ";
        }
    }
    echo "</div>";
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
    <?php include "../../../../includes/footer.php"; ?>

</body>

</html>