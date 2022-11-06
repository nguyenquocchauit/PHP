<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <style>
        table {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-collapse: collapse;
            width:500px;
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
        img{
            width: 100px;
            height: 100px;
        }
       
    </style>
    -->
    <style>
        .main {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            width: 1000px;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
        }
        .main div {
            width: 19%;
            border: 1px solid black ;
            text-align: center;
        }

        img {
            width: 100px;
            height: 100px;
        }
        h1{
            text-align: center; 
            border: 1px solid black;
            width: 960px;
            margin: auto;
            position: relative;
            right: 20px;
            color: red;
            background-color: lightpink;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Không thể kết nối tới database' . mysqli_connect_error());
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $sql = "SELECT Ten_sua,Trong_luong, Don_gia ,Hinh FROM sua ";
    $result = mysqli_query($conn, $sql);
    // 4.Xu ly du lieu tra ve
    echo "<h1>Thông tin sản phẩm</h1>";
    echo " <div class='main'>";
   
    if (mysqli_num_rows($result) != 0) 
    {
        while ($row = mysqli_fetch_array($result)) 
        {
            $Name = $row['Ten_sua'];
            $TrongLuong = $row['Trong_luong'];
            $DonGia = $row['Don_gia'];
            $Hinh = $row['Hinh'];
            $file = "img/$Hinh";
            if (!(file_exists($file)))
                $Hinh = 'loi.jpg';
            echo "
                <div>
                    <p>$Name</p>
                    <p>$TrongLuong - $DonGia</p>
                    <p><img src='img/$Hinh' onError='this.src='./img/loi.jpg'' '></p>
                </div>
            ";
        }
    }
    echo "</div>";
    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>


</body>

</html>