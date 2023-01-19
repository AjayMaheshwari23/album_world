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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h1 class="">Downloads's&nbsp;<svg fill="#000000" width="50px" height="50px" viewBox="0 0 24 24"
                    id="download-alt-4" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg"
                    class="icon flat-color">
                    <path id="secondary"
                        d="M16.71,11.29a1,1,0,0,0-1.42,0L13,13.59V3a1,1,0,0,0-2,0V13.59l-2.29-2.3a1,1,0,1,0-1.42,1.42l4,4a1,1,0,0,0,1.42,0l4-4A1,1,0,0,0,16.71,11.29Z"
                        style="fill: rgb(44, 169, 188);"></path>
                    <path id="primary"
                        d="M18.86,22H5.14A2.08,2.08,0,0,1,3,20V16a1,1,0,0,1,2,0v4s.06,0,.14,0H18.86A.22.22,0,0,0,19,20V16a1,1,0,0,1,2,0v4A2.08,2.08,0,0,1,18.86,22Z"
                        style="fill: rgb(0, 0, 0);"></path>
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
                            
                            if($row['downloaded']==true)
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