<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tìm kiếm</title>
    <style>

    </style>
</head>

<body>
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
</body>

</html>