<?php

    include "ayar.php";

    $query = "DELETE from blogs WHERE id=1";

    $result = mysqli_query($baglan,$query);

    if($result){
        echo "veri silindi.";
    }else{
        echo "Silme aşamasında hata oluştu";
    }

?>