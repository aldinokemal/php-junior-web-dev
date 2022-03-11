<?php

define("BASE_PATH", __DIR__);
require_once "./data_access/Lingkaran.php";
require_once "./data_access/Persegi.php";
require_once "./data_access/Segitiga.php";

// Data Lingkaran
$lingkaran = new Lingkaran();
$dataLingkaran = $lingkaran->get();


// Data Persegi
$persegi = new Persegi();
$dataPersegi = $persegi->get();

// Data Segitiga
$segitiga = new Segitiga();
$dataSegitiga = $segitiga->get();

$totalAll = count($dataSegitiga) + count($dataLingkaran) + count($dataPersegi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
</head>
<body>
<div class="ui text container" style="padding-top: 50px" id="app">
    <h1 class="ui dividing header">Rumus Mencari Luas Bangunan</h1>

    <h3 class="first">Selamat Datang dihalaman Dashboard</h3>
    <p>Ini adalah aplikasi untuk mencari luas bangunan (persegi/lingkaran/segitiga).
        coding ini mengunakan bahasa <code>PHP</code>
    </p>

    <div class="ui three column grid">
        <div class="column">
            <div class="ui raised segment">
                <a class="ui red ribbon label"><?= count($dataPersegi) ?>x</a>
                <span>Luas Persegi</span>

                <?php if($totalAll > 0): ?>
                    <p>
                    <div class="ui center statistic" style="width:100%">
                        <div class="value">
                            <span><?php echo number_format(count($dataPersegi) / $totalAll * 100,1,",",".") ?> %</span>
                        </div>
                        <div class="label" style="padding-top: 20px">
                            <a href="./persegi.php" class="fluid ui red small button">
                                Cari Luas Persegi
                            </a>
                        </div>
                    </div>
                    </p>
                <?php else: ?>
                    <p>0 %</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="column">
            <div class="ui raised segment">
                <a class="ui blue ribbon label"><?= count($dataLingkaran) ?>x</a>
                <span>Luas Lingkaran</span>

                <?php if($totalAll > 0): ?>
                <p v-if="totalAll > 0">
                <div class="ui center statistic" style="width:100%">
                    <div class="value">
                        <span><?php echo number_format(count($dataLingkaran) / $totalAll * 100,1,",",".") ?> %</span>
                    </div>
                    <div class="label" style="padding-top: 20px">
                        <a href="./lingkaran.php" class="fluid ui blue small button">
                            Cari Luas Lingkaran
                        </a>
                    </div>
                </div>
                </p>
                <?php else: ?>
                <p>0 %</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="column">
            <div class="ui raised segment">
                <a class="ui teal ribbon label"><?= count($dataSegitiga) ?>x</a>
                <span>Luas Segitiga</span>

                <?php if($totalAll > 0): ?>
                    <p>
                    <div class="ui center statistic" style="width:100%">
                        <div class="value">
                        <span><?php echo number_format(count($dataSegitiga) / $totalAll * 100,1,",",".") ?> %</span>
                        </div>
                        <div class="label" style="padding-top: 20px">
                            <a href="./segitiga.php" class="fluid ui teal small button">
                                Cari Luas Segitiga
                            </a>
                        </div>
                    </div>
                    </p>
                <?php else: ?>
                    <p>0 %</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="column" style="text-align: center; padding-top: 50px">
        <div class="ui statistic">
            <div class="value">
                <?= $totalAll ?>
            </div>
            <div class="label">
                Total Semua Perhitungan
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>