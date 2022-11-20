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

    <title>XLTT</title>
</head>

<body>
    <?php include "../../../includes/header.php"; ?>
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
    <?php include "../../../includes/footer.php"; ?>

</body>

</html>