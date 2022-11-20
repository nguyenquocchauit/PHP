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

    <title> BÀI FORM PHÉP TÍNH</title>
    <link rel="stylesheet" href="pheptinh.css">
</head>

<body>
    <?php include "../../../includes/header.php"; ?>
    <?php
    if (isset($_POST['so1']))
        $so1 = trim($_POST['so1']);
    else $so1 = 0;
    if (isset($_POST['so2']))
        $so2 = trim($_POST['so2']);
    else $so2 = 0;
    if (isset($_POST['tinh']))
        if (!is_numeric($so1) && !is_numeric($so2)) {
            echo "<font color='red'>Vui lòng nhập vào số! </font>";
        }
    ?>
    <form action="../formpheptinh/ketqua.php" method="post">
        <h2>Phép tính trên hai số</h2>
        <table>
            <tr>
                <td>Chọn phép tính :</td>
                <td>
                    <input type="radio" id="" value="Cộng" name="radiobtn" checked>Cộng
                    <input type="radio" id="" value="Trừ" name="radiobtn">Trừ
                    <input type="radio" id="" value="Nhân" name="radiobtn">Nhân
                    <input type="radio" id="" value="Chia" name="radiobtn">Chia
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất : </td>
                <td><input type="text" pattern="[0-9]+" name="so1" require value="<?php echo $so1; ?> " /></td>
            </tr>
            <tr>
                <td>Số thứ hai : </td>
                <td><input type="text" pattern="[0-9]+" name="so2" require value="<?php echo $so2; ?> " /></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
    <?php include "../../../includes/footer.php"; ?>
</body>

</html>