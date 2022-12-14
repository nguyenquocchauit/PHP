<?php
session_start();
if (isset($_SESSION['CurrentUser']['ID']) && isset($_SESSION['CurrentUser']['Role'])) {
    $CurrentUser =  $_SESSION['CurrentUser']['ID'];
    $IDUser = $_SESSION['CurrentUser']['Role'];
} else {
    $CurrentUser = "null";
    $IDUser = "null";
    header('Location: ../../Website Watch PHP/home.php');
    exit();
}
if ($_SESSION['CurrentUser']['Role'] == "User") {
    header('Location: ../../Website Watch PHP/home.php');
    exit();
}
// kết nối cơ sở dữ liệu db_watch
require '../config/connectDB.php';
include 'inlcudes_function/show_brand_gender.php';
include 'inlcudes_function/auto_idproduct.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css and javascript/style.css">
    <script src="../css and javascript/update_delete_product.js"></script>
    <script src="../thuvienweb/bootstrap-5.2.0-beta1-dist/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../thuvienweb/fontawesome-free-6.1.2-web/css/all.min.css">
    <script src="../thuvienweb/fontawesome-free-6.1.2-web/js/all.min.js"></script>
    <script src="../thuvienweb/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- thư viện sweet aler  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <title>TC WATCH - Thêm sản phẩm</title>
    <script type="text/javascript">
        $(document).ready(function() {
            const input_image = [
                [],
                [],
                [],
                [],
                [],
                [],
            ];
            // bắt sự kiện thêm sản phẩm
            $('.button-add-product').on('click', function() {
                var _name = $("#Name").val();
                var _brand = $("#Brand").val();
                var _gender = $("#Gender").val();
                var _quantity = $("#Quantiy").val();
                var _price = $("#Price").val();
                var _discount = $("#Discount").val();
                var _description = $("#Description").val();
                var _idproduct = $("#IDProduct").val();
                if (check_empty(_name))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập tên sản phẩm!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_quantity))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập số lượng sản phẩm có trong kho!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_price))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập giá sản phẩm!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_discount))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập giảm giá sản phẩm!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_description))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập mô tả sản phẩm!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else {
                    for (var i = 0; i <= input_image.length - 1; i++) {
                        if (input_image[i].length == 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Thông báo!',
                                text: 'Vui lòng thêm ảnh sản phẩm!',
                                timer: 1500,
                                timerProgressBar: true,
                            })
                        }
                        break;
                    }
                    if (isNaN(_quantity))
                        Swal.fire({
                            icon: 'error',
                            title: 'Thông báo!',
                            text: 'Vui lòng nhập số lượng sản phẩm là số!',
                            timer: 1500,
                            timerProgressBar: true,
                        })
                    else if (isNaN(_price) || _price <= 0)
                        Swal.fire({
                            icon: 'error',
                            title: 'Thông báo!',
                            text: 'Vui lòng nhập giá sản phẩm là số và lớn 0!',
                            timer: 1500,
                            timerProgressBar: true,
                        })
                    else if (isNaN(_discount) || _discount < 0 || _discount > 100)
                        Swal.fire({
                            icon: 'error',
                            title: 'Thông báo!',
                            text: 'Vui lòng nhập giảm giá sản phẩm là số (>0 và <100)!',
                            timer: 1500,
                            timerProgressBar: true,
                        })
                    else {
                        var form = new FormData();
                        for (var i = 0; i <= input_image.length - 1; i++) {
                            form.append("files[]", input_image[i][0].files[0]);
                        }
                        form.append("idproduct", _idproduct);
                        form.append("name", _name);
                        form.append("brand", _brand);
                        form.append("gender", _gender);
                        form.append("price", _price);
                        form.append("quantity", _quantity);
                        form.append("discount", (_discount / 100));
                        form.append("description", _description);
                        // The AJAX call
                        $.ajax({
                            url: 'inlcudes_function/create_new_product.php',
                            type: "POST",
                            data: form,
                            contentType: false,
                            processData: false,
                            success: function(result) {
                                var data = JSON.parse(result);
                                if (data['message'] == 0) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Thông báo!',
                                        text: 'Thêm sản phẩm thành công!',
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                }
                            }
                        });
                    }
                }


            });
            // Bắt sự kiện click thêm giỏ hàng thêm hiệu ứng animation tới icon giỏ hàng
            $(".image-product").change(function() {
                var _input = $(this).val();
                var _image = $(this).parent('.add-image-product').find(".file-image").find("img");
                var reader = new FileReader();
                // sự kiện onload thay đổi src từ đường dẫn sang base64 để preview image
                reader.onload = function(e) {
                    _image.attr('src', e.target.result);
                }
                // đọc data từ thẻ input (this), chuyển đổi data sang base64
                reader.readAsDataURL(this.files[0]);
                // thêm data từ input(this) vào variable input_image để xử lý 
                switch ($(this).attr('id')) {
                    case 'file-input-product-1':
                        add_replace_input(0, this);
                        break;
                    case 'file-input-product-2':
                        add_replace_input(1, this);
                        break;
                    case 'file-input-product-3':
                        add_replace_input(2, this);
                        break;
                    case 'file-input-product-4':
                        add_replace_input(3, this);
                        break;
                    case 'file-input-product-5':
                        add_replace_input(4, this);
                        break;
                    case 'file-input-product-6':
                        add_replace_input(5, this);
                        break;
                }

            });
            $('.button-add-image').on('click', function() {
                var _input_1 = $('#file-input-product-1').val();
                var _input_2 = $('#file-input-product-2').val();
                var _input_3 = $('#file-input-product-3').val();
                var _input_4 = $('#file-input-product-4').val();
                var _input_5 = $('#file-input-product-5').val();
                var _input_6 = $('#file-input-product-6').val();
                // true: input chưa được thêm ảnh và ngược lại với else
                // kiểm tra các input đã được thêm ảnh chưa và thông báo
                if (check_empty(_input_1) && check_empty(_input_2) && check_empty(_input_3) && check_empty(_input_4) && check_empty(_input_5) && check_empty(_input_6))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập đủ 6 ảnh!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_input_1))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập ảnh thứ nhất!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_input_2))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập ảnh thứ hai!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_input_3))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập ảnh thứ ba!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_input_4))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập ảnh thứ bốn!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_input_5))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập ảnh thứ năm!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else if (check_empty(_input_6))
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo!',
                        text: 'Vui lòng nhập ảnh thứ sáu!',
                        timer: 1500,
                        timerProgressBar: true,
                    })
                else {
                    $(".btn-close-add-product").click();
                }
            });

            // function thêm input vào array input_image, nếu đã tồn tại trước đó thì thay thế
            function add_replace_input(i, input) {
                if (input_image[i].length === 0)
                    input_image[i].push(input);
                else
                    input_image[i][0] = input;
            }

            function check_empty(input) {
                // true: input chưa được thêm ảnh và ngược lại với else
                if (input.lenght == 0 || input == "")
                    return true;
                return false;
            }
        });
    </script>
