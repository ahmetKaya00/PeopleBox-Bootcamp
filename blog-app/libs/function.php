<?php
        function filmEkle(string $baslik,string $aciklama,string $resim,int $yorumSayisi = 0,int $begeniSayisi = 0,bool $vizyon = false, $url = "demo"){
            $new_item[count($_SESSION["filmler"]) + 1] = array(
                "baslik" => $baslik,
                "aciklama" => $aciklama,
                "resim" => $resim,
                "yorumSayisi" => $yorumSayisi,
                "begeniSayisi" => $begeniSayisi,
                "vizyon" => $vizyon,
                "url" => $url
            );

            $_SESSION["filmler"] = array_merge($_SESSION["filmler"], $new_item);
        }

?>