<?php
include('count.php');
include('../session.php');

$query ="SELECT studentuseraccount.studentCount,addressinformation.perContact FROM studentuseraccount INNER JOIN addressinformation ON addressinformation.studentID = studentuseraccount.studentCount WHERE studentuseraccount.studentStatus = 'ALUMNI';"; 
$result = mysqli_query($conn, $query); 
$nums  = '';
while ($row = mysqli_fetch_assoc($result)) {
    $nums .= $row['perContact'] . ', ';
} 

$nums = rtrim($nums, ', ');
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

    <style type="text/css">
        .card-body{
            border-radius: 10px;
            background: rgba(219, 219, 219,0.5);

        }
        .card
        {
            border: none;
        }
        .card-body:hover
        {
            background: rgb(163, 163, 163);
            transition: 0.5s;
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

                <div class="container-fluid">
                    <form method="POST">
                        <textarea placeholder="Message" class="form-control m-2" name="smsValue"></textarea>
                        <div class="modal-footer mt-3">
                             <button class="btn btn-primary" name="sendSMS">Notify Alumni</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    <?php

    if (isset($_POST["sendSMS"])) {
        $MESSAGE = "$_POST[smsValue]";
        $ch = curl_init();
        $parameters = array(
            'apikey' => '77ed3208e811e69323cbbc15c9bcb84f',
            'number' => $nums,
            'message' => $MESSAGE,
            'sendername' => 'semaphore'
        );
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);
        echo
        "
        <script>
        alert('SMS SEND');
        document.location.href = 'notify.php';
        </script>
        ";
        }

        
    ?>
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