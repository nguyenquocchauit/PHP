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
            box-shadow: 0px 0px 70px #fef1dc;
            width: 75%;
            margin: 0 auto;
        }

        #title {
            background-color: #ffa50029;
            color: orange;
            text-align: center;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }

        img {
            width: 150px;
            height: 175px;
        }

        #tr_show {
            width: 100%;
        }

        #td_weight_price {
            color: red;
        }

        #td_weight_price>b {
            color: black;
        }

        #td_img {
            padding-top: 20px;
            display: flex;
            justify-content: center;
        }

        #td_content {
            width: 90%;
        }

        #title_h2 {
            text-align: center;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            color: #fb8fa2;
        }
    </style>
</head>

<body>
    <h2 id="title_h2">THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h2>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    //xác định tổng số kết quả bạn muốn trên mỗi trang
    $results_per_page = 2;
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    //tìm tổng số kết quả được lưu trữ trong cơ sở dữ liệu
    $query = "SELECT a.Ten_sua,a.Hinh, a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,b.Ten_hang_sua 
    FROM sua A inner join hang_sua B on a.Ma_hang_sua = b.Ma_hang_sua";
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
    $query = "SELECT a.Ten_sua,a.Hinh, a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,b.Ten_hang_sua 
    FROM sua A inner join hang_sua B on a.Ma_hang_sua = b.Ma_hang_sua LIMIT "
        . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $query);
    // 4.Xu ly du lieu tra ve
    if (mysqli_num_rows($result) != 0)
        while ($row = mysqli_fetch_array($result)) {
            $pathImg = $row['Hinh'];
            $milkName =  $row['Ten_sua'];
            $milkBrandName =  $row['Ten_hang_sua'];
            $contentIngredients = $row['TP_Dinh_Duong'];
            $contentBenefit = $row['Loi_ich'];
            $weight = $row['Trong_luong'];
            $price = number_format($row['Don_gia']);
            echo "<table class='table table-bordered' id='table'>";
            echo "
            <thead>
                <tr>
                    <th scope='col' colspan='5' id='title'>" . ($milkName) . " - " . ($milkBrandName) . "</th>
                </tr>
            </thead>
            <tbody>
                <tr id='tr_show'>
                    <td id='td_img'><img src='../../../images/Hinh_sua/" . ($pathImg) . "' alt=''></td>
                    <td id='td_content'>
                        <table class=''>
                            <tbody>
                                <tr>
                                    <td><b>Thành phần dinh dưỡng:</b></td>
                                </tr>
                                <tr>
                                    <td>" . ($contentIngredients) . "</td>
                                </tr>
                                <tr>
                                    <td><b>Lợi ích:</b></td>
                                </tr>
                                <tr>
                                    <td>" . ($contentBenefit) . "</td>
                                </tr>
                                <tr>
                                    <td id='td_weight_price'>
                                        <b>Trọng lượng: </b>" . ($weight) . " gr -
                                        <b>Đơn giá: </b>" . ($price) . " VNĐ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
            ";
            echo "</table>";
        }
    // include file pagination
    include '../../pagination.php';
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>

</html>