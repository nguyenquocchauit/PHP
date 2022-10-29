<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thông tin nhân viên</title>
    <style>
        form {
            width: 800px;
            height: 400px;
            background-color: lightpink;
            padding-left: 40px;
            padding-top: 20px;
        }

        td {
            padding: 5px;
        }

        .datetime {
            width: 165px;
            height: 20px;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    abstract class NhanVien
    {
        protected $name;
        private $gender;
        protected $ngaysinh;
        protected $ngayvaolam;
        protected $hesoluong;
        protected $con;
        public function setname($name)
        {
            $this->name = $name;
        }

        public function getname()
        {
            return $this->name;
        }

        public function setgender($gender)
        {
            $this->gender = $gender;
        }

        public function getgender()
        {
            return $this->gender;
        }

        public function setngaysinh($ngaysinh)
        {
            $this->ngaysinh = $ngaysinh;
        }

        public function getngaysinh()
        {
            return $this->ngaysinh;
        }

        public function setngayvaolam($ngayvaolam)
        {
            $this->ngayvaolam = $ngayvaolam;
        }

        public function getngayvaolam()
        {
            return $this->ngayvaolam;
        }
        public function sethesoluong($hesoluong)
        {
            $this->hesoluong = $hesoluong;
        }

        public function gethesoluong()
        {
            return $this->hesoluong;
        }
        public function setcon($con)
        {
            $this->con = $con;
        }

        public function getcon()
        {
            return $this->con;
        }


        abstract public function TinhLuong();
        abstract public function TinhTrocap();
        abstract public function TinhPhat();
        abstract public function TinhThuong($ngayvaolam);
    }
    class NVVanPhong extends NhanVien
    {
        private $ngayvang;
        const dmvang = 5;
        const dgphat = 500;

        const luongcb = 10000;
        public function setngayvang($ngayvang)
        {
            $this->ngayvang = $ngayvang;
        }

        public function getngayvang()
        {
            return $this->ngayvang;
        }

        public function TinhTrocap()
        {
            if ($this->getgender() == 'Nữ') {
                return 200 * $this->getcon() * 1.5;
            } else {
                return 200 * $this->getcon();
            }
        }
        public function TinhPhat()
        {
            if ($this->getngayvang() > self::dmvang) {
                return $this->getngayvang() * self::dgphat;
            } else
                return 0;
        }
        public function TinhLuong()
        {
            return self::luongcb * $this->gethesoluong() - $this->TinhPhat();
        }
        public function TinhThuong($ngayvaolam)
        {
            $year = "";
            $ngaylam = explode("/", $this->ngayvaolam);
            $year =  date("Y") - $ngaylam[2];
            return  1000 * $year;
        }
    }
    class NVSanXuat extends NhanVien
    {
        private $sosp;
        const dmsp = 500;
        const dgsp = 5000;

        public function setsosp($sosp)
        {
            $this->sosp = $sosp;
        }

        public function getsosp()
        {
            return $this->sosp;
        }
        public function TinhTrocap()
        {
            return 120 * $this->getcon();
        }

        public function ThuongSP()
        {
            return ($this->getsosp() - self::dmsp) * self::dgsp * 0.03;
        }
        public function TinhLuong()
        {
            ($this->getsosp() * self::dgsp) + $this->ThuongSP();
        }
        public function TinhPhat()
        {
            return 0;
        }
        public function TinhThuong($ngayvaolam)
        {
            $year = "";
            $ngaylam = explode("/", $this->ngayvaolam);
            return $year =  date("Y") - $ngaylam[2];
            $thuong = 1000 * $year;
        }
    }
    $tienluong =0;
    $phat=0;
    $thuong =0;
    $trocap =0;
    $thuclinh =0;
    if (isset($_POST['tinh'])) {
        
        if (isset($_POST['loainv']) && ($_POST['loainv']) == "vp") {
            $vp = new NVVanPhong();
            $vp->setname($_POST['name']);
            $vp->setgender($_POST['gender']);
            $vp->setngaysinh($_POST['ngaysinh']);
            $vp->setngayvaolam($_POST['ngayvaolam']);
            $vp->setcon($_POST['con']);
            $vp->sethesoluong($_POST['hesoluong']);
            $vp->setngayvang($_POST['ngayvang']);
            $tienluong = $vp->TinhLuong();
            $phat = $vp->TinhPhat();
            $thuong = $vp->TinhThuong($_POST['ngayvaolam']);
            $trocap = $vp->TinhTrocap();
            $thuclinh = number_format(($tienluong + $thuong + $trocap) - $phat) . " VNĐ";
        }
        if (isset($_POST['loainv']) && ($_POST['loainv']) == "sx") {
            $sx = new NVVanPhong();
            $sx->setname($_POST['name']);
            $sx->setgender($_POST['gender']);
            $sx->setngaysinh($_POST['ngaysinh']);
            $sx->setngayvaolam($_POST['ngayvaolam']);
            $sx->setcon($_POST['con']);
            $sx->sethesoluong($_POST['hesoluong']);
            $sx->setngayvang($_POST['ngayvang']);
            $tienluong = $sx->TinhLuong();
            $phat = $sx->TinhPhat();
            $thuong = $sx->TinhThuong($_POST['ngayvaolam']);
            $trocap = $sx->TinhTrocap();
            $thuclinh = number_format(($tienluong + $thuong + $trocap) - $phat) . " VNĐ";
        }
    }
    ?>
    <form action="" method="post">
        <h3>QUẢN LÝ NHÂN VIÊN</h3>
        <table>
            <tr>
                <td>Họ và tên :</td>
                <td><input type="text" name="name" required value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></td>
                <td>Số con:</td>
                <td><input type="text" name="con" required value="<?php if (isset($_POST['con'])) echo $_POST['con']; ?>" /></td>
            </tr>
            <tr>
                <td>Ngày sinh :</td>
                <td><input class="datetime" type="text" required name="ngaysinh" value="<?php if (isset($_POST['ngaysinh'])) echo $_POST['ngaysinh']; ?>" /></td>
                <td>Ngày vào làm : </td>
                <td><input class="datetime" type="text" required name="ngayvaolam" value="<?php if (isset($_POST['ngayvaolam'])) echo $_POST['ngayvaolam']; ?>" /></td>
            </tr>
            <tr>
                <td>Giới tính : </td>
                <td>
                    <input type="radio" name="gender" required value="Nam" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nam") echo 'checked="checked"' ?> />Nam
                    <input type="radio" name="gender" required value="Nữ" <?php if (isset($_POST['gender']) && ($_POST['gender']) == "Nữ") echo 'checked="checked"' ?> />Nữ
                </td>
                <td>Hệ số lương : </td>
                <td><input type="text" name="hesoluong" required value="<?php if (isset($_POST['hesoluong'])) echo $_POST['hesoluong']; ?>" /></td>
            </tr>
            <tr>
                <td>Loại nhân viên :</td>
                <td><input type="radio" name="loainv" required value="vp" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "vp") echo 'checked="checked"' ?> />Văn Phòng</td>
                <td><input type="radio" name="loainv" required value="sx" <?php if (isset($_POST['loainv']) && ($_POST['loainv']) == "sx") echo 'checked="checked"' ?> />Sản xuất</td>
            </tr>
            <tr>
                <td>Số ngày vắng :</td>
                <td><input type="text" name="ngayvang" required value="<?php if (isset($_POST['ngayvang'])) echo $_POST['ngayvang']; ?>" /></td>
                <td>Số sản phẩm :</td>
                <td><input type="text" name="sosp" required value="<?php if (isset($_POST['sosp'])) echo $_POST['sosp']; ?>" /></td>
            </tr>
            <tr>
                <td> </td>
                <td></td>
                <td><input type="submit" name="tinh" value="Tính Lương" /></td>
            </tr>
            <tr></tr>
            <tr>
                <td>Tiền lương : </td>
                <td><input type="text" name="tienluong" disabled="disabled" value="<?php echo number_format($tienluong) . "VNĐ"; ?>" size="20" /></td>
                <td>Trợ cấp</td>
                <td><input type="text" name="trocap" disabled="disabled" value="<?php echo number_format($trocap) . "VNĐ"; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Tiền thưởng :</td>
                <td><input type="text" name="thuong" disabled="disabled" value="<?php echo number_format($thuong) . "VNĐ"; ?>" size="20" /></td>
                <td>Tiền phạt :</td>
                <td><input type="text" name="phat" disabled="disabled" value="<?php echo number_format($phat) . "VNĐ"; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Thực lĩnh :</td>
                <td><input type="text" name="thuclinh" disabled="disabled" value="<?php echo $thuclinh; ?>" size="20" /></td>
            </tr>
        </table>
    </form>
</body>

</html>