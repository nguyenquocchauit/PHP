<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Document</title>
    <style>
        table {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-collapse: collapse;
            width: 500px;
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

        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <?php include "../../../includes/header.php"; ?>
    <div>
        <form action="" method="get">
            <table>
                <tr>
                    <td colspan="4">
                        <h3>Tìm kiếm thông tin sữa</h3>
                    </td>
                </tr>
                <tr>
                    <td>Loại sữa</td>
                    <td><input type="text" name="kind"></td>
                    <td>Hãng sữa</td>
                    <td><input type="text" name="brand"></td>
                </tr>
                <tr>
                    <td>Tên sữa:</td>
                    <td><input type="text" name="name"></td>
                    <td></td>
                    <td><button type="submit" name="searchbtn">Tìm kiếm</button></td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    if (isset($_REQUEST['searchbtn'])) {

        $kind = ($_GET['kind']);
        $brand = ($_GET['brand']);
        $name = ($_GET['name']);

        if (empty($kind) || (empty($brand) || (empty($name)))) {
            echo "Yeu cau nhap du lieu vao o trong";
        } else {
            // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
            $sql = "select  `Ten_sua`, `Ten_hang_sua`, `Ten_loai`, `Trong_luong`, `Don_gia`, `TP_Dinh_Duong`, `Loi_ich`, `Hinh`
             from sua 
             join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
             join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
             where Ten_loai like '%$kind%' AND Ten_hang_sua like '%$brand%' AND Ten_sua like '%$name%';
                    ";

            // 1. Ket noi CSDL
            $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
                or die('Không thể kết nối tới database' . mysqli_connect_error());
            $result = mysqli_query($conn, $sql);
            $slkq = mysqli_num_rows($result);
            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
            // 4.Xu ly du lieu tra ve
            echo "<table>";
            // echo "<tr>";
            echo "<td colspan='2'><h3> Có $slkq sản phẩm được tìm thấy</h3></td>";
            // echo "</tr>";
            if (mysqli_num_rows($result) != 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $Name = $row['Ten_sua'];
                    $TrongLuong = $row['Trong_luong'];
                    $DonGia = $row['Don_gia'];
                    $Hang = $row['Ten_hang_sua'];
                    $Hinh = $row['Hinh'];
                    $file = " './img/$Hinh'";
                    $TPDD = $row['TP_Dinh_Duong'];
                    $Loiich = $row['Loi_ich'];

                    echo "
                <table>
                    
                    <tr>
                        <td colspan = '2' id= 'title'><h2>$Name - $Hang</h2></td>
                    </tr>
                    <tr>
                        <td> <img src='./img/$Hinh'></td>
                        <td>
                            <p>Thành phần dinh dưỡng</p>
                            <p>$TPDD</p>
                            <p>Lợi ich:</p>
                            <p>$Loiich</p>
                            <p>Trọng lượng : $TrongLuong gram  - Đơn giá : $DonGia VNĐ</p>
                        </td>
                    </tr>
                </table>
                ";
                }
            }
            echo "</table>";
        }
    }


    ?>
    <?php include "../../../includes/footer.php"; ?>
</body>

</html>