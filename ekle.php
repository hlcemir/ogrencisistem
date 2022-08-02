<?php
global $baglan;

if (isset($_POST["kaydet"])){
    include "baglan.php";
    $sql="INSERT INTO `ogrenci` (`ogrno`, `ograd`, `ogrsoyad`, `cinsiyet`, `dtarih`, `sinif`) VALUES (NULL, ?, ?, ?, ?, ?);";
    $dizi=[
            $_POST["ad"],
            $_POST["sad"],
            $_POST["cins"],
            $_POST["dtarih"],
            $_POST["sinif"]
            ];
    $sth = $baglan->prepare($sql);
    $sonuc = $sth->execute($dizi);
    header("Location:index.php");
}
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
                   <div class="col-6">
                       <label for="ad" class="form-label">Adınız</label>
                       <input type="text" class="form-control" name="ad">
                   </div>
                <div class="col-6">
                    <label for="sad" class="form-label">Soyadınız</label>
                    <input type="text" class="form-control" name="sad">
                </div>
                <div class="col-6">
                    <label for="sinif" class="form-label">Sınıfınız</label>
                    <input type="text" class="form-control" name="sinif">
                </div>
                <div class="col-6">
                    <label for="dtarih" class="form-label">Doğum Tarihi</label>
                    <input type="date" class="form-control" name="dtarih">
                </div>
                <div class="col">
                    <label for="" class="form-label">Kız
                        <input type="radio" name="cins" value="K">
                    </label>
                    <label for="" class="form-label">Erkek
                        <input type="radio" name="cins" value="E">
                    </label>
                </div>
                <button type="submit" name="kaydet" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </main>

</body>
</html>