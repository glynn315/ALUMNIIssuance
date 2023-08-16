<?php

require '../configuration/connectConfiguration.php';
include('../session.php');
$query ="SELECT * FROM personalinformationtable WHERE studentStatus = 'ACTIVE'";  
$result = mysqli_query($conn, $query); 

if (isset($_POST["subReg"])) {
    $date = date('Y-m-d');
    mysqli_query($conn, "INSERT INTO personalinformationtable VALUES('$_POST[text1]','$_POST[text2]','$_POST[text3]','$_POST[text4]','$_POST[text6]','$_POST[text7]','$_POST[text8]','$_POST[text9]','$_POST[text10]','$_POST[text11]','$_POST[text12]','$_POST[text13]','$_POST[text14]','$_POST[text15]','$_POST[text16]','$_POST[text17]','$_POST[text18]','ACTIVE','$date');");
        header("location:studentCredential.php");
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
    <link rel="stylesheet" type="text/css" href="css/style.css">

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
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="width:100%;">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header d-inline-flex">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                                <i class="bi bi-arrow-left"></i>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
                        </div>
                    </div>
                </nav>

                <div class="container-fluid">
                    <div class="tab">
                        <button class="tablinks" onclick="studentPIP(event, 'address')" id="defaultOpen">Address and Contact Information</button>
                        <button class="tablinks" onclick="studentPIP(event, 'family')">Family Background</button>
                        <button class="tablinks" onclick="studentPIP(event, 'education')">Educational Background</button>
                        <button class="tablinks" onclick="studentPIP(event, 'other')">Other Information</button>
                        <button class="tablinks" onclick="studentPIP(event, 'status')">Status</button>
                    </div>
                    <div id="address" class="tabcontent">
                        <h3>Address Informations</h3>
                        
                    </div>

                    <div id="family" class="tabcontent">
                        <h3>Family Background</h3>
                        
                    </div>

                    <div id="education" class="tabcontent">
                        <h3>Educational Background</h3>
                        
                    </div>
                    <div id="other" class="tabcontent">
                        <h3>Other Information</h3>
                        
                    </div>
                    <div id="status" class="tabcontent">
                        <h3>Student Status</h3>
                        
                    </div>
                </div>
            </div>
        </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
            <h4>Student Personal Information</h4>
            <hr>
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">StudentID</label>
                    <input type="text" class="form-control" placeholder="Enter Student ID" class="formText" name="text1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" placeholder="Enter First Name" class="formText" name="text2">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" class="form-control" placeholder="Enter Middle Name" class="formText" name="text3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter Last Name" class="formText" name="text4">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Year/Grade Level</label>
                    <select class="form-control" name="text6">
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Code/Program Taken</label>
                    <select class="form-control" name="text7">
                        <option value="BSIT">BSIT</option>
                        <option value="BSA">BSA</option>
                        <option value="BECED">BECED</option>
                        <option value="BSBA">BSBA</option>
                    </select>
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
                    <label for="exampleInputEmail1">Gender</label>
                    <input type="text" class="form-control" placeholder="Enter Gender" class="formText" name="text10">
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
                    <label for="exampleInputEmail1">Birth Order</label>
                    <input type="text" class="form-control" placeholder="Enter Birth Order" class="formText" name="text15">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Civil Status</label>
                    <input type="text" class="form-control" placeholder="Enter Civil Status" class="formText" name="text16">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Personal Statement</label>
                    <input type="text" class="form-control" placeholder="Enter Personal Statement" class="formText" name="text17">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Area of Interest or Special Abilities</label>
                    <input type="text" class="form-control" placeholder="Area of Interest/Hobbies" class="formText" name="text18">
                </div>
                <div class="modal-footer mt-2">
                    <button type="submit" class="btn btn-primary" name="subReg">Save Changes</button>
                </div>
            </form>

            <hr>
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