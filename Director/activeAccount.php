<?php
require '../configuration/connectConfiguration.php';
include('../session.php');
if (isset($_REQUEST["userAccountID"])) {
    $userAccountID = $_REQUEST["userAccountID"];

    mysqli_query($conn, "UPDATE useraccounttable SET activeStatus = 'USER-ACTIVE' WHERE userAccountID = '$userAccountID';");

            echo
            "
            <script>
            alert('THANK YOU');
            document.location.href = 'accountManagement.php';
            </script>
            ";
}

?>