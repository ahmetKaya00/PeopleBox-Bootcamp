<?php 
    $gun = "Salı";

    switch($gun){
        case "Pazartesi":
        case "Salı":
        case "Çarşamba":
        case "Perşembe":
        case "Cuma":
            echo "Hafta İçi";
            break;
        case "Cumartesi":
        case "Pazar":
            echo "Hafta Sonu";
            break;
        default:
            echo "Geçersiz veri";
    }
?>