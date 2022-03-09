<?php

if (isset($_GET['PassResetCode'])) {
    $code = $_GET['code'];

    $connect = mysqli_connect("localhost", "root", "", "employees_data");

    if (!$connect) {
        die("Connection to the database failed, please check: " .mysqli_connect_error());

}
    $verifyQuery = $connect->query("SELECT * FROM employees_list WHERE PassResetCode = '$code'");
//    $verifyQuery  = $connect->query("UPDATE employees_list SET PassResetCode = '$code' WHERE EmployeeEmail = '$email'");

//if the PassResetCode doesn't exist in db then redirect the user to the index page
    if($verifyQuery->num_rows == 0) {
        header("location: /..index.php");
        exit();
    }
//if user clicked the change password button the changepass.php page.
        if (isset($_POST['change_submit'])){
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];
            $new_hpassword = password_hash($password12, PASSWORD_DEFAULT );

//            $changepassQuery = $connect->query("UPDATE employees_list SET PassResetCode = '$code' WHERE EmployeeEmail = '$email' and EmployeePassword = '$password12'");
            $changepassQuery = $connect->query("UPDATE employees_list SET EmployeePassword = '$new_hpassword' WHERE EmployeeEmail = '$email' and PassResetCode = '$code'");

            if($changepassQuery) {

            header("location: /..resetpasswordsuccess.php");
        }

            else{

                echo "Something went wrong";
            }
        }
    mysqli_close($connect);
}

else{

    header("location: resetpasswordsuccess.php");
    exit();
}
?>

