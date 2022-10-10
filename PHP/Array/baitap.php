<?php
/*
echo "Phép toán cơ bản<br>";
$a = rand(-1000,1000);
$b = rand(-1000,1000);
echo "$a + $b = " .$a+$b. "</br>";
echo "$a - $b = " .$a-$b. "</br>";
echo "$a * $b = " .$a*$b. "</br>";
echo "$a / $b = " .round($a/$b,2). "</br>";
echo "<br>Bài tập câu điều kiện<br>";
$num = rand(1,1000);
echo "Số được random là: $num </br>";
if($num %2==0)
{
    if($num >100)
        echo "Số chẵn và lớn hơn 100";
    else
        if($num<100)
            echo "Số chẵn và nhỏ hơn 100";
}
echo "<br>Vòng lặp for<br>";
echo "Các số chẵn từ 0 đến số random $num là";
for($i =1; $i<=$num;$i++)
    if($i %2==0)
        echo "$i ";
echo "<br>Mảng <br>";
$arr = array ('Nguyễn Quốc Châu','Nguyễn Khánh Nam','Nguyễn Trần Hoàn Kim');
foreach($arr as $name)
{
    echo "<font color='red'>$name</font> <br>";
}
echo "<br>Bài tập cộng điểm<br>";
$number = rand(1,100);
echo "Số random là : $number<br>";
for($i =2;$i<=$number;$i++)
{
    for($i =2;$i<=sqrt($number);$i++)
        if($number%$i==0)
            echo "$number ";
}
$chosse = rand(1,10);
echo "<br>Bảng cửu chương $chosse<br>";

for($i=1;$i<=10;$i++)
    echo "$chosse x $i = ". $chosse*$i ."<br>";
*/
echo "<br>Bài tập trên lớp<br>";
$anum = rand(1,4);
$bnum = rand(10,100);
define('PI',3.14);
switch($anum)
{
    case 1:
        echo "<br>a là: $anum<br>";
        echo "<br>Cạnh có độ dài là b = $bnum<br>";
        echo "<br>Chu vi hình vuông là:" .$bnum*4 ."<br>";
        echo "<br>Diện tích hình vuông là:" .$bnum*$bnum . "<br>";
        break;
    case 2:
        echo "<br>a là: $anum <br>";
        echo "<br>Bán kính có độ dài là b = $bnum <br>";
        echo "<br>Chu vi hình tròn là:" .(2*$bnum) * PI . "<br>";
        echo "<br>Diện tích hình tròn là:" .((($bnum+$bnum)*($bnum+$bnum))*PI) /4 . "<br>";
        break;
    case 3:
        echo "<br>a là: $anum <br>";
        echo "<br>Cạnh tam giác có độ dài là b = $bnum <br>";
        echo "<br>Chu vi hình tam giác đều là:" . 3*$bnum . "<br>";
        echo "<br>Diện tích hình tam giác đều là:" . ($bnum*$bnum ) * (3/4) . "<br>";
        break;
    case 4:
        echo "<br>a là: $anum <br>";
        echo "<br>Cạnh chữ nhật có độ dài là b = $bnum <br>";
        echo "<br>Chu vi hình chữ nhật là:" . ($anum+$bnum) *2 . "<br>";
        echo "<br>Diện tích hình chữ nhật là:" . ($anum*$bnum ) . "<br>";
        break;
}

?>