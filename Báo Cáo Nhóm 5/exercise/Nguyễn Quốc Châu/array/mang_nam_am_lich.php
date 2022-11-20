<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Mảng năm âm lịch</title>
    <style type="text/css">
        .input {
            background-color: yellow;
        }

        #divForm {
            width: 100%;
            text-align: center;
            background-color: #02edff3d;
        }

        .divform1 {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            background-color: #0030fd;
            color: white;
            border-radius: 5px;
        }

        button>img {
            height: 30px;
            width: 30px;
        }

        .imgshow>img {
            width: 220px;
            height: 200px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../includes/header.php"; ?>
        <?php
        if (isset($_POST["duonglich"]))
            $duonglich = $_POST["duonglich"];
        else
            $duonglich = "";
        if (isset($_POST["nam_al"]))
            $nam_al = $_POST["nam_al"];
        else
            $nam_al = "";
        $mang_can = array(
            "Quý", "Giáp", "Ắt", "Bính", "Đinh", "Mậu", "Kỷ",
            "Canh", "Tân", "Nhâm"
        );
        $mang_chi = array(
            "Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ",
            "Ngọ", "Mùi", "Thân", "Dậu", "Tuất"
        );
        $mang_hinh = array(
            "hoi.jpg ", "ty.jpg ", "suu.jpg ", "dan.jpg ", "mao.jpg ",
            "thin.jpg ", "ran.jpg ", "ngo.jpg ", "mui.jpg ", "than.jpg ", "dau.jpg ",
            "tuat.jpg "
        );
        $hinh_anh = null;
        if (isset($_POST['Exec'])) {
            if (isset($_POST['duonglich']) && $_POST['duonglich'] >= 10) {
                $nam = $_POST['duonglich'];
                if (is_numeric($nam)) {
                    $nam = $nam - 3;
                    $can = $nam % 10;
                    $chi = $nam % 12;
                    $nam_al = $mang_can[$can] . " " . $mang_chi[$chi];
                    $hinh = $mang_hinh[$chi];
                    $hinh_anh = "<img src='../images/Con_giap/$hinh' alt=''>";
                }
            }
        }
        ?>
        <form action="mang_nam_am_lich.php" method="post">
            <div id="divForm">
                <div class="divform1">
                    <div class="row p-1">
                        <label for="" class="fontlabel">TÍNH NĂM ÂM LỊCH</label>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col-4">
                        <label for="">Năm dương lịch</label>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <label for="">Năm dương lịch</label>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col-4">
                        <input type="text" class="form-control" name="duonglich" value="<?php echo $duonglich ?>" id="" pattern="[0-9]{}">
                    </div>
                    <div class="col-4 pt-1">
                        <button type="submit" name="Exec"><img src="../images/Con_giap/next.png" alt="submit" srcset=""></i></button>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control input" name="nam_al" value="<?php echo $nam_al ?>" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 imgshow">
                        <?php echo $hinh_anh ?>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </form>
        <?php include "../../../includes/footer.php"; ?>
    </div>
</body>

</html>