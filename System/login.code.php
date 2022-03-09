<?php

if (isset($_POST['login-submit'])) {
    require 'dbconnect.php';

//variables
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password1 = $_POST['userpass'];

//Code to check if the fields in the signup form are empty. NOTE || symbols means or
    if (empty($fullname) || empty($email) || empty($password1)) {
        header("location: ../index.php?error=emptyarefields");
        exit();

    } else {
        if (!preg_match("/^[a-zA-Z'0-9 ]*$/", $fullname)) {
            header("location: ../index.php?error=Invalidfull_Username");
            exit();

        } else {

        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ../index.php?error=Invalid_email_address");
            exit();

        }
//statement for checking if the user exists in the database or already signed up - checks the full name, username and email
        $sql = "SELECT * FROM employees_List WHERE EmployeeName=? OR EmployeeEmail=?;";
        $connect = mysqli_connect("localhost", "root", "", "employees_data");
        $stmt = mysqli_stmt_init($connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=sqlerror");
            exit();

        } else {

            mysqli_stmt_bind_param($stmt, "ss", $fullname, $email);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($results)) {
                $PasswdCheck = Password_Verify($password1, $row['EmployeePassword']);
                if ($PasswdCheck == false) {
                    header("location: ../index.php?error=wrongpassword");
                    exit();
                } else if ($PasswdCheck == true) {

                    session_start();
                    $_SESSION['fullname'] = $row ['EmployeeName'];
                    $_SESSION['email'] = $row ['EmployeeEmail'];

                    header("location: ../index.php?login=success");
                    exit();
                } else {
                    header("location: ../index.php?error=wrongpassword");
                    exit();
                }
            }
            else {
                    header("location: ../index.php?error=nouser");
                    exit();
                }
            }

        }
//}
//else {
//    header("location: ../index.php?error=wrongusername");
//    exit();


}