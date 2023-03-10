<?php

$redirecttohome =  "http://localhost/proj3/Homepage/homepage.php";
$logoutpg = "http://localhost/proj3/loginsys/logout.php";

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a href='.$redirecttohome.' class="navbar-brand d-flex align-items-center p-1">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
      stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2"
      viewBox="0 0 24 24">
      <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
      <circle cx="12" cy="13" r="4" />
  </svg>
  <strong>Album World</strong>
</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../components/favourite.php">Favourite</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../components/downloads.php">Downloads</a>
      </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">SecureBox</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href='.$logoutpg.'>Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>';

?>