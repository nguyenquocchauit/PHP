<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
</body>

</html>