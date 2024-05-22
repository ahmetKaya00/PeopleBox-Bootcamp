<?php
    $ozet = count($kategoriler).' kategoride '.count(filmleriGetir()).'  film listelenmiştir';
?>

<h1 class="mb-4"><?php echo baslik?></h1>
<p class="text-muted">
    <?php echo $ozet?>
</p>