<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mảng năm nhuận</title>
    <style type="text/css">
        * {
            font-size: 20px;
        }

        body {
            text-align: center;
        }

        form {
            padding: 200px 560px;
            display: inline-block;
        }

        .fontlabel {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            font-size: 22px;
        }

        #divForm {
            width: 500px;
            height: 455px;
            text-align: center;
        }

        .divform1 {
            background-color: #0030fd;
            color: white;
            border-radius: 5px;
        }

        .divform2 {
            background-color: #02edff3d;
        }

        .formbtn {
            justify-content: center;
        }

        .formbtn>button {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            width: 45%;
            font-size: 20px;
            color: red;
        }

        .colortitle {
            color: #0030fd;
        }

        .input {
            width: 80%;
            height: 85%;
        }

        .message {
            width: 94%;
            background-color: #ffff006b;
            margin-left: 3%;
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["namnho"]))
        $namnho = $_POST["namnho"];
    else
        $namnho = 0;
    if (isset($_POST["namlon"]))
        $namlon = $_POST["namlon"];
    else
        $namlon = 0;
    $message1 = null;
    $message2 = null;
    $divmessage1 = null;
    $divmessage2 = null;
    if (isset($_POST["send"])) {
        if (!is_numeric($namnho)) {
            $message1 = "Nhập sai định dạng số năm!";
            $divmessage = "<div class='message'>
                    <label for=''>$message1</label>
                </div>";
        } else {
            if ($namnho > 2000) {
                $message1 = "Nhập số năm nhỏ hơn 2000!";
                $divmessage1 = "<div class='message'>
                    <label for=''>$message1</label>
                </div>";
            } else {
                foreach (range(2000, $namnho) as $years) {
                    if (nam_nhuan($years))
                        $message1 .= $years . " ";
                }
                if ($message1 != "") {
                    $message1 = "$message1 là năm nhuận!";
                    $divmessage1 = "<div class='message'>
                    <label for=''>$message1</label>
                </div>";
                } else {
                    $message1 = "Không có năm nhuận!";
                    $divmessage1 = "<div class='message'>
                    <label for=''>$message1</label>
                </div>";
                }
            }
        }

        if (!is_numeric($namlon)) {
            $message2 = "Nhập sai định dạng số năm!";
            $divmessage2 = "<div class='message'>
                    <label for=''>$message2</label>
                </div>";
        } else {
            if ($namlon < 2000) {
                $message2 = "Nhập số năm nhỏ hơn 2000!";
                $divmessage2 = "<div class='message'>
                    <label for=''>$message2</label>
                </div>";
            } else {
                foreach (range(2000,$namlon) as $years) {
                    if (nam_nhuan($years))
                        $message2 .= $years . " ";
                }
                if ($message2 != "") {
                    $message2 = "$message2 là năm nhuận!";
                    $divmessage2 = "<div class='message'>
                    <label for=''>$message2</label>
                </div>";
                } else {
                    $message2 = "Không có năm nhuận!";
                    $divmessage2 = "<div class='message'>
                    <label for=''>$message2</label>
                </div>";
                }
            }
        }
    }
    function nam_nhuan($year)
    {
        return $year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0);
    }

    ?>
    <form action="mang_nam_nhuan.php" method="post">
        <div id="divForm">
            <div class="row p-1">
                <label for="" class="colortitle">Năm nhập vào NHỎ hơn 2000:</label>
            </div>
            <div class="divform1">
                <div class="row p-1">
                    <label for="" class="fontlabel">TÌM NĂM NHUẬN</label>
                </div>
            </div>
            <div class="divform2">
                <div class="row p-1">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <label for="">Năm :</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control input" name="namnho" value="<?php echo $namnho ?>" id="">
                    </div>
                </div>
                <div class="row p-1">
                    <?php echo $divmessage1 ?>
                </div>
                <div class="row p-1 formbtn">
                    <button type="submit" name="send" class="btn btn-info border border-danger">Tìm năm nhuận</button>
                </div>
            </div>
            <div class="row p-1">
                <label for="" class="colortitle">Năm nhập vào LỚN hơn 2000:</label>
            </div>
            <div class="divform1">
                <div class="row p-1">
                    <label for="" class="fontlabel">TÌM NĂM NHUẬN</label>
                </div>
            </div>
            <div class="divform2">
                <div class="row p-1">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <label for="">Năm :</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control input" name="namlon" value="<?php echo $namlon ?>" id="">
                    </div>
                </div>
                <div class="row p-1">
                    <?php echo $divmessage2?>
                </div>
                <div class="row p-1 formbtn">
                    <button type="submit" name="send" class="btn btn-info border border-danger">Tìm năm nhuận</button>
                </div>
            </div>
        </div>
    </form>

</body>

</html>