<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin</title>
</head>
<body>
    <?php 
        $name = $_POST["name"];
        $address = $_POST["address"];
        $numberphone = $_POST["numberphone"];
        $gender = $_POST["gender"];
        $nationality = $_POST["nationality"];
        $subject = $_POST["subjects"];
        $tmpSubject =' ';
        if($subject !='')
            foreach( $subject as $list)
            {
                $tmpSubject .= $list.", ";
            }   
        $tmpSubject .= ".";
        $comment = $_POST["comment"];
        echo "<b>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</b> <br>";
        echo "Họ tên: ".$name ."<br>";
        echo "Giới tính: ".$gender."<br>";
        echo "Địa chỉ: ".$address."<br>";
        echo "Điện thoại: " .$numberphone."<br>";
        echo "Quốc tịch: " .$nationality."<br>";
        echo "Môn học: " .$tmpSubject."<br>";
        echo "Ghi chú: " .$comment."<br>";
        echo "<a href='javascript:window.history.back(-1);'>Trở về trang trước</a>"
    ?>
</body>
</html>