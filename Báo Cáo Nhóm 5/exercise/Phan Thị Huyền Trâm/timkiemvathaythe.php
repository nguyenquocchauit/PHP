<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../includes/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Tìm kiếm</title>
    <style>

    </style>
</head>

<body>
<?php include "../../includes/header.php"; ?>
    <?php
    function thaythe($mang, $cu, $moi)
    {
        for ($i = 0; $i < count($mang); $i++) {
            if ($mang[$i] == $cu) {
                $mang[$i] = $moi;
            }
        }
        return $mang;
    }
    $mang = "";
    $mangcu = "";
    $mangmoi = "";
    $str = "";
    if (isset($_POST['cu'])) {
        $cu = $_POST['cu'];
    }
    if (isset($_POST['moi'])) {
        $moi = $_POST['moi'];
    }
    if (isset($_POST['xuly'])) {
        $str = $_POST['mang'];
        $mang = explode(",", $str);
        $mangcu = implode(",", $mang);
        $mangmoi = implode(",", thaythe($mang, $cu, $moi));
    }
    ?>
    <form action="" method="post">
        <table border="0" cellpadding="0">
            <th colspan="2">
                <h2>TÌM KIẾM VÀ THAY THẾ</h2>
            </th>
            <tr>
                <td>Nhập các phần tử:</td>
                <td><input type="text" name="mang" size="70" value="<?php echo $str; ?> " /></td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế:</td>
                <td><input type="text" name="cu" size="20" value="<?php if (isset($_POST['cu'])) echo $_POST['cu']; ?> " /></td>
            </tr>
            <tr>
                <td>Giá trị thay thế:</td>
                <td><input type="text" name="moi" size="20" value="<?php if (isset($_POST['moi'])) echo $_POST['moi']; ?> " /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="xuly" size="20" value="Thay thế " /></td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td><input type="text" name="mangcu" size="70" disabled="disabled" value="<?php echo $mangcu; ?> " /></td>
            </tr>
            <td>Mảng sau khi thay thế:</td>
            <td><input type="text" name="mangmoi" size="70" disabled="disabled" value="<?php echo $mangmoi; ?> " /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
            </tr>
        </table>
    </form>
    <?php include "../../includes/footer.php"; ?>

</body>

</html>