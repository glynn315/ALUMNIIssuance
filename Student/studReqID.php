<?php
require '../Configuration/connectConfiguration.php';
include('../StudentSession.php');


$query5 ="SELECT * FROM requestinformation WHERE studentID = '$login_session';";  
$result5 = mysqli_query($conn, $query5); 

if (isset($_POST['subReg'])) {
    $date = date('Y-m-d');
    
    // Check if there's an existing request for the student with "WAITING FOR APPROVAL" status
    $existingQuery = "SELECT * FROM requestinformation WHERE studentID = '$login_session' AND requestStatus = 'WAITING FOR APPROVAL'";
    $existingResult = mysqli_query($conn, $existingQuery);
    
    if (mysqli_num_rows($existingResult) == 0) {
        // No existing request in "WAITING FOR APPROVAL" status, so insert the new request
        $requestDescription = mysqli_real_escape_string($conn, $_POST['txtRequest']);
        $insertQuery = "INSERT INTO requestinformation (studentID, requestDate, requestDescription, requestStatus) 
                        VALUES ('$login_session', '$date', '$requestDescription', 'WAITING FOR APPROVAL')";
        mysqli_query($conn, $insertQuery);
        
        echo "
            <script>
                alert('Request Sent');
                document.location.href = 'studReqID.php';
            </script>
        ";
    } else {
        // Existing request in "WAITING FOR APPROVAL" status found, show an alert
        echo "
            <script>
                alert('You already have a pending request for approval.');
            </script>
        ";
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
    <div class="container p-2 mt-3">
        <h3 class="bg-secondary p-2 rounded text-light mb-4"><i class="bi bi-person-badge-fill"></i> Request Alumni ID</h3>
        <form method="POST">
            <div class="form-group">
                <label>Request Description</label>
                <input type="text" class="form-control" name="txtRequest" placeholder="Request">
            </div>
            <div class="modal-footer mt-2">
                <button type="submit" class="btn btn-primary" name="subReg">Submit Request</button>
            </div>
        </form>
        <hr>
        <?php
            if (mysqli_num_rows($result5) > 0) {
                while($row = mysqli_fetch_assoc($result5)) {
                    echo "
                    <div class='container mt-2'>
                        <div class='row p-2 border rounded'>
                            <div class='col-sm pt-3'>
                                <p class='p-2'>" . $row["requestDescription"] . "</p>
                            </div>
                            <div class='col-2 pt-3'>
                                <p class='p-2'>" . $row["requestDate"] . "</p>
                            </div>
                            <div class='col-4 pt-3'>";
                    if ($row["requestStatus"] == 'WAITING FOR APPROVAL') {
                        echo "<p class='bg-primary text-light p-2 rounded'>WAITING FOR APPROVAL</p>";
                    }
                    else if ($row["requestStatus"] == 'APPROVED') {
                        echo "<p class='bg-success text-light p-2 rounded'>APPROVED</p>";
                    }
                    else if ($row["requestStatus"] == 'RELEASED') {
                        echo "<p class='bg-warning text-light p-2 rounded'>RELEASED</p>";
                    }
                    else if ($row["requestStatus"] == 'REJECTED') {
                        echo "<p class='bg-danger text-light p-2 rounded'>REJECTED</p>";
                    }
                    echo "</div>
                        </div>
                    </div>";
                }
            } 
            else {
                echo "0 results";
            }


        ?>
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