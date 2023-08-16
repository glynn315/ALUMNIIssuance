<?php
require '../configuration/connectConfiguration.php';
include('../session.php');
if (isset($_REQUEST["studentNumber"])) {
    $studentNumber = $_REQUEST["studentNumber"];

    mysqli_query($conn, "DELETE FROM announcementinformation WHERE announceID = '$studentNumber';");

            echo
            "
            <script>
            alert('THANK YOU');
            document.location.href = 'announceForm.php';
            </script>
            ";
}

?>