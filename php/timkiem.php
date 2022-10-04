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
            background-color: #ff00005e;
            width: 482px;
            height: 27px;
        }

        .inp_3 {
            background-color: #ff00005e;
            width: 350px;
            height: 27px;
        }

        .inp_4 {
            background-color: #ff00005e;
            width: 350px;
            height: 27px;
        }

        .inp_5 {
            background-color: #ff00005e;
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
    <?php ?>
    <form action="" method="post">
        <table>
            <tr border='1'>
                <td id="title" colspan="2" align="center">TÌM KIẾM</td>
            </tr>
            <tr class="bgtr" border='1'>
                <td>Nhập mảng: </td>
                <td><input class="inp_1" type="text" value="<?php echo $inp ?>" pattern="[1-9]{}" name="inp" required></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm: </td>
                <td><input class="inp_2" type="text" value="<?php echo $mang ?>" name="mang" disabled></td>
            </tr>
            <tr class="bgtr" border='1'>
                <td></td>
                <td><button name="Exec" type="submit" class="btn-exec">Tổng dãy số</button></td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><input class="inp_3" type="text" value="<?php echo $max ?>" name="max" disabled></td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm: </td>
                <td><input class="inp_5" type="text" value="<?php echo $sum ?>" name="sum" disabled></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><b>(Ghi chú: </b>Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
            </tr>
        </table>
    </form>
</body>

</html>