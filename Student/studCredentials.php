<?php
require '../Configuration/connectConfiguration.php';
include('../StudentSession.php');

$query = "SELECT * FROM jobhiringdb";
$result = mysqli_query($conn, $query);
$query1 = "SELECT * FROM announcementinformation";
$result1 = mysqli_query($conn, $query1);





$query6 = "SELECT * FROM personalinformationtable WHERE studentID = '$login_session'";
$result6 = mysqli_query($conn, $query6);
$row6 = mysqli_fetch_array($result6, MYSQLI_ASSOC);

$query7 = "SELECT * FROM addressinformation WHERE studentID = '$login_session'";
$result7 = mysqli_query($conn, $query7);
$row7 = mysqli_fetch_array($result7, MYSQLI_ASSOC);

$query8 = "SELECT * FROM familyinformation WHERE studentID = '$login_session'";
$result8 = mysqli_query($conn, $query8);
$row8 = mysqli_fetch_array($result8, MYSQLI_ASSOC);

$query9 = "SELECT * FROM educationinformation WHERE studentID = '$login_session'";
$result9 = mysqli_query($conn, $query9);
$row9 = mysqli_fetch_array($result9, MYSQLI_ASSOC);

$query10 = "SELECT * FROM employmentinformation WHERE studentCount = '$login_session'";
$result10 = mysqli_query($conn, $query10);
$row10 = mysqli_fetch_array($result10, MYSQLI_ASSOC);


if (isset($_POST["subReg"])) {
    $date = date('Y-m-d');
    $dateYear = date('Y');
    $studentID = $login_session; // Assuming this is the student's ID

// Handle file upload


// Check if data exists
$sql_check = "SELECT * FROM personalinformationtable WHERE studentID = '$studentID'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Data exists, perform an update
    $image = addslashes(file_get_contents($_FILES['text17']['tmp_name']));
    $sql_update = "UPDATE personalinformationtable SET 
                    age = '$_POST[text8]',
                    sex = '$_POST[text9]',
                    dob = '$_POST[text11]',
                    pob = '$_POST[text12]',
                    citizenship = '$_POST[text13]',
                    religion = '$_POST[text14]',
                    civStatus = '$_POST[text16]',
                    studentImage = '$image'
                  WHERE studentID = '$studentID'";
    
    if ($conn->query($sql_update) === TRUE) {
    }
} else {
    // Data doesn't exist, perform an insert
    $sql_insert = "INSERT INTO personalinformationtable (`studentID`, `age`, `sex`, `dob`, `pob`, `citizenship`, `religion`, `civStatus`, `studentStatus`, `dateAccomplish`, `studentImage`) 
                   VALUES ('$studentID','$_POST[text8]', '$_POST[text9]', '$_POST[text11]', '$_POST[text12]', '$_POST[text13]', '$_POST[text14]', '$_POST[text16]', 'ACTIVE', '$date', '$image')";
    
    if ($conn->query($sql_insert) === TRUE) {
    }
}

}

