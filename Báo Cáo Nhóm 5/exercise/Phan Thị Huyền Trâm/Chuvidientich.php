<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
</body>

</html>