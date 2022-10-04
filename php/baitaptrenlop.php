<?php
$i =0;
$a=rand(1,9);
$b=rand(0,9);
$astr = "$a";
$bstr = "$b";
$arr[] = array();
$c=(int)$astr.$bstr;
for (;$i<=5;$i++)
    if($c<=65)
    {
        //$i++;
        //echo $c ."-hh";
        array_push($arr,$c);
    }
    print_r($arr);
?>