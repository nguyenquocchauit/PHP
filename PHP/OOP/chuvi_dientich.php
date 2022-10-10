<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tinh chu vi va dien tich</title>
    <style>
        body {
            text-align: center;
        }

        form {
            display: inline-block;
        }

        #divForm {
            width: 700px;
            height: 455px;
            text-align: center;
        }

        fieldset {
            background-color: #eeeeee;
        }

        .btn-exec {
            font-size: 17px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            height: 30px;
            width: 100px;
            border-radius: 15px;    
        }

        legend {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            border-radius: 10px;
            background-color: gray;
            color: white;
            padding: 5px 10px;
        }

        input {
            margin: 5px;
            border-radius: 2px;
        }
    </style>

</head>

<body>

    <?php

    abstract class Hinh
    {

        protected $ten, $dodai;

        public function setTen($ten)
        {
            $this->ten = $ten;
        }

        public function getTen()
        {
            return $this->ten;
        }

        public function setDodai($doDai)
        {
            $this->dodai = $doDai;
        }

        public function getDodai()
        {
            return $this->dodai;
        }
        abstract public function tinh_CV();
        abstract public function tinh_DT();
    }
    class HinhChuNhat extends Hinh
    {
        public function tinh_CV()
        {
            return ($this->dodai * ($this->dodai + $this->dodai)) * 2;
        }
        public function tinh_DT()
        {
            return ($this->dodai + $this->dodai) * $this->dodai;
        }
    }
    class HinhTron extends Hinh
    {

        const PI = 3.14;

        function tinh_CV()
        {

            return $this->dodai * 2 * self::PI;
        }

        function tinh_DT()
        {

            return pow($this->dodai, 2) * self::PI;
        }
    }

    class HinhVuong extends Hinh
    {

        public function tinh_CV()
        {
            return $this->dodai * 4;
        }

        public function tinh_DT()
        {
            return pow($this->dodai, 2);
        }
    }
    class HinhTamGiac extends Hinh
    {
        public function tinh_CV()
        {
            return $this->dodai * 3;
        }
        public function tinh_DT()
        {
            return ($this->dodai * $this->dodai) * (3 / 4);
        }
    }
    $str = NULL;

    if (isset($_POST['tinh'])) {

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") {

            $hcn = new HinhChuNhat();

            $hcn->setTen($_POST['ten']);

            $hcn->setDodai($_POST['dodai']);

            $str = "Diện tích hình chữ nhật " . $hcn->getTen() . " là : " . $hcn->tinh_DT() . " \n" .

                "Chu vi của hình chữ nhật " . $hcn->getTen() . " là : " . $hcn->tinh_CV();
        }
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") {

            $hv = new HinhVuong();

            $hv->setTen($_POST['ten']);

            $hv->setDodai($_POST['dodai']);

            $str = "Diện tích hình vuông " . $hv->getTen() . " là : " . $hv->tinh_DT() . " \n" .

                "Chu vi của hình vuông " . $hv->getTen() . " là : " . $hv->tinh_CV();
        }

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") {

            $ht = new HinhTron();

            $ht->setTen($_POST['ten']);

            $ht->setDodai($_POST['dodai']);

            $str = "Diện tích của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_DT() . " \n" .

                "Chu vi của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_CV();
        }
        if (isset($_POST['hinh']) && ($_POST['hinh'] == "tg")) {
            $tg = new HinhTamGiac();
            $tg->setTen($_POST['ten']);
            $tg->setDodai($_POST['dodai']);
            $str = "Diện tích của hình tam giác đều " . $tg->getTen() . " là : " . $tg->tinh_DT() . " \n" .

                "Chu vi của hình tam giác đều " . $tg->getTen() . " là : " . $tg->tinh_CV();
        }
    }

    ?>

    <form action="chuvi_dientich.php" method="post">
        <div id="divform">
            <fieldset>

                <legend>Tính chu vi và diện tích các hình học đơn giản</legend>

                <table border='0'>

                    <tr>
                        <td>Chọn hình</td>
                        <td>
                            <input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") echo 'checked="checked"' ?> required />Hình vuông
                            <input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") echo 'checked="checked"' ?> required />Hình tròn
                            <input type="radio" name="hinh" value="tg" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "tg") echo 'checked="checked"' ?> required />Hình tam giác
                            <input type="radio" name="hinh" value="hcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") echo 'checked="checked"' ?> required />Hình chữ nhật
                        </td>
                    </tr>

                    <tr>
                        <td>Nhập tên:</td>
                        <td><input type="text" name="ten" value="<?php if (isset($_POST['ten'])) echo $_POST['ten']; ?>" required /></td>
                    </tr>

                    <tr>
                        <td>Nhập độ dài:</td>
                        <td><input type="text" name="dodai" value="<?php if (isset($_POST['dodai'])) echo $_POST['dodai']; ?>" required /></td>
                    </tr>

                    <tr>
                        <td>Kết quả:</td>

                        <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str; ?></textarea></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <button name="tinh" type="submit" class="btn-exec">Xử lý</button>
                        </td>
                    </tr>

                </table>

            </fieldset>
        </div>
    </form>



</body>

</html>