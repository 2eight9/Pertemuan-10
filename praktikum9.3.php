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
        //Mendefinisikan variabel dengan berbagai macam tipe data
        $nim = "21.11.4609";
        $nama = "Apriliano Boimau";
        $umur = 21;
        $nilai = 92.2;
        $status = TRUE;
        //Menampilkan data
        echo "NIM : ".$nim."<br>";
        echo "Nama : $nama <br>";
        print "Umur : ".$umur."<br>";
        printf ("Nilai : %.3f<br>",$nilai);
        
        if($status)
        echo "Status : Aktif";
        else
        echo "Status : Tidak Aktif";
        ?>
</html>