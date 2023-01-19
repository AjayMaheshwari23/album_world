<?php

error_reporting(E_ERROR | E_PARSE);
include "../loginsys/partials/_dbconnect.php";

session_start();
if(!$_SESSION['loggedin'])
{
    header("location: http://localhost/proj3/index.php");
    exit();
}else 
{
    $username = $_SESSION['username'];
}
                                
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="_gallery.css" rel="stylesheet">

<style>
/* Animation in cards  */
.col {
    transform: translateX(400%);
    transition: transform 0.9s ease;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 40px -7px;
}

.col:nth-of-type(even) {
    transform: translateX(-400%);
}

.col.show {
    transform: translateX(0%);
}
</style>

<body>
    <header style="position: fixed; z-index: 2; width: 100%; ">
        <?php include '_navabar.php'; ?>
    </header>


    <!-- <main> -->
    <div class="position-relative overflow-hidden p-4 p-md-5  text-center bg-light">
        <div class="col-md-5 p-lg-3 mx-auto my-5 mb-0">
            <h1 class="">Favourite's <svg width="40px" height="40px" viewBox="0 0 36 36"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet">
                    <path fill="#DD2E44"
                        d="M35.885 11.833c0-5.45-4.418-9.868-9.867-9.868c-3.308 0-6.227 1.633-8.018 4.129c-1.791-2.496-4.71-4.129-8.017-4.129c-5.45 0-9.868 4.417-9.868 9.868c0 .772.098 1.52.266 2.241C1.751 22.587 11.216 31.568 18 34.034c6.783-2.466 16.249-11.447 17.617-19.959c.17-.721.268-1.469.268-2.242z">
                    </path>
                </svg></h1>
        </div>
    </div>

    <!--  -->
    <div class="album py-2 bg-light">
        <div class="container2">
            <div class="image-gallery">
                <?php
                        $sql = "SELECT * FROM `cntinfo` WHERE `username` = '$username' ";
                        $result = mysqli_query($conn,$sql); 
                        
                        $filecount=0;
                        $c1 = '' ;
                        $c2 = '' ;
                        $c3 = '' ;
                        
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $imgname = $row['imgname'];;
                            $sql2 = "SELECT * FROM `imageinfo` WHERE `imgname` = '$imgname'";
                            $result2 = mysqli_query($conn,$sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $rows2 = mysqli_num_rows($result2);
                            $imgauthor = "NA"; 
                            if($rows2==1)  { $imgauthor = $row2['imgauthor'];  }
                            // // echo $rows . '<br>';
                            
                            if($row['liked']==true)
                            {
                                $file = $row['imgname'];
                                
                                $cur = ' <div class="image-item">
                                
                                <img src="../Uploaded_images/'.$file.'" class="card-img-top" alt="...">
                                
                                <div class="overlay">
                                
                                <h4 class="card-text"> ' . $file .' </h4>
                                
                                <span>Captured By : '.$imgauthor.  '   </span>
                                
                                </div>
                                </div>';
                                // echo $cur;
                                if($filecount%3==0) $c1 = $c1 . $cur;
                                if($filecount%3==1) $c2 = $c2 . $cur;
                                if($filecount%3==2) $c3= $c3 . $cur;
                                $filecount++;
                                
                            }
                        }
                        echo '<div class="column">'.$c1.'</div>
                        <div class="column">'.$c2.'</div>
                        <div class="column">'.$c3.'</div>'
                    ?>
            </div>
        </div>
    </div>
    <!--  -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // animation in cards
    const boxes = document.querySelectorAll('.col')
    window.addEventListener('scroll', checkboxes)
    checkboxes()

    function checkboxes() {
        const triggerBottom = window.innerHeight / 5 * 4
        boxes.forEach(box => {
            const boxTop = box.getBoundingClientRect().top
            if (boxTop < triggerBottom) {
                box.classList.add('show');
            } else box.classList.remove('show');
        })
    }
    </script>
</body>

</html>