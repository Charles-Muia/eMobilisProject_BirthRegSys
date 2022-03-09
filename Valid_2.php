<!doctype html>
<html lang="en">
<head>

    <link rel="stylesheet" href="PHPStyle_Validation.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP | Form Validation</title>
    <script type="text/javascript">
        function display_c(){
            const refresh = 1000; // Refresh rate in milliseconds
            setTimeout('display_ct()', refresh);
        }
        function display_ct() {
            document.getElementById('ct').innerHTML = new Date();
            display_c();
        }
    </script>
</head>
<body

<div class="row" id="Time"

        onload=display_ct();><span></span>
<span class="Time2" id='ct'></span>
</div>
<!--<div>-->
<!--    © 2010---><?php //echo date("Y");?>
<!--</div>-->
<div style="float: left">
<!--    <i class="bi bi-geo-alt-fill"> Tom Mboya Street Nairobi, KE +254 </i>-->
<!--    <i class="bi bi-geo-alt-fill"> Tom Mboya Street <br> Nairobi, KE +254 </i> <br>-->
    <b class="bi bi-geo-alt-fill"> Tom Mboya Street | Nairobi, KE +254 </b> <br>
</div>
<div style="float: right">
<!--    <i class="bi bi-telephone-fill"> +254 724 563163</i> <br>-->
    <b class="bi bi-envelope-fill"> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8ae3e4ece5caeff2ebe7fae6efa4e9e5e7">info@gmail.com</a></b>
    <b class="bi bi-telephone-fill"> | +254 724 563163</b> <br>
<!--    <i class="bi bi-geo-alt-fill"> Tom Mboya Street <br> Nairobi, KE +254 </i> <br>-->
<!--    <i class="bi bi-geo-alt-fill"> Tom Mboya Street | Nairobi, KE +254 </i> <br>-->
    <!--    <i class="bi bi-telephone-fill"> +254 724 563163</i> <br>-->
</div>

<!--<div>-->
<!--    <i class="bi bi-envelope-fill"></i>-->
<!--    <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8ae3e4ece5caeff2ebe7fae6efa4e9e5e7">info@gmail.com</a></p>-->
<!--</div>-->
<!---->
<!--<div>-->
<!--    <i class="bi bi-telephone-fill"></i>-->
<!--    <p>+254 724 563163</p>-->
<!--</div>-->

<hr>
<!--<h1>PHP | Form Validation</h1>-->
<!--<div style="text-align:-webkit-center">-->
<div style="float">
    <img src="Photos/NCC.jpg" alt=""><img src="Photos/NMS.jpg" alt="">
    </div>
<!--<div style="float:left">-->
<!--    <img src="Photos/NMS.jpg" alt="">-->
<!---->
<!--    </div>-->
    <hr>
    <div class="container-fluid text-align-center">
        <h2> State Department of Civil Affairs | Birth Registration Form  </h2>
    </div>
<!--
<form method="get">Validation</form>
<br>
<label for="First Name"> Enter Your Sir Name:</label>
<input type="text" name ="sir.n" id="#"> <br>
<br>
<label for="Second Name"> Enter Your First Name: </label>
<input type="text" name="s.n" id="Identity"> <br>
<br>
<label for="Last Name"> Enter Your Last Name: </label>
<input type="text" name="l.n" id="Identity"> <br>
-->

<div class="body">
    <div class="medium-4 columns"><!--medium-4 is the same as m-4-->

        <nav style="text-align: end">
            <!--<img src="Photos/NMS.jpg" alt="">-->

            <?php
            //Variables used
            $DOE = $text= $email= $password= $birthdaytime= $gender="";
            // Set values as empty
            if ($_SERVER ["REQUEST_METHOD"] == "POST") {
                //$DOE = test_input($_POST) ["DOE"];
                $text = test_input($_POST["text"]);
                $email = test_input($_POST["email"]);
                $fn = test_input($_POST["fn"]);
                $birthdaytime = test_input($_POST["birthdaytime"]);
                $gender = test_input($_POST["gender"]);
            }
            function test_input ($data):string
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
            <?php
            // define variables and set to empty values
            $DOEErr = $textErr = $emailErr = $fnErr = $birthdaytimeErr = $genderErr = ""; /*$genderErr="";*/
            $DOE = $text = $email = $fn = $birthdaytime = $gender = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["DOE"])) {
                    $DOEErr = "Select Date";
                } else $DOE = test_input($_POST["DOE"]);
                //check if the Date of Entry (DOE) contains any characters, numbers or alphanumeric.
