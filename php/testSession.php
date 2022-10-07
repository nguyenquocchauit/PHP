<html>

<head>

    <title>Setting up a PHP session</title>

</head>

<body>
    <?php
    session_start();
    $_SESSION['arr']=0;
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

    <form action="" method="post">
        <input type="text" name="value" value="">
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>