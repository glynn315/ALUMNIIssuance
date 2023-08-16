<?php
require '../Configuration/connectConfiguration.php';
include('../StudentSession.php');

$query ="SELECT * FROM jobhiringdb";  
$result = mysqli_query($conn, $query); 
$query1 ="SELECT * FROM announcementinformation";  
$result1 = mysqli_query($conn, $query1); 
$query5 ="SELECT * FROM requestinformation WHERE studentID = '$login_session' AND requestStatus = 'APPROVED';";  
$result5 = mysqli_query($conn, $query5); 


$query4 = "SELECT * FROM studentuseraccount WHERE studentCount = '$login_session'";
$result4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);



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

        .nav-item {
            color: white;
            font-size: 24px;
        }

        ::-webkit-scrollbar
        {
            width:0;
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
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-sm-8">
                    <div class="border rounded p-3">
                        <h4 class="mt-3 p-3 rounded" style="background: #011844;color:#FFF;"><i class="bi bi-person-lines-fill"></i>  Alumni Record</h4> 
                        <div class="container-fluid bg-dark p-3 color-white">
                            <div class="text-light"><i class="bi bi-pencil-fill"></i> Alumni Information</div>
                        </div>
                        <div class="container-fluid p-3">
                            <table width="100%">
                                <tr>
                                    <td width="25%">
                                        <div class="form-group mb-3 mr-3">
                                            <img src="<?php echo"data:image/jpeg;base64,".base64_encode($row6["studentImage"] )."" ?>" style="width: 100%;height: 100%;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> ID Number
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                    value="<?php echo $login_session ?>" disabled>
                                        </div>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Name
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                    value="<?php echo $row4["studentFname"].' '.$row4["studentMname"].' '.$row4["studentLname"] ?>" disabled>
                                        </div>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Course
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                    value="<?php echo $row4["programCode"] ?>" disabled>
                                        </div>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Batch(YEAR)
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                    value="<?php echo $row4["studentYear"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Date of Birth
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row6["dob"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Place of Birth
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row6["pob"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table> 
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Age
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row6["age"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Sex
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row6["sex"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Citizenship
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row6["citizenship"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Religion
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row6["religion"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Civil Status
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row6["civStatus"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div class="container-fluid bg-dark p-3 color-white">
                            <div class="text-light"><i class="bi bi-pencil-fill"></i> Address Information</div>
                        </div>
                        <div class="container-fluid mt-3">
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Permanent Address
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                    value="<?php echo $row7["permAdd"] ?>" disabled>
                            </div>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Current Address
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                    value="<?php echo $row7["currAdd"] ?>" disabled>
                            </div>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Home Contact
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                    value="<?php echo $row7["homeContact"] ?>" disabled>
                            </div>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Personal Contact
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                    value="<?php echo $row7["perContact"] ?>" disabled>
                            </div>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Email Address
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                    value="<?php echo $row7["emAdd"] ?>" disabled>
                            </div>
                            <h3 class="text-center">Emergency Contact</h3>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Name
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row7["emerName"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Contact Number
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row7["emerCon"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row7["emerAdd"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Relationship
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row7["emerRelation"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table> 

                        </div>
                            
                        <div class="container-fluid bg-dark p-3 color-white mt-3">
                            <div class="text-light"><i class="bi bi-pencil-fill"></i> Family Background</div>
                        </div>

                        <div class="container-fluid">
                            <h4 class="mt-2">Fathers Information</h4>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> First Name
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherFname"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Middle Name
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherMname"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Last Name
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherLname"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Age
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherAge"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Birthdate
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherDOB"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Contact Number
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherContact"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Occupation
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherOccupation"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Educational Attainment
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherEducation"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Religion
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["fatherReligion"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table> 
                            <h4 class="mt-2">Mothers Information</h4>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> First Name
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherFname"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Middle Name
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherMname"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Last Name
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherLname"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Age
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherAge"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Birthdate
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherDOB"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Contact Number
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherContact"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Occupation
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherOccupation"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Educational Attainment
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherEducation"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Religion
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["motherReligion"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table> 
                            <div class="form-group">
                                <i class="bi bi-person-fill"></i> Parents Relationship Status
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row8["parentRelationship"] ?>" disabled>
                            </div>

                        </div>
                        
                        <div class="container-fluid bg-dark p-3 color-white mt-4">
                            <div class="text-light"><i class="bi bi-pencil-fill"></i> Educational Background</div>
                        </div>
                        <div class="container-fluid">
                            <h4 class="mt-4">Pre-School</h4>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> School
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["preSchool"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["preAddress"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Year
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["preYear"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Award
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["preAward"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <h4 class="mt-4">Elementary</h4>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> School
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["elemSchool"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["elemAddress"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Year
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["elemYear"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Award
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["elemAward"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <h4 class="mt-4">High School</h4>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> School
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["highSchool"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["highAddress"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Year
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["highYear"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Award
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["highAward"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <h4 class="mt-4">Senior High School</h4>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> School
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["seniorSchool"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["seniorAddress"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Year
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["seniorYear"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Award
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["seniorAward"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <h4 class="mt-4">College</h4>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> School
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["previousSchool"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Address
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["previousAddress"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Year
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["previousYear"] ?>" disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group  ">
                                            <i class="bi bi-person-fill"></i> Award
                                            <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row9["previousAward"] ?>" disabled>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        
                        <div class="container-fluid bg-dark p-3 color-white mt-2">
                            <div class="text-light"><i class="bi bi-pencil-fill"></i> Employment Status</div>
                        </div>
                        <div class="container-fluid">
                            <h4 class="mt-4">Employment Information</h4>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Employement Status
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row10["jobStatus"] ?>" disabled>
                            </div>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Job Desc
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row10["jobDesc"] ?>" disabled>
                            </div>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Date Employment
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row10["dateEmployment"] ?>" disabled>
                            </div>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Reason
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row10["reason"] ?>" disabled>
                            </div>
                            <div class="form-group  ">
                                <i class="bi bi-person-fill"></i> Job Information
                                <input type="text" class="form-control" name="txtIdNumber"
                                                                value="<?php echo $row10["jobInformation"] ?>" disabled>
                            </div>
                        </div>

                    </div>  

                </div>

                <div class="col-sm-4">
                    <div class="border rounded p-3">
                        <h4 class="mt-3 p-3 rounded" style="background: #011844;color:#FFF;"><i class="bi bi-person-workspace"></i>  Job Notice</h4>
                        <table id="employee_data" class="table table-fluid mt-4" width="100%">
                            <thead style="font-weight: bold;">
                                <tr>
                                    <td width="30%">Description</td>
                                    <td>When</td>
                                    <td>Where</td>
                                    <td>Link</td>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td class='align-middle'>";
                                echo $row["jobHiringDescirption"];
                                echo "</td>";
                                echo "<td class='align-middle'>";
                                echo $row["jobWhen"];
                                echo "</td>";
                                echo "<td class='align-middle'>";
                                echo $row["jobWhere"];
                                echo "</td>";
                                echo "<td class='align-middle'><a href='";
                                echo $row["jobLink"];
                                echo "' target = '_blank'><button class = 'btn btn-primary'>Open</button></td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                    <div class="border rounded p-3 mt-3">
                        <h4 class="mt-3 p-3 rounded" style="background: #011844;color:#FFF;"><i class="bi bi-megaphone-fill"></i>  Announcement</h4>
                        <table id="employee_data" class="table table-fluid mt-4" width="100%">
                            <thead style="font-weight: bold;">
                                <tr>
                                    <td width="30%">Description</td>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_array($result1)) {
                                echo "<tr>";
                                    echo "<td class='align-middle'>";
                                    echo $row["announcedesc"];
                                    echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                    <div class="border rounded p-3 mt-3">
                        <h4 class="mt-3 p-3 rounded" style="background: #011844;color:#FFF;"><i class="bi bi-person-badge-fill"></i>  Requests</h4>
                        <table id="employee_data" class="table table-fluid mt-4" width="100%">
                            <thead style="font-weight: bold;">
                                <tr>
                                    <td width="30%">Description</td>
                                    <td width="30%">Date</td>
                                    <td width="30%"></td>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_array($result5)) {
                                echo "<tr>";
                                    echo "<td class='align-middle'>";
                                    echo $row["requestDescription"];
                                    echo "</td>";
                                    echo "<td class='align-middle'>";
                                    echo $row["requestDate"];
                                    echo "</td>";
                                    echo "<td class='align-middle'><a href='idDownload.php'><button type='submit' class='btn btn-primary'>DOWNLOAD ID</button></a>";
                                    echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>

                </div>
            </div>
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