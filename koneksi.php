<?php 
$koneksi = mysqli_connect("localhost", "root", "hasanitki", "db_persedian");

if (mysqli_connect_errno()) {
	echo "Koneksi gagal".mysqli_connect_error();
}
 ?>