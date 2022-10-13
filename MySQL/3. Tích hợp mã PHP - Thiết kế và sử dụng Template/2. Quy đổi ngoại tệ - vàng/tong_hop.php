<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi ngoại tệ - Vàng</title>
    <script>
        $(document).ready(function() {
            $('#gold').mask('000.000.000', {
                reverse: true
            });
        });
        $(document).ready(function() {
            $('#money').mask('000.000.000', {
                reverse: true
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
    </style>
</head>

<body>
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
                        <table class="table_child">
                            <thead>
                                <tr>
                                    <td class="title_child" colspan="2" align="center">ĐỔI NGOẠI TỆ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bgtr">
                                    <td>Số tiền: </td>
                                    <td>
                                        <input type="text" name="money" id="money" value="" class="form-control " id="inputPrice" pattern="[0-9]+([\.,][0-9]+[0-9]+([\.,][0-9]+)?" title="Vui lòng nhập đúng định dạng số!" required>
                                    </td>
                                </tr>
                                <tr class="bgtr">
                                    <td>Loại ngoại tệ: </td>
                                    <td><input type="text"></td>
                                </tr>
                                <tr class="bgtr">
                                    <td>Tỉ giá VND: </td>
                                    <td><input type="text" value="" disabled></td>
                                </tr>
                                <tr class="bgtr">
                                    <td>Thành tiền VND: </td>
                                    <td><input type="text" value="" disabled></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td id="td_table2">
                        <table class="table_child">
                            <tr>
                                <td class="title_child" colspan="2" align="center">MUA VÀNG</td>
                            </tr>
                            <tr class="bgtr">
                                <td>Số vàng: </td>
                                <td>
                                    <input type="text" name="gold" id="gold" value="" class="form-control " id="inputPrice" pattern="[0-9]+([\.,][0-9]+[0-9]+([\.,][0-9]+)?" title="Vui lòng nhập đúng định dạng số!" required>
                                </td>
                            </tr>
                            <tr class="bgtr">
                                <td>Loại vàng vàng: </td>
                                <td>
                                    <input type="radio" name="typeGold" id="" value="SJC">SJC
                                    <input type="radio" name="typeGold" id="" value="AAA">AAA
                                    <input type="radio" name="typeGold" id="" value="PNJ">PNJ
                                </td>
                            </tr>
                            <tr class="bgtr">
                                <td>Đơn giá: </td>
                                <td><input type="text" value="" disabled></td>
                            </tr>
                            <tr class="bgtr">
                                <td>Thành tiền VND: </td>
                                <td><input type="text" value="" disabled></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="bgtr">
                    <td colspan="4" align="center"></button><button name="Exec" id="Exec" type="submit" class="btn-exec">Tính lương</button></button></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>