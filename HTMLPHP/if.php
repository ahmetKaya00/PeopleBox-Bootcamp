<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    $isLoggedIn = true;
    $role = 'admin';
?>
    <ul>
        <li><a href="">Anasayfa</a></li>
        <li><a href="">Ürünler</a></li>
        <?php
            if(!$isLoggedIn):?>
                <li><a href="">Giriş</a></li>
                <li><a href="">Kayıt Ol</a></li>
            <?php else:?>
                <li><a href="">Hesabım</a></li>
        <?php endif;?>

        <?php if($isLoggedIn and $role == 'admin'):?>
        <li><a href="">Yönetim Paneli</a></li>
        <?php endif;?>
    </ul>
</body>
</html>