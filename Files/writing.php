<?php

$myfile = fopen("dosya2.txt","a+");


$str = "Ahmet Kaya\n";
fwrite($myfile,$str);


//echo fread($myfile,$size);

while(!feof($myfile)){
    echo fgets($myfile)."<br>";
}
fclose($myfile);

?>