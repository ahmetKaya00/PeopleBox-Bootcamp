<?php

    $sayilar = array(1,5,7,4,64,72,7,53);
    $isimler = array("ahmet","mehmet","ayşe","fatma");
    $kullanicilar = array("ahmetkaya"=>"15","melahatakın"=>"4","fıratısıldak"=>"12");

    // echo count($sayilar);
    // array_push($sayilar,4,5);
    // print_r($sayilar);

    // $eleman  = array_pop($sayilar);
    // $eleman1  = array_shift($sayilar);
    // array_unshift($sayilar,15);

    // $mergeDizi = array_merge($sayilar,$isimler);
    //print_r($mergeDizi);

    $indeks = array_search("ayşe",$isimler);
    echo $indeks;
    


?>