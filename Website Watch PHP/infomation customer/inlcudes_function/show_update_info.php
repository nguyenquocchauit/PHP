<?php 
session_start();
if (isset($_SESSION['CurrentUser']['ID']) && isset($_SESSION['CurrentUser']['Role'])) {
    $CurrentUser =  $_SESSION['CurrentUser']['ID'];
    $IDUser = $_SESSION['CurrentUser']['Role'];
} else {
    $CurrentUser = "null";
    $IDUser = "null";
    
}
$sql = "SELECT * FROM `customers` WHERE 1 and ID_Customer='$CurrentUser' and ID_Role='$IDUser' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

