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
            border: 1px solid black;
            width: 400px;
            height: 180px;
            text-align: center;
            background-color: lightpink;
            font-family: 'Times New Roman', Times, serif;
        }

        .inputnam {
            width: 220px;
        }

        h3 {
            background-color: lightcoral;
        }
    </style>
</head>

<body>
    <?php include "../../includes/header.php"; ?>
    <?php
    $kq = "";
    function namnhuan($nam)
    {
        return (($nam % 400 === 0) || (($nam % 4 === 0) && !($nam % 100 === 0)));
    }
    if (isset($_POST["nam"])) {
        $nam = $_POST["nam"];

        foreach (range(2000, $nam) as $nam) {
            if (namnhuan($nam)) {
                $kq = $kq . $nam . " ";
            }
        }
        if ($kq != " ")
            $kq = $kq . "là năm nhuận";
        else
            $kq = "Không có năm nhuận";
    }
    ?>
    <form action="" method="post">
        <table>
            <!-- <tr><p>Năm nhập vào nhỏ hơn 2000</p></tr> -->
            <tr>
                <h3>TÌM NĂM NHUẬN</h3>
            </tr>
            <tr>
                <td style="padding-left: 15px;">Năm : </td>
                <td><input type="text" class="inputnam" name="nam" value="<?php if (isset($_POST['nam'])) echo $_POST['nam']; ?>" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="tim" value="Tìm năm nhuận" /></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"><textarea name="ketqua" cols="40" rows="2" disabled="disabled"><?php echo $kq; ?></textarea></td>
            </tr>

        </table>
    </form>
    <?php include "../../includes/footer.php"; ?>

</body>

</html>