<?php
include_once('baglanti.php');


    $sql = "SELECT * from products";
    $result = $pdo->query($sql);

    // while($row = $result->fetch()){
    //     echo $row["title"]."<br>";
    // }
    // while($row = $result->fetch()){
    //     echo $row->title."<br>";
    // }
    

    // $productID = 1;
    // $sql = "SELECT * from products where id=?";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$productID]);
    // $urunler = $stmt->fetchAll();

    // foreach($urunler as $urun){
    //     echo $urun->title."<br>";
    // }

    // $title = "İphone 6";
    // $price = 25000;
    // $description = "eski telefon";

    // $sql = "INSERT INTO products(title,price,description) VALUES (?,?,?)";

    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$title,$price,$description]);

    // echo "kayıt yapıldı";

    // $title = "İphone 6";
    // $price = 25000;
    // $description = "eski telefon";

    // $sql = "INSERT INTO products(title,price,description) VALUES (:title,:price,:description)";
    // $stmt = $pdo->prepare($sql);

    // $stmt->bindParam(':title',$title);
    // $stmt->bindParam(':price',$price);
    // $stmt->bindParam(':description',$description);

    // $stmt -> execute();

    // $title = "İphone 6";
    // $price = 25000;
    // $description = "eski telefon";


    // $stmt -> execute();
    
        // $id = 1;
        // $title = "güncelleme";

        // $sql = "UPDATE products set title=:title where id=:id";
        // $stmt = $pdo->prepare($sql);
        // $stmt-> execute(['id'=>$id, 'title'=>$title]);

        // echo "güncellendi: ".$stmt->rowCount();

?>