<?php
        function filmEkle(&$filmler,string $baslik,string $aciklama,string $resim,int $yorumSayisi = 0,int $begeniSayisi = 0,bool $vizyon = false, $url = "demo"){
            $new_item[count($filmler) + 1] = array(
                "baslik" => $baslik,
                "aciklama" => $aciklama,
                "resim" => $resim,
                "yorumSayisi" => $yorumSayisi,
                "begeniSayisi" => $begeniSayisi,
                "vizyon" => $vizyon,
                "url" => $url
            );

            $filmler = array_merge($filmler, $new_item);
        }

?>