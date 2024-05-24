<?php

    include "ayar.php";

    $query = "SELECT * FROM blogs WHERE title like '%1%'";

    $result = mysqli_query($baglan,$query);

    while($row = mysqli_fetch_assoc($result)){
        echo $row["id"]." ".$row["description"];
        echo "<br>";
    }

    mysqli_close($baglan);


?>