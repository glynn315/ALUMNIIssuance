<?php
require 'configuration/connectConfiguration.php';
session_start();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn,"SELECT * from useraccounttable where userName = '$user_check'");
   
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['userAccountID'];
$login_Name = $row['firstName'] . ' ' .$row['lastName'];

if(!isset($_SESSION['login_user'])){
    header("location:index.php");
    die();
}
?>