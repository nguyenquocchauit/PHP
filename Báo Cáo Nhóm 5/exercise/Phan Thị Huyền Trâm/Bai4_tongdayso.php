<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

</head>

<body>
    <?php include "../../includes/header.php"; ?>

    <?php
    $fp = @fopen("Bai4.txt", "w+");
    if (!$fp) {
        echo 'Mở file không thành công';
    } else {
        function tongdayso($arr)
        {
            $S = 0;
            $n = count($arr);
            for ($i = 0; $i < $n; $i++) {
                $S = $S + $arr[$i];
            }
            return $S;
        }
        $str = "";
        $tong = "";
        if (isset($_POST['tinh'])) {
            $str = $_POST['mang'];
            fwrite($fp, $str);
            $arr = explode(",", $str);
            $tong = tongdayso($arr);
        }
    }
    fclose($fp);
    ?>
    <form action="" method="post">
        <table>
            <thead>
                <th colspan="2" align="center">
                    <h3>Nhập và tính trên dãy số</h3>
                </th>
            </thead>
            <tr>
                <td>Nhập dãy số:</td>
                <td>
                    <input type="text" name="mang" value="<?php echo $str; ?>"> (*)
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tổng dãy số" name="tinh">
                </td>
            </tr>
            <tr>
                <td>Tổng dãy số:</td>
                <td>
                    <input type="text" style="background: lightgreen;" disabled name="ketqua" value="<?php echo $tong; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><label>(Các số được nhập cách nhau bằng dấu ",")</label></td>
            </tr>
        </table>
    </form>
    <?php include "../../includes/footer.php"; ?>
</body>

</html>