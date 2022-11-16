<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        table {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid #dddddd;
            text-align: center;
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

        img {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Không thể kết nối tới database' . mysqli_connect_error());
    // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
    $sql = "SELECT * FROM Khach_hang";
    $result = mysqli_query($conn, $sql);
    // 4.Xu ly du lieu tra ve
    echo "<h3>Thông tin khách hàng</h3>";
    echo "<table>";
    echo "<tr>";
    echo "<td> Mã KH </td>";
    echo "<td> Tên KH </td>";
    echo "<td> Phái </td>";
    echo "<td> Địa Chỉ </td>";
    echo "<td> Điện Thoại</td>";
    echo "<td> Email </td>";
    echo "<td><i class='fa-solid fa-trash-can'></i></td>";
    echo "<td><i class='fa-solid fa-user-pen'></i></td>";
    echo "</tr>";
    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_array($result)) {
            $IDKH = $row['Ma_khach_hang'];
            $Name = $row['Ten_khach_hang'];
            $Gender = $row['Phai'];
            $Address = $row['Dia_chi'];
            $Phone = $row['Dien_thoai'];
            $Email = $row['Email'];

            echo "<tr>";
            echo "<td> $IDKH </td>";
            echo "<td> $Name </td>";
            if ($Gender == 0)
                echo "<td><img src='.././img/female.png' ></td>";
            else
                echo "<td><img src='.././img/male.jpg' ></td>";
            echo "<td> $Address </td>";
            echo "<td> $Phone  </td>";
            echo "<td> $Email </td>";
            echo "<td><a href='./form_xoa.php?id=$IDKH'>Xóa</a></td>";
            echo "<td><a href='./form_sua.php?id=$IDKH'>Sửa</a></td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    // 5. Xoa ket qua khoi vung nho va Dong ket noi
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>

</html>