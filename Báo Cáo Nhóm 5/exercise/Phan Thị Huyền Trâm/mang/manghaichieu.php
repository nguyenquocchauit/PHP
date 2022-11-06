<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mảng 2 chiều</title>
    <style>
        input {
            width: 150px;
        }
    </style>
</head>

<body>
    <?php
    $KetQua = "";
    if (isset($_POST["SoDong"]))
        $soDong = $_POST["SoDong"];
    else
        $soDong = "";
    if (isset($_POST["SoCot"]))
        $soCot = $_POST["SoCot"];
    else
        $soCot = "";
    $array = [];
    if (isset($_POST["Send"])) {
        if (($soDong <= 5 and $soDong >= 2) and ($soCot <= 5 and $soCot >= 2)) {
            for ($i = 0; $i < $soDong; $i++)
                for ($j = 0; $j < $soCot; $j++) {
                    $array[$i][$j] = rand(-1000, 1000);
                }
            for ($i = 0; $i < $soDong; $i++) {
                for ($j = 0; $j < $soCot; $j++) {
                    if ($array[$i][$j] < 0)
                        $KetQua .= "&nbsp;&nbsp;&nbsp;(" . $array[$i][$j] . ")&nbsp;&nbsp;&nbsp;&nbsp;";
                    else
                        $KetQua .= "&nbsp;&nbsp;&nbsp;&nbsp;" . $array[$i][$j] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                $KetQua .= "&#10;";
            }
            $KetQua .= "&#10;Các phần tử thuộc dòng chẵn cột lẻ (dòng,cột):&#10;" . Num_EvenRow_OddCol($array, $soDong, $soCot);
            $Get = (TongPT_Boi10($array, $soDong, $soCot));
            if ($Get == 0)
                $KetQua .= "&#10;Tổng các phần tử là bội số của 10: không có";
            else
                $KetQua .= "&#10;Tổng các phần tử là bội số của 10: " . $Get;
        } else {
            $KetQua .= "Số dòng hoặc số cột >=2 và <=5";
        }
    }
    function Num_EvenRow_OddCol($arr, $soDong, $soCot)
    {
        $KetQuaFunc = "";
        for ($i = 0; $i < $soDong; $i++) {
            for ($j = 0; $j < $soCot; $j++) {
                if (($j % 2 == 0) && ($i % 2 != 0)) {
                    $VTi = $i + 1;
                    $VTj = $j + 1;
                    $KetQuaFunc .= $arr[$i][$j] . " tại vị trí ($VTi,$VTj)&#10;";
                }
            }
        }
        return $KetQuaFunc;
    }
    function TongPT_Boi10($arr, $soDong, $soCot)
    {
        $KetQuaFun = "";
        $sum = 0;
        for ($i = 0; $i < $soDong; $i++) {
            for ($j = 0; $j < $soCot; $j++) {
                if ($arr[$i][$j] % 10 == 0) {
                    $sum += $arr[$i][$j];
                }
            }
        }
        $KetQuaFun = number_format($sum);
        return $KetQuaFun;
    }
    ?>
    <form accept="xulymanghaichieusonguyen.php" method="post">
        <div class="input-group mb-3 p-2">
            <button type="button" class="btn btn-outline-secondary" style="width: 130px;">Nhập số dòng</button>
            <input type="text" pattern="[0-9]+" title="Vui lòng nhập đúng định dạng số nguyên!" class="form-control" name="SoDong" value="<?php echo $soDong ?>" required>
        </div>
        <div class="input-group mb-3 p-2">
            <button type="button" class="btn btn-outline-secondary" style="width: 130px;">Nhập số cột</button>
            <input type="text" pattern="[0-9]+" title="Vui lòng nhập đúng định dạng số nguyên!" class="form-control" name="SoCot" value="<?php echo $soCot ?>" required>
        </div>
        <button type="submit" class="btn btn-success" name="Send" style="margin-left: 8px;">Thực hiện</button>
        <div class="mb-3 pt-3 p-2">
            <textarea class="form-control" name="KetQua" placeholder="Kết quả" rows="5"><?php echo $KetQua ?></textarea>
        </div>
    </form>
</body>

</html>