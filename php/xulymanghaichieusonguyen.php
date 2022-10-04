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
    if (isset($_POST["Send"])) {
        if( ($soDong <=5 and $soDong >=2) and ($soCot <=5 and $soCot >=2) )
            echo "ok";
        else
            echo "Nhập sai số cột hoặc số dòng >=2 và <=5";
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
            <textarea class="form-control" name="KetQua" placeholder="Kết quả" rows="10"><?php echo $KetQua ?></textarea>
        </div>
    </form>
</body>

</html>