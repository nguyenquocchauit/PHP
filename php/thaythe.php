<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay thế vị trí trong mảng</title>
    <style>
        body {
            font-size: 30px;
        }

        td {
            padding: 3px;
        }

        form {
            padding: 200px 560px;
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
            width: 450px;
            height: 27px;
        }

        .inp_2 {
            width: 350px;
            height: 27px;
        }

        .inp_3 {
            width: 350px;
            height: 27px;
        }

        .inp_4 {
            color: red;
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
    if (isset($_POST['replaceX']))
        $replaceX = $_POST['replaceX'];
    else
        $replaceX = '';
    if (isset($_POST['valueX']))
        $valueX = $_POST['valueX'];
    else
        $valueX = '';
    if (isset($_POST['arrOld']))
        $arrOld = $_POST['arrOld'];
    else
        $arrOld = '';
    if (isset($_POST['arrReplace']))
        $arrReplace = $_POST['arrReplace'];
    else
        $arrReplace = '';
    $arr = array();
    if (isset($_POST['Exec'])) {
        if (is_numeric($valueX) && is_numeric($replaceX)) {
            $arr = explode(",", $inp);
            $arrayOld = $arr;
            $findX = Find_X($arr, $replaceX);
            if ($findX == -1)
                $arrayReplace = $arr;
            else {
                $arr[$findX - 1] = $valueX;
                $arrayReplace = $arr;
            }
            $arrOld = implode(" ", $arrayOld);
            $arrReplace = implode(" ", $arrayReplace);
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
        if ($vitri == null)
            return -1;
        else
            return $vitri;
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td id="title" colspan="2" align="center">THAY THẾ</td>
            </tr>
            <tr class="bgtr">
                <td>Nhập các phần tử: </td>
                <td><input class="inp_1" type="text" value="<?php echo $inp ?>" name="inp" required></td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế: </td>
                <td><input class="inp_2" type="text" value="<?php echo $replaceX ?>" name="replaceX" pattern="[0-9]{}" required></td>
            </tr>
            <tr>
                <td>Giá trị thay thế: </td>
                <td><input class="inp_3" type="text" value="<?php echo $valueX ?>" name="valueX" pattern="[0-9]{}" required></td>
            </tr>
            <tr class="bgtr">
                <td></td>
                <td><button name="Exec" type="submit" class="btn-exec">Thay thế</button></td>
            </tr>
            <tr>
                <td>Mảng cũ: </td>
                <td><input class="inp_4" type="text" value="<?php echo $arrOld ?>" name="arrOld" disabled></td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế: </td>
                <td><input class="inp_5" type="text" value="<?php echo $arrReplace ?>" name="arrReplace" disabled></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><b>(Ghi chú:</b> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>

</html>