<?php
require '../configuration/connectConfiguration.php';

include('../session.php');
//amu ni mag add sang user account
$query ="SELECT * FROM useraccounttable";  
$result = mysqli_query($conn, $query); 
if(isset($_POST["subReg"])) {
    $date = date('Y-m-d');
    mysqli_query($conn, "INSERT INTO useraccounttable VALUES('','$_POST[text2]','$_POST[text3]','$_POST[text4]','$_POST[text5]','$_POST[text6]','$_POST[text7]','$date','ADMIN ADMIN','USER-ACTIVE','$_POST[text8]','$_POST[text9]');");
        header("location:accountManagement.php");
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
                                <i class="bi bi-arrow-left"></i>
                            </button>
                            <ul class="nav d-inline-flex p-2">
                                <li class="ml-4"><a href="dashboard.php">Holy Child Central Colleges Inc.</a></li>
                                <li class="ml-4"><a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">Add User Account</a></li>
                            </ul>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
                        </div>
                    </div>
                </nav>

                <div class="container-fluid d-inline-flex">
                    <div class="table-responsive" style="margin-top:20px;">
                        <table id="employee_data" class="table table-fluid" width="100%">
                            <thead>  
                                <tr>  
                                    <td>Account ID</td>  
                                    <td>Account Name</td>  
                                    <td>Address</td>  
                                    <td>Job Description</td>
                                    <td>Date Enter</td>
                                    <td>Status</td>  
                                    <td width="6%">Action</td>
                                </tr>  
                            </thead> 
                            <?php  
                            while($row = mysqli_fetch_array($result))  
                                {  
                                    echo "<tr>";                                    
                                        echo "<td class='align-middle'>"; echo $row["userAccountID"]; echo "</td>";
                                        echo "<td class='align-middle'>"; echo $row["firstName"]." ". $row["middleName"] ." ".$row["lastName"]; echo "</td>";
                                        echo "<td class='align-middle'>"; echo $row["address"]; echo "</td>";
                                        echo "<td class='align-middle'>"; echo $row["position"]; echo "</td>";
                                        echo "<td class='align-middle'>"; echo $row["registerDate"]; echo "</td>";
                                        echo "<td class='align-middle'>"; echo $row["activeStatus"]; echo "</td>";
                                        echo "<td class='align-middle'>";
                                            if ($row["activeStatus"] == 'USER-ACTIVE') {
                                                echo "<a href=archiveAccount.php?userAccountID=$row[userAccountID]><button class='btn btn-danger mr-2'><i class='bi bi-archive-fill'></i></button></a>";
                                            }
                                            else if ($row["activeStatus"] == 'ARCHIVE') {
                                                echo "<a href=activeAccount.php?userAccountID=$row[userAccountID]><button class='btn btn-primary mr-2'><i class='bi bi-arrow-counterclockwise'></i></button></a>";
                                            }
                                            ;"</td>";
                                    echo "</tr>";
                                }  
                            ?>   
                        </table>  
                    </div>
                </div>
            </div>
        </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
            <h4>Personal Account Information</h4>
            <form method="POST">
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
                    <label for="exampleInputEmail1">Date of Birth</label>
                    <input type="date" class="form-control" class="formText" name="text5">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" placeholder="Enter Address" class="formText" name="text6">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Position</label>
                    <select class="form-control" name="text7">
                        <option value="Head Guidance">Head Guidance</option>
                        <option value="Assistant Guidance">Assistant Guidance</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" placeholder="Enter User Name" class="formText" name="text8">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="Password" class="form-control" placeholder="Password" class="formText" name="text9">
                </div>
                <div class="modal-footer mt-2">
                    <button type="submit" class="btn btn-primary" name="subReg">Save Changes</button>
                </div>
            </form>
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
</body>
</html>