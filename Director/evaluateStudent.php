<?php
require '../configuration/connectConfiguration.php';
include('../session.php');
if(isset($_REQUEST["studentNumber"]))
{
    $studentNumber=$_REQUEST["studentNumber"];
    $conn2=mysqli_query($conn ,"SELECT * FROM personalinformationtable WHERE studentNumber = '$studentNumber';");
    $row=mysqli_fetch_array($conn2);
}

//amu ni code mag evaluate student
if (isset($_POST["updateEvaluation"])) {
    mysqli_query($conn, "UPDATE personalinformationtable SET year = '$_POST[studentYear]',studentStatus='$_POST[studentStatus]' WHERE studentNumber = '$studentNumber';");
    echo
    "
    <script>
    alert('ACCOUNT UPDATED');
    document.location.href = 'studentCredential.php';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guidance Director</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="css/navigator.css">
</head>
<body>
<div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <table width="100%">
                        <tr>
                            <td width="20%"><img src="../images/logo.png" style="width:100%"></td>
                            <td width="60%">HCCCI Alumni ID Issuance</td>
                        </tr>
                    </table>
                </div>
                <ul class="list-unstyled components">
                    <table style="margin-top: -10px;">
                        <tr>
                            <td width="20%" class="p-3"><img src="../images/sample.png" style="width:100%;"></td>
                            <td><?php echo $login_Name  ?><br>ADMIN</td>
                        </tr>
                    </table>
                </ul>
                <ul class="list-unstyled components">
                    <li>
                        <a href="dashboard.php">DASHBOARD</a>
                    </li>
                    <li>
                        <a href="accountManagement.php">ACCOUNT MANAGEMENT</a>
                    </li>
                    <li>
                        <a href="studentRequest.php">STUDENT REQUEST</a>
                    </li>
                    <li>
                        <a href="studentList.php">STUDENT LIST</a>
                    </li>
                    <li>
                        <a href="releasingId.php">ALUMNI ID</a>
                    </li>
                    <li>
                        <a href="alumniRequest.php">ALUMNI REQUEST</a>
                    </li>
                    <li>
                        <a href="jobHiring.php">JOB HIRING FORM</a>
                    </li>
                    <li>
                        <a href="announceForm.php">ANNOUNCEMENT</a>
                    </li>
                    <li>
                        <a href="reports.php">REPORTS</a>
                    </li>
                </ul>
                <ul class="list-unstyled components">
                    <li style="margin-top:-35px;margin-bottom: -20px;">
                        <a href="../index.php">SIGN OUT</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="width:100%;">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header d-inline-flex">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                                <i class="bi bi-arrow-bar-left"></i>
                            </button>
                            <ul class="nav d-inline-flex p-2">
                                <li class="ml-4"><a href="dashboard.php">Holy Child Central Colleges Inc.</a></li>
                            </ul>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
                        </div>
                    </div>
                </nav>

                <div class="container-fluid d-inline-flex">
                    <div class="container p-4 border mt-5 rounded">
                        <h3>Student Evaluation Form</h3>

                        <form method="POST">
                            <table width="100%" class="mt-3">
                                <tr>
                                    <td class="text-right" width="30%">
                                        <h4>Name :</h4>
                                    </td>
                                    <td class="pl-4"><h4><?php echo $row["Fname"] . ' ' .$row["Mname"]. ' ' .$row["Lname"] ?></h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right" width="30%">
                                        <h4>Year :</h4>
                                    </td>
                                    <td class="pl-4">
                                        <select class="form-control" name="studentYear">
                                            <option><?php echo $row["year"] ?></option>
                                            <option value="1st Year">1st Year</option>
                                            <option value="2nd Year">2nd Year</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                        </select>
                                </tr>
                                <tr>
                                    <td class="text-right" width="30%">
                                        <h4>Course :</h4>
                                    </td>
                                    <td class="pl-4"><h4><?php echo $row["courseCode"] ?></h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right" width="30%">
                                        <h4>Student Status :</h4>
                                    </td>
                                    <td class="pl-4">
                                        <select class="form-control" name="studentStatus">
                                            <option><?php echo $row["studentStatus"] ?></option>
                                            <option value="ACTIVE">ACTIVE</option>
                                            <option value="DROP OUT">DROP OUT</option>
                                            <option value="GRADUATING">GRADUATING</option>
                                            <option value="IRREGULAR">IRREGULAR</option>
                                            <option value="GRADUATE">GRADUATE</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <div class="modal-footer mt-4">
                                <button type="submit" class="btn btn-primary" name="updateEvaluation">SUBMIT REPORT</button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
</body>
</html>