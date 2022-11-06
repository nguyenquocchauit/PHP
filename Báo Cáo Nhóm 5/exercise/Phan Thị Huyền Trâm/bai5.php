<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mảng phát sinh tính toán</title>
    <style>
        form {
            border: 1px solid black;
            width: 500px;
            height: 300px;
            background-color: lightpink;
            font-family: 'Times New Roman', Times, serif;
        }

        .inputnam {
            width: 220px;
        }

        h3 {
            background-color: lightcoral;
        }
    </style>
</head>

<body>
    <?php
    $arr = array();
    $kq = "";
    $max = "";
    $min = "";
    $tong = "";
    function Taomang($n)
    {
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = rand(0, 20);
        }
        return $arr;
    }
    function Xuatmang($arr)
    {
        $n = count($arr);
        $str = "";
        for ($i = 0; $i < $n; $i++) {
            $str = implode(" ", $arr);
        }
        return $str;
    }

    function Timmax($arr)
    {
        $n = count($arr);
        $max = $arr[0];
        for ($i = 0; $i < $n; $i++) {
            if ($arr[$i] > $max)
                $max = $arr[$i];
        }
        return $max;
    }

    function Timmin($arr)
    {
        $n = count($arr);
        $min = $arr[0];
        for ($i = 0; $i < $n; $i++) {
            if ($arr[$i] < $min)
                $min = $arr[$i];
        }
        return $min;
    }

    function Tong($mang)
    {
        $n = count($mang);
        $tong = 0;
        for ($i = 0; $i < $n; $i++) {
            $tong += $mang[$i];
        }
        return $tong;
    }

    if (isset($_POST['n'])) {
        $n = $_POST['n'];
        $arr = Taomang($n);
        $kq = Xuatmang($arr);
        $max = Timmax($arr);
        $min = Timmin($arr);
        $tong = Tong($arr);
    } else $n = "";

    ?>
    <form action="" method="post">
        <table>
            <tr>
                <th colspan="3" align="center">
                    <h3>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h3>
                </th>
            </tr>
            <tr>
                <td>Nhập số phần tử:</td>
                <td><input type="text" name="n" value="<?php echo $n; ?>" size="20" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnTinh" value="Phát sinh và tính toán" /></td>
            </tr>
            <tr>
                <td>Mảng:</td>
                <td><input type="text" name="mang" disabled="disabled" value="<?php echo $kq; ?>" size="45" /></td>
            </tr>
            <tr>
                <td>GTLN(MAX) trong mảng:</td>
                <td><input type="text" name="max" disabled="disabled" value="<?php echo $max; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>GTNN(MIN) trong mảng:</td>
                <td><input type="text" name="min" disabled="disabled" value="<?php echo $min; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Tổng mảng:</td>
                <td><input type="text" name="tong" disabled="disabled" value="<?php echo $tong; ?>" size="20" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</label></td>
            </tr>
        </table>
    </form>
</body>

</html>