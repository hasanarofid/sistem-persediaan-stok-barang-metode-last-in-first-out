<?php

include_once "sesi_admin.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/barang/title.php"; break;
	case 'simpan': include "modul/barang/simpan.php"; break;
	case 'hapus': include "modul/barang/hapus.php"; break;
	case 'ubah': include "modul/barang/ubah.php"; break;
	case 'update': include "modul/barang/update.php"; break;
	case 'excel': include "modul/barang/excel.php"; break;
	case 'load_more': include "modul/barang/load_more.php"; break;
	case 'filter': include "modul/barang/filter.php"; break; // New case for filtering
	
}
?>