//                if (!preg_match("/[a-zA-Z-]*&/",$DOE)){
//                    $DOEErr = "Select correct data";
//              }
           }
                if (empty($_POST["text"])) {
                    $textErr = "Name is missing";
                } else { $text = test_input($_POST["text"]);
                //check name input
            if (!preg_match ("/^[a-zA-Z-' ]*$/",$text)) {
                $textErr = "invalid name, only letters allowed. please check";
                 }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                     // check if e-mail address is well-formed
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                 }
                }

                if (empty($_POST["fn"])) {
                    $fnErr = "First Name is required";
                } else {
                    $fn = test_input($_POST["fn"]);
                }
                if (empty($_POST["birthdaytime"])) {
                    $birthdaytimeErr = "DOB required";
                } else {
                    $birthdaytime = test_input($_POST["birthdaytime"]);
                }
               /* $genderErr = array();
                if(!isset($_POST['gender'])){
                    $genderErr[] = "No radio buttons were checked.";
                } */
                if (empty($_POST["gender"])) {
                    $genderErr = "Gender is required";
                } else {
                    $gender = test_input($_POST["gender"]);
                }

            ?>

            <div></div>
        </nav>
            <!--<form action="PHPAnInputIfElseIfForm.php" method="POST"><br>-->

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<!--                <fieldset>-->
<!--                    <legend>dddddddddddddddddddddddd</legend>-->
<!---->
<!--                </fieldset>-->

                <p><span class ="mistake"> * mandatory fields </span></p>

                <span class="mistake">* <?php echo $DOEErr;?></span>
                <lable for="Title"> Record / Data Captured on </lable>
                <input autofocus type="date" name="DOE">
                <!--<span class="mistake">* <?php echo $DOEErr;?></span>-->


                <label for="name"> Sir Name</label>
                <input  type="text" size="" value="" name="text" placeholder="Type Your Sir Name">
                <span class="mistake">* <?php echo $textErr;?></span>

                <br><br>

                <span class="mistake">* <?php echo $emailErr;?></span>
                <label for="email">Email Address</label>
                <input  type="email" value="" name="email" placeholder="Type Email Address">

                <label for="name1">First Name</label>
                <input class= type="text" value="" name="fn" placeholder="Type Password">
                <span class="mistake">* <?php echo $fnErr;?></span>

                <br><br>

                <span class="mistake">* <?php echo $birthdaytimeErr;?></span>
                <label for="birth day time"> Birthday (date and time):</label>
                <input  type="datetime-local" id="birthdaytime" name="birthdaytime">

                <br><br>

                <div class="row">
                    <span class="mistake">* <?php echo $genderErr;?></span>
                    <label for="gender">Gender</label>
                    <input type="hidden" name="gender" value="0" checked ="checked">
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="other">Other <br>
                    <br>
                    <input type="checkbox" name="Agree">Are you sure the data is correct?
                    <!--<button type="button">Validate</button>-->
                    <br>
                    <br>
                    <input type="submit" value="Check Data">
                    <button type="reset">Clear</button>
                    <br><br>
                    <!--<img src="" alt="">-->
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</html>

<?php
//echo "<br>";
echo "<br>";
echo "-------------------------------------------------------------------------------<br> ";
echo "Record / Data Captured on: $DOE";
//echo "<br>";
echo "<br>";
echo "Sir Name: $text";
//echo "<br>";
echo "<br>";
echo "Email Address : $email";
//echo "<br>";
echo "<br>";
echo "Password: $password";
//echo "<br>";
echo "<br>";
echo "Date of Birth (date and time): $birthdaytime";
//echo "<br>";
echo "<br>";
echo "Gender: $gender";
echo "<br>";
echo "--------------------------------------------------------------------------------------";
?>