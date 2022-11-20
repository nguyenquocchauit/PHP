<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    <!-- thư viện sweet aler  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <title>Báo cáo nhóm 5 - Thông tin nhóm</title>
</head>

<body class="body">
    <div class="container-fluid w-100 h-100">
        <?php include "includes/header.php"; ?>
        <div class="card-body">
            <div class="content">
                <div class="pt-3">
                    <div class="d-flex justify-content-around pt-3">
                        <div class="info">
                            <div class="Img pb-3">
                                <img src="./images/nqc.jpg" alt="Picture" />
                            </div>
                            <fieldset>
                                <legend><b>NGUYỄN QUỐC CHÂU</b></legend>
                                <table>
                                    <tr>
                                        <td>Mã số sinh viên: </td>
                                        <td><span>61130073</span></td>
                                    </tr>

                                    <tr>
                                        <td>Ngày sinh: </td>
                                        <td><span>27-08-2001</span></td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td><span>chau.nq.61cntt@ntu.edu.vn</span></td>
                                    </tr>
                                    <tr>
                                        <td>Đơn vị: </td>
                                        <td><span>61.CNTT-1</span></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <button type="button" class="btn btn-outline-secondary mt-3"><a href="exercise.php?id=nqc">Bài tập cá nhân</a></button>
                        </div>
                        <div class="info">
                            <div class="Img pb-3">
                                <img src="./images/ptht.jpg" alt="Picture" />
                            </div>
                            <fieldset>
                                <legend><b>PHAN THỊ HUYỀN TRÂM</b></legend>
                                <table>
                                    <tr>
                                        <td>Mã số sinh viên: </td>
                                        <td><span>61132187</span></td>
                                    </tr>

                                    <tr>
                                        <td>Ngày sinh: </td>
                                        <td><span>06-07-2001</span></td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td><span>tram.pth.61cntt@ntu.edu.vn</span></td>
                                    </tr>
                                    <tr>
                                        <td>Đơn vị: </td>
                                        <td><span>61.CNTT-1</span></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <button type="button" class="btn btn-outline-secondary mt-3"><a href="exercise.php?id=ptht">Bài tập cá nhân</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php"; ?>
</body>

</html>