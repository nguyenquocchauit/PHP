<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính </title>
    <link rel="stylesheet" href="pheptinh.css">
</head>
<body>
<?php
$pt =  $_POST["radiobtn"];
$a = $_POST["so1"];
$b = $_POST["so2"];

    if($pt == "Cộng")
    {
        $ketqua = $a + $b;
    }
    elseif ($pt == "Trừ")
    {
        $ketqua = $a - $b;
    }
    elseif ($pt == "Nhân")
    {
        $ketqua = $a * $b;
    }
    elseif ($pt == "Chia")
    {
        $ketqua = $a / $b;
    }
?>
<form action="" method="post">
        <h2>Phép tính trên hai số</h2>
        <table>
            <tr>
                <td>Chọn phép tính :</td>
                <td>
                    <?php echo $_POST["radiobtn"] ?>
                </td>
            </tr>
                <td>Số thứ nhất : </td>
                <td><input type="text" name="so1" value="<?php echo $_POST["so1"]; ?> "/></td>
            </tr>
            <tr>
                <td>Số thứ hai : </td>
                <td><input type="text" name="so2" value="<?php  echo $_POST["so2"];?> "/></td>
            </tr>
            <tr>
                <td>Kết quả: </td>
                <td><input type="text" name="ketqua" value="<?php  echo $ketqua;?> " disabled="disabled"/></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>              
            </tr>
        </table>
    </form>
</body>
</html>