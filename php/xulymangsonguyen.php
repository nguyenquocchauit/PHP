<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Mảng</title>
</head>

<body>
    <?php 
    $KetQua = "";
    if (isset($_POST["SoN"]))
        $n = $_POST["SoN"];
    else
        $n = "";
    if (isset($_POST["Send"])) {
        $RandArray = array();
        $Array = array();
        for ($i = 0; $i < $n; $i++) {
            $x = rand(-100, 200);
            $Array[$i] = $x;
            if ($x < 0)
                $RandArray[$i] = "(" . $x . ")";
            else
                $RandArray[$i] = $x;
        }
        $KetQua = "Mảng được tạo là: " . implode(" ", $RandArray) . "&#13;&#10;";
        $countChan = 0;
        $countNho = 0;
        $tongSoAm = 0;
        foreach ($Array as $y) {
            if ($y % 2 == 0 && $y > 0)
                $countChan++;
            if ($y < 100)
                $countNho++;
            if ($y < 0)
                $tongSoAm += $y;
        }

        $KetQua .= "Có $countChan số chẵn >0 trong mảng" . "&#13;&#10;";
        $KetQua .= "Có $countNho số <100 trong mảng" . "&#13;&#10;";
        $KetQua .= "$tongSoAm là tổng số <0 trong mảng" . "&#13;&#10;";
        $KetQua .= "Các số có chữ số cuối là số lẻ là: ";
        $daySo = "";
        $viTri = "";
        for ($i = 0; $i < $n; $i++) {
            $soCuoi = $Array[$i] % 10;
            if ($soCuoi % 2 != 0)
                if ($Array[$i] < 0)
                    $daySo .= "(" . $Array[$i] . ") ";
                else
                    $daySo .= $Array[$i] . " ";
            if ($Array[$i] == 0)
                $viTri .= $i + 1 . " ";
        }
        $KetQua .= $daySo . "&#13;&#10;";
        $KetQua .= "Vị trí $viTri có số =0 trong mảng" . "&#13;&#10;";
        sort($Array);
        for ($i = 0; $i < $n; $i++) {
            
            if ($Array[$i] < 0)
                $RandArray[$i] = "(" . $Array[$i] . ")";
            else
                $RandArray[$i] = $Array[$i];
        }
        $KetQua .= "Mảng được sắp xếp tăng dần là là: " . implode(" ", $RandArray) . "&#13;&#10;";
        
    }

    ?>
    <form accept="xulymangsonguyen.php" method="post">
        <div class="input-group p-2" style="width:500px;">
            <input type="text" class="form-control" pattern="[0-9]+" title="Vui lòng nhập đúng định dạng số nguyên!" placeholder="Nhập số vào N" name="SoN" value="<?php echo $n ?>">
            <div class="input-group-append"></div>
                <button class="btn btn-success" type="submit" name="Send">Thực hiện</button>
            </div>
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="KetQua" placeholder="Kết quả" rows="10"><?php echo $KetQua ?></textarea>
        </div>
    </form>

</body>

</html>