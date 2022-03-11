<?php

define("BASE_PATH", __DIR__);
require_once "./data_access/Lingkaran.php";

// Data Lingkaran
$lingkaran = new Lingkaran();

$luas = null;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_REQUEST['jari'])) {
        echo "<script>alert('Jari-jari wajib di inputkan')</script>";
    } else if ($_REQUEST['jari'] < 0) {
        echo "<script>alert('jari jari harus lebih dari 0 di inputkan')</script>";
    } else {
        $result = $lingkaran->add($_REQUEST['jari']);
        $luas = $result[2];
    }
}

$dataLingkaran = $lingkaran->get();

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
    <h1 class="ui dividing header">Rumus Mencari Luas Lingkaran</h1>

    <form class="ui form" method="post">
        <div class="field">
            <label>Masukkan Parameter</label>
            <div class="one fields">
                <div class="field">
                    <input aria-label="jari" name="jari" type="number" placeholder="Jari" min="0">
                </div>
            </div>
            <button type="submit" class="ui blue small button">Hitung</button>
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
            <th>Phi</th>
            <th>Jari</th>
            <th>Hasil</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($dataLingkaran as $data): ?>
            <tr>
                <td><?= $data[0] ?></td>
                <td><?= $data[1] ?></td>
                <td><?= $data[2] ?></td>
                <td><?= $data[3] ?></td>
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