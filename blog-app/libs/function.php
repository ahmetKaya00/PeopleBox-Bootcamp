<?php
        function filmEkle(string $baslik,string $aciklama,string $resim,string $url,int $yorumSayisi = 0,int $begeniSayisi = 0,bool $vizyon = false){
            $myfile = fopen("veriler.txt","a");
            $icerik = $baslik.'|'.$aciklama.'|'.$resim.'|'.$url.'|'.$yorumSayisi.'|'.$begeniSayisi.'|'.$vizyon;
            fwrite($myfile,$icerik."\n");
            fclose($myfile);
        }

?>