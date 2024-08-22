<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../koneksi.php"; // Database connection

// Ensure Composer dependencies are loaded
include "../sesi_admin.php"; // Adjust if needed
require '../../vendor/autoload.php'; // Correct path to autoload.php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set column headers
$sheet->setCellValue('A1', 'Nama Barang');
$sheet->setCellValue('B1', 'Total Barang Masuk');
$sheet->setCellValue('C1', 'Total Barang Keluar');
$sheet->setCellValue('D1', 'Stok Tersisa');

// Fetch item names and initial stock from tb_barang
$barang_query = "SELECT * FROM tb_barang";
$barang_result = mysqli_query($koneksi, $barang_query);

// Prepare an array to hold stock data
$barang_data = [];
while ($barang = mysqli_fetch_assoc($barang_result)) {
    $barang_data[$barang['kode_brg']] = [
        'nama_brg' => $barang['nama_brg'],
        'stok' => $barang['stok'],
        'total_in' => 0,
        'total_out' => 0
    ];
}

// Fetch data from tb_barang_in and update the total_in for each item
$data_in = mysqli_query($koneksi, "SELECT * FROM tb_barang_in");
while ($row = mysqli_fetch_assoc($data_in)) {
    if (isset($barang_data[$row['kode_brg']])) {
        $barang_data[$row['kode_brg']]['total_in'] += $row['jml_masuk'];
    }
}

// Fetch data from tb_barang_out and update the total_out for each item
$data_out = mysqli_query($koneksi, "SELECT * FROM tb_barang_out");
while ($row = mysqli_fetch_assoc($data_out)) {
    if (isset($barang_data[$row['kode_brg']])) {
        $barang_data[$row['kode_brg']]['total_out'] += $row['jml_keluar'];
    }
}

// Populate the spreadsheet with data
$rowNumber = 2;
foreach ($barang_data as $kode_brg => $data) {
    $sheet->setCellValue('A' . $rowNumber, $data['nama_brg']);
    $sheet->setCellValue('B' . $rowNumber, $data['total_in']);
    $sheet->setCellValue('C' . $rowNumber, $data['total_out']);
    $sheet->setCellValue('D' . $rowNumber, $data['stok'] + $data['total_in'] - $data['total_out']);
    $rowNumber++;
}

// Set filename and save the file
$filename = 'Rekap_Barang.xlsx';
$writer = new Xlsx($spreadsheet);
$writer->save($filename);

// Download the file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

// Close database connection
mysqli_close($koneksi);
exit();
?>
