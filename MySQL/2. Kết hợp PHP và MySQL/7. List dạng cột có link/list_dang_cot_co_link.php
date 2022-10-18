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
            text-align: center;
            margin: 0 auto;
            width: 1800px;
        }

        #title {
            background-color: #ffa50029;
            color: orange;
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

        #table_child {
            width: 20%;
            box-shadow: 9px 9px 10px #fef1dc;
        }

        a:link {
            text-decoration: none;
        }

        a:hover {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $query = "SELECT A.Ma_sua, A.Hinh,A.Ten_sua,B.Ten_hang_sua,C.Ten_loai,A.Trong_luong,A.Don_gia 
    FROM sua A inner join hang_sua B on A.Ma_hang_sua = B.Ma_hang_sua inner join loai_sua C on C.Ma_loai_sua = A.Ma_loai_sua;";
    $result = mysqli_query($conn, $query);
    // get file name local
    $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    // 4.Xu ly du lieu tra ve
    echo "
    <table class='table table-bordered' id='table'>
    <thead>
        <tr>
            <th scope='col' colspan='5' id='title'>THÔNG TIN CÁC SẢN PHẨM</th>
        </tr>
    </thead>
    <tbody>";
    $countCol = 5;
    $addTag = null;
    $addCloseTag = null;
    if (mysqli_num_rows($result) != 0)
        while ($row = mysqli_fetch_array($result)) {

            if ($countCol % 5 == 0)
                $addTag = '<tr style="width: 100%;">';
            else
                $addTag = null;
            $milkID = $row['Ma_sua'];
            $pathImg = $row['Hinh'];
            $milkName =  $row['Ten_sua'];
            $weight = $row['Trong_luong'];
            $price = number_format($row['Don_gia']);
            echo "$addTag";
            echo "
            <td id='table_child'>
                <table class='table' >
                    <tbody>
                        <tr>
                            <td><a class='' href ='trang_list_chi_tiet.php?Ma_sua=" . $milkID . "'><b>$milkName</b></a></td>
                        </tr>
                        <tr>
                            <td>$weight gr - $price VNĐ </td>
                        </tr>
                    </tbody>
                </table>
                <img src='../../../images/Hinh_sua/$pathImg' alt='anh'>
            </td>";
            $countCol++;
            if ($countCol % 5 == 0)
                $addCloseTag = '</tr>';
            else
                $addCloseTag = null;
            echo "
            $addCloseTag";
        }
    echo "
        </tbody>
    </table>";
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>

</html>