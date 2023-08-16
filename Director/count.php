<?php
require '../configuration/connectConfiguration.php'; 



$com ="SELECT * FROM personalinformationtable";
$user = mysqli_query($conn , $com);
$count = mysqli_num_rows($user);

$com1 ="SELECT * FROM studentuseraccount WHERE studentStatus = 'GRADUATING'";
$user1 = mysqli_query($conn , $com1);
$count1 = mysqli_num_rows($user1);


$com2 ="SELECT * FROM studentuseraccount WHERE studentStatus = 'ALUMNI'";
$user2 = mysqli_query($conn , $com2);
$count2 = mysqli_num_rows($user2);

$com4 ="SELECT * FROM personalinformationtable";
$user4 = mysqli_query($conn , $com4);
$count4 = mysqli_num_rows($user4);

?>