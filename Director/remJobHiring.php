<?php
require '../configuration/connectConfiguration.php';
include('../session.php');
if (isset($_REQUEST["studentNumber"])) {
    $studentNumber = $_REQUEST["studentNumber"];

    mysqli_query($conn, "DELETE FROM jobhiringdb WHERE jobID = '$studentNumber';");

            echo
            "
            <script>
            alert('THANK YOU');
            document.location.href = 'jobHiring.php';
            </script>
            ";
}

?>