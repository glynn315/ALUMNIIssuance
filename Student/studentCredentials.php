<?php
require '../Configuration/connectConfiguration.php';
include('../StudentSession.php');

function isEncoded($value) {
    $decodedValue = base64_decode($value, true);
    return base64_encode($decodedValue) === $value;
}

function encodeValue($value) {
    return base64_encode($value);
}

$date = date('Y-m-d');
//amu ni mag save sang student credentials
if(isset($_POST["SaveEmployment"])) {
    mysqli_query($conn, "INSERT INTO employmentinformation VALUES('','$_POST[Status]','$_POST[Description]','$_POST[Employment]','$_POST[Reason]','$_POST[Type]','$login_session');");
        header("location:studentCredentials.php");
}



if(isset($_POST["subReg"])) {
    mysqli_query($conn, "INSERT INTO personalinformationtable VALUES('','$_POST[text1]','$_POST[text2]','$_POST[text3]','$_POST[text4]','$_POST[text8]','$_POST[text9]','$_POST[text11]','$_POST[text12]','$_POST[text13]','$_POST[text14]','$_POST[text16]','ACTIVE','$date');");
        header("location:studentCredentials.php");
} else if (isset($_POST["subAddCon"])) {
  $loginSession = $login_session;
    if (!isEncoded($loginSession)) {
        $loginSession = encodeValue($loginSession);
    }

    $checkQuery = "SELECT COUNT(*) AS count FROM addresscontacttable WHERE studentCount = '$loginSession' AND name = '$_POST[name]'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult) {
        $checkRow = mysqli_fetch_assoc($checkResult);
        $count = $checkRow['count'];

        if ($count == 0) {
            // Value is unique, proceed with the insert operation
            $insertQuery = "INSERT INTO addresscontacttable VALUES ('', '$loginSession', '$_POST[permanetAddress]', '$_POST[currentAddress]', '$_POST[homeContactNo]', '$_POST[personalContactNo]', '$_POST[emailAddress]', '$_POST[name]', '$_POST[contactNo]', '$_POST[address]', '$_POST[relationships]')";
            mysqli_query($conn, $insertQuery);
            header("location: studentCredentials.php");
        } else {
            echo "Error: Name already exists for the logged-in session.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else if (isset($_POST["subFamilyBackground"])) {
    mysqli_query($conn, "INSERT INTO familybackgroundtable VALUES('','$login_session','$_POST[fFirstName]','$_POST[fMiddleName]','$_POST[fLastName]','$_POST[fAge]','$_POST[fDOB]','$_POST[fCONTACT]','$_POST[fOccupation]','$_POST[fHighestEducation]','$_POST[fReligion]','$_POST[mFirstName]','$_POST[mMiddleName]','$_POST[mLastName]','$_POST[mAge]','$_POST[mDOB]','$_POST[mContactNo]','$_POST[mOccupation]','$_POST[mHighestEduc]','$_POST[mReligion]','$_POST[parentsRelationshipStatus]');");
        header("location:studentCredentials.php");
} else if (isset($_POST["subEducBackground"])) {
    mysqli_query($conn, "INSERT INTO educationalbackgroundtable VALUES('','$login_session','$_POST[preNameOfSchool]','$_POST[preAddress]','$_POST[preYearGrad]','$_POST[preAwardsRecieved]','$_POST[elemNameOfSchool]','$_POST[elemAddress]','$_POST[elemYearGrad]','$_POST[elemAwardsRecieved]','$_POST[highNameOfSchool]','$_POST[highAddress]','$_POST[highYearGrad]','$_POST[highAwardsRecieved]','$_POST[senHighNameOfSchool]','$_POST[senHighAddress]','$_POST[senHighYearGrad]','$_POST[senHighAwardsRecieved]','$_POST[prevCollegeNameOfSchool]','$_POST[prevCollegeAddress]','$_POST[prevCollegeYearGrad]','$_POST[prevCollegeAwardsRecieved]');");
        header("location:studentCredentials.php");
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
                            <td><?php echo $login_Name ?><br>HCCCI Alumni</td>
                        </tr>
                    </table>
                </ul>
                <ul class="list-unstyled components">
                    <li>
                        <a href="studentDashboard.php">DASHBOARD</a>
                    </li>
                    <li>
                        <a href="studentCredentials.php">STUDENT CREDENTIALS</a>
                    </li>
                    <li>
                        <a href="studentExit.php">EXIT INTERVIEW</a>
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
                <div class="container-fluid">
                    <div class="tab">
                        <button class="tablinks" onclick="studentPIP(event, 'personal')" id="defaultOpen">Perosnal Information</button>
                        <button class="tablinks" onclick="studentPIP(event, 'address')">Address and Contact Information</button>
                        
                        <button class="tablinks" onclick="studentPIP(event, 'family')">Family Background</button>
                        <button class="tablinks" onclick="studentPIP(event, 'education')">Educational Background</button>
                        <button class="tablinks" onclick="studentPIP(event, 'status')">Employment Status</button>
                    </div>
                    <div id="personal" class="tabcontent">
                        <h3>Personal Information</h3>
                        <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">StudentID</label>
                    <input type="text" class="form-control" placeholder="Enter Student ID" class="formText" name="text1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" value="<?php echo $Fname ?>" class="formText" name="text2">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" class="form-control" value="<?php echo $Mname ?>" class="formText" name="text3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" value="<?php echo $Lname ?>" class="formText" name="text4">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Age</label>
                    <input type="text" class="form-control" placeholder="Enter Age" class="formText" name="text8">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sex</label>
                    <select class="form-control" name="text9">
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Others">Others</option>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date of Birth</label>
                    <input type="date" class="form-control" class="formText" name="text11">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Place of Birth</label>
                    <input type="text" class="form-control" placeholder="Enter Place of Birth" class="formText" name="text12">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Citizenship</label>
                    <input type="text" class="form-control" placeholder="Enter Citizenship" class="formText" name="text13">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Religion</label>
                    <input type="text" class="form-control" placeholder="Enter Religion" class="formText" name="text14">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Civil Status</label>
                    <input type="text" class="form-control" placeholder="Enter Civil Status" class="formText" name="text16">
                </div>
                <div class="modal-footer mt-2">
                    <button type="submit" class="btn btn-primary" name="subReg">Save Changes</button>
                </div>
            </form>
                    </div>
                    <div id="address" class="tabcontent">






                        <!-- contact -->
                        <h3>Address an Contact Information</h3>
                        <form method="POST">
                        <div class="form-group mt-4">
                </i> Permanent Address
                <input type="text" class="form-control"  name="permanetAddress">
            </div>
            <div class="form-group mt-4">
                </i> Current Address
                <input type="text" class="form-control"  name="currentAddress">
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Home Contact Number
                                <input type="text" class="form-control"  name="homeContactNo">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Personal Contact Number
                                <input type="text" class="form-control"  name="personalContactNo">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Email Address
                                <input type="text" class="form-control"  name="emailAddress">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="text-center mt-4">
                <b>IN CASE OF EMERGENCY, CONTACT:</b>
            </div>
            
            <div class="form-group">
                </i> Name
                <input type="text" class="form-control"  name="name">
            </div>
            <div class="form-group mt-4">
                </i> Contact Number
                <input type="text" class="form-control"  name="contactNo">
            </div>
            <div class="form-group mt-4">
                </i> Address
                <input type="text" class="form-control"  name="address">
            </div>
            <div class="form-group mt-4">
                </i> Relationship
                <input type="text" class="form-control"  name="relationships">
            </div>
            <button type="submit" class="btn btn-primary" name="subAddCon">SUBMIT CHANGES</button>
                        
                    </div>
            </form>
                    

                    <!-- family -->
                    <div id="family" class="tabcontent">
                        <h3>Family Background</h3>
                        <form method="POST">
                        <div class="form-group mt-4">
                <b></i> Fathers Information</b>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> First Name
                                <input type="text" class="form-control"  name="fFirstName">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Middle Name
                                <input type="text" class="form-control"  name="fMiddleName">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Last Name
                                <input type="text" class="form-control"  name="fLastName">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Age
                                <input type="text" class="form-control"  name="fAge">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Date of Birth
                                <input type="date" class="form-control"  name="fDOB">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Contact Number
                                <input type="text" class="form-control"  name="fCONTACT">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Occupation
                                <input type="text" class="form-control"  name="fOccupation">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Highest Educational Attainment
                                <input type="text" class="form-control"  name="fHighestEducation">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Religion
                                <input type="text" class="form-control"  name="fReligion">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group mt-4">
                <b></i> Mothers Information</b>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> First Name
                                <input type="text" class="form-control"  name="mFirstName">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Middle Name
                                <input type="text" class="form-control"  name="mMiddleName">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Last Name
                                <input type="text" class="form-control"  name="mLastName">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Age
                                <input type="text" class="form-control"  name="mAge">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Date of Birth
                                <input type="date" class="form-control"  name="mDOB">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Contact Number
                                <input type="text" class="form-control"  name="mContactNo">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Occupation
                                <input type="text" class="form-control"  name="mOccupation">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Highest Educational Attainment
                                <input type="text" class="form-control"  name="mHighestEduc">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Religion
                                <input type="text" class="form-control"  name="mReligion">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group mt-4">
                </i> Parents Relationship Status
                <select name="parentsRelationshipStatus" class="form-control">
                    <option value="Legally Married">Legally Married</option>
                    <option value="Not Married But Staying Together">Not Married But Staying Together</option>
                    <option value="Not Married and bot staying together">Not Married and bot staying together</option>
                    <option value="Seperated">Seperated</option>
                    <option value="Annulled">Annulled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name = "subFamilyBackground">SUBMIT CHANGES</button>
                        
                    </div>
                    </form>






                    <!-- EDUCATION -->
                    <div id="education" class="tabcontent">
                        <h3>Educational Background</h3>
                        <form method="POST">
                        <div class="form-group mt-4">
                <b></i> PRE-School</b>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Name of School
                                <input type="text" class="form-control"  name="preNameOfSchool">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Address
                                <input type="text" class="form-control"  name="preAddress">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Year Graduated
                                <input type="text" class="form-control"  name="preYearGrad">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Awards Received
                                <input type="text" class="form-control"  name="preAwardsRecieved">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group mt-4">
                <b></i> Elementary</b>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Name of School
                                <input type="text" class="form-control"  name="elemNameOfSchool">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Address
                                <input type="text" class="form-control"  name="elemAddress">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Year Graduated
                                <input type="text" class="form-control"  name="elemYearGrad">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Awards Received
                                <input type="text" class="form-control"  name="elemAwardsRecieved">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="form-group mt-4">
                <b></i> High School</b>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Name of School
                                <input type="text" class="form-control"  name="highNameOfSchool">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Address
                                <input type="text" class="form-control"  name="highAddress">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Year Graduated
                                <input type="text" class="form-control"  name="highYearGrad">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Awards Received
                                <input type="text" class="form-control"  name="highAwardsRecieved">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="form-group mt-4">
                <b></i> Senior High School</b>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Name of School
                                <input type="text" class="form-control"  name="senHighNameOfSchool">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Address
                                <input type="text" class="form-control"  name="senHighAddress">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Year Graduated
                                <input type="text" class="form-control"  name="senHighYearGrad">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Awards Received
                                <input type="text" class="form-control"  name="senHighAwardsRecieved">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="form-group mt-4">
                <b></i> Previous College</b>
            </div>
            <div class="form-group">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="form-group mt-4">
                                </i> Name of School
                                <input type="text" class="form-control"  name="prevCollegeNameOfSchool">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Address
                                <input type="text" class="form-control"  name="prevCollegeAddress">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Year Graduated
                                <input type="text" class="form-control"  name="prevCollegeYearGrad">
                            </div>
                        </td>
                        <td>
                            <div class="form-group mt-4">
                                </i> Awards Received
                                <input type="text" class="form-control"  name="prevCollegeAwardsRecieved">
                            </div>
                        </td>
                    </tr>
                </table>
                 <button type="submit" class="btn btn-primary" name = "subEducBackground">SUBMIT CHANGES</button>

            </div>
            
        </div>
        <div id="status" class="tabcontent">
            <h3>Employment Status</h3>
            <form method="POST">
                <div class="form-group mt-4">
                    </i> Employment Status
                    <select class="form-control" name="Status">
                        <option value="Employed">Employed</option>
                        <option value="Unemployed">Unemployed</option>
                    </select>
                </div>
                <div class="form-group mt-4">
                    </i> Job Description
                    <input type="text" class="form-control"  name="Description">
                </div>
                <div class="form-group mt-4">
                    </i> Date Employment
                    <input type="date" class="form-control"  name="Employment">
                </div>
                <div class="form-group mt-4">
                    </i> Reason - <i>For Those Who Are Unemployed</i>
                    <input type="text" class="form-control"  name="Reason">
                </div>
                <div class="form-group mt-4">
                    </i> Job Type
                    <select class="form-control" name="Type">
                        <option value="Private">Private</option>
                        <option value="Government">Government</option>
                        <option value="Self-Employed">Self-Employed</option>
                        <option value="Business">Business</option>
                    </select>
                </div>
                <div class="modal-footer mt-4">
                    <button class="btn btn-primary" name="SaveEmployment">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>  
    $(document).ready(function(){  
    $('#employee_data').DataTable();  
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

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
</body>
</html>