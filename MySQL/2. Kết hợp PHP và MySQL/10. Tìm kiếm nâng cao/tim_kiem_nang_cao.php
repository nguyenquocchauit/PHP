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

        hr.new4 {
            margin: auto;
            width: 90%;
            border: 1px solid red;
        }

        #div_parent {
            text-align: center;
        }

        #title_h2 {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            color: #fb8fa2;
        }

        #div_select {
            width: 50%;
            margin: 0 auto;
        }

        #div_select_milktype {
            width: 50%;
        }

        #div_select_milkbrand {
            width: 50%;
        }

        #div_search {
            padding-top: 5px;
            width: 50%;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    // format sticky form 2 tag select
    if (isset($_GET['milkType']))
        $milkType = $_GET['milkType'];
    else
        $milkType = null;
    if (isset($_GET['milkBrand']))
        $milkBrand = $_GET['milkBrand'];
    else
        $milkBrand = null;
    if (isset($_GET['searchResults']))
        $searchResults = $_GET['searchResults'];
    else
        $searchResults  = null;
    // Sử dụng phương thức GET để tìm kiếm thông tin. GET biến inp_MilkName làm stickyForm và dùng phân trang
    if (!isset($_GET['inp_MilkName'])) {
        $inp_MilkName = null;
    } else {
        $inp_MilkName = $_GET['inp_MilkName'];
    }
    //xác định tổng số kết quả bạn muốn trên mỗi trang
    $results_per_page = 2;
    // kiểm tra input đầu vào thiết lập truy vấn
    $querySearch = null;
    if ($inp_MilkName == null)
        $querySearch .= null;
    else
        $querySearch .= " and a.Ten_sua like '%$inp_MilkName%'";
    if ($milkType == "")
        $querySearch .= null;
    else
        $querySearch .= " and c.Ten_loai = '$milkType'";
    if ($milkBrand == "")
        $querySearch .= null;
    else
        $querySearch .= " and b.Ten_hang_sua = '$milkBrand'";
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    //tìm tổng số kết quả được lưu trữ trong cơ sở dữ liệu
    $query = "SELECT a.Ten_sua,a.Hinh, a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,b.Ten_hang_sua 
    FROM sua A inner join hang_sua B on a.Ma_hang_sua = b.Ma_hang_sua inner join loai_sua c on a.Ma_loai_sua = c.Ma_loai_sua 
    WHERE 1 $querySearch";
    $result = mysqli_query($conn, $query);
    $number_of_result = mysqli_num_rows($result);
    if ($number_of_result > 0) {
        $searchResults = "Có $number_of_result được tìm thấy!";
    } else
        $searchResults = "Không tìm thấy sản phẩm này!";
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
    // lấy dữ liệu loại sữa
    $sqlMilkType = "SELECT ten_loai FROM loai_sua";
    $resultMilkType = mysqli_query($conn, $sqlMilkType);
    // lấy dữ liệu hãng sữa
    $sqlMilkBrand = "SELECT ten_hang_sua FROM hang_sua";
    $resultMilkBrand = mysqli_query($conn, $sqlMilkBrand);
    //xác định số bắt đầu sql LIMIT cho các kết quả trên trang hiển thị
    $page_first_result = ($page - 1) * $results_per_page;
    //lấy các kết quả đã chọn từ cơ sở dữ liệu
    $query = "SELECT a.Ten_sua,a.Hinh, a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,b.Ten_hang_sua 
    FROM sua A inner join hang_sua B on a.Ma_hang_sua = b.Ma_hang_sua inner join loai_sua c on a.Ma_loai_sua = c.Ma_loai_sua 
    WHERE 1 $querySearch LIMIT "
        . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $query);
    // 4.Xu ly du lieu tra ve
    // create form 
    echo '
        <form action="" method="get">
        <div id="div_parent">
            <h2 id="title_h2">TÌM KIẾM THÔNG TIN SỮA</h2>
            <div class="row" id="div_select">
                <div class="input-group mb-3" id="div_select_milktype">
                    <label class="input-group-text" for="inputGroupSelect01">Loại sữa</label>
                    <select class="form-select" id="inputGroupSelect01" name="milkType">
                        <option value="">Chọn loại sữa</option>';
    while ($rowMilkType = mysqli_fetch_array($resultMilkType)) {
        $milkTypeName = $rowMilkType['ten_loai'];
        if ($milkTypeName == $milkType)
            echo '<option value="' . ($milkTypeName) . '" selected>' . ($milkTypeName) . '</option>';
        else
            echo '<option value="' . ($milkTypeName) . '">' . ($milkTypeName) . '</option>';
    }
    echo '          </select>
                </div>
                <div class="input-group mb-3" id="div_select_milkbrand">
                    <select class="form-select" id="inputGroupSelect02" name="milkBrand">
                        <option value="">Chọn hãng sữa</option>';
    while ($rowMilkBrand = mysqli_fetch_array($resultMilkBrand)) {
        $milkBrandName = $rowMilkBrand['ten_hang_sua'];
        if ($milkBrandName == $milkBrand)
            echo '<option value="' . ($milkBrandName) . '"selected>' . ($milkBrandName) . '</option>';
        else
            echo '<option value="' . ($milkBrandName) . '">' . ($milkBrandName) . '</option>';
    }
    echo '                
                    </select>
                    <label class="input-group-text" for="inputGroupSelect02">Hãng sữa</label>
                </div>
            </div>
            <hr class="new4">
            <div class="input-group mb-3" id="div_search">
                <input type="text" class="form-control" name="inp_MilkName" value="' . ($inp_MilkName) . '" placeholder="Tìm kiếm tên sữa" aria-label="Tìm kiếm tên sữa" aria-describedby="button-addon2">
                <button class="btn btn btn-outline-success" type="submit" id="button-addon2">Tìm kiếm</button>
            </div>
            <b>' . ($searchResults) . '</b>
        </div>
    </form>
    ';
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