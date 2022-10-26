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
    header("Location: product_cart.php");
    exit();
}

// nếu get[delid] tồn tại  session[cart] sẽ xóa sản phẩm thứ $i.
//array_splice(mãng,vị trí,số phần tử)
if (isset($_GET['delid']) && $_GET['delid'] >= 0) {
    array_splice($_SESSION['cart'], $_GET['delid'], 1);
    header("Location: product_cart.php");
    exit();
}

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
        // lấy thời gian hệ thống
        $now = new DateTime();
        $timeNow = $now->format('Y-m-d H:i:s');
        // kiểm tra người dùng đã đăng nhập hay chưa, nếu chưa thì không được đặt hàng
        if (isset($_SESSION['CurrentUser'])) $CurrentUser =  $_SESSION['CurrentUser'];
        else $CurrentUser = "null";
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
                // kiểm tra không được đặt quá giới hạn là 5 sản phẩm
                if ($quanti >= 5)
                    $quanti = 5;
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
                                <div class="col-4 inpqan">
                                    <input type="text" class="form-control inpquantity" name="" id="" value="' . ($quanti) . '">
                                    <input type="hidden" name="" class="ID_Quantity" value="' . $i . '">
                                </div>
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
                            <p>Tổng tiền</p>
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
                                <a href="product_cart.php?delcart=1"><button type="button" class="buttonDelete" ><i class="fa-solid fa-trash"></i> Xóa giỏ hàng</button></a>
                            </td>
                            <td colspan="4" style="text-align: end;">
                                <form action="" method="post" >
                                    <button type="button" class="buttonBuy" name="buttonBuy"><i class="fa-solid fa-pen-to-square"></i> Đặt hàng</button>
                                    <input type="hidden" class="CurrentUser" value="' . ($CurrentUser) . '">
                                    <input type="hidden" class="timeNow" value="' . ($timeNow) . '">
                                    <input type="hidden" class="sum" value="' . ($sum) . '">
                                </form>
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
    <!-- thư viện sweet aler  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>TC WATCH</title>

    <script>
        $(function() {
            // thêm nút tăng giảm vào trước và sau input số lượng
            $(".numbers-row").find(".desc").append('<button class="btnquantity buttonn">+</button>')
            $(".numbers-row").find(".asc").append('<button class="btnquantity buttonn">-</button>')
            // bắt sự kiện click vào nút
            $(".buttonn").on("click", function() {

                var $button = $(this);
                // lấy giá trị của thẻ input hiển thị
                var oldValue = $button.parent().parent().find(".inpqan").find(".inpquantity").val();
                // lấy vị trí. tức là id sản phẩm theo value của input
                var ID_quantity = $button.parent().parent().find(".inpqan").find(".ID_Quantity").val();
                // kiểm tra số lượng trên 5 thì không được đặt hàng phải liên hệ tư vấn viên
                console.log(oldValue);
                if (oldValue >= 5 && ($button.text() == "+")) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo',
                        text: 'Khách hàng đặt trên 5 sản phẩm vui lòng trao đổi trực tiếp với tư vấn viên. Cảm ơn!',
                        footer: '<a href="">Liên hệ</a>'
                    })
                } else {
                    // nếu là + thì cập nhật input thêm 1 và ngược lại với -
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
                    //console.log(oldValue);
                    // xử lý tăng giảm bằng file quantity_cart.php
                    $.ajax({
                        type: 'POST',
                        url: 'quantity_cart.php',
                        data: {
                            itemID: ID_quantity,
                            quantity: newVal
                        },
                        success: function(data) {
                            var datas = JSON.parse(data);
                            console.log(datas);
                            if (datas['message'] == 0) {
                                window.location.href = datas['success'];
                            }
                        }
                    });
                }
                // thay đổi giá trị của input
                // $button.parent().parent().find(".inpqan").find(".inpquantity").val(newVal);

            });
            // bắt sự kiện ấn nút đặt hành nếu chưa đăng nhập thì thông báo phải đăng nhập
            $(".buttonBuy").on("click", function() {
                var $button = $(this);
                var CurrentUser = $button.parent().find(".CurrentUser").val();
                var sum = $button.parent().find(".sum").val();
                var timeNow = $button.parent().find(".timeNow").val();

                if (CurrentUser == "null") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo',
                        text: 'Bạn vui lòng đăng nhập để tiến hành đặt hàng. Cảm ơn!',
                        confirmButtonText: 'Đăng nhập',
                    }).then((result) => {
                        // click vào đăng nhập thì show modal đăng nhập
                        if (result.isConfirmed) {
                            $('#login').modal('show');
                        }
                    })
                } else {

                    $.ajax({
                        type: 'POST',
                        url: 'order.php',
                        data: {
                            ID_Customer: CurrentUser,
                            Create_At: timeNow,
                            Total: sum,
                        },
                        success: function(data) {
                            var data = JSON.parse(data);
                            console.log(data);
                            if (data['message'] == 0) {
                                // sử dụng thư viện sweetaler thông báo cho đẹp :v
                                let timerInterval
                                Swal.fire({
                                    title: 'Đặt hàng thành công!',
                                    html: 'Quay lại trang chủ trong <strong></strong> giây tới.',
                                    //icon: "success",
                                    imageUrl: './img/cat.gif',
                                    imageWidth: 315,
                                    imageHeight: 230,
                                    timer: 1500,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        // thiết lập thời gian theo giây, ban đầu là millisecond
                                        timerInterval = setInterval(() => {
                                            Swal.getHtmlContainer().querySelector('strong')
                                                .textContent = (Swal.getTimerLeft() / 1000)
                                                .toFixed(0)
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                }).then((result) => {
                                    // hoàn thành xong chuyển tới trang home
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        window.location.href = data['success'];
                                    }
                                })
                                
                            }
                        }
                    });
                }
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