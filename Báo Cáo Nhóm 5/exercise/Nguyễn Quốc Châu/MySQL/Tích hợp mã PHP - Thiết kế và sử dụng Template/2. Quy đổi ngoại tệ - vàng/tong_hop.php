<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    <title>Đổi ngoại tệ - Vàng</title>
    <script>
        function loadFunc() {
            var currency = document.getElementById("currency");
            switch (currency.value) {
                case "USD":
                    document.getElementById("rateVND").value = "16.177";
                    break;
                case "AUD":
                    document.getElementById("rateVND").value = "14.057";
                    break;
                case "YPJ":
                    document.getElementById("rateVND").value = "13.600";
                    break;
                case "EUR":
                    document.getElementById("rateVND").value = "22.486";
                    break;
            }
            if (document.getElementById("typeGoldAAA").checked == true) {
                document.getElementById("rateGold").value = "1.305.000";
            }
            if (document.getElementById("typeGoldSJC").checked == true) {
                document.getElementById("rateGold").value = "1.306.000";
            }
            if (document.getElementById("typeGoldPNJ").checked == true) {
                document.getElementById("rateGold").value = "1.302.000";
            }
        }
        $(document).ready(function() {
            $('#gold').mask('000.000.000', {
                reverse: true
            });
            $('#money').mask('000.000.000', {
                reverse: true
            });
            $('#td_table1').click(function() {
                document.getElementById("typeGoldSJC").required = false;
                document.getElementById("typeGoldAAA").required = false;
                document.getElementById("typeGoldPNJ").required = false;
                document.getElementById("gold").required = false;
                document.getElementById("gold").value = null;
                document.getElementById("intoMoney2").value = null;
                $('.table_child1').removeClass('disableinfo');
                $('#td_Exec').removeClass('disableinfo');
                $('.table_child2').addClass('disableinfo');
            });
            $('#td_table2').click(function() {
                document.getElementById("money").required = false;
                document.getElementById("money").value = null;
                document.getElementById("intoMoney1").value = null;
                document.getElementById("currency").required = false;
                $('.table_child2').removeClass('disableinfo');
                $('#td_Exec').removeClass('disableinfo');
                $('.table_child1').addClass('disableinfo');
            });
            $('#currency').change(function() {
                var currency = document.getElementById("currency");
                switch (currency.value) {
                    case "USD":
                        document.getElementById("rateVND").value = "16.177";
                        break;
                    case "AUD":
                        document.getElementById("rateVND").value = "14.057";
                        break;
                    case "YPJ":
                        document.getElementById("rateVND").value = "13.600";
                        break;
                    case "EUR":
                        document.getElementById("rateVND").value = "22.486";
                        break;
                }
            });
            $('#typeGold').change(function() {
                if (document.getElementById("typeGoldAAA").checked == true) {
                    document.getElementById("rateGold").value = "1.305.000";
                }
                if (document.getElementById("typeGoldSJC").checked == true) {
                    document.getElementById("rateGold").value = "1.306.000";
                }
                if (document.getElementById("typeGoldPNJ").checked == true) {
                    document.getElementById("rateGold").value = "1.302.000";
                }

            });
        });
    </script>
    <style>
        * {
            font-size: 25px;
        }

        body {
            max-width: 1550px;

        }

        img {
            width: 100%;
            object-fit: cover;
        }

        .title {
            font-size: 45px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            background-color: #ffc107;
        }

        table {
            width: 100%;
        }

        .btn-exec {
            font-size: 23px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            height: 40px;
            width: 280px;
            border-radius: 15px;
            background-color: #00bcd4d9;
        }

        .title_child {
            font-size: 27px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }

        .table_child {
            width: 90%;
            background-color: #db423e17;
        }

        #tbody {
            background-color: #6407ff0d;
        }

        #td_table1 {
            padding: 0px 0px 0px 65px;
        }

        .inp {
            height: 55px;
            width: 90%;
        }

        .disableinfo {
            pointer-events: none;
            opacity: 0.4;
        }
        #typeGold{
            height: 55px;
        }
        #typeGold>input {
            height: 25px;
            width: 50px;
        }
    </style>
</head>

