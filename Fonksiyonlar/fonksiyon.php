<?php

    // function selamVer(){
    //     echo "merhaba";
    // }

    // selamVer();

    // function topla($a,$b){
    //     return $a + $b;
    // }

    // $sonuc = topla(5,3);
    // echo $sonuc;

    // function selamVer($isim){
    //     echo "Merhaba $isim";
    // }

    // selamVer("Ahmet");

    // function selamVer($isim = "Misafir"){
    //     echo "Merhaba $isim";
    // }

    // selamVer();
    // selamVer("Ahmet");

    // function toplama(){
    //     $toplam = 0;
    //     foreach(func_get_args() as $sayi){
    //         $toplam += $sayi;
    //     }
    //     return $toplam;
    // }

    // echo toplama(1,5);

    // $globalDegisken = 10;

    // function ornek(){
    //     global $globalDegisken;
    //     echo $globalDegisken;
    // }

    // ornek();

    // function sayiyiArttir(&$sayi){
    //     $sayi++;
    // }

    //  $ahmet = 5;   
    //  sayiyiArttir($ahmet);
    //  echo $ahmet;

    // function ornek(){
    //     $parametreSayisi = func_num_args();
    //     echo "Gönderilen parametre sayısı: $parametreSayisi<br>";
    //     for($i = 0; $i < $parametreSayisi; $i++){
    //         echo "Parametre $i: " . func_get_arg($i). "<br>";
    //     }
    // }

    // ornek("Bir","iki","üc");
    // ornek(1,2,3);
    // ornek();

    function toplama(int $a, int $b){
        return $a+$b;
    }
    echo toplama(3, 2);

?>