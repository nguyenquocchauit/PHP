<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            border: 1px solid black;
            width: 400px;
            height: 180px;
            text-align: center;
            background-color: lightpink;
            font-family: 'Times New Roman', Times, serif;
        }

        h3 {
            background-color: lightcoral;
        }
    </style>
</head>

<body>
    <?php
    function Tinhtong($arr)
    {
        $tong = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $tong += $arr[$i];
        }
        return $tong;
    }
    $arr = array();
    $str = "";
    $str_kq = "";
    $tong = "";
    if (isset($_POST['tinh'])) {
        $str = $_POST['arr'];
        $arr = explode(",", $str);
        $str_kq = implode(",", $arr);
        $tong = Tinhtong($arr);
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <th colspan="3" align="center">
                    <h3>TÍNH TỔNG DÃY SỐ NHẬP VÀO</h3>
                </th>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td><input type="text" name="arr" value="<?php echo $str_kq; ?>" size="20" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tinh" value="Tính tổng " /></td>
            </tr>
            <tr>
                <td>Tổng dãy số :</td>
                <td><input type="text" name="tong" disabled="disabled" value="<?php echo $tong; ?>" size="20" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><label>(Các phần tử trong mảng được ngăn cách bởi dấu phẩy)</label></td>
            </tr>
        </table>
    </form>
</body>

</html>