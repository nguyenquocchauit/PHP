<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

    <title>Kiểm Tra Giữ Kỳ</title>
    <script>
        $(document).ready(function() {
            $("#Birthday").datepicker({
                format: 'yyyy-mm-dd' //can also use format: 'dd-mm-yyyy'     
            });
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
            display: inline-block;
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
            width: 800px;
            border: 1px solid;
        }

        input {
            width: 80%;
            font-size: 20px;
            height: 32px;
        }

        #Class {
            height: 32px;
        }

        .inpradio {
            width: 40px;
        }
    </style>
</head>

<body>
    <?php
    $SinhVien = array(
        array("mssv" => "6112341", "tenSV" => "Nguyễn Minh Anh", "lop" => "61.CNTT-1", "gioiTinh" => "Nữ", "ngaySinh" => "2001-12-03"),
        array("mssv"  => "6110123", "tenSV" => "Trần Anh Tú", "lop" => "61.CNTT-1", "gioiTinh" => "Nam", "ngaySinh" => "2001-05-16"),
        array("mssv" => "6111012", "tenSV" => "Nguyễn Ngọc Thanh", "lop" => "61.CNTT-2", "gioiTinh" => "Nam", "ngaySinh" => "2001-10-20"),
        array("mssv" => "6234121", "tenSV" => "Trần Lê Thu", "lop" => "62.TTQL", "gioiTinh" => "Nữ", "ngaySinh" => "2002-05-10"),
    );
    if(isset($_POST['Exec']))
    {
        $MSSV = $_POST['MSSV'];
        $Name = $_POST['Name'];
        $Birthday = $_POST['Birthday'];
        $Class = $_POST['Class'];
        $Gender = $_POST['Gender'];
        
        // array_push($SinhVien,$MSSV);
        // array_push($SinhVien,$Name);
        // array_push($SinhVien,$Class);
        // array_push($SinhVien,$Gender);
        // array_push($SinhVien,$Birthday);
        $SinhVien[(sizeof($SinhVien))]["mssv"]=$MSSV;
        $SinhVien[(sizeof($SinhVien))]["tenSV"]=$Name;
        $SinhVien[(sizeof($SinhVien))]["lop"]=$Class;
        $SinhVien[(sizeof($SinhVien))]["gioiTinh"]=$Gender;
        $SinhVien[(sizeof($SinhVien))]["ngaySinh"]=$Birthday;
        $data=null;
        for ($i = 0; $i <(count($SinhVien)-1); $i++) {
            $data .= $SinhVien[$i]["mssv"] . " " .$SinhVien[$i]["tenSV"] . " ".$SinhVien[$i]["lop"] . " "
            .$SinhVien[$i]["gioiTinh"] . " " .$SinhVien[$i]["ngaySinh"] . "\n" ;
        }
        $fp = fopen('sinhvien.dat', "w+");
        fwrite($fp, $data);
        fclose($fp);
            
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td id="title" colspan="2" align="center">NHẬP THÔNG TIN SINH VIÊN</td>
            </tr>
            <tbody>
                <tr class="bgtr">
                    <td>Mã sinh viên: </td>
                    <td>
                        <input class="inp" type="text" placeholder="61130073" name="MSSV" value="<?php if (isset($_POST['MSSV'])) echo $_POST['MSSV']; ?>" required />
                    </td>
                </tr>
                <tr class="bgtr">
                    <td>Họ tên sinh viên: </td>
                    <td>
                        <input class="inp" type="text" placeholder="Nguyễn Quốc Châu" name="Name" value="<?php if (isset($_POST['Name'])) echo $_POST['Name']; ?>" pattern="^(?:((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-.\s])){1,}(['’,\-\.]){0,1}){2,}(([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-. ]))*(([ ]+){0,1}(((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){1,})(['’\-,\.]){0,1}){2,}((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){2,})?)*)$" title="Vui lòng nhập đúng tên thật!" required />
                    </td>
                </tr>
                <tr class="bgtr">
                    <td>Ngày sinh: </td>
                    <td>
                        <input class="inp" type="text" name="Birthday" id="Birthday" placeholder="2001-08-27" value="<?php if (isset($_POST['Birthday'])) echo $_POST['Birthday']; ?>" required />
                    </td>
                </tr>
                <tr class="bgtr">
                    <td>Lớp: </td>
                    <td>
                        <select name="Class" id="Class" required>
                            <option value="61.CNTT-1">61.CNTT-1</option>
                            <option value="61.CNTT-2">61.CNTT-2</option>
                            <option value="62.TTQL">62.TTQL</option>
                        </select>
                    </td>
                </tr>
                <tr class="bgtr">
                    <td>Giới tính: </td>
                    <td>
                        <input type="radio" class="inpradio" name="Gender" value="Nam" <?php if (isset($_POST['Gender']) && ($_POST['Gender']) == "Nam") echo 'checked="checked"' ?> required />Nam
                        <input type="radio" class="inpradio" name="Gender" value="Nữ" <?php if (isset($_POST['Gender']) && ($_POST['Gender']) == "Nữ") echo 'checked="checked"' ?> required />Nữ
                    </td>
                </tr>
                <tr class="bgtr">
                    <td colspan="3" align="center"><button name="Exec" type="submit" class="btn-exec">Thực hiện</button></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>