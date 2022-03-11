<?php

define("BASE_PATH", __DIR__);
require_once "./data_access/Persegi.php";

// Data Persegi
$persegi = new Persegi();

$luas = null;
if ($_SERVER['REQUEST_METHOD'] == "POST") { // jika di klik tombol submit maka akan melakukan validasi
    if (empty($_REQUEST['panjang']) || empty($_REQUEST['lebar'])) { // kosong salah satu tidak boleh (harus ada isinya semua)
        echo "<script>alert('panjang dan lebar wajib di inputkan')</script>";
    } else if ($_REQUEST['panjang'] < 0 || $_REQUEST['lebar'] < 0) {
        echo "<script>alert('panjang dan lebar harus lebih dari 0 di inputkan')</script>";
    } 
    else {
        $result = $persegi->add($_REQUEST['panjang'], $_REQUEST['lebar']);
        $luas = $result[2];
    }
}

$dataPersegi = $persegi->get();

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
    <h1 class="ui dividing header">Rumus Mencari Luas Persegi</h1>

    <form class="ui form" method="post">
        <div class="field">
            <label>Masukkan Parameter</label>
            <div class="two fields">
                <div class="field">
                    <input aria-label="panjang" type="number" placeholder="Panjang" name="panjang" min="0">
                </div>
                <div class="field">
                    <input aria-label="lebar" type="number" placeholder="Lebar" name="lebar" min="0">
                </div>
            </div>

            <button type="submit" class="ui red small button">Hitung</button>
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
            <th>Panjang</th>
            <th>Lebar</th>
            <th>Hasil</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($dataPersegi as $data): ?>
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