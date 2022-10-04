<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính dãy số</title>
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
            width: 320px;
            height: 27px;
        }

        .inp_2 {
            background-color: greenyellow;
            color: red;
            width: 150px;
            height: 27px;
        }

        .btn-exec {
            font-size: 23px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            height: 36px;
            width: 183px;
            border-radius: 15px;
            background-color: yellow;
        }

        #title {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            background-color: #00ffd7;
        }

        table {
            background-color: #00ff3e54;
        }
    </style>
</head>

<body>
    <?php
    $sum = null;
    if (isset($_POST['inp']))
        $inp = $_POST['inp'];
    else
        $inp = '';
    if (isset($_POST['Exec'])) {
        $arr = array();
        $arr = explode(",", $inp);
        $sum = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $sum += $arr[$i];
        }
        $fp = fopen('../dulieu_bai2.txt', "w+");
        $data = $inp . "\n" . "Tổng dãy số: $sum";
        fwrite($fp, $data);
        fclose($fp);
    }
    ?>
    <form action="" method="post">
        <table border='0'>
            <tr>
                <td id="title" colspan="2" align="center">NHẬP VÀ TÍNH DÃY SỐ</td>
            </tr>
            <tr>
                <td>Nhập dãy số: </td>
                <td><input class="inp_1" type="text" value="<?php echo $inp ?>" name="inp" required><b>(*)</b></td>
            </tr>
            <tr>
                <td></td>
                <td ><button name="Exec" type="submit" class="btn-exec">Tổng dãy số</button></td>
            </tr>
            <tr>
                <td>Tổng dãy số: </td>
                <td><input class="inp_2" type="text" value="<?php echo $sum ?>" name="otp" disabled></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><b>(*)</b>Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>

</html>