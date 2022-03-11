<?php

/*
Ini Adalah class yang digunakan untuk mengakses data lingkaran csv
terdapat 2 method:
    1. add
        digunakan untuk menambahkan data ke CSV
    2. get
        digunakan untuk mengambil data dari CSV ke array
        menggunakan arrray_unshift agar data dari tanggal diambil ascending
*/
class Lingkaran
{
    private string $CSV_PATH = BASE_PATH . "/storage/lingkaran.csv";

    // add: dibutuhkan parameter berupa jari-jari untuk mencari luas lingkaran | luas: 3.14 * jari * jari
    public function add($jari = 0)
    {
        $handle = fopen($this->CSV_PATH, "a"); // append -> artinya bisa tambah / create | w -> write -> hanya menulis data dari awal
        $phi = "3.14";
        $tanggal = date("Y-m-d H:i:s");
        $luas = $phi * $jari * $jari;
        $result = [$phi, $jari, $luas, $tanggal];
        fputcsv($handle, $result);
        fclose($handle);
        return $result;
    }

    // get: digunakan untuk mengambil data dari lingkaran.csv
    public function get()
    {
        $file = fopen($this->CSV_PATH, "r");
        $results = [];
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            array_unshift($results, $data);
        }
        fclose($file);
        return $results;
    }
}