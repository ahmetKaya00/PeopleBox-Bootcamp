<?php

    include "ayar.php";

    $query = "SELECT id,title,description FROM blogs";

    $result = mysqli_query($baglan,$query);

    while($row = mysqli_fetch_row($result)){
        echo $row[0]." ".$row[1]." ".$row[2];
        echo "<br>";
    }

    echo "<hr>";

    $result = mysqli_query($baglan,$query);

    while($row = mysqli_fetch_assoc($result)){
        echo $row["id"]." ".$row["description"];
        echo "<br>";
    }

    mysqli_close($baglan);


?>