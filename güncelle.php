<?php

include "baglan.php";
global $baglan;

if (isset($_POST['güncelle'])){

    $sql="UPDATE `ogrenci` SET `ograd` = ? ,
                               `ogrsoyad` = ? , 
                              `dtarih` = ? , 
                              `sinif` = ? WHERE `ogrenci`.`ogrno` = ?";

    $dizi=[
            $_POST['ad'],
            $_POST['sad'],
            $_POST['dtarih'],
            $_POST['sinif'],
            $_POST['ogrno']
    ];
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute($dizi);

    header("Location:index.php");

}

$sql="SELECT * FROM ogrenci WHERE ogrno = ?";
$sorgu = $baglan->prepare($sql);
$sorgu->execute([
    $_GET['ogrno']
]);
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Öğrenci Sistem</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-1 text-center">Öğrenci Sistem</h1>
                </div>
            </div>
        </div>

    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="btn-group" >
                        <a href="index.php" class="btn btn-outline-primary">Tüm Öğrenciler</a>
                        <a href="ekle.php" class="btn btn-outline-primary">Öğrenci Ekle</a>
                    </div>
                </div>
            </div>
            <form action="" method="post" class="row mt-4 g-3">
                <input type="hidden" name="ogrno" value="<?=$satir['ogrno']?>" readonly>
                   <div class="col-6">
                       <label for="ad" class="form-label">Adınız</label>
                       <input type="text" class="form-control" name="ad" value="<?=$satir['ograd']?>">
                   </div>
                <div class="col-6">
                    <label for="sad" class="form-label">Soyadınız</label>
                    <input type="text" class="form-control" name="sad" value="<?=$satir['ogrsoyad']?>">
                </div>
                <div class="col-6">
                    <label for="sinif" class="form-label">Sınıfınız</label>
                    <input type="text" class="form-control" name="sinif" value="<?=$satir['sinif']?>">
                </div>
                <div class="col-6">
                    <label for="dtarih" class="form-label">Doğum Tarihi</label>
                    <input type="date" class="form-control" name="dtarih" value="<?=$satir['dtarih']?>">
                </div>
                <button type="submit" name="güncelle" class="btn btn-primary">Güncelle</button>
            </form>
        </div>
    </main>

</body>
</html>