<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "sesi_admin.php";
// require 'vendor/autoload.php';
require '../vendor/autoload.php';
// require '../../../vendor/autoload.php'; // Adjust the path based on your directory structure

use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['import'])){
    // var_dump(1);
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

                // Query to get the `rak` based on `nama_rak`
            $nama_rak = $sheetData[$i][1];
            $rak_query = "SELECT * FROM tb_rak WHERE nama_rak = '$nama_rak'";
            $rak_result = mysqli_query($koneksi, $rak_query);

            if ($rak_result && mysqli_num_rows($rak_result) > 0) {
                $rak_row = mysqli_fetch_assoc($rak_result);
                $id_rak = $rak_row['id_rak']; // Assuming `rak` is the column name you need
            } else {
                // Handle case where `nama_rak` is not found
                $id_rak = "Unknown"; // Or set it to a default value or handle the error
            }

         

            $supplier = $sheetData[$i][5];
            $supplier_query = "SELECT * FROM tb_sup WHERE nama_sup = '$supplier'";
            $supplier_result = mysqli_query($koneksi, $supplier_query);

            if ($supplier_result && mysqli_num_rows($supplier_result) > 0) {
                $supplier_row = mysqli_fetch_assoc($supplier_result);
                $id_supplier = $supplier_row['id_sup']; // Assuming `rak` is the column name you need
            } else {
                // Handle case where `nama_rak` is not found
                $id_supplier = "Unknown"; // Or set it to a default value or handle the error
            }

            $foto = 'kaosdefault.jpg';
            $nama_brg = $sheetData[$i][2];
            $stok = $sheetData[$i][7];
            
            $warna = $sheetData[$i][3];
            $size = $sheetData[$i][6];

    
            $sql = "INSERT INTO tb_barang (foto, nama_brg, stok, rak, warna, size, supplier) 
            VALUES ('$foto', '$nama_brg', '$stok', '$nama_rak', '$warna', '$size', '$id_supplier')";
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
