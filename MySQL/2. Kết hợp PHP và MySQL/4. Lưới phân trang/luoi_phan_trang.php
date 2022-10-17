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
            color: red;
            text-align: center;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }

        #title_col {
            background-color: #ffb70021;
            color: red;
        }
    </style>
</head>

<body>
    <?php
    //kết nối cơ sở dữ liệu
    require '../../connectDB.php';
    //xác định tổng số kết quả bạn muốn trên mỗi trang
    $results_per_page = 5;
    //tìm tổng số kết quả được lưu trữ trong cơ sở dữ liệu
    $query = "SELECT A.Ten_sua,C.Ten_hang_sua,B.Ten_loai, A.Trong_luong, A.Don_gia 
        FROM sua A inner join loai_sua B on A.Ma_loai_sua = B.Ma_loai_sua inner join hang_sua C on C.Ma_hang_sua = A.Ma_hang_sua";
    $result = mysqli_query($conn, $query);
    $number_of_result = mysqli_num_rows($result);
    //xác định tổng số trang có sẵn
    $number_of_page = ceil($number_of_result / $results_per_page);
    //xác định xem khách truy cập số trang nào hiện đang truy cập
    if (!isset($_GET['page'])) {
        // Giải quyết trường hợp ngoại lệ $_GET['page'] ở url không thấy biến page ở lần tải trang đầu tiên. 
        // Giải quyết trường hợp câu điều kiện phía dưới kiểm tra $_GET['page']  để active số trang đang ở hiện tại
        $parameterUrl = null;
        $page = 1;
    } else {
        $parameterUrl = " ";
        $page = $_GET['page'];
    }
    //xác định số bắt đầu sql LIMIT cho các kết quả trên trang hiển thị
    $page_first_result = ($page - 1) * $results_per_page;
    //lấy các kết quả đã chọn từ cơ sở dữ liệu
    $query = "SELECT A.Ten_sua,C.Ten_hang_sua,B.Ten_loai, A.Trong_luong, A.Don_gia 
        FROM sua A inner join loai_sua B on A.Ma_loai_sua = B.Ma_loai_sua inner join hang_sua C on C.Ma_hang_sua = A.Ma_hang_sua LIMIT "
        . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $query);
    // hiển thị kết quả đã truy xuất trên trang web
    $STT = 1;
    echo "<table class='table table-bordered'>";
    echo "<thead> <tr>";
    echo "<th scope='col' colspan='6' id='title'>THÔNG TIN SỮA</th>";
    echo "</tr><tr id='title_col'>";
    echo "<th scope='col'>STT</th>";
    echo "<th scope='col'>Tên sữa</th>";
    echo "<th scope='col'>Hãng sữa</th>";
    echo "<th scope='col'>Loại sữa</th>";
    echo "<th scope='col'>Trọng lượng</th>";
    echo "<th scope='col'>Đơn giá</th>";
    echo "</tr> </thead>";
    while ($row = mysqli_fetch_array($result)) {
        if ($STT % 2 != 0)
            $color = "style='color:red;'";
        else
            $color = "style='background-color:#ffb70021;'";

        $milkName = $row['Ten_sua'];
        $milkBrandName = $row['Ten_hang_sua'];
        $typeName = $row['Ten_loai'];
        $weight = $row['Trong_luong'];
        $price =  number_format($row['Don_gia']);
        echo "<tbody><tr $color>";
        echo "<th scope='row'>" . $STT++ . "</th>";
        echo "<td>" . $milkName . "</td>";
        echo "<td>" . $milkBrandName . "</td>";
        echo "<td>" . $typeName . "</td>";
        echo "<td>" . $weight . " gram</td>";
        echo "<td>" . $price . " VNĐ</td>";
        echo "</tr></tbody>";
    }
    echo " </table>";
    // include file pagination
    include '../../pagination.php';
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>

</html>