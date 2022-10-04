<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Quản lý thông tin</title>
    <script>
        function loadFunc() {
            if ($('#radion_info_1').is(':checked')) {
                $('#info_1').removeClass('disableinfo');
                $('#info_2').addClass('disableinfo');
                var y = document.getElementById("Nganh");
                y.required = false;
                y.selectedIndex = -1;
                document.getElementById("class").required = false;
                document.getElementById("title_gv").style.color = "#bbe3b9";
            }
            if ($('#radion_info_2').is(':checked')) {
                $('#info_2').removeClass('disableinfo');
                $('#info_1').addClass('disableinfo');
                var x = document.getElementById("TrinhDo");
                document.getElementById("title_sv").style.color = "#bbe3b9";
                x.selectedIndex = -1;
                x.required = false;
            }
        }
        $(document).ready(function() {
            $('#radion_info').change(function() {

                if ($('#radion_info_1').is(':checked')) {
                    $('#info_1').removeClass('disableinfo');
                    $('#info_2').addClass('disableinfo');
                    var y = document.getElementById("Nganh");
                    y.required = false;
                    y.selectedIndex = -1;
                    document.getElementById("class").required = false;
                    document.getElementById("title_gv").style.color = "#bbe3b9";
                }
                if ($('#radion_info_2').is(':checked')) {
                    $('#info_2').removeClass('disableinfo');
                    $('#info_1').addClass('disableinfo');
                    var x = document.getElementById("TrinhDo");
                    document.getElementById("title_sv").style.color = "#bbe3b9";
                    x.required = false;
                    x.selectedIndex = -1;
                }

            });
        });
    </script>
    <style>
        body {
            font-size: 20px;
            text-align: center;
        }

        form {
            display: inline-block;
        }

        #divForm {
            width: 700px;
            height: 855px;
            text-align: center;
        }

        #title_form {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }

        fieldset {

            background-color: #eeeeee;
        }

        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;
            border-radius: 10px;
        }

        select {
            width: 180px;
            text-align: center;
        }

        #btn {
            margin-left: 263px;
        }

        .info {
            min-width: 305px;
            max-width: 355px;
        }

        .inp {
            width: 335px;
            height: 21px;
            border-radius: 2px;
        }

        .btn-exec {
            font-size: 17px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            height: 30px;
            width: 100px;
            border-radius: 15px;
            background-color: #b8e4b8;
        }

        .disableinfo {
            pointer-events: none;
            opacity: 0.4;
        }
    </style>
</head>

