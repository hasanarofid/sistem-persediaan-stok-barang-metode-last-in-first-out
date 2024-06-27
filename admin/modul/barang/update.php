<?php

include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $stok = $_POST['stok'];
    $rak = $_POST['rak'];
    $supplier = $_POST['supplier'];
    $warna = $_POST['warna'];
    $size = $_POST['size'];

    // Check if user wants to change the photo
    if (isset($_POST['ubahfoto']) && isset($_FILES['inpfoto'])) {
        $foto = $_FILES['inpfoto']['name'];
        $lokasi = $_FILES['inpfoto']['tmp_name'];
        $fotobaru2 = date('dmYHis') . $foto;
        $folder = "../images/admin/";

        // Ensure the folder exists
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        // Move the uploaded file
        if (move_uploaded_file($lokasi, $folder . $fotobaru2)) {
          
            // Delete previous photo from server
            $sql = "SELECT * FROM tb_barang WHERE kode_brg = '$kode_brg'";
            $query = mysqli_query($koneksi, $sql);
            $hapus_f = mysqli_fetch_array($query);

            // Check if there is a previous photo to delete
            if ($hapus_f && !empty($hapus_f['foto'])) {
                $file = "../images/admin/" . $hapus_f['foto'];
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            // Update data in the database with new photo path
            $sql_f = "UPDATE tb_barang SET nama_brg='$nama_brg', stok='$stok', rak='$rak', supplier='$supplier', warna='$warna', size='$size', foto='$fotobaru2' WHERE kode_brg='$kode_brg'";
            $ubah = mysqli_query($koneksi, $sql_f);
            if ($ubah) {
                echo "<script>alert('Ubah Data Dengan Kode barang $kode_brg Berhasil')</script>";
                header("Location: ?m=barang&s=awal");
                exit();
            } else {
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database: " . mysqli_error($koneksi);
            }
        } else {
            // Jika gagal upload gambar
            echo "Maaf, Gambar gagal untuk diupload.";
            die;
        }
    } else {
        // Jika tidak mengubah foto, hanya update data lainnya
        $sql_d = "UPDATE tb_barang SET nama_brg='$nama_brg', stok='$stok', rak='$rak', supplier='$supplier', warna='$warna', size='$size' WHERE kode_brg='$kode_brg'";
        $data = mysqli_query($koneksi, $sql_d);
        if ($data) {
            echo "<script>alert('Ubah Data Dengan kode = $kode_brg Berhasil')</script>";
            header("Location: ?m=barang&s=awal");
            exit();
        } else {
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database: " . mysqli_error($koneksi);
        }
    }
} else {
    echo "No data received.";
}
?>
