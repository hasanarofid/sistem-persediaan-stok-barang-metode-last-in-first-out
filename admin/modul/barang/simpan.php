<?php
include "sesi_admin.php";

if(isset($_POST['simpan'])){
    include "../koneksi.php";
    
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $stok = $_POST['stok'];
    $rak = $_POST['rak'];
    $warna = $_POST['warna'];
    $size = $_POST['size'];
    $supplier = $_POST['supplier'];

    // Handle file upload
    if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK){
        $lokasi = $_FILES['foto']['tmp_name'];
        $namafile = $_FILES['foto']['name'];
        $fotobaru = date('dmYHis') . $namafile;
        $folder = "../images/admin/";

        // Ensure the folder exists
        if(!is_dir($folder)){
            mkdir($folder, 0777, true);
        }

        // Move the uploaded file
        if(move_uploaded_file($lokasi, $folder . $fotobaru)){
            $foto_path = $folder . $fotobaru;
        } else {
            echo "Failed to upload photo."; 
            die;
        }
    } else {
        echo "Photo upload error or no photo uploaded.";
        die;
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO tb_barang (kode_brg, nama_brg, stok, rak, supplier, foto,warna,size) 
            VALUES ('$kode_brg', '$nama_brg', '$stok', '$rak', '$supplier', '$fotobaru', '$warna', '$size')";

    if(mysqli_query($koneksi, $sql)){
        echo '<script>window.history.back()</script>';
        echo "Insert successful"; 
        die;
    } else {
        echo "Insert failed: " . mysqli_error($koneksi);
        die;
    }
} else {
    echo "Invalid access.";
    die;
}
?>
