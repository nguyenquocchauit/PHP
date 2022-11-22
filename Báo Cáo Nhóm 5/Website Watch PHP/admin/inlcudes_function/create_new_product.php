<?php
require "../../config/connectDB.php";
$array_message = [];
if (
    isset($_POST['idproduct']) && isset($_POST['name']) && isset($_POST['brand'])
    && isset($_POST['gender']) && isset($_POST['price']) && isset($_POST['quantity'])
    && isset($_POST['discount']) && isset($_POST['description']) && isset($_FILES['files']) != null
) {
    $IDProduct = $_POST['idproduct'];
    $Name = $_POST['name'];
    $Brand = $_POST['brand'];
    $Gender = $_POST['gender'];
    $Price = $_POST['price'];
    $Quantity = $_POST['quantity'];
    $Discount = $_POST['discount'];
    $Description = $_POST['description'];
    // lấy thời gian hệ thống
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $TimeNow = date("Y-m-d H:i:s");
    $Image = [];
    for ($i = 0; $i < sizeof($_FILES['files']); $i++) {
        $Image[$i] = $_FILES['files']['name'][$i];
    }
    $Image  = implode(",", $Image);
    $sql = "INSERT INTO `products`(`ID_Product`, `Name`, `Description`, `Image`, `Quantity`, `Price`, `Discount`, `Create_At`, `Update_At`, `ID_Brand`, `ID_Gender`) 
    VALUES ('$IDProduct','$Name','$Description','$Image','$Quantity','$Price','$Discount','$TimeNow','$TimeNow','$Brand','$Gender')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // thêm ảnh vào folder hiển thị ảnh preview
        move_uploaded_file($_FILES['files']['tmp_name'][0], "C:\\Users\\chauq\\OneDrive\\Documents\\PHP\\Báo Cáo Nhóm 5\\Website Watch PHP\\img\\image_products_home\\" . $_FILES['files']['name'][0]);
        // thêm ảnh vào folder tương ứng với từng hãng thuộc loại của giới tính
        if ($Gender == "IDM") {
            $path = "C:\\Users\\chauq\\OneDrive\\Documents\\PHP\\Báo Cáo Nhóm 5\\Website Watch PHP\\img\\images\\Men\\";
            move_upload_file($_FILES['files'], $Brand, $path);
        } else if ($Gender == "IDWM") {
            $path = "C:\\Users\\chauq\\OneDrive\\Documents\\PHP\\Báo Cáo Nhóm 5\\Website Watch PHP\\img\\images\\\Women\\";
            move_upload_file($_FILES['files'], $Brand, $path);
        }
        $array_message['message'] = 0;
    }
}

function move_upload_file($file, $brand, $path)
{
    switch ($brand) {
        case "Avia":
            $path = $path . "aviator\\";
            for ($i = 0; $i < sizeof($file); $i++) {
                $file_name = $file['name'][$i];
                $file_tmp = $file['tmp_name'][$i];
                move_uploaded_file($file_tmp, $path . $file_name);
            }
            break;
        case "Baby":
            $path = $path . "baby-g\\";
            for ($i = 0; $i < sizeof($file); $i++) {
                $file_name = $file['name'][$i];
                $file_tmp = $file['tmp_name'][$i];
                move_uploaded_file($file_tmp, $path . $file_name);
            }
            break;
        case "Bentley":
            $path = $path . "bentley\\";
            for ($i = 0; $i < sizeof($file); $i++) {
                $file_name = $file['name'][$i];
                $file_tmp = $file['tmp_name'][$i];
                move_uploaded_file($file_tmp, $path . $file_name);
            }
            break;
        case "Citizen":
            $path = $path . "citizen\\";
            for ($i = 0; $i < sizeof($file); $i++) {
                $file_name = $file['name'][$i];
                $file_tmp = $file['tmp_name'][$i];
                move_uploaded_file($file_tmp, $path . $file_name);
            }
            break;
        case "Olym":
            $path = $path . "olym-pianus\\";
            for ($i = 0; $i < sizeof($file); $i++) {
                $file_name = $file['name'][$i];
                $file_tmp = $file['tmp_name'][$i];
                move_uploaded_file($file_tmp, $path . $file_name);
            }
            break;
        case "Shock":
            $path = $path . "g-shock\\";
            for ($i = 0; $i < sizeof($file); $i++) {
                $file_name = $file['name'][$i];
                $file_tmp = $file['tmp_name'][$i];
                move_uploaded_file($file_tmp, $path . $file_name);
            }
            break;
    }
}

echo json_encode($array_message);
