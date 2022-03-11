<?php

/*
Ini Adalah class yang digunakan untuk mengakses data segitiga csv
terdapat 2 method:
    1. add
        digunakan untuk menambahkan data ke CSV
    2. get
        digunakan untuk mengambil data dari CSV ke array
        menggunakan arrray_unshift agar data dari tanggal diambil ascending
*/
class Segitiga
{
    private string $CSV_PATH = BASE_PATH . "/storage/segitiga.csv";

    // add: dibutuhkan parameter berupa alas dan tinggi untuk mencari luas segitiga | luas: 0.5 * alas * tinggi
    public function add($alas = 0, $tinggi = 0)
    {
        $handle = fopen($this->CSV_PATH, "a");
        $tanggal = date("Y-m-d H:i:s");
        $luas = $alas * $tinggi / 2;
        $result = [$alas, $tinggi, $luas, $tanggal];
        fputcsv($handle,[$alas, $tinggi, $luas, $tanggal]);
        fclose($handle);
        return $result;

    }

    // get: digunakan untuk mengambil data dari lingkaran.csv
    public function get()
    {
        $file = fopen($this->CSV_PATH,"r");
        $results = [];
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE)
        {
            array_unshift($results, $data);
        }
        fclose($file);
        return $results;
    }
}