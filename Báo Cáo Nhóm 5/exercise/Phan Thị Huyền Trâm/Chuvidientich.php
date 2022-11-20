<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <?php include "../../includes/header.php"; ?>
    <?php
    echo "Bài 4";
    $a = rand(1, 4);
    $b = rand(10, 100);
    echo "<br> a=$a &nbsp b=$b";
    switch ($a != 1) {
        case 0:
            echo "<br> Chu vi hình vuông :" . $b * 4;
            echo "<br> Diện tích hình vuông : " . $b * $b;
    }
    switch ($a != 2) {
        case 0:
            echo "<br> Chu vi hình tròn :" . (2 * 3.14) * ($b);
            echo "<br> Diện tích hình tròn : " . (3.14) * pow($b, 2);
    }
    switch ($a != 3) {
        case 0:
            echo "<br> Chu vi tam giác đều :" . $b * 3;
            echo "<br> Diện tích tam giác đều : " . ($b * ($b * sqrt(3) / 2)) / 2;
    }
    switch ($a != 4) {
        case 0:
            echo "<br> Chu vi chữ nhật :" . ($b + $a) * 2;
            echo "<br> Diện tích chữ nhật : " . $a * $b;
    }
    ?>
    <?php include "../../includes/footer.php"; ?>

</body>

</html>