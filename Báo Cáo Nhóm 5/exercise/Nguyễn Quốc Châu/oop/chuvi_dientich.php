<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

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

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../includes/header.php"; ?>
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

                $str = "Di???n t??ch h??nh ch??? nh???t " . $hcn->getTen() . " l?? : " . $hcn->tinh_DT() . " \n" .

                    "Chu vi c???a h??nh ch??? nh???t " . $hcn->getTen() . " l?? : " . $hcn->tinh_CV();
            }
            if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") {

                $hv = new HinhVuong();

                $hv->setTen($_POST['ten']);

                $hv->setDodai($_POST['dodai']);

                $str = "Di???n t??ch h??nh vu??ng " . $hv->getTen() . " l?? : " . $hv->tinh_DT() . " \n" .

                    "Chu vi c???a h??nh vu??ng " . $hv->getTen() . " l?? : " . $hv->tinh_CV();
            }

            if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") {

                $ht = new HinhTron();

                $ht->setTen($_POST['ten']);

                $ht->setDodai($_POST['dodai']);

                $str = "Di???n t??ch c???a h??nh tr??n " . $ht->getTen() . " l?? : " . $ht->tinh_DT() . " \n" .

                    "Chu vi c???a h??nh tr??n " . $ht->getTen() . " l?? : " . $ht->tinh_CV();
            }
            if (isset($_POST['hinh']) && ($_POST['hinh'] == "tg")) {
                $tg = new HinhTamGiac();
                $tg->setTen($_POST['ten']);
                $tg->setDodai($_POST['dodai']);
                $str = "Di???n t??ch c???a h??nh tam gi??c ?????u " . $tg->getTen() . " l?? : " . $tg->tinh_DT() . " \n" .

                    "Chu vi c???a h??nh tam gi??c ?????u " . $tg->getTen() . " l?? : " . $tg->tinh_CV();
            }
        }

        ?>

        <form action="chuvi_dientich.php" method="post">
            <div id="divform">
                <fieldset>

                    <legend>T??nh chu vi v?? di???n t??ch c??c h??nh h???c ????n gi???n</legend>

                    <table border='0'>

                        <tr>
                            <td>Ch???n h??nh</td>
                            <td>
                                <input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") echo 'checked="checked"' ?> required />H??nh vu??ng
                                <input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") echo 'checked="checked"' ?> required />H??nh tr??n
                                <input type="radio" name="hinh" value="tg" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "tg") echo 'checked="checked"' ?> required />H??nh tam gi??c
                                <input type="radio" name="hinh" value="hcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") echo 'checked="checked"' ?> required />H??nh ch??? nh???t
                            </td>
                        </tr>

                        <tr>
                            <td>Nh???p t??n:</td>
                            <td><input type="text" name="ten" value="<?php if (isset($_POST['ten'])) echo $_POST['ten']; ?>" required /></td>
                        </tr>

                        <tr>
                            <td>Nh???p ????? d??i:</td>
                            <td><input type="text" name="dodai" value="<?php if (isset($_POST['dodai'])) echo $_POST['dodai']; ?>" required /></td>
                        </tr>

                        <tr>
                            <td>K???t qu???:</td>

                            <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str; ?></textarea></td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                <button name="tinh" type="submit" class="btn-exec">X??? l??</button>
                            </td>
                        </tr>

                    </table>

                </fieldset>
            </div>
        </form>
        <?php include "../../../includes/footer.php"; ?>
    </div>
</body>

</html>