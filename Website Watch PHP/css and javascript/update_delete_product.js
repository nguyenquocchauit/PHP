$(document).ready(function () {
    // Bắt sự kiện click thêm giỏ hàng thêm hiệu ứng animation tới icon giỏ hàng
    $('.button-update').on('click', function () {
        const _image = [];
        var _getimage = document.getElementById("Image");
        if (_getimage.files.length == 6) {
            for (var i = 0; i <= _getimage.files.length - 1; i++) {

                _image[i] = _getimage.files.item(i).name;      // THE NAME OF THE FILE.
            }
        }
        var img = _getimage.files;
        console.log(img.name);
    });
    $('.delete-product').on('click', function () {
        var $click = $(this);
        var _ID_Product = $click.parent(".delete-submit").find(".inp_ID").val();
        console.log(_ID_Product);
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa?',
            text: "Xóa sẽ không thể nào hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: "Thoát",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'inlcudes_function/delete_product.php',
                    data: {
                        action: "delete",
                        ID_Product: _ID_Product,
                    },
                    success: function (data) {
                        var data = JSON.parse(data);
                        console.log(data);
                        if (data['message'] == 0) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Đã xóa!',
                                timer: 1200,
                                timerProgressBar: true,
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) { window.location.href = "Danh-sach-san-pham.php"; }
                            })

                        }
                    }
                })

            }
        })
    });
});