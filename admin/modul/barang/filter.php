<?php
include '../koneksi.php';

$nama_rak = isset($_GET['filter']) ? $_GET['filter'] : '';



$query = "SELECT * FROM tb_barang WHERE rak = '$nama_rak'";
$result = mysqli_query($koneksi, $query);
// var_dump($result);die;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $judul; ?></title>
  <!-- Bootstrap -->
  <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/css/bootstrap/bootstrap.css" rel="stylesheet">
  <!-- Icons and Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Theme CSS -->
  <link href="../css/tampilanadmin.css" rel="stylesheet">
</head>
<body>
  <!-- Menu -->
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">navigation</span> Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand">Afterlife</a>
      </div>
      <?php 
      $id = $_SESSION['idinv'];
      $sql = "SELECT * FROM tb_admin WHERE id_admin = '$id'";
      $query = mysqli_query($koneksi, $sql);
      $r = mysqli_fetch_array($query);
      ?>
      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <img src="../images/admin/<?php echo $r['foto']; ?>" height="50"> <?php echo $r['nama']; ?>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <form class="" action="logout.php" onclick="return confirm('yakin ingin logout?');" method="post">
                <button class="btn btn-default" type="submit" name="keluar"><i class="fa fa-sign-out"></i> Logout</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Sidebar menu -->
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li>
              <a href="?m=awal.php">
                <i class="fa fa-dashboard"></i> Beranda
              </a>
            </li>
            <li>
              <a href="?m=admin&s=awal">
                <i class="fa fa-user"></i> Data Admin
              </a>
            </li>
            <li>
              <a href="?m=supplier&s=awal">
                <i class="fa fa-building"></i> Data Supplier
              </a>
            </li>
            <li>
              <a href="?m=rak&s=awal">
                <i class="fa fa-cubes"></i> Data Rak
              </a>
            </li>
            <li>
              <a href="?m=barang&s=awal">
                <i class="fa fa-archive"></i> Data Barang
              </a>
            </li>
            <li>
              <a href="?m=barangKeluar&s=awal">
                <i class="fa fa-cart-arrow-down"></i> Data Barang Keluar
              </a>
            </li>
            <li>
              <a href="logout.php" onclick="return confirm('yakin ingin logout?')">
                <i class="fa fa-warning"></i> Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header">Data Barang Dari Rak <span style="color:red"> <?= $nama_rak ?></span>  </h3>
        </div>
      </div>

      <style>
        /* Your CSS styles */
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
            height: 200px;
            object-fit: cover;
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
    </style>

    <div class="row">
    <div class="container">
    <div class="row" id="card-container">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-3">';
            echo '  <div class="card mb-3 shadow-sm">';
            echo '      <img class="card-img-top" src="../images/admin/' . $row['foto'] . '" alt="' . $row['nama_brg'] . '">';
            echo '      <div class="card-body">';
            echo '          <h5 class="card-title">' . $row['nama_brg'] . '</h5>';
            echo '          <p class="card-text">';
            echo '              Kode Barang: ' . $row['kode_brg'] . '<br>';
            echo '              Warna: ' . $row['warna'] . '<br>';
            echo '              Size: ' . $row['size'] . '<br>';
            echo '              Stok: ' . $row['stok'] . '<br>';
            echo '              Rak: ' . $row['rak'] . '<br>';
            echo '              Supplier: ' . $row['supplier'];
            echo '          </p>';
            echo '          <a href="index.php?m=barang&s=hapus&kode_brg=' . $row['kode_brg'] . '" onclick="return confirm(\'Yakin Akan dihapus?\')" class="btn btn-danger">Hapus</a>';
            echo '          <a href="index.php?m=barang&s=ubah&kode_brg=' . $row['kode_brg'] . '" class="btn btn-primary">Ubah</a>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }
        ?>
    </div>
    </div>
    </div>


</div>
  </div>

  <!-- Footer -->
  <footer class="text-center">
    <div class="footer-below">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p class="text-muted" style="font-size: 16px;">Copyright &copy; <script>document.write(new Date().getFullYear());</script> Afterlife. All rights reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendor/css/js/bootstrap.min.js"></script>
</body>
</html>

