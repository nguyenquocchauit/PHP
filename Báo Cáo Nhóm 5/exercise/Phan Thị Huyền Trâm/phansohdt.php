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
            width: 800px;
            margin: auto;
        }

        fieldset {
            background-color: lightpink;
        }

        legend {
            background-color: lightcoral;
            color: white;

        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include "../../includes/header.php"; ?>
    <?php
    class PhanSo
    {
        protected $ts1;
        protected $ms1;
        protected $ts2;
        protected $ms2;
        public function setts1($ts1)
        {
            $this->ts1 = $ts1;
        }
        public function getts1()
        {
            return $this->ts1;
        }

        public function setms1($ms1)
        {
            $this->ms1 = $ms1;
        }
        public function getms1()
        {
            return $this->ms1;
        }

        public function setts2($ts2)
        {
            $this->ts2 = $ts2;
        }
        public function getts2()
        {
            return $this->ts2;
        }

        public function setms2($ms2)
        {
            $this->ms2 = $ms2;
        }
        public function getms2()
        {
            return $this->ms2;
        }
        public function UCLN($a, $b)
        {
            if ($a == 0 || $b == 0) {
                return $a + $b;
            }
            while ($a != $b) {
                if ($a > $b) {
                    $a -= $b;
                } else {
                    $b -= $a;
                }
            }
            return $a;
        }
        public function rutgon($a, $b)
        {
            $c = $this->UCLN($a, $b);
            $kq = $a / $c . "/" . $b / $c;
            return $kq;
        }
        public function Cong()
        {
            return $this->rutgon($this->ts1 * $this->ts2, $this->ms1 * $this->ms2);
        }
        public function Chia()
        {
            return $this->rutgon($this->ts1 * $this->ms2, $this->ms1 * $this->ts2);
        }
        public function Tru()
        {
            return $this->rutgon(($this->ts1 * $this->ms2) - ($this->ms1 * $this->ts2), $this->ms1 * $this->ms2);
        }
        public function Nhan()
        {
            return $this->rutgon($this->ts1 * $this->ts2, $this->ms1 * $this->ms2);
        }
    }
    $str = NULL;
    if (isset($_POST['tinh'])) {
        if (isset($_POST['radiobtn']) && ($_POST['radiobtn']) == "Cộng") {
            $ps = new PhanSo();
            $ps->setts1($_POST['ts1']);
            $ps->setms1($_POST['ms1']);
            $ps->setts2($_POST['ts2']);
            $ps->setms2($_POST['ms2']);
            $str = "Phép cộng là :" . $ps->Cong();
        }
        if (isset($_POST['radiobtn']) && ($_POST['radiobtn']) == "Trừ") {
            $ps = new PhanSo();
            $ps->setts1($_POST['ts1']);
            $ps->setms1($_POST['ms1']);
            $ps->setts2($_POST['ts2']);
            $ps->setms2($_POST['ms2']);
            $str = "Phép trừ là :" . $ps->Tru();
        }
        if (isset($_POST['radiobtn']) && ($_POST['radiobtn']) == "Nhân") {
            $ps = new PhanSo();
            $ps->setts1($_POST['ts1']);
            $ps->setms1($_POST['ms1']);
            $ps->setts2($_POST['ts2']);
            $ps->setms2($_POST['ms2']);
            $str = "Phép nhân là :" . $ps->Nhan();
        }
        if (isset($_POST['radiobtn']) && ($_POST['radiobtn']) == "Chia") {
            $ps = new PhanSo();
            $ps->setts1($_POST['ts1']);
            $ps->setms1($_POST['ms1']);
            $ps->setts2($_POST['ts2']);
            $ps->setms2($_POST['ms2']);
            $str = "Phép chia là :" . $ps->Chia();
        }
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <h3>Chọn các phép tính trên phân số</h3>
            </tr>
            <tr>
                <td>Nhập phân số thứ 1 :</td>
                <td>Tử số</td>
                <td><input type="text" name="ts1" value="<?php if (isset($_POST['ts1'])) echo $_POST['ts1']; ?>" /></td>
                <td>Mẫu số</td>
                <td><input type="text" name="ms1" value="<?php if (isset($_POST['ms1'])) echo $_POST['ms1']; ?>" /></td>
            </tr>
            <tr>
                <td>Nhập phân số thứ 2 :</td>
                <td>Tử số</td>
                <td><input type="text" name="ts2" value="<?php if (isset($_POST['ts2'])) echo $_POST['ts2']; ?>" /></td>
                <td>Mẫu số</td>
                <td><input type="text" name="ms2" value="<?php if (isset($_POST['ms2'])) echo $_POST['ms2']; ?>" /></td>
            </tr>
            <tr>
                <td colspan="5">
                    <fieldset class="mini">
                        <legend>Chọn phép tính</legend>
                        <table>
                            <tr>
                                <td>
                                    <input type="radio" id="" value="Cộng" name="radiobtn" checked>Cộng
                                </td>
                                <td>
                                    <input type="radio" id="" value="Trừ" name="radiobtn">Trừ
                                </td>
                                <td>
                                    <input type="radio" id="" value="Nhân" name="radiobtn">Nhân
                                </td>
                                <td>
                                    <input type="radio" id="" value="Chia" name="radiobtn">Chia
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Tính" name="tinh" />
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <fieldset class="mini">
                        <legend>Kết quả phép tính</legend>
                        <textarea name="ketqua" cols="90" rows="6" disabled="disabled"><?php echo $str; ?></textarea>
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
    <?php include "../../includes/footer.php"; ?>

</body>

</html>