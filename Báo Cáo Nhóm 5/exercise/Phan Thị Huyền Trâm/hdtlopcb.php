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
            } elseif ($nganh === 'Kinh t???') {
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

            if ($trinhdo === 'C??? Nh??n') {
                return self::luongcb * 2.34;
            } elseif ($trinhdo === 'Th???c s??') {
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
            $str = "H??? v?? t??n l?? :" . $gv->getName() . "\n"
                . "?????a ch??? :" . $gv->getadd() . "\n"
                . "Gi???i t??nh : " . $gv->getgender() . "\n"
                . "Tr??nh ?????: " . $gv->gettrinhDo() . "\n"
                . "L????ng : " . $gv->TinhLuong($_POST['trinhdo']);
        }
        if (isset($_POST['choice']) && ($_POST['choice']) == "sv") {
            $sv = new SV();
            $sv->setName($_POST['name']);
            $sv->setadd($_POST['add']);
            $sv->setgender($_POST['gender']);
            $sv->setclass($_POST['class']);
            $sv->setnganh($_POST['nganh']);
            $str = "H??? v?? t??n l??: " . $sv->getName() . "\n"
                . "?????a ch???: " . $sv->getadd() . "\n"
                . "Gi???i t??nh: " . $sv->getgender() . "\n"
                . "L???p: " . $sv->getclass() . "\n"
                . "Ng??nh: " . $sv->getnganh() . "\n"
                . "??i???m th?????ng: " . $sv->TinhDiem($_POST['nganh']);
        }
    }

    ?>
    <form action="" method="post">
        <fieldset>
            <legend>Qu???n l?? th??ng tin GV & SV</legend>
            <table border='0'>
                <tr>
                    <td align="center">H??? t??n :</td>
                    <td><input type="text" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></td>
                </tr>
                <tr>
                    <td align="center">?????a ch???:</td>
                    <td><input type="text" name="add" value="<?php if (isset($_POST['add'])) echo $_POST['add']; ?>" /></td>
                </tr>
                <tr>
                    <td align="center">Gi???i t??nh :</td>
                    <td><input type="radio" name="gender" value="Nam" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nam") echo 'checked="checked"' ?> />Nam
                        <input type="radio" name="gender" value="N???" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "N???") echo 'checked="checked"' ?> />N???
                    </td>
                </tr>
                <tr>
                    <td align="center">Ch???n ?????i t?????ng:</td>
                    <td><input type="radio" name="choice" value="gv" <?php if (isset($_POST['choice']) && ($_POST['choice']) == "gv") echo 'checked="checked"' ?> />Gi??o vi??n
                        <input type="radio" name="choice" value="sv" <?php if (isset($_POST['choice']) && ($_POST['choice']) == "sv") echo 'checked="checked"' ?> />Sinh vi??n
                    </td>
                </tr>
                <tr>
                    <td>
                        <fieldset class="mini">
                            <legend>Gi??o vi??n</legend>
                            <table>
                                <tr>
                                    <td>Tr??nh ????? :</td>
                                    <td><select name="trinhdo">
                                            <option value="C??? nh??n" selected>
                                                C??? nh??n
                                            </option>
                                            <option value="Th???c s??">
                                                Th???c s??
                                            </option>
                                            <option value="Ti???n s??">
                                                Ti???n s??
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>L????ng c?? b???n :</td>
                                    <td>15000</td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                    <td>

                        <fieldset class="mini">
                            <legend>Sinh vi??n</legend>
                            <table>
                                <tr>
                                    <td>Ng??nh :</td>
                                    <td><select name="nganh">
                                            <option value="CNTT" selected>
                                                CNTT
                                            </option>
                                            <option value="Kinh t???">
                                                Kinh t???
                                            </option>
                                            <option value="Ng??nh kh??c">
                                                C??c ng??nh kh??c
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>L???p:</td>
                                    <td><input type="text" name="class" value="<?php if (isset($_POST['class'])) echo $_POST['class']; ?>" /></td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="xuly" value="X??? l??" /></td>
                </tr>
            </table>
            <textarea name="ketqua" cols="90" rows="6" disabled="disabled"><?php echo $str; ?></textarea>
        </fieldset>
    </form>
    <?php include "../../includes/footer.php"; ?>

</body>

</html>