<?php

    include "ayar.php";

    $query = "UPDATE blogs SET title='update.',description='update' WHERE id = 1";

    $result = mysqli_query($baglan,$query);

    if($result){
        echo "Veri güncellendi.";
    }else{
        echo "Kayıt güncelleme hatası";
    }


    mysqli_close($baglan);
?>