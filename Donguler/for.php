<?php

    for($i = 0; $i<10; $i++){
        echo "Bu satır $i kez yazıldı.<br>";
    }

    $dizi = array("Elma","Armut","Çilek");
    foreach($dizi as $meyve){
        echo "Meyve: $meyve<br>";
    }

    $yaslar = array("Ali" => 25, "Ayşe" => 30, "Ahmet" =>35);
    foreach($yaslar as $isim => $yas){
        echo "$isim, $yas yaşındadır.<br>";
    }

    
?>