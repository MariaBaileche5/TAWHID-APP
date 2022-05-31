<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200&family=Oleo+Script+Swash+Caps&family=Tapestry&display=swap" rel="stylesheet">
    <title>Upload video</title>
    <link rel="stylesheet" href="main.css">
    <?php
    include('config.php');
    $subject='';
    $title='';
    if(isset($_POST['subject'])){
        $subject = $_POST['subject'];
    }
    if(isset($_POST['title'])){
        $title = $_POST['title'];
    }
    if(isset($_POST['btn_upload'])){
        $maxsize = 8589934592;
        $name = $_FILES['file']['name'];
        $target_file ='videos/' . $name;
        $location= $target_file;
        $videoFileType= strrchr($name,".");
        $extension_arr = array ('.mp4','.mpeg','.avi','.3gp') ;
        if(in_array($videoFileType,$extension_arr)){
            if((($_FILES['file']['size'] >= $maxsize )) || ($_FILES['file']['size'] ==0)){
                echo "<center><h4 class='failed'> لا يمكن تحميل الملف فحجمه يتجاوز 1 جيغا بايت</h4></center>";
            }else{
              if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                $query = "INSERT INTO `videos`( `name`, `location`, `subject`, `title`) VALUES ('".$name."','".$location."','$subject','$title') ";
                mysqli_query($con,$query);
                echo "<center><h4 class='success'>تم رفع الفيديو </h4></center>";
              }  
      
            }
          
        } else{
            echo "<center><h3 class='choose'>رجاء قم بتحديد الملف</h3></center>";
        }
    }
    ?>
    </head>
<body>
    <div class="container">
        <center>
            <img src="images/logo.jpg" >
        </center>
        <form  method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <br>
            <input type="text" name="subject" id="subject" placeholder=" وصف الفيديو" >
            <br>
            <input type="text" name="title" id="title" placeholder="عنوان الفيديو" >
            <br>
            <input type="submit" value="رفع الفيديو" name="btn_upload">
            <br>
            <a href="http://localhost:8080/app/readvideos.php#" name="linko">العودة للتطبيق</a>
        </form>
    </div>
</body>
</html>