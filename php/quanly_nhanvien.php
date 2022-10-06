<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Quản lý nhân viên</title>
    <script>
        function loadFunc() {
            if (document.getElementById("staffVP").checked == true) {
                var x = document.getElementById("product");
                x.required = false;
                $('#absent').removeClass('disableinfo');
                $('#product').addClass('disableinfo');
            } else
            if (document.getElementById("staffSX").checked == true) {
                var y = document.getElementById("absent");
                y.required = false;
                $('#product').removeClass('disableinfo');
                $('#absent').addClass('disableinfo');
            }
        }
        $(document).ready(function() {
            $('#radion_info').change(function() {
                if (document.getElementById("staffVP").checked == true) {
                    var x = document.getElementById("product");
                    x.required = false;
                    $('#absent').removeClass('disableinfo');
                    $('#product').addClass('disableinfo');
                } else
                if (document.getElementById("staffSX").checked == true) {
                    var y = document.getElementById("absent");
                    y.required = false;
                    $('#product').removeClass('disableinfo');
                    $('#absent').addClass('disableinfo');
                }
            });
        });
    </script>
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
            font-size: 20px;
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

        .disableinfo {
            pointer-events: none;
            opacity: 0.4;
        }
    </style>
</head>

<body onload="loadFunc()">
    <?php
    // initialize abstract Staff
    abstract class NhanVien
    {
        protected $name, $gender, $dateWork, $coefficientsSalary, $numChildren;
        const basicSalary = 1500000;
        public function setName($name)
        {
            $this->name = $name;
        }
        public function getName()
        {
            return $this->name;
        }
        public function setGender($gender)
        {
            $this->gender = $gender;
        }
        public function getGender()
        {
            return $this->gender;
        }
        public function setDateWork($dateWork)
        {
            $this->dateWork = $dateWork;
        }
        public function getDateWork()
        {
            // get the year of work to calculate the bonus
            $yearsOfWork = explode("/", $this->dateWork);
            return date("Y") - $yearsOfWork[2];
        }
        public function setCoefficientsSalary($coefficientsSalary)
        {
            $this->coefficientsSalary = $coefficientsSalary;
        }
        public function getCoefficientsSalary()
        {
            return $this->coefficientsSalary;
        }
        public function setNumChildren($numChildren)
        {
            $this->numChildren = $numChildren;
        }
        public function getNumChildren()
        {
            return $this->numChildren;
        }
        abstract public function salaryCal($coefficientsSalary);
        abstract public function subsidizeCal($numChildren);
        abstract public function bonuseCal();
    }
    // initiate inheritance of office staff
    class VanPhong extends NhanVien
    {
        private  $absent;
        const absentNorms = 5;
        const punishPrice = 100000;
        public function punishCal()
        {
            if ($this->absent == null) {
                $this->absent = 0;
            } else
            if ($this->absent > self::absentNorms) {
                return $this->absent * self::punishPrice;
            } else
                return 0;
        }
        public function salaryCal($coefficientsSalary)
        {
            return self::basicSalary * $this->coefficientsSalary - $this->punishCal();
        }
        public function subsidizeCal($numChildren)
        {
            if ($this->gender == "Nữ") {
                return 200000 * $numChildren * 1.5;
            } else
                return 200000 * $numChildren;
        }
        public function bonuseCal()
        {
            return $this->getDateWork() * 1000000;
        }
    }
    // initialize inheritance of production staff
    class SanXuat extends NhanVien
    {
        private $product;
        const productNorms = 100;
        const productPrice = 200000;
        public function subsidizeCal($numChildren)
        {
            return $numChildren * 120000;
        }
        public function bonuseCal()
        {
            if ($this->product > self::productNorms) {
                return ($this->getDateWork() * 1000000) + (($this->product >= -self::productNorms) * self::productPrice * 0.03);
            } else
                return 0;
        }
        public function salaryCal($coefficientsSalary)
        {
            return $this->product * self::productPrice + $this->bonuseCal();
        }
    }
    // initialize sticky form
    if (isset($_POST['name']))
        $name = $_POST['name'];
    else
        $name = null;

    if (isset($_POST['numChildren']))
        $numChildren = $_POST['numChildren'];
    else
        $numChildren = null;

    if (isset($_POST['birthday']))
        $birthday = $_POST['birthday'];
    else
        $birthday = null;

    if (isset($_POST['dateWork']))
        $dateWork = $_POST['dateWork'];
    else
        $dateWork = null;

    if (isset($_POST['coefficientsSalary']))
        $coefficientsSalary = $_POST['coefficientsSalary'];
    else
        $coefficientsSalary = null;

    if (isset($_POST['absent']))
        $absent = $_POST['absent'];
    else
        $absent = null;

    if (isset($_POST['product']))
        $product = $_POST['product'];
    else
        $product = null;

    if (isset($_POST['salary']))
        $salary = $_POST['salary'];
    else
        $salary = null;

    if (isset($_POST['subsidize']))
        $subsidize = $_POST['subsidize'];
    else
        $subsidize = null;
    if (isset($_POST['bonus']))
        $bonus = $_POST['bonus'];
    else
        $bonus = null;

    if (isset($_POST['punish']))
        $punish = $_POST['punish'];
    else
        $punish = null;

    if (isset($_POST['receiveSalary']))
        $receiveSalary = $_POST['receiveSalary'];
    else
        $receiveSalary = null;

    if (isset($_POST['Exec'])) {
        if (isset($_POST['staff']) && $_POST['staff'] == 'Văn phòng') {
            $vp = new VanPhong();
            $vp->setName($name);
            $vp->setGender($_POST['gender']);
            $vp->setDateWork($dateWork);
            $vp->setCoefficientsSalary($coefficientsSalary);
            $vp->setNumChildren($numChildren);
            $salaryCal = ($vp->salaryCal($coefficientsSalary));
            $subsidizeCal = ($vp->subsidizeCal($numChildren));
            $bonuseCal = ($vp->bonuseCal());
            $punishCal = ($vp->punishCal());
            $salary = number_format($salaryCal);
            $subsidize = number_format($subsidizeCal);
            $bonus = number_format($bonuseCal);
            $punish = number_format($punishCal);
            $receiveSalary = number_format(($salaryCal + $bonuseCal + $subsidizeCal) - $punishCal);
        } else {
            if (isset($_POST['staff']) && $_POST['staff'] == 'Sản xuất') {
                $sx = new SanXuat();
                $sx->setName($name);
                $sx->setGender($_POST['gender']);
                $sx->setDateWork($dateWork);
                $sx->setCoefficientsSalary($coefficientsSalary);
                $sx->setNumChildren($numChildren);
                $salaryCal = $sx->salaryCal($coefficientsSalary);
                $subsidizeCal = $sx->subsidizeCal($numChildren);
                $bonuseCal = $sx->bonuseCal();
                $salary = number_format($salaryCal);
                $subsidize = number_format($subsidizeCal);
                $bonus = number_format($bonuseCal);
                $bonus =$product;
                $receiveSalary = number_format($salaryCal + $bonuseCal + $subsidizeCal);
            }
        }
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td id="title" colspan="4" align="center">QUẢN LÝ NHÂN VIÊN</td>
            </tr>
            <tr class="bgtr">
                <td>Họ và tên: </td>
                <td><input type="text" value="<?php echo $name ?>" name="name" id="inpName" pattern="^(?:((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-.\s])){1,}(['’,\-\.]){0,1}){2,}(([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-. ]))*(([ ]+){0,1}(((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){1,})(['’\-,\.]){0,1}){2,}((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){2,})?)*)$" title="Vui lòng nhập đúng tên thật!" required></td>
                <td>Số con: </td>
                <td><input type="text" value="<?php echo $numChildren ?>" name="numChildren" id="NumChildren" pattern="[0-9]+" required></td>
            </tr>
            <tr class="bgtr">
                <td>Ngày sinh: </td>
                <td><input type="text" value="<?php echo $birthday ?>" name="birthday" id="inpBirthday" required></td>
                <td>Ngày vào làm</td>
                <td><input type="text" value="<?php echo $dateWork ?>" name="dateWork" id="inpDateWork" required></td>
            </tr>
            <tr class="bgtr">
                <td>Giới tính: </td>
                <td><input class="inpRadio" type="radio" value="Nam" name="gender" id="Nam" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nam") echo 'checked="checked"' ?> required>Nam<input class="inpRadio" type="radio" value="Nữ" name="gender" id="Nu" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nữ") echo 'checked="checked"' ?> required>Nữ</td>
                <td>Hệ số lương:</td>
                <td><input type="text" value="<?php echo $coefficientsSalary ?>" name="coefficientsSalary" id="coefficientsSalary" required></td>
            </tr>
            <tr class="bgtr" id="radion_info">
                <td>Loại nhân viên: </td>
                <td><input class="inpRadio" type="radio" name="staff" value="Văn phòng" id="staffVP" <?php if (isset($_POST['staff']) && ($_POST['staff']) == "Văn phòng") echo 'checked="checked"' ?> required>Văn phòng</td>
                <td><input class="inpRadio" type="radio" name="staff" value="Sản xuất" id="staffSX" <?php if (isset($_POST['staff']) && ($_POST['staff']) == "Sản xuất") echo 'checked="checked"' ?> required>Sản xuất</td>
                <td></td>
            </tr>
            <tr class="bgtr">
                <td></td>
                <td>Số ngày vắng: <input class="disableinfo" type="text" value="<?php echo $absent ?>" name="absent" id="absent" pattern="[0-9]+" required></td>
                <td>Số sản phẩm: </td>
                <td><input class="disableinfo" type="text" value="<?php echo $product ?>" name="product" id="product" pattern="[0-9]+" required></td>
            </tr>
            <tr">
                <td colspan="4" align="center"></button><button name="Exec" id="Exec" type="submit" class="btn-exec">Tính lương</button></button></td>
                </tr>
                <tr class="bgtr">
                    <td>Tiền lương: </td>
                    <td><input class="inpExec" value="<?php echo $salary ?>" type="text" name="salary" id="salary" disabled></td>
                    <td>Tiền trợ cấp: </td>
                    <td><input class="inpExec" value="<?php echo $subsidize ?>" type="text" name="subsidize" id="subsidize" disabled></td>
                </tr>
                <tr class="bgtr">
                    <td>Tiền thưởng: </td>
                    <td><input class="inpExec" value="<?php echo $bonus ?>" type="text" name="bonus" id="bonus" disabled></td>
                    <td>Tiền phạt: </td>
                    <td><input class="inpExec" value="<?php echo $punish ?>" type="text" name="punish" id="punish" disabled></td>
                </tr>
                <tr class="bgtr">
                    <td colspan="4" align="center">Thực lãnh: <input class="inpExec" value="<?php echo $receiveSalary ?>" type="text" name="receiveSalary" id="receiveSalary" disabled></td>
                </tr>
        </table>
    </form>
</body>

</html>