<head>
<style>
  .card {
    transition: transform 0.2s;
    margin-bottom: 20px;
    border: none;
  }
  .card:hover {
    transform: scale(1.05);
  }
  .card-img-top {
    width: 100%;
    height: 200px; /* Ensure all images have a consistent height */
    object-fit: cover; /* Cover the card area without stretching */
  }
  .card-body {
    background-color: #ffffff;
    padding: 20px;
    border-top: 1px solid #f1f1f1;
  }
  .card-title {
    font-size: 1.25rem;
    font-weight: bold;
  }
  .card-text {
    margin-bottom: 15px;
    color: #777;
  }
  .btn {
    margin-right: 10px;
  }
  .pagination {
    margin-top: 20px;
  }
</style>

</head>
<?php 
include '../koneksi.php';

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_barang");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$nomor = $halaman_awal+1;

if (isset($_POST['go'])) {
    $cari = $_POST['cari'];
    $data_rak = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE nama_brg LIKE '%".$cari."%'");
} else {
    $data_rak = mysqli_query($koneksi, "SELECT * FROM tb_barang LIMIT $halaman_awal, $batas");
}
?>
<div class="container">
  <div class="row">
    <?php foreach ($data_rak as $row): ?>
      <div class="col-md-3">
        <div class="card mb-3 shadow-sm">
          <img class="card-img-top" src="../images/admin/<?php echo $row['foto']; ?>" alt="<?php echo $row['nama_brg']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['nama_brg']; ?></h5>
            <p class="card-text">
              Kode Barang: <?php echo $row['kode_brg']; ?><br>
              Warna: <?php echo $row['warna']; ?><br>
              Size: <?php echo $row['size']; ?><br>
              Stok: <?php echo $row['stok']; ?><br>
              Rak: <?php echo $row['rak']; ?><br>
              Supplier: <?php echo $row['supplier']; ?>
            </p>
            <a href="index.php?m=barang&s=hapus&kode_brg=<?php echo $row['kode_brg'];?>" onclick="return confirm('Yakin Akan dihapus?')" class="btn btn-danger">Hapus</a>
            <a href="index.php?m=barang&s=ubah&kode_brg=<?php echo $row['kode_brg'];?>" class="btn btn-primary">Ubah</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

<br>
<div class="row">
<center>
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" <?php if($halaman > 1){ echo "href='?m=barang&s=awal&halaman=$previous'"; } ?>>Previous</a>
    </li>
    <?php 
    for($x=1;$x<=$total_halaman;$x++){
    ?> 
    <li class="page-item"><a class="page-link" href="?m=barang&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
    <?php
    }
    ?>              
    <li class="page-item">
      <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=barang&s=awal&halaman=$next'"; } ?>>Next</a>
    </li>
  </ul>
</center>
</div>