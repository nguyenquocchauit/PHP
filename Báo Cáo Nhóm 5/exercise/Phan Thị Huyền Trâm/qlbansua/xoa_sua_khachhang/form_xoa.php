<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
    or die('Không thể kết nối tới database' . mysqli_connect_error());
$id = $_GET['id'];
// 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
$sql = "SELECT * FROM khach_hang WHERE Ma_khach_hang = '$id' ";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../includes/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Document</title>
    <style>
        table {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-collapse: collapse;
            width: 40%;
            margin: auto;
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

        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body class="body">
<?php include "../../../../includes/header.php"; ?>
    <div>
        <form action="xuly_xoa.php" method="post">
            <table>
                <tr>
                    <td colspan="2">
                        <h3>Thông tin khách hàng</h3>
                    </td>
                </tr>
                <?php while ($row = mysqli_fetch_array($result)) :   ?>
                    <?php
                    $IDKH = $row['Ma_khach_hang'];
                    $Name = $row['Ten_khach_hang'];
                    $Gender = $row['Phai'];
                    $Address = $row['Dia_chi'];
                    $Phone = $row['Dien_thoai'];
                    $Email = $row['Email'];

                    echo "
                    <tr>
                        <td>Mã khách hàng</td>
                        <td><input type='text' name='id' value ='$IDKH'></td>
                    </tr>
                    <tr>
                        <td>Tên khách hàng</td>
                        <td><input type='text' name='name' value ='$Name'></td>
                    </tr>
                    <tr>
                        <td>Giới tính : </td>
                        <td>
                            <input type='text' name='gender' value ='$Gender'>
                        </td>
                    </tr>
                    <tr>
                        <td>Địa Chỉ</td>
                        <td><input type='text' name='add' value ='$Address'></td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><input type='text' name='phone' value ='$Phone'></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type='text' name='email' value =' $Email'></td>
                    </tr>
                    ";
                    ?>
                <?php endwhile; ?>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="delete">Xóa</button>
                        <button><a href="./ds_kh.php">Quay lại</a></button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php include "../../../../includes/footer.php"; ?>
</body>

</html>