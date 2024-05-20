<?php

if (isset($_POST["btnUpload"]) && $_POST["btnUpload"] == "Upload") {

    $dosya_adeti = count($_FILES["fileToUpload"]["name"]);
    $maxFileSize = (1024 * 1024) * 1;
    $fileTypes = array(
        "image/jpg",
        "image/jpeg",
        "image/png",
    );

    if ($dosya_adeti > 3) {
        die("en fazla 3 dosya yükleyebilirsiniz.");
    }

    for ($x = 0; $x < $dosya_adeti; $x++) {
        $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"][$x];
        $fileName = $_FILES["fileToUpload"]["name"][$x];
        $fileSize = $_FILES["fileToUpload"]["size"][$x];
        $fileType = $_FILES["fileToUpload"]["type"][$x];

        if (in_array($fileType, $fileTypes)) {

            if ($fileSize > $maxFileSize) {
                echo "dosyanın boyutu 1mb olabilir.";
            } else {
                $dosyaAdi_Arr = pathinfo($fileName);
                $dosyaAdi_uzantisiz = $dosyaAdi_Arr['filename'];
                $dosya_uzantisi = isset($dosyaAdi_Arr['extension']) ? $dosyaAdi_Arr['extension'] : '';
               
                $yeni_DosyaAdi = md5(time() . $dosyaAdi_uzantisiz) . '.' . $dosya_uzantisi;

                $uploadFolder = './images/';
                $dest_path = $uploadFolder . $yeni_DosyaAdi;

                $dest_path = "images/" . $yeni_DosyaAdi;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    echo $fileName . " dosyası yüklendi.";
                } else {
                    echo $fileName . " dosyası yüklenemedi.";
                }
            }
        } else {
            echo "dosya uzantisi kabul edilmiyor. <br>";
            echo "kabul edilen dosya tipleri: " . implode(", ", $fileTypes);
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
    <form action="multi-upload-filter.php" method="POST" enctype="multipart/form-data">
        <input type="file" multiple="multiple" name="fileToUpload[]">
        <input type="submit" value="Upload" name="btnUpload">
    </form>
</body>

</html>