$(document).ready(function () {
    // Bắt sự kiện tìm kiếm sản phẩm trong danh sách sản phẩm của admin
    $('.search-product').on('click', function () {

        var str = $(this).parent(".input-group").find("#para-search-product").val();
        console.log(str);
        $.ajax({
            type: 'GET',
            url: 'inlcudes_function/list-products.php',
            data: {
                search: str,
            },
            success: function (data) {
                var data = JSON.parse(data);
                console.log(data);
                if (data['message'] == 0) { }
            }
        })
    });
});