</head>

<body>
    <?php
    // thêm file navbar menu
    include "../header_footer/header.php";
    ?>
    <div class="body-detail-product">
        <div class="row">
            <div class="row pt-1 pb-3"><strong class=" d-flex justify-content-center" style="font-size: 30px; font-family: 'Oswald', sans-serif;">THÊM SẢN PHẨM</strong></div>
        </div>
        <div class="row detail-product">
            <div class="col-4"></div>

            <div class="col-4 p-2 ">
                <div class="row p-2">
                    <div class="input-group flex-nowrap ">
                        <span class="input-group-text" id="addon-wrapping">Mã sản phẩm</span>
                        <input type="text" class="form-control" value="<?php echo $ID_Product ?>" id="IDProduct" name="IDProduct" readonly>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="input-group flex-nowrap ">
                        <span class="input-group-text" id="addon-wrapping">Tên sản phẩm</span>
                        <input type="text" class="form-control" value="" id="Name" name="Name" placeholder="Sản phẩm 1">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="input-group flex-nowrap ">
                        <span class="input-group-text" id="addon-wrapping">Hãng</span>
                        <select class="form-select form-select-lg form-select-brand" id="Brand" aria-label=".form-select-lg example">
                            <?php if (mysqli_num_rows($resultBrand)) while ($rowBrand = mysqli_fetch_array($resultBrand)) : ?>
                                <option value="<?php echo $rowBrand['ID_Brand'] ?>"> <?php echo $rowBrand['Name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="input-group flex-nowrap ">
                        <span class="input-group-text" id="addon-wrapping">Loại</span>
                        <select class="form-select form-select-lg form-select-gender" id="Gender" aria-label=".form-select-lg example">
                            <?php if (mysqli_num_rows($resultGender)) while ($rowGender = mysqli_fetch_array($resultGender)) : ?>
                                <option value="<?php echo $rowGender['ID_Gender'] ?>"> <?php echo $rowGender['Name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="input-group flex-nowrap ">
                        <span class="input-group-text" id="addon-wrapping">Số lượng kho</span>
                        <input type="text" class="form-control" value="" id="Quantiy" name="Quantity" placeholder="100">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="input-group flex-nowrap ">
                        <span class="input-group-text" id="addon-wrapping">Giá niêm yết</span>
                        <input type="text" class="form-control" value="" id="Price" name="Price" placeholder="10000000">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="input-group flex-nowrap ">
                        <span class="input-group-text" id="addon-wrapping">Giảm giá</span>
                        <input type="text" class="form-control" value="" id="Discount" name="Discount" placeholder="50 tức là 50%">
                    </div>
                </div>
                <div class="row p-2">
                    <div class="input-group ">
                        <label class="input-group-text" for="Image">Ảnh</label>
                        <button type="button" class="btn btn-secondary button-back" style="width: 79%;" data-bs-target="#myModal_Add-Product" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-solid fa-image"></i> Thêm ảnh</button>
                        <!-- <input type="file" class="form-control" id="Image" name="Image" multiple> -->
                        <!-- <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" name="image[]" accept="image/*" id="imageButton" multiple />
                        </form> -->
                    </div>
                </div>
                <div class="row p-2">
                    <div class="input-group flex-nowrap ">
                        <span class="input-group-text" id="addon-wrapping">Mô tả</span>
                        <textarea class="form-control" id="Description" rows="3"></textarea>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-6 d-flex justify-content-end"><a href="Danh-sach-san-pham.php"><button type="button" class="btn btn-warning button-back"><i class="fa-solid fa-arrow-left"></i> Quay lại</button></a></div>
                    <div class="col-6 d-flex justify-content-center"><button type="button" class="btn btn-success button-add-product"><i class="fa-solid fa-floppy-disk"></i>Thêm</button></div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <?php
    // thêm file footer
    include "../header_footer/footer.php";
    ?>
    <!-- Modal Add image for product -->
    <div class="modal fade" id="myModal_Add-Product" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header mx-auto">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm ảnh cho sản phẩm</h5>
                    <button type="button" class="btn-close btn-close-add-product" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="row pb-2">
                    <div class="col-4 d-flex justify-content-center add-image-product">
                        <label for="file-input-product-1" class="file-image">
                            <img id="image-product-1" src="../img/default-image.jpg" alt="" srcset="" style="width:150px;height: 160px;">
                        </label>
                        <input class="image-product" type="file" id="file-input-product-1" style="display:none;">
                    </div>
                    <div class="col-4 d-flex justify-content-center add-image-product">
                        <label for="file-input-product-2" class="file-image">
                            <img src="../img/default-image.jpg" alt="" srcset="" style="width:150px;height: 160px;">
                        </label>
                        <input class="image-product" type="file" id="file-input-product-2" style="display:none;">
                    </div>
                    <div class="col-4 d-flex justify-content-center add-image-product">
                        <label for="file-input-product-3" class="file-image">
                            <img src="../img/default-image.jpg" alt="" srcset="" style="width:150px;height: 160px;">
                        </label>
                        <input class="image-product" type="file" id="file-input-product-3" style="display:none;">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-4 d-flex justify-content-center add-image-product">
                        <label for="file-input-product-4" class="file-image">
                            <img src="../img/default-image.jpg" alt="" srcset="" style="width:150px;height: 160px;">
                        </label>
                        <input class="image-product" type="file" id="file-input-product-4" style="display:none;">
                    </div>
                    <div class="col-4 d-flex justify-content-center add-image-product">
                        <label for="file-input-product-5" class="file-image">
                            <img src="../img/default-image.jpg" alt="" srcset="" style="width:150px;height: 160px;">
                        </label>
                        <input class="image-product" type="file" id="file-input-product-5" style="display:none;">
                    </div>
                    <div class="col-4 d-flex justify-content-center add-image-product">
                        <label for="file-input-product-6" class="file-image">
                            <img src="../img/default-image.jpg" alt="" srcset="" style="width:150px;height: 160px;">
                        </label>
                        <input class="image-product" type="file" id="file-input-product-6" style="display:none;">
                    </div>
                </div>
                <div class="row pt-2">
                    <p style="color:red;text-align: center;">Vui lòng nhập đủ 6 ảnh</p>
                    <div class="col-12 d-flex justify-content-center"><button type="button" class="btn btn-success button-add-image"><i class="fa-solid fa-floppy-disk"></i> Thêm</button></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>