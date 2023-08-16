<?php
require 'configuration/connectConfiguration.php';
session_start();

//amu ni ang condition sa login
if(isset($_POST["subLog"])) {
	$myusername = mysqli_real_escape_string($conn,$_POST['txtuser']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['txtpass']);


    //amu ni mag check if ga exist si student
    $sql1 = "SELECT * FROM studentuseraccount WHERE studentUsername = '$myusername' AND studentPassword = '$mypassword'";
    $result1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $count1 = mysqli_num_rows($result1);
    $confirmation = $row1["studentStatus"];

    //same driri
	$sql = "SELECT * FROM useraccounttable WHERE userName = '$myusername' AND passWord = '$mypassword'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
    $acc = $row["position"];
    $accStatus = $row["activeStatus"];

	if($count == 1) 
	{
		if($acc == "Head Guidance")
        {
            $_SESSION['login_user'] = $myusername;
            header("location:Director/dashboard.php");
        }
        if($acc == "Assistant Guidance")
        {
            if ($accStatus == 'USER-ACTIVE') {
                 $_SESSION['login_user'] = $myusername;
                header("location:Assistant/dashboard.php");
            }
            else if ($accStatus == 'ARCHIVE') {
                 echo
                "
                <script>
                alert('ACCOUNT ARCHIVE');
                document.location.href = '';
                </script>
                ";
            }
        }
    }
    else if($count1 == 1) 
    {
        if($confirmation == "GRADUATING")
        {
            $_SESSION['login_user'] = $myusername;
            header("location:Graduating/gradDashboard.php");
        }
        if($confirmation == "ALUMNI")
        {
            $_SESSION['login_user'] = $myusername;
            header("location:Student/studentDashboard.php");
        }
        else{
            echo
            "
            <script>
            alert('WAITING FOR CONFIRMATION');
            document.location.href = '';
            </script>
            ";
        }
        
    }
    else
    {
    	echo
        "
        <script>
        alert('Account Not Found');
        document.location.href = '';
        </script>
        ";
    }
}
if(isset($_POST["subReg"])) {
    header("location:studentReg.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN FORM</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>   

    <link rel="stylesheet" type="text/css" href="log.css">
    <style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
	</style>
 
</head>
<body>
<div class="conLog">
	<h3 style="color:#FFF;text-align: center; margin-top:30px;">LOGIN FORM</h3>
	<hr style="border:1px solid #FFF;width:95%;">
	<form method="POST">
		<div class="form-group">
            <label for="exampleInputEmail1" style="color:#FFF;margin-left: 35px;">Username</label>
            <input type="text" class="form-control" placeholder="Enter Username" name="txtuser" style="width:90%;display: block;margin: auto;">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:#FFF;margin-left: 35px;">Password</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="txtpass" style="width:90%;display: block;margin: auto;">
        </div>
        <hr style="border:1px solid #FFF;width:95%;margin-top:30px;">
        <button type="submit" class="btn btn-primary float-right mr-3 pl-5 pr-5" name="subLog">LOGIN</button><br><br>
        <a href="studentReg.php" name="" class="float-right mr-3">CREATE STUDENT ACCOUNT</a>
        

	</form>
</div>
</body>
</html>