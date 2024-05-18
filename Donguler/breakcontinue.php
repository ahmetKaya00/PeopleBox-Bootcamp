<?php
    for($i = 0; $i < 10; $i++){
        if($i == 5){
            break;
        }
        if($i % 2 == 0){
            continue;
        }
        echo "Bu satır $i kez yazdırıldı.<br>";
    }

    for($i = 0; $i < 10; $i++){
        if($i == 5){
            break;
        }
        echo "Bu satır $i kez yazdırıldı.<br>";
    }
?>