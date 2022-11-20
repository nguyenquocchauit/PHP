<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Quản lý bán sữa</title>
    <style>

        table {
            text-align: center;
            margin: 0 auto;
            /* background-color: #ffe2e2; */
        }

        h5 {
            text-align: center;
            color: #0095ffc2;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }
    </style>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../../../includes/header.php"; ?>
        <?php
        // 1. Ket noi CSDL
        require '../../connectDB.php';
        //include 'xl_hang_sua.php';
        //include '../../4. Xây dựng các lớp xử lý/1. Xây dựng lớp xử lý hãng sữa_xl_hang_sua/xl_hang_sua.php';
        // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
        $sql = "SELECT * FROM hang_sua";
        $result = mysqli_query($conn, $sql);

        // $exec = new HangSua();
        // $exec->setConnect($conn);
        // // funtion all get all data in table
        // $result = $exec->all();
        // // queryByID get data by ID
        // // setParameter ($milkBrandID, $milkBrandName, $address, $phoneNumber, $email)
        // $exec->setParameter('NoParameter','Vinamilk','NoParameter','NoParameter','NoParameter');
        // $result = $exec->queryByID();

        // 4.Xu ly du lieu tra ve
        $checkColor = 1;
        echo "<h5>THÔNG TIN HÀNG SỮA</h5>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>Mã HS</td>";
        echo "<td>Tên hàng sữa</td>";
        echo "<td>Địa chỉ</td>";
        echo "<td>Điện thoại</td>";
        echo "<td>Email</td>";
        echo "</tr>";
        if (mysqli_num_rows($result) != 0)
            while ($row = mysqli_fetch_array($result)) {
                $milkBrandID = $row['Ma_hang_sua'];
                $milkBrandName = $row['Ten_hang_sua'];
                $address = $row['Dia_chi'];
                $phoneNumber = $row['Dien_thoai'];
                $email = $row['Email'];
                echo "<tr>";
                echo "<td>" . $milkBrandID . "</td>";
                echo "<td>" . $milkBrandName . "</td>";
                echo "<td>" . $address . "</td>";
                echo "<td>" . $phoneNumber . "</td>";
                echo "<td>" . $email . "</td>";
                echo "</tr>";
            }
        echo " </table>";
        // 5. Xoa ket qua khoi vung nho va Dong ket noi
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
        <?php include "../../../../../includes/footer.php"; ?>
    </div>

</body>

</html>