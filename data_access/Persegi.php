<?php

/*
Ini Adalah class yang digunakan untuk mengakses data persegi csv
terdapat 2 method:
    1. add
        digunakan untuk menambahkan data ke CSV
    2. get
        digunakan untuk mengambil data dari CSV ke array
        menggunakan arrray_unshift agar data dari tanggal diambil ascending
*/
class Persegi
{
    private string $CSV_PATH = BASE_PATH . "/storage/persegi.csv";

    // add: dibutuhkan 2 parameter berupa panjang dan lebar | luas: panjang * lebar
    public function add($panjang = 0, $lebar = 0) // default value = 0
    {
        $handle = fopen($this->CSV_PATH, "a"); // membka file CSV | a -> append (menambah atau membuat) | w -> write -> datanya replace | r -> read -> hanya membaca
        // kalau A -> nanati akan ditambah datanya kebawah, bikin baru kalau tidak ada
        // kalau W -> datnya csv akan kereplace
        
        $luas = $panjang * $lebar;
        $tanggal = date("Y-m-d H:i:s");
        $result = [$panjang, $lebar, $luas, $tanggal];
        fputcsv($handle, $result);
        fclose($handle);
        return $result;
    }

    // get: digunakan untuk mengambil data dari persegi.csv
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