<?php
require '../Configuration/connectConfiguration.php';
include('../StudentSession.php');
if (isset($_POST["buttonExit"])) {
    $studentNumber = $login_session; // Assuming this is the student's number

    // Check if data exists
    $sql_check = "SELECT * FROM exitinterviewinformation WHERE studentNumber = '$studentNumber'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Data exists, perform an update
        $sql_update = "UPDATE exitinterviewinformation SET 
                        experience = '$_POST[text2]',
                        yourself = '$_POST[text3]',
                        Ans1 = '$_POST[s1]',
                        Ans2 = '$_POST[s2]',
                        Ans3 = '$_POST[s3]',
                        Ans4 = '$_POST[s4]',
                        Ans5 = '$_POST[s5]',
                        Ans6 = '$_POST[s6]',
                        Ans7 = '$_POST[s7]',
                        Ans8 = '$_POST[s8]',
                        Ans9 = '$_POST[s9]',
                        Ans10 = '$_POST[s10]',
                        Ans11 = '$_POST[s11]',
                        Ans12 = '$_POST[s12]',
                        Ans13 = '$_POST[s13]',
                        Ans14 = '$_POST[s14]'
                      WHERE studentNumber = '$studentNumber'";
        
        if ($conn->query($sql_update) === TRUE) {

        }
    } else {

    }

    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Graduating Form</title>
    <style>
        .nav {
            background-color: #684A2D;

        }

        .nav-item {
            color: white;
            font-size: 24px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <ul class="nav justify-content-center border p-3">
        <div class="container border p-3" style="font-size:20px;color:white;">
            WELCOME <?php echo $login_Name ?>
            <a href="../index.php" class="btn float-right">Logout</a>
        </div>
    </ul>
    <div class="container">
        
    </div>
    <div class="container-fluid">
        <div class="container border p-2 mt-3">
            <h3 class="text-center">Exit Interview Form</h3>
            <form method="POST">
                <table class="center" width="100%">
                    <tr>
                        <td class="text-right" class="text-right" style="width:30%;">Name :</td>
                        <td>
                            <?php echo $login_Name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Student Course :</td>
                        <td><?php echo $CCourse ?></td>
                    </tr>
                </table>
                <hr width="70%">
                <table class="center" width="100%">
                    <tr>
                        <td class="text-right" style="width:30%;">Describe your most unforgettable experience as a
                            student :</td>
                        <td><textarea class="form-control" style="width:70%;" name="text2"></textarea></td>
                    </tr>
                    <tr>
                        <td class="text-right" style="width:30%;">Where do you see yourself five years from now? :</td>
                        <td><textarea class="form-control" style="width:70%;" name="text3"></textarea></td>
                    </tr>
                </table>
                <table width="70%" align="center" class="mt-4">
                    <tr>
                        <td><b>Office/Department/Services</b></td>
                        <td><b>EVALUATION</b></td>
                    </tr>
                    <tr>
                        <td>Security and Maintenance</td>
                        <td>
                            <select class="form-control" name="s1">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Registrar's Office</td>
                        <td>
                            <select class="form-control" name="s2">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Canteen</td>
                        <td>
                            <select class="form-control" name="s3">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>School Clinic</td>
                        <td>
                            <select class="form-control" name="s4">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Student Affairs Office</td>
                        <td>
                            <select class="form-control" name="s5">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Guidance and Testing Center</td>
                        <td>
                            <select class="form-control" name="s6">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Student Organizations</td>
                        <td>
                            <select class="form-control" name="s7">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Faculty/Staff from your program</td>
                        <td>
                            <select class="form-control" name="s8">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Classroom</td>
                        <td>
                            <select class="form-control" name="s9">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Schedule</td>
                        <td>
                            <select class="form-control" name="s10">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Laboratory</td>
                        <td>
                            <select class="form-control" name="s11">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Library</td>
                        <td>
                            <select class="form-control" name="s12">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Comfort Rooms</td>
                        <td>
                            <select class="form-control" name="s13">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Overall Experience</td>
                        <td>
                            <select class="form-control" name="s14">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div class="modal-footer mt-3">
                    <button type="submit" name="buttonExit" class="btn btn-primary">SUBMIT CHANGES</button>
                </div>
                
            </form>
        </div>
        <hr>
</body>

</html>