<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #hidden {
            visibility: hidden;
        }
    </style>
</head>

<body>
    <?php
    // get file name 
    $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    
    // của bài tìm kiếm đơn giản, kiểm tra inp_MilkName rỗng thì gán bằng null. Tránh xung đột biến khi include cho các bài khác
    $addPagination = null;
    if (isset($inp_MilkName)) {
        $findMilkName = '&inp_MilkName=' . ($inp_MilkName) . '';
    } else {
        $inp_MilkName = null;
        $findMilkName = null;
    }
    // của bài tìm kiếm nâng cao
    if (isset($milkType)) {
        $findMilkType = '&milkType=' . ($milkType) . '';
    } else {
        $milkType = null;
        $findMilkType = null;
    }
    if (isset($milkBrand)) {
        $findMilkBrand = '&milkBrand=' . ($milkBrand) . '';
    } else {
        $milkBrand = null;
        $findMilkBrand = null;
    }
    $addHidden = null;
    // kiểm tra đúng file cần dùng sẽ thêm addPagination, các file khác sẽ không cần dùng đến biến trên URL 
    switch ($curPageName) {
        case 'tim_kiem_don_gian.php':
            $addPagination = '' . ($findMilkName) . '';
            break;
        case 'tim_kiem_nang_cao.php':
            $addPagination = '' . ($findMilkType) . '' . ($findMilkBrand) . '' . ($findMilkName) . '';
            break;
    }
    //xác định xem khách truy cập số trang nào hiện đang truy cập
    if (!isset($_GET['page'])) {
        // Giải quyết trường hợp ngoại lệ $_GET['page'] ở url không thấy biến page ở lần tải trang đầu tiên. 
        // Giải quyết trường hợp câu điều kiện phía dưới kiểm tra $_GET['page']  để active số trang đang ở hiện tại
        $parameterUrl = null;
        $page = 1;
    } else {
        $parameterUrl = " ";
        $page = $_GET['page'];
    }
    // addActivePage lưu trữ class active trang hiện tại
    $addActivePage = null;
    // kiểm tra nếu click prev đến trang 1 thì dừng hành động prev tại page=0, vì xác định page_first_result = page - 1 => page_first_result =-1, load page sẽ lỗi ngược lại thì click next tương tự
    if ($page == 1)
        $prevPage = 1;
    else
        $prevPage = $page - 1;
    if ($page == $number_of_page)
        $nexPage = $number_of_page;
    else
        $nexPage = $page + 1;
    echo '
    <nav aria-label="Page navigation example" id="' . ($addHidden) . '">
    <ul class="pagination justify-content-center">
        <li class="page-item prev">
            <a class="page-link" href="' . ($curPageName) . '?page=' . ($prevPage) . ($addPagination) . ' " aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only"></span>
            </a>
        </li>';
    //hiển thị liên kết của các trang trong URL
    for ($page = 1; $page <= $number_of_page; $page++) {
        if ($parameterUrl == null) {
            $addActivePage = null;
        } else
        if ($page == $_GET['page']) {
            $addActivePage = 'active';
        } else {
            $addActivePage = null;
        }
        echo "<li class='page-item " . ($addActivePage) . "'><a class='page-link' href = '" . ($curPageName) . "?page=" . ($page) . ($addPagination) . "'>" . ($page) . "</a></li>";
    }
    echo '
        <li class="page-item next">
            <a class="page-link" href="' . ($curPageName) . '?page=' . ($nexPage) . ($addPagination) . '" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only"></span>
            </a>
            </li>
        </ul>
    </nav>';
    ?>
</body>