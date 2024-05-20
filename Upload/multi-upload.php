<?php

    if(isset($_POST["btnUpload"]) && $_POST["btnUpload"] == "Upload"){
       
        $dosya_adeti = count($_FILES["fileToUpload"]["name"]);

        for($x=0;$x<$dosya_adeti;$x++){
            $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"][$x];
            $fileName = $_FILES["fileToUpload"]["name"][$x];

            $dest_path = "images/".$fileName;

            if(move_uploaded_file($fileTmpPath,$dest_path)){
                echo $fileName." dosyası yüklendi.";
            }else{
                echo $fileName." dosyası yüklenemedi.";
            }

        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="multi-upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" multiple="multiple" name="fileToUpload[]">
        <input type="submit" value="Upload" name="btnUpload">
    </form>
</body>
</html>