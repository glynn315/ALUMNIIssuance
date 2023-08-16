<?php
require '../configuration/connectConfiguration.php';
include('../session.php');
if (isset($_REQUEST["studentNumber"])) {
    $studentNumber = $_REQUEST["studentNumber"];

    mysqli_query($conn, "UPDATE requestinformation SET requestStatus = 'REJECTED' WHERE requestID = '$studentNumber';");

            echo
            "
            <script>
            alert('THANK YOU');
            document.location.href = 'alumniRequest.php';
            </script>
            ";
}

?>