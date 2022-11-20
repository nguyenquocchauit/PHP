<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Mảng</title>

</head>

<body>
    <?php include "../../../includes/header.php"; ?>
    <?php
    function tim_kiem($arr, $so)
    {
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == $so) {
                return $i;
            }
        }
        return -1;
    }
    $str = "";
    $str_kq = "";
    $ketqua = "";
    $tongam = "";
    if (isset($_POST['so'])) {
        $so = $_POST['so'];
    }
    if (isset($_POST['so']) && isset($_POST['tinh'])) {
        $str = $_POST['mang'];
        $arr = explode(",", $str);
        $str_kq = implode(",", $arr);
        $vitri = tim_kiem($arr, $so);
        if ($vitri != -1) {
            $ketqua = "Tìm thấy " . $so . " tại vị trí thứ " . $vitri . " của mảng.";
        } else {
            $ketqua = "Không tìm thấy " . $so . " trong mảng.";
        }
    }
    ?>
    <form action="" method="post">
        <table border="0" cellpadding="0">
            <th colspan="2">
                <h2>TÌM KIẾM</h2>
            </th>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type="text" name="mang" size="70" value="<?php echo $str; ?> " /></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm:</td>
                <td><input type="text" name="so" size="20" value="<?php if (isset($_POST['so'])) echo $_POST['so']; ?> " /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tinh" size="20" value="   Tìm kiếm  " /></td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo $str_kq; ?> " /></td>
            </tr>
            <td>Kết quả tìm kiếm:</td>
            <td><input type="text" name="kq" size="70" disabled="disabled" value="<?php echo $ketqua; ?> " /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
            </tr>
        </table>
    </form>
    <?php include "../../../includes/footer.php"; ?>
</body>

</html>