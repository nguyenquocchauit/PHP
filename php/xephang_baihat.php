<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Xếp hạng bài hát</title>
    <script>
        $(document).ready(function() {
            $('#ExecLevel').click(function() {
                document.getElementById("level").required = false;
                document.getElementById("nameSong").required = false;
            })

        });
    </script>
    <style>
        body {
            font-size: 30px;
        }

        td {
            padding: 3px;
        }

        form {
            padding: 100px 170px;
            display: inline-block;
        }

        input {
            font-size: 25px;
            width: 98%;
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

        textarea {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_POST['nameSong']))
        $nameSong = $_POST['nameSong'];
    else
        $nameSong = '';
    if (isset($_POST['level']))
        $level = $_POST['level'];
    else
        $level = '';
    if (isset($_POST['KetQua']))
        $KetQua = $_POST['KetQua'];
    else
        $KetQua = '';
    $array = array();
    if (isset($_POST['ExecSong'])) {
        $KetQua = "Bài hát:" . $nameSong . " - Hạng: " . $level . "\n" . $KetQua  . "\n";
    }

    if (isset($_POST['ExecLevel'])) {
        $KetQua = $_POST['KetQua'];
        print_r($KetQua);
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td id="title" colspan="2" align="center">XẾP HẠNG BÀI HÁT</td>
            </tr>
            <tr class="bgtr">
                <td>Nhập tên bài hát: </td>
                <td><input class="inp" type="text" value="<?php echo $nameSong ?>" name="nameSong" id="nameSong" required></td>
            </tr>
            <tr>
                <td>Hạng: </td>
                <td><input class="inp" type="text" value="<?php echo $level ?>" name="level" id="level" pattern="[0-9]+" required></td>
            </tr>
            <tr class="bgtr">
                <td></td>
                <td><button name="ExecSong" id="ExecSong" type="submit" class="btn-exec">Thêm bài hát</button><button name="ExecLevel" id="ExecLevel" type="submit" class="btn-exec">Bảng xếp hạng</button></td>
            </tr>
            <tr>
                <td colspan="2"><textarea class="form-control text" name="KetQua" placeholder="Danh sách" rows="10" cols="105"><?php echo $KetQua ?></textarea></td>
            </tr>
        </table>
    </form>
</body>

</html>