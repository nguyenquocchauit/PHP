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
    $arrA = "";
    $arrB = "";
    $arrC = "";
    $ptA = "";
    $ptB = "";
    $tang = "";
    $giam = "";

    if (isset($_POST['arrA'])) {
        $arrA = $_POST['arrA'];
    }
    if (isset($_POST['arrB'])) {
        $arrB = $_POST['arrB'];
    }
    if (isset($_POST['xuly'])) {
        $mangA = explode(",", $arrA);
        $mangB = explode(",", $arrB);

        $ptA = count($mangA);
        $ptB = count($mangB);
        $arrC = implode(",", array_merge($mangA, $mangB));
        $mangC = explode(",", $arrC);
        sort($mangC);
        $tang = implode(",", $mangC);
        rsort($mangC);
        $giam = implode(",", $mangC);
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <th colspan="3" align="center">
                    <h3>ĐẾM PHẦN TỬ, GHÉP MẢNG, SẮP XẾP MẢNG</h3>
                </th>
            </tr>
            <tr>
                <td>Nhập mảng A:</td>
                <td><input type="text" name="arrA" value="<?php echo $arrA; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Nhập mảng B :</td>
                <td><input type="text" name="arrB" value="<?php echo $arrB; ?>" size="20" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="xuly" value="Thực hiện" /></td>
            </tr>
            <tr>
                <td>Số phần tử mảng A :</td>
                <td><input type="text" name="ptA" disabled="disabled" value="<?php echo $ptA; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Số phần tử mảng B :</td>
                <td><input type="text" name="ptB" disabled="disabled" value="<?php echo $ptB; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Mảng C:</td>
                <td><input type="text" name="arrC" disabled="disabled" value="<?php echo $arrC; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Mảng C tăng dần:</td>
                <td><input type="text" name="tang" disabled="disabled" value="<?php echo $tang; ?>" size="20" /></td>
            </tr>
            <tr>
                <td>Mảng C giảm dần :</td>
                <td><input type="text" name="giam" disabled="disabled" value="<?php echo $giam; ?>" size="20" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><label>(Các phần tử trong mảng được ngăn cách bởi dấu phẩy)</label></td>
            </tr>
        </table>
    </form>
    <?php include "../../includes/footer.php"; ?>

</body>

</html>