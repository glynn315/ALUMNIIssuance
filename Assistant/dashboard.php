<?php
include('count.php');
include('../session.php');
$query1 = "SELECT studentYear, COUNT(*) as numberOfStudents FROM studentuseraccount WHERE studentStatus = 'Alumni' GROUP BY studentYear;";  
$result1 = mysqli_query($conn, $query1);
$chart_data = '';
while($row = mysqli_fetch_array($result1))
{
    $chart_data .= "{ DATE:'".$row["studentYear"]."', TYPE:".$row["numberOfStudents"]."}, ";
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

    <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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
        .morris-chart text {
          fill: white;
        }
        .morris-chart
        {
            border-radius: 10px;
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

                <div class="container-fluid d-inline-flex">
                	
                    <div class="card d-inline-flex" style="width: 30rem; margin: 20px;margin-left:0 ;">
                        <div class="card-body">
                            <h5 class="card-title">Graduating Student</h5>
                            <h3 style="font-size: 50px; font-weight: bold;"><?php echo $count1 ?></h3>
                        </div>
                    </div>
                    <div class="card d-inline-flex" style="width: 30rem; margin: 20px;margin-left:0 ;">
                        <div class="card-body">
                            <h5 class="card-title">Alumni</h5>
                            <h3 style="font-size: 50px; font-weight: bold;"><?php echo $count2 ?></h3>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="container-fluid">
                    <div id="chart" class="bg-info graphDes morris-chart mb-3" style="height:500px;">
                                
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

<script>
    new Morris.Area({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        xkey:'DATE',
        ykeys:['TYPE'],
        labels:['Batch Year'],
        hideHover:'auto',
        stacked:true
    });
</script>
</body>
</html>