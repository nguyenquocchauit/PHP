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

        #table {
            margin: 0 auto;
            width: 950px;
        }

        #title {
            background-color: #ffa50029;
            color : orange;
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

        img {
            width: 150px;
            height: 175px;
        }

        .imgavt {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    //xác định tổng số kết quả bạn muốn trên mỗi trang
    $results_per_page = 4;
    //tìm tổng số kết quả được lưu trữ trong cơ sở dữ liệu
    $query = "SELECT A.Hinh,A.Ten_sua,B.Ten_hang_sua,C.Ten_loai,A.Trong_luong,A.Don_gia 
    FROM sua A inner join hang_sua B on A.Ma_hang_sua = B.Ma_hang_sua inner join loai_sua C on C.Ma_loai_sua = A.Ma_loai_sua;";
    $result = mysqli_query($conn, $query);
    $number_of_result = mysqli_num_rows($result);
    //xác định tổng số trang có sẵn
    $number_of_page = ceil($number_of_result / $results_per_page);
    //xác định xem khách truy cập số trang nào hiện đang truy cập
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    //xác định số bắt đầu sql LIMIT cho các kết quả trên trang hiển thị
    $page_first_result = ($page - 1) * $results_per_page;
    //lấy các kết quả đã chọn từ cơ sở dữ liệu
    $query = "SELECT A.Hinh,A.Ten_sua,B.Ten_hang_sua,C.Ten_loai,A.Trong_luong,A.Don_gia 
    FROM sua A inner join hang_sua B on A.Ma_hang_sua = B.Ma_hang_sua inner join loai_sua C on C.Ma_loai_sua = A.Ma_loai_sua LIMIT "
        . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $query);
    // 4.Xu ly du lieu tra ve
    echo "
    <table class='table table-bordered' id='table'>
    <thead>
        <tr>
            <th scope='col' colspan='2' id='title'>THÔNG TIN CÁC SẢN PHẨM</th>
        </tr>
    </thead>
    <tbody>";
    if (mysqli_num_rows($result) != 0)
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            $pathImg = $row['Hinh'];
            $tenSua =  $row['Ten_sua'];
            $tenHangSua = $row['Ten_hang_sua'];
            $tenLoai = $row['Ten_loai'];
            $trongLuong = $row['Trong_luong'];
            $donGia = number_format($row['Don_gia']);
            echo "<td class='imgavt'><img src='../../../images/Hinh_sua/$pathImg' alt='hinhsua'> </td>";
            echo "
            <td>
                <table class='table'>
                    <tbody>
                        <tr>
                            <td>$tenSua</td>
                        </tr>
                        <tr>
                            <td>Nhà sản xuất: $tenHangSua  </td>
                        </tr>
                        <tr>
                            <td>$tenLoai - $trongLuong gr - $donGia VNĐ </td>
                        </tr>
                    </tbody>
                </table>
            </td>";
        }
    echo "</tr>
        </tbody>
    </table>";
    //hiển thị liên kết của các trang trong URL
    echo '
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only"></span>
            </a>
        </li>';
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<li class="page-item "><a class="page-link" href = "list_don_gian.php?page= ' . $page . '"> ' . $page . ' </a></li>';
    }
    echo '
        <li class="page-item ">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only"></span>
            </a>
            </li>
        </ul>
    </nav>';
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>

</html>