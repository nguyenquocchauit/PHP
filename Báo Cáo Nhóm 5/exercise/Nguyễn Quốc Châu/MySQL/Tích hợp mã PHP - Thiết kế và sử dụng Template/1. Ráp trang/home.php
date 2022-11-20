<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../../includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>

    <title>Sản phẩm - TC Watch</title>

    <style>
        .fill {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden
        }

        .fill img {
            flex-shrink: 0;
            min-width: 100%;
            min-height: 100%;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid w-100 h-100">
        <?php include "../../../../../includes/header.php"; ?>
        <div class="container-fluid">
            <div class="row fill">
                <?php
                include   'top.html';
                ?>
            </div>
            <div class="row">
                <div class="col-4 fill">
                    <?php
                    include   'left.html';
                    ?>
                </div>
                <div class="col-8 fill">
                    <?php
                    include   'center.html';
                    ?>
                </div>
            </div>
            <div class="row fill">
                <?php
                include   'bottom.html';
                ?>
            </div>
        </div><?php include "../../../../../includes/footer.php"; ?>
    </div>

</body>

</html>