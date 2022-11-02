<?php
if (isset($_REQUEST["search"])) {
    $search = $_REQUEST["search"];
    $addWhere = "AND ID_Product LIKE '%$search%' or b.Name LIKE '%$search%' or c.Name LIKE '%$search%'";
} else {
    $search = $addWhere = null;
}

$sql = "SELECT a.Name as Name_Product,b.Name as Name_Brand, c.Name as Name_Gender,ID_Product,Description,Image,Quantity,Price,Discount,Create_At,Update_At 
FROM `products` a inner join brands b on a.ID_Brand = b.ID_Brand inner join gender c on c.ID_Gender=a.ID_Gender WHERE 1 $addWhere";
$result = mysqli_query($conn, $sql);
//////////////////
//  TÌM TỔNG SỐ RECORDS

$total_records = mysqli_num_rows($result);


//  TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;

//  TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;
$sql = "SELECT a.Name as Name_Product,b.Name as Name_Brand, c.Name as Name_Gender,ID_Product,Description,Image,Quantity,Price,Discount,Create_At,Update_At 
FROM `products` a inner join brands b on a.ID_Brand = b.ID_Brand inner join gender c on c.ID_Gender=a.ID_Gender WHERE 1 $addWhere LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);
$array_message = array();
$array_message['message']=0;
echo json_encode($array_message);