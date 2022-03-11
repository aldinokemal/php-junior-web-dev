<?php

define("BASE_PATH", __DIR__);
require_once "./data_access/Lingkaran.php";

function getLingkaran(){
	// Data Lingkaran
	$lingkaran = new Lingkaran(); // memanggil class data access lingkaran
	$dataLingkaran = $lingkaran->get(); // memanggil fungsi get pada class data access lingkaran

	print_r($dataLingkaran);
}

getLingkaran();