<?php
include "sesi_admin.php";
if(isset($_POST['simpan'])){
	
	include "../koneksi.php";
	$kode_brg = $_POST['kode_brg'];
	$nama_brg = $_POST['nama_brg'];
	$stok = $_POST['stok'];
	$rak = $_POST['rak'];
	$supplier = $_POST['supplier'];

	
	//cek id

	$sql_cek = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_brg = '$kode_brg'");
	$cek = mysqli_fetch_row($sql_cek);

	if ($cek) {
		echo "<script>alert('Kode barang sudah ada')</script>";
		echo '<script>window.history.back()</script>';
	}else {
		if(isset($_FILES['foto'])) {
			$foto = $_FILES['foto'];
			
			// File properties
			$file_name = $foto['name'];
			$file_tmp = $foto['tmp_name'];
			$file_size = $foto['size'];
			$file_error = $foto['error'];
		
			// File extension
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));
		
			// Allowed extensions
			$allowed = array('jpg', 'jpeg', 'png');
		
			// Check if file has allowed extension
			if(in_array($file_ext, $allowed)) {
				if($file_error === 0) {
					// Generate unique file name
					$file_name_new = uniqid('', true) . '.' . $file_ext;
					$file_destination = 'uploads/' . $file_name_new;
		
					// Move file to destination
					if(move_uploaded_file($file_tmp, $file_destination)) {
						header("Location: success.php");
						exit();
					} else {
						echo "File upload failed.";die;
					}
				} else {
					echo "Error uploading file.";die;
				}
			} else {
				echo "Invalid file type.";die;
			}
		}
		var_dump($file_destination);die;
		$foto_barang = $file_destination; // atau $file_name_new, sesuai kebutuhan Anda



		$sql = "INSERT INTO tb_barang SET kode_brg='$kode_brg', nama_brg='$nama_brg', stok='$stok', rak='$rak', supplier='$supplier', foto='$foto_barang'";
			mysqli_query($koneksi,$sql);
	if($sql){
		 echo '<script>window.history.back()</script>';
		//echo "berhasil";
	}else{
		var_dump($sql);
		echo "gagal";
	}
	}
	
		
}else{
	echo "gagal";
}
?>
