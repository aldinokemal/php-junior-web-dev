<?php

define("BASE_PATH", __DIR__);
require_once "./data_access/Segitiga.php";

// Data Lingkaran
$segitiga = new Segitiga();

$luas = null;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_REQUEST['alas']) || empty($_REQUEST['tinggi'])) {
        echo "<script>alert('alas dan tinggi wajib di inputkan')</script>";
    } else if ($_REQUEST['alas'] < 0 || $_REQUEST['tinggi'] < 0) {
        echo "<script>alert('alas dan tinggi harus lebih dari 0 di inputkan')</script>";
    } else {
        $result = $segitiga->add($_REQUEST['alas'], $_REQUEST['tinggi']);
        $luas = $result[2];
    }
}

$dataSegitiga = $segitiga->get();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
</head>
<body>
<div class="ui text container" style="padding-top: 100px" id="app">
    <h1 class="ui dividing header">Rumus Mencari Luas Segitiga</h1>

    <form class="ui form" method="post">
        <div class="field">
            <label>Masukkan Parameter</label>
            <div class="two fields">
                <div class="field">
                    <input aria-label="alas" type="number" placeholder="Alas" name="alas" min="0">
                </div>
                <div class="field">
                    <input aria-label="tinggi" type="number" placeholder="Tinggi" name="tinggi" min="0">
                </div>
            </div>

            <button type="submit" class="ui teal small button">Hitung</button>
            <br>
            <div class="ui center statistic">
                <div class="value">
                    <?php echo $luas ?>
                </div>
            </div>
        </div>
    </form>

    <table class="ui celled table">
        <thead>
        <tr>
            <th>Alas</th>
            <th>Tinggi</th>
            <th>Hasil</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($dataSegitiga as $data): ?>
        <tr>
            <td><?php echo $data[0] ?></td>
            <td><?php echo $data[1] ?></td>
            <td><?php echo $data[2] ?></td>
            <td><?php echo $data[3] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div style="padding-bottom: 20px;">
        <a href="./index.php" class="ui grey small button">Back</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>