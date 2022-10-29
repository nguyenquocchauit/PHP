<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tinhtiendien</title>
    <style type="text/css">
        body {  
            
        }
        table{
            background: #ffd94d;
            border: 0 solid yellow;
        }
        thead{
            background: #fff14d;    
        }
        td {
            color: blue;
        }
        h3{
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_POST['tench']))  
            $tench=trim($_POST['tench']); 
        else  
        {
            $tench ="";
          
        } 
        if(isset($_POST['csc'])) 
            $csc=trim($_POST['csc']); 
        else $csc=0;
        if(isset($_POST['csm'])) 
            $csm=trim($_POST['csm']); 
        else $csm=0;
        if(isset($_POST['tinh']))
        if($tench && ($tench != (integer)$tench)&&($tench != (double)$tench))
        {
            if (is_numeric($csc) && is_numeric($csm)) 
                {
                    if(($csm)>($csc)) 
                    {
                        $sotien=($csm - $csc)*2000;
                    } 
                    else {
                        $sotien=0;   
                        echo "<font color='red'>Chỉ số cũ phải bé hơn chỉ số mới  </font>"; 
                    }  
                }    
            else 
                {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                    $sotien=0;
                }
        }
        else 
        {
            echo "<font color='red'>Vui lòng nhập vào tên chủ hộ ! </font>";
            $sotien="0";
        }
        else 
            $sotien="0";
                
    ?> 
<form action="" method="post">
<table>
    <thead>
        <th colspan="2" align="center"><h3>THANH TOÁN TIỀN ĐIỆN</h3></th>
    </thead>
    <tr>
        <td>Tên chủ hộ :</td>
        <td><input type="text" name="tench" value="<?php  echo $tench;?> "/></td>
    </tr>
    <tr>
        <td>Chỉ số cũ :</td>
        <td><input type="text" name="csc" value="<?php  echo $csc;?> "/>(Kw)</td>
    </tr>
    <tr>
        <td>Chỉ số mới:</td>
        <td><input type="text" name="csm" value="<?php  echo $csm;?> "/>(Kw)</td>
    </tr>
    <tr>
        <td>Đơn giá :</td>
        <td><input type="text" name="dg"value="<?php  echo "2000";?> "/>(VNĐ)</td>
    </tr>
    <tr>
        <td>Số tiền thanh toán :</td>
        <td><input type="text" name="sotien" disabled="disabled" value="<?php  echo $sotien;?> "/>(VNĐ)</td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
    </tr>
</table>
</form>
</body>
</html>