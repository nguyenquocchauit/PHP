<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="includes/style.css">
    <title>Báo cáo nhóm 5 - Bài tập cá nhân</title>
</head>

<body>
    <?php 
    if($_GET['id'])
        $id = $_GET['id'];

    ?>
    <div class="container-fluid w-100 h-100">
        <?php include "includes/header.php"; ?>
        <div class="body-exercise">
            <!-- nguyễn quốc châu -->
            <div class="row p-2" <?php if($id=="nqc") echo 'style="display: flex ;"'; else echo 'style="display: none ;"';  ?>>
                <div class="col-3 ">
                    <strong>Bài tập form</strong>
                    <ul class="list-group">
                        <li class="list-group-item "><a href="exercise/Nguyễn Quốc Châu/form/dientichhcn.php">Tính diện tích hình chữ nhật</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/form/tiendien.php">Tính tiền điện</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/form/pheptinh.php">Thực hiện phép tính trên 2 số</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/form/nhapThongtin.html">Nhận và xử lý thông tin người dùng</a></li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                    </ul>
                </div>
                <div class="col-3 ">
                    <strong>Bài tập mảng</strong>
                    <ul class="list-group">
                        <li class="list-group-item "><a href="exercise/Nguyễn Quốc Châu/array/xulymangsonguyen.php">Thao tác trên mảng số nguyên</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/mang_nam_nhuan.php">Tìm năm nhuận</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/mang_nam_am_lich.php">Tìm năm âm lịch</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/dayso.php">Nhập và tính trên dãy số</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/phatsinh_mang.php">Phát sinh mảng và tính toán</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/timkiem.php">Tìm kiếm</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/thaythe.php">Thay thế</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/sapxep.php">Sắp xếp mảng</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/ghep_mang.php">Đếm phần tử, ghép mảng và sắp xếp</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/xephang_baihat.php">Xếp hạng bài hát</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/array/xulymanghaichieusonguyen.php">Tạo và hiển thị ma trận số nguyên</a></li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>

                    </ul>
                </div>
                <div class="col-3">
                    <strong>Bài tập hướng đối tượng</strong>
                    <ul class="list-group">
                        <li class="list-group-item "><a href="exercise/Nguyễn Quốc Châu/oop/giaovien_sinhvien.php">Tạo các lớp đơn giản</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/oop/quanly_nhanvien.php">Quản lý thông tin nhân viên</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/oop/chuvi_dientich.php">Tính diện và chu vi hinh</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/oop/phanso.php">Phép tính trên phân số</a></li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                    </ul>
                </div>
                <div class="col-3">
                    <strong>Bài tập MySQL</strong>
                    <ul class="list-group">
                        <li class="list-group-item active">Kết hợp PHP và MySQL</li>
                        <li class="list-group-item "><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/1. Hiển thị lưới/luoi_tho_hang_sua.php">Hiển thị lưới</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/2. Lưới định dạng/luoi_dinh_dang.php">Lưới định dạng</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/3. Lưới tùy biến/luoi_tuy_bien.php">Lưới tùy biến</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/4. Lưới phân trang/luoi_phan_trang.php">Lưới phân trang</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/5. List đơn giản/list_don_gian.php">List đơn giản</a></li>
                        <li class="list-group-item "><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/6. List dạng cột/list_dang_cot.php">List dạng cột</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/7. List dạng cột có link/list_dang_cot_co_link.php">List dạng cột có link</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/8. List chi tiết có phân trang/list_phan_trang.php">List chi tiết có phân trang</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/9. Tìm kiếm đơn giản/tim_kiem_don_gian.php">Tìm kiếm đơn giản</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/10. Tìm kiếm nâng cao/tim_kiem_nang_cao.php">Tìm kiếm nâng cao</a></li>
                        <li class="list-group-item "><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/11. Thêm mới/them_moi_sua.php">Thêm mới</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Kết hợp PHP và MySQL/12. Xóa – Sửa/thong_tin_khach_hang.php">Xóa – Sửa</a></li>
                        <li class="list-group-item active">Tích hợp mã PHP - Sử dụng Template</li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Tích hợp mã PHP - Thiết kế và sử dụng Template/1. Ráp trang/home.php">Ráp trang</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Tích hợp mã PHP - Thiết kế và sử dụng Template/2. Quy đổi ngoại tệ - vàng/tong_hop.php">Quy đổi ngoại tệ - vàng</a></li>
                        <li class="list-group-item active ">Xây dựng các lớp xử lý</li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Xây dựng các lớp xử lý/1. Xây dựng lớp xử lý hãng sữa_xl_hang_sua/xl_hang_sua.php">Xây dựng lớp xử lý hãng sữa</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Xây dựng các lớp xử lý/2. Xây dựng lớp xử lý hãng sữa_xl_loai_sua/xl_loai_sua.php">Xây dựng lớp xử lý loại sữa</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Xây dựng các lớp xử lý/3.Xây dựng lớp xử lý sữa_xl_sua/xl_sua.php">Xây dựng lớp xử lý sữa</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Xây dựng các lớp xử lý/4. Xây dựng lớp xử lý khách hàng_xl_khach_hang/xl_khach_hang.php">Xây dựng lớp xử lý khách hàng</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Xây dựng các lớp xử lý/5. Danh mục hãng sữa – loại sữa/loai_hang_sua.php">Danh mục hãng sữa – loại sữa</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Xây dựng các lớp xử lý/6. Danh mục sữa/Danh_muc_sua.php">Danh mục sữa</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Xây dựng các lớp xử lý/7. Thêm khách hàng/them_khach_hang.php">Thêm khách hàng</a></li>
                        <li class="list-group-item"><a href="exercise/Nguyễn Quốc Châu/MySQl/Xây dựng các lớp xử lý/8. Danh mục sữa bán chạy/sua_ban_chay.php">Danh mục sữa bán chạy</a></li>
                    </ul>
                </div>
            </div>
            <!-- phan thị huyền trâm -->
            <div class="row p-2" <?php if($id=="ptht") echo 'style="display: flex ;"'; else echo 'style="display: none ;"';  ?>>
                <div class="col-3 ">
                    <strong>Bài tập form</strong>
                    <ul class="list-group">
                        <li class="list-group-item "><a href="exercise/Phan Thị Huyền Trâm/form/tinhdientich.php">Tính diện tích hình chữ nhật</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/form/tinhtiendien.php">Tính tiền điện</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/form/pheptinh.php">Thực hiện phép tính trên 2 số</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/form/nhapthongtin.html">Nhận và xử lý thông tin người dùng</a></li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                    </ul>
                </div>
                <div class="col-3 ">
                    <strong>Bài tập mảng</strong>
                    <ul class="list-group">
                        <li class="list-group-item "><a href="exercise/Phan Thị Huyền Trâm/mang/mang1.php">Thao tác trên mảng số nguyên</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/timnamnhuan.php">Tìm năm nhuận</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/tinhtong.php">Nhập và tính trên dãy số</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/bai5.php">Phát sinh mảng và tính toán</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/timkiem.php">Tìm kiếm</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/timkiemvathaythe.php">Thay thế</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/bai6sapxep/sapxepmang.php">Sắp xếp mảng</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/demptghepmang.php">Đếm phần tử, ghép mảng và sắp xếp</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/mang/manghaichieu.php">Tạo và hiển thị ma trận số nguyên</a></li>


                    </ul>
                </div>
                <div class="col-3">
                    <strong>Bài tập hướng đối tượng</strong>
                    <ul class="list-group">
                        <li class="list-group-item "><a href="exercise/Phan Thị Huyền Trâm/hdtlopcb.php">Tạo các lớp đơn giản</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/qlthongtinnv.php">Quản lý thông tin nhân viên</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/tinhdientichchuvi.php">Tính diện và chu vi hinh</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/phansohdt.php">Phép tính trên phân số</a></li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                        <li class="list-group-item">&ensp;</li>
                    </ul>
                </div>
                <div class="col-3">
                    <strong>Bài tập MySQL</strong>
                    <ul class="list-group">
                        <li class="list-group-item active">Kết hợp PHP và MySQL</li>
                        <li class="list-group-item "><a href="exercise/Phan Thị Huyền Trâm/qlbansua/hienthiluoi.php">Hiển thị lưới</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/qlbansua/qlbansua.php">Lưới định dạng</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/qlbansua/luoituybien.php">Lưới tùy biến</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/qlbansua/luoiphantrang.php">Lưới phân trang</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/qlbansua/listdongian.php">List đơn giản</a></li>
                        <li class="list-group-item "><a href="exercise/Phan Thị Huyền Trâm/qlbansua/listdangcot.php">List dạng cột</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/qlbansua/listdangcotcolink/listdangcotcolink.php">List dạng cột có link</a></li>
                        <li class="list-group-item"><a href="exercise/Phan Thị Huyền Trâm/qlbansua/listchitietphantrang.php">List chi tiết có phân trang</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <?php include "includes/footer.php"; ?>
    </div>
</body>

</html>