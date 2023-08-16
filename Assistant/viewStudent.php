<?php

require '../configuration/connectConfiguration.php';
include('../session.php');
$query ="SELECT * FROM personalinformationtable WHERE studentStatus = 'ACTIVE' OR studentStatus = 'IRREGULAR'";  
$result = mysqli_query($conn, $query); 

if(isset($_REQUEST["studentNumber"]))
{
    $studentNumber=$_REQUEST["studentNumber"];
    $query ="SELECT studentuseraccount.studentYear,studentuseraccount.programCode,personalinformationtable.studentID,personalinformationtable.Fname,personalinformationtable.Mname,personalinformationtable.Lname FROM studentuseraccount INNER JOIN personalinformationtable ON personalinformationtable.studentNumber = studentuseraccount.studentCount WHERE personalinformationtable.studentStatus = 'ACTIVE' AND personalinformationtable.studentNumber = '$studentNumber';";  
    $result = mysqli_query($conn, $query); 
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $Name = $row['Fname'] . ' ' .$row['Mname'] . ' ' .$row['Lname'];
    $Mvalidity = date('M');
    $ID = $row['studentID'];
    $Course = $row['programCode'];
    $Year = $row['studentYear'];
    $Yvalidity = date('Y');

    $query1 ="SELECT * FROM employmentinformation WHERE studentCount = '$studentNumber';";  
    $result1 = mysqli_query($conn, $query1); 
    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

    $Status = $row1['jobStatus'];
    $Desc = $row1['jobDesc'];
    $Employment = $row1['dateEmployment'];
    $Reason = $row1['reason'];
    $Information = $row1['jobInformation'];
}

if(isset($_POST["subReg"])) {
    $date = date('Y-m-d');
    mysqli_query($conn, "INSERT INTO personalinformationtable VALUES('$_POST[text1]','$_POST[text2]','$_POST[text3]','$_POST[text4]','$_POST[text6]','$_POST[text7]','$_POST[text8]','$_POST[text9]','$_POST[text10]','$_POST[text11]','$_POST[text12]','$_POST[text13]','$_POST[text14]','$_POST[text15]','$_POST[text16]','$_POST[text17]','$_POST[text18]','ACTIVE','$date');");
        header("location:studentCredential.php");
}
if(isset($_POST["filterTable"])) {
    $query ="SELECT * FROM personalinformationtable WHERE studentStatus = 'ACTIVE' AND year = '$_POST[selectOption]'";  
    $result = mysqli_query($conn, $query); 
}

if(isset($_POST["displayAll"])) {
    header("location:studentList.php");
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <style type="text/css">
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s;
        }

        /* Fade in tabs */
        @-webkit-keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

    </style>
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
                            <td><?php echo $login_Name ?><br>Guidance Assistant</td>
                        </tr>
                    </table>
                </ul>
                <ul class="list-unstyled components">
                    <li>
                        <a href="dashboard.php">DASHBOARD</a>
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
                        <a href="notify.php">NOTIFY</a>
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
        
                <div class="container-fluid border p-4">
                    <h2>Student Profiling</h2>
                    <hr style="border:1px solid black;">
                    <table width="70%">
                        <tr>
                            <td>Student ID :</td>
                            <td><input type="text" class="form-control" value="<?php echo $ID ?>"></td>
                        </tr>
                        <tr>
                            <td>Name :</td>
                            <td><input type="text" class="form-control" value="<?php echo $Name ?>"></td>
                        </tr>
                        <tr>
                            <td>Course :</td>
                            <td><input type="text" class="form-control" value="<?php echo $Course ?>"></td>
                        </tr>
                        <tr>
                            <td>Year Graduated :</td>
                            <td><input type="text" class="form-control" value="<?php echo $Year ?>"></td>
                        </tr>
                    </table>
                    <hr style="border:1px solid black;">
                    <div class="tab">
                        <button class="tablinks" onclick="studentPIP(event, 'personal')" id="defaultOpen">Perosnal Information</button>
                        <button class="tablinks" onclick="studentPIP(event, 'address')">Address and Contact Information</button>
                        
                        <button class="tablinks" onclick="studentPIP(event, 'family')">Family Background</button>
                        <button class="tablinks" onclick="studentPIP(event, 'education')">Educational Background</button>
                        <button class="tablinks" onclick="studentPIP(event, 'status')">Employment Status</button>
                    </div>

                    <div id="personal" class="tabcontent">
                        <h3>Personal Information</h3>
                    </div>

                    <div id="address" class="tabcontent">
                        <h3>Address an Contact Information</h3>
                    </div>

                    <div id="family" class="tabcontent">
                        <h3>Family Background</h3>
                    </div>

                    <div id="education" class="tabcontent">
                        <h3>Educational Background</h3>
                    </div>

                    <div id="status" class="tabcontent">
                        <h3>Employment Status</h3>
                        <table width="70%">
                            <tr>
                                <td>Employment Status :</td>
                                <td><input type="text" class="form-control" value="<?php echo $Status ?>"></td>
                            </tr>
                            <tr>
                                <td>Job Description :</td>
                                <td><input type="text" class="form-control" value="<?php echo $Desc ?>"></td>
                            </tr>
                            <tr>
                                <td>Date Employment:</td>
                                <td><input type="text" class="form-control" value="<?php echo $Employment ?>"></td>
                            </tr>
                            <tr>
                                <td>Reason :</td>
                                <td><input type="text" class="form-control" value="<?php echo $Reason  ?>"></td>
                            </tr>
                            <tr>
                                <td>Job Information :</td>
                                <td><input type="text" class="form-control" value="<?php echo $Information ?>"></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>  
    $(document).ready(function(){  
    $('#employee_data').DataTable();  
    });  
</script> 


         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>

<script>
    function studentPIP(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
</script>
</body>
</html>