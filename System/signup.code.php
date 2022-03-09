<?php
////require "index.php";
//?>
<!---->
<!--    <br>-->
<!--    <hr>-->
<!--    <br>-->
<!--    <main class="wrapper">-->
<!--        <br>-->
<!--        <br>-->
<!--        <h1>Register / Signup</h1>-->
<!--        <form class="form-signup" action="" method="post"><br>-->
<!--            <input type="text" name="uname" placeholder="First Name"> <br>-->
<!--            <input type="text" name="sname" placeholder="Second Name"> <br>-->
<!--            <input type="email" name="uemail" placeholder="Email Address"> <br>-->
<!--            <input type="password" name="upass" placeholder="Password"> <br>-->
<!--            <input type="password" name="ucpass" placeholder="Confirm Password"><br><br>-->
<!--            <button type="submit" name="signup-submit">Click to Register / Signup</button>-->
<!--            <br><br>-->
<!---->
<!--        </form>-->
<!--<!--        <br>-->
<!--<!--        <section>-->
<!--<!--            <p>You have logged out successfully, please log in to continue using the system.</p> echos if the user logs out-->
<!--<!--            <p>You have logged in successfully.</p> echos if the user logs in successfully-->
<!--<!--        </section>-->
<!--    </main>-->
<!---->
<?php
//
////require "footer.php";
//
//?>

<?php
//statement to check if the user is attempting to signup or has clicked on the Register / Signup button in the signup page
    if (isset($_POST['signup-press'])) {

//system will first check the condition in the dbconnect.php file to validate connection to the db.
    require 'dbconnect.php';

//declare variable as indicated in the name under signup form
    $fullname =$_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password1 = $_POST['userpass'];
    $password2 = $_POST['usercpass'];

//Error handling & validation
//Code to check if the fields in the signup form are empty. NOTE || symbols means or
//takes you back to the signup page to enter data in the missing fields.
//You cannot include the password because it will be visible on the URL - note:- method is POST.
    if (empty($fullname) || empty($email) || empty($username) || empty($password1) || empty($password2)) {
     header ("location: ../signup.php?error=emptyfields/inputs");
     exit();
}  else if
        (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location: ../signup.php?error=Invalid_email");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL )) {
        header("location: ../signup.php?error=Invalidemailaddress");
//        header("location: signup.php?error=Invalidmail&uname=".$firstname."&sname".$secondname);
//        header("location: signup.php?error=Invalidmail&uname=".$firstname."&sname".$secondname);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z'0-9 ]*$/", $fullname) || !preg_match("/^[a-zA-Z'0-9 ]*$/", $username)) {
        header("location: ../signup.php?error=Invalidnames");
        exit();
    }
    else if ($password1 !== $password2) {
        header("location: ../signup.php?error=PasswordDoNotMatch");

        exit();
    }
    else    {
        $sql="SELECT * FROM employees_List WHERE EmployeeName = ? OR EmployeeEmail = ?;";
        $connect = mysqli_connect("localhost","root","","employees_data");
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $fullname, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0) {
                header("location: ../signup.php?error=usernameoremailalreadyexists");
                exit();
            }
    else {

        $sql="INSERT INTO employees_list (EmployeeName, EmployeeEmail, EmployeeUserID, EmployeePassword) VALUES (?, ?, ? ,?)";
        $stmt = mysqli_stmt_init($connect);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=sqlerror");
            exit();
    }
        else {

            $hashedpswd = password_hash($password1, PASSWORD_DEFAULT );

            mysqli_stmt_bind_param($stmt, "ssss",$fullname, $email, $username, $hashedpswd);
            mysqli_stmt_execute($stmt);
            header("location: ../signup.php?signup=success");
            exit();
        }
    }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
}
else {
    header("location: ../signup.php");
    exit();
}
?>
