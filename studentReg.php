<?php

require 'configuration/connectConfiguration.php';

//amu ni mag save data ni student
if(isset($_POST["subReg"])) {
    $date = date('Y-m-d');
    $dateYear = date('Y');
    mysqli_query($conn, "INSERT INTO studentuseraccount VALUES('$_POST[text0]','$_POST[text1]','$_POST[text2]','$_POST[text3]','$dateYear','$_POST[text5]','$_POST[text6]','$_POST[text7]','$date','PENDING');");
    mysqli_query($conn, "INSERT INTO addressinformation(studentID) VALUES('$_POST[text0]');");
    mysqli_query($conn, "INSERT INTO educationinformation(studentID) VALUES('$_POST[text0]');");
    mysqli_query($conn, "INSERT INTO employmentinformation(studentCount) VALUES('$_POST[text0]');");
    mysqli_query($conn, "INSERT INTO familyinformation(studentID) VALUES('$_POST[text0]');");
    mysqli_query($conn, "INSERT INTO personalinformationtable(studentID) VALUES('$_POST[text0]');");
    mysqli_query($conn, "INSERT INTO exitinterviewinformation(studentNumber) VALUES('$_POST[text0]');");
        header("location:index.php");
}

?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STUDENT INFORMATION</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style type="text/css">
        body
        {
            background-color: #c6ae96;
        }
        .modal-content
        {
            padding: 30px;
            border-radius: 10px;
            border:none;
        }
    </style>
</head>
<body>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h2>Alumni Registration Form</h2>
            <hr>
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Student ID</label>
                    <input type="text" class="form-control" placeholder="Enter Student ID" class="formText" name="text0">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" placeholder="Enter First Name" class="formText" name="text1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" class="form-control" placeholder="Enter Middle Name" class="formText" name="text2">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter Last Name" class="formText" name="text3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Code/Program Taken</label>
                    <select class="form-control" name="text5">
                        <option value="BSIT">BSIT</option>
                        <option value="BSA">BSA</option>
                        <option value="BECED">BECED</option>
                        <option value="BSBA">BSBA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" placeholder="Username" class="formText" name="text6">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" placeholder="Password" class="formText" name="text7">
                </div>
                <div class="modal-footer mt-2">
                    <button type="submit" class="btn btn-primary" name="subReg">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>