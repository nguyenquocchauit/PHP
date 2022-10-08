<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân số</title>
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

        .inpRadio {
            width: 35px;
        }

        input {
            font-size: 20px;
            height: 22px;
        }
    </style>
</head>

<body>
    <?php

    // initialize abstract Fraction
    class PhanSo
    {
        protected $numerator, $denominator;
        public function setNumerator($numerator)
        {
            $this->numerator = $numerator;
        }
        public function getNumerator()
        {
            return $this->numerator;
        }
        public function setDenominator($denominator)
        {
            $this->denominator = $denominator;
        }
        public function getDenominator()
        {
            return $this->denominator;
        }
        public function congPS(PhanSo $a, PhanSo $b)
        {

            $c = new PhanSo();
            $c->setNumerator(($a->getNumerator() * $b->getDenominator()) + ($a->getDenominator() * $b->getNumerator()));
            $c->setDenominator($a->getDenominator() * $b->getDenominator());
            $kQ = $c->getNumerator() / $c->getDenominator();
            return $kQ;
        }
        public function truPS(PhanSo $a, PhanSo $b)
        {

            $c = new PhanSo();
            $c->setNumerator(($a->getNumerator() * $b->getDenominator()) - ($a->getDenominator() * $b->getNumerator()));
            $c->setDenominator($a->getDenominator() * $b->getDenominator());
            $kQ = $c->getNumerator() / $c->getDenominator();
            return $kQ;
        }
        public function nhanPS(PhanSo $a, PhanSo $b)
        {

            $c = new PhanSo();
            $c->setNumerator(($a->getNumerator() * $b->getNumerator()));
            $c->setDenominator($a->getDenominator() * $b->getDenominator());
            $kQ = $c->getNumerator() / $c->getDenominator();
            return $kQ;
        }
        public function chiaPS(PhanSo $a, PhanSo $b)
        {

            $c = new PhanSo();
            $c->setNumerator(($a->getNumerator() * $b->getDenominator()));
            $c->setDenominator($a->getDenominator() * $b->getNumerator());
            $kQ = $c->getNumerator() / $c->getDenominator();
            return $kQ;
        }
    }
    function float2rat($n, $tolerance = 1.e-6)
    {
        $h1 = 1;
        $h2 = 0;
        $k1 = 0;
        $k2 = 1;
        $b = 1 / $n;
        do {
            $b = 1 / $b;
            $a = floor($b);
            $aux = $h1;
            $h1 = $a * $h1 + $h2;
            $h2 = $aux;
            $aux = $k1;
            $k1 = $a * $k1 + $k2;
            $k2 = $aux;
            $b = $b - $a;
        } while (abs($n - $h1 / $k1) > $n * $tolerance);

        return "$h1/$k1";
    }

    // initialize sticky form
    if (isset($_POST['numeratorA']))
        $numeratorA = $_POST['numeratorA'];
    else
        $numeratorA = null;
    if (isset($_POST['denominatorA']))
        $denominatorA = $_POST['denominatorA'];
    else
        $denominatorA = null;
    if (isset($_POST['numeratorB']))
        $numeratorB = $_POST['numeratorB'];
    else
        $numeratorB = null;
    if (isset($_POST['denominatorB']))
        $denominatorB = $_POST['denominatorB'];
    else
        $denominatorB = null;
    $ketQua = null;
    $checkNegativeA = 0;
    $checkNegativeB = 0;
    // execute form
    if (isset($_POST['Exec'])) {
        if (!is_numeric($numeratorA))
            $ketQua = "Tử số phân số thứ nhất phải là số nguyên";
        else
        if (!is_numeric($numeratorB))
            $ketQua = "Tử số phân số thứ hai phải là số nguyên";
        else
        if (!is_numeric($denominatorA))
            $ketQua = "Mẫu số phân số thứ nhất phải là số nguyên";
        else
        if (!is_numeric($denominatorB))
            $ketQua = "Mẫu số phân số thứ hai phải là số nguyên";
        else
        if ($denominatorA == 0)
            $ketQua = "Mẫu số phân số thứ nhất không được bằng 0";
        else {
            if ($denominatorB == 0)
                $ketQua = "Mẫu số phân số thứ hai không được bằng 0";
            else {
                if ($numeratorA < 0 || $denominatorA < 0) {
                    $checkNegativeA = 1;
                    abs($numeratorA);
                    abs($denominatorA);
                }
                if ($numeratorB < 0 || $denominatorB < 0) {
                    $checkNegativeB = 1;
                    abs($numeratorB);
                    abs($denominatorB);
                }
                $ps1 = new PhanSo();
                $ps1->setNumerator($numeratorA);
                $ps1->setDenominator($denominatorA);
                $ps2 = new PhanSo();
                $ps2->setNumerator($numeratorB);
                $ps2->setDenominator($denominatorB);
                $ps3 = new PhanSo();
                switch ($_POST['operator']) {
                    case 'Cộng':
                        $kQOperator = $ps3->congPS($ps1, $ps2);
                        break;
                    case 'Trừ':
                        $kQOperator = $ps3->truPS($ps1, $ps2);
                        break;
                    case 'Chia':
                        $kQOperator = $ps3->chiaPS($ps1, $ps2);
                        break;
                    case 'Nhân':
                        $kQOperator = $ps3->nhanPS($ps1, $ps2);
                        break;
                }
                if ($checkNegativeB + $checkNegativeA == 2) {
                    $ketQua = float2rat(abs($kQOperator));
                } else
            if ($kQOperator < 0)
                    $ketQua = "-" . float2rat(abs($kQOperator));
                else
                    $ketQua = float2rat($kQOperator);
            }
        }
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td id="title" colspan="3" align="center">CHỌN CÁC PHÉP TÍNH TRÊN PHÂN SỐ</td>
            </tr>
            <tr class="bgtr">
                <td>Nhập phân số thứ 1: </td>
                <td>Tử số:<input class="inp_1" type="text" value="<?php echo $numeratorA ?>" name="numeratorA" required></td>
                <td>Mẫu số:<input class="inp_1" type="text" value="<?php echo $denominatorA ?>" name="denominatorA" required></td>
            </tr>
            <tr class="bgtr">
                <td>Nhập phân số thứ 2: </td>
                <td>Tử số:<input class="inp_1" type="text" value="<?php echo $numeratorB ?>" name="numeratorB" required></td>
                <td>Mẫu số:<input class="inp_1" type="text" value="<?php echo $denominatorB ?>" name="denominatorB" required></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    <fieldset class="info disableinfo" id="info_1">
                        <legend id="title_gv">Chọn phép tính</legend>
                        <table>
                            <tr>
                                <td><input class="inpRadio" type="radio" name="operator" id="" value="Cộng" <?php if (isset($_POST['operator']) && ($_POST['operator']) == "Cộng") echo 'checked="checked"' ?>required>Cộng </td>
                                <td><input class="inpRadio" type="radio" name="operator" id="" value="Trừ" <?php if (isset($_POST['operator']) && ($_POST['operator']) == "Trừ") echo 'checked="checked"' ?>required>Trừ </td>
                                <td><input class="inpRadio" type="radio" name="operator" id="" value="Nhân" <?php if (isset($_POST['operator']) && ($_POST['operator']) == "Nhân") echo 'checked="checked"' ?>required>Nhân </td>
                                <td><input class="inpRadio" type="radio" name="operator" id="" value="Chia" <?php if (isset($_POST['operator']) && ($_POST['operator']) == "Chia") echo 'checked="checked"' ?>required>Chia </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr class="bgtr">
                <td colspan="3" align="center"><button name="Exec" type="submit" class="btn-exec">Thực hiện</button></td>
            </tr>
            <tr class="bgtr">
                <td colspan="3" align="center"><?php echo $ketQua ?></td>
            </tr>
        </table>
    </form>
</body>

</html>