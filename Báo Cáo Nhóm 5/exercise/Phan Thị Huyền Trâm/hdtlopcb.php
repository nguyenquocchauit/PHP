<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Document</title>
    <style>
        form {
            width: 500px;
        }

        fieldset {
            background-color: lightpink;
        }

        legend {
            background-color: lightcoral;
            color: white;
            padding: 5px 10px;
        }

        input {
            margin: 5px;
        }

        .mini {
            width: 300px;
            height: 100px;
        }

        textarea {
            margin-right: 150px;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include "../../includes/header.php"; ?>
    <?php
    abstract class Nguoi
    {
        protected $name, $add, $gender;
        public function setName($name)
        {
            $this->name = $name;
        }
        public function getName()
        {
            return $this->name;
        }
        public function setadd($add)
        {
            $this->add = $add;
        }
        public function getadd()
        {
            return $this->add;
        }
        public function setgender($gender)
        {
            $this->gender = $gender;
        }
        public function getgender()
        {
            return $this->gender;
        }
    }

    class SV extends Nguoi
    {
        private $class, $nganh;
        function getclass()
        {
            return $this->class;
        }
        public function setclass($class)
        {
            $this->class = $class;
        }
        public function getnganh()
        {
            return $this->nganh;
        }
        public function setnganh($nganh)
        {
            $this->nganh = $nganh;
        }
        public function TinhDiem($nganh)
        {
            if ($nganh === 'CNTT') {
                return 1;
            } elseif ($nganh === 'Kinh tế') {
                return 1.5;
            } else
                return 0;
        }
    }
    class GV extends Nguoi
    {
        private $trinhdo;

        const luongcb = 1500000;
        function gettrinhDo()
        {
            return $this->trinhdo;
        }

        public function setTrinhDo($trinhdo)
        {
            $this->trinhdo = $trinhdo;
        }
        public function TinhLuong($trinhdo)
        {

            if ($trinhdo === 'Cử Nhân') {
                return self::luongcb * 2.34;
            } elseif ($trinhdo === 'Thạc sĩ') {
                return self::luongcb * 3.67;
            } else {
                return self::luongcb * 5.66;
            }
        }
    }
    $str = NULL;
    if (isset($_POST['name']))
        $name = trim($_POST['name']);
    if (isset($_POST['add']))
        $add = trim($_POST['add']);
    if (isset($_POST['xuly'])) {
        if (isset($_POST['choice']) && ($_POST['choice']) == "gv") {
            $gv = new GV();
            $gv->setName($_POST['name']);
            $gv->setadd($_POST['add']);
            $gv->setgender($_POST['gender']);
            $gv->setTrinhDo($_POST['trinhdo']);
            $str = "Họ và tên là :" . $gv->getName() . "\n"
                . "Địa chỉ :" . $gv->getadd() . "\n"
                . "Giới tính : " . $gv->getgender() . "\n"
                . "Trình độ: " . $gv->gettrinhDo() . "\n"
                . "Lương : " . $gv->TinhLuong($_POST['trinhdo']);
        }
        if (isset($_POST['choice']) && ($_POST['choice']) == "sv") {
            $sv = new SV();
            $sv->setName($_POST['name']);
            $sv->setadd($_POST['add']);
            $sv->setgender($_POST['gender']);
            $sv->setclass($_POST['class']);
            $sv->setnganh($_POST['nganh']);
            $str = "Họ và tên là: " . $sv->getName() . "\n"
                . "Địa chỉ: " . $sv->getadd() . "\n"
                . "Giới tính: " . $sv->getgender() . "\n"
                . "Lớp: " . $sv->getclass() . "\n"
                . "Ngành: " . $sv->getnganh() . "\n"
                . "Điểm thưởng: " . $sv->TinhDiem($_POST['nganh']);
        }
    }

    ?>
    <form action="" method="post">
        <fieldset>
            <legend>Quản lý thông tin GV & SV</legend>
            <table border='0'>
                <tr>
                    <td align="center">Họ tên :</td>
                    <td><input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></td>
                </tr>
                <tr>
                    <td align="center">Địa chỉ:</td>
                    <td><input type="text" name="add" value="<?php if (isset($_POST['add'])) echo $_POST['add']; ?>" /></td>
                </tr>
                <tr>
                    <td align="center">Giới tính :</td>
                    <td><input type="radio" name="gender" value="Nam" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nam") echo 'checked="checked"' ?> />Nam
                        <input type="radio" name="gender" value="Nữ" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nữ") echo 'checked="checked"' ?> />Nữ
                    </td>
                </tr>
                <tr>
                    <td align="center">Chọn đối tượng:</td>
                    <td><input type="radio" name="choice" value="gv" <?php if (isset($_POST['choice']) && ($_POST['choice']) == "gv") echo 'checked="checked"' ?> />Giáo viên
                        <input type="radio" name="choice" value="sv" <?php if (isset($_POST['choice']) && ($_POST['choice']) == "sv") echo 'checked="checked"' ?> />Sinh viên
                    </td>
                </tr>
                <tr>
                    <td>
                        <fieldset class="mini">
                            <legend>Giáo viên</legend>
                            <table>
                                <tr>
                                    <td>Trình độ :</td>
                                    <td><select name="trinhdo">
                                            <option value="Cử nhân" selected>
                                                Cử nhân
                                            </option>
                                            <option value="Thạc sĩ">
                                                Thạc sĩ
                                            </option>
                                            <option value="Tiến sĩ">
                                                Tiến sĩ
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lương cơ bản :</td>
                                    <td>15000</td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                    <td>

                        <fieldset class="mini">
                            <legend>Sinh viên</legend>
                            <table>
                                <tr>
                                    <td>Ngành :</td>
                                    <td><select name="nganh">
                                            <option value="CNTT" selected>
                                                CNTT
                                            </option>
                                            <option value="Kinh tế">
                                                Kinh tế
                                            </option>
                                            <option value="Ngành khác">
                                                Các ngành khác
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lớp:</td>
                                    <td><input type="text" name="class" value="<?php if (isset($_POST['class'])) echo $_POST['class']; ?>" /></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="xuly" value="Xử lý" /></td>
                </tr>
            </table>
            <textarea name="ketqua" cols="90" rows="6" disabled="disabled"><?php echo $str; ?></textarea>
        </fieldset>
    </form>
    <?php include "../../includes/footer.php"; ?>

</body>

</html>