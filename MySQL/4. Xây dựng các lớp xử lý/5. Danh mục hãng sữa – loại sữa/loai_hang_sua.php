<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>Danh mục hãng sữa – loại sữa</title>
    <style>
        * {
            font-size: 20px;
        }

        .ul {
            padding-top: 50px;
            margin: 0 auto;
            width: 350px;
            text-align: center;
        }
        .ul>li{
            border-radius: 5px;
        }
        .ul>.active {
            font-size: 25px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            background-color: #fd0d3eb8;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    // thêm file class hãng và loại sữa
    include "../1. Xây dựng lớp xử lý hãng sữa_xl_hang_sua/xl_hang_sua.php";
    include "../2. Xây dựng lớp xử lý hãng sữa_xl_loai_sua/xl_loai_sua.php";
    $hangSua = new HangSua();
    $hangSua->setConnect($conn);
    $loaiSua = new LoaiSua();
    $loaiSua->setConnect($conn);
    $resultHangSua = $hangSua->all();
    $resultLoaiSua = $loaiSua->all();
    echo '<ul class="list-group ul">
            <li class="list-group-item active" aria-current="true">Danh mục hãng sữa</li>
    ';
    if (mysqli_num_rows($resultHangSua) != 0) {
        while ($row = mysqli_fetch_array($resultHangSua)) {
            echo '<li class="list-group-item list-group-item-info">' . ($row['Ten_hang_sua']) . '</li>';
        }
    }
    echo '</ul>';
    echo '<ul class="list-group ul">
            <li class="list-group-item active" aria-current="true">Danh mục loại sữa</li>
    ';
    if (mysqli_num_rows($resultLoaiSua) != 0) {
        while ($row = mysqli_fetch_array($resultLoaiSua)) {
            echo '<li class="list-group-item list-group-item-info">' . ($row['Ten_loai']) . '</li>';
        }
    }
    echo ' </ul>';
    ?>
</body>

</html>