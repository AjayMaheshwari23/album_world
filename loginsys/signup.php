<?php

include "partials/_dbconnect.php";

$loginpage = "http://localhost/proj3/index.php";
$homepage = "#";
$redirectindex = "http://localhost/proj3/index.php";

$alreadyexist = false;
$notmatched = false;
$someerror = false;

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $username = $_POST['username'];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
    $Name = $_POST["Name"];
    // $tme  = date("Y-m-d h:i:sa");
    $sql = "SELECT * FROM `userinfo` WHERE `username` = '$username' ";
    $result = mysqli_query($conn,$sql); $rows = mysqli_num_rows($result);
    if($password==$cpassword && $rows==0 && $Name!="" &&  $email!="")
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $ins = "INSERT INTO `userinfo` ( `username`, `password` , `email`, `Name` ) VALUES ( '$username', '$password' , '$email' , '$Name');" ;
        $res = mysqli_query($conn,$ins);
        // $GLOBALS['nayalogin'] = true;
        // echo "DOne registered !<br>";
      header("location: $redirectindex");
    }else if($password!=$cpassword) $notmatched = true;
    else if( $rows!=0) $alreadyexist = true;
    else $someerror = true;
}
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

<style>
body {
    font-family: 'Sofia';
    font-size: 30px;
    color: black;
}

.heading {
    font-size: 30px;
}

.bgvideo {
    z-index=-1;
    position: fixed;
    right: -130px;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
}

.zidx {
    z-index: 2;
    position: relative;
}

.navbr {
    color: black;
    position: relative;
    z-index: 1;
    min-width: 100%;
}

/* 
form {
    width: fit-content;
    float: right;
} */

.frm {
    position: sticky;
    z-index: 2;
    align-items: center;
    min-width: 100%;
    /* display: block; */

    /* margin-top: 50%; */
}

.frmcnt {
    display: flex;
    align-items: center;
    flex-direction: column;
    /* flex-direction: row-reverse; */
}

.navbar-light .navbar-nav .nav-link {
    color: black;
}

.zidx {
    z-index: 2;
    position: relative;
}

.btn {
    margin-top: 52px;
}

form {
    display: -webkit-box;
}

.formbais {
    flex-basis: 50%;
    margin: 8px 8px 8px 8px;
}

.blk {
    display: block;
}

@media only screen and (max-width: 600px) {
    form {
        display: block;
    }

}
</style>

<body>
    <div class="container">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light navbr">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2"
                    viewBox="0 0 24 24">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                    <circle cx="12" cy="13" r="4" />
                </svg>
                <a class="navbar-brand heading mx-4" href="<?php $homepage ?>">Album World</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 m-2">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/proj3/index.php"> Already Registered ? Login</a>
                        </li>
                        <!-- <li class=" nav-item">
                                <a class="nav-link" href="/proj3/loginsys/signup.php">SignUp</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Alerts  -->
        <!-- Alerts -->
        <?php
    
    if($alreadyexist)
    {
        echo '<div class="my--5 alert alert-danger alert-dismissible fade show zidx" role="alert">
        <strong>Error!</strong> Username already exists ! 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else if($notmatched)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show zidx" role="alert">
        <strong>Error!</strong> Confirm Password does not match with password .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }else if($someerror)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show zidx" role="alert">
        <strong>Error!</strong> Unable to Register .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'; 
    }

    ?>
        <!-- FORM -->
        <div class="container my-5 frmcnt">
            <form method="post" action="/proj3/loginsys/signup.php">
                <div class="formbais">
                    <div class="mb-3 frm">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 frm">
                        <label for="password" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name">
                    </div>
                    <div class="mb-3 frm">
                        <label for="password" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="formbais">
                    <div class="mb-3 frm">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 frm">
                        <label for="password" class="form-label">Cnf Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <button type="submit" class="btn btn-primary frm">Register</button>
            </form>
        </div>
        <!-- FORM -->
    </div>
    <video autoplay loop muted plays-inline class="bgvideo">
        <source src="../assets/videos/bg_video1.mp4" type="video/mp4">
    </video>
</body>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</html>