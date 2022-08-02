<?php

include "baglan.php";
global $baglan;

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
        <div style="padding-left: 50px" class="row">
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?=$satir["ograd"]; ?> <?=$satir["ogrsoyad"]; ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted"> <?=$satir["sinif"]; ?> </h6>
                        <p class="card-text"> <?=$satir["cinsiyet"]; ?> <br> <?=$satir["dtarih"]; ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>