<!DOCTYPE html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../../includes/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>


	<title>Xử lý n</title>
</head>

<body>
	<?php include "../../includes/header.php"; ?>

	<?php

	if (isset($_POST['n'])) $n = $_POST['n'];

	else $n = 0;



	$ketqua = "";

	if (isset($_POST['hthi'])) {	//tạo mảng có n phần tử, các phần tử có giá trị [-100,100]

		$arr = array();

		for ($i = 0; $i < $n; $i++) {

			$x = rand(-100, 100);

			$arr[$i] = $x;
		}

		//In ra mảng vừa tạo

		$ketqua = "Mảng được tạo là:" . implode(" ", $arr) . "&#13;&#10;";



		//Tìm và in ra các số dương chẵn trong mảng dùng hàm foreach

		$count = 0;

		foreach ($arr as $v) {

			if ($v % 2 == 0 && $v > 0)

				$count++;
		}

		$ketqua .= "Có $count số chẵn >0 trong mảng" . "&#13;&#10;";



		//Tìm và in ra các số <n có chữ số cuối là số lẻ

		$ketqua .= "Các số có chữ số cuối là số lẻ là: ";

		$daySo = "";

		for ($i = 0; $i < count($arr); $i++) {

			$soCuoi = $arr[$i] % 10;

			if ($soCuoi % 2 != 0)

				$daySo .= "$arr[$i]  ";
		}

		$ketqua .= $daySo;

		// Tính tổng các số âm trong mang 
		$tongam = 0;
		foreach ($arr as $v) {
			if ($v < 0) {
				$tongam = $tongam + $v;
			}
		}
		$ketqua .= "\n Tổng các số âm trong mảng là :  $tongam";
		// In ra vị trí các số trong mang có giá trị 0

		$ketqua .= "\n Vị trí của các số có giá trị bằng 0 :";
		$daySo = "";
		for ($i = 0; $i < count($arr); $i++) {
			if ($arr[$i] == 0) {
				$daySo .= "$i" . " ";
			}
		}
		$ketqua .= $daySo;
		// Sắp xếp tăng dần

		$ketqua .= "\nMảng tăng dần là : ";
		sort($arr);
		foreach ($arr as $v) {
			$ketqua .= "$v" . " ";
		}
	}
	?>

	<form action="" method="post">

		Nhập n: <input type="text" name="n" value="<?php echo $n ?>" />

		<input type="submit" name="hthi" value="Hiển thị" /><br>

		Kết quả: <br>

		<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua ?></textarea>

	</form>
	<?php include "../../includes/footer.php"; ?>

</body>

</html>