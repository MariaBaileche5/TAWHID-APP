<?php
    include('config.php');
?>     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap" rel="stylesheet">
    <title>Tawhid app</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="app-vedio">
    <?php
    $fetchAllVideos = mysqli_query($con,"SELECT * FROM videos ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($fetchAllVideos)) {
        $location = $row['location']; 
        $subject = $row['subject']; 
        $title = $row['title'];  
      
     echo '<div class="vedio">';
     echo '<video src="'.$location.'" class="vedio-player"></video>';
     echo '<div class="footer">';
     echo'<div class="footer-text">';
     echo '<p class="description">'.$title.'</p>';
     echo'<div class="img-marq">';
     echo '<a href="http://localhost:8080/app/upload.php"><img src="images/up.png" ></a>';
     echo '<marquee direction="right">'.$subject.'</marquee>';
     echo  '</div>';
     echo '</div>';
     echo'<img src="images/play.png"  class="image-play">';
     echo '</div>';
     echo '</div>';
    }

    ?>   
    </div>
    <script>
        const vedios = document.querySelectorAll('video');
        for(const video of vedios){
            video.addEventListener('click', function(){
                if(video.paused){
                    video.play();
                }else{
                    video.pause();
                }
            })
        }
    </script>
</body>
</html>
