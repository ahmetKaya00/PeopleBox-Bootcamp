<?php

    if(isset($_POST["btnUpload"]) && $_POST["btnUpload"]=="Upload"){

        $uploadOk = 1;
        $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"];
        $fileName = $_FILES["fileToUpload"]["name"];
        $dosya_uzantilari = array('jpg','jpeg','png');



        if(empty($fileName)){
            echo "dosya seçiniz";
            $uploadOk = 0;
            
        }

        $fileSize = $_FILES["fileToUpload"]["size"];
        if($fileSize > 500000){
            echo "Dosya boyutu 500KB den az olmalı";
            $uploadOk = 0;
        }

        $dosyaAdi_Arr = pathinfo($fileName);
        $dosyaAdi_uzantisiz = $dosyaAdi_Arr['filename'];
        $dosya_uzantisi = isset($dosyaAdi_Arr['extension']) ? $dosyaAdi_Arr['extension'] : '';

        if(!in_array($dosya_uzantisi,$dosya_uzantilari)){
            echo "dosya uzantisi kabul edilmiyor. <br>";
            echo "'jpg','jpeg','png' uzantili dosya tükleyiniz. <br>";
            $uploadOk = 0;
        }

        $yeni_DosyaAdi = md5(time().$dosyaAdi_uzantisiz).'.'.$dosya_uzantisi;

        $uploadFolder = './files/';
        $dest_path = $uploadFolder.$yeni_DosyaAdi;

        if($uploadOk == 0){
            echo "Dosya Yüklenmedi.";
        }else{
            if(move_uploaded_file($fileTmpPath,$dest_path)){
                echo "dosya yüklendi";
            }else{
                echo "hata";
            }
        }

        
    }

?>