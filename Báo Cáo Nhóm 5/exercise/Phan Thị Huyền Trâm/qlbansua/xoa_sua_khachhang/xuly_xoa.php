<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die('Không thể kết nối tới database' . mysqli_connect_error());

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $check = "SELECT Ma_khach_hang FROM hoa_don WHERE Ma_khach_hang = '$id' ";
        $result = mysqli_query($conn, $check);
        if (mysqli_num_rows($result) != 0) 
            {
                echo "  <script>
                alert('Không thể xóa khách hàng có hóa đơn mua hàng');
                </script>";
            }
        else{
            $delete = "DELETE FROM khach_hang WHERE Ma_khach_hang ='$id'";
            $resultdelete = mysqli_query($conn, $delete);
            echo "  <script>
                        alert('Xóa thành công');
                    </script>";
        }
    
    }

?>
