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
                width:1000px;
                margin: auto;
            }

            td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            h2{
                text-align: center;
                text-transform: uppercase;
            }
            img{
                width: 100px;
                height: 100px;
            }
            #title{
                background-color: lightpink;
            }
            .pagination {
            text-align: center;
            margin-top: 50px;
            }

            .pagination a {
                color: black;
                padding: 8px 16px;
                text-decoration: none;
                border: 1px solid #ddd;
            }
    </style>
</head>
<body>
<?php
    // 1. Ket noi CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Không thể kết nối tới database' . mysqli_connect_error());
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $sql = "SELECT Ten_sua, Ten_hang_sua , Ten_loai, Trong_luong, Don_gia ,Hinh,TP_Dinh_Duong,Loi_ich
    FROM sua JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
    JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
    $result = mysqli_query($conn, $sql);
    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
    $result = mysqli_query($conn, 'select count(Ma_sua) as total from sua');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 2;

    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $total_page = ceil($total_records / $limit);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    // Tìm Start
    $start = ($current_page - 1) * $limit;

    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
    $sql =  "SELECT Ten_sua, Ten_hang_sua , Ten_loai, Trong_luong, Don_gia ,Hinh,TP_Dinh_Duong,Loi_ich
    FROM sua JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
    JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);
    ?>
    <div>
        <?php
        // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
        if (mysqli_num_rows($result) != 0) 
        {
            while ($row = mysqli_fetch_array($result)) 
            {
                $Name = $row['Ten_sua'];
                $Hang = $row['Ten_hang_sua'];
                $TrongLuong = $row['Trong_luong'];
                $DonGia = $row['Don_gia'];
                $Hinh = $row['Hinh'];
                    $file =" './img/$Hinh'";
                    if (!(file_exists($file)))
                        $Hinh = 'loi.jpg';
                $TPDD = $row['TP_Dinh_Duong'];
                $Loiich = $row ['Loi_ich'];

                echo "
                <table>
                    <tr>
                        <td colspan = '2' id= 'title'><h2>$Name - $Hang</h2></td>
                    </tr>
                    <tr>
                        <td><img src='./img/$Hinh'></td>
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
        ?>
    </div>
    <div class="pagination">
        <?php
        // BƯỚC 7: HIỂN THỊ PHÂN TRANG

        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1) {
            echo '<a href="listchitietphantrang.php?page=' . (1) . '"> &laquo; </a>  ';
            echo '<a href="listchitietphantrang.php?page=' . ($current_page - 1) . '"> &lt; </a>  ';
           
        }

        // Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++) {
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page) {
                echo '<span>' . $i . '</span>  ';
            } else {
                echo '<a href="listchitietphantrang.php?page=' . $i . '">' . $i . '</a>  ';
            }
        }
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="listchitietphantrang.php?page=' . ($current_page + 1) . '"> &raquo; </a>  ';
            echo '<a href="listchitietphantrang.php?page=' . ($total_page) . '"> &gt; </a>  ';
        }
        ?>
    </div>
</body>
</html>