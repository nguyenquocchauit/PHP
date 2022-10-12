<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            min-height: 100%
        }
    </style>
</head>

<body>
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
    </div>
</body>

</html>