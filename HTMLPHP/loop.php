<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .green{
            background-color: green;
            color: white;
        }
        .red{
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <ul>
        <?php for($i=0; $i<10;$i++):?>
            <li>item <?php echo $i ?></li>
        <?php endfor;?>
    </ul>

     <?php

        $urunler = [
            ["Iphone 15",85000,false],
            ["Iphone 15 Pro Max",95000,true],
            ["Iphone 15 Pro",90000,false],
        ];  
     ?>

     <table>
        <tr>
            <th>Ürün Adı</th>
            <th>Fiyatı</th>
            <th>Durum</th>
        </tr>
        <?php foreach($urunler as $urun):?>
            <tr class=<?php if($urun[2]){echo 'green';} else {echo 'red';}?>>
                <?php foreach($urun as $detay):?>
                    <td><?php echo $detay; ?></td>
                    <?php endforeach; ?>
            </tr>
            <?php endforeach;?>
     </table>
</body>
</html>