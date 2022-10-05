<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Quản lý nhân viên</title>
    <style>
        body {
            font-size: 30px;
        }

        td {
            padding: 5px;
        }

        form {
            display: inline-block;
        }

        table {
            border: 2px solid;
        }

        input {
            height: 30px;
        }

        #inpName {
            width: 350px;
        }

        #inpBirthday {
            width: 250px;
        }

        #inpDateWork {
            width: 250px;
        }

        .inpExec {
            width: 250px;
        }

        #title {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            background-color: #b02789b8;
        }

        .btn-exec {
            font-size: 23px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            height: 40px;
            width: 280px;
            border-radius: 15px;
            background-color: yellow;
        }

        .bgtr {
            background-color: #adff2f24;
        }

        .inpRadio {
            width: 35px;
        }
    </style>
</head>

<body>
    <?php

    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td id="title" colspan="4" align="center">QUẢN LÝ NHÂN VIÊN</td>
            </tr>
            <tr class="bgtr">
                <td>Họ và tên: </td>
                <td><input type="text" value="" name="Name" id="inpName" pattern="^(?:((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-.\s])){1,}(['’,\-\.]){0,1}){2,}(([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-. ]))*(([ ]+){0,1}(((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){1,})(['’\-,\.]){0,1}){2,}((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){2,})?)*)$" title="Vui lòng nhập đúng tên thật!" required></td>
                <td>Số con: </td>
                <td><input type="text" value="" pattern="[0-9]+"required></td>
            </tr>
            <tr class="bgtr">
                <td>Ngày sinh: </td>
                <td><input type="text" value="" name="Birthday" id="inpBirthday" required></td>
                <td>Ngày vào làm</td>
                <td><input type="text" value="" name="DateWork" id="inpDateWork"required></td>
            </tr>
            <tr class="bgtr">
                <td>Giới tính: </td>
                <td><input class="inpRadio" type="radio" name="" id=""required>Nam<input class="inpRadio" type="radio" name="" id=""required>Nữ</td>
                <td>Hệ số lương:</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr class="bgtr">
                <td>Loại nhân viên: </td>
                <td><input class="inpRadio" type="radio" name="Gender" value="Văn phòng" id=""required>Văn phòng</td>
                <td><input class="inpRadio" type="radio" name="Gender" value="Sản xuất" id=""required>Sản xuất</td>
                <td></td>
            </tr>
            <tr class="bgtr">
                <td></td>
                <td>Số ngày vắng: <input type="text" value="" name="Absent" id="Absent" pattern="[0-9]+" requiredrequired></td>
                <td>Số sản phẩm: </td>
                <td><input ype="text" value="" name="Product" id="Product" pattern="[0-9]+" required></td>
            </tr>
            <tr">
                <td colspan="4" align="center"></button><button name="Exec" id="Exec" type="submit" class="btn-exec">Tính lương</button></button></td>
                </tr>
                <tr class="bgtr">
                    <td>Tiền lương: </td>
                    <td><input class="inpExec" type="text" name="Salary" id="Salary" disabled></td>
                    <td>Tiền trợ cấp: </td>
                    <td><input class="inpExec" type="text" name="Subsidize" id="Subsidize" disabled></td>
                </tr>
                <tr class="bgtr">
                    <td>Tiền thưởng: </td>
                    <td><input class="inpExec" type="text" name="Bonus" id="Bonus" disabled></td>
                    <td>Tiền phạt: </td>
                    <td><input class="inpExec" type="text" name="Mulct" id="Mulct" disabled></td>
                </tr>
                <tr class="bgtr">
                    <td colspan="4" align="center">Thực lãnh: <input class="inpExec" type="text" name="ReceiveSalary" id="ReceiveSalary" value="" disabled></td>
                </tr>
        </table>
    </form>
</body>

</html>