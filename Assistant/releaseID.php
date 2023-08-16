<?php
require '../configuration/connectConfiguration.php';
include('../session.php');

if(isset($_REQUEST["studentNumber"]))
{
    $studentNumber=$_REQUEST["studentNumber"];
    $query ="SELECT * FROM studentuseraccount WHERE studentStatus = 'ALUMNI' AND studentCount = '$studentNumber';";  
    $result = mysqli_query($conn, $query); 
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $Name = $row['studentFname'] . ' ' .$row['studentMname'] . ' ' .$row['studentLname'];
    $Course= $row['programCode'];
    $studentNum = $row['studentCount'];
    $Mvalidity = date('M');
    $Yvalidity = date('Y');
    $query1 ="SELECT * FROM personalinformationtable WHERE studentID = '$studentNumber';";  
    $result1 = mysqli_query($conn, $query1); 
    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="css/print1.css" media="print">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
</head>
<body>
<div class="wrapper">
            <div id="content" style="width:100%;">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header d-inline-flex">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                                <i class="bi bi-arrow-left"></i>
                            </button>
                            <ul class="nav d-inline-flex p-2">
                                <li class="ml-4"><a href="dashboard.php">Holy Child Central Colleges Inc.</a></li>
                                <li class="ml-4"><a href="dashboard.php"><i class="bi bi-house-fill"></i></a></li>
                                <li class="ml-4"><a href="dashboard.php" onclick="window.print();"><i class="bi bi-printer-fill"></i></a></li>
                            </ul>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
                        </div>
                    </div>
                </nav>
                <div class="container-fluid justify-content-center d-inline-flex border">
                    <div class="idCon" id="printID">
                        <div class=" bd-highlight headerID">
                            <p class="headerLogoID" align="center">HOLY CHILD CENTRAL COLLEGES INC.</p>
                            <p class="headerLogoID" align="center" style="margin-top:-20px;">Allah Valley Drive, Surallah, South Cotabato </p>
                            <hr style="margin-top:-15px; border:1px solid #FFF;">
                            <div class="d-flex flex-row" style="margin-top:-18px;margin-left: 2px;">
                                <div class="p-2 bd-highlight">
                                    <img src="<?php echo"data:image/jpeg;base64,".base64_encode($row1["studentImage"] )."" ?>" class="imgID">
                                </div>
                                <div class="p-2 bd-highlight">
                                    <p class="labelID" style="font-size:12px;"><?php ?></p>
                                    <p class="labelID" style="margin-top:-15px;font-size:12px;"><?php echo $Name  ?></p>
                                    <p class="labelID" style="margin-top:-20px;font-size:12px;">(<?php echo $Course ?>)</p>
                                    <p class="labelID" style="margin-top:-20px;font-size:12px;"><?php echo $studentNum ?></p>
                                    <p class="labelID" style="margin-top:-10px;font-size:12px;">CLASS <?php echo ' '. $Yvalidity ?></p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bd-highlight" style="height:30%; background:#c6ae96; border-top:2px solid black;">

                        </div>
                    </div>

                    <div class="idCon">
                        <div class=" bd-highlight headerID">
                            <p class="headerLogoID" align="center">HOLY CHILD CENTRAL COLLEGES INC.</p>
                            <p class="headerLogoID" align="center" style="margin-top:-20px;">Allah Valley Drive, Surallah, South Cotabato </p>
                            <hr style="margin-top:-15px; border:1px solid #FFF;">
                            <div class="d-flex flex-row" style="margin-top:-15px;margin-left: 2px;">
                                <div class="p-2 bd-highlight">
                                    <p class="labelID" style="font-size:10px;margin-top:-5px;">SY Graduated</p>
                                    <p class="labelID" style="font-size:10px;margin-top:-15px;">ID Validity</p>
                                    <p class="labelID" style="font-size:10px;margin-top:-15px;">Purpose</p>
                                </div>
                                <div class="p-2 bd-highlight" style="width:70%;">
                                    <p class="labelID" style="font-size:10px;margin-top:-5px;">: Year Graduate</p>
                                    <p class="labelID" style="font-size:10px;margin-top:-15px;">: <?php echo $Mvalidity .' '. $Yvalidity + 3  ?></p>
                                    <p class="labelID" style="font-size:10px;margin-top:-15px; text-align: justify;">: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="p-2 bd-highlight" style="height:30%; background:#c6ae96; border-top:2px solid black;">
                            <div class="sigArea">
                                
                            </div>
                            <p align="center" style="font-size:9px;color:#000;margin-top: 2px;">SIGNATURE</p>
                        </div>
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