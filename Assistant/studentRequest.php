<?php

require '../configuration/connectConfiguration.php';
include('../session.php');
$query ="SELECT * FROM studentuseraccount WHERE studentStatus = 'PENDING'";  
$result = mysqli_query($conn, $query); 
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if(isset($_POST["subReg"])) {
    $fileName = $_FILES['GradFile']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['GradFile']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 1) {
                $ID = $row['1'];
                $sql = "UPDATE studentuseraccount SET studentStatus = 'GRADUATING' WHERE studentCount = '$ID'";
                $result1 = mysqli_query($conn, $sql);
                $msg = true;

            } else {
                $count = "3";
            }
        }
        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: studentRequest.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('Location:studentRequest.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: studentRequest.php');
        exit(0);
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
                <form method="POST" enctype="multipart/form-data">
                    <div class="container-fluid pt-4">
                        Upload List of Graduating
                        <input type="file" class="form-control" name="GradFile">
                        <div class="modal-footer mt-2">
                            <button type="submit" class="btn btn-primary" name="subReg">Submit</button>                            
                        </div>
                    </div>
                </form>
                <div class="container-fluid d-inline-flex">
                    <div class="table-responsive" style="margin-top:20px;">
                        <table id="employee_data" class="table table-fluid" width="100%">
                            <thead>  
                                <tr>  
                                    <td>Student ID</td>  
                                    <td>Student Name</td>  
                                    <td>Date Registered</td>
                                    <td>Student Status</td>  
                                    <td width="15%">Action</td>
                                </tr>  
                            </thead>  
                            <?php  
                            while($row = mysqli_fetch_array($result))  
                                {  
                                    echo "<tr>";   
                                        echo "<td class='align-middle'>"; echo $row["studentCount"]; echo "</td>";
                                        echo "<td class='align-middle'>"; echo $row["studentFname"]." ". $row["studentMname"] ." ".$row["studentLname"]; echo "</td>";
                                        echo "<td class='align-middle'>"; echo $row["dateRegistry"]; echo "</td>";
                                        echo "<td class='align-middle'>"; echo $row["studentStatus"]; echo "</td>";
                                        echo "<td class='align-middle'><a href='confirm.php?studentNumber=$row[studentCount]'><button class='btn btn-primary mr-2'>Confirm</button></a><a href='viewStudent.php?studentNumber=$row[studentCount]'><button class='btn btn-danger mr-2'>Reject</button></a>";"</td>";
                                    echo "</tr>";
                                }  
                            ?>  
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
</body>
</html>