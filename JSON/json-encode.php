<?php

    $urunler = array("iphone 15","iphone 16", "iphone 17");

    echo gettype($urunler);
    echo "<br>";
    echo $urunler[0];

    $jsonString = json_encode($urunler);
    echo gettype($jsonString);
    echo $jsonString;

    $myfile = fopen("urunler.json","w");
    fwrite($myfile,$jsonString);
    fclose($myfile);

    $user = array(
        "username" => "ahmetkaya",
        "password" => "123456",
        "name" => "Ahmet Kaya"
    );

    $jsonUser = json_encode($user);

    $myfile = fopen("user.json","w");
    fwrite($myfile,$jsonUser);
    fclose($myfile);



?>