<?php

if(isset($_POST['tin_nhan']) && !empty($_POST['tin_nhan']) && isset($_POST['may']) &&!empty($_POST['may']) ){
    $tin_nhan = $_POST['tin_nhan'];
    $may = $_POST['may'];

    $f = fopen("chat.txt",'a');

    if($may =="may1"){
        fwrite($f,"may1-".$tin_nhan."\n");
    }elseif ($may =="may2"){
        fwrite($f,"may2-".$tin_nhan."\n");
    }

    fclose($f);

}

$f = fopen("chat.txt","r") or die("No connect");


    while (!feof($f)){
        $nd = fgets($f);
        $mang = explode("-", $nd);
        if($mang[0]=="may1"){
            ?>
            <div class="may1"><?php  echo $mang[1];?></div>
            <?php
        }elseif ($mang[0]=="may2"){
            ?>
            <div class="may2"><?php  echo $mang[1];?></div>
            <?php
        }
    }
    ?>



