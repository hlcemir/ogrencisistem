<?php

include "baglan.php";
global $baglan;

if (isset($_GET['sil'])){
    $sqlsil= "DELETE FROM ogrenci WHERE `ogrenci`.`ogrno` = ?";
    $sorgusil=$baglan->prepare($sqlsil);
    $sorgusil->execute([
            $_GET['sil']
      ]);

    header('Location:index.php');
}

$sql="SELECT * FROM ogrenci";
$sorgu=$baglan->prepare($sql);
$sorgu->execute();

?>

<script type="text/javascript">
    function confirm_delete() {
        return confirm('Silmek istediğinize emin misiniz?');
    }
</script>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Öğrenci Sistem</title>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
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
                    <div class="btn-group" >
                        <a href="index.php" class="btn btn-outline-primary">Tüm Öğrenciler</a>
                        <a href="ekle.php" class="btn btn-outline-primary">Öğrenci Ekle</a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        include_once "baglan.php";
                        global $baglan;

                        $query = $baglan->query("SELECT * FROM ogrenci", PDO::FETCH_ASSOC);

                        foreach ($query as $key) {
                           echo' <tr>
                                <td>'.$key["ogrno"].'</td>
                                <td>'.$key["ograd"].'</td>
                                <td>'.$key["ogrsoyad"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="detay.php?ogrno='.$key["ogrno"].'" class="btn btn-success" >Detay</a>
                                        <a href="güncelle.php?ogrno='.$key["ogrno"].'" class="btn btn-secondary">Güncelle</a>
                                        <a href="?sil='.$key["ogrno"].'"  onclick="return confirm_delete();" class="btn btn-danger">Kaldır</a>
                                    </div>
                                </td>
                            </tr>';
                         }
                         ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
</body>
</html>