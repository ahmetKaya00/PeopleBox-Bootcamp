<?php

    function dosya_kayit($dosya,$urunAdi,$fiyat){
        $myfile = fopen($dosya,"a");
        $icerik = $urunAdi.'|'.$fiyat;
        fwrite($myfile,$icerik."\n");
        fclose($myfile);
    }

    function dosya_oku($dosya){
        $myfile = fopen($dosya,"r");
        $liste = [];

        while(($satir = fgets($myfile)) !== false){
            $dilimler = explode("|", $satir);
            array_push($liste, [$dilimler[0],$dilimler[1]]);
        }

        fclose($myfile);
        return $liste;
    }

    dosya_kayit("products.txt","iphone 8","45000");
    dosya_kayit("products.txt","iphone 15","45000");
    dosya_kayit("products.txt","iphone 15","45000");

    $icerik = dosya_oku("products.txt");
    foreach($icerik as $satir){
        echo"isim: ".$satir[0]." fiyat: ".$satir[1]."<br>";
    }
?>