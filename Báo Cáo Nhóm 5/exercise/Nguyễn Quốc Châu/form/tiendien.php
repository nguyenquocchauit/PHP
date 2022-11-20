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

    <title>Tính tiền điện</title>
    <style type="text/css">
        table {
            width: 100%;
            background: #ffd94d;
            border: 0 solid yellow;
        }

        thead {

            background: #fff14d;
        }

        td {
            color: blue;
        }

        h3 {
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../includes/header.php"; ?>
        <?php
        $dongiagoc = 20000;
        if (isset($_POST["name"]))
            $name = trim($_POST["name"]);
        else
            $name = "";
        if (isset($_POST["chiSoCu"]))
            $chiSoCu = trim($_POST["chiSoCu"]);
        else
            $chiSoCu = 0;
        if (isset($_POST["chiSoMoi"]))
            $chiSoMoi = trim($_POST["chiSoMoi"]);
        else
            $chiSoMoi = 0;
        if (isset($_POST["donGia"]))
            $donGia = trim($_POST["donGia"]);
        else
            $donGia = $dongiagoc;
        if (isset($_POST["tinh"])) {
            if (trim($_POST["name"] == " ")) {
                $thanhToan = 0;
                echo "<font color='red'>Vui lòng nhập vào đầy đủ tên ! </font> <br>";
            } else
            if (is_numeric($chiSoCu) == false) {
                echo "<font color='red'>Vui lòng nhập vào chỉ số cũ là số! </font>";
                $thanhToan = 0;
            } else
                if (is_numeric($chiSoMoi) == false) {
                echo "<font color='red'>Vui lòng nhập vào chỉ số mới là số! </font>";
                $thanhToan = 0;
            } else
                    if (($chiSoCu) >= ($chiSoMoi)) {
                $thanhToan = 0;
                echo "<font color='red'>Vui lòng nhập vào chỉ số mới lớn hơn chỉ số cũ! </font>";
            } else
                $thanhToan = number_format((($chiSoMoi - $chiSoCu) * $dongiagoc));
        } else
            $thanhToan = 0;

        ?>
        <form action="tiendien.php" method="post">
            <table>
                <thead>
                    <th colspan="2" align="center">
                        <h3>THANH TOÁN TIỀN ĐIỆN</h3>
                    </th>
                </thead>
                <tr>
                    <td>Tên chủ hộ:</td>
                    <td><input type="text" name="name" value="<?php echo $name; ?> " pattern="^(?:((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-.\s])){1,}(['’,\-\.]){0,1}){2,}(([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-. ]))*(([ ]+){0,1}(((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){1,})(['’\-,\.]){0,1}){2,}((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){2,})?)*)$" title="Vui lòng nhập đúng tên thật!" required /></td>
                </tr>
                <tr>
                    <td>Chỉ số cũ:</td>
                    <td><input type="text" name="chiSoCu" value="<?php echo $chiSoCu; ?> " required />(Kw)</td>
                </tr>
                <tr>
                    <td>Chỉ số mới:</td>
                    <td><input type="text" name="chiSoMoi" value="<?php echo $chiSoMoi; ?> " required />(Kw)</td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input type="text" name="donGia" value="<?php echo $donGia; ?> " />(VNĐ)</td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán:</td>
                    </td>
                    <td><input type="text" name="thanhToan" disabled="disabled" value="<?php echo $thanhToan; ?> " />(VNĐ)</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
                </tr>
            </table>
        </form>
        <?php include "../../../includes/footer.php"; ?>
    </div>

</body>

</html>