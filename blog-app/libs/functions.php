<?php

function getData(){
    $myfile = fopen("db.json","r");
    $size = filesize("db.json");

    $result = json_decode(fread($myfile, $size), true);
    fclose($myfile);

    return $result;
}
 function createUser(string $name,string $username,string $email,string $password){
    $db = getData();

    array_push($db["users"], array(
        "id" => count($db["users"]) + 1,
        "username" => $username,
        "password" => $password,
        "name" => $name,
        "email" => $email
    ));

    $myfile = fopen("db.json","w");
    fwrite($myfile, json_encode($db, JSON_PRETTY_PRINT));
    fclose($myfile);

 }

function getUser(string $username){
    $users = getData()["users"];

    foreach($users as $user){
        if($user["username"] == $username){
            return $user;
        }
    }
    return null;
}



function filmEkle(string $baslik, string $aciklama, string $resim,string $url, int $yorumSayisi=0,int $begeniSayisi=0,bool $vizyon=false) {
    $myfile = fopen("veriler.txt","a");
    $icerik = $baslik.'|'.$aciklama.'|'.$resim.'|'.$url.'|'.$yorumSayisi.'|'.$begeniSayisi.'|'.(int)$vizyon;
    fwrite($myfile,$icerik."\n");
    fclose($myfile);
}

function kisaAciklama($aciklama, $limit) {
    if (strlen($aciklama) > $limit) {
        echo substr($aciklama,0,$limit)."...";
    } else {
        echo $aciklama;
    };
}
?>