<body onload="loadFunc()">
    <?php
    if (isset($_POST['money']))
        $money = str_replace('.', '', $_POST['money']);
    else
        $money = null;
    if (isset($_POST['gold']))
        $gold = str_replace('.', '', $_POST['gold']);
    else
        $gold = null;
    if (isset($_POST['currency']))
        $currency = $_POST['currency'];
    else
        $currency = null;
    if (isset($_POST['typeGold']))
        $typeGold = $_POST['typeGold'];
    else
        $typeGold = null;
    $usd = null;
    $ypj =  null;
    $aud = null;
    $eur = null;
    switch ($currency) {
        case "USD":
            $aud = null;
            $eur = null;
            $ypj = null;
            $usd = "selected";
            break;
        case "AUD":
            $aud = "selected";
            $eur = null;
            $ypj = null;
            $usd = null;
            break;
        case "EUR":
            $aud = null;
            $eur = "selected";
            $ypj = null;
            $usd = null;
            break;
        case "YPJ":
            $aud = null;
            $eur = null;
            $ypj = "selected";
            $usd = null;
            break;
    }
    if (isset($_POST['rateVND']))
        $rateVND = str_replace('.', '', $_POST['rateVND']);
    else
        $rateVND = null;
    if (isset($_POST['rateGold']))
        $rateGold = str_replace('.', '', $_POST['rateGold']);
    else
        $rateGold = null;

    $sjc = null;
    $aaa = null;
    $pnj = null;
    switch ($typeGold) {
        case "SJC":
            $sjc = "checked";
            $aaa = null;
            $pnj = null;
            break;
        case "AAA":
            $sjc = null;
            $aaa = "checked";
            $pnj = null;
            break;
        case "PNJ":
            $sjc = null;
            $aaa = null;
            $pnj = "checked";
            break;
    }
    // inlcude file đổi ngoại tệ
    include "../doi_ngoai_te.php";
    $intoMoney1 = null;
    $intoMoney2 = null;
    if (isset($_POST['Exec'])) {
        if ($money !=null && isset($currency)) {
            $intoMoney1 = number_format(doi_tien($currency, $money, $rateVND)) . " VNĐ";
        } else
        if ($gold !=null  && isset($typeGold)) {
            $intoMoney2 = number_format(doi_vang($typeGold, $gold, $rateGold)) . " VNĐ";
        }
    }
    ?>
    <form action="" method="post">
        <div class="row">
            <img src="banner.png" alt="" srcset="">
        </div>
        <table>
            <tr>
                <td class="title" colspan="4" align="center">Đổi ngoại tệ - Vàng</td>
            </tr>
            <tbody id="tbody">
                <tr class="bgtr ">
                    <td id="td_table1">
                        <table class="table_child table_child1 disableinfo">
                            <thead>
                                <tr>
                                    <td class="title_child" colspan="2" align="center">ĐỔI NGOẠI TỆ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bgtr">
                                    <td>Số tiền: </td>
                                    <td>
                                        <input type="text" name="money" id="money" value="<?php echo $money ?>" class="form-control inp" id="inputPrice" pattern="[0-9]+([\.,][0-9]+[0-9]+([\.,][0-9]+)?" title="Vui lòng nhập đúng định dạng số!" required>
                                    </td>
                                </tr>
                                <tr class="bgtr">
                                    <td>Loại ngoại tệ: </td>
                                    <td>
                                        <select name="currency" class="form-control inp" id="currency" required>
                                            <option value="">Chọn ngoại tệ</option>
                                            <option value="USD" <?php echo $usd ?>>Đô la Mỹ</option>
                                            <option value="AUD" <?php echo $aud ?>>Đô la Úc</option>
                                            <option value="YPJ" <?php echo $ypj ?>>Yên Nhật</option>
                                            <option value="EUR" <?php echo $eur ?>>Euro</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="bgtr">
                                    <td>Tỉ giá VND: </td>
                                    <td><input type="text" id="rateVND" name="rateVND" class="form-control inp" value="<?php echo $rateVND ?>" readonly></td>
                                </tr>
                                <tr class="bgtr">
                                    <td>Thành tiền VND: </td>
                                    <td><input type="text" class="form-control inp" id="intoMoney1" value="<?php echo $intoMoney1 ?>" disabled></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td id="td_table2">
                        <table class="table_child table_child2 disableinfo">
                            <tr>
                                <td class="title_child" colspan="2" align="center">MUA VÀNG</td>
                            </tr>
                            <tr class="bgtr">
                                <td><label for="gold">Số vàng:</label></td>
                                <td>
                                    <input type="text" class="form-control inp" name="gold" id="gold" value="<?php echo $gold ?>" class="form-control " id="inputPrice" pattern="[0-9]+([\.,][0-9]+[0-9]+([\.,][0-9]+)?" title="Vui lòng nhập đúng định dạng số!" required>
                                </td>
                            </tr>
                            <tr class="bgtr">
                                <td>Loại vàng vàng: </td>
                                <td id="typeGold">
                                    <input type="radio" name="typeGold" id="typeGoldSJC" value="SJC" <?php echo $sjc ?> required>SJC
                                    <input type="radio" name="typeGold" id="typeGoldAAA" value="AAA" <?php echo $aaa ?> required>AAA
                                    <input type="radio" name="typeGold" id="typeGoldPNJ" value="PNJ" <?php echo $pnj ?> required>PNJ
                                </td>
                            </tr>
                            <tr class="bgtr">
                                <td>Đơn giá: </td>
                                <td><input type="text" id="rateGold" name="rateGold" class="form-control inp" value="<?php echo $rateGold ?>" readonly></td>
                            </tr>
                            <tr class="bgtr">
                                <td>Thành tiền VND: </td>
                                <td><input type="text" class="form-control inp" id="intoMoney2" value="<?php echo $intoMoney2 ?>" disabled></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="bgtr">
                    <td class="disableinfo" id="td_Exec" colspan="4" align="center"></button><button name="Exec" id="Exec" type="submit" class="btn-exec">Tính lương</button></button></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>