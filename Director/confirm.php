<?php
require '../configuration/connectConfiguration.php';
include('../session.php');
if (isset($_REQUEST["studentNumber"])) {
    $studentNumber = $_REQUEST["studentNumber"];

    mysqli_query($conn, "UPDATE studentuseraccount SET studentStatus = 'GRADUATING' WHERE studentCount = '$studentNumber';");

            echo
            "
            <script>
            alert('THANK YOU');
            document.location.href = 'studentRequest.php';
            </script>
            ";
}

?>