if (isset($_POST["subAddCon"])) {
    $studentID = mysqli_real_escape_string($conn, $login_session);

    // Check if the record with the given studentID exists
    $existingRecordQuery = "SELECT * FROM addressinformation WHERE studentID = '$studentID'";
    $existingRecordResult = mysqli_query($conn, $existingRecordQuery);

    if (mysqli_num_rows($existingRecordResult) > 0) {
        // Record already exists, perform an update
        $updateQuery = "UPDATE addressinformation SET
                        permAdd = '$_POST[permanetAddress]',
                        currAdd = '$_POST[currentAddress]',
                        homeContact = '$_POST[homeContactNo]',
                        perContact = '$_POST[personalContactNo]',
                        emAdd = '$_POST[emailAddress]',
                        emerName = '$_POST[emName]',
                        emerCon = '$_POST[contactNo]',
                        emerAdd = '$_POST[emAddress]',
                        emerRelation = '$_POST[relationships]'
                        WHERE studentID = '$studentID'";

        mysqli_query($conn, $updateQuery);
    } else {
        // Record does not exist, perform an insertion
        mysqli_query($conn, "INSERT INTO addressinformation (studentID, permAdd, currAdd, homeContact, perContact, emAdd, emerName, emerCon, emerAdd, emerRelation) VALUES ('$studentID','$_POST[permanetAddress]','$_POST[currentAddress]','$_POST[homeContactNo]','$_POST[personalContactNo]','$_POST[emailAddress]','$_POST[emName]','$_POST[contactNo]','$_POST[emAddress]','$_POST[relationships]');");
    }

    header("location:studCredentials.php");
}
if (isset($_POST["subFamilyBackground"])) {
    $studentID = $login_session; // Assuming this is the student's ID

// Step 2: Check if data exists
$sql_check = "SELECT * FROM familyinformation WHERE studentID = '$studentID'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Data exists, perform an update
    $sql_update = "UPDATE familyinformation SET 
                    fatherFname = '$_POST[fFirstName]',
                    fatherMname = '$_POST[fMiddleName]',
                    fatherLname = '$_POST[fLastName]',
                    fatherAge = '$_POST[fAge]',
                    fatherDOB = '$_POST[fDOB]',
                    fatherContact = '$_POST[fCONTACT]',
                    fatherOccupation = '$_POST[fOccupation]',
                    fatherEducation = '$_POST[fHighestEducation]',
                    fatherReligion = '$_POST[fReligion]',
                    motherFname = '$_POST[mFirstName]',
                    motherMname = '$_POST[mMiddleName]',
                    motherLname = '$_POST[mLastName]',
                    motherAge = '$_POST[mAge]',
                    motherDOB = '$_POST[mDOB]',
                    motherContact = '$_POST[mContactNo]',
                    motherOccupation = '$_POST[mOccupation]',
                    motherEducation = '$_POST[mHighestEduc]',
                    motherReligion = '$_POST[mReligion]',
                    parentRelationship = '$_POST[parentsRelationshipStatus]'
                  WHERE studentID = '$studentID'";
    
    if ($conn->query($sql_update) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Data doesn't exist, perform an insert
    $sql_insert = "INSERT INTO familyinformation (`studentID`, `fatherFname`, `fatherMname`, `fatherLname`, `fatherAge`, `fatherDOB`, `fatherContact`, `fatherOccupation`, `fatherEducation`, `fatherReligion`, `motherFname`, `motherMname`, `motherLname`, `motherAge`, `motherDOB`, `motherContact`, `motherOccupation`, `motherEducation`, `motherReligion`, `parentRelationship`) 
                   VALUES ('$studentID', '$_POST[fFirstName]', '$_POST[fMiddleName]', '$_POST[fLastName]', '$_POST[fAge]', '$_POST[fDOB]', '$_POST[fCONTACT]', '$_POST[fOccupation]', '$_POST[fHighestEducation]', '$_POST[fReligion]', '$_POST[mFirstName]', '$_POST[mMiddleName]', '$_POST[mLastName]', '$_POST[mAge]', '$_POST[mDOB]', '$_POST[mContactNo]', '$_POST[mOccupation]', '$_POST[mHighestEduc]', '$_POST[mReligion]', '$_POST[parentsRelationshipStatus]')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}
    header("location:studCredentials.php");
}
if (isset($_POST["subEducBackground"])) {
    $studentID = $login_session; // Assuming this is the student's ID

// Step 2: Check if data exists
$sql_check = "SELECT * FROM educationinformation WHERE studentID = '$studentID'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Data exists, perform an update
    $sql_update = "UPDATE educationinformation SET 
                    preSchool = '$_POST[preNameOfSchool]',
                    preAddress = '$_POST[preAddress]',
                    preYear = '$_POST[preYearGrad]',
                    preAward = '$_POST[preAwardsRecieved]',
                    elemSchool = '$_POST[elemNameOfSchool]',
                    elemAddress = '$_POST[elemAddress]',
                    elemYear = '$_POST[elemYearGrad]',
                    elemAward = '$_POST[elemAwardsRecieved]',
                    highSchool = '$_POST[highNameOfSchool]',
                    highAddress = '$_POST[highAddress]',
                    highYear = '$_POST[highYearGrad]',
                    highAward = '$_POST[highAwardsRecieved]',
                    seniorSchool = '$_POST[senHighNameOfSchool]',
                    seniorAddress = '$_POST[senHighAddress]',
                    seniorYear = '$_POST[senHighYearGrad]',
                    seniorAward = '$_POST[senHighAwardsRecieved]',
                    previousSchool = '$_POST[prevCollegeNameOfSchool]',
                    previousAddress = '$_POST[prevCollegeAddress]',
                    previousYear = '$_POST[prevCollegeYearGrad]',
                    previousAward = '$_POST[prevCollegeAwardsRecieved]'
                  WHERE studentID = '$studentID'";
    
    if ($conn->query($sql_update) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Data doesn't exist, perform an insert
    $sql_insert = "INSERT INTO educationinformation (`studentID`, `preSchool`, `preAddress`, `preYear`, `preAward`, `elemSchool`, `elemAddress`, `elemYear`, `elemAward`, `highSchool`, `highAddress`, `highYear`, `highAward`, `seniorSchool`, `seniorAddress`, `seniorYear`, `seniorAward`, `previousSchool`, `previousAddress`, `previousYear`, `previousAward`) 
                   VALUES ('$studentID', '$_POST[preNameOfSchool]', '$_POST[preAddress]', '$_POST[preYearGrad]', '$_POST[preAwardsRecieved]', '$_POST[elemNameOfSchool]', '$_POST[elemAddress]', '$_POST[elemYearGrad]', '$_POST[elemAwardsRecieved]', '$_POST[highNameOfSchool]', '$_POST[highAddress]', '$_POST[highYearGrad]', '$_POST[highAwardsRecieved]', '$_POST[senHighNameOfSchool]', '$_POST[senHighAddress]', '$_POST[senHighYearGrad]', '$_POST[senHighAwardsRecieved]', '$_POST[prevCollegeNameOfSchool]', '$_POST[prevCollegeAddress]', '$_POST[prevCollegeYearGrad]', '$_POST[prevCollegeAwardsRecieved]')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}
}
if(isset($_POST["SaveEmployment"])) {
    $studentID = $login_session; // Assuming this is the student's ID

// Step 2: Check if data exists
$sql_check = "SELECT * FROM employmentinformation WHERE studentCount = '$studentID'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Data exists, perform an update
    $sql_update = "UPDATE employmentinformation SET 
                    jobStatus = '$_POST[Status]',
                    jobDesc = '$_POST[Description]',
                    dateEmployment = '$_POST[Employment]',
                    reason = '$_POST[Reason]',
                    jobInformation = '$_POST[Type]'
                  WHERE studentCount = '$studentID'";
    
    if ($conn->query($sql_update) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Data doesn't exist, perform an insert
    $sql_insert = "INSERT INTO employmentinformation (`jobStatus`, `jobDesc`, `dateEmployment`, `reason`, `jobInformation`, `studentCount`) 
                   VALUES ('$_POST[Status]', '$_POST[Description]', '$_POST[Employment]', '$_POST[Reason]', '$_POST[Type]', '$studentID')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}
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
    <style>
        .nav {
            background-color: #684A2D;

        }

        ::-webkit-scrollbar {
            background: blue;
            width: 0;
        }

        .nav-item {
            color: white;
            font-size: 24px;
        }

        .tab {
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeEffect {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .body {
            overflow-x: hidden;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <ul class="nav justify-content-start border p-3">
            <a href="studentDashboard.php" class="nav-link text-white"><?php echo $login_Name ?></a>
            <a href="studentDashboard.php" class="nav-link text-white">DASHBOARD</a>
            <a href="studCredentials.php" class="nav-link text-white">CREDENTIALS</a>
            <a href="studReqID.php" class="nav-link text-white">REQUEST ID</a>
            <a href="../index.php" class="nav-link text-white ml-3">SIGN OUT</a>
    </ul>
    <div class="container mt-3">
        <div class="container-fluid">
            <div class="tab">
                <button class="tablinks" onclick="studentPIP(event, 'personal')" id="defaultOpen">Perosnal
                    Information</button>
                <button class="tablinks" onclick="studentPIP(event, 'address')">Address and Contact Information</button>

                <button class="tablinks" onclick="studentPIP(event, 'family')">Family Background</button>
                <button class="tablinks" onclick="studentPIP(event, 'education')">Educational Background</button>
                <button class="tablinks" onclick="studentPIP(event, 'status')">Employment Status</button>
            </div>
            <div id="personal" class="tabcontent">
                <h3>Personal Information</h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">StudentID</label>
                        <input type="text" class="form-control" value="<?php echo $login_session ?>" class="formText"
                            name="text1" Disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $Fname ?>" class="formText"
                            name="text2" Disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Middle Name</label>
                        <input type="text" class="form-control" value="<?php echo $Mname ?>" class="formText"
                            name="text3" Disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $Lname ?>" class="formText"
                            name="text4" Disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Age</label>
                        <input type="text" class="form-control" placeholder="Enter Age" value="<?php echo $row6["age"] ?>" name="text8">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sex</label>
                        <select class="form-control" name="text9">
                            <option><?php echo $row6["sex"] ?></option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Others">Others</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date of Birth</label>
                        <input type="date" class="form-control" class="formText" name="text11" value="<?php echo $row6["dob"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Place of Birth</label>
                        <input type="text" class="form-control" placeholder="Enter Place of Birth" class="formText"
                            name="text12" value="<?php echo $row6["pob"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Citizenship</label>
                        <input type="text" class="form-control" placeholder="Enter Citizenship" class="formText"
                            name="text13" value="<?php echo $row6["citizenship"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Religion</label>
                        <input type="text" class="form-control" placeholder="Enter Religion" class="formText"
                            name="text14" value="<?php echo $row6["religion"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Civil Status</label>
                        <input type="text" class="form-control" placeholder="Enter Civil Status" class="formText"
                            name="text16" value="<?php echo $row6["civStatus"] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Image</label>
                        <input type="file" class="form-control" class="formText" name="text17">
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
                        <input type="text" class="form-control" name="permanetAddress" value="<?php echo $row7["permAdd"] ?>">
                    </div>
                    <div class="form-group mt-4">
                        </i> Current Address
                        <input type="text" class="form-control" name="currentAddress" value="<?php echo $row7["currAdd"] ?>">
                    </div>
                    <div class="form-group">
                        <table width="100%">
                            <tr>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Home Contact Number
                                        <input type="text" class="form-control" name="homeContactNo" value="<?php echo $row7["homeContact"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Personal Contact Number
                                        <input type="text" class="form-control" name="personalContactNo" value="<?php echo $row7["perContact"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Email Address
                                        <input type="text" class="form-control" name="emailAddress" value="<?php echo $row7["emAdd"] ?>">
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
                        <input type="text" class="form-control" name="emName" value="<?php echo $row7["emerName"] ?>">
                    </div>
                    <div class="form-group mt-4">
                        </i> Contact Number
                        <input type="text" class="form-control" name="contactNo" value="<?php echo $row7["emerCon"] ?>">
                    </div>
                    <div class="form-group mt-4">
                        </i> Address
                        <input type="text" class="form-control" name="emAddress" value="<?php echo $row7["emerAdd"] ?>">
                    </div>
                    <div class="form-group mt-4">
                        </i> Relationship
                        <input type="text" class="form-control" name="relationships" value="<?php echo $row7["emerRelation"] ?>">
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
                                        <input type="text" class="form-control" name="fFirstName" value="<?php echo $row8["fatherFname"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Middle Name
                                        <input type="text" class="form-control" name="fMiddleName" value="<?php echo $row8["fatherMname"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Last Name
                                        <input type="text" class="form-control" name="fLastName" value="<?php echo $row8["fatherLname"] ?>">
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
                                        <input type="text" class="form-control" name="fAge" value="<?php echo $row8["fatherAge"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Date of Birth
                                        <input type="date" class="form-control" name="fDOB" value="<?php echo $row8["fatherDOB"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Contact Number
                                        <input type="text" class="form-control" name="fCONTACT" value="<?php echo $row8["fatherContact"] ?>">
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
                                        <input type="text" class="form-control" name="fOccupation" value="<?php echo $row8["fatherOccupation"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Highest Educational Attainment
                                        <input type="text" class="form-control" name="fHighestEducation" value="<?php echo $row8["fatherEducation"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Religion
                                        <input type="text" class="form-control" name="fReligion" value="<?php echo $row8["fatherReligion"] ?>">
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
                                        <input type="text" class="form-control" name="mFirstName" value="<?php echo $row8["motherFname"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Middle Name
                                        <input type="text" class="form-control" name="mMiddleName" value="<?php echo $row8["motherMname"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Last Name
                                        <input type="text" class="form-control" name="mLastName" value="<?php echo $row8["motherLname"] ?>">
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
                                        <input type="text" class="form-control" name="mAge" value="<?php echo $row8["motherAge"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Date of Birth
                                        <input type="date" class="form-control" name="mDOB" value="<?php echo $row8["motherDOB"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Contact Number
                                        <input type="text" class="form-control" name="mContactNo" value="<?php echo $row8["motherContact"] ?>">
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
                                        <input type="text" class="form-control" name="mOccupation" value="<?php echo $row8["motherOccupation"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Highest Educational Attainment
                                        <input type="text" class="form-control" name="mHighestEduc" value="<?php echo $row8["motherEducation"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Religion
                                        <input type="text" class="form-control" name="mReligion" value="<?php echo $row8["motherReligion"] ?>">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group mt-4">
                        </i> Parents Relationship Status
                        <select name="parentsRelationshipStatus" class="form-control">
                            <option value="<?php echo $row8["parentRelationship"] ?>"><?php echo $row8["parentRelationship"] ?></option>
                            <option value="Legally Married">Legally Married</option>
                            <option value="Not Married But Staying Together">Not Married But Staying Together</option>
                            <option value="Not Married and but staying together">Not Married and but staying together
                            </option>
                            <option value="Seperated">Seperated</option>
                            <option value="Annulled">Annulled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="subFamilyBackground">SUBMIT CHANGES</button>

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
                                        <input type="text" class="form-control" name="preNameOfSchool" value="<?php echo $row9["preSchool"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Address
                                        <input type="text" class="form-control" name="preAddress" value="<?php echo $row9["preAddress"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Year Graduated
                                        <input type="text" class="form-control" name="preYearGrad" value="<?php echo $row9["preYear"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Awards Received
                                        <input type="text" class="form-control" name="preAwardsRecieved" value="<?php echo $row9["preAward"] ?>">
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
                                        <input type="text" class="form-control" name="elemNameOfSchool" value="<?php echo $row9["elemSchool"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Address
                                        <input type="text" class="form-control" name="elemAddress" value="<?php echo $row9["elemAddress"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Year Graduated
                                        <input type="text" class="form-control" name="elemYearGrad" value="<?php echo $row9["elemYear"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Awards Received
                                        <input type="text" class="form-control" name="elemAwardsRecieved" value="<?php echo $row9["elemAward"] ?>">
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
                                        <input type="text" class="form-control" name="highNameOfSchool" value="<?php echo $row9["highSchool"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Address
                                        <input type="text" class="form-control" name="highAddress" value="<?php echo $row9["highAddress"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Year Graduated
                                        <input type="text" class="form-control" name="highYearGrad" value="<?php echo $row9["highYear"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Awards Received
                                        <input type="text" class="form-control" name="highAwardsRecieved" value="<?php echo $row9["highAward"] ?>">
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
                                        <input type="text" class="form-control" name="senHighNameOfSchool" value="<?php echo $row9["seniorSchool"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Address
                                        <input type="text" class="form-control" name="senHighAddress" value="<?php echo $row9["seniorAddress"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Year Graduated
                                        <input type="text" class="form-control" name="senHighYearGrad" value="<?php echo $row9["seniorYear"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Awards Received
                                        <input type="text" class="form-control" name="senHighAwardsRecieved" value="<?php echo $row9["seniorAward"] ?>">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-group mt-4">
                        <b></i> College</b>
                    </div>
                    <div class="form-group">
                        <table width="100%">
                            <tr>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Name of School
                                        <input type="text" class="form-control" name="prevCollegeNameOfSchool" value="<?php echo $row9["previousSchool"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Address
                                        <input type="text" class="form-control" name="prevCollegeAddress" value="<?php echo $row9["previousAddress"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Year Graduated
                                        <input type="text" class="form-control" name="prevCollegeYearGrad" value="<?php echo $row9["previousYear"] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group mt-4">
                                        </i> Awards Received
                                        <input type="text" class="form-control" name="prevCollegeAwardsRecieved" value="<?php echo $row9["previousAward"] ?>">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary" name="subEducBackground">SUBMIT CHANGES</button>

                    </div>

            </div>
            <div id="status" class="tabcontent">
                <h3>Employment Status</h3>
                <form method="POST">
                    <div class="form-group mt-4">
                        </i> Employment Status
                        <select class="form-control" name="Status">
                            <option value="<?php echo $row10["jobStatus"] ?>"><?php echo $row10["jobStatus"] ?></option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        </i> Job Description
                        <input type="text" class="form-control" name="Description" value="<?php echo $row10["jobDesc"] ?>">
                    </div>
                    <div class="form-group mt-4">
                        </i> Date Employment
                        <input type="date" class="form-control" name="Employment" value="<?php echo $row10["dateEmployment"] ?>" >
                    </div>
                    <div class="form-group mt-4">
                        </i> Reason - <i>For Those Who Are Unemployed</i>
                        <input type="text" class="form-control" name="Reason" value="<?php echo $row10["reason"] ?>">
                    </div>
                    <div class="form-group mt-4">
                        </i> Job Type
                        <select class="form-control" name="Type">
                            <option value="<?php echo $row10["jobInformation"] ?>"><?php echo $row10["jobInformation"] ?></option>
                            <option value="Private">Private</option>
                            <option value="Government">Government</option>
                            <option value="Self-Employed">Self-Employed</option>
                            <option value="Business">Business</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    <div class="modal-footer mt-4">
                        <button class="btn btn-primary" name="SaveEmployment">Save Changes</button>
                    </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
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