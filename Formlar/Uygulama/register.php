<?php
    $adsoyad = $email = $password = $password2 = $sehir = $cinsiyet = $tanitim = ""; $hobi = [];
    $adsoyadErr = $emailErr = $passwordErr = $password2Err = $sehirErr = $cinsiyetErr = $tanitimErr = ""; $hobiErr = "";

    function control_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")

        if(empty($_POST['adsoyad'])){
            $adsoyadErr = "adsoyad zorunlu alan";
        }else{
            $adsoyad = control_input($_POST['adsoyad']);
        }
        if(empty($_POST['email'])){
            $emailErr =  "email zorunlu alan";
        }else{
            $email = $_POST['email'];
        }
        if(empty($_POST['password'])){
            $passwordErr = "password zorunlu alan";
        }else{
            $password = $_POST['password'];
        }
        if($password != $password2){
            $password2Err ="parolalar eşleşmiyor";
        }
        if(empty($_POST['sehir'])){
            $sehirErr ="sehir tekrar zorunlu alan";
        }else{
            $sehir = $_POST['sehir'];
        }
        if(empty($_POST['cinsiyet'])){
            $cinsiyetErr = "cinsiyet tekrar zorunlu alan";
        }else{
            $cinsiyet = $_POST['cinsiyet'];
        }
        if(!isset($_POST['hobi'])){
            $hobiErr = "hobi tekrar zorunlu alan";
        }else{
            $hobi = $_POST['hobi'];
        }
        if(empty($_POST['tanitim'])){
            $tanitimErr = "tanitim tekrar zorunlu alan";
        }else{
            $tanitim = $_POST['tanitim'];
        }





?>


<form action="register.php" method="POST">
    adınız: <input type="text" name="adsoyad" value="<?php echo $adsoyad;?>"><?php echo $adsoyadErr;?><br><br>
    email: <input type="text" name="email"><?php echo $emailErr;?><br><br>
    parola: <input type="text" name="password"><?php echo $passwordErr;?><br><br>
    parola tekrar: <input type="text" name="password2"><?php echo $password2Err;?><br><br>
    şehir: <select name="sehir">
        <option value="33" <?php if($sehir=="33") echo "selected"?>>Mersin</option>
        <option value="34"<?php if($sehir=="34") echo "selected"?>>İstanbul</option>
        <option value="35"<?php if($sehir=="35") echo "selected"?>>İzmir</option>
    </select><?php echo $sehirErr;?><br><br>
    cinsiyet: Erkek <input type="radio" name="cinsiyet" value="erkek"<?php if($cinsiyet=="erkek") echo "checked";?>>
              Kadın <input type="radio" name="cinsiyet" value="kadın"<?php if($cinsiyet=="kadın") echo "checked";?>><?php echo $cinsiyetErr;?><br><br>
    hobileriniz: <input type="checkbox" name="hobi[]" value="sinema" <?php if(isset($hobi) && in_array('sinema',$hobi)) echo "checked";?>>sinema
    hobileriniz: <input type="checkbox" name="hobi[]" value="spor"<?php if(isset($hobi) && in_array('spor',$hobi)) echo "checked";?>>Spor
    hobileriniz: <input type="checkbox" name="hobi[]" value="kitap"<?php if(isset($hobi) && in_array('kitap',$hobi)) echo "checked";?>>Kitap<?php echo $hobiErr;?><br><br>
    
    kendinizi tanıtın:
    <textarea name="tanitim"></textarea><?php echo $tanitimErr;?>

    <input type="submit" value="Kayıt Ol">


</form>