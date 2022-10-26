<?php
//session_start();
$array_message = array();
include "connectDB.php";
include "auto_idorder.php";

/*
    message : 0 //Thêm thành công
*/
if (isset($_POST['ID_Customer']) && isset($_POST['Create_At']) && isset($_POST['Total'])) {

    $ID_Customer = $_POST['ID_Customer'];
    $Create_At = $_POST['Create_At'];
    $Total_Order = $_POST['Total'];
    // kiểm tra khách hàng đã tạo hóa đơn trước đó chưa
    $sql = "SELECT  * FROM `orders` WHERE 1 AND ID_Customer='$ID_Customer'";
    $results = mysqli_query($conn, $sql);
    // kiểm tra đã tồn tại chưa
    if (mysqli_num_rows($results) != 0) {
        $row = mysqli_fetch_array($results);
        $totalOld = $row['Total'];
        $Total_Order = $Total_Order + $totalOld;
        // cập nhật tổng tiền của khách hàng trong bảng order
        $sql = "UPDATE orders SET Total='$Total_Order' WHERE ID_Customer='$ID_Customer'";
        $result = mysqli_query($conn, $sql);
        // thêm chi tiết sản phẩm vào trong order_details
        $ID_Order = $row['ID_Order']; // $row['ID_Order'] lấy lại từ bảng order khi khách hàng đã có order trước đó
        //sử dụng vòng lặp duyệt tất cả các sản phẩm có trong session[cart] thêm vào database
        $array_message['message'] = null;
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            // gọi file auto_iddetail.php tăng tự động mã iddetail mỗi vòng lặp
            include "auto_iddetail.php";
            $ID_Product = $_SESSION['cart'][$i][0];
            $Quantity = $_SESSION['cart'][$i][4];
            $Price = $_SESSION['cart'][$i][3];
            // tính giá tổng của sp
            $Total_Product = $Price * $Quantity;
            // truy vấn thêm vào db
            $sql = "INSERT INTO `order_details`(`ID_Detail`, `ID_Order`, `ID_Product`, `Create_At`, `Quantity`, `Price`, `Total`) 
            VALUES ('$ID_Detail','$ID_Order','$ID_Product','$Create_At','$Quantity','$Price','$Total_Product')";
            $result = mysqli_query($conn, $sql);
            $array_message['message'] = 0;
            $array_message['success'] = 'home.php';
        }
        // thêm xong xóa giỏ hàng
        unset($_SESSION['cart']);
    }
}
echo json_encode($array_message);
