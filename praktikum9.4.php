<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Praktikum 9</title>
    </head>
    <body>
        <?php
        $angka1=15;
        $angka2=3;
        
        $tambah = $angka1 + $angka2;
        $kurang = $angka1 - $angka2;
        $perkalian = $angka1 * $angka2;
        $pembagian =$angka1 / $angka2;
        $modulus = $angka1 % $angka2;
        echo "<h2> Perhitungan Aritmatika </h2>"; 
        echo "$angka1 + $angka2 = $tambah"; 
        echo "$angka1 - $angka2 = $kurang"; 
        echo "$angka1 * $angka2 = $perkalian"; 
        echo "$angka1 / $angka2 = $pembagian";
        echo "$angka1 % $angka2 = $modulus";
        ?>        
</html>