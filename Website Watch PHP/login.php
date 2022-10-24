<?php
session_start();
session_unset();
require "connectDB.php";
$array_message = array();
/*
     message : 1 //Tài khoản không tồn tại
     message : 0 //Đăng nhập thành công
     message : -1 //Sai mật khẩu
    */
if (isset($_POST['username']) && isset($_POST['password'])) {
    $sqlUserName = null;
    // mysqli_real_escape_string loại bỏ cách ký tự đặc biệt 
    $_username = mysqli_real_escape_string($conn, $_POST['username']);
    // bỏ in hoa tất cả ký tự của tài khoản
    $_username = strtolower($_username);
    // kiểm tra username là email hay tên tài khoản (username)
    if (str_contains($_username, '@') && str_contains($_username, '.')) {
        $sql = "SELECT * FROM customers WHERE Email='" . $_username . "'";
        $result = mysqli_query($conn, $sql);
        // nếu trả không tồn tại in ra thông báo và ngược lại gán thêm câu truy vấn username UserName
        if (mysqli_num_rows($result) == 0)
            $array_message['message'] = 1;
        else
            $sqlUserName = "And Email='" . $_username . "'";
    } else {
        // nếu tài khoản không chứa khoản trắng thì xử lý
        if (!(str_contains($_username, " "))) {
            // truy vấn tồn tại username trong db
            $sql = "SELECT * FROM customers WHERE UserName='" . $_username . "'";
            $result = mysqli_query($conn, $sql);
            // nếu trả không tồn tại in ra thông báo và ngược lại gán thêm câu truy vấn username Email
            if (mysqli_num_rows($result) != 0)
                $sqlUserName = "And UserName='" . $_username . "'";
            else
                $array_message['message'] = 1;
        }
    }
    $_pass = mysqli_real_escape_string($conn, $_POST['password']);
    // truy vấn lấy mã người dùng (sau này viết thêm phân quyền (role))
    $sqlLogin = "SELECT * FROM customers WHERE 1 $sqlUserName and Password='" . $_pass . "'";
    $result = mysqli_query($conn, $sqlLogin);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['CurrentUser'] = $row['ID_Customer'];
        $array_message['message'] = 0;
        $array_message['success'] = 'home.php';
    } else {
        // sai mật khẩu
        $array_message['message'] = -1;
    }
}
echo json_encode($array_message);
