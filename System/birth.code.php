<?php
////require "index.php";
//?>

<?php
//
////require "footer.php";
//
//?>

<?php
//statement to check if the user is attempting to signup or has clicked on the Register / Signup button in the signup page
if (isset($_POST['submit-data'])) {

//system will first check the condition in the db_connect.php file to validate connection to the db.
    require 'dbConnect.php';

//declare variable as indicated in the name under signup form
    $FSir =$_POST['one']; $FFirstN = $_POST['two']; $FLast = $_POST['three']; $FID = $_POST['four']; $FNat = $_POST['five']; $MSir = $_POST['six'];

//Error handling
//Code to check if the fields in the signup form are empty. NOTE || symbols means or
//takes you back to the signup page to enter data in the missing fields.
//You cannot include the password because it will be visible on the URL - note:- method is POST.
    if (empty($FSir) || empty($FFirstN) || empty($FLast) || empty($FID) || empty($FNat) || empty($MSir) || {
        header ("location: ../index.php?error=emptyfields/inputs");
        exit();
    }  else if
    (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../index.php?error=Invalid_email");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
        header("location: ../index.php?error=Invalidemailaddress");
//        header("location: signup.php?error=Invalidmail&uname=".$firstname."&sname".$secondname);
//        header("location: signup.php?error=Invalidmail&uname=".$firstname."&sname".$secondname);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z'0-9 ]*$/", $fullname) || !preg_match("/^[a-zA-Z'0-9 ]*$/", $username)) {
        header("location: ../index.php?error=Invalidnames");
        exit();
    }
    else if ($password1 !== $password2) {
        header("location: ../index.php?error=PasswordDoNotMatch");

        exit();
    }
    else    {
        $sql="SELECT * FROM employees_List WHERE EmployeeName = ? OR EmployeeEmail = ?;";
        $connect = mysqli_connect("localhost","root","","employees_data");
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $fullname, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0) {
                header("location: ../index.php?error=usernameoremailalreadyexists");
                exit();
            }
            else {

                $sql="INSERT INTO employees_list (EmployeeName, EmployeeEmail, EmployeeUserID, EmployeePassword) VALUES (?, ?, ? ,?)";
                $stmt = mysqli_stmt_init($connect);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../index.php?error=sqlerror");
                    exit();
                }
                else {

                    $hashedpswd = password_hash($password1, PASSWORD_DEFAULT );

                    mysqli_stmt_bind_param($stmt, "ssss",$fullname, $email, $username, $hashedpswd);
                    mysqli_stmt_execute($stmt);
                    header("location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
else {
    header("location: ../index.php");
    exit();
}
?>
