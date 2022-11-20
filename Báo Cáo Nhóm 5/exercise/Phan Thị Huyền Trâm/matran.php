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
</head>

<body>
    <?php include "../../includes/header.php"; ?>
    <?php

    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nhập số dòng : </td>
                <td><input type="text" name="dong" size="20" value="<?php if (isset($_POST['dong'])) echo $_POST['dong']; ?> " /></td>
            </tr>
            <tr>
                <td>Nhập số cột : </td>
                <td><input type="text" name="cot" size="20" value="<?php if (isset($_POST['cot'])) echo $_POST['cot']; ?> " /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="show" size="20" value="Hiển thị" /></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua ?></textarea></td>
            </tr>
        </table>
    </form>
    <?php include "../../includes/header.php"; ?>
</body>

</html>