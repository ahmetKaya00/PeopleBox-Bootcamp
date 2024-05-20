<?php
$myfile = fopen("dosya.txt","r");
$size = filesize("dosya.txt");

//echo fread($myfile,$size);


echo fgets($myfile);
echo fgets($myfile);
echo fgets($myfile);
echo fgets($myfile);

while(!feof($myfile)){
    echo fgets($myfile)."<br>";
}

fclose($myfile);

?>