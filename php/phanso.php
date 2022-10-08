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
            $c->setNumerator(($a->getNumerator()*$b->getDenominator())+ ($a->getDenominator()*$b->getNumerator()));
            $c->setDenominator($a->getDenominator()*$b->getDenominator());
            return $c;
        }
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

    // execute form
    if (isset($_POST['Exec'])) {
        $ps1 = new PhanSo();
        $ps1->setNumerator($numeratorA);
        $ps1->setDenominator($denominatorA);
        $ps2 = new PhanSo();
        $ps2->setNumerator($numeratorA);
        $ps2->setDenominator($denominatorA);
        $ps3 = new PhanSo();
        $ps3->congPS($ps1,$ps2);    
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
                                <td><input type="radio" name="operator" id="" value="Cộng">Cộng </td>
                                <td><input type="radio" name="operator" id="" value="Trừ">Trừ </td>
                                <td><input type="radio" name="operator" id="" value="Nhân">Nhân </td>
                                <td><input type="radio" name="operator" id="" value="Chia">Chia </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr class="bgtr">
                <td colspan="3" align="center"><button name="Exec" type="submit" class="btn-exec">Thực hiện</button></td>
            </tr>
            <tr class="bgtr">
                <td colspan="3" align="center"><?php $ketQua ?></td>
            </tr>
        </table>
    </form>
</body>

</html>