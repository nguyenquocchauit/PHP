<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    <title>Thêm sữa mới</title>
    <script>
        $(function() {
            $('#inputMilkID').on('keypress', function(e) {
                if (e.which == 32) {
                    return false;
                }
            });
        });
        $(document).ready(function() {
            $('#inputPrice').mask('000.000.000', {
                reverse: true
            });
        });
    </script>
    <style>
        * {
            font-size: 21px;
        }

        #div_parent {
            padding-top: 15px;
        }

        #title_h2 {
            text-align: center;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
            color: #0072ff;
        }

        #div_form {
            top: 20px;
            width: 65%;
            margin: 0 auto;
            text-align: start;
            background-color: #0700a330;
            box-shadow: 9px 9px 10px #fef1dc;
        }

        .inp {

            padding: 15px 40px 0px 16px;
        }

        .label {
            font-family: Verdana, sans-serif;
            padding: 25px 0px 0px 30px;
        }

        #div_result {
            padding-bottom: 60px;
        }

        #table {
            box-shadow: 0px 0px 70px #fef1dc;
            width: 65%;
            margin: 0 auto;
        }

        #div_msg {
            text-align: center;
        }

        #tr_show {
            width: 100%;
        }

        #td_weight_price {
            color: red;
        }

        #td_weight_price>b {
            color: black;
        }

        #td_img {
            padding-top: 20px;
            display: flex;
            justify-content: center;
        }

        #title {
            background-color: #ffa50029;
            color: orange;
            text-align: center;
            font-size: 30px;
            font-family: "Comic Sans MS", "Comic Sans", cursive;
        }
    </style>
</head>

