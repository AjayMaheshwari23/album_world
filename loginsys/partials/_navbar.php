<?php
$loginbtn = false;
$signupbtn = false;
$logoutbtn = false;
$homebtn = false;

// session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    $loginbtn = true;
    $signupbtn = true;
    $logoutbtn = false;
    $homebtn = false; 
}else if($_SESSION['loggedin']==true)
{
    $loginbtn = false;
    $signupbtn = false;
    $logoutbtn = true;
    $homebtn = true; 
}else
{
    
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/loginout">iSecure</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/loginout/welcome.php">Home</a>
                </li>
                <?php
                   if($loginbtn)
                   {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="/loginout/login.php">Login</a>
                    </li>';
                   }
                ?> <?php
                if($signupbtn)
                {
                 echo '<li class="nav-item">
                 <a class="nav-link" href="/loginout/signup.php">SignUp</a>
             </li>';
                }
             ?>
                <?php
             if($logoutbtn)
             {
              echo '<li class="nav-item">
              <a class="nav-link" href="/loginout/logout.php">logout</a>
          </li>';
             }
          ?>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>