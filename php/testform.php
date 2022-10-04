<html>
<body>
<?php
/* Check empty variables*/
$message = "You did not fill out the required fields.";
if(isset($_GET["name"]) || trim($_GET["name"]) =='' || isset($_GET["birthday"]) || isset($_GET["username"]) || trim($_GET["username"]) =='' || isset($_GET["password"]) || trim($_GET["password"]) =='')
    echo "<script type='text/javascript' onClick='javascript:history.go(-1)'>alert('$message');</script>";
else
{

    /* Initialize variables */
    $fullName = $_GET["name"];
    $Gender = $_GET["gender"];
    $birthDay = $_GET["birthday"];
    $contentsHobby = '';
    $listHobby = $_GET["hobby"];
    if($listHobby != '')
    foreach ($listHobby as $hobby){ 
        $contentsHobby  .= $hobby . ",";
    }
    $contentsHobby .= "...";
    $userName = $_GET["username"];
    $passWord = $_GET["password"];
    /* Push data in file */
    $fp= fopen ('../form.txt',"w+");
    if(!$fp)
        echo "File $fp not found !!";
    else
    {
        $data = 'Registration information' . "\n" . "Full Name : ".$fullName. "\n" . "Gender : ".$Gender . "\n" . "Birthday : ".date('d/m/Y',strtotime($birthDay)) . "\n"
        . "Hobby : ".$contentsHobby . "\n" . "Username : " .$userName."\n". "Password : ".$passWord . "\n";
        fwrite($fp,$data);
        fclose($fp);
    }
    $readFile = fopen('../form.txt',"r") or die("File $fp not found !!");
    while(!feof($readFile))
        echo fgets($readFile) . "<br>";
    fclose($readFile);
}
?>
</body>
</html>
