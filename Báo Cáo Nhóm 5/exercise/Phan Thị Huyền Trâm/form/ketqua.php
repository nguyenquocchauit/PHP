<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../includes/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Kết quả phép tính </title>
    <link rel="stylesheet" href="pheptinh.css">
</head>

<body>
<?php include "../../../includes/header.php"; ?>
    <?php
    $pt =  $_POST["radiobtn"];
    $a = $_POST["so1"];
    $b = $_POST["so2"];

    if ($pt == "Cộng") {
        $ketqua = $a + $b;
    } elseif ($pt == "Trừ") {
        $ketqua = $a - $b;
    } elseif ($pt == "Nhân") {
        $ketqua = $a * $b;
    } elseif ($pt == "Chia") {
        $ketqua = $a / $b;
    }
    ?>
    <form action="" method="post">
        <h2>Phép tính trên hai số</h2>
        <table>
            <tr>
                <td>Chọn phép tính :</td>
                <td>
                    <?php echo $_POST["radiobtn"] ?>
                </td>
            </tr>
            <td>Số thứ nhất : </td>
            <td><input type="text" name="so1" value="<?php echo $_POST["so1"]; ?> " /></td>
            </tr>
            <tr>
                <td>Số thứ hai : </td>
                <td><input type="text" name="so2" value="<?php echo $_POST["so2"]; ?> " /></td>
            </tr>
            <tr>
                <td>Kết quả: </td>
                <td><input type="text" name="ketqua" value="<?php echo $ketqua; ?> " disabled="disabled" /></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
            </tr>
        </table>
    </form>
    <?php include "../../../includes/footer.php"; ?>

</body>

</html>