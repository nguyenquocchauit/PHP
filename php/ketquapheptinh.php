<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Phép tính</title>
</head>
<body>
    <?php 
        $operator = $_POST["operator"];
        $NumberOne = $_POST["NumberOne"];
        $NumberTwo = $_POST["NumberTwo"];
        $Answer =0;
        if(is_numeric($NumberOne) && is_numeric($NumberTwo))
            switch($operator)
            {
                case "Cong":
                    $operator = "Cộng";
                    $Answer = $NumberOne + $NumberTwo;
                    break;
                case "Tru":
                    $operator = "Trừ";
                    $Answer = $NumberOne - $NumberTwo;
                    break;
                case "Nhan":
                    $operator = "Nhân";
                    $Answer = $NumberOne * $NumberTwo;
                    break;
                case "Chia":
                    $operator = "Chia";
                    $Answer = $NumberOne / $NumberTwo;
                    break;
            }
    ?>
    <h3 style="text-align: center;">PHÉP TÍNH TRÊN HAI SỐ</h3>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="row">
                <div class="col-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="" style="width: 143px;justify-content: end;">Chọn phép tính :</span>
                        </div>
                    </div>
                </div>
                <div class="col-10" style="padding-top: 7px;">
                    <?php echo $operator; ?>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="" style="width: 143px;justify-content: end;">Số thứ nhất :</span>
                </div>
                <input type="text" name="NumberOne" value="<?php echo $NumberOne; ?>" class="form-control">
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="" style="width: 143px;justify-content: end;">Số thứ nhì :</span>
                </div>
                <input type="text" name="NumberTwo" value="<?php echo $NumberTwo; ?>" class="form-control">
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="" style="width: 143px;justify-content: end;">Kết quả :</span>
                </div>
                <input type="text" name="Answer" value="<?php echo $Answer; ?>" class="form-control">
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8" style="text-align: center;margin-top: 10px;">
            <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
            <!-- <button type="button" name="GoBack" href="javascript:window.history.back(-1);" class="btn btn-danger">Trở về trang trước</button> -->
        </div>
        <div class="col-2"></div>
    </div>
    

</body>
</html>