<body>
    <?php
    // 1. Ket noi CSDL
    require '../../connectDB.php';
    // format sticky form 2 tag select
    if (isset($_POST['MilkID']))
        $MilkID = $_POST['MilkID'];
    else
        $MilkID = null;
    if (isset($_POST['MilkName']))
        $MilkName = $_POST['MilkName'];
    else
        $MilkName = null;
    if (isset($_POST['MilkBrand']))
        $MilkBrand = $_POST['MilkBrand'];
    else
        $MilkBrand = null;
    if (isset($_POST['MilkType']))
        $MilkType = $_POST['MilkType'];
    else
        $MilkType = null;
    if (isset($_POST['Weight']))
        $Weight = $_POST['Weight'];
    else
        $Weight = null;
    if (isset($_POST['Price'])) {
        $Price = str_replace('.', '', $_POST['Price']);
    } else
        $Price = null;
    if (isset($_POST['ContentIngredients']))
        $ContentIngredients = $_POST['ContentIngredients'];
    else
        $ContentIngredients = null;
    if (isset($_POST['ContentBenefit']))
        $ContentBenefit = $_POST['ContentBenefit'];
    else
        $ContentBenefit = null;
    if (isset($_POST['PathImg']))
        $PathImg = $_POST['PathImg'];
    else
        $PathImg = null;
    // lấy dữ liệu loại sữa
    $sqlMilkType = "SELECT ten_loai,ma_loai_sua FROM loai_sua";
    $resultMilkType = mysqli_query($conn, $sqlMilkType);
    // lấy dữ liệu hãng sữa
    $sqlMilkBrand = "SELECT ten_hang_sua,ma_hang_sua FROM hang_sua";
    $resultMilkBrand = mysqli_query($conn, $sqlMilkBrand);
    ?>
    <form action="" method="post">
        <div id="div_parent">
            <h2 id="title_h2">THÊM SỮA MỚI</h2>
            <div id="div_form">
                <div class="mb-3 row">
                    <label for="inputMilkID" class="col-sm-2 col-form-label label ">Mã sữa</label>
                    <div class="col-sm-10 inp">
                        <input type="text" name="MilkID" value="<?php echo $MilkID ?>" class="form-control" id="inputMilkID" pattern="[A-Z0-9]{1,6}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputMilkName" class="col-sm-2 col-form-label label">Tên sữa</label>
                    <div class="col-sm-10 inp">
                        <input type="text" name="MilkName" value="<?php echo $MilkName ?>" class="form-control" id="inputMilkName" pattern="^(?:((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-.\s])){1,}(['’,\-\.]){0,1}){2,}(([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-. ]))*(([ ]+){0,1}(((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){1,})(['’\-,\.]){0,1}){2,}((([^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]'’,\-\.\s])){2,})?)*)$" title="Vui lòng nhập đúng tên thật!" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputMilkBrandName" class="col-sm-2 col-form-label label">Hãng sữa</label>
                    <div class="col-sm-10 inp">
                        <select class="form-select" id="inputGroupSelect02" name="MilkBrand" required>
                            <option value="">Chọn hãng sữa</option>
                            <?php
                            while ($rowMilkBrand = mysqli_fetch_array($resultMilkBrand)) {
                                $milkBrandName = $rowMilkBrand['ten_hang_sua'];
                                $milkBrandID = $rowMilkBrand['ma_hang_sua'];
                                if ($milkBrandID == $MilkBrand)
                                    echo '<option value="' . ($milkBrandID) . '" selected>' . ($milkBrandName) . '</option>';
                                else
                                    echo '<option value="' . ($milkBrandID) . '">' . ($milkBrandName) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputMilkType" class="col-sm-2 col-form-label label">Loại sữa</label>
                    <div class="col-sm-10 inp">
                        <select class="form-select" id="inputGroupSelect02" name="MilkType" required>
                            <option value="">Chọn loại sữa</option>
                            <?php
                            while ($rowMilkType = mysqli_fetch_array($resultMilkType)) {
                                $milkTypeName = $rowMilkType['ten_loai'];
                                $milkTypeID = $rowMilkType['ma_loai_sua'];
                                if ($milkTypeID == $MilkType)
                                    echo '<option value="' . ($milkTypeID) . '"selected>' . ($milkTypeName) . '</option>';
                                else
                                    echo '<option value="' . ($milkTypeID) . '">' . ($milkTypeName) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputWeight" class="col-sm-2 col-form-label label">Trọng lượng</label>
                    <div class="col-sm-6 inp">
                        <input type="text" name="Weight" value="<?php echo $Weight ?>" class="form-control" id="inputWeight" pattern="[0-9]+" title="Vui lòng nhập đúng định dạng số!" required>
                    </div>
                    <div class="col-sm-4 label">
                        (gr hoặc ml)
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPrice" class="col-sm-2 col-form-label label">Đơn giá</label>
                    <div class="col-sm-6 inp">
                        <input type="text" name="Price" value="<?php echo $Price ?>" class="form-control " id="inputPrice" pattern="[0-9]+([\.,][0-9]+[0-9]+([\.,][0-9]+)?" title="Vui lòng nhập đúng định dạng số!" required>
                    </div>
                    <div class="col-sm-4 label">
                        (VNĐ)
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputContentIngredients" class="col-sm-2 col-form-label label">Thành phần dinh dưỡng</label>
                    <div class="col-sm-10 inp">
                        <textarea class="form-control" name="ContentIngredients" id="inputContentIngredients" rows="3" required><?php echo $ContentIngredients ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputContentBenefit" class="col-sm-2 col-form-label label">Lợi ích</label>
                    <div class="col-sm-10 inp">
                        <textarea class="form-control" name="ContentBenefit" id="inputContentBenefit" rows="3" required><?php echo $ContentBenefit ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPathImg" class="col-sm-2 col-form-label label">Hình ảnh</label>
                    <div class="col-sm-10 inp">
                        <input class="form-control" name="PathImg" type="file" id="inputPathImg" pattern="[A-Za-z]{1,200}" required>
                    </div>
                </div>
                <div class="mb-3 row pb-3">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" name="insert" class="btn btn-success">Thêm</button>
                    </div>
                </div>
            </div>
            <?php
            $query = "SELECT * FROM Sua WHERE Ma_sua ='" . ($MilkID) . "'";
            $checkExist = mysqli_query($conn, $query);
            // kiểm tra mã sữa đã có thì in message 
            if (mysqli_num_rows($checkExist) != 0) {
                echo '
                    <div id="div_result">
                        <div id="div_msg">
                            <h4>Thêm không thành công. Mã sữa đã tồn tại</h4>
                        </div>
                    </div>
                    ';
            } else
            if (isset($_POST['insert'])) {
                $query = "INSERT INTO Sua (Ma_sua, Ten_sua, Ma_hang_sua,Ma_loai_sua,Trong_luong,Don_gia,TP_Dinh_Duong,Loi_ich,Hinh)
                VALUES ('" . ($MilkID) . "', '" . ($MilkName) . "', '" . ($MilkBrand) . "','" . ($MilkType) . "','" . ($Weight) . "', '" . ($Price) . "', '" . ($ContentIngredients) . "','" . ($ContentBenefit) . "','" . ($PathImg) . "')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    $sql = "SELECT a.Ten_sua,a.Hinh, a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,b.Ten_hang_sua 
                    FROM sua A inner join hang_sua B on a.Ma_hang_sua = b.Ma_hang_sua WHERE a.Ma_sua='" . ($MilkID) . "' ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    // xử lý xử liệu trả về
                    $pathImg = $row['Hinh'];
                    $contentIngredients = $row['TP_Dinh_Duong'];
                    $contentBenefit = $row['Loi_ich'];
                    $weight = $row['Trong_luong'];
                    $price = number_format($row['Don_gia']);
                    echo '
                    <div id="div_result">
                        <div id="div_msg">
                            <h4>Kết quả sau khi thêm mới thành công</h4>
                            <h6>Thêm sữa thành công</h6>
                        </div>
                        <table class="table table-bordered" id="table" style="margin-top: 50px;">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="5" id="title"> ' . $row['Ten_sua'] .  '-'  . $row['Ten_hang_sua'] . ' </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="tr_show">
                                    <td id="td_img"><img src="../../../images/Hinh_sua/' . ($pathImg) . '" alt=""></td>
                                    <td id="td_content">
                                        <table class="">
                                            <tbody>
                                                <tr>
                                                    <td><b>Thành phần dinh dưỡng:</b></td>
                                                </tr>
                                                <tr>
                                                    <td>' . ($contentIngredients) . '</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Lợi ích:</b></td>
                                                </tr>
                                                <tr>
                                                    <td>' . ($contentBenefit) . '</td>
                                                </tr>
                                                <tr>
                                                    <td id="td_weight_price">
                                                        <b>Trọng lượng: </b>' . ($weight) . ' gr -
                                                        <b>Đơn giá: </b>' . ($price) . ' VNĐ
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    ';
                }
            }
            mysqli_close($conn);
            ?>
        </div>
    </form>
</body>

</html>