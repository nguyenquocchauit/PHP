<?php
// khởi tạo session
session_start();
// nếu session[cart] không tồn tại thì khởi tạo
if (!isset($_SESSION['cart']))
    $_SESSION['cart'] = [];

// nếu get[delcart] tồn tại và =1 thì session[cart] bằng rỗng. Tức xóa hết sản phẩm trong giỏ hàng
$message_cart = "";
if (isset($_GET['delcart']) && $_GET['delcart'] == 1) {
    unset($_SESSION['cart']);
    $message_cart = "
            <img id='imgcart' src='./img/cat.gif' alt=''>
            <h4 id='mesag-cart'><p>Giỏ hàng hiện tại trống, quay lại trang shop đặt hàng</p></h4>
            <a href='shop.php' id='back-to-shop'><button type='button' class='buttonBack'><i class='fa-solid fa-arrow-left' id='iconback'></i>Tiếp tục xem sản phẩm</button></a>
            ";
}

// nếu get[delid] tồn tại  session[cart] sẽ xóa sản phẩm thứ $i.
//array_splice(mãng,vị trí,số phần tử)
if (isset($_GET['delid']) && $_GET['delid'] >= 0)
    array_splice($_SESSION['cart'], $_GET['delid'], 1);

// kiểm tra nút bấm thêm giỏ hàng 
if (isset($_POST['add-to-cart'])) {
    $image = $_POST['productImage'];
    $quantity = $_POST['productQuantity'];
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $ID = $_POST['productID'];

    // kiểm tra sản phẩm có trong giỏ hàng hay chưa?
    // $check kiểm tra có tìm được sản phẩm giỏ hàng hay không 
    // $check = 0 : không tìm thấy sản phẩm trùng
    // $check = 1 : Tìm thấy sản phẩm trùng

    $check = 0;
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $ID) {
            $check = 1;

            // cập nhật số lượng
            $quantityNew = $quantity + $_SESSION['cart'][$i][4];

            // thêm lại vào giỏ hàng
            $_SESSION['cart'][$i][4] = $quantityNew;
            //thoát vòng lặp
            break;
        }
    }
    // $check = 0 không thấy sản phẩm trùng tiến hành thêm sản phẩm như bình thường
    if ($check == 0) {
        $product = [$ID, $name, $image, $price, $quantity];
        $_SESSION['cart'][] = $product;
    }
}
function Show_Cart()
{
    if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))) {
        // nếu giỏ hàng $_SESSION['cart']) tồn tại thì in ra
        if (sizeof($_SESSION['cart']) > 0) {
            $sum = 0;

            // in thẻ html table 
            echo '
            <table>
                <tr class="tr1">
                    <td>
                        <p>STT</p>
                    </td>
                    <td>
                        <p>Sản phẩm</p>
                    </td>
                    <td>
                        <p>Tên sản phẩm</p>
                    </td>
                    <td>
                        <p>Giá</p>
                    </td>
                    <td>
                        <p>Số lượng</p>
                    </td>
                    <td>
                        <p>Tổng</p>
                    </td>
                    <td>
                        <p>Xóa</p>
                    </td>
                </tr>
                <tbody>
            
            ';
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                $name = $_SESSION['cart'][$i][1];
                $image = $_SESSION['cart'][$i][2];
                $price = $_SESSION['cart'][$i][3];
                $quanti = $_SESSION['cart'][$i][4];
                $total = $price * $quanti;
                $sum += $total;
                echo '
                <tr>
                    <td>
                        ' . ($i + 1) . '
                    </td>
                    <td style="width: 15%;">
                        <div class="divimg"><img src="./img/image_products_home/' . ($image) . '" alt="" srcset=""></div>
                    </td>
                    <td style="width: 26%;"><span>' . ($name) . '</span></td>
                    <td>
                        <p>' . (number_format($price)) . ' VNĐ</p>
                    </td>
                    <td>
                        <div class="quantity numbers-row">
                            <div class="row">
                                <div class="col-4 d-flex justify-content-end pt-1 asc"></div>
                                <div class="col-4 inpqan"><input type="text" class="form-control inpquantity" name="" id="" value="' . ($quanti) . '"></div>
                                <div class="col-4 d-flex justify-content-start pt-1 desc"></div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>' . (number_format($total)) . ' VNĐ</p>
                    </td>
                    <td><a href="product_cart.php?delid=' . ($i) . '"><i class="fa-regular fa-circle-xmark"></i></a></td>
                 </tr>
            ';
            }
            echo '
                    <tr class="tr1">
                        <td></td>
                        <td colspan="1">
                            <p>Tổng số lượng</p>
                        </td>
                        <td colspan="5" style="text-align: end;color: red;">
                            <p>' . (number_format($sum)) . ' VNĐ</p>
                        </td>
                    </tr>
                    <tr class="tr1">
                        <td></td>
                        <td colspan="1">
                            <p>Giao hàng</p>
                        </td>
                        <td colspan="5" style="text-align: end;">
                            <p>Giao hàng miễn phí</p>
                        </td>
                    </tr>
                        <td></td>
                            <td style="text-align: end;">
                                <a href="javascript:window.history.back(-1);"><button type="button" class="buttonBack"><i class="fa-solid fa-arrow-left" id="iconback"></i>Tiếp tục xem sản phẩm</button></a>
                            </td>
                            <td style="text-align: center;">
                                <button type="button" class="buttonUpdate"><i class="fa-solid fa-pen-to-square"></i> Cập nhập giỏ hàng</button>
                            </td>
                            <td style="text-align: start;">
                                <a href="product_cart.php?delcart=1"><button type="button" class="buttonUpdate" ><i class="fa-solid fa-trash"></i> Xóa giỏ hàng</button></a>
                            </td>
                    </tr>
                </tbody>
            </table>
        ';
        } else {
            echo "
            <img id='imgcart' src='./img/cat.gif' alt=''>
            <h4 id='mesag-cart'><p>Giỏ hàng hiện tại trống, quay lại trang shop đặt hàng</p></h4>
            <a href='shop.php' id='back-to-shop'><button type='button' class='buttonBack'><i class='fa-solid fa-arrow-left' id='iconback'></i>Tiếp tục xem sản phẩm</button></a>
            
            ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="./thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="./thuvienweb/fontawesome-free-6.1.2-web/css/all.min.css">
    <script src="./thuvienweb/fontawesome-free-6.1.2-web/js/all.min.js"></script>
    <script src="./thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>TC WATCH</title>
    <script>
        $(function() {
            $(".numbers-row").find(".desc").append('<button class="btnquantity buttonn">+</button>')
            $(".numbers-row").find(".asc").append('<button class="btnquantity buttonn">-</button>')
            $(".buttonn").on("click", function() {

                var $button = $(this);
                var oldValue = $button.parent().parent().find(".inpqan").find(".inpquantity").val();
                if ($button.text() == "+") {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }

                $button.parent().parent().find(".inpqan").find(".inpquantity").val(newVal);

            });

        });
    </script>
</head>

<body>

    <div class="body-product-cart">
        <?php
        // thêm file navbar menu
        include "navbar.php";
        ?>
        <div class="body-cart mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col cart">
                        <?php Show_Cart(); ?>
                        <?php echo $message_cart ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // thêm file footer
        include "footer.php";
        ?>
    </div>
</body>

</html>