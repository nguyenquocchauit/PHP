<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm trong mảng</title>
    <style>
        body {
            font-size: 30px;
        }

        td {
            padding: 3px;
        }

        form {
            display: inline-block;
        }

        b {
            color: red;
        }

        input {
            font-size: 25px;
        }

        .inp_1 {
            font-size: 25px;
            width: 380px;
            height: 27px;
        }

        .inp_2 {
            width: 482px;
            height: 27px;
        }

        .inp_3 {
            width: 350px;
            height: 27px;
        }

        .inp_4 {
            width: 350px;
            height: 27px;
        }

        .inp_5 {
            color: red;
            width: 350px;
            height: 27px;
        }

        .btn-exec {
            font-size: 23px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            height: 40px;
            width: 280px;
            border-radius: 15px;
            background-color: yellow;
        }

        #title {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            background-color: #b02789b8;
        }

        .bgtr {
            background-color: pink;
        }

        table {
            width: 100%;
            border: 1px solid;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['inp']))
        $inp = $_POST['inp'];
    else
        $inp = '';
    if (isset($_POST['findX']))
        $findX = $_POST['findX'];
    else
        $findX = '';
    if (isset($_POST['mang']))
        $mang = $_POST['mang'];
    else
        $mang = '';
    if (isset($_POST['ketqua']))
        $ketqua = $_POST['ketqua'];
    else
        $ketqua = '';
    $arr = array();
    if (isset($_POST['Exec'])) {
        if (is_numeric($findX)) {
            $arr = explode(",",$inp);
            $mang = $inp;
            $ketqua .="Tìm thấy số $findX tại vị trí thứ ".Find_X($arr,$findX)." của mảng";
        }
    }
    function Find_X($array, $x)
    {
        $vitri = null;
        for ($i = 0; $i < count($array); $i++) {
            if ($x == $array[$i]) {
                $vitri = $i + 1;
            }
        }
        return $vitri;
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td id="title" colspan="2" align="center">TÌM KIẾM</td>
            </tr>
            <tr class="bgtr">
                <td>Nhập mảng: </td>
                <td><input class="inp_1" type="text" value="<?php echo $inp ?>" name="inp" required></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm: </td>
                <td><input class="inp_2" type="text" value="<?php echo $findX ?>" name="findX" pattern="[0-9]{}" required></td>
            </tr>
            <tr class="bgtr">
                <td></td>
                <td><button name="Exec" type="submit" class="btn-exec">Tìm kiếm</button></td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><input class="inp_3" type="text" value="<?php echo $mang ?>" name="mang" disabled></td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm: </td>
                <td><input class="inp_5" type="text" value="<?php echo $ketqua ?>" name="ketqua" disabled></td>
            </tr>
            <tr>
                <td colspan="2" align="center">(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>

</html>