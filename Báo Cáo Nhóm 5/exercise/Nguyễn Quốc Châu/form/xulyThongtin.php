<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Thông tin</title>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "../../../includes/header.php"; ?>
        <?php
        $name = $_POST["name"];
        $address = $_POST["address"];
        $numberphone = $_POST["numberphone"];
        $gender = $_POST["gender"];
        $nationality = $_POST["nationality"];
        $subject = $_POST["subjects"];
        $tmpSubject = ' ';
        if ($subject != '')
            foreach ($subject as $list) {
                $tmpSubject .= $list . ", ";
            }
        $tmpSubject .= ".";
        $comment = $_POST["comment"];
        echo "<b>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</b> <br>";
        echo "Họ tên: " . $name . "<br>";
        echo "Giới tính: " . $gender . "<br>";
        echo "Địa chỉ: " . $address . "<br>";
        echo "Điện thoại: " . $numberphone . "<br>";
        echo "Quốc tịch: " . $nationality . "<br>";
        echo "Môn học: " . $tmpSubject . "<br>";
        echo "Ghi chú: " . $comment . "<br>";
        echo "<a href='javascript:window.history.back(-1);'>Trở về trang trước</a>"
        ?>
        <?php include "../../../includes/footer.php"; ?>
    </div>

</body>

</html>