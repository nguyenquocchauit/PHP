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

    <title>Sắp xếp mảng</title>
    <style>
        td {
            padding: 3px;
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
            background-color: palegreen;
        }

        .inp_3 {
            width: 350px;
            height: 27px;
            background-color: palegreen;
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

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../includes/header.php"; ?>
        <?php
        if (isset($_POST['inp']))
            $inp = $_POST['inp'];
        else
            $inp = '';
        if (isset($_POST['tangDan']))
            $tangDan = $_POST['tangDan'];
        else
            $tangDan = '';
        if (isset($_POST['giamDan']))
            $giamDan = $_POST['giamDan'];
        else
            $giamDan = '';
        $arr = array();
        if (isset($_POST['Exec'])) {
            $arr = explode(",", $inp);
            // sort($arr);
            // $tangDan = implode(",", $arr);
            // rsort($arr);
            // $giamDan = implode(",", $arr);
            $tang = implode(" ", SapXep_Tang($arr));
            $giam = implode(" ", SapXep_Giam($arr));
            $fp = fopen('../dulieu_bai6.txt', 'w+');
            $data =  $inp . "\n" . $tang . "\n" . $giam . "\n";
            fwrite($fp, $data);
            fclose($fp);

            $readFile = fopen('../../dulieu_bai6.txt', "r") or die("File $fp not found !!");
            $temp = fgets($readFile);
            $tangDan = fgets($readFile);
            $giamDan = fgets($readFile);
            fclose($readFile);
        }
        function SapXep_Giam($arr)
        {
            for ($i = 0; $i < count($arr) - 1; $i++)
                for ($j = $i + 1; $j < count($arr); $j++) {
                    if ($arr[$i] < $arr[$j]) {
                        Hoan_Vi($arr[$j], $arr[$i]);
                    }
                }
            return $arr;
        }
        function SapXep_Tang($arr)
        {
            for ($i = 0; $i < count($arr) - 1; $i++)
                for ($j = $i + 1; $j < count($arr); $j++) {
                    if ($arr[$i] > $arr[$j]) {
                        Hoan_Vi($arr[$i], $arr[$j]);
                    }
                }
            return $arr;
        }
        function Hoan_Vi(&$a, &$b)
        {
            $tmp = $a;
            $a = $b;
            $b = $tmp;
        }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td id="title" colspan="2" align="center">SẮP XẾP MẢNG</td>
                </tr>
                <tr class="bgtr">
                    <td>Nhập mảng: </td>
                    <td><input class="inp_1" type="text" value="<?php echo $inp ?>" name="inp" required><b>(*)</b></td>
                </tr>
                <tr class="bgtr">
                    <td></td>
                    <td><button name="Exec" type="submit" class="btn-exec">Sắp xếp tăng/giảm</button></td>
                </tr>
                <tr>
                    <td><b>Sau khi sắp xếp</b></td>
                </tr>
                <tr>
                    <td>Tăng dần: </td>
                    <td><input class="inp_2" type="text" value="<?php echo $tangDan ?>" name="tangDan" disabled></td>
                </tr>
                <tr>
                    <td>Giảm dần: </td>
                    <td><input class="inp_3" type="text" value="<?php echo $giamDan ?>" name="giamDan" disabled></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><b>(*)</b>Các số được nhập các nhau bằng dấu ","</td>
                </tr>
            </table>
        </form>
        <?php include "../../../includes/footer.php"; ?>
    </div>
</body>

</html>