<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Praktikum 9</title>
    </head>
    <?php
    //Mendefinisikan nilai konstanta
    define("nilaimax", "100");
    define("pi", "3.14");
    //Mencetak nilai konstanta
    print("Nilai maksimal : ".nilaimax);
    //Menggunakan konstanta dalam perhitungan
    $jarijari = 5;
    $luaslingkaran = pi*$jarijari*$jarijari;
    echo "<br> Luas lingkaran = ".$luaslingkaran;
    ?>
</html>