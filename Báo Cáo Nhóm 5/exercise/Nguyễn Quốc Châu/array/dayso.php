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

    <title>Tính dãy số</title>
    <style>
        table {
            width: 100%;
            margin: 0 auto;
            background-color: #00ff3e54;
        }

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
    </style>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../includes/header.php"; ?>
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
            $fp = fopen('../../dulieu_bai2.txt', "w+");
            $data = $inp . "\n" . "Tổng dãy số: $sum";
            fwrite($fp, $data);
            fclose($fp);
        }
        ?>
        <div class="form">
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
                        <td><button name="Exec" type="submit" class="btn-exec">Tổng dãy số</button></td>
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
        </div>
        <?php include "../../../includes/footer.php"; ?>
    </div>
</body>

</html>