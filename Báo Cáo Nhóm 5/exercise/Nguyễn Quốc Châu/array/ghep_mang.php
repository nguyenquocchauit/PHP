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

    <title>Đếm phần tử, ghép mảng và sắp xếp</title>
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
        // initialize sticky form
        if (isset($_POST['inpA']))
            $inpA = $_POST['inpA'];
        else
            $inpA = null;
        if (isset($_POST['inpB']))
            $inpB = $_POST['inpB'];
        else
            $inpB = null;
        if (isset($_POST['countA']))
            $countA = $_POST['countA'];
        else
            $countA = null;
        if (isset($_POST['countB']))
            $countB = $_POST['countB'];
        else
            $countB = null;
        if (isset($_POST['arrC']))
            $arrC = $_POST['arrC'];
        else
            $arrC = null;
        if (isset($_POST['tangDan']))
            $tangDan = $_POST['tangDan'];
        else
            $tangDan = null;
        if (isset($_POST['giamDan']))
            $giamDan = $_POST['giamDan'];
        else
            $giamDan = null;
        // execute form
        if (isset($_POST['Exec'])) {
            $arrA = array();
            $arrB = array();
            $arrA = explode(",", $inpA);
            $arrB = explode(",", $inpB);
            $countA = count($arrA);
            $countB = count($arrB);
            $arrC = implode(",", array_merge($arrA, $arrB));
            $tmpTD_C = explode(",", $arrC);
            sort($tmpTD_C);
            $tangDan = implode(",", $tmpTD_C);
            $tmpGD_C = explode(",", $arrC);
            rsort($tmpGD_C);
            $giamDan = implode(",", $tmpGD_C);
        }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td id="title" colspan="2" align="center">ĐẾM PHẦN TỬ, GHÉP MẢNG VÀ SẮP XẾP</td>
                </tr>
                <tr class="bgtr">
                    <td>Mảng A: </td>
                    <td><input class="inp_1" type="text" value="<?php echo $inpA ?>" name="inpA" required></td>
                </tr>
                <tr class="bgtr">
                    <td>Mảng B: </td>
                    <td><input class="inp_1" type="text" value="<?php echo $inpB ?>" name="inpB" required></td>
                </tr>
                <tr class="bgtr">
                    <td></td>
                    <td><button name="Exec" type="submit" class="btn-exec">Thực hiện</button></td>
                </tr>
                <tr>
                    <td>Số phần tử mảng A: </td>
                    <td><input class="inp_2" type="text" value="<?php echo $countA ?>" name="countA" disabled></td>
                </tr>
                <tr>
                    <td>Số phần tử mảng B: </td>
                    <td><input class="inp_3" type="text" value="<?php echo $countB ?>" name="countB" id="countB" disabled></td>
                </tr>
                <tr>
                    <td>Mảng C: </td>
                    <td><input class="inp_2" type="text" value="<?php echo $arrC ?>" name="arrC" disabled></td>
                </tr>
                <tr>
                    <td>Mảng C tăng dần: </td>
                    <td><input class="inp_3" type="text" value="<?php echo $tangDan ?>" name="tangDan" disabled></td>
                </tr>
                <tr>
                    <td>Mảng C giảm dần: </td>
                    <td><input class="inp_3" type="text" value="<?php echo $giamDan ?>" name="giamDan" disabled></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><b>(Ghi chú:</b> Các phần tử trong mảng sẽ có cách nhau bằng dấu ",")</td>
                </tr>
            </table>
        </form>
        <?php include "../../../includes/footer.php"; ?>
    </div>
</body>

</html>