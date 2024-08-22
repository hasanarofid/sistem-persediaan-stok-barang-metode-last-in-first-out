<?php 
include 'sesi_admin.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/rekap/title.php"; break;
	case 'simpan': include "modul/rekap/simpan.php"; break;
	case 'hapus': include "modul/rekap/hapus.php"; break;
	case 'ubah': include "modul/rekap/ubah.php"; break;
	case 'update': include "modul/rekap/update.php"; break;
	case 'export': include "modul/rekap/export.php"; break;
	
}
 ?>