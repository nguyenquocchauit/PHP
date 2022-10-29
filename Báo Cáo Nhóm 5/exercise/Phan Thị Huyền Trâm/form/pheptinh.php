<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BÀI FORM PHÉP TÍNH</title>
    <link rel="stylesheet" href="pheptinh.css">
</head>
<body>
<?php 
    if(isset($_POST['so1']))  
        $so1=trim($_POST['so1']); 
    else $so1=0;
    if(isset($_POST['so2'])) 
        $so2=trim($_POST['so2']); 
    else $so2=0;
    if(isset($_POST['tinh']))
        if (!is_numeric($so1) && !is_numeric($so2))  
        {
            echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
        }         
?>    
    <form action="../formpheptinh/ketqua.php" method="post">
        <h2>Phép tính trên hai số</h2>
        <table>
            <tr>
                <td>Chọn phép tính :</td>
                <td>
                    <input type="radio" id="" value="Cộng" name="radiobtn"  checked>Cộng
                    <input type="radio" id="" value="Trừ"  name="radiobtn">Trừ
                    <input type="radio" id="" value="Nhân" name="radiobtn">Nhân
                    <input type="radio" id="" value="Chia" name="radiobtn">Chia
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất : </td>
                <td><input type="text" pattern="[0-9]+" name="so1" require value="<?php  echo $so1;?> "/></td>
            </tr>
            <tr>
                <td>Số thứ hai : </td>
                <td><input type="text" pattern="[0-9]+" name="so2" require value="<?php  echo $so2;?> "/></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" ><input type="submit" value="Tính" name="tinh" /></td>
            </tr>
        </table>
    </form>
</body>
</html>