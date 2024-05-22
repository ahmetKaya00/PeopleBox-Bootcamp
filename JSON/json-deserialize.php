<?php

    $jsonString = '{
        "firstName" : "Ahmet",
        "lastName" : "Kaya",
        "hobbies" : ["basketbol","Konsol"],
        "age" : 37,
        "children": [
            {
                "firstName" : "Ahmet",
                "age" : 4
            }
        ]
    }';

    // echo $jsonString;
    // echo "<br>";
    // echo gettype($jsonString);
    //echo $jsonString["firstName"];

    $jsonArr = json_decode($jsonString,true);
    echo "<pre>";
    print_r($jsonArr);
    echo "<pre>";
    
    echo $jsonArr["firstName"];
    echo $jsonArr["hobbies"][0];
    echo $jsonArr["children"][0]["firstName"];

    $myfile = fopen("person.json","r");
    $size = filesize("person.json");

    $jsonData = json_decode(fread($myfile,$size),true);
    echo $jsonData["lastName"];
?>