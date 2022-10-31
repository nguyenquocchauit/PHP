 <!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC Watch - Danh sách chi tiết đặt hàng</title>
 </head>

 <body>
    <?php
      // thêm file navbar menu
      include "../header_footer/header.php";
      ?>
    <div class="body-list-order-customer">
       <div class="container-fluid">
          <h4 class="text-center mb-5">Chi tiết hóa đơn</h4>
          <table>
             <tr class="tr1">
                <td>
                   <p>ID_Detail</p>
                </td>
                <td>
                   <p>ID_Oder</p>
                </td>
                <td>
                   <p>ID_Product</p>
                </td>
                <td>
                   <p>Product</p>
                </td>
                <td>
                   <p>Create_At</p>
                </td>
                <td>
                   <p>Quantity</p>
                </td>
                <td>
                   <p>Price</p>
                </td>
                <td>
                   <p>Total</p>
                </td>
             </tr>
             <tr>
                <td>
                   <p>Detail0011111111111111111</p>
                </td>
                <td>
                   <p>Oder001</p>
                </td>
                <td>
                   <p>Product001</p>
                </td>
                <td>
                   <img src="../img/image_products_home/airacobra-p45-chrono-1.png" alt="" srcset="">
                </td>
                <td>
                   <p>25/10/2022</p>
                </td>
                <td>
                   <p>2</p>
                </td>
                <td>
                   <p>10.000.000 vnđ</p>
                </td>
                <td>
                   <p>20.000.000 vnđ</p>
                </td>
             </tr>
             <tr>
                <td>
                   <p>Detail001</p>
                </td>
                <td>
                   <p>Oder0012222222222222222</p>
                </td>
                <td>
                   <p>Product001</p>
                </td>
                <td>
                   <img src="../img/image_products_home/airacobra-p45-chrono-1.png" alt="" srcset="">
                </td>
                <td>
                   <p>25/10/2022</p>
                </td>
                <td>
                   <p>2</p>
                </td>
                <td>
                   <p>10.000.000 vnđ</p>
                </td>
                <td>
                   <p>20.000.000 vnđ</p>
                </td>
             </tr>
             <tr>
                <td>
                   <p>Detail001</p>
                </td>
                <td>
                   <p>Oder001</p>
                </td>
                <td>
                   <p>Product0013333333333333</p>
                </td>
                <td>
                   <img src="../img/image_products_home/airacobra-p45-chrono-1.png" alt="" srcset="">
                </td>
                <td>
                   <p>25/10/2022</p>
                </td>
                <td>
                   <p>2</p>
                </td>
                <td>
                   <p>10.000.000 vnđ</p>
                </td>
                <td>
                   <p>20.000.000 vnđ</p>
                </td>
             </tr>
          </table>
       </div>
    </div>

    <?php
      // thêm file footer
      include "../header_footer/footer.php";
      ?>
 </body>

 </html>