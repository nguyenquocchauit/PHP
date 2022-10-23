<?php
// kết nối cơ sở dữ liệu db_watch
require 'connectDB.php';
$search = $_REQUEST["search"];
$searchResult = "";
if ($search !== "") {
    // strtoupper vì tên trong database in hoa nên cần in hoa ký tự nhập vào từ ô tìm kiếm
    $search = strtoupper($search);
    $query = "SELECT products.Name,products.Image,products.Price, products.Discount ,brands.Name as 'Brand_Name',gender.Name as 'Gender_Name' FROM products 
    INNER JOIN brands on products.ID_Brand = brands.ID_Brand INNER JOIN gender on products.ID_Gender = gender.ID_Gender WHERE products.Name like '$search%';";
    // cú pháp truy vấn
    $results = mysqli_query($conn, $query);
    // kiểm tra kết quả trả về của câu truy vấn 
    if (mysqli_num_rows($results) != 0) {
        while ($row = mysqli_fetch_array($results)) {
            //Image lưu trữ nhiều ảnh, tách dữ liệu lấy ảnh đầu tiên. Các ảnh được ngăn cách bởi dấu ,
            $img1 = explode(",", $row['Image']);
            // tính giá bán sau khi đã áp giảm giá
            $discount = $row['Discount'];
            $price = $row['Price'];
            // number_format dùng định dạng số theo kiểu đơn vị tiền tệ 
            $price = number_format($price - ($price * $discount)) . " VNĐ";
            // hiển thị html ra bên ngoài
            $searchResult .= '
            <div class="row">
                <div class="col-2"><img class="imgSearch" src="./img/image_products_home/' . ($img1[0]) . '" alt=""></div>
                <div class="col-10">
                    <div class="row rowName"><a href="shop.php?gender=' . ($row['Gender_Name']) . '&brand=' . ($row['Brand_Name']) . '">' . ($row['Name']) . '</a></div>
                    <div class="row rowPrice">' . ($price) . '</div>
                </div>
            </div>
            ';
        }
    }
    // kiểm tra tìm kiếm trả về từ truy vấn bằng 0 thì báo không tìm thấy sản phẩm và ngược lại in ra kết quả
    echo $searchResult === "" ? "Không tìm thấy sản phẩm" : $searchResult;
}