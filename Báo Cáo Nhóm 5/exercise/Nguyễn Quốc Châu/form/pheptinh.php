<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Phép tính</title>

</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../includes/header.php"; ?>
        <h3 style="text-align: center;">PHÉP TÍNH TRÊN HAI SỐ NGUYỄN</h3>
        <form action="ketquapheptinh.php" method="post">
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
                            <div class="row">
                                <div class="col-3">
                                    <input type="radio" name="operator" value="Cong" checked aria-label="Radio button for following text input"> Cộng
                                </div>
                                <div class="col-3">
                                    <input type="radio" name="operator" value="Tru" aria-label="Radio button for following text input"> Trừ
                                </div>
                                <div class="col-3">
                                    <input type="radio" name="operator" value="Nhan" aria-label="Radio button for following text input"> Nhân
                                </div>
                                <div class="col-3">
                                    <input type="radio" name="operator" value="Chia" aria-label="Radio button for following text input"> Chia
                                </div>
                            </div>
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
                        <input type="text" name="NumberOne" pattern="[0-9]+" value="" class="form-control pMessage" required>
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
                        <input type="text" name="NumberTwo" id="pMessage" pattern="[0-9]+" value="" class="form-control pMessage" required>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8" style="text-align: center;margin-top: 10px;">
                    <button type="submit" name="Tinh" class="btn btn-success">Tính toán</button>
                </div>
                <div class="col-2"></div>
            </div>
        </form>
        <?php include "../../../includes/footer.php"; ?>
    </div>

</body>

</html>