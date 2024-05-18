<?php

    // $mesaj = 'Ben Yazılım eğitmeniyim. Adım Ahmet Kaya\'dır';

    $ad = "Ahmet";
    $soyad = "Kaya";
    $yil = 10;

    //  $mesaj = "Ben Yazılım eğitmeniyim. Adım {$ad} {$soyad}'dır. {$yil} yıldır yazılımcı olarak çalışıyorum";

    $mesaj = "ben yazılım eğitmeniyim.".$ad." ".$soyad." ".$yil." yıldır yazılımcı olarak Ahmet çalışıyorum";


    
    echo $mesaj."<br>" ;
    echo $mesaj[0]."<br>" ;
    echo $mesaj[4]."<br>" ;
    echo $mesaj[3]."<br>" ;

    echo strlen($mesaj)."<br>" ; //karakter sayısı
    echo str_word_count($mesaj)."<br>" ;
    echo str_word_count($mesaj)."<br>" ;
    echo strtolower($mesaj)."<br>" ;
    echo strtoupper($mesaj)."<br>" ;
    echo ucfirst($mesaj)."<br>" ;
    echo str_replace("Ahmet","Ahmet Can",$mesaj)."<br>" ;
    echo str_replace(["Ahmet","Kaya"],["Ahmet Can","Kayalar"],$mesaj)."<br>" ;

?>