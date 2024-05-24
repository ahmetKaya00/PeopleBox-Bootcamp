<?php

    include "ayar.php";

    $query = "INSERT INTO blogs(title,description,image,url,isActive) VALUES ('Film 8','Film 8 açıklaması','3.jpeg','film-8',1);";
    // $query .= "INSERT INTO blogs(title,description,image,url,isActive) VALUES ('Film 6','Film 6 açıklaması','3.jpeg','film-6',1);";
    // $query .= "INSERT INTO blogs(title,description,image,url,isActive) VALUES ('Film 7','Film 7 açıklaması','3.jpeg','film-7',1);";

    // $sonuc = mysqli_multi_query($baglan,$query);
    $sonuc = mysqli_query($baglan,$query);
    $lastid = mysqli_insert_id($baglan);

    if($sonuc){
        echo "Kayıt eklendi id: ".$lastid;
    }else{
        echo "Kayıt eklenemedi";
    }


?>