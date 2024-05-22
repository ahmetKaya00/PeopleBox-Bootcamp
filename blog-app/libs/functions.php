<?php

function filmEkle(string $baslik, string $aciklama, string $resim,string $url, int $yorumSayisi=0,int $begeniSayisi=0,bool $vizyon=false) {
    $myfile = fopen("veriler.txt","a");
    $icerik = $baslik.'|'.$aciklama.'|'.$resim.'|'.$url.'|'.$yorumSayisi.'|'.$begeniSayisi.'|'.(int)$vizyon;
    fwrite($myfile,$icerik."\n");
    fclose($myfile);
}

function filmleriGetir() {
    $myfile = fopen("veriler.txt","r");
    $liste = [];

    while (($satir = fgets($myfile)) !== false) {
        $dilimler = explode("|", $satir);

        array_push($liste, array(
            "baslik" => $dilimler[0],
            "aciklama" => $dilimler[1],
            "resim" => $dilimler[2],
            "url" => $dilimler[3],
            "yorumSayisi" => $dilimler[4],
            "begeniSayisi" => $dilimler[5],
            "vizyon" => $dilimler[6]
        ));
    }
    fclose($myfile);
    return $liste;
}

function kisaAciklama($aciklama, $limit) {
    if (strlen($aciklama) > $limit) {
        echo substr($aciklama,0,$limit)."...";
    } else {
        echo $aciklama;
    };
}
?>