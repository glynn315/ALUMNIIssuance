<?php
require 'configuration/connectConfiguration.php';
session_start();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn,"SELECT * from studentuseraccount where studentUsername = '$user_check'");
   
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['studentCount'];
$login_Name = $row['studentFname'] . ' ' .$row['studentLname'];

$Fname=$row['studentFname'];
$Mname=$row['studentMname'];
$Lname=$row['studentLname'];
$CCourse=$row['programCode'];

if(!isset($_SESSION['login_user'])){
    header("location:index.php");
    die();
}
?>