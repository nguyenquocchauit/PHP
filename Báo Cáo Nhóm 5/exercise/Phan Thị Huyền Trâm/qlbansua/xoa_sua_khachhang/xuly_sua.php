<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
or die('Không thể kết nối tới database' . mysqli_connect_error());

if (isset($_POST['edit'])) 
{
    $id = $_POST['idkh'];
    $Name = $_POST['name'];
    $Gender = $_POST['gender'];
    $Address = $_POST['add'];
    $Phone = $_POST['phone'];
    $Email = $_POST['email'];
        $edit = "UPDATE khach_hang SET Ten_khach_hang='$Name',Phai='$Gender', Dia_chi='$Address' ,Dien_thoai='$Phone',Email='$Email' WHERE Ma_khach_hang = '$id' ";
        $resultedit = mysqli_query($conn, $edit);
        echo "  <script>
                alert('Sửa thành công');
                </script>";
}
?>