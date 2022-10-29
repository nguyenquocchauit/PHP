<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            table, th, td {
                border:1px solid black;
                text-align: center;
                margin-left: 300px;
            }
            h3{
                color: blue;
                text-align: center;
                text-transform: uppercase;
            }
    </style>
</head>
<body>
    <?php
        // 1. Ket noi CSDL
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die ('Không thể kết nối tới database'. mysqli_connect_error());
        // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
        $sql = "SELECT * FROM Khach_hang";
        $result = mysqli_query($conn, $sql);
        // 4.Xu ly du lieu tra ve
        echo "<h3>Thông tin khách hàng</h3>";
        echo "<table>";
            echo "<tr>";
                echo "<td> Mã KH </td>";
                echo "<td> Tên KH </td>";
                echo "<td> Địa Chỉ </td>";
                echo "<td> Điện Thoại</td>";
                echo "<td> Email </td>";
            echo "</tr>";
            if(mysqli_num_rows($result)!=0)
            {
                while ($row = mysqli_fetch_array($result))
                { 
                    $IDKH = $row['Ma_khach_hang'];
                    $Name = $row['Ten_khach_hang'];
                    $Address = $row['Dia_chi'];
                    $Phone = $row['Dien_thoai'];
                    $Email = $row['Email'];

            echo "<tr>";
                echo "<td> $IDKH </td>";
                echo "<td> $Name </td>";
                echo "<td> $Address </td>";
                echo "<td> $Phone  </td>";
                echo "<td> $Email </td>";
            echo "</tr>";
        }
    }
        echo "</table>" ;
       
        // 5. Xoa ket qua khoi vung nho va Dong ket noi
        mysqli_free_result($result);
        mysqli_close($conn);
    ?>
</body>
</html>

