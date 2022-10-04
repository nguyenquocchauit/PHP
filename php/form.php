<html>
<body\>
<?php
echo "<strong>Registration information</strong><br>";
echo $_GET["name"]. "<br>";
// if($_GET["sex"] == "Male")
//     echo "Male<br>";
// else
//     echo "Female<br>";
echo $_GET["sex"]. "<br>";
echo $_GET["birthday"]. "<br>";
$listHobby = $_GET["hobby"];
foreach ($listHobby as $hobby){ 
    echo $hobby."<br>";
}
echo $_GET["username"]. "<br>";
echo $_GET["password"]. "<br>";
?>
</body>
</html>
