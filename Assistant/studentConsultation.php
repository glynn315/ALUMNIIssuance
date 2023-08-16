<?php

require '../configuration/connectConfiguration.php';
include('../session.php');
if (isset($_REQUEST["studentNumber"])) {
    $studentNumber = $_REQUEST["studentNumber"];

    $query4 = "SELECT * FROM studentuseraccount WHERE studentCount = '$studentNumber'";
    $result4 = mysqli_query($conn, $query4);
    $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
    $query1 = "SELECT * FROM exitinterviewinformation WHERE studentNumber = '$studentNumber'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

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

                <div class="container-fluid mb-4">
                    <h3 class="m-2">EXIT INTERVIEW</h3>
                    <form method="POST">
                        <table width="100%">
                            <tr>
                                <td>
                                    <div class="form-group  ">
                                        <i class="bi bi-person-fill"></i> ID Number
                                        <input type="text" class="form-control" name="txtIdNumber"
                                                    value="<?php echo $studentNumber ?>" disabled>
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
                        Describe your most unforgettable experience as a student :
                        <textarea class="form-control" name="text2" value="" disabled><?php echo $row1["experience"] ?></textarea>
                        Where do you see yourself five years from now? :
                        <textarea class="form-control" name="text3" value="" disabled><?php echo $row1["yourself"] ?></textarea>
                    </tr>
                </table>
                <table width="70%" align="center" class="mt-4">
                    <tr>
                        <td><b>Office/Department/Services</b></td>
                        <td><b>EVALUATION</b></td>
                    </tr>
                    <tr>
                        <td>Security and Maintenance</td>
                        <td>
                            <select class="form-control" name="s1" disabled value="<?php echo $row1["Ans1"] ?>">
                                <option value="5"><?php echo $row1["Ans1"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Registrar's Office</td>
                        <td>
                            <select class="form-control" name="s2" disabled>
                                <option value="5"><?php echo $row1["Ans2"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Canteen</td>
                        <td>
                            <select class="form-control" name="s3" disabled>
                                <option value="5"><?php echo $row1["Ans3"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>School Clinic</td>
                        <td>
                            <select class="form-control" name="s4" disabled>
                                <option value="5"><?php echo $row1["Ans4"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Student Affairs Office</td>
                        <td>
                            <select class="form-control" name="s5" disabled>
                                <option value="5"><?php echo $row1["Ans5"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Guidance and Testing Center</td>
                        <td>
                            <select class="form-control" name="s6" disabled>
                                <option value="5"><?php echo $row1["Ans6"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Student Organizations</td>
                        <td>
                            <select class="form-control" name="s7" disabled>
                                <option value="5"><?php echo $row1["Ans7"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Faculty/Staff from your program</td>
                        <td>
                            <select class="form-control" name="s8" disabled>
                                <option value="5"><?php echo $row1["Ans8"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Classroom</td>
                        <td>
                            <select class="form-control" name="s9" disabled>
                                <option value="5"><?php echo $row1["Ans9"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Schedule</td>
                        <td>
                            <select class="form-control" name="s10" disabled>
                                <option value="5"><?php echo $row1["Ans10"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Laboratory</td>
                        <td>
                            <select class="form-control" name="s11" disabled>
                                <option value="5"><?php echo $row1["Ans11"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Library</td>
                        <td>
                            <select class="form-control" name="s12" disabled>
                                <option value="5"><?php echo $row1["Ans12"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Comfort Rooms</td>
                        <td>
                            <select class="form-control" name="s13" disabled>
                                <option value="5"><?php echo $row1["Ans13"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Overall Experience</td>
                        <td>
                            <select class="form-control" name="s14" disabled>
                                <option value="5"><?php echo $row1["Ans14"] ?></option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                </table>
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


         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
</body>
</html>