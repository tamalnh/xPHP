<?php
if (isset($_POST["btn"])) {

    function save_student_info() {
        $hostname = "localhost"; #Default Host Name
        $username = "root"; #Default user name 
        $password = ""; #Default password is Blank
        $db_name = "student_info";

        $db_connect = mysqli_connect($hostname, $username, $password, $db_name);
        if (!$db_connect) {
            die("DataBase Connection is faild!" . mysqli_errno($db_connect));
        }
        $student_name = $_POST['student_name']; #input value take on a variable
        $student_email = $_POST['student_email']; #input value take on a variable
        $student_phone = $_POST['student_phone']; #input value take on a variable
        $student_address = $_POST['student_address']; #input value take on a variable

        if (!empty($student_name && $student_email && $student_phone && $student_address)) {
            $sql = "INSERT INTO tbl_student(student_name, student_email, student_phone, student_address) VALUES('$student_name', '$student_email', '$student_phone', '$student_address')";
        } else {
            $message = "Field Should Not Be Empty!";
            return $message;
        }

        if (mysqli_query($db_connect, $sql)) {
            $message = "Student Info Save Successfully!";
            return $message;
        } else {
            die("We Cound Not Connect With The Server!" . mysqli_error($db_connect));
        }
    }

    $message = save_student_info();
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Student Form Validation</title>
    </head>
    <body>

        <?php if (isset($message)) { ?>
            <h1 style="color: green;text-align: center">
                <?php
                echo $error_message;
                unset($error_message);
                ?>
            </h1>
        <?php } else { ?>
            <h1 style="text-align: center"> Save Student Info </h1>                            
        <?php } ?>






        <form action="" method="post">
            <table align="center" style="height: 400px;width: 500px;border: 1px solid #ddd;padding: 5px;">
                <tr>
                    <td>Student Name</td>
                    <td><input type="text" name="student_name" required=""></td>
                </tr>
                <tr>
                    <td>Student Email</td>
                    <td><input type="text" name="student_email" required=""></td>
                </tr>
                <tr>
                    <td>Student Phone Number</td>
                    <td><input type="text" name="student_phone" required=""></td>
                </tr>
                <tr>
                    <td>Student Address</td>
                    <td><textarea name="student_address" required="" rows="10" cols="30"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn" value="Save" ></td>
                </tr>
            </table>
        </form>

</html>
