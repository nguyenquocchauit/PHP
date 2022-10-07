<html>

<head>

    <title>Setting up a PHP session</title>

</head>

<body>
    <?php
    session_start();
    $_SESSION['arr'] = 0;
    if (isset($_POST['submit'])) {
        if (count($_SESSION['arr']) == 0) {
            $ar = array();
            $val = $_POST['value'];
            array_push($ar, $val);
            $_SESSION['arr'] = $ar;
        } else {
            $val = $_POST['value'];
            array_push($_SESSION['arr'], $val);
        }
        session_write_close();
    }
    print_r($_SESSION['arr']);
    ?>
    <?php
    function float2rat($n, $tolerance = 1.e-6)
    {
        $h1 = 1;
        $h2 = 0;
        $k1 = 0;
        $k2 = 1;
        $b = 1 / $n;
        do {
            $b = 1 / $b;
            $a = floor($b);
            $aux = $h1;
            $h1 = $a * $h1 + $h2;
            $h2 = $aux;
            $aux = $k1;
            $k1 = $a * $k1 + $k2;
            $k2 = $aux;
            $b = $b - $a;
        } while (abs($n - $h1 / $k1) > $n * $tolerance);

        return "$h1/$k1";
    }

    printf("%s\n", float2rat(-0.5)); # 200/3
    printf("\n");
    printf("%s\n", float2rat(sqrt(2)));  # 1393/985
    printf("%s\n", float2rat(0.43212));  # 748/1731
    ?>

    <form action="" method="post">
        <input type="text" name="value" value="">
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>