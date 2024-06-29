<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "sesi_admin.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['import'])){
    var_dump(1);
    include "../koneksi.php";
    
    $file_mimes = array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
    
        $arr_file = explode('.', $_FILES['file']['name']);
        $extension = end($arr_file);
    
        if('csv' == $extension) {
            $reader = IOFactory::createReader('Csv');
        } else if('xls' == $extension) {
            $reader = IOFactory::createReader('Xls');
        } else {
            $reader = IOFactory::createReader('Xlsx');
        }
    
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        
        for($i = 1; $i < count($sheetData); $i++) {
            $kode_brg = $sheetData[$i][0];
            $nama_brg = $sheetData[$i][1];
            $stok = $sheetData[$i][2];
            $rak = $sheetData[$i][3];
            $warna = $sheetData[$i][4];
            $size = $sheetData[$i][5];
            $supplier = $sheetData[$i][6];
    
            $sql = "INSERT INTO tb_barang (kode_brg, nama_brg, stok, rak, warna, size, supplier) VALUES ('$kode_brg', '$nama_brg', '$stok', '$rak', '$warna', '$size', '$supplier')";
            mysqli_query($koneksi, $sql);
        }
    
        header("Location: ?m=barang&s=awal");
    } else {
        echo "Invalid file format.";
    }
} else {
    echo "No file uploaded.";
}
?>
