<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XLTT</title>
</head>

<body>
    <?php
    $arrsub = $_POST['subject'];
    $test = implode(",", $arrsub);

    echo "Bạn đã đăng nhập thành công , dưới đây là thông tin của bạn :<br/>";
    echo "Họ tên : " . $_POST['name'] . "<br/>";
    echo "Giới tính : " . $_POST['radiobtn'] . "<br/>";
    echo "Địa chỉ : " . $_POST['add'] . "<br/>";
    echo "Điện thoại :" . $_POST['phone'] . "<br/>";
    echo "Quốc tịch : " . $_POST['nationality'] . "<br/>";
    echo "Môn học : " . $test . "<br/>";
    echo "Ghi Chú : " . $_POST['note'] . "<br/>";
    ?>
</body>

</html>