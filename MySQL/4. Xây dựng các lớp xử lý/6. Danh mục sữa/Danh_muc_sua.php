<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sữa</title>
    <style>
        * {
            font-size: 23px;
        }

        table {
            margin: 0 auto;
            width: 100%;
            text-align: center;
        }

        #title_col {
            background-color: #ff222269;
            text-align: center;
            color: #3f00ff;
        }

        #title_col>th {
            font-size: 31px;
        }

        img {
            width: 80px;
            height: 83px;
        }

        .imgavt {
            display: flex;
            justify-content: center;
        }

        #title {
            color: orange;
            background-color: crimson;
            text-align: center;
            font-size: 35px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }
    </style>
</head>

<body>
    <table class="table table-bordered" border="1">
        <thead>
            <tr>
                <th scope="col" colspan="6" id="title">THÔNG TIN SỮA</th>
            </tr>
            <tr id="title_col">
                <th scope="col">Hình</th>
                <th scope="col">Tên sữa</th>
                <th scope="col">Trọng lượng (gr)</th>
                <th scope="col">Đơn giá (VNĐ)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // 1. Ket noi CSDL
            require '../../connectDB.php';
            // thêm file class hãng và loại sữa
            include "../3.Xây dựng lớp xử lý sữa_xl_sua/xl_sua.php";
            $sua = new Sua();
            $sua->setConnect($conn);
            $result = $sua->all();
            if (mysqli_num_rows($result) != 0)
                while ($row = mysqli_fetch_array($result)) {
                    $pathImg = $row['Hinh'];
                    $milkName = $row['Ten_sua'];
                    $weight = $row['Trong_luong'];
                    $price = number_format($row['Don_gia']);
                    echo '
                    <tr>
                        <td><img  src="../../../images/Hinh_sua/' . ($pathImg) . '" alt=""></td>
                        <td>' . ($milkName) . '</td>
                        <td>' . ($weight) . '</td>
                        <td>' . ($price) . '</td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</body>

</html>