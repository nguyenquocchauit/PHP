<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Xếp hạng bài hát</title>
    <script>
        $(document).ready(function() {
            $('#ExecLevel').click(function() {
                document.getElementById("level").required = false;
                document.getElementById("nameSong").required = false;
            })

        });

        function resetForm(myFormId) {
            var myForm = document.getElementById(myFormId);

            for (var i = 0; i < myForm.elements.length; i++) {
                if ('reset' != myForm.elements[i].type) {
                    myForm.elements[i].value = '';
                    myForm.elements[i].selectedIndex = 0;
                }
            }
        };
    </script>
    <style>
        td {
            padding: 3px;
        }


        input {
            font-size: 25px;
            width: 98%;
            height: 27px;
        }

        .btn-exec {
            font-size: 23px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            height: 40px;
            width: 280px;
            border-radius: 15px;
            background-color: yellow;
        }

        #title {
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            background-color: #b02789b8;
        }

        .bgtr {
            background-color: pink;
        }

        table {
            width: 100%;
            border: 1px solid;
        }

        textarea {
            font-size: 20px;
        }
    </style>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../includes/header.php"; ?>
        <?php
        session_start();
        if (isset($_POST['nameSong']))
            $nameSong = $_POST['nameSong'];
        else
            $nameSong = '';
        if (isset($_POST['level']))
            $level = $_POST['level'];
        else
            $level = '';
        if (isset($_POST['KetQua']))
            $KetQua = $_POST['KetQua'];
        else
            $KetQua = '';
        if (isset($_POST['ExecSong'])) {
            // khởi tạo mảng chứa tên và thứ hạng
            $array = array(
                $nameSong => $level
            );
            // lồng mảng chứa tên và thứ hạng và session
            $_SESSION['List'][] = $array;
            $KetQua = "Bài hát:" . $nameSong . " - Hạng: " . $level . "\n" . $KetQua  . "\n";
        }
        if (isset($_POST['ExecLevel'])) {
            $KetQuaList = null;
            $KetQua = $_POST['KetQua'];
            $rankingList = array();
            foreach ($_SESSION as $k => $v) {
                foreach ($v as $k1 => $v1) {
                    foreach ($v1 as $key => $value) {
                        $rankingList[$key] = $value;
                    }
                }
            }
            asort($rankingList);
            foreach ($rankingList as $key => $value)
                $KetQuaList .=  $key . "&nbsp;-&nbsp;&nbsp;" . $value . "&#10;";
            $KetQua = "Bảng xếp hạng: &#10;" . $KetQuaList;
        }
        if (isset($_POST['ExecLevel'])) {
            session_unset();
            session_destroy();
        }

        ?>
        <form action="" method="post" id="myFormId">
            <table>
                <tr>
                    <td id="title" colspan="2" align="center">XẾP HẠNG BÀI HÁT</td>
                </tr>
                <tr class="bgtr">
                    <td>Nhập tên bài hát: </td>
                    <td><input class="inp" type="text" value="<?php echo $nameSong ?>" name="nameSong" id="nameSong" required></td>
                </tr>
                <tr>
                    <td>Hạng: </td>
                    <td><input class="inp" type="text" value="<?php echo $level ?>" name="level" id="level" pattern="[0-9]+" required></td>
                </tr>
                <tr class="bgtr">
                    <td></td>
                    <td>
                        <button name="ExecSong" id="ExecSong" type="submit" class="btn-exec">Thêm bài hát</button>
                        <button name="ExecLevel" id="ExecLevel" type="submit" class="btn-exec">Bảng xếp hạng</button>
                        </button><button name="ExecReset" id="ExecReset" type="reset" class="btn-exec" onclick="resetForm('myFormId'); return false;">Reset Session</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><textarea class="form-control text" name="KetQua" placeholder="Danh sách" rows="10" cols="105"><?php echo $KetQua ?></textarea></td>
                </tr>
            </table>
        </form>
        <?php include "../../../includes/footer.php"; ?>
    </div>
</body>

</html>