<body onload="loadFunc()">
    <?php
    define("luongcb", 1500000);
    abstract class Peoples
    {
        protected $name, $address, $gender;
        public function setName($name)
        {
            $this->name = $name;
        }
        public function getName()
        {
            return $this->name;
        }
        public function setAddress($address)
        {
            $this->address = $address;
        }
        public function getAddress()
        {
            return $this->address;
        }
        public function setGender($gender)
        {
            $this->gender = $gender;
        }
        public function getGender()
        {
            return  $this->gender;
        }
        abstract public function Luong($trinhdo);
        abstract public function DiemThuong($nganh);
    }
    class SinhVien extends Peoples
    {
        public function DiemThuong($nganh)
        {
            if ($nganh == 'CNTT') {
                return 1;
            } else
            if ($nganh == 'Kinh tế') {
                return 1.5;
            } else {
                if ($nganh == 'Khác') {
                    return 0;
                }
            }
        }
        public function Luong($trinhdo)
        {
            return 0;
        }
    }
    class GiaoVien extends Peoples
    {

        public function DiemThuong($nganh)
        {
            return 0;
        }
        public function Luong($trinhdo)
        {
            if ($trinhdo == "Cử nhân") {
                return number_format(luongcb * 2.34);
            } else {
                if ($trinhdo == "Thạc sĩ") {
                    return number_format(luongcb * 3.67);
                } else {
                    if ($trinhdo == "Tiến sĩ") {
                        return number_format(luongcb * 5.66);
                    }
                }
            }
        }
    }
    $str = NULL;
    $n1 = '';
    $n2 = '';
    $n3 = '';
    $s1 = '';
    $s2 = '';
    $s3 = '';
    if (isset($_POST['TrinhDo']))
        $trinhdo = $_POST['TrinhDo'];
    else
        $trinhdo = '';
    if (isset($_POST['Nganh']))
        $nganh = $_POST['Nganh'];
    else
        $nganh = '';
    switch ($trinhdo) {
        case 'Cử nhân':
            $s1 = 'selected';
            $s2 = '';
            $s3 = '';
            break;
        case 'Thạc sĩ':
            $s1 = '';
            $s2 = 'selected';
            $s3 = '';
            break;
        case 'Tiến sĩ':
            $s1 = '';
            $s2 = '';
            $s3 = 'selected';
            break;
    }
    switch ($nganh) {
        case 'CNTT':
            $n1 = 'selected';
            $n2 = '';
            $n3 = '';
            break;
        case 'Kinh tế':
            $n1 = '';
            $n2 = 'selected';
            $n3 = '';
            break;
        case 'Khác':
            $n1 = '';
            $n2 = '';
            $n3 = 'selected';
            break;
    }
    if (isset($_POST['Exec'])) {
        if (isset($_POST['job']) && $_POST['job'] == 'gv' && isset($_POST['TrinhDo'])) {
            $gv = new GiaoVien();
            $gv->setName($_POST['name']);
            $gv->setAddress($_POST['address']);
            $gv->setGender($_POST['gender']);

            $str = "Họ tên giáo viên: " . $gv->getName() . "\n";
            $str .= "Địa chỉ: " . $gv->getAddress() . "\n";
            $str .= "Giới tính: " . $gv->getGender() . "\n";
            $str .= "Trình độ: " . $_POST['TrinhDo'] . "\n";
            $str .= "Lương: " . $gv->Luong($_POST['TrinhDo']) . "VNĐ \n";
        } else {
            if (isset($_POST['job']) && $_POST['job'] == 'sv' && isset($_POST['Nganh']) && isset($_POST['class'])) {
                $sv = new SinhVien();
                $sv->setName($_POST['name']);
                $sv->setAddress($_POST['address']);
                $sv->setGender($_POST['gender']);
                $str = "Họ tên sinh viên: " . $sv->getName() . "\n";
                $str .= "Địa chỉ: " . $sv->getAddress() . "\n";
                $str .= "Giới tính: " . $sv->getGender() . "\n";
                $str .= "Ngành: " . $_POST['Nganh'] . "\n";
                $str .= "Lớp: " . $_POST['class'] . "\n";
                $str .= "Điểm thưởng: " . $sv->DiemThuong($_POST['Nganh']) . "\n";
            }
        }
    }
    ?>
    <form action="giaovien_sinhvien.php" method="post">
        <fieldset>
            <legend id="title_form">Quản lý thông tin GV & SV</legend>
            <table border='0'>
                <tr>
                    <td>Họ tên</td>
                    <td>
                        <input class="inp" type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" pattern="^(?:((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-.\s])){1,}(['’,\-\.]){0,1}){2,}(([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-. ]))*(([ ]+){0,1}(((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){1,})(['’\-,\.]){0,1}){2,}((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){2,})?)*)$" title="Vui lòng nhập đúng tên thật!" required />
                    </td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td>
                        <input class="inp" type="text" name="address" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>" required />
                    </td>
                </tr>
                <tr>
                    <td>Giới tính :</td>
                    <td>
                        <input type="radio" name="gender" value="Nam" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nam") echo 'checked="checked"' ?> required />Nam
                        <input type="radio" name="gender" value="Nữ" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nữ") echo 'checked="checked"' ?> required />Nữ
                    </td>
                </tr>
                <tr>
                    <td>Chọn đối tượng:</td>
                    <td id="radion_info">
                        <input id="radion_info_1" type="radio" name="job" value="gv" <?php if (isset($_POST['job']) && ($_POST['job']) == "gv") echo 'checked="checked"' ?> required />Giáo viên
                        <input id="radion_info_2" type="radio" name="job" value="sv" <?php if (isset($_POST['job']) && ($_POST['job']) == "sv") echo 'checked="checked"' ?> required />Sinh viên
                    </td>
                </tr>
                <tr>
                    <td>
                        <fieldset class="info disableinfo" id="info_1">
                            <legend id="title_gv">Giáo viên</legend>
                            <table>
                                <tr>
                                    <td>Trình độ :</td>
                                    <td>
                                        <select name="TrinhDo" id="TrinhDo" required>
                                            <option value="Cử nhân" <?php echo $s1 ?>>Cử nhân</option>
                                            <option value="Thạc sĩ" <?php echo $s2 ?>>Thạc sĩ</option>
                                            <option value="Tiến sĩ" <?php echo $s3 ?>>Tiến sĩ</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lương cơ bản :</td>
                                    <td>
                                        <input type="text" disabled name="" id="" value="1.500.000 VNĐ">
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset class="info disableinfo" id="info_2">
                            <legend id="title_sv">Sinh viên</legend>
                            <table>
                                <tr>
                                    <td>Ngành :</td>
                                    <td>
                                        <select name="Nganh" id="Nganh" required>
                                            <option value="CNTT" <?php echo $n1 ?>>CNTT</option>
                                            <option value="Kinh tế" <?php echo $n2 ?>>Kinh tế</option>
                                            <option value="Khác" <?php echo $n3 ?>>Các ngành khác</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lớp:</td>
                                    <td>
                                        <input type="text" id="class" name="class" value="<?php if (isset($_POST['class'])) echo $_POST['class']; ?>" required />
                                    </td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button name="Exec" type="submit" class="btn-exec">Xử lý</button></td>
                </tr>
            </table>
            <textarea name="ketqua" cols="90" rows="7" disabled="disabled"><?php echo $str; ?></textarea>

        </fieldset>
    </form>

</body>

</html>