<?php
session_start();
session_unset();
require "connectDB.php";
$array_message = array();
/*
     message : 1 //Đăng nhập thành công
     message : 0 //Email & Password không đúng
     message : -1 // không tồn tại email & password
    */
if (isset($_POST['email']) && isset($_POST['password'])) {
    $_email = mysqli_real_escape_string($conn, $_POST['email']);
    $_pass = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM `customers` WHERE `Email`='" . $_email . "' and `Password`='" . $_pass . "'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) != 0) {
        $row = mysqli_fetch_array($query);
        $_SESSION['CurrentUser'] = $row['ID_Customer'];
        $array_message['message'] = 1;
        $array_message['success'] = 'home.php';
    } else {
        $array_message['message'] = $sql;
    }
} else {

    $array_message['message'] = -1;
}
echo json_encode($array_message);
