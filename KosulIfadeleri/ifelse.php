<?php

    // $sayi1 = 5;
    // $sayi2 = 3;
    // if($sayi1 < $sayi2){
    //     echo "dogru";
    // }
    // else{
    //     echo "yanlış";
    // }

    // $puan = 69;

    // if($puan >= 90){
    //     echo "Aldığınız not: A";
    // }elseif($puan >= 80){
    //     echo "Aldığınız not: B";
    // }elseif($puan >= 70){
    //     echo "Aldığınız not: C";
    // }
    // else{
    //     echo "Aldığınız not: F";
    // }

    $sicaklik = 25;
    $nem = 60;

    if($sicaklik > 20 and $nem < 70){
        echo "Hava sıcak ve nem düşük";
    }elseif($sicaklik > 20 or $nem <70){
        echo "Ya hava sıcak ya da nem düşük";
    }else{
        echo "Hava sıcak değil ve nem yüksek";
    }
?>