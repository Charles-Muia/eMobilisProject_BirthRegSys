<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="123.css">
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->
    <title>LogIn</title>
    </head>
        <body>
            <header>
                <a class="header-brand" href="">State </a>
                 <nav class="">
                          <a class=""href="index1.php">
                                <img class="nav" src="ProjectImages/NCCjpg.png" alt="logo"></a>
            <ul>
                <img class="nav" src="ProjectImages/NCCjpg.png" alt="logo">
            <li><a href="index1.php">Home</a></li>
            <li><a href="#">About</a></li>
<!--            <li><a href="#">Log In</a></li>-->
            <li><a href="#">Contact</a></li>
            <li><a href="#">FAQ</a> </li>
        </ul>
<!--            <a class="menu" href="index.php">Home</a>-->
<!--            <a href="#">About</a>-->
<!--            <a href="#">Portfolio</a>-->
<!--            <a href="#">FAQ</a>-->
<!--            <a href="#">Log In</a>-->
        <div class=>
            <!--form for Sign In / Log In-->
    <form action="System/login.php" method="post">
                <input type=text name="uemail" placeholder="Enter Your Username">
                <input type="email" name="uemail" placeholder="Enter Your Email Address">
                <input type="password" name="upswd" placeholder="Enter Your Password">
                <input type="password" name="cupswd" placeholder="Confirm Your Password">
                <button type="submit" name="login">Log In</button>
    </form>
            <a href="signup.php"> Register / Signup</a>
            <!--form for Sign out / log out-->
                <form action="System/logout.php"name="SignOut" method="post">
                        <button type="submit" name="logout">Log Out</button>
                    </form>
                </div>
            </nav>
        </header>
    </body>
</html>
